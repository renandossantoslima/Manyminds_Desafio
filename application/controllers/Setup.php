<?php

/*
	Responsavel por excutar os metodos de login

*/

//nome para salvalr um controller é sempre a primeira letra maiuscula
defined('BASEPATH') OR exit('No direct script access allowed');

//o nome dos arquivos e classes devem ser os mesmos
class Setup extends CI_Controller {

	//construtor constroi tudo o que precisa nos projetos
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('usuario_model','usuarios');
	}

	public function index(){
		//o helper pode ser feito aqui também
		//$this->load->helper('url');//carrega so em index

		//titulo dinamico
		$dados['titulo'] = 'Manyminds';
		//chama a view principal
		$this->load->view('home',$dados);
	}

	public function login(){
		//regras de validação
		$this->form_validation->set_rules('usuario','Usuário','trim|required');
		$this->form_validation->set_rules('senha','Senha','trim|required');

		//verifica as verificações
		if($this->form_validation->run() == False){
			if(validation_errors()){
				set_msg(validation_errors());
			}
		}else{
			//informações da pagina
			$dados_form = $this->input->post();

			if($this->usuarios->findOne($dados_form) == null){
				//se não achar um dado sendo usuario ou senha
				set_msg('Usuário ou senha estão errados');
			}else{
				//tudo certo
				$this->session->set_userdata('logged',True);
				$this->session->set_userdata('user_login',$dados_form['usuario']);
				redirect(base_url(),'refresh');
			}
			
		}

		//titulo dinamico
		$dados['titulo'] = 'Login - Manyminds';
		//chama a view principal
		$this->load->view('login',$dados);
	}

	//logout
	public function logout(){
		//destroi os dados da seção
		$this->session->unset_userdata('logged');
		$this->session->unset_userdata('user_login');
		set_msg('Você saiu do sistema!');
		redirect('setup/login','refresh');
	}

}