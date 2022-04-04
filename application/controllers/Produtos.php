<?php
//nome para salvalr um controller é sempre a primeira letra maiuscula
defined('BASEPATH') OR exit('No direct script access allowed');

//o nome dos arquivos e classes devem ser os mesmos
class Produtos extends CI_Controller {

	//construtor constroi tudo o que precisa nos projetos
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('produtos_model','produtos');
	}

	public function index(){
		//verifica login
		verificalogin();
		
		//titulo dinamico
		$dados['titulo'] = 'Produtos - Manyminds';
		//pega as informações do banco
		$dados['produtos'] = $this->produtos->selectAll();
		//chama a view
		$this->load->view('painel/home_produtos',$dados);
	}

	//cadastrar o produto
	public function cadastrar(){
		//verifica login
		verificalogin();

		//regra de validação
		$this->form_validation->set_rules('produto','Produto','trim|required');
		$this->form_validation->set_rules('colaborador','Colaborador','trim|required');
		$this->form_validation->set_rules('ativo','Ativo','trim|required');

		//verifica as verificações
		if($this->form_validation->run() == False){
			if(validation_errors()){
				set_msg(validation_errors());
			}
		}else{
			//informações da pagina
			$dados_form = $this->input->post();

			//array para inserir na tabela
			$dados_insert['produto'] = $dados_form['produto'];
			$dados_insert['colaborador'] = $dados_form['colaborador'];
			$dados_insert['ativo'] = $dados_form['ativo'];

			//salvar no banco
			if($id = $this->produtos->inserir($dados_insert)){
				set_msg('Sucesso ao salvar!');
			}else{
				set_msg('Não salvou o produto!');
			}
		}

		//titulo dinamico
		$dados['titulo'] = 'Cadastro de Produtos';
		//cham a view
		$this->load->view('painel/cadastroProd',$dados);
	}

	//editar produto
	public function editar(){
		//verifica login
		verificalogin();

		//verificar se foi passado o id
		$id = $this->uri->segment(2);
		if($id > 0){
			//id verificado, continuar com editar
			if($produtos = $this->produtos->selectOne($id)){
				$dados['produto'] = $produtos;
				$dados_update['id'] = $produtos->id;
				//echo 'Tudo ok';
			}else{
				set_msg('Não existe o produto com esse id!!!');
			}
		}else{
			set_msg('Tente de novo!');
		}

		//regra de validação
		$this->form_validation->set_rules('produto','Produto','trim|required');
		$this->form_validation->set_rules('colaborador','Colaborador','trim|required');
		$this->form_validation->set_rules('ativo', 'Ativo','required');

		//verifica a validação
		if($this->form_validation->run() == False){
			if(validation_errors()){
				set_msg(validation_errors());
			}
		}else{
			//iformações da pagina
			$dados_form = $this->input->post();

			//array para editar na tabela
			$dados_update['produto'] = $dados_form['produto'];
			$dados_update['colaborador'] = $dados_form['colaborador'];
			$dados_update['ativo'] = $dados_form['ativo'];

			//salva no banco
			if($linha = $this->produtos->editar($dados_update)){
				set_msg('Produto editado com sucesso!');
				redirect('produtos','refresh');
			}else if($linha == 0){
				set_msg('Não foi detectado nenhuma alteração!');
			}else{
				set_msg('Erro ao atualizar!');
			}

		}


		//titulo dinamico
		$dados['titulo'] = 'Editar produtos';
		//cham a view
		$this->load->view('painel/editarProd',$dados);
	}

	//alteração de ativo/inativo
	public function verificacaoProdutos(){
		//verifica login
		verificalogin();

		//verifica se foi passdo o id
		$id = $this->uri->segment(2);
		if($id > 0){
			//id verificado, continuar com verificacaoProdutos
			if($produto = $this->produtos->selectOne($id)){
				$dados_update['id'] = $produto->id;
				$dados_update['produto'] = $produto->produto;
				$ativo = $produto->ativo;
				//echo 'tudo ok ' . $produto->id . '-' . $produto->ativo;
			}else{
				echo 'Não foi encontrado o produto com esse id!';
			}
			
		}else{
			echo 'Tente de novo';
		}

		//mudança de ativo
		if($ativo == 0){
			$dados_update['ativo'] = 1;
			//faz a edição no banco de ativo
			if($linha = $this->produtos->editar($dados_update)){
				set_msg('Produto ' . $dados_update['produto'] . ' reativado');
				redirect('produtos','refresh');
			}else{
				set_msg('Falha ao alterar!');
			}
		}else{
			$dados_update['ativo'] = 0;
			//faz a edição no banco de ativo
			if($linha = $this->produtos->editar($dados_update)){
				set_msg('Produto ' .$dados_update['produto'] . ' inativado');
				redirect('produtos','refresh');
			}else{
				set_msg('Falha ao alterar!');
			}
		}

	}

}
