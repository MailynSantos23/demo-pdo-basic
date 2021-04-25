<?php
$usuario = "root";
$password = "";
$dbname = "programacion";

try{
	$conn = new PDO('mysql:host=localhost;dbname='.$dbname, $usuario, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//echo "Conexion satisfactoria";
}catch(PDOException $e){
	echo "ERROR: " . $e->getMessage();
	die();
}
?>