<?php

/*
	Responsavel por controlar a tabela de usuarios

*/

//nome para salvalr um controller é sempre a primeira letra maiuscula
defined('BASEPATH') OR exit('No direct script access allowed');

//o nome dos arquivos e classes devem ser os mesmos
class Usuario_model extends CI_Model {

	//construtor constroi tudo o que precisa nos projetos
	function __construct(){
		parent::__construct();
	}

	//inserir
	public function inserir($dados){
		$this->db->insert('usuarios',$dados);
		return true;
	}

	//verificação no banco
	public function findOne($dados){
		$this->db->where('usuario',$dados['usuario']);
		$this->db->where('senha',$dados['senha']);
		$query = $this->db->get('usuarios');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return null;
		}
	}

}