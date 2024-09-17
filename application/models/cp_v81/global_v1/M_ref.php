<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_ref extends CI_Model {

  public function get_form_header($params = null)
  {
    $this->db_ref->select('*');
    $this->db_ref->from('ref_form_header a');

    if (!empty($params['id'])) {
      if (is_array($params['id'])) {
        $this->db_ref->where_in('a.id', $params['id']);
      } else {
        $this->db_ref->where('a.id', $params['id']);
      }
    }

    return $this->db_ref->get()->result_array();
  }

}

/* End of file M_ref.php */

?>