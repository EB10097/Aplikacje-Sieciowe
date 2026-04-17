<?php
namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\SessionUtils;


 // Koszyk przechowywany jest w sesji jako tablica:  [id_produktu => ilość]
 
class CartCtrl {

    
    public function action_cartAdd() {
        // Pobranie ID produktu z parametru URL (np. ?id=5)
        $id = ParamUtils::getFromRequest('id');

        // Walidacja ID produktu
        // - Sprawdza czy parametr nie jest pusty
        // - Sprawdza czy jest liczbą
        // - Sprawdza czy jest większy od 0
        if (empty($id) || !is_numeric($id) || $id <= 0) {
            Utils::addErrorMessage('Nieprawidłowy ID produktu');
            App::getRouter()->redirectTo("productList");
            return;
        }

        // Sprawdzenie czy produkt o podanym ID istnieje w bazie
        $product = App::getDB()->get("products", "id_product", ["id_product" => $id]);
        
        if (!$product) {
            // Produkt nie istnieje - komunikat błędu i powrót do listy
            Utils::addErrorMessage('Produkt nie istnieje');
            App::getRouter()->redirectTo("productList");
            return;
        }

        // Zarządzanie koszykiem 
        // loadObject('cart', true) - true oznacza że nie wyrzuca błędu jeśli obiekt nie istnieje
        $cart = SessionUtils::loadObject('cart', true);
        
        // Jeśli koszyk nie istnieje w sesji - tworzymy pustą tablicę
        if ($cart == null) $cart = [];

        // Dodanie produktu do koszyka lub zwiększenie ilości
        if (!isset($cart[$id])) {
            
            $cart[$id] = 1;
            Utils::addInfoMessage('Mydło dodane do koszyka!');
        } else {
            
            $cart[$id]++;
            Utils::addInfoMessage('Zwiększono ilość w koszyku.');
        }

        // Zapisanie zaktualizowanego koszyka w sesji
        SessionUtils::storeObject('cart', $cart);

        // Przekierowanie użytkownika z powrotem do listy produktów
        App::getRouter()->redirectTo("productList");
    }

    
    public function action_orderSave() {
        // Pobranie adresu dostawy z formularza (pole tekstowe)
        $adres = ParamUtils::getFromRequest('adres');
        
        // Pobranie zawartości koszyka z sesji
        $cart = SessionUtils::loadObject('cart', true);
        
        // Pobierz obiekt użytkownika z sesji
        $user = SessionUtils::loadObject('user', true);
        
        // Pobierz ID użytkownika z bazy na podstawie loginu
        // Potrzebne do zapisania w tabeli 'orders' 
        $userId = null;
        if ($user && isset($user->login)) {
            $userId = App::getDB()->get("users", "id_user", ["login" => $user->login]);
        }

        // Walidacja 1: Czy użytkownik jest zalogowany?
        if (empty($userId)) {
            Utils:: addErrorMessage("Musisz być zalogowany, aby złożyć zamówienie.");
            App::getRouter()->redirectTo("login");
            return;
        }

        // Walidacja 2: Czy koszyk nie jest pusty?
        if (empty($cart)) {
            Utils::addErrorMessage("Twój koszyk jest pusty!");
            App::getRouter()->redirectTo("productList");
            return;
        }

        // Walidacja 3: Czy podano adres dostawy? 
        if (empty($adres)) {
            Utils::addErrorMessage("Proszę podać adres dostawy.");
            // Wyświetl ponownie widok koszyka z formularzem
            $this->action_cartView();
            return;
        }

        try {
            // Pobranie ID produktów z koszyka (klucze tablicy)
            $ids = array_keys($cart);
            
            // Pobranie danych produktów z bazy (ID i cena)
            $products = App::getDB()->select("products", ["id_product", "cena"], ["id_product" => $ids]);
            
            // Obliczenie łącznego kosztu zamówienia
            $total = 0;
            foreach ($products as $p) {
                $total += $p['cena'] * $cart[$p['id_product']];
            }

            // Wstaw nowe zamówienie do tabeli 'orders'
            App::getDB()->insert("orders", [
                "USERS_id_user2" => $userId,              
                "ORDER_STATUS_id_status" => 1,            
                "data_zamowienia" => date("Y-m-d H:i: s"), 
                "koszt_zamowienia" => $total,             
                "adres_dostawy" => $adres,                
                "modyfikowane_przez" => $userId,          
                "kiedy_modyfikowane" => date("Y-m-d H:i:s"), 
                "status" => "nowe"                        
            ]);

            // Pobierz ID ostatnio wstawionego rekordu (ID nowego zamówienia)
            $orderId = App::getDB()->id();

            // Wstaw pozycje zamówienia do tabeli 'order_items'
            foreach ($products as $p) {
                App:: getDB()->insert("order_items", [
                    "ORDERS_ORDERS_ID" => $orderId,          
                    "PRODUCTS_id_product" => $p['id_product'], 
                    "ilosc" => $cart[$p['id_product']],       
                    "cena_zakupu" => $p['cena']              
                ]);
            }

            // Czyścimy koszyk po pomyślnym złożeniu zamówienia
            SessionUtils::remove('cart');
            
            // Komunikat sukcesu z numerem zamówienia
            Utils:: addInfoMessage("Dziękujemy!  Zamówienie nr <strong>$orderId</strong> zostało złożone.");
            
            // Przekierowanie do listy produktów
            App::getRouter()->redirectTo("productList");

        } catch (\Exception $e) {
            // Obsługa błędów bazy danych
            Utils::addErrorMessage("Błąd zapisu: " . $e->getMessage());
            
            // Wyświetl ponownie koszyk z komunikatem błędu
            $this->action_cartView();
        }
    }


    public function action_cartView() {
        // Pobranie koszyka z sesji
        $cart = SessionUtils::loadObject('cart', true);
        
        // Inicjalizacja zmiennych
        $products = [];  // Tablica produktów z pełnymi danymi
        $total = 0;      // Łączna wartość koszyka

        // Jeśli koszyk nie jest pusty - pobierz dane produktów
        if (!empty($cart)) {
            // Wyciągnij ID produktów z koszyka
            $ids = array_keys($cart);
            
            // Pobierz pełne dane produktów z bazy
            $products = App::getDB()->select("products", "*", ["id_product" => $ids]);

            // Dodaj ilość do każdego produktu i oblicz sumę
            foreach ($products as &$p) {
                // Dodaj klucz 'quantity' z ilością z koszyka
                $p['quantity'] = $cart[$p['id_product']];
                
                // Dodaj wartość tego produktu do sumy (cena * ilość)
                $total += $p['cena'] * $p['quantity'];
            }
        }

        // Przypisanie danych potrzebnych dla szablonu main.tpl (nagłówek)
        App::getSmarty()->assign('user', SessionUtils::loadObject('user', true));
        App::getSmarty()->assign('isKlient', \core\RoleUtils::inRole('klient'));

        // Przypisanie danych specyficznych dla widoku koszyka
        App::getSmarty()->assign('cart_products', $products); 
        App::getSmarty()->assign('total', $total);             
        
        // Wyświetlenie szablonu Smarty (formularz + lista produktów)
        App::getSmarty()->display('CartView.tpl');
    }

    
    public function action_cartClear() {
        // Usuń obiekt 'cart' z sesji (SessionUtils usuwa zmienną sesji)
        SessionUtils::remove('cart');
        
        Utils::addInfoMessage('Koszyk został opróżniony.');
        
        App::getRouter()->redirectTo("productList");
    }
}