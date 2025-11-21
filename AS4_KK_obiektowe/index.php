<?php
require_once dirname(__FILE__).'/config.php';

require_once $conf->root_path.'/lib/smarty/libs/Smarty.class.php';

$smarty = new Smarty\Smarty();
// Ustawienie katalogu szablonu
$smarty->setTemplateDir(array( $conf->root_path.'/templates'));

$smarty->assign('conf', $conf);
$smarty->assign('app_url', $conf->app_url);
$smarty->assign('page_title', 'Strona Główna');

// Wyświetlenie szablonu głównego
$smarty->display('index.html');
?>