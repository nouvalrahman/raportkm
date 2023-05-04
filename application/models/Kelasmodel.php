<?php
class Kelasmodel extends CI_Model
{
    public function get_kelas()
    {
        return $this->db->get_where('kelas', ['is_active' => 1])->result_array();
    }

    public function join_kelas_jurusan()
    {
        $this->db->select('kelas.id AS kelasid, kelas.kelas, kelas.jurusanid, kelas.is_active AS kelasactive, jurusan.id AS jurusanid, jurusan.jurusan, jurusan.is_active AS jurusanactive');
        $this->db->from('jurusan');
        $this->db->join('kelas', 'jurusan.id = kelas.jurusanid');
        $this->db->where('jurusan.is_active', 1);
        $this->db->order_by('jurusan', 'ASC');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function tambah()
    {
        $data = [
            'kelas' => htmlspecialchars($this->input->post('kelas')),
            'jurusanid' => htmlspecialchars($this->input->post('jurusanid')),
            'is_active' => 1,
        ];

        $this->db->insert('kelas', $data);
    }

    public function ubah()
    {
        $id = htmlspecialchars($this->input->post('id'));
        $jurusanid = htmlspecialchars($this->input->post('jurusanid'));
        $kelas = htmlspecialchars($this->input->post('kelas'));


        $this->db->set('jurusanid', $jurusanid);
        $this->db->set('kelas', $kelas);
        $this->db->where('id', $id);
        $this->db->update('kelas');
    }

    


}
?>