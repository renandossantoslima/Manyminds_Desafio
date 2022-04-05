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
		//verifica login
		verificalogin();

		//regras de validação
		$this->form_validation->set_rules('colaborador','Colaborador','trim|required');
		$this->form_validation->set_rules('fornecedor', 'Fornecedor','required');
		$this->form_validation->set_rules('ativo', 'Ativo', 'required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|min_length[5]');
		$this->form_validation->set_rules('cidade', 'Cidade','trim|required');
		$this->form_validation->set_rules('estado', 'Estado','trim|required');
		$this->form_validation->set_rules('telefone', 'Telefone','trim|required');

		//verifica as validações
		if($this->form_validation->run() == False){
			if(validation_errors()){
				set_msg(validation_errors());
			}

		}else{
			//informações da pagina recebidas
			$dados_form = $this->input->post();

			//um array para inserir na tabela
			$dados_insert['nomeColaborador'] = $dados_form['colaborador'];
			$dados_insert['fornecedor'] = $dados_form['fornecedor'];
			$dados_insert['ativo'] = $dados_form['ativo'];
			$dados_insert['email'] = $dados_form['email'];
			$dados_insert['cidade'] = $dados_form['cidade'];
			$dados_insert['estado'] = $dados_form['estado'];
			$dados_insert['telefone'] = $dados_form['telefone'];

			//salvar no banco
			if($id = $this->colaboradores->inserir($dados_insert)){
				set_msg('Sucesso ao cadastar o colaborador');
				//redirect('colaboradores','refresh');
				//var_dump($dados_form);//para ver se está pegando valores
			}else{
				set_msg('Fracasso!!!');
			}

		}

		//titulo dinamico
		$dados['titulo'] = 'Cadastar Colaborador - Manyminds';
		//chama a view responsavel pela pagina
		$this->load->view('painel/cadastro',$dados);
	}

	//acessar a pagina editar colaboradores
	public function editar(){
		//verifica login
		verificalogin();

		//varifica se foi passado o id
		$id = $this->uri->segment(2);
		if($id > 0){
			//id informado, continuar com editar
			if($colaboradores = $this->colaboradores->selectOne($id)){
				$dados['colaboradores'] = $colaboradores;
				$dados_update['id'] = $colaboradores->id;
				//echo "tudo certo!!";
			}else{
				set_msg("Não existe colaboradores com esse id!!!!");
				redirect(base_url(),'refresh');
				//redirect('pagina/index','refresh');
			}
		}else{
			set_msg('Tente de novo!!!');
			redirect(base_url(),'refresh');
			//redirect('colaboradores/index','refresh');
		}

		//regras de validação
		$this->form_validation->set_rules('colaborador','Colaborador','trim|required');
		$this->form_validation->set_rules('fornecedor', 'Fornecedor','required');
		$this->form_validation->set_rules('ativo', 'Ativo', 'required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('cidade', 'Cidade','trim|required');
		$this->form_validation->set_rules('estado', 'Estado','trim|required');
		$this->form_validation->set_rules('telefone', 'Telefone','trim|required');

		//verifica as validações
		if($this->form_validation->run() == False){
			if(validation_errors()){
				set_msg(validation_errors());
			}

		}else{
			//informações da pagina
			$dados_form = $this->input->post();

			//um array para iserir na tabela
			$dados_update['nomeColaborador'] = $dados_form['colaborador'];
			$dados_update['fornecedor'] = $dados_form['fornecedor'];
			$dados_update['ativo'] = $dados_form['ativo'];
			$dados_update['email'] = $dados_form['email'];
			$dados_update['cidade'] = $dados_form['cidade'];
			$dados_update['estado'] = $dados_form['estado'];
			$dados_update['telefone'] = $dados_form['telefone'];

			//salvar no banco
			if($linha = $this->colaboradores->editar($dados_update)){
				//echo "Mudado com sucesso!!!!";
				redirect(base_url(),'refresh');
			}else if($linha == 0){
				set_msg("Não foi detectado nenhuma alteração!");
			}else{
				set_msg("Falha ao atualizar!!!!");
			}
		}


		$dados['titulo'] = 'Editar Colaborador - Manyminds';
		//chama a view
		$this->load->view('painel/editar',$dados);
	}

	//verifica se está ativo
	public function verificacaoColaboradores(){
		//verifica login
		verificalogin();

		//verifica se foi passdo o id
		$id = $this->uri->segment(2);
		if($id > 0){
			//id verificado, continuar com verificacaoProdutos
			if($colaboradores = $this->colaboradores->selectOne($id)){
				$dados_update['id'] = $colaboradores->id;
				$dados_update['nomeColaborador'] = $colaboradores->nomeColaborador;
				$ativo = $colaboradores->ativo;
				//echo 'tudo ok ' . $produto->id . '-' . $produto->ativo;
			}else{
				echo 'Não foi encontrado o produto com esse id!';
			}
			
		}else{
			echo 'Tente de novo';
		}

		//mudança de ativo
		if($ativo == 0){
			$dados_update['ativo'] = 1;
			//faz a edição no banco de ativo
			if($linha = $this->colaboradores->editar($dados_update)){
				set_msg('Colaborador ' . $dados_update['nomeColaborador'] . ' reativado');
				redirect(base_url(),'refresh');
			}else{
				set_msg('Falha ao alterar!');
			}
		}else{
			$dados_update['ativo'] = 0;
			//faz a edição no banco de ativo
			if($linha = $this->colaboradores->editar($dados_update)){
				set_msg('Colaborador ' .$dados_update['nomeColaborador'] . ' inativado');
				redirect(base_url(),'refresh');
			}else{
				set_msg('Falha ao alterar!');
			}
		}

	}
	

}