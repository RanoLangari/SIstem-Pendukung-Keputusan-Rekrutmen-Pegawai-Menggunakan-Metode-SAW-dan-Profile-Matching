<?php
defined('BASEPATH') or exit('No direct script access allowed');

class wawancara extends CI_Controller
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


    public function kriteria()
    {
        $data['title'] = 'Kriteria';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['kriteria'] = $this->Kriteria_model->getAllKriteria();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('wawancara/kriteria/kriteria', $data);
        $this->load->view('templates/footer');
    }

    public function tambahkriteria()
    {
        $data['title'] = 'Kriteria';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_kriteria', 'Nama Kriteria', 'required|trim');
        $this->form_validation->set_rules('nilai_kriteria', 'Nilai Kriteria', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('wawancara/kriteria/tambahkriteria', $data);
            $this->load->view('templates/footer');
        } else {

            $this->Kriteria_model->tambahDataKriteria();
            $this->session->set_flashdata('message', '<div class="alert
            alert-success" role="alert"> Data berhasil ditambahkan!</div>');
            redirect('wawancara/kriteria');
        }
    }

    public function editkriteria($id_kriteria)
    {
        $data['title'] = 'Kriteria';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['kriteria'] = $this->Kriteria_model->getKriteriaById($id_kriteria);
        $kriteria = $this->Kriteria_model->getKriteriaById($id_kriteria);

        $this->form_validation->set_rules('nama_kriteria', 'Nama Kriteria', 'required|trim');
        $this->form_validation->set_rules('nilai_kriteria', 'Nilai Kriteria', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('wawancara/kriteria/editkriteria', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Kriteria_model->ubahDataKriteria($kriteria, $id_kriteria);

            $this->session->set_flashdata('message', '<div class="alert
            alert-success" role="alert"> Data berhasil diubah!</div>');
            redirect('wawancara/kriteria');
        }
    }

    public function editsubkriteria($id_subkriteria)
    {
        $data['title'] = 'Sub Kriteria';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $subkriteria = $this->Subkriteria_model->getSubkriteriaById($id_subkriteria);
        $data['subkriteria'] = $this->Subkriteria_model->getSubkriteriaById($id_subkriteria);
        $data['kriteria'] = $this->Kriteria_model->getAllKriteria();
        $data['faktor'] = ['Core', 'Secondary'];
        $data['nilai_subkriteria'] = [5, 4, 3, 2, 1];
        $data['subkriteriaall'] = $this->db->get('subkriteria')->result_array();
        $this->form_validation->set_rules('id_kriteria', 'Kriteria', 'required');
        $this->form_validation->set_rules('nama_subkriteria', 'Nama Sub Kriteria', 'required|trim');
        $this->form_validation->set_rules('nilai_subkriteria', 'Nilai Sub Kriteria', 'required|trim');
        $this->form_validation->set_rules('faktor', 'Faktor', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('wawancara/subkriteria/editsubkriteria', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Subkriteria_model->ubahDataSubkriteria($subkriteria, $id_subkriteria);
            // $this->Alternatif_model->updateNormalisasiHasil();
            $this->session->set_flashdata('message', '<div class="alert
            alert-success" role="alert"> Data berhasil diubah!</div>');
            redirect('wawancara/subkriteria');
        }
    }
    public function hapusKriteria()
    {
        $this->Kriteria_model->hapusDataKriteria();
        $this->session->set_flashdata('message', '<div class="alert
        alert-success" role="alert"> Data berhasil dihapus!</div>');
        redirect('wawancara/kriteria');
    }

    public function detail($id_subkriteria)
    {
        $data['title'] = 'Detail Subkriteria';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['detail'] = $this->Subkriteria_model->getDetailSubkriteria($id_subkriteria);
        $data['id_subkriteria'] = $id_subkriteria;
        $data['nama_subkriteria'] = $this->Subkriteria_model->getSubkriteriaById($id_subkriteria)['nama_subkriteria'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('wawancara/detail/detail', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_detail()
    {
        $data['title'] = 'Tambah Penilaian Subkriteria';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_penilaian', 'Nama Penilaian', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('wawancara/detail/tambah_detail', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Subkriteria_model->tambahDataDetail();
            $this->session->set_flashdata('message', '<div class="alert
            alert-success" role="alert"> Data berhasil ditambahkan!</div>');
            redirect('wawancara/subkriteria');
        }
    }

    public function editdetail($id_wawancara)
    {
        $data['title'] = 'Edit Penilaian Subkriteria';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['detail'] = $this->Subkriteria_model->getDetailById($id_wawancara);
        $this->form_validation->set_rules('nama_penilaian', 'Nama Penilaian', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('wawancara/detail/editdetail', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Subkriteria_model->ubahDataDetail($id_wawancara);
            $this->session->set_flashdata('message', '<div class="alert
            alert-success" role="alert"> Data berhasil diubah!</div>');
            redirect('wawancara/subkriteria');
        }
    }

    public function hapusdetail($id_wawancara)
    {
        $this->Subkriteria_model->hapusDataDetail($id_wawancara);
        $this->session->set_flashdata('message', '<div class="alert
        alert-success" role="alert"> Data berhasil dihapus!</div>');
        redirect('wawancara/subkriteria');
    }


    public function subkriteria()
    {
        $data['title'] = 'Sub Kriteria';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['subkriteria'] = $this->Subkriteria_model->getAllSubkriteria();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('wawancara/subkriteria/subkriteria', $data);
        $this->load->view('templates/footer');
    }

    public function tambahsubkriteria()
    {
        $data['title'] = 'Sub Kriteria';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('id_kriteria', 'Kriteria', 'required');
        $this->form_validation->set_rules('nama_subkriteria', 'Nama Subkriteria', 'required|trim');
        $this->form_validation->set_rules('nilai_subkriteria', 'Nilai Subkriteria', 'required|trim');
        $data['subkriteria'] = $this->db->get('subkriteria')->result_array();
        $data['kriteria'] = $this->Kriteria_model->getAllKriteria();
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('wawancara/subkriteria/tambahsubkriteria', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Subkriteria_model->tambahDataSubkriteria();
            $this->session->set_flashdata('message', '<div class="alert
            alert-success" role="alert"> Data berhasil ditambahkan!</div>');
            redirect('wawancara/subkriteria');
        }
    }


    public function hapussubkriteria()
    {

        $this->Subkriteria_model->hapusDataSubkriteria();
        $this->session->set_flashdata('message', '<div class="alert
        alert-success" role="alert"> Data berhasil dihapus!</div>');
        redirect('wawancara/subkriteria');
    }

    public function hapuskaryawannilai()
    {
        $this->Karyawan_model->hapusDataKaryawanNilai();
        $this->session->set_flashdata('message', '<div class="alert
        alert-success" role="alert"> Data berhasil dihapus!</div>');
        redirect('wawancara/penilaian');
    }


    public function nilaigap()
    {
        $data['title'] = 'Nilai GAP';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['nilaigap'] = $this->NilaiGap_model->getAllNilaiGap();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('wawancara/nilaigap/nilaigap', $data);
        $this->load->view('templates/footer');
    }

    public function penilaian()
    {
        $data['title'] = 'Penilaian';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['penilaian'] = $this->Penilaian_model->getAllPenilaian();
        $data['hitung'] = $this->Penilaian_model->getAllHitung();
        $data['nilaiakhir'] = $this->Penilaian_model->getAllNilaiAkhir();
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
        $this->load->view('wawancara/penilaian/penilaian', $data);
        $this->load->view('templates/footer');
    }

    public function tambahpenilaian()
    {
        $data['title'] = 'Penilaian';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('id_karyawan', 'Karyawan', 'required');

        $data['penilaian'] = $this->db->get('penilaian')->result_array();
        $data['karyawan'] = $this->Karyawan_model->getAllKaryawanAdded();
        $data['kriteria'] = $this->Kriteria_model->getAllKriteria();
        $data['subkriteria'] = $this->Subkriteria_model->getAllSubkriteria();
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('wawancara/penilaian/tambahpenilaian', $data);
            $this->load->view('templates/footer');
        } else {

            $this->Penilaian_model->tambahDataPenilaian();
            $this->session->set_flashdata('message', '<div class="alert
            alert-success" role="alert"> Data berhasil ditambahkan!</div>');
            redirect('wawancara/penilaian');
        }
    }

    public function editpenilaian()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->Penilaian_model->editDataPenilaian();
        $this->session->set_flashdata('message', '<div class="alert
            alert-success" role="alert"> Data berhasil diubah!</div>');
        redirect('wawancara/penilaian');
    }



    public function editKuota()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->Penilaian_model->editKuota();
        $this->session->set_flashdata('message', '<div class="alert
            alert-success" role="alert"> Data berhasil diubah!</div>');
        redirect('wawancara/penilaian');
    }
}
