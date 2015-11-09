<!DOCTYPE html>
<html lang="en">
<head>

	<!-- start: Meta -->
	<meta name="viewport" content="width=device−width, initial−scale=1.0" />
	<meta charset="utf-8">
	<title>Ticket</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
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
$usuario = $_SESSION["idUsuario"];

date_default_timezone_set("America/Mexico_City"); 




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
				<a class="brand" href="index.html"><span>CTings</span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						<li class="dropdown hidden-phone">
						
							
						</li>
						
						
						
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> CTings
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Account Settings</span>
								</li>
								<li><a href="#"><i class="halflings-icon user"></i> Profile</a></li>
								<li><a href="login.html"><i class="halflings-icon off"></i> Logout</a></li>
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
	
		<div class="container-fluid-full">
		<div class="row-fluid">


				
			
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Hacer Un Ticket</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="agregarTicket.php" method="POST">
							<fieldset>


							<div class="control-group">
								<label class="control-label">Nombre Usuario</label>
								<div class="controls">
								<input type="text" id="user" name="user" align="center" value=<?php  echo  '"'.$id.'"'; ?>>
								<input type="hidden" name="usuario" value=<?php  echo  '"'.$usuario.'"'; ?>>
								</div>
							  </div>
							

							  


							  <div class="control-group">
								<label class="control-label" id="fecha" name="fecha" >Fecha</label>
								<div class="controls">
								  <input type="text" id="fecha" align="center"name="fecha" value=<?php  echo  '"'.date("Y/m/d").'"'; ?>>
								</div>
							  </div>
							 

							  <div class="control-group">
								<label class="control-label" id="hora" name="hora" >Hora</label>
								<div class="controls">
								<input type="text" id="hora" name="hora" value=	<?php  echo  '"'.date("H:i:s").'"'; ?>>
								</div>
							  </div>
							 

							    <div class="control-group">
								<label class="control-label" id="select" for="select" name="select">Tipo de Incidencia</label>
								<div class="controls">
								  <select id="incidencia" name="incidencia" style=" width:250px">
									 <option value="Soporte Preventivo/Correctivo a Pc">Soporte Preventivo/Correctivo a Pc</option>
              						 <option value="Bases De Datos Corruptas/Dañadas">Bases De Datos Corruptas/Dañadas</option>
              						 <option value="Red e Infraestructura">Red e Infraestructura</option>
             					 	 <option value="Perifericos En General">Perifericos En General</option>
             					     <option value="Software Instalación">Software Instalación</option>
								  </select>
								  
							  </div>
							 </div> 

							   <div class="control-group">
								<label class="control-label" id="descripcion" name="descripcion">Descripción Del Problema</label>
								<div class="controls">
								 <textarea id="descripcion" name="descripcion" > </textarea> </div> </div>
									
							 
							 
							 
							  <div class="form-actions">
								<button type="submit" class="btn btn-primary">Enviar</button>
								<a href="cliente/menuClientes.php" class="btn btn-danger">Cancelar</a>
							  </div>
							</fieldset>
						  </form>
					
					</div>
				</div><!--/span-->
			
			</div><!--/row-->



		


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
