<?php

class Menumodel extends CI_Model
{

    public function get_menu()
    {
        return $this->db->get_where('menu', ['is_active' => 1])->result_array();
    }

    public function tambah()
    {
        $data =[
            'menu' => htmlspecialchars($this->input->post('menu')),
            'icon' => htmlspecialchars($this->input->post('icon')),
            'is_active' => 1,
        ];
        $this->db->insert('menu', $data);
    }
    public function ubah()
    {
        $id = htmlspecialchars($this->input->post('id'));
        $menu = htmlspecialchars($this->input->post('menu'));
        $icon = htmlspecialchars($this->input->post('icon'));

        $this->db->set('menu', $menu);
        $this->db->set('icon', $icon);
        $this->db->where('id', $id);
        $this->db->update('menu');
    }
    public function hapus()
    {
        $id = htmlspecialchars($this->input->post('id'));

        $this->db->set('is_active', 0);
        $this->db->where('id', $id);
        $this->db->update('menu');
    }
}


?>