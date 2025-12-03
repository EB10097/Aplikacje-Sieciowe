<?php

// podstawowe ustawienia serwera i ścieżek
$conf->server_name = 'localhost';
$conf->server_url = 'http://'.$conf->server_name;

// korzeń aplikacji (dostosuj do katalogu projektu)
$conf->app_root = '/AS6_KK_ochrona_zasobow';

// ścieżka do front-controller z parametrem action
$conf->action_root = $conf->app_root.'/ctrl.php?action=';

// wartości wygenerowane na podstawie powyższych
$conf->action_url = $conf->server_url.$conf->action_root;
$conf->app_url = $conf->server_url.$conf->app_root;
$conf->root_path = dirname(__FILE__);

?>