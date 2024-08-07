<?php

class Subkriteria_model extends CI_Model
{
    public function getSubkriteriaById($id_subkriteria)
    {
        return $this->db->get_where('subkriteria', ['id_subkriteria' => $id_subkriteria])->row_array();
    }

    public function getAllSubkriteria()
    {
        $query = "SELECT subkriteria.*, nama_kriteria
                FROM subkriteria join kriteria
                 ON subkriteria.id_kriteria = kriteria.id_kriteria";
        return $this->db->query($query)->result_array();
    }

    public function getDetailSubkriteria($id_subkriteria)
    {
        return $this->db->get_where('wawancara', ['id_subkriteria' => $id_subkriteria])->row_array();
    }

    public function tambahDataSubkriteria()
    {
        $data = [
            'id_kriteria' => $this->input->post('id_kriteria', true),
            'nama_subkriteria' => $this->input->post('nama_subkriteria', true),
            'faktor' => $this->input->post('faktor', true),
            'nilai_subkriteria' => $this->input->post('nilai_subkriteria', true)
        ];

        $this->db->insert('subkriteria', $data);
    }

    public function getDetailById($id_wawancara)
    {
        return $this->db->get_where('wawancara', ['id_wawancara' => $id_wawancara])->row_array();
    }

    public function ubahDataDetail($id_wawancara)
    {
        $id_subkriteria = $this->input->post('id_subkriteria', true);
        $nama_penilaian = $this->input->post('nama_penilaian', true);
        $data = [
            'id_subkriteria' => $id_subkriteria,
            'nama_penilaian' => $nama_penilaian
        ];
        $this->db->set($data);
        $this->db->where('id_wawancara', $id_wawancara);
        $this->db->update('wawancara');
    }

    public function hapusDataDetail($id_wawancara)
    {

        $this->db->delete('wawancara', ['id_wawancara' => $id_wawancara]);
    }

    public function tambahDataDetail()
    {
        $data = [
            'id_subkriteria' => $this->input->post('id_subkriteria', true),
            'nama_penilaian' => $this->input->post('nama_penilaian', true)
        ];

        $this->db->insert('wawancara', $data);
    }

    public function ubahDataSubkriteria($subkriteria, $id_subkriteria)
    {
        $id_kriteria = $this->input->post('id_kriteria', true);
        $nama_subkriteria = $this->input->post('nama_subkriteria', true);
        $faktor = $this->input->post('faktor', true);
        $nilai_subkriteria = $this->input->post('nilai_subkriteria', true);
        $data = [
            'id_kriteria' => $id_kriteria,
            'nama_subkriteria' => $nama_subkriteria,
            'faktor' => $faktor,
            'nilai_subkriteria' => $nilai_subkriteria
        ];
        $this->db->set($data);
        $this->db->where('id_subkriteria', $id_subkriteria);
        $this->db->update('subkriteria');
    }

    public function hapusDataSubkriteria()
    {
        $id_subkriteria =  $this->input->post('id_subkriteria', true);
        $this->db->delete('subkriteria', ['id_subkriteria' => $id_subkriteria]);
    }
}
