<?php
session_start();
unset ( $_session['usuario'] );
session_destroy();
header ('location: ../index.html');
?>