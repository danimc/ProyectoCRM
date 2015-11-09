
<!DOCTYPE html>
<html lang="es">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>OAG CRM</title>
	<meta name="description" content="Pagina de administrador CRM">
	<meta name="author" content="L. Mora & C. Alvarez ">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	



	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->
	
		
		
</head>


<body>
<?php
session_start();

$id = $_SESSION["usuario"];
$user = $_SESSION["idUsuario"];


if (isset($_POST['folio'])) {
	$folio = $_POST["folio"];

}else{
	$folio = $_SESSION['folio'];
}



						$coneccion = mysql_connect('127.0.0.1', 'root', '');
						mysql_select_db('crm') or die("Error conectando a la BBDD"); 

						$sql = mysql_query("SELECT *
						FROM tickets 
						INNER JOIN usuario 
						WHERE tickets.usuarioT = usuario.idUsuario
						AND tickets.folio = ". $folio ." ") or die (mysql_error());

						$datos = mysql_fetch_array($sql);
						//Variables del Usuario que levanto el ticket
						$idUsuario = $datos["idUsuario"];
						$username = $datos["usuario"];
						$nombre = $datos["nombre"] . " " . $datos["apellidoP"] . " " . $datos["apellidoM"];	
						$area = $datos["area"];
						$correo = $datos["correo"];
						
						//Variables del ticket	
						$folioTicket = $datos["folio"];
						$fechainicio = $datos["fechaInicio"] . " " . $datos["horaInicio"];
						$fechaFinal = $datos["fechaFin"] . " " . $datos["horaFin"];
						$tipo = $datos["tipo"];
						$descripcion = $datos["descripcion"];
						$status = $datos["estado"];

						mysql_close();



// if(isset($_SESSION['estado']) == 'Autenticado'){

//echo '//
?>
			<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.html"><span>OAG CRM  </span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right"><!--
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white warning-sign"></i>
							</a>
							<ul class="dropdown-menu notifications">
								<li class="dropdown-menu-title">
 									<span>notificaciones</span>
									<a href="#refresh"><i class="icon-repeat"></i></a>
								</li>	
                            	<li>
                                    <a href="#">
										<span class="icon blue"><i class="icon-user"></i></span>
										<span class="message">nuevo usuario</span>
										<span class="time">1</span> 
                                    </a>
                                </li>
								<li>
                                    <a href="#">
										<span class="icon green"><i class="icon-comment-alt"></i></span>
										<span class="message">New comment</span>
										<span class="time">7 min</span> 
                                    </a>
                                </li>
								<li>
                                    <a href="#">
										<span class="icon green"><i class="icon-comment-alt"></i></span>
										<span class="message">New comment</span>
										<span class="time">8 min</span> 
                                    </a>
                                </li>
								<li>
                                    <a href="#">
										<span class="icon green"><i class="icon-comment-alt"></i></span>
										<span class="message">New comment</span>
										<span class="time">16 min</span> 
                                    </a>
                                </li>
								<li>
                                    <a href="#">
										<span class="icon blue"><i class="icon-user"></i></span>
										<span class="message">New user registration</span>
										<span class="time">36 min</span> 
                                    </a>
                                </li>
								<li>
                                    <a href="#">
										<span class="icon yellow"><i class="icon-shopping-cart"></i></span>
										<span class="message">2 items sold</span>
										<span class="time">1 hour</span> 
                                    </a>
                                </li>
								<li class="warning">
                                    <a href="#">
										<span class="icon red"><i class="icon-user"></i></span>
										<span class="message">User deleted account</span>
										<span class="time">2 hour</span> 
                                    </a>
                                </li>
								<li class="warning">
                                    <a href="#">
										<span class="icon red"><i class="icon-shopping-cart"></i></span>
										<span class="message">New comment</span>
										<span class="time">6 hour</span> 
                                    </a>
                                </li>
								<li>
                                    <a href="#">
										<span class="icon green"><i class="icon-comment-alt"></i></span>
										<span class="message">New comment</span>
										<span class="time">yesterday</span> 
                                    </a>
                                </li>
								<li>
                                    <a href="#">
										<span class="icon blue"><i class="icon-user"></i></span>
										<span class="message">New user registration</span>
										<span class="time">yesterday</span> 
                                    </a>
                                </li>
                                <li class="dropdown-menu-sub-footer">
                            		<a>View all notifications</a>
								</li>	
							</ul>
						</li>
						<!-- start: Notifications Dropdown 
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white tasks"></i>
							</a>
							<ul class="dropdown-menu tasks">
								<li class="dropdown-menu-title">
 									<span>You have 17 tasks in progress</span>
									<a href="#refresh"><i class="icon-repeat"></i></a>
								</li>
								<li>
                                    <a href="#">
										<span class="header">
											<span class="title">iOS Development</span>
											<span class="percent"></span>
										</span>
                                        <div class="taskProgress progressSlim red">80</div> 
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="header">
											<span class="title">Android Development</span>
											<span class="percent"></span>
										</span>
                                        <div class="taskProgress progressSlim green">47</div> 
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="header">
											<span class="title">ARM Development</span>
											<span class="percent"></span>
										</span>
                                        <div class="taskProgress progressSlim yellow">32</div> 
                                    </a>
                                </li>
								<li>
                                    <a href="#">
										<span class="header">
											<span class="title">ARM Development</span>
											<span class="percent"></span>
										</span>
                                        <div class="taskProgress progressSlim greenLight">63</div> 
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="header">
											<span class="title">ARM Development</span>
											<span class="percent"></span>
										</span>
                                        <div class="taskProgress progressSlim orange">80</div> 
                                    </a>
                                </li>
								<li>
                            		<a class="dropdown-menu-sub-footer">View all tasks</a>
								</li>	
							</ul>
						</li>
						<!-- end: Notifications Dropdown -->
						<!-- start: Message Dropdown 
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white envelope"></i>
							</a>
							<ul class="dropdown-menu messages">
								<li class="dropdown-menu-title">
 									<span>You have 9 messages</span>
									<a href="#refresh"><i class="icon-repeat"></i></a>
								</li>	
                            	<li>
                                    <a href="#">
										<span class="avatar"><img src="img/avatar.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">
										    	Dennis Ji
										     </span>
											<span class="time">
										    	6 min
										    </span>
										</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>  
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="avatar"><img src="img/avatar.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">
										    	Dennis Ji
										     </span>
											<span class="time">
										    	56 min
										    </span>
										</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>  
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="avatar"><img src="img/avatar.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">
										    	Dennis Ji
										     </span>
											<span class="time">
										    	3 hours
										    </span>
										</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>  
                                    </a>
                                </li>
								<li>
                                    <a href="#">
										<span class="avatar"><img src="img/avatar.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">
										    	Dennis Ji
										     </span>
											<span class="time">
										    	yesterday
										    </span>
										</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>  
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="avatar"><img src="img/avatar.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">
										    	Dennis Ji
										     </span>
											<span class="time">
										    	Jul 25, 2012
										    </span>
										</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>  
                                    </a>
                                </li>
								<li>
                            		<a class="dropdown-menu-sub-footer">View all messages</a>
								</li>	
							</ul>
						</li>-->
						<!-- end: Message Dropdown 
						<li>
							<a class="btn" href="#">
								<i class="halflings-icon white wrench"></i>
							</a>
						</li>
						 start: User Dropdown 
						 -->

						
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i><?php echo $id; ?>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Ajustes de la Cuenta</span>
								</li>
								<li><a href="#"><i class="halflings-icon user"></i> Profile</a></li>
								<li><a href="acciones/logout.php"><i class="halflings-icon off"></i> Logout</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header -->

	<br>
	<!-- inicio de la app-->
	<h2 align="center">Seguimiento al Ticket: #<?php echo $folioTicket;  ?></h2><br>
	<form method="POST" action="acciones/cerrarTicket.php">
	<a title="Regresar" class="btn success" href="menuTickets.php"><span class="icon-arrow-left"></span></a>
		<input type="hidden" name="ticket" value=<?php echo '"'.$folio.'"'; ?>>
		<button title="cerrar Ticket" class="btn btn-danger"><span class="icon-lock"></span> Cerrar Ticket</button>
	</form>
			
				<div class="box span6">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Datos del Solicitante</h2>
						
					</div>
					<div class="box-content">
						<table class="table">
						<tr>
						<th>Username:</th><td><?php echo $username;  ?></td>
						</tr><tr>
						<th>Nombre del Solicitante:</th><td><?php echo $nombre;  ?></td>
						</tr><tr>
						<th>Area</th><td><?php echo $area;  ?></td>
						</tr>
						<tr><th>Correo:</th><td><?php echo $correo;  ?></td>
						</tr>
							
						</table>
						</div>
				</div><!--/span-->
		



				<div class="box span6">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Datos del Ticket</h2>
						
					</div>
					<div class="box-content">
						<table class="table">
						<tr>
						<th>Num. de Folio:</th><td><?php echo $folioTicket;  ?></td>
						</tr><tr>
						<th>Fecha de Reporte:</th><td><?php echo $fechainicio;  ?></td><th>Fecha de Finalizacion:</th><td><?php echo $fechaFinal;  ?></td>
						</tr><tr>
						<th>Tipo de Incidencia</th><td><?php echo $tipo;  ?></td><th>Estatus: </th><td><?php echo $status;  ?></td>
						</tr>
						<th>Descripcion del Problema:</th><td colspan="3"><?php echo $descripcion;  ?></td>
							
						</table>
					
					</div>
				</div><!--/span-->

				<br>
<div class="clearfix"></div>

					<hr>
				<div class="span12 noMarginLeft">
					
					<div class="message dark">
					<div class="header">
					<h1>"Comentarios del Ticket"</h1>
					</div>
							<?php
							$coneccion = mysql_connect('127.0.0.1', 'root', '');
						mysql_select_db('crm') or die("Error conectando a la BBDD"); 

						$sql = mysql_query("SELECT *
						FROM comentarios 
						INNER JOIN tickets
						INNER JOIN usuario 
						WHERE tickets.folio = comentarios.folioT
						AND usuario.idUsuario = comentarios.idUs
						AND tickets.folio =  '$folio' ") or die (mysql_error());

						while($datos = mysql_fetch_array($sql)){
							  ?>
						<div class="header">
							

					

							<div class="from"><i class="halflings-icon user"></i> <b><?php echo $datos["usuario"];  ?></b> / <?php echo $datos["area"];  ?> </div>
							<div class="date"><i class="halflings-icon time"></i>  <b><?php echo $datos["fecha"];  ?></b> / <?php echo $datos["hora"];  ?></div>
							
							<div class="menu"></div>
							
						</div>
						
						<div class="content">
							<p>
							<?php echo $datos["texto"];  ?>								
							</p>
							
								
						</div>


						<?php } mysql_close(); ?>
						
						
						<form class="replyForm"method="post" action="acciones/enviarMensaje.php">

							<fieldset>
								<input type="hidden" name="folio" value=<?php echo '"' . $folioTicket . '"';  ?>>
								<input type="hidden" name="idUsuario" value=<?php echo '"' . $user . '"';  ?>>
								<textarea tabindex="3" class="input-xlarge span9" id="mensaje" name="mensaje" rows="3" placeholder="Mandar Mensaje"></textarea>

								<div class="actions">
									
									<button tabindex="3" type="submit" class="btn btn-success">Enviar Mensaje</button>
									
								</div>

							</fieldset>

						</form>	
						
					</div>	
					
				</div>
				
						
			</div>


			
			
	<!-- fin de la app-->
		<!-- start: JavaScript-->

		<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="js/jquery.ui.touch-punch.js"></script>
	
		<script src="js/modernizr.js"></script>
	
		<script src="js/bootstrap.min.js"></script>
	
		<script src="js/jquery.cookie.js"></script>
	
		<script src='js/fullcalendar.min.js'></script>
	
		<script src='js/jquery.dataTables.min.js'></script>

		<script src="js/excanvas.js"></script>
	<script src="js/jquery.flot.js"></script>
	<script src="js/jquery.flot.pie.js"></script>
	<script src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>
	
		<script src="js/jquery.chosen.min.js"></script>
	
		<script src="js/jquery.uniform.min.js"></script>
		
		<script src="js/jquery.cleditor.min.js"></script>
	
		<script src="js/jquery.noty.js"></script>
	
		<script src="js/jquery.elfinder.min.js"></script>
	
		<script src="js/jquery.raty.min.js"></script>
	
		<script src="js/jquery.iphone.toggle.js"></script>
	
		<script src="js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="js/jquery.gritter.min.js"></script>
	
		<script src="js/jquery.imagesloaded.js"></script>
	
		<script src="js/jquery.masonry.min.js"></script>
	
		<script src="js/jquery.knob.modified.js"></script>
	
		<script src="js/jquery.sparkline.min.js"></script>
	
		<script src="js/counter.js"></script>
	
		<script src="js/retina.js"></script>

		<script src="js/custom.js"></script>
	<!-- end: JavaScript-->
	
</body>
</html>