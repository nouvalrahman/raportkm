<?php
class Jurusanmodel extends CI_Model
{
    public function get_jurusan()
    {
        $this->db->select('menu.id AS menuid, menu.menu, menu.icon, menu.is_active AS menuactive, submenu.id AS submenuid, submenu.menu_id, submenu.title, submenu.url, submenu.is_active AS submenuactive');
        $this->db->from('menu');
        $this->db->join('submenu', 'menu.id = submenu.menu_id');
        $this->db->where('submenu.is_active', 1);
        $this->db->order_by('submenuid', 'ASC');
        $result = $this->db->get();
        return $result->result_array();
    }
}
?>