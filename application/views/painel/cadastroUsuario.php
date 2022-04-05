<?php 

	//carrhga a minha view topo
	$this->load->view('topo');

?>

	
	<div class="margin">
		<h1 class="alinhamento">Cadastro de usuário</h1>

		<?php
			//mostra a mensagem se houver
			if($msg = get_msg()){
				echo '<p>' . $msg .'<p>';
			}

			echo form_open();//inicio form
			//label produto
			echo '<p>' . form_label('Nome do usuario:','senha') . '<p>';
			echo form_input('usuario','',array('class' => 'campo')) . '<br>';

			//label colaborador
			echo '<p>' . form_label('Senha:','senha') . '<p>';
			echo form_input('senha','',array('class' => 'campo')) . '<br>';

			echo form_submit('enviar','Salvar',array('class' => 'botao'));
			echo form_close();//fim form
		?>
	</div>

<?php
	//chama a minha view rodape
	$this->load->view('rodape');

?>