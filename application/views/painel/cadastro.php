<?php 

	//carrhga a minha view topo
	$this->load->view('topo');

?>

	<div class="margin alinhamento">
		<h1 class="alinhamento">Novo colaborador</h1>

		<?php
			//mostra a mensagem se houver
			if($msg = get_msg()){
				echo '<p>' . $msg .'</p>';
			}
			
			echo form_open();//coneço do form
			//lael do nome
			echo '<p>' . form_label('Nome do colaborador:','colaborador') . '</p>';
			echo form_input('colaborador','',array('class' => 'campo'));
			//label fornecedor
			echo '<p>' . form_label('É fornecedor:') . '</p>';
			echo form_radio('fornecedor',0);
			echo form_label('Não');
			echo form_radio('fornecedor',1);
			echo form_label('Sim');
			//label ativo
			echo '<p>' . form_label('Está ativo:') . '</p>';
			echo form_radio('ativo',0);
			echo form_label('Não');
			echo form_radio('ativo',1);
			echo form_label('Sim');
			//label email
			echo '<p>' . form_label('Digite o seu email:') . '</p>';
			echo form_input('email','',array('class' => 'campo'));
			//label cidade
			echo '<p>' . form_label('Digite a sua cidade:') . '</p>';
			echo form_input('cidade','',array('class' => 'campo'));
			//label estado
			echo '<p>' . form_label('Digite o seu estado:') . '</p>';
			echo form_input('estado','',array('class' => 'campo'));
			//label telefone
			echo '<p>' . form_label('Digite o seu telefone:') . '</p>';
			echo form_input('telefone','',array('class' => 'campo')) . '</br>';

			echo form_submit('enviar','Salvar',array('class' => 'botao'));
			echo form_close();//fim do form
		?>
	</div>

<?php
	//chama a minha view rodape
	$this->load->view('rodape');

?>