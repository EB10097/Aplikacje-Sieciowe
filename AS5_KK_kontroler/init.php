<?php
// inicjalizacja aplikacji

// załaduj klasę konfiguracji i wczytaj ustawienia projektu
require_once 'core/Config.class.php';
$conf = new Config();
require_once 'config.php'; // ustawia wartości $conf

function &getConf(){ global $conf; return $conf; }

// załaduj klasę Messages i utwórz obiekt
require_once 'core/Messages.class.php';
$msgs = new Messages();
function &getMessages(){ global $msgs; return $msgs; }

$smarty = null;
function &getSmarty(){
	global $smarty;
	if (!isset($smarty) || $smarty === null){
		include_once getConf()->root_path . '/lib/smarty/Smarty.class.php';
		$smarty = new \Smarty();
		// przypisz konfigurację i messages
		$smarty->assign('conf', getConf());
		$smarty->assign('msgs', getMessages());
        // ustaw katalogi szablonów
		$smarty->setTemplateDir(array(
			'one' => getConf()->root_path.'/app/views/templates/',
			'two' => getConf()->root_path.'/app/views/',
		));
	}
	return $smarty;
}
require_once 'core/ClassLoader.class.php'; //załaduj i stwórz loader klas
$cloader = new core\ClassLoader();
function &getLoader() {
    global $cloader;
    return $cloader;
}

require_once 'core/functions.php';

$action = getFromRequest('action');