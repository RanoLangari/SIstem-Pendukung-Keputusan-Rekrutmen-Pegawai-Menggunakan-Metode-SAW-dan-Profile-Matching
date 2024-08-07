<?php

class Kriteriasaw_model extends CI_Model
{
    public function getKriteriaById($id_kriteria)
    {
        return $this->db->get_where('kriteria_saw', ['id_kriteria' => $id_kriteria])->row_array();
    }
    public function getAllKriteria()
    {
        return  $this->db->get('kriteria_saw')->result_array();
    }
    public function tambahDataKriteria()
    {
        $data = [
            'nama_kriteria' => $this->input->post('nama_kriteria', true),
        ];

        $this->db->insert('kriteria_saw', $data);
    }
    public function ubahDataKriteria($kriteria, $id_kriteria)
    {
        $nama_kriteria = $this->input->post('nama_kriteria', true);
        $data = [
            'nama_kriteria' => $nama_kriteria,
        ];
        $this->db->set($data);
        $this->db->where('id_kriteria', $id_kriteria);
        $this->db->update('kriteria_saw');
    }

    public function hapusDataKriteria()
    {
        $id_kriteria =  $this->input->post('id_kriteria', true);
        $this->db->delete('kriteria_saw', ['id_kriteria' => $id_kriteria]);
    }
}
