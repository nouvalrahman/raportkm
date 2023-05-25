<?php

class Tapelmodel extends CI_Model
{

    public function get_tapel()
    {
        return $this->db->get_where('tapel', ['is_active' => 1])->result_array();
    }
    public function get_semester()
    {
        return $this->db->get_where('semester', ['is_active' => 1])->result_array();
    }

    public function join_tapel_semester()
    {
        $this->db->select('semester.id AS semesterid, semester.semester, semester.is_active AS semesteractive, tapel.id AS tapelid, tapel.tahunpelajaran, tapel.semesterid, tapel.is_active AS tapelactive');
        $this->db->from('semester');
        $this->db->join('tapel', 'semester.id = tapel.semesterid');
        $this->db->where('tapel.is_active', 1);
        $this->db->order_by('tahunpelajaran', 'ASC');
        $result = $this->db->get();
        return $result->result_array();
    }
    public function tambah()
    {
        $data = [
            'tahunpelajaran' => htmlspecialchars($this->input->post('tahunpelajaran')),
            'semesterid' => htmlspecialchars($this->input->post('semesterid')),
            'is_active' => 1,
        ];
        $this->db->insert('tapel', $data);
    }
    public function ubah()
    {
        $id = htmlspecialchars($this->input->post('id'));
        $tapel = htmlspecialchars($this->input->post('tahunpelajaran'));
        $semesterid = htmlspecialchars($this->input->post('semesterid'));

        $this->db->set('tahunpelajaran', $tapel);
        $this->db->set('semesterid', $semesterid);
        $this->db->where('id', $id);
        $this->db->update('tapel');
    }
    public function hapus()
    {
        $id = htmlspecialchars($this->input->post('id'));

        $this->db->set('is_active', 0);
        $this->db->where('id', $id);
        $this->db->update('tapel');

    }
}


?>