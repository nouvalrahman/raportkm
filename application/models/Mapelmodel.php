<?php

Class Mapelmodel extends CI_Model
{
    public function get_mapel()
    {
        return $this->db->get_where('mapel', ['is_active' => 1])->result_array();
    }

    public function tambah()
    {
        $data = [
            'mata_pelajaran' => htmlspecialchars($this->input->post('mata_pelajaran')),
            'kelompok' => htmlspecialchars($this->input->post('kelompok')),
            'is_active' => 1,
        ];
        $this->db->insert('mapel', $data);
    }

    public function ubah()
    {
        $id = htmlspecialchars($this->input->post('id'));
        $mapel = htmlspecialchars($this->input->post('mata_pelajaran'));
        $kelompok = htmlspecialchars($this->input->post('kelompok'));

        $this->db->set('mata_pelajaran', $mapel);
        $this->db->set('kelompok', $kelompok);
        $this->db->where('id', $id);
        $this->db->update('mapel');
    }

    public function hapus()
    {
        $id = htmlspecialchars($this->input->post('id'));

        $this->db->set('is_active', 0);
        $this->db->where('id', $id);
        $this->db->update('mapel');

    }

}

?>