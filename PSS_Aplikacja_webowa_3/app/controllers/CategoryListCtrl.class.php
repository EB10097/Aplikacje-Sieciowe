<?php
namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\RoleUtils;

class CategoryListCtrl {
    
    public function action_categoryList() {
        // Pobierz wszystkie kategorie z bazy danych
        $categories = App::getDB()->select("CATEGORIES", "*");
        
        // Sprawdź role zalogowanego użytkownika
        $isPracownik = RoleUtils::inRole('pracownik');
        
        // Przypisz dane do szablonu Smarty
        App::getSmarty()->assign('categories', $categories);
        
        // same uprawnienia do kategorii
        App::getSmarty()->assign('isPracownik', $isPracownik );
        
        // Wyświetl widok z listą kategorii
        App:: getSmarty()->display('CategoryList.tpl');
    }

    public function action_categorySave() {
        // Pobierz nazwę kategorii z formularza
        $nazwa = ParamUtils::getFromRequest('nazwa_kategorii');

        // Walidacja:  nazwa musi mieć minimum 3 znaki
        if (isset($nazwa) && strlen($nazwa) > 2) {
            App::getDB()->insert("CATEGORIES", [
                "nazwa_kategori" => $nazwa 
            ]);
            
            Utils::addInfoMessage("Dodano nową kategorię:  " . $nazwa);
        } else {

            Utils::addErrorMessage("Nazwa kategorii musi mieć min. 3 znaki.");
        }

        // Przekierowanie z powrotem do listy kategorii
        App:: getRouter()->redirectTo("categoryList");
    }

    public function action_categoryDelete() {
        // Pobierz ID kategorii do usunięcia
        $id = ParamUtils::getFromRequest('id');

        if (isset($id)) {
            // Sprawdź ile produktów jest przypisanych do tej kategorii
            $count = App::getDB()->count("PRODUCTS", ["CATEGORIES_id_category" => $id]);
            
            // Pozwól usunąć tylko jeśli żaden produkt nie używa tej kategorii
            if ($count == 0) {
                
                App::getDB()->delete("CATEGORIES", ["id_category" => $id]);
                
                Utils::addInfoMessage("Kategoria została usunięta.");
            } else {
                // Blokada usunięcia - istnieją powiązane produkty 
                Utils:: addErrorMessage("Nie można usunąć kategorii, do której są przypisane produkty!");
            }
        }
        App::getRouter()->redirectTo("categoryList");
    }
}