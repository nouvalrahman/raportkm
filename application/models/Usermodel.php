<?php

class Usermodel extends CI_Model
{

    public function get_user()
    {
        return $this->db->get_where('user', ['is_active' => 1])->result_array();
    }
}


?>