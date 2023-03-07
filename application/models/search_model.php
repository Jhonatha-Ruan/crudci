<?php

class Search_model extends CI_Model {

    public function search($busca) 
    {
        if(empty($busca)) {
            return array();
        }

        $busca = $this->input->post("busca");
        $this->db->like("titulo", $busca);
        return $this->db->get("tb_boletins")->result_array();
    }

    public function searchDiretoria($busca) 
    {
        if(empty($busca)) {
            return array();
        }

        $busca = $this->input->post("busca_diretoria");
        $this->db->where('nivel_permissao', 'Diretoria');
        $this->db->like("titulo", $busca);
        return $this->db->get("tb_boletins")->result_array();
    }

    public function searchFuncionarios($busca) 
    {
        if(empty($busca)) {
            return array();
        }

        $busca = $this->input->post("busca_funcionarios");
        $this->db->where('nivel_permissao', 'Funcionarios');
        $this->db->like("titulo", $busca);
        return $this->db->get("tb_boletins")->result_array();
    }

    public function searchUsers($busca) 
    {
        if(empty($busca)) {
            return array();
        }

        $busca = $this->input->post("search_users");
        $this->db->like("name", $busca);
        return $this->db->get("tb_users")->result_array();
    }


}


?>