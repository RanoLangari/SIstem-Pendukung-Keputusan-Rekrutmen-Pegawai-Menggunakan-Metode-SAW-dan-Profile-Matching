<?php

class Kriteria_model extends CI_Model
{
    public function getKriteriaById($id_kriteria)
    {
        return $this->db->get_where('kriteria', ['id_kriteria' => $id_kriteria])->row_array();
    }
    public function getAllKriteria()
    {
        return $this->db->get('kriteria')->result_array();
    }
    public function tambahDataKriteria()
    {
        // $this->db->select('nilai_kriteria');
        // $this->db->from('kriteria');
        // $query = $this->db->get();
        // $result = $query->result_array();
        // $total = 0;
        // foreach ($result as $row) {
        //     $total += $row['nilai_kriteria'];
        // }
        // $total += $this->input->post('nilai_kriteria', true);
        // if ($total >= 100) {
        //     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Total nilai kriteria tidak boleh lebih dari 100%</div>');
        //     redirect('wawancara/kriteria');
        // }
        $data = [
            'nama_kriteria' => $this->input->post('nama_kriteria', true),
            'nilai_kriteria' => $this->input->post('nilai_kriteria', true)
        ];

        $this->db->insert('kriteria', $data);
    }
    public function ubahDataKriteria($kriteria, $id_kriteria)
    {
        // $this->db->select('nilai_kriteria');
        // $this->db->from('kriteria');
        // $query = $this->db->get();
        // $result = $query->result_array();
        // $total = 0;
        // foreach ($result as $row) {
        //     $total += $row['nilai_kriteria'];
        // }
        // $total += $this->input->post('nilai_kriteria', true);
        // if ($total >= 100) {
        //     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Total nilai kriteria tidak boleh lebih dari 100%</div>');
        //     redirect('wawancara/kriteria');
        // }
        $nama_kriteria = $this->input->post('nama_kriteria', true);
        $nilai_kriteria = $this->input->post('nilai_kriteria', true);
        $data = [
            'nama_kriteria' => $nama_kriteria,
            'nilai_kriteria' => $nilai_kriteria
        ];
        $this->db->set($data);
        $this->db->where('id_kriteria', $id_kriteria);
        $this->db->update('kriteria');
    }

    public function hapusDataKriteria()
    {
        $id_kriteria =  $this->input->post('id_kriteria', true);
        $this->db->delete('kriteria', ['id_kriteria' => $id_kriteria]);
    }
}
