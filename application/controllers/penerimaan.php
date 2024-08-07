<?php
defined('BASEPATH') or exit('No direct script access allowed');

class penerimaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Kriteria_model');
        $this->load->model('Subkriteria_model');
        $this->load->model('Karyawan_model');
        $this->load->model('NilaiGap_model');
        $this->load->model('Penilaian_model');
        $this->load->model('Kriteriasaw_model');
        $this->load->model('subkriteriasaw_model');
        $this->load->model('Penilaiansaw_model');
    }

    public function kriteria_saw()
    {
        $data['title'] = 'Kriteria SAW';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['kriteria'] = $this->Kriteriasaw_model->getAllKriteria();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('penerimaan/kriteria/kriteria_saw', $data);
        $this->load->view('templates/footer');
    }
    public function tambahkriteria_saw()
    {
        $data['title'] = 'Kriteria SAW';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_kriteria', 'Nama Kriteria', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('penerimaan/kriteria/tambahkriteria_saw', $data);
            $this->load->view('templates/footer');
        } else {

            $this->Kriteriasaw_model->tambahDataKriteria();
            $this->session->set_flashdata('message', '<div class="alert
            alert-success" role="alert"> Data berhasil ditambahkan!</div>');
            redirect('penerimaan/kriteria_saw');
        }
    }

    public function editkriteria_saw($id_kriteria)
    {
        $data['title'] = 'Kriteria SAW';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['kriteria'] = $this->Kriteriasaw_model->getKriteriaById($id_kriteria);
        $kriteria = $this->Kriteria_model->getKriteriaById($id_kriteria);

        $this->form_validation->set_rules('nama_kriteria', 'Nama Kriteria', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('penerimaan/kriteria/editkriteria_saw', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Kriteriasaw_model->ubahDataKriteria($kriteria, $id_kriteria);

            $this->session->set_flashdata('message', '<div class="alert
            alert-success" role="alert"> Data berhasil diubah!</div>');
            redirect('penerimaan/kriteria_saw');
        }
    }

    public function hapusKriteria_saw()
    {
        $this->Kriteriasaw_model->hapusDataKriteria();
        $this->session->set_flashdata('message', '<div class="alert
        alert-success" role="alert"> Data berhasil dihapus!</div>');
        redirect('penerimaan/kriteria_saw');
    }

    public function subkriteria_saw()
    {
        $data['title'] = 'Sub Kriteria SAW';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['subkriteria'] = $this->subkriteriasaw_model->getAllSubkriteria();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('penerimaan/subkriteria/subkriteria_saw', $data);
        $this->load->view('templates/footer');
    }
    public function tambahsubkriteria_saw()
    {
        $data['title'] = 'Sub Kriteria SAW';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('id_kriteria', 'Kriteria', 'required');
        $this->form_validation->set_rules('nama_subkriteria', 'Nama Subkriteria', 'required|trim');
        $this->form_validation->set_rules('atribut', 'Atribut', 'required|trim');
        $this->form_validation->set_rules('persentase', 'Persentase', 'required|trim');
        $data['subkriteria'] = $this->db->get('subkriteria_saw')->result_array();
        $data['kriteria'] = $this->Kriteriasaw_model->getAllKriteria();
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('penerimaan/subkriteria/tambahsubkriteria_saw', $data);
            $this->load->view('templates/footer');
        } else {
            $this->subkriteriasaw_model->tambahDataSubkriteria();
            $this->session->set_flashdata('message', '<div class="alert
            alert-success" role="alert"> Data berhasil ditambahkan!</div>');
            redirect('penerimaan/subkriteria_saw');
        }
    }

    public function editsubkriteria_saw($id_subkriteria)
    {
        $data['title'] = 'Sub Kriteria SAW';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $subkriteria = $this->subkriteriasaw_model->getSubkriteriaById($id_subkriteria);
        $data['subkriteria'] = $this->subkriteriasaw_model->getSubkriteriaById($id_subkriteria);
        $data['kriteria'] = $this->Kriteriasaw_model->getAllKriteria();
        $data['atribut'] = ['Cost', 'Benefit'];
        $data['subkriteriaall'] = $this->db->get('subkriteria_saw')->result_array();
        $this->form_validation->set_rules('id_kriteria', 'Kriteria', 'required');
        $this->form_validation->set_rules('nama_subkriteria', 'Nama Sub Kriteria', 'required|trim');
        $this->form_validation->set_rules('atribut', 'Atribut', 'required|trim');
        $this->form_validation->set_rules('persentase', 'Persentase', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('penerimaan/subkriteria/editsubkriteria_saw', $data);
            $this->load->view('templates/footer');
        } else {
            $this->subkriteriasaw_model->ubahDataSubkriteria($subkriteria, $id_subkriteria);
            // $this->Alternatif_model->updateNormalisasiHasil();
            $this->session->set_flashdata('message', '<div class="alert
            alert-success" role="alert"> Data berhasil diubah!</div>');
            redirect('penerimaan/subkriteria_saw');
        }
    }


    public function hapussubkriteria_saw()
    {

        $this->subkriteriasaw_model->hapusDataSubkriteria();
        $this->session->set_flashdata('message', '<div class="alert
        alert-success" role="alert"> Data berhasil dihapus!</div>');
        redirect('penerimaan/subkriteria_saw');
    }

    public function karyawan()
    {
        $data['title'] = 'Pelamar';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['karyawan'] = $this->Karyawan_model->getAllKaryawan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('penerimaan/karyawan/karyawan', $data);
        $this->load->view('templates/footer');
    }

    public function tambahkaryawan()
    {
        $data['title'] = 'Pelamar';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_karyawan', 'Nama Karyawan', 'required|trim');
        $this->form_validation->set_rules('periode', 'Periode', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('penerimaan/karyawan/tambahkaryawan', $data);
            $this->load->view('templates/footer');
        } else {

            $this->Karyawan_model->tambahDataKaryawan();
            $this->session->set_flashdata('message', '<div class="alert
            alert-success" role="alert"> Data berhasil ditambahkan!</div>');
            redirect('penerimaan/karyawan');
        }
    }

    public function editkaryawan($id_karyawan)
    {
        $data['title'] = 'Pelamar';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['karyawan'] = $this->Karyawan_model->getKaryawanById($id_karyawan);
        $karyawan = $this->Karyawan_model->getKaryawanById($id_karyawan);

        $this->form_validation->set_rules('nama_karyawan', 'Nama Karyawan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('penerimaan/karyawan/editkaryawan', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Karyawan_model->ubahDataKaryawan($karyawan, $id_karyawan);

            $this->session->set_flashdata('message', '<div class="alert
            alert-success" role="alert"> Data berhasil diubah!</div>');
            redirect('penerimaan/karyawan');
        }
    }

    public function hapuskaryawan()
    {
        $this->Karyawan_model->hapusDataKaryawan();
        $this->session->set_flashdata('message', '<div class="alert
        alert-success" role="alert"> Data berhasil dihapus!</div>');
        redirect('penerimaan/karyawan');
    }

    public function hapuskaryawannilaisaw()
    {
        $this->Karyawan_model->hapusDataKaryawanNilaiSaw();
        $this->session->set_flashdata('message', '<div class="alert
        alert-success" role="alert"> Data berhasil dihapus!</div>');
        redirect('penerimaan/penilaian_saw');
    }


    public function penilaian_saw()
    {
        $data['title'] = 'Penilaian SAW';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['penilaian'] = $this->Penilaiansaw_model->getAllPenilaian();
        $data['hitung'] = $this->Penilaiansaw_model->getAllHitung();
        $data['nilaiakhir'] = $this->Penilaiansaw_model->getAllNilaiAkhir();
        $data['nilai'] = [
            ["id_nilai" => 1, "nama_nilai" => "1-Sangat Kurang"],
            ["id_nilai" => 2, "nama_nilai" => "2-Kurang"],
            ["id_nilai" => 3, "nama_nilai" => "3-Cukup"],
            ["id_nilai" => 4, "nama_nilai" => "4-Baik"],
            ["id_nilai" => 5, "nama_nilai" => "5-Sangat Baik"]
        ];
        // echo '<pre>';
        // var_dump($data['nilai']);
        // echo '</pre>';
        // die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('penerimaan/penilaian/penilaian_saw', $data);
        $this->load->view('templates/footer');
    }

    public function tambahpenilaian_saw()
    {
        $data['title'] = 'Penilaian SAW';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('id_karyawan', 'Karyawan', 'required');
        $data['penilaian'] = $this->db->get('penilaian_saw')->result_array();
        $data['karyawan'] = $this->Karyawan_model->getAllKaryawanAdded_saw();
        $data['kriteria'] = $this->Kriteriasaw_model->getAllKriteria();
        $data['subkriteria'] = $this->subkriteriasaw_model->getAllSubkriteria();
        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('penerimaan/penilaian/tambahpenilaian_saw', $data);
            $this->load->view('templates/footer');
        } else {

            $this->Penilaiansaw_model->tambahDataPenilaian();
            $this->session->set_flashdata('message', '<div class="alert
            alert-success" role="alert"> Data berhasil ditambahkan!</div>');
            redirect('penerimaan/penilaian_saw');
        }
    }

    public function editpenilaian_saw()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->Penilaiansaw_model->editDataPenilaian();
        $this->session->set_flashdata('message', '<div class="alert
            alert-success" role="alert"> Data berhasil diubah!</div>');
        redirect('penerimaan/penilaian_saw');
    }
}
