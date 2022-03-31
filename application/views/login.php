<?php 

	//carrhga a minha view topo
	$this->load->view('topo');

?>

	<h1>Login</h1>

	<?php
		//mostra a mensagem se houver
		if($msg = get_msg()){
			echo '<p>' . $msg .'</p>';
		}

		echo form_open();//inicio form
		//label produto
		echo form_label('Nome de usuario','usuario') . '<br>';
		echo form_input('usuario') . '<br>';

		//label colaborador
		echo form_label('Senha','senha') . '<br>';
		echo form_input('senha') . '<br>';

		echo form_submit('enviar','Entrar');
		echo form_close();//fim form
	?>


<?php
	//chama a minha view rodape
	$this->load->view('rodape');

?>