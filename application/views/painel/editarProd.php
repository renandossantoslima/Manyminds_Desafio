<?php 

	//carrhga a minha view topo
	$this->load->view('topo');

?>
	<div class="margin">
	<h1 class="alinhamento">Tela de cadastro de produtos</h1>

	<?php
		//mostra a mensagem se houver
		if($msg = get_msg()){
			echo '<p>' . $msg .'</p>';
		}
		
		echo form_open();//inicio form
		//label produto
		echo '<p>' . form_label('Nome do produto:','produto') . '<p>';
		echo form_input('produto',$produto->produto,array('class' => 'campo')) . '<br>';

		//label colaborador
		echo '<p>' . form_label('Nome do colaborador','colaborador') . '<p>';
		echo form_input('colaborador',$produto->colaborador,array('class' => 'campo')) . '<br>';

		//label ativo
		echo '<p>' . form_label('Está ativo:') . '<p>';
		if($produto->ativo == 0){
			echo form_radio('ativo',0,'checked') . 'Não';
			echo form_radio('ativo',1) . 'Sim<br>';
		}else{
			echo form_radio('ativo',0) . 'Não';
			echo form_radio('ativo',1,'checked') . 'Sim<br>';
		}

		echo form_submit('enviar','Salvar',array('class' => 'botao'));
		echo form_close();//fim form
	?>
	</div>
<?php
	//chama a minha view rodape
	$this->load->view('rodape');

?>