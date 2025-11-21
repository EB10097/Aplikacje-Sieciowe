<?php

//biblioteka Smarty oraz pomocnicze klasy aplikacji
require_once $conf->root_path.'/lib/smarty/libs/Smarty.class.php';
require_once $conf->root_path.'/lib/Messages.class.php';
require_once $conf->root_path.'/app/CalcForm.class.php';
require_once $conf->root_path.'/app/CalcResult.class.php';


 
 //Kontroler kalkulatora kredytowego. Zawiera metody do pobierania
 //parametrów, ich walidacji, wykonania obliczeń i wygenerowania widoku
 //dane formularza są przechowywane w obiektach `CalcForm` i `CalcResult`,

class CalcCtrl {

	private $msgs;   
	private $form;   
	private $result; 
	private $hide_intro; 

	public function __construct(){
		$this->msgs = new Messages();
		$this->form = new CalcForm();
		$this->result = new CalcResult();
		$this->hide_intro = false;
	}
	
	//pobranie parametrów 
	public function getParams(){
		$this->form->kwotaKredytu = isset($_REQUEST['kwotaKredytu']) ? $_REQUEST['kwotaKredytu'] : null;
		$this->form->lataKredytu = isset($_REQUEST['lataKredytu']) ? $_REQUEST['lataKredytu'] : null;
		$this->form->oprocentowanie = isset($_REQUEST['oprocentowanie']) ? $_REQUEST['oprocentowanie'] : null;
	}
	
    //Walidacja parametrów formularza
	public function validate() {
		if (! (isset($this->form->kwotaKredytu) && isset($this->form->lataKredytu) && isset($this->form->oprocentowanie))) {
			return false; 
		} else { 
			$this->hide_intro = true;
		}
		
		if ($this->form->kwotaKredytu == "") $this->msgs->addError('Nie podano Kwoty Kredytu');
		if ($this->form->lataKredytu == "") $this->msgs->addError('Nie podano lat kredytu');
		if ($this->form->oprocentowanie == "") $this->msgs->addError('Nie podano Oprocentowania');
		
		if (! $this->msgs->isError()) {
			if (! is_numeric($this->form->kwotaKredytu)) $this->msgs->addError('Kwota Kredytu nie jest liczbą');
			if (! is_numeric($this->form->lataKredytu)) $this->msgs->addError('Lata kredytu nie są liczbą');
			if (! is_numeric($this->form->oprocentowanie)) $this->msgs->addError('Oprocentowanie nie jest liczbą');
			
			if ($this->form->kwotaKredytu < 0) $this->msgs->addError('Kwota kredytu nie może być ujemna!');
			if ($this->form->lataKredytu < 0) $this->msgs->addError('Lata kredytu nie mogą być ujemne!');
			if ($this->form->oprocentowanie < 0) $this->msgs->addError('Oprocentowanie nie może być ujemne!');
		}
		
		return ! $this->msgs->isError();
	}
	

    //głowna metoda obslugująca logikę aplikacji
	public function process(){
		$this->getParams();
		
		if ($this->validate()) {
			$this->form->kwotaKredytu = floatval($this->form->kwotaKredytu);
			$this->form->lataKredytu = floatval($this->form->lataKredytu);
			$this->form->oprocentowanie = floatval($this->form->oprocentowanie);
			
			$this->msgs->addInfo('Parametry poprawne. Wykonuję obliczenia.');
				
			$calculation = ($this->form->kwotaKredytu + ($this->form->kwotaKredytu * ($this->form->oprocentowanie / 100) * $this->form->lataKredytu)) / ($this->form->lataKredytu * 12);
			$this->result->result = round($calculation, 2);
			
			$this->msgs->addInfo('Obliczenia wykonane.');
		}
		
		$this->generateView();
	}
	
	 //Przygotowuje dane do widoku i renderuje szablon Smarty, bazująć na poprzednich przykładach
	 
	public function generateView(){
		global $conf;
		
		$smarty = new Smarty\Smarty();
		
		$smarty->setTemplateDir(array(
			$conf->root_path.'/templates',
			$conf->root_path.'/app'
		));

		$smarty->assign('conf',$conf);
		
		$smarty->assign('app_url',$conf->app_url);
		$smarty->assign('root_path',$conf->root_path);
		
		$smarty->assign('page_title','Kalkulator Kredytowy');
		$smarty->assign('page_description','Profesjonalne szablonowanie oparte na bibliotece Smarty');
		$smarty->assign('page_header','Szablony Smarty');
				
		$smarty->assign('hide_intro',$this->hide_intro);
		
		$smarty->assign('msgs',$this->msgs);
		$smarty->assign('form',$this->form);
		$smarty->assign('result',$this->result);
		
		$smarty->display('calc.html');
	}
}