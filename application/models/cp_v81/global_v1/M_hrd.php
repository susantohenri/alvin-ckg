<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_hrd extends CI_Model {

  public function get($params = null)
  {
    $this->db->select('a.no_rm, a.ttd,  b.full_name nama, a.profesi_jabatan');
    $this->db->from('hr a');
    $this->db->join('users_profile b', 'a.no_rm = b.no_rm', 'left');
    $this->db->where('a.no_rm', $params['no_rm']);
    return $this->db->get()->result_array();    
  }

  public function get_by_param($params = null)
  {
    $this->db->select('a.ttd,  b.full_name nama');
    $this->db->from('hr a');
    $this->db->join('users_profile b', 'a.no_rm = b.no_rm', 'left');
    $this->db->where('a.no_rm', $params['no_rm']);
    return $this->db->get()->result_array();    
  }

}

/* End of file M_hrd.php */

?>