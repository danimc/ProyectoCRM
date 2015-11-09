<?php
session_start();



$usuario = $_POST["usuario"];
$contingencia = $_POST["incidencia"];
$descripcion = $_POST["descripcion"];
$fecha = $_POST["fecha"];
$hora = $_POST["hora"];
$estatus = "abierto";


$coneccion = mysql_connect('127.0.0.1', 'root', '');
    mysql_select_db('crm') or die(mysql_error());
	 
     $sql = mysql_query("INSERT INTO tickets (fechaInicio,
        horaInicio,tipo,descripcion,estado, usuarioT)
          VALUES ('$fecha',  '$hora',  '$contingencia', 
           '$descripcion', '$estatus', '$usuario')",$coneccion) or die ("No ha sido posible Procesar su registro " . mysql_error());

 if(mysql_query($sql, $coneccion))
    {
        
    }
    else
    {
        echo $usuario;
        echo "El registro se a guardado con exito <br> ";
        echo "se redireccionara automaticamente a la pagina anterior en 3 segs.";
        echo" o de Click <a href='/menuCliente.php'>aqui</a>";
    }

    mysql_close();

    header('refresh: 3; url = /../menuCliente.php');

?>