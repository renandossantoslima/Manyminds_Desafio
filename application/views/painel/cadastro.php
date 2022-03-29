<?php 

	//carrhga a minha view topo
	$this->load->view('topo');

?>

<h1>Novo colaborador</h1>

<?php
	echo form_open();//coneço do form
	echo form_label('Nome do colaborador','colaborador');
	echo form_input('colaborador');
	echo form_submit('enviar','Salvar');
	echo form_close();//fim do form
?>


<?php
	//chama a minha view rodape
	$this->load->view('rodape');

?>