<?php

class Usermanagement_model extends CI_Model
{
  public function getAllUser()
  {
    $user = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $user2 = $user['id'];

    return $this->db->select('*, user.id user_id')->join('user_role', 'user_role.id = user.role_id')->get_where('user', 'user.id !=' . $user2)->result_array();
  }

  public function getAllRole()
  {
    return $this->db->get('user_role')->result_array();
  }

  public function tambahUser($name, $email, $password, $role_id, $is_active)
  {
    // cek jika ada gambar yang akan diupload
    $upload_image = $_FILES['image']['name'];

    if ($upload_image) {
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $config['max_size']     = '9999999';
      $config['upload_path'] = './assets/img/profile';
      $this->load->library('upload', $config);


      if ($this->upload->do_upload('image')) {
        $image = $this->upload->data('file_name');
      } else {

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
        redirect('user_management');
      }
    } else {
      $image = 'default.jpg';
    }

    $data = [
      'name' => $name,
      'image' => $image,
      'email' => $email,
      'password' => $password,
      'role_id' => $role_id,
      'is_active' => $is_active,
      'date_created' => time(),
    ];
    $this->db->insert('user', $data);
  }

  public function editUser($id, $name, $email, $password, $role_id, $is_active)
  {


    $user = $this->db->get_where('user', 'id =' . $id)->row_array();

    // cek jika ada gambar yang akan diupload
    $upload_image = $_FILES['image']['name'];

    if ($upload_image) {
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $config['max_size']     = '9999999';
      $config['upload_path'] = './assets/img/profile';
      $this->load->library('upload', $config);

      if ($this->upload->do_upload('image')) {

        $old_image = $user['image'];
        if ($old_image != 'default.png') {
          unlink(FCPATH . 'assets/img/profile/' . $old_image);
        }
        $new_image =  $this->upload->data('file_name');
        $this->db->set('image', $new_image);
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
        redirect('user_management');
      }
    }

    $data = [
      'name' => $name,
      'email' => $email,
      'role_id' => $role_id,
      'is_active' => $is_active,
    ];
    if ($this->input->post('password') != NULL) {
      $this->db->set('password', $password);
    }
    $this->db->set($data)->where('id =' . $id)->update('user');
  }

  public function hapusUser($id)
  {

    $user = $this->db->get_where('user', 'id =' . $id)->row_array();

    $old_image = $user['image'];
    if ($old_image != 'default.jpg') {
      unlink(FCPATH . 'assets/img/profile/' . $old_image);
    }

    $this->db->delete('user', 'id =' . $id);
  }
}
