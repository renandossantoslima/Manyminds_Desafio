<?php
//nome para salvalr um controller é sempre a primeira letra maiuscula
defined('BASEPATH') OR exit('No direct script access allowed');

//o nome dos arquivos e classes devem ser os mesmos
class Pagina extends CI_Controller {

	//construtor constroi tudo o que precisa nos projetos
	function __construct(){
		parent::__construct();
		$this->load->helper('url');//carrega em todo o controller 
	}

	public function index(){
		//o helper pode ser feito aqui também
		//$this->load->helper('url');//carrega so em index

		//titulo dinamico
		$dados['titulo'] = 'Manyminds';
		//chama a view principal
		$this->load->view('home',$dados);
	}

	//para acessar uma pagina sobre
	public function sobre(){
		//titulo dinamico
		$dados['titulo'] = 'Sobre - Manyminds';
		//chama a view
		$this->load->view('sobre',$dados);
	}
}