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
		//titulo dinamico
		$dados['titulo'] = 'Produtos - Manyminds';
		//pega as informações do banco
		$dados['produtos'] = $this->produtos->selectAll();
		//chama a view
		$this->load->view('painel/home_produtos',$dados);
	}

	//cadastrar o produto
	public function cadastrar(){
		//regra de validação
		$this->form_validation->set_rules('produto','Produto','trim|required');
		$this->form_validation->set_rules('colaborador','Colaborador','trim|required');
		$this->form_validation->set_rules('ativo','Ativo','trim|required');

		//verifica as verificações
		if($this->form_validation->run() == False){
			if(validation_errors()){
				echo 'Erro(s)<br>' . validation_errors();
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
				echo 'Sucesso ao salvar!<br>';
			}else{
				echo 'Não salvou o produto';
			}
		}

		//titulo dinamico
		$dados['titulo'] = 'Cadastro de Produtos';
		//cham a view
		$this->load->view('painel/cadastroProd',$dados);
	}

	//editar produto
	public function editar(){
		//verificar se foi passao o id
		$id = $this->uri->segment(2);
		if($id > 0){
			//id verificado, continuar com editar
			if($produtos = $this->produtos->selectOne($id)){
				$dados['produto'] = $produtos;
				$dados_update['id'] = $produtos->id;
				//echo 'Tudo ok';
			}else{
				echo 'Não existe o produto com esse id!!!';
			}
		}else{
			echo 'Tente de novo!';
		}

		//regra de validação
		$this->form_validation->set_rules('produto','Produto','trim|required');
		$this->form_validation->set_rules('colaborador','Colaborador','trim|required');
		$this->form_validation->set_rules('ativo', 'Ativo','required');

		//verifica a validação
		if($this->form_validation->run() == False){
			if(validation_errors()){
				echo 'Erro(s)<br>' . validation_errors();
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
				redirect('produtos','refresh');
			}else if($linha == 0){
				echo 'Não foi detectado nenhuma alteração!';
			}else{
				echo 'Erro ao atualizar!';
			}

		}


		//titulo dinamico
		$dados['titulo'] = 'Editar produtos';
		//cham a view
		$this->load->view('painel/editarProd',$dados);
	}
}
