<?php 

	//carrhga a minha view topo
	$this->load->view('topo');

?>
	<div class="margin">
		<h1 class="alinhamento">Atualizar colaborador</h1>
		<?php
			//mostra a mensagem se houver
			if($msg = get_msg()){
				echo '<p>' . $msg .'</p>';
			}
			
			echo form_open();//coneço do form
			echo '<p>' . form_label('Nome do colaborador:','colaborador') . '</p>';
			echo form_input('colaborador',$colaboradores->nomeColaborador,array('class' => 'campo'));

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
			echo '<p>' . form_label('Digite o seu email:') . '</p>';
			echo form_input('email',$colaboradores->email,array('class' => 'campo'));

			//label cidade
			echo '<p>' . form_label('Digite a sua cidade:') . '</p>';
			echo form_input('cidade',$colaboradores->cidade,array('class' => 'campo'));

			//label estado
			echo '<p>' . form_label('Digite o seu estado:') . '</p>';
			echo form_input('estado',$colaboradores->estado,array('class' => 'campo'));

			//label telefone
			echo '<p>' . form_label('Digite o seu telefone:') . '</p>';
			echo form_input('telefone',$colaboradores->telefone,array('class' => 'campo')) . '</br>';

			echo form_submit('enviar','Salvar',array('class' => 'botao'));
			echo form_close();//fim do form
			?>
	</div>

<?php
	//chama a minha view rodape
	$this->load->view('rodape');

?>