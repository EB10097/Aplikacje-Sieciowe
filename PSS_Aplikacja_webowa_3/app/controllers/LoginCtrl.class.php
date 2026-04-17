<?php

namespace app\controllers;

use app\transfer\User;
use app\forms\LoginForm;
use core\App;
use core\Utils;
use core\ParamUtils;
use core\RoleUtils;
use core\SessionUtils;
use core\Message;


class LoginCtrl {
    
    private $form;

    public function __construct() {
        $this->form = new LoginForm();
    }

    
    public function getParams() {
        // Pobierz login z POST (pole input name="login")
        $this->form->login = ParamUtils:: getFromRequest('login');
        
        // Pobierz hasło z POST (pole input name="pass")
        $this->form->pass = ParamUtils::getFromRequest('pass');
    }

    
    public function validate() {
        // Walidacja podstawowa:  Czy pola zostały przesłane?
        if (!(isset($this->form->login) && isset($this->form->pass))) {
            return false;
        }

        // Walidacja 1: Czy login nie jest pusty?
        if ($this->form->login == "") {
            App::getMessages()->addMessage(new Message('Nie podano loginu', Message::ERROR));
        }
        
        // Walidacja 2: Czy hasło nie jest puste?
        if ($this->form->pass == "") {
            App::getMessages()->addMessage(new Message('Nie podano hasła', Message::ERROR));
        }

        // Jeśli nie ma błędów walidacji - sprawdź dane w bazie
        if (!App:: getMessages()->isError()) {
            
            // Pobierz użytkownika z bazy na podstawie loginu
            $user_data = App::getDB()->get("users", "*", ["login" => $this->form->login]);

            // Sprawdź czy użytkownik istnieje I hasło się zgadza, hasło powinno być zahashowane

            if ($user_data && $this->form->pass == $user_data['password']) {
                
                // Jeśli konto zablokowane (czy_aktywny = 0) - odmów dostępu
                if (isset($user_data['czy_aktywny']) && $user_data['czy_aktywny'] != 1) {
                    App::getMessages()->addMessage(new Message('Twoje konto zostało zablokowane.  Skontaktuj się z administratorem.', Message::ERROR));
                    return false;
                }
                
                // Pobierz role użytkownika z JOIN:  user_roles -> roles
                $user_roles = App::getDB()->select("user_roles", [
                    "[>]roles" => ["ROLES_id_role" => "id_role"]  // LEFT JOIN
                ], [
                    "roles.rola_nazwa"  // Pobierz nazwę roli (np. "admin", "pracownik", "klient")
                ], [
                    "USERS_id_user" => $user_data['id_user']  // Filtr:  role tego użytkownika
                ]);

                // Wyciągnij same nazwy ról do tablicy
                $roles_list = array_column($user_roles, 'rola_nazwa');

                // Utwórz obiekt użytkownika (login + główna rola)
                // Jeśli użytkownik nie ma ról - przypisz 'user' jako domyślną
                $user = new \app\transfer\User(
                    $user_data['login'],      // Login użytkownika
                    $roles_list[0] ?? 'user'  // Pierwsza rola (lub 'user' jeśli brak)
                );

                // Będzie dostępny przez:  SessionUtils::loadObject('user')
                SessionUtils::storeObject('user', $user);

                // Dodaj wszystkie role do RoleUtils (używane w routing. php)
                foreach ($roles_list as $role) {
                    \core\RoleUtils:: addRole($role);
                }
                
                // Komunikat sukcesu
                App::getMessages()->addMessage(new Message('Zalogowano pomyślnie', Message::INFO));
                return true;
                
            } else {
                // Użytkownik nie istnieje LUB hasło niepoprawne
                App::getMessages()->addMessage(new Message('Niepoprawny login lub hasło', Message::ERROR));
            }
        }
        
        // Zwróć true tylko jeśli nie ma błędów
        return ! App::getMessages()->isError();
    }

    
    public function action_login() {
        // Pobierz login i hasło z POST
        $this->getParams();
        
        // Waliduj i zaloguj użytkownika
        if ($this->validate()) {

            // Regeneruj ID sesji dla bezpieczeństwa 
            // Tworzy nowy identyfikator sesji, stary jest usuwany
            session_regenerate_id(true);
            
            // Przekieruj do listy produktów (strona główna po zalogowaniu)
            App::getRouter()->redirectTo("productList");
            exit(); // Zatrzymaj dalsze wykonywanie skryptu
            
        } else {
            
            // Wyświetl formularz logowania z komunikatami błędów
            $this->generateView(); 
        }
    }
    
    
    public function action_logout() {
        
        // Usuń wszystkie zmienne z sesji (np. 'user', 'cart', itp.)
        $_SESSION = array();
        
        // Jeśli przeglądarka ma ciasteczko z ID sesji - usuń je
        if (isset($_COOKIE[session_name()])) {
            setcookie(
                session_name(),  // Nazwa ciasteczka (domyślnie PHPSESSID)
                '',              // Wartość pusta
                time() - 3600,   // Czas wygaśnięcia w przeszłości (godzinę temu)
                '/'              // Ścieżka (cała domena)
            );
        }
        
        // Usuń plik sesji z serwera 
        session_destroy();
        
        // Po session_destroy() musimy uruchomić nową sesję
        // Potrzebna do wyświetlenia komunikatu "Poprawnie wylogowano"
        session_start();
        
        // Komunikat potwierdzający wylogowanie
        App::getMessages()->addMessage(new Message('Poprawnie wylogowano', Message::INFO));
        
        // Przekierowanie do strony głównej
        App::getRouter()->redirectTo("mainPage");
        exit(); // Zatrzymaj dalsze wykonywanie skryptu
    }
    
   
    public function generateView() {
        // Przypisz tytuł strony do szablonu
        App::getSmarty()->assign('page_title', 'Strona logowania');
        
        // Przypisz obiekt formularza (zawiera login i hasło - dla wypełnienia pól po błędzie)
        App::getSmarty()->assign('form', $this->form);
        
        // Wyświetl szablon formularza logowania
        App::getSmarty()->display('LoginView.tpl');        
    }
}