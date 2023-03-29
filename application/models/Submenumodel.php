<?php

class Submenumodel extends CI_Model
{

    public function get_submenu()
    {
        return $this->db->get_where('submenu', ['is_active' => 1])->result_array();
    }

    public function join_menu_submenu()
    {
        $this->db->select('menu.id AS menuid, menu.menu, menu.icon, menu.is_active AS menuactive, submenu.id AS submenuid, submenu.menu_id, submenu.title, submenu.url, submenu.is_active AS submenuactive');
        $this->db->from('menu');
        $this->db->join('submenu', 'menu.id = submenu.menu_id');
        $this->db->where('submenu.is_active', 1);
        $this->db->order_by('submenuid', 'ASC');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function tambah()
    {
        $data = [
            'menu_id' => htmlspecialchars($this->input->post('menu_id')),
            'title' => htmlspecialchars($this->input->post('title')),
            'url' => htmlspecialchars($this->input->post('url')),
            'is_active' => 1,
        ];
        $this->db->insert('submenu', $data);
    }
    public function ubah()
    {
        $id = htmlspecialchars($this->input->post('id'));
        $menu_id = htmlspecialchars($this->input->post('menu_id'));
        $title = htmlspecialchars($this->input->post('title'));
        $url = htmlspecialchars($this->input->post('url'));

        $this->db->set('menu_id', $menu_id);
        $this->db->set('title', $title);
        $this->db->set('url', $url);
        $this->db->where('id', $id);
        $this->db->update('submenu');
    }
    public function hapus()
    {
        $id = htmlspecialchars($this->input->post('id'));

        $this->db->set('is_active', 0);
        $this->db->where('id', $id);
        $this->db->update('submenu');

    }
}


?>