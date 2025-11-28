<?php
require_once dirname(__FILE__).'/init.php';

require_once $conf->root_path.'/lib/smarty/Smarty.class.php';

$smarty = new \Smarty();
// Ustawienie katalogu szablonu (nowe szablony w `app/views/templates`)
$smarty->setTemplateDir(array($conf->root_path.'/app/views/templates/',));

$smarty->assign('conf', $conf);
$smarty->assign('app_url', $conf->app_url);
$smarty->assign('page_title', 'Strona Główna');

// Wyświetlenie szablonu głównego
$smarty->display('main.tpl');
?>