<?php

$rol = $_POST['rol'];




$coneccion = mysql_connect('127.0.0.1', 'root', '');
	mysql_select_db('crm') or die("Error conectando a la BBDD"); 

	 $sql = mysql_query("INSERT INTO rol (rol)
          VALUES ('$rol')",$coneccion) or die ("No ha sido posible Procesar su registro " . mysql_error());

 if(mysql_query($sql, $coneccion))
    {
        
    }
    else
    {
        echo "El registro se a guardado con exito <br> ";
        echo "se redireccionara automaticamente a la pagina anterior en 3 segs.";
        echo" o de Click <a href='../menuUsuarios.php'>aqui</a>";
    }

    mysql_close();

    header('refresh: 3; url = ../menuUsuarios.php');

?>