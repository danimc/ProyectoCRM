<?php
session_start();

date_default_timezone_set("America/Mexico_City"); 

$folio = $_POST["folio"];
$idUsuario = $_POST["idUsuario"];
$mensaje = $_POST["mensaje"];
$Fecha= date('d-m-Y');
$Hora= date('H:i:s');



$coneccion = mysql_connect('127.0.0.1', 'root', '');
	mysql_select_db('crm') or die("Error conectando a la BBDD"); 

	 $sql = mysql_query("INSERT INTO comentarios (folioT,idUs,fecha,hora,texto)
      VALUES ('$folio',  '$idUsuario',  '$Fecha',  '$Hora','$mensaje')",$coneccion) or die ("No ha sido posible Procesar su registro " . mysql_error());

 if(mysql_query($sql, $coneccion))
    {
        
    }
    else
    {

        echo "El registro se a guardado con exito <br> ";
        echo "se redireccionara automaticamente a la pagina anterior en 3 segs.";
        echo" o de Click <a href='../seguimientoTicket.php'>aqui</a>";
        header('location: ../seguimientoTicket.php');
        $_SESSION['folio'] = $folio; 
    }

    mysql_close();

    header('../seguimientoTicket.php');

?>