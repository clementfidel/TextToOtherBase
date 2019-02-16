<?php

session_start();
$_SESSION['userData'] = $_POST['txt'];

class MyClasse {

	private $array;
	
	function txtToBin() {  

		$_SESSION['resultBin']  = '';
	  	$_SESSION['resultHexa'] = '';

	  	$this->array=preg_split('//', $_POST['txt'], -1, PREG_SPLIT_NO_EMPTY);
		
		foreach ($this->array as $key => $value) { 
			utf8_encode($value);
			$_SESSION['resultBin']  = $_SESSION['resultBin'] .base_convert(ord($value), 10, 2)."  ";
			$_SESSION['resultHexa'] = $_SESSION['resultHexa'] .base_convert(ord($value), 10, 16)."  ";
		}

		$variable = array('binaire' => $_SESSION['resultBin'],'hexa' => $_SESSION['resultHexa']);
		echo json_encode($variable);	
	}
}

$obj = new MyClasse;
$obj->txtToBin();


?>