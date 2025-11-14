<?php
require_once dirname(__FILE__).'/config.php';

// Wyświetlamy stronę główną `index.html` przez Smarty.
// Kontroler kalkulatora pozostaje dostępny pod `/app/calc.php`.
require_once _ROOT_PATH.'/lib/smarty/libs/Smarty.class.php';

$smarty = new Smarty\Smarty();
$smarty->setTemplateDir(_ROOT_PATH.'/templates');

$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('page_title','Strona główna');
$smarty->assign('page_description','Strona startowa aplikacji');

$smarty->display('index.html');