<?php 

	//carrhga a minha view topo
	$this->load->view('topo');

?>

	<h1>Tela de cadastro de produtos</h1>

	<?php
		//mostra a mensagem se houver
		if($msg = get_msg()){
			echo '<p>' . $msg .'</p>';
		}

		echo form_open();//inicio form
		//label produto
		echo form_label('Nome do produto:','produto') . '<br>';
		echo form_input('produto') . '<br>';

		//label colaborador
		echo form_label('Nome do colaborador','colaborador') . '<br>';
		echo form_input('colaborador') . '<br>';

		//label ativo
		echo form_label('Está ativo:') . '<br>';
		echo form_radio('ativo',0) . 'Não';
		echo form_radio('ativo',1) . 'Sim<br>';

		echo form_submit('enviar','Salvar');
		echo form_close();//fim form
	?>

<?php
	//chama a minha view rodape
	$this->load->view('rodape');

?>