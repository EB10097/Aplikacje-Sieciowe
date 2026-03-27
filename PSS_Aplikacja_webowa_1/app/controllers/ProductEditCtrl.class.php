<?php
namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\SessionUtils;
use core\RoleUtils;

/**
 * Kontroler edycji i zarządzania produktami (mydłami)
 * 
 * Odpowiada za:
 * - Dodawanie nowych produktów
 * - Edycję istniejących produktów
 * - Usuwanie produktów (soft delete - ukrywanie)
 * - Upload zdjęć produktów
 * - Walidację danych produktu
 * 
 * Dostęp:  Pracownik, Administrator
 * Wszystkie operacje są audytowane (RODO)
 */
class ProductEditCtrl {
    
    //sprawdza czy użytkownik ma uprawnienia do zarządzania produktami
    
    private function checkPermissions() {
        if (!RoleUtils::inRole('pracownik')) {
            Utils::addErrorMessage('Brak uprawnień do tej operacji!');
            App::getRouter()->redirectTo('productList');
            exit;
        }
    }

    private function getLoggedInUserId() {
        $user = SessionUtils::loadObject('user', true);
        
        if ($user && isset($user->login)) {
            
            return App::getDB()->get("users", "id_user", ["login" => $user->login]);
        }
        
        return null;
    }

    
    private function showForm($product = null) {
        // Pobierz zalogowanego użytkownika dla menu
        $user = SessionUtils:: loadObject('user', true);
        
        // Pobierz wszystkie kategorie (select)
        $categories = App::getDB()->select("CATEGORIES", ["id_category", "nazwa_kategori"]);
        
        // Przypisz dane do szablonu Smarty
        App::getSmarty()->assign('user', $user);
        App::getSmarty()->assign('categories', $categories);
        
        // Jeśli dodajemy nowy produkt - utwórz pusty obiekt z wartościami domyślnymi
        // Jeśli edytujemy - użyj przekazanych danych produktu
        App::getSmarty()->assign('product', (object) ($product ?? [
            'id_product' => null,              
            'nazwa_produktu' => '',            
            'CATEGORIES_id_category' => '',    
            'cena' => '',                      
            'opis' => '',                     
            'zdj_sciezka' => null              
        ]));
        
        // Wyświetl formularz (ten sam szablon dla dodawania i edycji)
        App::getSmarty()->display('ProductEdit.tpl');
    }

  
    public function action_productNew() {
        // Sprawdź uprawnienia
        $this->checkPermissions();
        
        // Wyświetl pusty formularz
        $this->showForm();
    }

