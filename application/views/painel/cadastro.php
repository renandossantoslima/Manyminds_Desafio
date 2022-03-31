<?php 

	//carrhga a minha view topo
	$this->load->view('topo');

?>

	<h1>Novo colaborador</h1>

	<?php
		echo form_open();//coneço do form
		//lael do nome
		echo form_label('Nome do colaborador','colaborador');
		echo form_input('colaborador');
		//label fornecedor
		echo '<p>' . form_label('É fornecedor:') . '</p>';
		echo form_radio('fornecedor',0);
		echo form_label('Não');
		echo form_radio('fornecedor',1);
		echo form_label('Sim');
		//label ativo
		echo '<p>' . form_label('Está ativo:') . '</p>';
		echo form_radio('aitvo',0);
		echo form_label('Não');
		echo form_radio('ativo',1);
		echo form_label('Sim');
		//label email
		echo '<p>' . form_label('Digite o seu email') . '</p>';
		echo form_input('email');
		//label cidade
		echo '<p>' . form_label('Digite a sua cidade') . '</p>';
		echo form_input('cidade');
		//label estado
		echo '<p>' . form_label('Digite o seu estado') . '</p>';
		echo form_input('estado');
		//label telefone
		echo '<p>' . form_label('Digite o seu telefone') . '</p>';
		echo form_input('telefone');
		echo form_submit('enviar','Salvar');
		echo form_close();//fim do form
	?>


<?php
	//chama a minha view rodape
	$this->load->view('rodape');

?>