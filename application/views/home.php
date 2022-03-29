<?php 

	//carrhga a minha view topo
	$this->load->view('topo');

?>


	<h1>Home</h1>

	<?php	
		//mostrar os colaboradores
		if(isset($colaboradores) && sizeof($colaboradores) > 0){
	?>

		<?php
			//foreach para os colaboradores
			foreach ($colaboradores as $key => $value) {//inicio foreach
		?>

			<p><?php echo $value->descricao ?></p>
			<hr>

			<?php }//fim foreach ?>

	<?php }else{
			echo 'Nenhum colaborador!';
	} ?>


<?php
	//chama a minha view rodape
	$this->load->view('rodape');

?>