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
	
	<div class="alinhamento">
		<h1>Login</h1>

		<?php
			//mostra a mensagem se houver
			if($msg = get_msg()){
				echo '<p>' . $msg .'</p>';
			}

			echo form_open();//inicio form
			//label produto
			echo form_label('Nome de usuario','usuario') . '<br>';
			echo form_input('usuario','',array('class' => 'campo')) . '<br>';

			//label colaborador
			echo form_label('Senha','senha') . '<br>';
			echo form_password('senha','',array('class' => 'campo')) . '<br>';

			echo form_submit('enviar','Entrar',array('class' => 'botao'));
			echo form_close();//fim form
		?>
		<span>Obs: Se você não tiver um usuario cadastrado tem que pedir para o administrador que faça o seu cadastro.</span>
	</div>

<?php
	//chama a minha view rodape
	$this->load->view('rodape');

?>