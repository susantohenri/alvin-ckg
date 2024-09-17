<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_dept extends CI_Model {

  public function get($params = null)
  {
    $this->db->select('*');
    $this->db->from('dept a');

    if (!empty($params['id'])) {
      if (is_array($params['id'])) {
        $this->db->where_in('a.id', $params['id']);
      } else {
        $this->db->where('a.id', $params['id']);
      }
    }

    return $this->db->get()->result_array();
  }

}

/* End of file M_ref.php */

?>