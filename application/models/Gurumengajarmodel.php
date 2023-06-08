<?php

class Gurumengajarmodel extends CI_Model
{
    public function get_gurumengajar()
    {
        return $this->db->get_where('gurumengajar', ['is_active' => 1])->result_array();
    }
    public function get_gurumengajarid($datasession)
    {   
        $user = $this->session->userdata('user');
        $this->db->select('id','nama');
        $this->db->where('id'== $user);
        $this->db->from('user');
        $query = $this->db->get();
        return $query->result_array();
        
        // return $this->db->get_where('user', ['username' == $user])->result_array();
    }


    public function join_guru_mapel_kelas_tapel_semester()
    {
        $this->db->select('*');
        $this->db->from('gurumengajar');
        $this->db->join('mapel', 'mapel.id = gurumengajar.mapelid');
        $this->db->join('user', 'user.id = gurumengajar.userid');
        $this->db->join('kelas', 'kelas.id = gurumengajar.kelasid');
        $this->db->join('tapel', 'tapel.id = gurumengajar.tapelid');
        $this->db->join('semester', 'semester.id = gurumengajar.semesterid');
        $this->db->where('gurumengajar.is_active', 1);
        $this->db->order_by('user.id', 'ASC');
        $result = $this->db->get();
        return $result->result_array();
    }
    public function tambah()
    {
        $data = [
            'userid' => htmlspecialchars($this->input->post('userid')),
            'tapelid' => htmlspecialchars($this->input->post('tapelid')),
            'semesterid' => htmlspecialchars($this->input->post('semesterid')),
            'mapelid' => htmlspecialchars($this->input->post('mapelid')),
            'kelasid' => htmlspecialchars($this->input->post('kelasid')),
            'is_active' => 1,
        ];
        $this->db->insert('gurumengajar', $data);
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