<?php 

	//carrhga a minha view topo
	$this->load->view('topo');

?>

	<h1>Tela produtos</h1>
	<a href="<?php echo base_url('index.php/cadastroProdutos')?>">Novo produto</a>

	<h3>Produtos</h3>
	<?php
		//mostra a mensagem se houver
		if($msg = get_msg()){
			echo '<p>' . $msg .'</p>';
		}
		
		if(isset($produtos) && sizeof($produtos) > 0){
	?>

		<?php
			foreach ($produtos as $key => $value) {//inicio foreach
				
		?>

				<?php 
					if($value->ativo == 0){//inicio do if ativo
				?>
						<p><?php echo $value->produto;?></p>
						<a href="<?php echo base_url('index.php/verificacaoProdutos/' . $value->id);?>">Reativar</a>
						<hr>

				<?php
					}else{
				?>
						<p><?php echo $value->produto;?></p>
						<a href="<?php echo base_url('index.php/editarProdutos/' . $value->id);?>">Editar</a>
						<a href="<?php echo base_url('index.php/verificacaoProdutos/' . $value->id);?>">Inativar</a>
						<hr>

				<?php } ?>

		<?php }//fim foreach ?>

	<?php }else{
			echo 'Nenhum produto!';
	}?>

<?php
	//chama a minha view rodape
	$this->load->view('rodape');

?>