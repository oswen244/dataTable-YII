<?php

class SaludoController extends Controller{
	

	public function actionIndex(){

		$saludo = 'Hola mundo';
		$this->render('index',  array('saludo' => $saludo));
	}
}
	
?>