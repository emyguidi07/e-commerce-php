<?php
	$servidor="localhost";
	$banco="bdaulapw3";
	$usuario="root";
	$senha="";

	$pdo = new PDO("mysql:host=$servidor;dbname=$banco",$usuario,$senha);		
?>