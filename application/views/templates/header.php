<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Vida Plena</title> 
	<link href="<?php echo base_url('libs/bootstrap-3.3.7/css/bootstrap.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('libs/bootstrap-3.3.7/css/bootstrap-social.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('libs/font-awesome-4.7.0/css/font-awesome.min.css'); ?>" rel="stylesheet">
	
	<link href="<?php echo base_url('assets/css/cover.css'); ?>" rel="stylesheet"> 
	<link href="<?php echo base_url('assets/css/custom.css'); ?>" rel="stylesheet"> 
	<!-- <link href="https://fonts.googleapis.com/css?family=Raleway:200" rel="stylesheet">  -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400" rel="stylesheet"> 
</head>
<!-- <body ng-app="vidaplenaApp" ng-controller="MainController" >  -->
<body> 
<div class="site-wrapper">
  <div class="site-wrapper-inner">
    <div class="cover-container">
      <header class="masthead clearfix"> 
      	<div class="inner">
			<h3 class="masthead-brand mt-n">
				<a href="../"> <img src="<?php echo base_url('assets/images/vidaplena.png'); ?>" /> </a>
			</h3>
          	<nav>
	            <ul class="nav masthead-nav">
	              <li class="<?php echo @$active['faq']; ?>"><a href="#">Preguntas Frecuentes</a></li>
	              <li class="<?php echo @$active['blog']; ?>"><a href="#">Blog</a></li>
	              <li class="<?php echo @$active['contacto']; ?>"><a href="#">Contacto</a></li>
	              <?php if(@$this->sessionVP){ ?>
	              <li style="vertical-align: bottom;">
		              <a class="link username truncate" href="#" style=""> 
		              	<i class="glyphicon glyphicon-user"></i> <?php echo $this->sessionVP->nombre.' '.$this->sessionVP->apellido_paterno ?>
		              </a>
		              <small style="font-size: 10px;vertical-align: top;">
						<a href="<?php echo site_url('login/logout'); ?>">[Cerrar sesión]</a>
					  </small>
	              </li>
	          	  <?php }else{ ?> 
	          	  <li><a class="btn btn-pink-2 radius" style="padding: 4px; " href='<?php echo site_url('login'); ?>' >
	              	Iniciar Sesión 
	              </a></li>
	              <?php } ?>
	            </ul>
          	</nav>
		</div>
      </header> 