<?php

class Rolemodel extends CI_Model
{

    public function get_role()
    {
        return $this->db->get_where('role')->result_array();
    }

    public function tambah()
    {
        $data = [
            'role' => htmlspecialchars($this->input->post('role')),
            
        ];
        $this->db->insert('role', $data);
    }
    public function ubah()
    {
        $id = htmlspecialchars($this->input->post('id'));
        $role = htmlspecialchars($this->input->post('role'));
        
        $this->db->set('role', $role);
        $this->db->where('id', $id);
        $this->db->update('role');
    }
    public function hapus()
    {
        $id = htmlspecialchars($this->input->post('id'));

        $this->db->where('id', $id);
        $this->db->update('menu');

    }
}


?>