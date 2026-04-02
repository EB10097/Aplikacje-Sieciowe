<?php
namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\SessionUtils;


class UserListCtrl {

    // Metoda pomocnicza - pobiera ID zalogowanego użytkownika
     
    private function getLoggedUserId() {
        $user = SessionUtils::loadObject('user', true);
        
        if ($user && isset($user->login)) {
            return App:: getDB()->get("users", "id_user", ["login" => $user->login]);
        }
        
        return null;
    }

    public function action_userList() {
        // Pobierz obiekt zalogowanego użytkownika z sesji
        $user = SessionUtils:: loadObject('user', true);
        
        // Pobierz listę wszystkich użytkowników wraz z ich rolami
        $users = App:: getDB()->select("USERS", [
            "[>]USER_ROLES" => ["id_user" => "USERS_id_user"],  
            "[>]ROLES" => ["USER_ROLES.ROLES_id_role" => "id_role"]  
        ], [
            "USERS.id_user",
            "USERS.login",
            "USERS.czy_aktywny",  
            "ROLES.rola_nazwa"     
        ]);

        // Przypisz dane do szablonu Smarty
        App::getSmarty()->assign('user', $user);
        App::getSmarty()->assign('users', $users);
        
        // Wyświetl listę użytkowników
        App::getSmarty()->display('UserList.tpl');
    }

    public function action_userActive() {
        // Pobierz parametry z URL 
        $id = ParamUtils::getFromRequest('id');        
        $active = ParamUtils::getFromRequest('active');
        
        // pobierz ID zalogowanego admina
        $adminId = $this->getLoggedUserId();

        // Jeśli parametry są ustawione - wykonaj zmianę statusu
        if (isset($id) && isset($active)) {
            App::getDB()->update("USERS", [
                "czy_aktywny" => $active,                   
                "zmodyfikowane_przez" => $adminId,          
                "kiedy_modyfikowane" => date("Y-m-d H:i:s") 
            ], ["id_user" => $id]);
            
            // Komunikat zależny od akcji (blokada/odblokowanie)
            $msg = ($active == 1) ? "Użytkownik został odblokowany." :  "Użytkownik został zablokowany.";
            Utils::addInfoMessage($msg);
        }

        // Przekierowanie z powrotem do listy użytkowników
        App:: getRouter()->redirectTo("userList");
    }

    public function action_userChangeRole() {
        // Pobierz parametry z formularza/URL
        $id = ParamUtils::getFromRequest('id');        
        $newRole = ParamUtils::getFromRequest('role'); 
        
        // pobierz ID zalogowanego admina
        $adminId = $this->getLoggedUserId();

        if (isset($id) && isset($newRole)) {
            // Pobierz ID roli na podstawie nazwy
            $roleData = App::getDB()->get("ROLES", "id_role", ["rola_nazwa" => $newRole]);
            
            // Usuń starą rolę użytkownika (użytkownik może mieć tylko jedną rolę)
            App::getDB()->delete("USER_ROLES", [
                "USERS_id_user" => $id
            ]);
            
            // Przypisz nową rolę
            if ($roleData) {
                App::getDB()->insert("USER_ROLES", [
                    "USERS_id_user" => $id,
                    "ROLES_id_role" => $roleData
                ]);
                
                // Zaktualizuj w tabeli users (kto i kiedy zmienił rolę)
                App::getDB()->update("USERS", [
                "zmodyfikowane_przez" => $adminId,           
                "kiedy_modyfikowane" => date("Y-m-d H:i:s"), // DODANO PRZECINEK TUTAJ
                "id_user" => $id // To jest część tablicy z danymi, ale...
                ], ["id_user" => $id]);
                
                // Komunikat sukcesu
                Utils::addInfoMessage("Zmieniono rolę na:  " .  $newRole);
            } else {
                // Rola nie istnieje w bazie (np. literówka)
                Utils::addErrorMessage("Rola nie istnieje!");
            }
        }

        // Przekierowanie z powrotem do listy użytkowników
        App::getRouter()->redirectTo("userList");
    }
}