<?php

class Boletins_model extends CI_Model {

    public function index() 
    {
        $this->db->order_by("id", "DESC");
        return $this->db->get("tb_boletins")->result_array();
    }

    public function store($boletim) 
    {
        $this->db->insert("tb_boletins", $boletim);
    }

    public function show($id) 
    {
        return $this->db->get_where("tb_boletins", array(
            "id" => $id
        ))->row_array();
    }

    public function update($id, $boletim) 
    {
        $this->db->where("id", $id);
        return $this->db->update("tb_boletins", $boletim);
    }

    public function destroy($id) 
    {
        $this->db->where("id", $id);
        return $this->db->delete("tb_boletins");
    }

    public function getDiretoria()
    {
        $this->db->where("nivel_permissao", "Diretoria");
        $this->db->order_by("id", "DESC");
        return $this->db->get("tb_boletins")->result_array();
    }

    public function getFuncionarios()
    {
        $this->db->where("nivel_permissao", "Funcionarios");
        $this->db->order_by("id", "DESC");
        return $this->db->get("tb_boletins")->result_array();
    }

}

?>