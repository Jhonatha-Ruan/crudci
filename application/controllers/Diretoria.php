<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diretoria extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		permissionDiretoria();
		$this->load->model("boletins_model");
		$this->load->model("search_model");
	}

	public function index()
	{
		$dados["boletim_diretoria"]  = $this->boletins_model->getDiretoria();
		$dados["title"] = "Diretoria - CodeIgniter";

		$this->load->view('templates/header', $dados);
		$this->load->view('templates/nav-top', $dados);
		$this->load->view('pages/diretoria', $dados);
		$this->load->view('templates/footer', $dados);
		$this->load->view('templates/js', $dados);
	}

	public function searchDiretoria() 
	{
		$data["title"] = "Resultado da Pesquisa por *". $_POST["busca_diretoria"] ."*";
		$data["result"] = $this->search_model->searchDiretoria($_POST);

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
		redirect("diretoria");
	}

	public function update($id) 
	{
		$boletim = $_POST;
		$this->boletins_model->update($id, $boletim);
		redirect("diretoria");
	}

	public function delete($id) 
	{		
		$this->boletins_model->destroy($id);
		redirect("diretoria");
	}
}