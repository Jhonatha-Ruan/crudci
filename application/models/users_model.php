<?php

class Users_model extends CI_Model {

    public function store($user)
    {
        $this->db->insert("tb_users", $user);
    }

    public function getUsers() 
    {
        return $this->db->get("tb_users")->result_array();
    }

    public function update($id, $user) 
    {
        $this->db->where("id", $id);
        return $this->db->update("tb_users", $user);
    }

    public function delete($id) 
    {
        $this->db->where("id", $id);
        return $this->db->delete("tb_users");
    }

}

?>