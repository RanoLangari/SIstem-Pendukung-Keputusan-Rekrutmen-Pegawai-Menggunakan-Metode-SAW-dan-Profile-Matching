<?php

class Karyawan_model extends CI_Model
{
    public function getKaryawanById($id_karyawan)
    {
        return $this->db->get_where('karyawan', ['id_karyawan' => $id_karyawan])->row_array();
    }
    public function getAllKaryawan()
    {
        $dataKaryawan =  $this->db->get('karyawan')->result_array();
        $queryMaxPeriode = "SELECT MAX(periode) as periode FROM karyawan";
        $periode = $this->db->query($queryMaxPeriode)->row_array();
        $data  = [];
        foreach ($dataKaryawan as $row) {
            if ($row['periode'] == $periode['periode']) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function getAllKaryawanAdded()
    {
        $query_kuota = "SELECT nilai FROM kuota WHERE id_kuota = 1";
        $kuota = $this->db->query($query_kuota)->row_array();
        $nilai = $kuota['nilai'];
        $QueryRangkingSAW = "SELECT karyawan.*
                             FROM rangking_saw
                             JOIN karyawan ON rangking_saw.id_karyawan = karyawan.id_karyawan
                                WHERE karyawan.periode = (SELECT MAX(periode) FROM karyawan)
                             ORDER BY rangking_saw.nilai_rangking DESC
                             LIMIT $nilai";
        $karyawan =  $this->db->query($QueryRangkingSAW)->result_array();
        $karyawanadd = [];
        foreach ($karyawan as  $value) {
            $idkar = $value['id_karyawan'];
            $karyawan2 =  $this->db->get_where('rangking', 'rangking.id_karyawan = ' . $idkar)->row_array();
            if (empty($karyawan2['id_karyawan'])) {
                $karyawanadd[] = $value;
            }
        }
        return $karyawanadd;
    }

    public function getAllKaryawanAdded_saw()
    {
        $karyawan =  $this->db->get('karyawan')->result_array();
        $karyawanadd = [];
        foreach ($karyawan as  $value) {
            $idkar = $value['id_karyawan'];
            $QueryKaryawan = "SELECT * FROM rangking_saw INNER JOIN karyawan ON rangking_saw.id_karyawan = karyawan.id_karyawan  WHERE karyawan.periode = (SELECT MAX(periode) FROM karyawan) AND rangking_saw.id_karyawan = $idkar";
            $karyawan2 =  $this->db->query($QueryKaryawan)->row_array();
            if (empty($karyawan2['id_karyawan'])) {
                $karyawanadd[] = $value;
            }
        }
        $queryMaxPeriode = "SELECT MAX(periode) as periode FROM karyawan";
        $periode = $this->db->query($queryMaxPeriode)->row_array();
        $data  = [];
        foreach ($karyawanadd as $row) {
            if ($row['periode'] == $periode['periode']) {
                $data[] = $row;
            }
        }
        return $data;
    }
    public function tambahDataKaryawan()
    {
        $periode = $this->input->post('periode', true);
        $nama_karyawan = $this->input->post('nama_karyawan', true);
        $data = [
            'nama_karyawan' => $nama_karyawan,
            'periode' => $periode

        ];

        $this->db->insert('karyawan', $data);
    }
    public function ubahDataKaryawan($karyawan, $id_karyawan)
    {
        $nama_karyawan = $this->input->post('nama_karyawan', true);
        $periode = $this->input->post('periode', true);
        $data = [
            'nama_karyawan' => $nama_karyawan,
            'periode' => $periode
        ];
        $this->db->set($data);
        $this->db->where('id_karyawan', $id_karyawan);
        $this->db->update('karyawan');
    }

    public function hapusDataKaryawan()
    {
        $id_karyawan =  $this->input->post('id_karyawan', true);
        $this->db->delete('karyawan', ['id_karyawan' => $id_karyawan]);
    }

    public function hapusDataKaryawanNilai()
    {
        $id_karyawan =  $this->input->post('id_karyawan', true);
        $this->db->delete('penilaian', ['id_karyawan' => $id_karyawan]);
        $this->db->delete('hitung', ['id_karyawan' => $id_karyawan]);
        $this->db->delete('nilai_akhir', ['id_karyawan' => $id_karyawan]);
        $this->db->delete('rangking', ['id_karyawan' => $id_karyawan]);
    }

    public function hapusDataKaryawanNilaiSaw()
    {
        $id_karyawan =  $this->input->post('id_karyawan', true);
        $this->db->delete('penilaian_saw', ['id_karyawan' => $id_karyawan]);
        $this->db->delete('rangking_saw', ['id_karyawan' => $id_karyawan]);
        $this->db->delete('penerimaan', ['id_karyawan' => $id_karyawan]);
    }
}
