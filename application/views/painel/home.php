<?php
	//verifica se o usuario está logado
	$info = & get_instance();
	if($info->session->userdata('logged') != true){
		redirect('setup/login','refresh');	
	}else{//inicio do primeiro else
?>

<?php 

	//carrhga a minha view topo
	$this->load->view('topo');

?>

	<div class="margin"><!--inicio margin -->
		<h1 class="alinhamento">Colaboradores</h1>

		<a href="<?php echo base_url('index.php/cadastro')?>">Novo colaborador</a><br>

		<?php
			//mostra a mensagem se houver
			if($msg = get_msg()){
				echo '<p>' . $msg .'</p>';
			}

			//mostrar os colaboradores
			if(isset($colaboradores) && sizeof($colaboradores) > 0){
		?>

			<?php
				//foreach para os colaboradores
				foreach ($colaboradores as $key => $value) {//inicio foreach
			?>

					<?php
						if($value->ativo == 0){//inicio de if ativo
					?>

						<p><?php echo $value->nomeColaborador ?> (inativo)</p>
						<a href="<?php echo base_url('index.php/post/'. $value->id);?>">Informações |</a>
						<a href="<?php echo base_url('index.php/verificacaoColaboradores/'. $value->id);?>">Reativar</a>
						<hr>

					<?php
						}else{
					?>

						<p><?php echo $value->nomeColaborador ?></p>
						<a href="<?php echo base_url('index.php/editar/'.$value->id);?>">Editar |</a>
						<a href="<?php echo base_url('index.php/post/'. $value->id);?>">Informações |</a>
						<a href="<?php echo base_url('index.php/verificacaoColaboradores/'. $value->id);?>">Inativar</a>
						<hr>

					<?php } ?>


			<?php }//fim foreach ?>

		<?php }else{
				echo 'Nenhum colaborador!';
		} ?>

	</div><!-- fim margin -->

<?php
	 }//fim do primeiro else
?>


<?php
	//chama a minha view rodape
	$this->load->view('rodape');

?>