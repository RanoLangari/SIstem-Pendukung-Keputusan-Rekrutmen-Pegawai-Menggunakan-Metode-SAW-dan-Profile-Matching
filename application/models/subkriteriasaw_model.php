<?php

class Subkriteriasaw_model extends CI_Model
{
    public function getSubkriteriaById($id_subkriteria)
    {
        return $this->db->get_where('subkriteria_saw', ['id_subkriteria' => $id_subkriteria])->row_array();
    }

    public function getAllSubkriteria()
    {
        $query = "SELECT subkriteria_saw.*, nama_kriteria
                FROM subkriteria_saw join kriteria_saw
                 ON subkriteria_saw.id_kriteria = kriteria_saw.id_kriteria";
        return $this->db->query($query)->result_array();
    }

    public function tambahDataSubkriteria()
    {
        $data = [
            'id_kriteria' => $this->input->post('id_kriteria', true),
            'nama_subkriteria' => $this->input->post('nama_subkriteria', true),
            'atribut' => $this->input->post('atribut', true),
            'persentase' => $this->input->post('persentase', true)
        ];

        // select count persentase from subkriteria_saw 
        // $this->db->select('persentase');
        // $this->db->from('subkriteria_saw');
        // $query = $this->db->get();
        // $result = $query->result_array();
        // $total = 0;
        // foreach ($result as $row) {
        //     $total += $row['persentase'];
        // }
        // $total += $this->input->post('persentase', true);
        // if ($total >= 110) {
        //     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Total persentase tidak boleh lebih dari 100%</div>');
        //     redirect('penerimaan/subkriteria_saw');
        // }
        $this->db->insert('subkriteria_saw', $data);
    }

    public function ubahDataSubkriteria($subkriteria, $id_subkriteria)
    {
        $id_kriteria = $this->input->post('id_kriteria', true);
        $nama_subkriteria = $this->input->post('nama_subkriteria', true);
        $atribut = $this->input->post('atribut', true);
        $persentase = $this->input->post('persentase', true);
        // $this->db->select('persentase');
        // $this->db->from('subkriteria_saw');
        // $query = $this->db->get();
        // $result = $query->result_array();
        // $total = 0;
        // foreach ($result as $row) {
        //     $total += $row['persentase'];
        // }
        // $total += $this->input->post('persentase', true);
        // if ($total >= 100) {
        //     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Total persentase tidak boleh lebih dari 100%</div>');
        //     redirect('penerimaan/subkriteria_saw');
        // }
        $data = [
            'id_kriteria' => $id_kriteria,
            'nama_subkriteria' => $nama_subkriteria,
            'atribut' => $atribut,
            'persentase' => $persentase
        ];
        $this->db->set($data);
        $this->db->where('id_subkriteria', $id_subkriteria);
        $this->db->update('subkriteria_saw');
    }

    public function hapusDataSubkriteria()
    {
        $id_subkriteria =  $this->input->post('id_subkriteria', true);
        $this->db->delete('subkriteria_saw', ['id_subkriteria' => $id_subkriteria]);
    }
}
