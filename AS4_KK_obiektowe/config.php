<?php

require_once 'Config.class.php';

$conf = new Config();

$conf->root_path = dirname(__FILE__);
$conf->server_name = 'localhost:80';
$conf->server_url = 'http://'.$conf->server_name;
$conf->app_root = '/AS4_KK_obiektowe';
$conf->app_url = $conf->server_url.$conf->app_root;

?>