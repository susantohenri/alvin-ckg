<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_clinic_profile extends CI_Model
{

  public function get($params = null)
  {
    $this->db->select('*');
    $this->db->from('clinic_profile a');
    $get = $this->db->get()->row_array();

    return $get;
  }
}

/* End of file M_clinic_profile.php */