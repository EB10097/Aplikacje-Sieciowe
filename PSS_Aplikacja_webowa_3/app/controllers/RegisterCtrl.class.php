<?php
namespace app\controllers;

use core\App;
use core\ParamUtils;
use core\Message;

class RegisterCtrl {
    
    public function action_registerRender() {
        // Wyświetl formularz rejestracji
        App::getSmarty()->display('RegisterView.tpl');
    }
    
    public function action_register() {
        // Pobierz dane z formularza POST
        // trim() usuwa białe znaki z początku i końca
        $login = trim(ParamUtils::getFromRequest('login'));
        $email = trim(ParamUtils:: getFromRequest('email'));
        $imie = trim(ParamUtils::getFromRequest('imie'));
        $nazwisko = trim(ParamUtils::getFromRequest('nazwisko'));
        $password = ParamUtils::getFromRequest('password');      
        $password2 = ParamUtils::getFromRequest('password2');   
    
        
        // Walidacja 1: Wszystkie pola są wymagane
        if (empty($login) || empty($email) || empty($imie) || empty($nazwisko) || empty($password) || empty($password2)) {
            App::getMessages()->addMessage(new Message('Wypełnij wszystkie pola!', Message:: ERROR));
            App::getRouter()->redirectTo('registerRender');
            return;
        }
        
        // Walidacja 2: Długość loginu (3-50 znaków)
        if (strlen($login) < 3 || strlen($login) > 50) {
            App::getMessages()->addMessage(new Message('Login musi mieć 3-50 znaków! ', Message::ERROR));
            App::getRouter()->redirectTo('registerRender');
            return;
        }
        
        // Walidacja 3: Długość imienia (2-50 znaków)
        if (strlen($imie) < 2 || strlen($imie) > 50) {
            App:: getMessages()->addMessage(new Message('Imię musi mieć 2-50 znaków!', Message::ERROR));
            App::getRouter()->redirectTo('registerRender');
            return;
        }
        
        // Walidacja 4: Długość nazwiska (2-50 znaków)
        if (strlen($nazwisko) < 2 || strlen($nazwisko) > 50) {
            App::getMessages()->addMessage(new Message('Nazwisko musi mieć 2-50 znaków! ', Message::ERROR));
            App::getRouter()->redirectTo('registerRender');
            return;
        }
        
        // Walidacja 5: Format adresu email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            App::getMessages()->addMessage(new Message('Nieprawidłowy adres email!', Message:: ERROR));
            App::getRouter()->redirectTo('registerRender');
            return;
        }
        
        // Walidacja 6: Hasła muszą być identyczne
        if ($password !== $password2) {
            App::getMessages()->addMessage(new Message('Hasła nie są identyczne!', Message:: ERROR));
            App::getRouter()->redirectTo('registerRender');
            return;
        }
        
        // Walidacja 7: Minimalna długość hasła (6 znaków)
        if (strlen($password) < 6) {
            App::getMessages()->addMessage(new Message('Hasło musi mieć min.  6 znaków!', Message::ERROR));
            App::getRouter()->redirectTo('registerRender');
            return;
        }
        
        // Walidacja 8: Sprawdź czy login jest już zajęty
        // has() zwraca true jeśli znaleziono rekord
        if (App::getDB()->has("users", ["login" => $login])) {
            App::getMessages()->addMessage(new Message('Login <strong>' . htmlspecialchars($login) . '</strong> jest już zajęty!', Message::ERROR));
            App::getRouter()->redirectTo('registerRender');
            return;
        }
        
        // Walidacja 9: Sprawdź czy email jest już zarejestrowany
        if (App::getDB()->has("users", ["email" => $email])) {
            App:: getMessages()->addMessage(new Message('Email <strong>' . htmlspecialchars($email) . '</strong> jest już zarejestrowany!', Message::ERROR));
            App::getRouter()->redirectTo('registerRender');
            return;
        }
        //rejestracja nowego użytkownika
        try {
            // Wstaw nowego użytkownika do tabeli 'users'
            $result = App::getDB()->insert("users", [
                "login" => $login,
                "password" => $password,                     // powinno być zahashowane 
                "email" => $email,
                "imie" => $imie,
                "nazwisko" => $nazwisko,
                "czy_aktywny" => 1,                          
                "kiedy_modyfikowane" => date("Y-m-d H:i: s")  
            ]);
            
            if ($result) {
                // Pobierz ID nowo utworzonego użytkownika 
                $newUserId = App::getDB()->id();
                
                // Zaktualizuj pole 'utworzone_przez' - użytkownik utworzył sam siebie
                App::getDB()->update("users", [
                    "utworzone_przez" => $newUserId  
                ], [
                    "id_user" => $newUserId
                ]);
                
                // Przypisz domyślną rolę "klient" (id_role = 3)
                $currentDate = date("Y-m-d H:i:s");
                
                $roleInsert = App::getDB()->insert("user_roles", [
                    "USERS_id_user" => $newUserId,
                    "ROLES_id_role" => 3,            
                    "kiedy_dodano" => $currentDate   
                ]);
                
                // Sprawdź czy przypisanie roli się powiodło 
                if (! $roleInsert) {
                    // Pobierz szczegóły błędu z bazy danych
                    $dbError = App::getDB()->error();
                    App::getMessages()->addMessage(new Message(' Błąd przypisania roli: ' . print_r($dbError, true), Message::WARNING));
                }
                
                // Komunikat sukcesu - witamy nowego użytkownika
                // htmlspecialchars() zabezpiecza przed XSS
                App::getMessages()->addMessage(new Message('Witaj <strong>' . htmlspecialchars($imie) . '</strong>! Rejestracja zakończona.  Możesz się zalogować.', Message::INFO));
                
                // Przekierowanie do strony logowania
                App::getRouter()->redirectTo('login');
            } else {
                // INSERT do tabeli 'users' nie powiódł się
                $dbError = App::getDB()->error();
                App::getMessages()->addMessage(new Message('Błąd rejestracji:  ' . print_r($dbError, true), Message::ERROR));
                App::getRouter()->redirectTo('registerRender');
            }
            
        } catch (\Exception $e) {
            // Obsługa nieoczekiwanych błędów
            App::getMessages()->addMessage(new Message('Wyjątek: ' . $e->getMessage(), Message::ERROR));
            App::getRouter()->redirectTo('registerRender');
        }
    }
}