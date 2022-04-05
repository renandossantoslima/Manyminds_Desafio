<?php
//nome para salvalr um controller é sempre a primeira letra maiuscula
defined('BASEPATH') OR exit('No direct script access allowed');

//o nome dos arquivos e classes devem ser os mesmos
class Pagina extends CI_Controller {

	//construtor constroi tudo o que precisa nos projetos
	function __construct(){
		parent::__construct();
		$this->load->helper('form');//carrega em todo o controller 
		$this->load->model('colaboradores_model','colaboradores');
	}

	public function index(){
		//o helper pode ser feito aqui também
		//$this->load->helper('url');//carrega so em index

		//titulo dinamico
		$dados['titulo'] = 'Manyminds';
		//pega as informações do banco
		$dados['colaboradores'] = $this->colaboradores->selectAll();
		//chama a view principal
		$this->load->view('painel/home',$dados);
	}

	//para acessar uma pagina sobre
	public function sobre(){
		//titulo dinamico
		$dados['titulo'] = 'Sobre - Manyminds';
		//chama a view
		$this->load->view('sobre',$dados);
	}

	public function post(){
		//verifica se foi passado o id
		$id = $this->uri->segment(2);
		if($id > 0){
			if($colaboradores = $this->colaboradores->selectOne($id)){
				$dados['colaboradores'] = $colaboradores;
			}else{
				$dados['colaboradores'] = 'Não encontrado';
			}

		}else{
			redirect(base_url(),'refresh');
		}

		$dados['titulo'] = 'Colaboradores';
		//chama view
		$this->load->view('post',$dados);
		
	}

	//para acessar uma pagina sobre
	public function teste(){
		//titulo dinamico
		$dados['titulo'] = 'Sobre - Manyminds';
		//chama a view
		$this->load->view('sobre',$dados);
	}
}