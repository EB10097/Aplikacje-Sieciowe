<?php
require_once 'init.php';

// Rozszerzenia:
// Dodanie klasy Router oraz Route, które realizują idee przedstawione poprzednio, ale na wyższym poziomie i obiektowo.
// Po pierwsze rezygnujemy ze struktury 'switch' w kontrolerze głównym i zastępujemy ją tablicą ścieżek przechowywaną
// wewnątrz obiektu routera. Router powstaje w skrypcie init.php i jak inne ważne obekty jest dostępny przez getRouter().

// Odpowiednio nazwane metody routera realizują wszystkie zadania iplementowane uprzednio w funkcji control oraz strukturze 'switch'.

// Oczywiście tym samym znika funkcja 'control' - jest ona prywatną metodą routera.

// Ustawienie domyślnej akcji
getRouter()->setDefaultRoute('main'); 
// Ustawienie akcji logowania
getRouter()->setLoginRoute('login'); 

// Rounting

// Akcja strony głównej (MainCtrl)
getRouter()->addRoute('main', 'MainCtrl', ['user', 'admin']);
// Akcje Kalkulatora (CalcCtrl)
getRouter()->addRoute('calcShow',    'CalcCtrl',  ['user', 'admin']);
getRouter()->addRoute('calcCompute', 'CalcCtrl',  ['user', 'admin']);

getRouter()->addRoute('login',       'LoginCtrl');
getRouter()->addRoute('logout',      'LoginCtrl', ['user', 'admin']);
// Uruchomienie routingu (wybór i uruchomienie odpowiedniej ścieżki na podstawie parametru 'action')
getRouter()->go();