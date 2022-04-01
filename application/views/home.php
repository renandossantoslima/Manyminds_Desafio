<?php 

	//carrhga a minha view topo
	$this->load->view('topo');

?>


	<h1>Home</h1>

	<h3>Colaboradores</h3>

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

					<p><?php echo $value->nomeColaborador ?></p>
					<a href="<?php echo base_url('index.php/post/'. $value->id);?>">Ver</a>
					<a href="<?php echo base_url('index.php/verificacaoColaboradores/'. $value->id);?>">Reativar</a>
					<hr>

				<?php
					}else{
				?>

					<p><?php echo $value->nomeColaborador ?></p>
					<a href="<?php echo base_url('index.php/editar/'.$value->id);?>">Editar</a>
					<a href="<?php echo base_url('index.php/post/'. $value->id);?>">Ver</a>
					<a href="<?php echo base_url('index.php/verificacaoColaboradores/'. $value->id);?>">Inativar</a>
					<hr>

				<?php } ?>


		<?php }//fim foreach ?>

	<?php }else{
			echo 'Nenhum colaborador!';
	} ?>


<?php
	//chama a minha view rodape
	$this->load->view('rodape');

?>