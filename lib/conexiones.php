<?php
	function conecta_BD()	
	{		
		//$servidor = "192.168.6.37";
		//$usuario = "cns-page";
		//$password = "##cns-page%%";
		//$baseDatos = "cns-page";

		$servidor = "localhost";
		$usuario = "root";
		$password = "toor";
		$baseDatos = "solicitudes_cns";
		
		
		$con = new mysqli($servidor, $usuario, $password, $baseDatos);
		
		return $con;
	}

	//Croatoan-15
?>
