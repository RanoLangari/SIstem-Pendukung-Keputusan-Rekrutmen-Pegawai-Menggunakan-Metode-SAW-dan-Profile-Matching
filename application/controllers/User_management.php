<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_management extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->model('Usermanagement_model', 'user_m');
  }

  public function index()
  {
    $data['title'] = 'User';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $data['alluser'] = $this->user_m->getAllUser();
    $data['role'] = $this->user_m->getAllRole();


    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('usermanagement/index', $data);
    $this->load->view('templates/footer');
  }

  public function tambahUser()
  {

    $data['title'] = 'User';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $data['alluser'] = $this->user_m->getAllUser();
    $data['role'] = $this->user_m->getAllRole();

    $name = htmlspecialchars($this->input->post('name', true));
    $email = htmlspecialchars($this->input->post('email', true));
    $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
    $role_id = htmlspecialchars($this->input->post('role_id', true));
    $is_active = htmlspecialchars($this->input->post('is_active', true));

    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
      'is_unique' => 'This email has already registered!'
    ]);
    if ($this->form_validation->run() == false) {

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('usermanagement/index', $data);
      $this->load->view('templates/footer');
    } else {
      $this->user_m->tambahUser($name, $email, $password, $role_id, $is_active);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User Berhasil Ditambahkan </div>');
      redirect('user_management');
    }
  }

  public function editUser()
  {
    $id = $this->input->post('id', true);
    $name = htmlspecialchars($this->input->post('name', true));
    $email = htmlspecialchars($this->input->post('email', true));
    $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
    $role_id = htmlspecialchars($this->input->post('role_id', true));
    $is_active = htmlspecialchars($this->input->post('is_active', true));



    $this->user_m->editUser($id, $name, $email, $password, $role_id, $is_active);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User Berhasil Diubah </div>');
    redirect('user_management');
  }

  public function hapusUser()
  {
    $id = $this->input->post('id', TRUE);
    $this->user_m->hapusUser($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User Berhasil Dihapus </div>');
    redirect('user_management');
  }
}
