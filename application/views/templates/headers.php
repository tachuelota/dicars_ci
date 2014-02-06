<!DOCTYPE html>
<html lang="es_PE">
<head>
	<meta charset="utf-8">
	<title><?php echo $title ?> DiCars</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="DiCars">
	<meta name="author" content="CLM Developers">

	<?php
		echo link_tag('assets/css/bootstrap-spacelab.css');
	?>
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
	<?php
		echo link_tag('assets/css/bootstrap-responsive.css');
		echo link_tag('assets/css/charisma-app.css');
		echo link_tag('assets/css/jquery-ui-1.8.21.custom.css');
		echo link_tag('assets/css/fullcalendar.css');
		echo link_tag('assets/css/fullcalendar.print.css');
		echo link_tag('assets/css/chosen.css');
		echo link_tag('assets/css/uniform.default.css');
		echo link_tag('assets/css/colorbox.css');
		echo link_tag('assets/css/jquery.cleditor.css');
		echo link_tag('assets/css/jquery.noty.css');
		echo link_tag('assets/css/noty_theme_default.css');
		echo link_tag('assets/css/elfinder.min.css');
		echo link_tag('assets/css/elfinder.theme.css');
		echo link_tag('assets/css/jquery.iphone.toggle.css');
		echo link_tag('assets/css/opa-icons.css');
		echo link_tag('assets/css/uploadify.css');
		echo link_tag('assets/css/DicarsDataTable.css');
		echo link_tag('assets/css/datatables.actions.css');
		echo link_tag('assets/css/jqueryvalidation/css/validationEngine.jquery.css');
	?>
	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<!-- link rel="shortcut icon" href="{{ asset('img/favicon.ico')}}"-->

</head>
<body>
	<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.html">
					<?php 
						$image_logo = array
						(
						'src' => 'assets/img/logo20.png',

						'alt' => 'DiCars Logo',
						);
						
						echo img($image_logo);
					?>
					<span>DiCars</span>
				</a>

				<!-- user dropdown starts -->
				<div class="btn-group pull-right" <?php if(isset($isloginview)) echo 'style="display:none"'?> >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#"> <i class="icon-user"></i>
						<span class="hidden-phone">admin</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="{{path('fos_user_profile_edit')}}">Perfil</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="{{path('fos_user_change_password')}}">Cambiar Contraseña</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="<?php echo base_url();?>logout">Salir</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- topbar ends -->
	<div class="container-fluid">
		<div class="row-fluid">