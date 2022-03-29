<?php

/*
	Responsavel por excutar os metodos de login e cadastro de setup

*/

//nome para salvalr um controller é sempre a primeira letra maiuscula
defined('BASEPATH') OR exit('No direct script access allowed');

//o nome dos arquivos e classes devem ser os mesmos
class Setup extends CI_Controller {

	//construtor constroi tudo o que precisa nos projetos
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation')
	}

	public function index(){
		//o helper pode ser feito aqui também
		//$this->load->helper('url');//carrega so em index

		//titulo dinamico
		$dados['titulo'] = 'Manyminds';
		//chama a view principal
		$this->load->view('home',$dados);
	}
}