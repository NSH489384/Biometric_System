<?php
class conexion{

	private static $dbHost = "localhost";
	private static $dbName = "biometric_system";
	private static $dbUsername = "root";
	private static $dbUserpassword = "";

public static function conectar (){

	try {

	$pdo = new PDO("mysql:host=".self::$dbHost.";dbname=".self::$dbName,self::$dbUsername,self::$dbUserpassword);
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	return $pdo;
	}
	catch (exception $e) {
		die ($e->getMessage());
	}
}
}

?>