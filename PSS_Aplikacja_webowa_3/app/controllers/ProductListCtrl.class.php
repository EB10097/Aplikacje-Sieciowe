<?php

namespace app\controllers;

use core\App;
use core\ParamUtils;
use core\RoleUtils;
use core\SessionUtils;
use core\Utils;

class ProductListCtrl {

    // Metoda pomocnicza wykonująca całą logikę pobierania danych
    // Wspólna dla akcji pełnej i częściowej (AJAX)
    private function doSearch() {
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

        // Budowanie zapytania do bazy danych
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

        // Obliczenie łącznej liczby rekordów
        $totalRecords = App::getDB()->count("PRODUCTS", $where);
        $totalPages = ceil($totalRecords / $limit);

        // Pobieranie danych z tabeli
        $params = $where; 
        $params["LIMIT"] = [(int)$offset, (int)$limit];
        $params["ORDER"] = ["id_product" => "ASC"]; 

        $records = App::getDB()->select("PRODUCTS", "*", $params);
        $categories = App::getDB()->select("CATEGORIES", "*");
        $user = SessionUtils::loadObject('user', true);

        // Przekazanie danych do Smarty
        App::getSmarty()->assign('isAdmin', $isAdmin);
        App::getSmarty()->assign('isPracownik', $isPracownik);
        App::getSmarty()->assign('isKlient', $isKlient);
        App::getSmarty()->assign('user', $user);
        App::getSmarty()->assign('categories', $categories);
        App::getSmarty()->assign('currentPage', $page);
        App::getSmarty()->assign('totalPages', $totalPages);
        App::getSmarty()->assign("searchForm", (object) [
            'nazwa' => $search_name,
            'kategoria' => $search_category
        ]);
        App::getSmarty()->assign("produkty", $records);
    }

    // Pierwsze wejście na strone (Full Page)
    public function action_productList() {
        $this->doSearch();
        App::getSmarty()->display("ProductListFullPage.tpl");
    }

    // Funkcja do wyświetlania tabeli ajax (Same dane tabeli)
    public function action_productListPart() {
        $this->doSearch();
        App::getSmarty()->display("ProductListPart.tpl");
    }
}