<?php
namespace app\controllers;

class MainCtrl {
    
    public function action_main(){
        getSmarty()->assign('page_title', 'Strona główna');
        getSmarty()->assign('page_header', 'Witaj w systemie');
        getSmarty()->display('main.tpl');
    }
}