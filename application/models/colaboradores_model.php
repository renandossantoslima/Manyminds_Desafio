<?php

/*
	Responsavel por controlar a tabela de colaboradores (CRUD)

*/

//nome para salvalr um controller é sempre a primeira letra maiuscula
defined('BASEPATH') OR exit('No direct script access allowed');

//o nome dos arquivos e classes devem ser os mesmos
class Colaboradores_model extends CI_Model {

	//construtor constroi tudo o que precisa nos projetos
	function __construct(){
		parent::__construct();
	}

	//inserir
	public function inserir($dados){
		$this->db->insert('teste',$dados);
		return $this->db->insert_id();
	}

	//Seleciona tudo da tabela
	public function selectAll($limit = 0,$offset =0){
		//verifico o limit
		if($limit == 0){
			$this->db->order_by('id','desc');
			$query = $this->db->get('teste');
			if($query->num_rows() > 0){
				return $query->result();
			}else{
				return null;
			}

		}//if limit
	}


}