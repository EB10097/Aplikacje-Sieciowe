<?php
require_once dirname(__FILE__).'/../config.php';

// KONTROLER strony kalkulatora

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

//ochrona kontrolera - poniższy skrypt przerwie przetwarzanie w tym punkcie gdy użytkownik jest niezalogowany
include _ROOT_PATH.'/app/security/check.php';

//pobranie parametrów
function getParams(&$kwotaKredytu,&$lataKredytu,&$oprocentowanie){
	$kwotaKredytu = isset($_REQUEST['kwotaKredytu']) ? $_REQUEST['kwotaKredytu'] : null;
	$lataKredytu = isset($_REQUEST['lataKredytu']) ? $_REQUEST['lataKredytu'] : null;
	$oprocentowanie = isset($_REQUEST['oprocentowanie']) ? $_REQUEST['oprocentowanie'] : null;	
}

//walidacja parametrów z przygotowaniem zmiennych dla widoku
function validate(&$kwotaKredytu,&$lataKredytu,&$oprocentowanie,&$messages){
    // sprawdzenie, czy parametry zostały przekazane
    if ( ! (isset($kwotaKredytu) && isset($oprocentowanie))) {
        //sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
        $messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
    }

    // sprawdzenie, czy potrzebne wartości zostały przekazane
    if ( $kwotaKredytu == "") {
        $messages [] = 'Nie podano Kwoty Kredytu';
    }
    if ( $oprocentowanie == "") {
        $messages [] = 'Nie podano Oprocentowania';
    }

    //nie ma sensu walidować dalej gdy brak parametrów
    if (count ( $messages ) != 0) return false;
    
    // sprawdzenie, czy oprocentowanie jest liczbą rzeczywistą
    if (! is_numeric( $oprocentowanie )) {
        $messages [] = 'Oprocentowanie nie jest liczbą rzeczywistą!';
    }
    
    // sprawdzenie, czy kwota jest liczbą całkowitą
    if (! ctype_digit( $kwotaKredytu )) {
        $messages [] = 'Kwota Kredytu nie jest liczbą całkowitą';
    }
    
    if ($kwotaKredytu < 0) {
        $messages [] = 'Kwota kredytu nie może być ujemna!';
    }   
    
    if ($oprocentowanie < 0) {
        $messages [] = 'Oprocentowanie nie może być ujemne!';
    }   

    if (count ( $messages ) != 0) return false;
    else return true;
}

function process(&$kwotaKredytu,&$lataKredytu,&$oprocentowanie,&$messages,&$result){
	global $role;
	
	//konwersja parametrów na liczby
	$kwotaKredytu = intval($kwotaKredytu);
	$lataKredytu = intval ($lataKredytu);
	$oprocentowanie = floatval($oprocentowanie);

	if( $kwotaKredytu <= 100000 ){
	$result = ($kwotaKredytu + ($kwotaKredytu * ($oprocentowanie / 100) * $lataKredytu)) / (12 * $lataKredytu);
	}elseif( $kwotaKredytu > 100000  && $role == 'admin'){
		$result = ($kwotaKredytu + ($kwotaKredytu * ($oprocentowanie / 100) * $lataKredytu)) / (12 * $lataKredytu);
	} else {
		$messages [] = 'Tylko menadżer może obliczyć ratę dla kwoty powyżej 100000 !';
		return;
	}
	
	//wykonanie operacji
	
	
	$result = round($result, 2);
}


//definicja zmiennych kontrolera
$kwotaKredytu = null;
$lataKredytu = null;
$oprocentowanie = null;
$result = null;
$messages = array();

//pobierz parametry i wykonaj zadanie jeśli wszystko w porządku
getParams($kwotaKredytu,$lataKredytu,$oprocentowanie);
if (isset($_POST['kwotaKredytu'])) { // tylko po wysłaniu formularza
if ( validate($kwotaKredytu,$lataKredytu,$oprocentowanie,$messages) ) { // gdy brak błędów
	process($kwotaKredytu,$lataKredytu,$oprocentowanie,$messages,$result);
}
}


// Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($kwotaKredytu,$lataKredytu,$oprocentowanie,$messages,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_view.php';