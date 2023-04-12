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
    public function tambah()
    {
        $data = [
            'username' => htmlspecialchars($this->input->post('username')),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'nama' => htmlspecialchars($this->input->post('nama')),
            'is_active' => 1,
            'role_id' => 2,
        ];

        $this->db->insert('user', $data);
    }

    public function ubah() 
    {
        $id = htmlspecialchars($this->input->post('id'));
        $username = htmlspecialchars($this->input->post('username'));
        $nama = htmlspecialchars($this->input->post('nama')); 
        $role = htmlspecialchars($this->input->post('role_id'));
        
        $this->db->set('username', $username);
        $this->db->set('nama', $nama);
        $this->db->set('role_id', $role);
        $this->db->where('id', $id);
        $this->db->update('user');
    }

    public function updatepassword()
    {
        $id = htmlspecialchars($this->input->post('id'));
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

        $this->db->set('password', $password);
        $this->db->where('id', $id);
        $this->db->update('user');
    }
    public function hapus()
    {   
        $id = htmlspecialchars($this->input->post('id'));

        $this->db->set('is_active', 0);
        $this->db->where('id', $id);
        $this->db->update('user');
    }
}


?>