<?php

class Jurusanmodel extends CI_Model
{
    public function get_jurusan()
    {
        return $this->db->get_where('jurusan', ['is_active' => 1])->result_array();
    }
    public function tambah()
    {
        $data = [
            'jurusan' => htmlspecialchars($this->input->post('jurusan')),
            'is_active' => 1,
        ];
        $this->db->insert('jurusan', $data);
    }

    public function ubah()
    {
        $id = htmlspecialchars($this->input->post('id'));
        $jurusan = htmlspecialchars($this->input->post('jurusan'));

        $this->db->set('jurusan', $jurusan);
        $this->db->where('id', $id);
        $this->db->update('jurusan');
    }

    public function hapus()
    {
        $id = htmlspecialchars($this->input->post('id'));

        $this->db->set('is_active', 0);
        $this->db->where('id', $id);
        $this->db->update('jurusan');
    }
}

?>