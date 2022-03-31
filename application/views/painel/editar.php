<?php 

	//carrhga a minha view topo
	$this->load->view('topo');

?>

	<h1>Editar colaborador</h1>
	<?php
		//mostra a mensagem se houver
		if($msg = get_msg()){
			echo '<p>' . $msg .'</p>';
		}
		
		echo form_open();//coneço do form
		echo form_label('Nome do colaborador','colaborador');
		echo form_input('colaborador',$colaboradores->nomeColaborador);

		//label fornecedor
		echo '<p>' . form_label('É fornecedor:') . '</p>';
		//regra dos botões checados
		if($colaboradores->fornecedor == 0){
			echo form_radio('fornecedor',0,'checked');
			echo form_label('Não');
			echo form_radio('fornecedor',1);
			echo form_label('Sim');
		}else{
			echo form_radio('fornecedor',0);
			echo form_label('Não');
			echo form_radio('fornecedor',1,'checked');
			echo form_label('Sim');
		}

		//label ativo
		echo '<p>' . form_label('Está ativo:') . '</p>';
		//regra dos botões checados
		if($colaboradores->ativo == 0){
			echo form_radio('ativo',0,'checked');
			echo form_label('Não');
			echo form_radio('ativo',1);
			echo form_label('Sim');
		}else{
			echo form_radio('ativo',0);
			echo form_label('Não');
			echo form_radio('ativo',1,'checked');
			echo form_label('Sim');
		}

		//label email
		echo '<p>' . form_label('Digite o seu email') . '</p>';
		echo form_input('email',$colaboradores->email);

		//label cidade
		echo '<p>' . form_label('Digite a sua cidade') . '</p>';
		echo form_input('cidade',$colaboradores->cidade);

		//label estado
		echo '<p>' . form_label('Digite o seu estado') . '</p>';
		echo form_input('estado',$colaboradores->estado);

		//label telefone
		echo '<p>' . form_label('Digite o seu telefone') . '</p>';
		echo form_input('telefone',$colaboradores->telefone);
		echo form_submit('enviar','Salvar');
		echo form_close();//fim do form
		?>


<?php
	//chama a minha view rodape
	$this->load->view('rodape');

?>