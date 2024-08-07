<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->model('Penilaian_model');
  }

  public function index()
  {
    $data['title'] = 'Laporan';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $data['penilaian'] = $this->Penilaian_model->getAllPenilaian();
    $data['hitung'] = $this->Penilaian_model->getAllHitung();
    $data['nilaiakhir'] = $this->Penilaian_model->getAllNilaiAkhir();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('laporan/index', $data);
    $this->load->view('templates/footer');
  }

  public function diagram()
  {
    $data['title'] = 'Diagram Rangking';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('laporan/diagram', $data);
    $this->load->view('templates/footer');
  }
}
