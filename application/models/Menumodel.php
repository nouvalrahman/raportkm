<?php

class Menumodel extends CI_Model
{

    public function get_menu()
    {
        return $this->db->get_where('menu', ['is_active' => 1])->result_array();
    }
}


?>