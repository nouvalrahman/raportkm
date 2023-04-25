<?php
class Kelasmodel extends CI_Model
{
    public function get_kelas()
    {
        return $this->db->get_where('kelas', ['is_active' => 1])->result_array();
    }

    public function join_kelas_jurusan()
    {

    }


}
?>