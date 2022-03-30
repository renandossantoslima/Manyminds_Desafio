<?php
//nome para salvalr um controller é sempre a primeira letra maiuscula
defined('BASEPATH') OR exit('No direct script access allowed');

//o nome dos arquivos e classes devem ser os mesmos
class Colaboradores extends CI_Controller {

	//construtor constroi tudo o que precisa nos projetos
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('colaboradores_model','colaboradores');
	}

	public function index(){
		$this->load->view('painel/home');
	}

	//acessa a pagina cadastro colaboradores
	public function cadastrar(){

		//regras de validação
		$this->form_validation->set_rules('colaborador','Colaborador','trim|required');

		//verifica as validações
		if($this->form_validation->run() == False){
			if(validation_errors()){
				echo 'Erro' . validation_errors();
			}

		}else{
			//informações da pagina recebidas
			$dados_form = $this->input->post();

			//um array para inserir na tabela
			$dados_insert['descricao'] = $dados_form['colaborador'];

			//salvar no banco
			if($id = $this->colaboradores->inserir($dados_insert)){
				echo 'Sucesso!!!!!!!';
				//redirect('colaboradores','refresh');
				//var_dump($dados_form);//para ver se está pegando valores
			}else{
				echo 'Fracasso!!!';
			}

		}

		//titulo dinamico
		$dados['titulo'] = 'Cadastar Colaborador - Manyminds';
		//chama a view responsavel pela pagina
		$this->load->view('painel/cadastro',$dados);
	}

	//acessar a pagina editar colaboradores
	public function editar(){

		//varifica se foi passado o id
		$id = $this->uri->segment(2);
		if($id > 0){
			//id informado, continuar co editar
			if($colaboradores = $this->colaboradores->selectOne($id)){
				$dados['colaboradores'] = $colaboradores;
				$dados_update['id'] = $colaboradores->id;
				//echo "tudo certo!!";
			}else{
				echo "Não existe colaboradores!!!!";
				//redirect('pagina/index','refresh');
			}
		}else{
			echo 'Tente de novo!!!';
			//redirect('colaboradores/index','refresh');
		}

		//regras de validação
		$this->form_validation->set_rules('colaborador','Colaborador','trim|required');

		//verifica as validações
		if($this->form_validation->run() == False){
			if(validation_errors()){
				echo 'Erro' . validation_errors();
			}

		}else{
			//informações da pagina
			$dados_form = $this->input->post();

			//um array para iserir na tabela
			$dados_update['descricao'] = $dados_form['colaborador'];

			//salvar no banco
			if($this->colaboradores->editar($dados_update)){
				echo "Mudado com sucesso!!!!";
			}else{
				echo "Falha ao atualizar!!!!";
			}
		}


		$dados['titulo'] = 'Editar Colaborador - Manyminds';
		//chama a view
		$this->load->view('painel/editar',$dados);
	}

}