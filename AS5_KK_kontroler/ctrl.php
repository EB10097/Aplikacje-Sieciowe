<?php

require_once 'init.php';

switch ($action) {
	default:
		$ctrl = new \app\controllers\CalcCtrl();
		$ctrl->generateView();
		break;
	case 'calcCompute':
		$ctrl = new \app\controllers\CalcCtrl();
		$ctrl->process();
		break;

	case 'action1':
		// Implementacja action1
		break;

	case 'action2':
		// Implementacja action2
		break;

	
}
