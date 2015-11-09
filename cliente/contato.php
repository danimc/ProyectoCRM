<?
header('refresh:2; url=http://tbarcino.newyorkdance.com.mx/index1.html#contact'); 
?>
<!DOCTYPE html>

<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Cinzel' rel='stylesheet' type='text/css'>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js" type="text/javascript"></script>
		<script src="js/jquery.min.js"></script>
	<title>Contacto</title>
	<style type="text/css">
		#page{
	background:url(../images/22.jpg) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    }

	</style>

		<link rel="stylesheet" href="estilovi.css" />
</head>
<body id="page">
<div id="polina" align="center" >
<?php
if(isset($_POST['email'])) {


$email_to = "herecom_thehero@hotmail.com";
$email_subject = "Contacto desde Sitio Tequila Barcino";


if(!isset($_POST['name']) ||
!isset($_POST['email']) ||
!isset($_POST['message'])) {

echo "<h2>Ocurrió un error y el formulario no ha sido enviado. </h2><br />";
echo "Por favor, vuelva atrás y verifique la información ingresada<br />";
die();

}

$email_message = "Detalles del formulario de contacto:\n\n";
$email_message .= "Nombre: " . $_POST['name'] . "\n";
$email_message .= "E-mail: " . $_POST['email'] . "\n";
$email_message .= "Comentarios: " . $_POST['message'] . "\n\n";


// Ahora se envía el e-mail usando la función mail() de PHP
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);

echo "Hemos recibido tu correo, en breve nos comunicaremos contigo";
}



?>
</div>
</body>
</html>
