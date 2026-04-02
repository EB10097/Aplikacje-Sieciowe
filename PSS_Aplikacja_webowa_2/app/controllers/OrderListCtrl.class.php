<?php
namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\SessionUtils;
use core\RoleUtils;

class OrderListCtrl {

    
    //Metoda pomocnicza - pobiera ID zalogowanego użytkownika z bazy na podstawie danych z sesji
    //Wykorzystywana do filtrowania zamówień oraz zapisu informacji o modyfikacji
     
    private function getLoggedUserId() {
        $user = SessionUtils::loadObject('user', true);
        if ($user && isset($user->login)) {
            // Pobranie id_user z tabeli users dla aktualnie zalogowanego loginu
            return App::getDB()->get("users", "id_user", ["login" => $user->login]);
        }
        return null;
    }

    //Akcja wyświetlająca listę zamówień
    
    public function action_orderList() {
        $user = SessionUtils::loadObject('user', true);

        // Ochrona dostępu: użytkownik musi być zalogowany
        if (!$user) {
            Utils::addErrorMessage("Musisz być zalogowany.");
            App::getRouter()->redirectTo("login");
            return;
        }

        // Sprawdzenie uprawnień: pracownik ma szerszy wgląd w dane
        $isPracownik = RoleUtils::inRole('pracownik') ;

        if ($isPracownik) {
            // LOGIKA DLA PRACOWNIKA: Pobranie wszystkich zamówień wraz z loginem klienta (JOIN)
            $orders = App::getDB()->select("orders", [
                "[>]users" => ["USERS_id_user2" => "id_user"]
            ], [
                "orders.orders_id", 
                "orders.data_zamowienia", 
                "orders.koszt_zamowienia", 
                "orders.adres_dostawy", 
                "orders.status", 
                "users.login" 
            ], [
                "ORDER" => ["orders.data_zamowienia" => "DESC"] 
            ]);
        } else {
            // LOGIKA DLA KLIENTA: Pobranie tylko własnych zamówień
            $userId = $this->getLoggedUserId();
            $orders = App::getDB()->select("orders", [
                "orders_id",
                "data_zamowienia",
                "koszt_zamowienia",
                "adres_dostawy",
                "status"
            ], [
                "USERS_id_user2" => $userId, // Filtracja po ID zalogowanego użytkownika
                "ORDER" => ["data_zamowienia" => "DESC"]
            ]);
        }

        // Przekazanie flagi roli i danych do szablonu Smarty
        App::getSmarty()->assign('isPracownik', $isPracownik);
        App::getSmarty()->assign('orders', $orders);
        App::getSmarty()->display('OrderList.tpl');
    } 

    //Akcja wyświetlająca szczegółowy widok konkretnego zamówienia 

    public function action_orderDetails() {
        // Pobranie ID zamówienia z parametrów żądania
        $orderId = ParamUtils::getFromRequest('id');

        if (!$orderId) {
            Utils::addErrorMessage("Błędny numer zamówienia.");
            App::getRouter()->redirectTo("orderList");
            return;
        }

        // Pobranie listy produktów wchodzących w skład zamówienia (JOIN z tabelą products)
        $items = App::getDB()->select("order_items", [
            "[>]products" => ["PRODUCTS_id_product" => "id_product"]
        ], [
            "products.nazwa_produktu",
            "order_items.cena_zakupu",
            "order_items.ilosc"
        ], [
            "order_items.ORDERS_ORDERS_ID" => $orderId
        ]);

        // Pobranie ogólnych informacji o zamówieniu 
        $orderInfo = App::getDB()->get("orders", "*", [
            "orders_id" => $orderId
        ]);

        // Przypisanie danych do widoku szczegółów
        App::getSmarty()->assign('user', SessionUtils::loadObject('user', true));
        App::getSmarty()->assign('isPracownik', RoleUtils::inRole('pracownik'));
        App::getSmarty()->assign('items', $items);
        App::getSmarty()->assign('orderInfo', $orderInfo);

        App::getSmarty()->display('OrderDetails.tpl');
    }

    // Akcja zmiany statusu zamówienia na "wysłane"
     
    public function action_orderShip() {
        $id = ParamUtils::getFromRequest('id');
        $userId = $this->getLoggedUserId(); // ID pracownika wykonującego zmianę

        if (isset($id) && is_numeric($id)) {
            // Aktualizacja statusu i metadanych modyfikacji (RODO/Audyt)
            App::getDB()->update("orders", [
                "ORDER_STATUS_id_status" => 2,         // ID statusu "wysłane"
                "status" => "wysłane",                  // Tekstowy opis statusu
                "modyfikowane_przez" => $userId,       // Kto dokonał zmiany
                "kiedy_modyfikowane" => date("Y-m-d H:i:s") // Data zmiany
            ], [
                "orders_id" => $id
            ]);
            Utils::addInfoMessage("Zamówienie nr $id zostało wysłane.");
        } else {
            Utils::addErrorMessage("Niepoprawne ID zamówienia.");
        }

        // Powrót do listy po wykonaniu operacji
        App::getRouter()->redirectTo("orderList");
    }
}