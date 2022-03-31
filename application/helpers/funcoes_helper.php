<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//seta a mensagem
if(!function_exists('set_msg')){
	//seta uma mensagem session para ser lida posteriormente
	function set_msg($msg=Null){
		//recuperar a instacia da classe
		$info = & get_instance();
		$info->session->set_userdata('aviso',$msg);
	}
}

//le a mensagem
if(!function_exists('get_msg')){
	//retorna a mensagem definida pela função set_msg
	function get_msg($destroy=True){
		$info = & get_instance();
		$retorno = $info->session->userdata('aviso');
		if($destroy){
			$info->session->unset_userdata('aviso');
		}
		return $retorno;
	}
}

//verifica se está logado
If(!function_exists('verificalogin')){
	//verifica se o usuario está logado, caso contrario mande para outra pagina
	function verificalogin($redirect='setup/login'){
		$info = & get_instance();
		if($info->session->userdata('logged') != true){
			set_msg('Acesso restrito!!');
			redirect($redirect,'refresh');
		}
	}
}