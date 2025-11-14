<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';
//załaduj Smarty
require_once _ROOT_PATH.'/lib/smarty/libs/Smarty.class.php';

//pobranie parametrów
function getParams(&$form){
	$form['kwotaKredytu'] = isset($_REQUEST['kwotaKredytu']) ? $_REQUEST['kwotaKredytu'] : null;
	$form['lataKredytu'] = isset($_REQUEST['lataKredytu']) ? $_REQUEST['lataKredytu'] : null;
	$form['oprocentowanie'] = isset($_REQUEST['oprocentowanie']) ? $_REQUEST['oprocentowanie'] : null;	
}

//walidacja parametrów z przygotowaniem zmiennych dla widoku
function validate(&$form,&$infos,&$msgs,&$hide_intro){

	//sprawdzenie, czy parametry zostały przekazane - jeśli nie to zakończ walidację
	if ( ! (isset($form['kwotaKredytu']) && isset($form['lataKredytu']) && isset($form['oprocentowanie']) ))	return false;	
	
	//parametry przekazane zatem
	//nie pokazuj wstępu strony gdy tryb obliczeń (aby nie trzeba było przesuwać)
	// - ta zmienna zostanie użyta w widoku aby nie wyświetlać całego bloku itro z tłem 
	$hide_intro = true;

	$infos [] = 'Przekazano parametry.';

	// sprawdzenie, czy potrzebne wartości zostały przekazane
	if ( $form['kwotaKredytu'] == "") $msgs [] = 'Nie podano Kwoty Kredytu';
	if ( $form['lataKredytu'] == "") $msgs [] = 'Nie podano Oprocentowania';
	
	//nie ma sensu walidować dalej gdy brak parametrów
	if ( count($msgs)==0 ) {
		// sprawdzenie, czy $x i $y są liczbami całkowitymi
		if (! is_numeric( $form['kwotaKredytu'] )) $msgs [] = 'Kwota Kredytu nie jest liczbą całkowitą';
		if (! is_numeric( $form['oprocentowanie'] )) $msgs [] = 'Oprocentowanie nie jest liczbą rzeczywistą!';
		if ($form['kwotaKredytu'] < 0) $msgs [] = 'Kwota kredytu nie może być ujemna!';
		if ($form['oprocentowanie'] < 0) $msgs [] = 'Oprocentowanie nie może być ujemne!';
	}
	
	if (count($msgs)>0) return false;
	else return true;
}
	
// wykonaj obliczenia
function process(&$form,&$infos,&$msgs,&$result){
	$infos [] = 'Parametry poprawne. Wykonuję obliczenia.';
	
	//konwersja parametrów na int
	$form['kwotaKredytu'] = floatval($form['kwotaKredytu']);
	$form['lataKredytu'] = floatval($form['lataKredytu']);
	$fornm['oprocentowanie'] = floatval($form['oprocentowanie']);
	
	//wykonanie operacji
	$resuilt = ($form['kwotaKredytu'] + ($form['kwotaKredytu'] * ( $form['oprocentowanie'] / 100 ) * $form['lataKredytu'] )) / ( $form['lataKredytu'] * 12 );
	$result = round($resuilt, 2);

	$infos [] = 'Obliczenia wykonane.';
}

//inicjacja zmiennych
$form = null;
$infos = array();
$messages = array();
$result = null;
$hide_intro = false;
	
getParams($form);
if ( validate($form,$infos,$messages,$hide_intro) ){
	process($form,$infos,$messages,$result);
}

// 4. Przygotowanie danych dla szablonu

// inicjalizacja obiektu Smarty i ustawienie katalogu szablonów na /templates
$smarty = new Smarty\Smarty();
// ustawiamy dwa katalogi szablonów: `templates` (layouty) oraz `app` (widoki specyficzne)
$smarty->setTemplateDir(array(
	_ROOT_PATH.'/templates',
	_ROOT_PATH.'/app'
));

$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('page_title','Przykład 04');
$smarty->assign('page_description','Profesjonalne szablonowanie oparte na bibliotece Smarty');
$smarty->assign('page_header','Szablony Smarty');

$smarty->assign('hide_intro',$hide_intro);

//pozostałe zmienne niekoniecznie muszą istnieć, dlatego sprawdzamy aby nie otrzymać ostrzeżenia
$smarty->assign('form',$form);
$smarty->assign('result',$result);
$smarty->assign('messages',$messages);
$smarty->assign('infos',$infos);

// 5. Wywołanie szablonu
// Wyświetlamy widok kalkulatora `calc.html` (znajduje się w katalogu `app`)
$smarty->display('calc.html');