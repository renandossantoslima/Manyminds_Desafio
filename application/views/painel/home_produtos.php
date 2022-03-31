<?php 

	//carrhga a minha view topo
	$this->load->view('topo');

?>

	<h1>Tela produtos</h1>
	<a href="<?php echo base_url('index.php/cadastroProdutos')?>">Novo produto</a>

	<h3>Produtos</h3>
	<?php
		if(isset($produtos) && sizeof($produtos) > 0){
	?>

		<?php
			foreach ($produtos as $key => $value) {//inicio foreach
				
		?>
			<p><?php echo $value->produto;?></p>
			<a href="<?php echo base_url('index.php/editarProdutos/' . $value->id);?>">Editar</a>
			<hr>

		<?php }//fim foreach ?>

	<?php }else{
			echo 'Nenhum produto!';
	}?>

<?php
	//chama a minha view rodape
	$this->load->view('rodape');

?>