    public function action_productEdit() {
        // Sprawdź uprawnienia
        $this->checkPermissions();
        
        // Pobierz ID produktu z URL
        $id = ParamUtils::getFromRequest('id');
        
        // Walidacja:  sprawdź czy produkt istnieje
        if (!$id || ! ($product = App::getDB()->get("PRODUCTS", "*", ["id_product" => $id]))) {
            Utils::addErrorMessage("Nie znaleziono wybranego produktu.");
            App::getRouter()->redirectTo("productList");
            return;
        }
        
        // Wyświetl formularz wypełniony danymi produktu
        $this->showForm($product);
    }

   
    public function action_productSave() {
        // Sprawdź uprawnienia
        $this->checkPermissions();
      
        $id = ParamUtils::getFromRequest('id_product');           
        $nazwa = trim(ParamUtils::getFromRequest('nazwa_produktu'));  
        $cena = ParamUtils::getFromRequest('cena');                  
        $opis = trim(ParamUtils::getFromRequest('opis'));            
        $kategoria = ParamUtils::getFromRequest('kategoria_id');      
        
        // Pobierz ID zalogowanego użytkownika 
        $userId = $this->getLoggedInUserId();

        
        $errors = [];
        
        // Walidacja 1: Nazwa jest wymagana
        if (empty($nazwa)) {
            $errors[] = 'Nazwa produktu jest wymagana!';
        }
        
        // Walidacja 2: Kategoria jest wymagana
        if (empty($kategoria)) {
            $errors[] = 'Wybierz kategorię!';
        }
        
        // Walidacja 3: Cena musi być liczbą > 0
        if (empty($cena) || !is_numeric($cena) || $cena <= 0) {
            $errors[] = 'Cena musi być liczbą większą od zera!';
        }

        // Jeśli są błędy walidacji - wyświetl komunikaty i wróć do formularza
        if (!empty($errors)) {
            foreach ($errors as $error) {
                Utils::addErrorMessage($error);
            }
            
            // Przekierowanie zależne od kontekstu 
            if ($id) {
                App::getRouter()->redirectTo("productEdit&id=$id");
            } else {
                App::getRouter()->redirectTo("productNew");
            }
            return;
        }

        
        try {
            // Przygotowanie danych do zapisu (wspólne dla INSERT i UPDATE)
            $data = [
                "nazwa_produktu" => $nazwa,
                "CATEGORIES_id_category" => $kategoria,
                "cena" => $cena,
                "opis" => $opis,
                "modyfikowane_przez" => $userId,           
                "kiedy_modyfikowane" => date("Y-m-d H:i:s")  
            ];

            // Obsługa przesyłania zdjęcia (opcjonalne)
            // Sprawdź czy użytkownik wybrał plik i czy upload się powiódł
            if (isset($_FILES['zdjecie']) && $_FILES['zdjecie']['error'] == 0) {
                $fileName = $this->uploadImage($_FILES['zdjecie']);
                
                if ($fileName) {
                    // Jeśli upload OK - dodaj ścieżkę do danych
                    $data["zdj_sciezka"] = $fileName;
                }
            }

            if ($id) {
                
                //UPDATE istniejącego produktu
                
                App::getDB()->update("PRODUCTS", $data, ["id_product" => $id]);
                
                Utils::addInfoMessage("Zmiany w produkcie zostały zapisane.");
            } else {
               
                // INSERT nowego produktu
                // Dodatkowe pola tylko dla nowego produktu
                $data["utworzone_przez"] = $userId;  
                $data["czy_aktywny"] = 1;            
                
                App::getDB()->insert("PRODUCTS", $data);
                
                Utils::addInfoMessage("Pomyślnie dodano nowe mydło do katalogu.");
            }

            // Przekierowanie do listy produktów po sukcesie
            App::getRouter()->redirectTo("productList");

        } catch (\Exception $e) {
            // Obsługa błędów bazy danych
            Utils::addErrorMessage("Błąd podczas zapisu do bazy danych:  " . $e->getMessage());
            
            // Wyświetl ponownie formularz z błędem
            $this->showForm();
        }
    }

    
    public function action_productDelete() {
        // Sprawdź uprawnienia 
        $this->checkPermissions();
        
        // Pobierz ID produktu do usunięcia
        $id = ParamUtils::getFromRequest('id');
        
        // Pobierz ID zalogowanego użytkownik
        $userId = $this->getLoggedInUserId();
        
        if ($id) {
            // "Miękkie" usuwanie - zmiana statusu aktywności na 0
            // Produkt nadal jest w bazie, ale ukryty przed klientami
            App::getDB()->update("PRODUCTS", [
                "czy_aktywny" => 0,                          
                "modyfikowane_przez" => $userId,             
                "kiedy_modyfikowane" => date("Y-m-d H:i:s")  
            ], ["id_product" => $id]);
            
            Utils::addInfoMessage("Produkt został wycofany ze sprzedaży (ukryty).");
        }
        
        // Przekierowanie do listy produktów
        App::getRouter()->redirectTo("productList");
    }


    private function uploadImage($file) {
        // Ścieżka fizyczna do zapisu plików 
        $dir = $_SERVER['DOCUMENT_ROOT'] .  '/mydla/public/uploads/products/';
        
        // Utwórz katalog jeśli nie istnieje (rekurencyjnie z uprawnieniami 755)
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
        
        // Walidacja 1: Rozmiar pliku (max 5MB = 5 * 1024 * 1024 bajtów)
        if ($file['size'] > 5 * 1024 * 1024) {
            Utils::addErrorMessage('Plik zdjęcia jest za duży (max 5MB)!');
            return false;
        }
        
        // Walidacja 2: sprawdzenie czy to naprawdę obraz
        // Nie ufamy rozszerzeniu pliku - sprawdzamy zawartość
        $allowed = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];
        
        // finfo_file() odczytuje rzeczywisty typ pliku (nie rozszerzenie)
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);
        
        if (!in_array($mime, $allowed)) {
            Utils::addErrorMessage('Niedozwolony format pliku (tylko JPG, PNG, WEBP)!');
            return false;
        }
        
        // Generowanie unikalnej nazwy pliku
        // Format: product_[unikalny_id].[rozszerzenie]
        // Przykład: product_678a3f2b1c9d4. jpg
        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $name = 'product_' . uniqid() . '.' . $extension;
        
        // Przeniesienie pliku z tymczasowej lokalizacji do docelowej
        if (move_uploaded_file($file['tmp_name'], $dir .  $name)) {
            // Sukces - zwróć nazwę pliku (bez ścieżki)
            return $name;
        }
        
        // Błąd podczas zapisu pliku
        Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisywania pliku na serwerze.');
        return false;
    }
}