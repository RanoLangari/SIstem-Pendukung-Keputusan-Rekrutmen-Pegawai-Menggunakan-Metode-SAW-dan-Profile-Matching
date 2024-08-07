<?php

class Penilaiansaw_model extends CI_Model
{
    public function getPenilaianById($id_penilaian)
    {
        return $this->db->get_where('penilaian', ['id_penilaian' => $id_penilaian])->row_array();
    }

    public function getAllPenilaian()
    {
        $query = "SELECT penilaian_saw.*, karyawan.nama_karyawan, karyawan.periode, kriteria_saw.nama_kriteria, subkriteria_saw.nama_subkriteria, subkriteria_saw.atribut, nilai
        FROM penilaian_saw join karyawan
        ON penilaian_saw.id_karyawan = karyawan.id_karyawan
        join subkriteria_saw
        on penilaian_saw.id_subkriteria = subkriteria_saw.id_subkriteria
        join kriteria_saw
        on subkriteria_saw.id_kriteria = kriteria_saw.id_kriteria";
        $queryMaxPeriode = "SELECT MAX(periode) as periode FROM karyawan";
        $periode = $this->db->query($queryMaxPeriode)->row_array();
        $queryResult = $this->db->query($query)->result_array();
        $data = [];
        foreach ($queryResult as $row) {
            if ($row['periode'] == $periode['periode']) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function getAllHitung()
    {
        $query = "SELECT hitung_saw.*, karyawan.nama_karyawan, kriteria_saw.nama_kriteria, subkriteria_saw.nama_subkriteria
                    FROM hitung_saw join karyawan
                    ON hitung_saw.id_karyawan = karyawan.id_karyawan
                    join kriteria_saw
                    on hitung_saw.id_kriteria = kriteria_saw.id_kriteria
                    join subkriteria_saw
                    on hitung_saw.id_subkriteria = subkriteria_saw.id_subkriteria WHERE karyawan.periode = (SELECT MAX(periode) FROM karyawan)";
        return $this->db->query($query)->result_array();
    }

    public function getAllNilaiAkhir()
    {
        $query = "SELECT nilai_akhir.nilai_total, nilai_akhir.nilai_akhir, karyawan.nama_karyawan, kriteria.nama_kriteria
                    FROM nilai_akhir join karyawan
                    ON  nilai_akhir.id_karyawan = karyawan.id_karyawan
                    join kriteria
                    on  nilai_akhir.id_kriteria = kriteria.id_kriteria";

        return $this->db->query($query)->result_array();
    }

    public function tambahDataPenilaian()
    {

        $subkriteria = $this->db->get('subkriteria_saw')->result_array();

        $temp = [];
        foreach ($subkriteria as $s) {
            $idk =  $s['id_kriteria'];
            $idsub =  $s['id_subkriteria'];
            $nilai = $this->input->post('subkriteria' . $s['id_subkriteria'], true);
            if ($idsub == 9) {
                $this->db->insert('penerimaan', [
                    'id_karyawan' => $this->input->post('id_karyawan', true),
                    'id_kriteria' =>   $idk,
                    'id_subkriteria' =>   $idsub,
                    'usia' => $this->input->post('subkriteria' . $s['id_subkriteria'], true),
                ]);
                if ($nilai >= 37 && $nilai <= 40) {
                    $nilai = 1;
                } else if ($nilai >= 33 && $nilai <= 36) {
                    $nilai = 2;
                } else if ($nilai >= 28 && $nilai <= 32) {
                    $nilai = 3;
                } else if ($nilai >= 23 && $nilai <= 27) {
                    $nilai = 4;
                } else if ($nilai >= 18 && $nilai <= 22) {
                    $nilai = 5;
                }
            }
            if ($idsub == 5) {
                $tahun = $this->input->post('subkriteriaTahun' . $s['id_subkriteria'], true);
                $bulan = $this->input->post('subkriteriaBulan' . $s['id_subkriteria'], true);
                $nilai = $tahun + $bulan / 12;
                if ($nilai >= 0 && $nilai < 1) {
                    $nilai = 1;
                } else if ($nilai >= 1 && $nilai < 2) {
                    $nilai = 2;
                } else if ($nilai >= 2 && $nilai < 3) {
                    $nilai = 3;
                } else if ($nilai >= 3 && $nilai < 4) {
                    $nilai = 4;
                } else if ($nilai >= 4 && $nilai > 4) {
                    $nilai = 5;
                }
            }
            $data = [
                'id_karyawan' => $this->input->post('id_karyawan', true),
                'id_kriteria' =>   $idk,
                'id_subkriteria' =>   $idsub,
                'nilai' => $nilai,
            ];
            $temp[] = $data;
        }

        $this->db->insert_batch('penilaian_saw', $temp);
        $queryPenilaian = "SELECT penilaian_saw.*, subkriteria_saw.atribut
                            FROM penilaian_saw join subkriteria_saw
                            ON penilaian_saw.id_subkriteria = subkriteria_saw.id_subkriteria JOIN karyawan ON penilaian_saw.id_karyawan = karyawan.id_karyawan
                            WHERE karyawan.periode = (SELECT MAX(periode) FROM karyawan)";
        $penilaian = $this->db->query($queryPenilaian)->result_array();
        $dataNormalisasi = [];
        foreach ($penilaian as $p) {
            $idk =  $p['id_kriteria'];
            $idsub =  $p['id_subkriteria'];
            $nilai = $p['nilai'];
            $atribut = $p['atribut'];

            if ($atribut == "Cost") {
                $queryMin = "SELECT min(nilai) as min
                            FROM penilaian_saw join subkriteria_saw
                            ON penilaian_saw.id_subkriteria = subkriteria_saw.id_subkriteria
                            JOIN karyawan ON penilaian_saw.id_karyawan = karyawan.id_karyawan
                            WHERE penilaian_saw.id_subkriteria = $idsub AND karyawan.periode = (SELECT MAX(periode) FROM karyawan)";
                $min = $this->db->query($queryMin)->row_array();
                $min = $min['min'];
                $data = [
                    'id_karyawan' => $p['id_karyawan'],
                    'id_kriteria' =>   $idk,
                    'id_subkriteria' =>   $idsub,
                    'nilai' => $nilai,
                    'normalisasi' => $min / $nilai
                ];
                $dataNormalisasi[] = $data;
            } else {
                $queryMax = "SELECT max(nilai) as max
                            FROM penilaian_saw join subkriteria_saw
                            ON penilaian_saw.id_subkriteria = subkriteria_saw.id_subkriteria
                            JOIN karyawan ON penilaian_saw.id_karyawan = karyawan.id_karyawan
                            WHERE penilaian_saw.id_subkriteria = $idsub AND karyawan.periode = (SELECT MAX(periode) FROM karyawan)";
                $max = $this->db->query($queryMax)->row_array();
                $max = $max['max'];
                $data = [
                    'id_karyawan' => $p['id_karyawan'],
                    'id_kriteria' =>   $idk,
                    'id_subkriteria' =>   $idsub,
                    'normalisasi' => $nilai / $max
                ];
                $dataNormalisasi[] = $data;
            }
        }
        $dataBobot = [];
        foreach ($dataNormalisasi as $d) {
            $subK = $d['id_subkriteria'];
            // join subkriteria_saw
            $queryBobot = "SELECT persentase
                            FROM subkriteria_saw
                            WHERE id_subkriteria = $subK";
            $bobot = $this->db->query($queryBobot)->row_array();
            $bobot = $bobot['persentase'];
            $data = [
                'id_karyawan' => $d['id_karyawan'],
                'id_kriteria' =>   $d['id_kriteria'],
                'id_subkriteria' =>   $d['id_subkriteria'],
                'nilai_normalisasi' => $d['normalisasi'],
                'nilai_preverensi' => $d['normalisasi'] * $bobot / 100
            ];
            $dataBobot[] = $data;
        }

        $sqlDelete = "DELETE FROM hitung_saw 
                      WHERE id_karyawan IN (SELECT id_karyawan 
                                            FROM karyawan 
                                            WHERE periode = (SELECT MAX(periode) FROM karyawan))";
        $this->db->query($sqlDelete);
        $this->db->insert_batch('hitung_saw', $dataBobot);
        $dataKaryawan = [];
        foreach ($dataBobot as $data) {
            $idKaryawan = $data['id_karyawan'];

            if (!isset($dataKaryawan[$idKaryawan])) {
                $dataKaryawan[$idKaryawan] = [
                    'id_karyawan' => $idKaryawan,
                    'nilai_rangking' => 0,
                ];
            }
            $dataKaryawan[$idKaryawan]['nilai_rangking'] += $data['nilai_preverensi'];
        }
        $queryKaryawan = "DELETE FROM rangking_saw 
                          WHERE id_karyawan IN (SELECT id_karyawan 
                                                FROM karyawan 
                                                WHERE periode = (SELECT MAX(periode) FROM karyawan))";
        $this->db->query($queryKaryawan);
        return $this->db->insert_batch('rangking_saw', $dataKaryawan);
    }

    public function editDataPenilaian()
    {

        $id_penilaian = $this->input->post('id_penilaian', true);
        $idSubKriteria = $this->input->post('id_subkriteria', true);
        $nilai = $this->input->post('subkriteria' . $idSubKriteria, true);
        $idKaryawan = $this->input->post('id_karyawan', true);

        if ($idSubKriteria == 9) {
            $this->db->set('usia', $nilai)->where('id_karyawan', $idKaryawan)->update('penerimaan');
            if ($nilai >= 37 && $nilai <= 40) {
                $nilai = 1;
            } else if ($nilai >= 33 && $nilai <= 36) {
                $nilai = 2;
            } else if ($nilai >= 28 && $nilai <= 32) {
                $nilai = 3;
            } else if ($nilai >= 23 && $nilai <= 27) {
                $nilai = 4;
            } else if ($nilai >= 18 && $nilai <= 22) {
                $nilai = 5;
            }
        }
        if ($idSubKriteria == 5) {
            $tahun = $this->input->post('subkriteriaTahun' . $idSubKriteria, true);
            $bulan = $this->input->post('subkriteriaBulan' . $idSubKriteria, true);
            $nilai = $tahun + $bulan / 12;
            if ($nilai >= 0 && $nilai <= 1) {
                $nilai = 1;
            } else if ($nilai > 1 && $nilai <= 2) {
                $nilai = 2;
            } else if ($nilai > 2 && $nilai <= 3) {
                $nilai = 3;
            } else if ($nilai > 3 && $nilai <= 4) {
                $nilai = 4;
            } else if ($nilai > 4) {
                $nilai = 5;
            }
        }
        $data = [
            'nilai' => $nilai,
        ];

        $this->db->set($data)->where('id_penilaian', $id_penilaian)->update('penilaian_saw');

        // Normalisasi SAW Cost Benefit
        $queryPenilaian = "SELECT penilaian_saw.*, subkriteria_saw.atribut
                            FROM penilaian_saw join subkriteria_saw
                            ON penilaian_saw.id_subkriteria = subkriteria_saw.id_subkriteria
                            JOIN karyawan ON penilaian_saw.id_karyawan = karyawan.id_karyawan
                            WHERE karyawan.periode = (SELECT MAX(periode) FROM karyawan)";
        $penilaian = $this->db->query($queryPenilaian)->result_array();

        $dataNormalisasi = [];
        foreach ($penilaian as $p) {
            $idk =  $p['id_kriteria'];
            $idsub =  $p['id_subkriteria'];
            $nilai = $p['nilai'];
            $atribut = $p['atribut'];

            if ($atribut == "Cost") {
                $queryMin = "SELECT min(nilai) as min
                            FROM penilaian_saw join subkriteria_saw
                            ON penilaian_saw.id_subkriteria = subkriteria_saw.id_subkriteria
                            JOIN karyawan ON penilaian_saw.id_karyawan = karyawan.id_karyawan
                            WHERE penilaian_saw.id_subkriteria = $idsub AND karyawan.periode = (SELECT MAX(periode) FROM karyawan)";
                $min = $this->db->query($queryMin)->row_array();
                $min = $min['min'];
                $data = [
                    'id_karyawan' => $p['id_karyawan'],
                    'id_kriteria' =>   $idk,
                    'id_subkriteria' =>   $idsub,
                    'nilai' => $nilai,
                    'normalisasi' => $min / $nilai
                ];
                $dataNormalisasi[] = $data;
            } else {
                $queryMax = "SELECT max(nilai) as max
                            FROM penilaian_saw join subkriteria_saw
                            ON penilaian_saw.id_subkriteria = subkriteria_saw.id_subkriteria
                            JOIN karyawan ON penilaian_saw.id_karyawan = karyawan.id_karyawan
                            WHERE penilaian_saw.id_subkriteria = $idsub AND karyawan.periode = (SELECT MAX(periode) FROM karyawan)";
                $max = $this->db->query($queryMax)->row_array();
                $max = $max['max'];
                $data = [
                    'id_karyawan' => $p['id_karyawan'],
                    'id_kriteria' =>   $idk,
                    'id_subkriteria' =>   $idsub,
                    'nilai' => $nilai,
                    'normalisasi' => $nilai / $max
                ];
                $dataNormalisasi[] = $data;
            }
        }

        $dataBobot = [];
        foreach ($dataNormalisasi as $d) {
            $subK = $d['id_subkriteria'];
            // join subkriteria_saw
            $queryBobot = "SELECT persentase
                            FROM subkriteria_saw
                            WHERE id_subkriteria = $subK";
            $bobot = $this->db->query($queryBobot)->row_array();
            $bobot = $bobot['persentase'];
            $data = [
                'id_karyawan' => $d['id_karyawan'],
                'id_kriteria' =>   $d['id_kriteria'],
                'id_subkriteria' =>   $d['id_subkriteria'],
                'nilai_normalisasi' => $d['normalisasi'],
                'nilai_preverensi' => $d['normalisasi'] * $bobot / 100
            ];
            $dataBobot[] = $data;
        }
        $sqlDelete = "DELETE FROM hitung_saw 
        WHERE id_karyawan IN (SELECT id_karyawan 
                              FROM karyawan 
                              WHERE periode = (SELECT MAX(periode) FROM karyawan))";
        $this->db->query($sqlDelete);
        $this->db->insert_batch('hitung_saw', $dataBobot);
        $dataKaryawan = [];
        foreach ($dataBobot as $data) {
            $idKaryawan = $data['id_karyawan'];

            // Jika id karyawan belum ada di array dataKaryawan, tambahkan array baru dengan id karyawan tersebut
            if (!isset($dataKaryawan[$idKaryawan])) {
                $dataKaryawan[$idKaryawan] = [
                    'id_karyawan' => $idKaryawan,
                    'nilai_rangking' => 0,
                ];
            }

            // Tambahkan nilai normalisasi bobot ke dalam array dataKaryawan dengan id karyawan yang sama
            $dataKaryawan[$idKaryawan]['nilai_rangking'] += $data['nilai_preverensi'];
        }

        $queryKaryawan = "DELETE FROM rangking_saw 
        WHERE id_karyawan IN (SELECT id_karyawan 
                              FROM karyawan 
                              WHERE periode = (SELECT MAX(periode) FROM karyawan))";
        $this->db->query($queryKaryawan);
        return $this->db->insert_batch('rangking_saw', $dataKaryawan);
    }
}
