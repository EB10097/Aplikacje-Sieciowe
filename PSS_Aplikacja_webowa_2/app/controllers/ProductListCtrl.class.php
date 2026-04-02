<?php

namespace app\controllers;

use core\App;
use core\ParamUtils;
use core\RoleUtils;
use core\SessionUtils;
use core\Utils;

class ProductListCtrl {

    public function action_productList() {
        // Pobieranie parametrów wyszukiwania i strony
        $search_name = ParamUtils::getFromRequest('sf_nazwa');
        $search_category = ParamUtils::getFromRequest('sf_kategoria');
        $page = ParamUtils::getFromRequest('page');

        // Ustalenie parametrów stronnicowania
        if (!isset($page) || !is_numeric($page) || $page < 1) {
            $page = 1;
        }
        $limit = 2; // Ograniczenie do 2 rekordów na stronę
        $offset = ($page - 1) * $limit;

        // Budowanie warunków zapytania (WHERE)
        $where = [];
        if (isset($search_name) && strlen($search_name) > 0) {
            $where["nazwa_produktu[~]"] = $search_name;
        }

        if (isset($search_category) && $search_category != '' && $search_category != 'wszystkie') {
            $where["CATEGORIES_id_category"] = $search_category;
        }

        // Sprawdzanie ról
        $isAdmin = RoleUtils::inRole('admin');
        $isPracownik = RoleUtils::inRole('pracownik');
        $isKlient = RoleUtils::inRole('klient');

        if (!$isPracownik && !$isAdmin) {
            $where["czy_aktywny"] = 1;
        }

        // Obliczenie łącznej liczby rekordów dla aktualnych filtrów
        $totalRecords = App::getDB()->count("PRODUCTS", $where);
        $totalPages = ceil($totalRecords / $limit);

        // Pobieranie produktów z bazy z uwzględnieniem LIMIT i OFFSET
        // Łączymy filtry i parametry strukturalne w jedną tablicę dla Medoo
        $params = $where; 
        $params["LIMIT"] = [(int)$offset, (int)$limit];
        $params["ORDER"] = ["id_product" => "ASC"]; 

        $records = App::getDB()->select("PRODUCTS", "*", $params);

        
        // Pobieranie wszystkich kategorii dla filtra
        $categories = App::getDB()->select("CATEGORIES", "*");

        // Wczytujemy obiekt użytkownika
        $user = SessionUtils::loadObject('user', true);

        // PRZEKAZANIE DANYCH DO WIDOKU
        App::getSmarty()->assign('isAdmin', $isAdmin);
        App::getSmarty()->assign('isPracownik', $isPracownik);
        App::getSmarty()->assign('isKlient', $isKlient);
        App::getSmarty()->assign('user', $user);
        App::getSmarty()->assign('categories', $categories);
        
        // Dane stronnicowania
        App::getSmarty()->assign('currentPage', $page);
        App::getSmarty()->assign('totalPages', $totalPages);

        App::getSmarty()->assign("searchForm", (object) [
            'nazwa' => $search_name,
            'kategoria' => $search_category
        ]);
        
        App::getSmarty()->assign("produkty", $records);

        // Wyświetlenie widoku
        App::getSmarty()->display("ProductList.tpl");
    }
}