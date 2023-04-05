<?php

class Usermodel extends CI_Model
{

    public function get_user()
    {
        return $this->db->get_where('user', ['is_active' => 1])->result_array();
    }
    public function join_user_role()
    {
        $this->db->select('user.id AS userid, user.username, user.password, user.nama, user.jk, user.is_active, user.role_id, role.id AS roleid, role.role');
        $this->db->from('role');
        $this->db->join('user', 'role.id = user.role_id' );
        $this->db->where('user.is_active', 1);
        $this->db->order_by('userid', 'ASC');
        $result = $this->db->get();
        return $result->result_array();
    }
}


?>