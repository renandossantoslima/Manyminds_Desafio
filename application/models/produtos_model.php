<?php

/*
	Responsavel por controlar a tabela de produtos (CRUD)

*/

//nome para salvalr um controller é sempre a primeira letra maiuscula
defined('BASEPATH') OR exit('No direct script access allowed');

//o nome dos arquivos e classes devem ser os mesmos
class Produtos_model extends CI_Model {

	//construtor constroi tudo o que precisa nos projetos
	function __construct(){
		parent::__construct();
	}

	//inserir
	public function inserir($dados){
		$this->db->insert('produtos',$dados);
		return $this->db->insert_id();
	}

	//editar
	public function editar($dados){
		//faz um where na tabela
		$this->db->where('id',$dados['id']);
		//para não atualizar o id
		unset($dados['id']);
		$this->db->update('produtos',$dados);
		return $this->db->affected_rows();
	}

	//Seleciona tudo da tabela
	public function selectAll($limit = 0,$offset =0){
		//verifico o limit
		if($limit == 0){
			$this->db->order_by('id','desc');
			$query = $this->db->get('produtos');
			if($query->num_rows() > 0){
				return $query->result();
			}else{
				return null;
			}

		}//if limit
	}

	//Seleciona um resultado
	public function selectOne($id=0){
		$this->db->where('id',$id);
		$query = $this->db->get('produtos');
		if($query->num_rows() > 0){
			$linha = $query->row();
			return $linha;
		}else{
			return null;
		}
	}


}