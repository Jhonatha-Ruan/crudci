<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		permissionDiretoria();
		$this->load->model("users_model");
		$this->load->model("search_model");		
	}

	public function index()
	{
		$data["users"] = $this->users_model->getUsers();
		$data["title"] = "Usuários";
	
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/users', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

	public function update($id) 
	{
		$user = $_POST;
		$user = array(
			"name" => $_POST["name"],
			"country" => $_POST["country"],
			"email" => $_POST["email"],
			"password" => md5($_POST["password"])
		);
		$this->users_model->update($id, $user);
		redirect("users");
	}

	public function delete($id) 
	{		
		$this->users_model->delete($id);
		redirect("users");
	}

	public function searchUsers() 
	{
		$data["title"] = "Resultado da Pesquisa por *". $_POST["search_users"] ."*";
		$data["users"] = $this->search_model->searchUsers($_POST);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/users', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}
}
