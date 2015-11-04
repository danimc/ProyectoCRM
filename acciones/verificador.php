<?php
session_start();
$_session["usuario"]=$_POST["usuario"];
$_session["password"]=$_POST["password"];

$usercorrect = $_session["usuario"];
$passcorrect = $_session["password"];

$coneccion = mysql_connect('127.0.0.1', 'root', '');
	mysql_select_db('crm') or die("Error conectando a la BBDD"); 

$sql = mysql_query("SELECT usuario,password
	FROM usuario
	WHERE usuario = '$usercorrect'
	AND password = '$passcorrect' ") or die (mysql_error());

$datos = mysql_fetch_array($sql);

$userLogin = $datos[0];
$passLogin = $datos[1];
$rol = $datos[2];


if(isset($userLogin)){
	if($userLogin == $usercorrect && $passLogin == $passcorrect){
		if ($rol = 2){
		
			header('location: ../inicio.php');
			$_SESSION['estado'] = 'ok'; 
			$_SESSION['usuario'] = $userLogin;
		
		}
		
	}else{
		echo "<h2> usuario o contraseña incorrecta </h2>";
		header('refresh: 5; url = ../index.html');
	}

}else{
		echo "Usuario o contraseña incorrecta";
		header('refresh: 5; url = ../index.html');
	}
?>