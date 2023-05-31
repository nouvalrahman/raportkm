<?php

Class Identitasmodel extends CI_Model
{
    public function get_identitas()
    {
        return $this->db->get_where('identitas', ['is_active' => 1])->result_array();
    }

    public function tambah()
    {
        $data = [
            'tglraport' => date($this->input->post('tglraport')),
            'kepsek' => htmlspecialchars($this->input->post('kepsek')),
            'sekolah' => htmlspecialchars($this->input->post('sekolah')),
            'is_active' => 1,
        ];
        $this->db->insert('identitas', $data);
    }

    public function ubah()
    {
        $id = htmlspecialchars($this->input->post('id'));
        $tglraport = htmlspecialchars($this->input->post('tglraport'));
        $kepsek = htmlspecialchars($this->input->post('kepsek'));
        $sekolah = htmlspecialchars($this->input->post('sekolah'));

        $this->db->set('tglraport', $tglraport);
        $this->db->set('kepsek', $kepsek);
        $this->db->set('sekolah', $sekolah);
        $this->db->where('id', $id);
        $this->db->update('identitas');
    }

    public function hapus()
    {
        $id = htmlspecialchars($this->input->post('id'));

        $this->db->set('is_active', 0);
        $this->db->where('id', $id);
        $this->db->update('identitas');

    }

}

?>