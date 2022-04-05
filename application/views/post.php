<?php 

	//carrhga a minha view topo
	$this->load->view('topo');

?>

	<div class="margin alinhamento">
		<h1>Informações do colaborador</h1>

		<!-- nome do colaborador -->
		<p>Nome do colaborador: <?php echo $colaboradores->nomeColaborador; ?></p>

		<!-- fornacedor -->
		<?php
			if($colaboradores->fornecedor == 0){
		?>
				<p>Está ativo: Não</p>

		<?php
			}else{
		?>
				<p>Está aitvo: Sim</p>
		<?php } ?>

		<!-- ativo -->
		<?php
			if($colaboradores->ativo == 0){
		?>
				<p>Está ativo: Não</p>

		<?php
			}else{
		?>
				<p>Está aitvo: Sim</p>
		<?php } ?>

		<!-- email -->
		<p>Email: <?php echo $colaboradores->email; ?></p>

		<!-- cidade -->
		<p>Cidade: <?php echo $colaboradores->cidade; ?></p>

		<!-- estado -->
		<p>Estado: <?php echo $colaboradores->estado; ?></p>

		<!-- telefone -->
		<p>Telefone: <?php echo $colaboradores->telefone; ?></p>

	</div>


<?php
	//chama a minha view rodape
	$this->load->view('rodape');

?>