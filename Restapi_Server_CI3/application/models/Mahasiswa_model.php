<?php
class Mahasiswa_model extends CI_Model
{
    public function getMahasiswa($id = null)
    {
        if ($id === null) {
            return $this->db->get('tbl_mahasiswa')->result_array();
        } else {
            return $this->db->get_where('tbl_mahasiswa', ['id' => $id])->result_array();
        }
    }

    public function deleteMahasiswa($id)
    {
        $this->db->delete('tbl_mahasiswa', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function createMahasiswa($data)
    {
        $this->db->insert('tbl_mahasiswa', $data);
        return $this->db->affected_rows();
    }

    public function updateMahasiswa($data, $id)
    {
        $this->db->update('tbl_mahasiswa', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
