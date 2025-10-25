<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

// 1. pobranie parametrów

$KwotaKredytu = $_REQUEST ['KwotaKredytu'];
$LataKredytu = $_REQUEST ['LataKredytu'];
$Oprocentowanie = $_REQUEST ['Oprocentowanie'];

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

// sprawdzenie, czy parametry zostały przekazane
if ( ! (isset($KwotaKredytu) && isset($Oprocentowanie))) {
	//sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

// sprawdzenie, czy potrzebne wartości zostały przekazane
if ( $KwotaKredytu == "") {
	$messages [] = 'Nie podano Kwoty Kredytu';
}
if ( $Oprocentowanie == "") {
	$messages [] = 'Nie podano Oprocentowania';
}

//nie ma sensu walidować dalej gdy brak parametrów
if (empty( $messages )) {
	
	if (! is_numeric( $Oprocentowanie )) {
		$messages [] = 'Oprocentowanie nie jest liczbą rzeczywistą!';
	}
	
	// sprawdzenie, czy oprocentowaanie i kwota są liczbami całkowitymi !!!
	if (! ctype_digit( $KwotaKredytu )) {
		$messages [] = 'Kwota Kredytu nie jest liczbą całkowitą';
	}
	
	if ($KwotaKredytu < 0) {
        $messages [] = 'Kwota kredytu nie może być ujemna!';
    }   
    
    if ($Oprocentowanie < 0) {
        $messages [] = 'Oprocentowanie nie może być ujemne!';
    }	
	
}

// 3. wykonaj zadanie jeśli wszystko w porządku

if (empty ( $messages )) { // gdy brak błędów
	
	//konwersja parametrów na int
	$KwotaKredytu = intval($KwotaKredytu);
	$Oprocentowanie = floatval($Oprocentowanie);
	
	//wykonanie operacji
	$result = ($KwotaKredytu + ($KwotaKredytu * ($Oprocentowanie / 100) * $LataKredytu)) / (12 * $LataKredytu);
	
	$result = round($result, 2);
}

// 4. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$x,$y,$operation,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_view.php';