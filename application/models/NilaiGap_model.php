<?php

class NilaiGap_model extends CI_Model
{
    public function getAllNilaiGap()
    {
        return $this->db->get('nilai_gap')->result_array();
    }
  }