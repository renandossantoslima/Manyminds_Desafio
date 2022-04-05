<?php
//nome para salvalr um controller é sempre a primeira letra maiuscula
defined('BASEPATH') OR exit('No direct script access allowed');

//o nome dos arquivos e classes devem ser os mesmos
class Usuarios extends CI_Controller {

	//construtor constroi tudo o que precisa nos projetos
	function __construct(){
		parent::__construct();
		$this->load->helper('form');//carrega em todo o controller 
		$this->load->library('form_validation');
		$this->load->model('usuario_model','usuario');
	}

	public function index(){
		$this->load->view('sobre');
	}

	public function cadastrar(){
		//verifica o  se está logado
		//verificaLogin();

		//regra de validação
		$this->form_validation->set_rules('usuario','Usuário','trim|required');
		$this->form_validation->set_rules('senha','Senha','trim|required|min_length[5]');

		//verifica as validações
		if($this->form_validation->run() == False){
			if(validation_errors()){
				set_msg(validation_errors());
			}

		}else{
			//recebe s informações da pagina
			$dados_form = $this->input->post();

			//array para inserir na tabela
			$dados_insert['usuario'] = $dados_form['usuario'];
			$dados_insert['senha'] = $dados_form['senha'];

			//slava no banco
			if($this->usuario->inserir($dados_insert)){
				set_msg('Usuario salvo com sucesso!!');
			}else{
				set_msg('Falha ao salvar o usuario');
			}
		}

		//titulo dinamico
		$dados['titulo'] = 'Cadastro Usuario - Manyminds';
		//chama a view
		$this->load->view('painel/cadastroUsuario',$dados);
	}

}