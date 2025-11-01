<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

// 1. pobranie parametrów

$kwotaKredytu = $_REQUEST ['kwotaKredytu'];
$lataKredytu = $_REQUEST ['lataKredytu'];
$oprocentowanie = $_REQUEST ['oprocentowanie'];

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

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
if (empty( $messages )) {
	
	if (! is_numeric( $oprocentowanie )) {
		$messages [] = 'Oprocentowanie nie jest liczbą rzeczywistą!';
	}
	
	// sprawdzenie, czy oprocentowaanie i kwota są liczbami całkowitymi !!!
	if (! ctype_digit( $kwotaKredytu )) {
		$messages [] = 'Kwota Kredytu nie jest liczbą całkowitą';
	}
	
	if ($kwotaKredytu < 0) {
        $messages [] = 'Kwota kredytu nie może być ujemna!';
    }   
    
    if ($oprocentowanie < 0) {
        $messages [] = 'Oprocentowanie nie może być ujemne!';
    }	
	
}

// 3. wykonaj zadanie jeśli wszystko w porządku

if (empty ( $messages )) { // gdy brak błędów
	
	//konwersja parametrów na int
	$kwotaKredytu = intval($kwotaKredytu);
	$lataKredytu = intval ($lataKredytu);
	$oprocentowanie = floatval($oprocentowanie);
	
	//wykonanie operacji
	$result = ($kwotaKredytu + ($kwotaKredytu * ($oprocentowanie / 100) * $lataKredytu)) / (12 * $lataKredytu);
	
	$result = round($result, 2);
}

// 4. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$x,$y,$operation,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_view.php';