<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->library('curl');
    }
	public function index(){
        $this->load->model("usuarios_model");
        $lista = $this->usuarios_model->retornaUsuarios();
		$dados = array("usuarios" => $lista);
        $this->load->view('usuarios/index', $dados);
	}
    public function novo(){
        $this->load->library("form_validation");
        $this->form_validation->set_rules("nome", "nome", "required");
        $this->form_validation->set_rules("email", "email", 'trim|required|valid_email');
        $this->form_validation->set_rules("senha", "senha", "required|min_length[6]");
        $this->form_validation->set_rules("confirmarSenha", "confirmarSenha", "required");
        $this->form_validation->set_rules("telefone", "telefone", "required");
        $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
        $sucesso = $this->form_validation->run();
        if($sucesso){
            $usuario = array(
            "nome" => $this->input->post("nome"),
            "email" => $this->input->post("email"),
            "senha" => md5($this->input->post("senha")),
            "confirmarSenha" => md5($this->input->post("confirmarSenha")),
            "telefone" => $this->input->post("telefone"),
            "rg" => $this->input->post("rg"),    
            "rua" => $this->input->post("rua"),
            "bairro" => $this->input->post("bairro"),
            "cidade" => $this->input->post("cidade"),
            "estado" => $this->input->post("estado")
            );
            $this->load->model("usuarios_model");
            $this->usuarios_model->salvaUsuario($usuario);
            $this->session->set_flashdata("success", "Usuário cadastrado com sucesso");
            redirect('/');
        }else{
            $this->load->view("usuarios/formulario");
        } 
    }
    public function formulario(){
        $this->load->view('usuarios/formulario');
    }
    public function consulta(){
        $cep = $this->input->post('cep');
        echo $this->curl->consulta($cep);  
    }    
}
