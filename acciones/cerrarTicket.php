<?php
session_start();

date_default_timezone_set("America/Mexico_City"); 

$folio = $_POST["ticket"];

$Fecha= date('d-m-Y');
$Hora= date('H:i:s');



$coneccion = mysql_connect('127.0.0.1', 'root', '');
	mysql_select_db('crm') or die("Error conectando a la BBDD"); 

	 $sql = mysql_query("UPDATE tickets SET fechaFin='$Fecha', horaFin='$Hora', estado = 'Cerrado' WHERE folio='$folio'") or die ("No ha sido posible Procesar su registro " . mysql_error());

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