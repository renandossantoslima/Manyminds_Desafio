<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $titulo; ?></title>
		<meta content-type='text/html' charset="utf-8">

		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/estilo.css');?>">

		<!--Bootstrap -->
		<!--link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"-->
	</head>
	<body>

	<ul>
		<li><a href="<?php echo base_url();?>">Home</a></li>

		<?php
			//se logado é usuario adm
			$info = & get_instance();
			if($info->session->userdata('logged') == true && $info->session->userdata('user_login') == 'adm'){	
		?>
				<li><a href="<?php echo base_url('index.php/produtos');?>">Produtos</a></li>
				<li><a href="<?php echo base_url('index.php/cadUsuario');?>">Usuarios</a></li>
		<?php } ?>

		<li><a href="<?php echo base_url('index.php/sobre');?>">Sobre</a></li>
		<li style="float: right;"><a href="<?php echo base_url('index.php/logout');?>">Sair</a></li>
	</ul>
	