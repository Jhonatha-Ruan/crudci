<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		permission();
		$this->load->model("boletins_model");
		$this->load->model("search_model");
		//ARRUMAR OS MODAL EM TODOS E TIRAR O RESULT PARA A MESMA PAGINA
	}

	public function index()
	{
		$data["boletim"] = $this->boletins_model->index();
		$data["title"] = "Dashboard - CodeIgniter";

		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/dashboard', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

	// public function new() 
	// {
	// 	$data["title"] = "Boletim - CodeIgniter";

	// 	$this->load->view('templates/header', $data);
	// 	$this->load->view('templates/nav-top', $data);
	// 	$this->load->view('pages/form-boletim', $data);
	// 	$this->load->view('templates/footer', $data);
	// 	$this->load->view('templates/js', $data);
	// }

	public function novoBoletim() 
	{
		$boletim = $_POST;	
		$this->boletins_model->store($boletim);
		redirect("dashboard");
	}

	public function edit($id) 
	{
		$data["boletim"] = $this->boletins_model->show($id);
		$data["title"] = "Editando - CodeIgniter";

		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/form-boletim', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

	public function update($id) 
	{
		$boletim = $_POST;
		$this->boletins_model->update($id, $boletim);
		redirect("dashboard");
	}

	public function delete($id) 
	{		
		$this->boletins_model->destroy($id);
		redirect("dashboard");
	}

	public function funcionarios()
	{
		$dados["boletim_funcionarios"]  = $this->boletins_model->getFuncionarios();
		$dados["title"] = "Funcionarios - CodeIgniter";

		$this->load->view('templates/header', $dados);
		$this->load->view('templates/nav-top', $dados);
		$this->load->view('pages/funcionarios', $dados);
		$this->load->view('templates/footer', $dados);
		$this->load->view('templates/js', $dados);
	}

	public function search() 
	{
		$data["title"] = "Resultado da Pesquisa por *". $_POST["busca"] ."*";
		$data["result"] = $this->search_model->search($_POST);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/result', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

}
