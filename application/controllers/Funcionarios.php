<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Funcionarios extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		permission();
		$this->load->model("boletins_model");
		$this->load->model("search_model");
	}

	public function index()
	{
		$dados["boletim_funcionarios"]  = $this->boletins_model->getFuncionarios();
		$dados["title"] = "Funcionarios - CodeIgniter";

		$this->load->view('templates/header', $dados);
		$this->load->view('templates/nav-top', $dados);
		$this->load->view('pages/funcionarios', $dados);
		$this->load->view('templates/footer', $dados);
		$this->load->view('templates/js', $dados);
	}

	public function searchFuncionarios() 
	{
		$data["title"] = "Resultado da Pesquisa por *". $_POST["busca_funcionarios"] ."*";
		$data["result"] = $this->search_model->searchFuncionarios($_POST);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/result', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

	public function novoBoletim() 
	{
		$boletim = $_POST;	
		$this->boletins_model->store($boletim);
		redirect("funcionarios");
	}

	public function update($id) 
	{
		$boletim = $_POST;
		$this->boletins_model->update($id, $boletim);
		redirect("funcionarios");
	}

	public function delete($id) 
	{		
		$this->boletins_model->destroy($id);
		redirect("funcionarios");
	}
}