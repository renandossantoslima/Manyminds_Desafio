<?php 

	//carrhga a minha view topo
	$this->load->view('topo');

?>

	<div class="margin">
		<h1 class="alinhamento">Pagina post</h1>
		<p><?php echo $colaboradores->nomeColaborador; ?></p>
	</div>


<?php
	//chama a minha view rodape
	$this->load->view('rodape');

?>