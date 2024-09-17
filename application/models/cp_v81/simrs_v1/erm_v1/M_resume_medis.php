<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_resume_medis extends CI_Model {

  public function add($params)
  {
    $tipe_notes = 'resume_medis';
    $data_resume = $this->db->get_where('notes_resume', ['id_reg' => $params['id_reg']])->row_array();

    $update_resume = [
      'updated_date' => date('Y-m-d H:i:s'),
    //   'updated_by'   => !empty($params['updated_by']) ? $params['updated_by'] : (!empty($this->data_session['nama']) ? $this->data_session['nama'] : 'SIMRS')
    'updated_by'   => !empty($params['updated_by']) ? $params['updated_by'] : (isset($this->data_session) ? $this->data_session['nama'] : 'SIMRS')
    ];

    $update_resume = array_merge($update_resume, $params);

    if (!empty($data_resume)) {
      $this->db->where('id', $data_resume['id']);
      $this->db->update('notes_resume', $update_resume);
      $insert_id = $data_resume['id'];
    } else {
      $this->db->insert('notes_resume', $update_resume);
      $insert_id = $this->db->insert_id();
    }

    $data_resume = $this->db->get_where('notes_resume', ['id' => $insert_id])->row_array();

    $data_resume['id_notes_resume'] = $data_resume['id'];
    unset($data_resume['id']);
    $this->db->insert('notes_resume_log', $data_resume);


    $res['status']  = 200;
    $res['message'] = "Berhasil tambah data baru.";
    return $res;
  }

  public function get($params)
  {
    $this->db->select('
      a.*,
      b.no_reg
    ');
    $this->db->from('notes_resume a');
    $this->db->join('pasien_registrasi b', 'a.id_reg = b.id');

    if (!empty($params['id_notes_resume'])) {
      $this->db->where('a.id', $params['id_notes_resume']);
    }

    if (!empty($params['id_reg'])) {      
      $this->db->where_in('a.id_reg', $params['id_reg']);
    }
    
    $data_resume = $this->db->get()->row_array();

    return $data_resume;
  }

  public function hapus_notes_resume($params)
  {
    $data_resume = $this->db->get_where('notes_resume', ['id_reg'  => $params['id_reg']])->row_array();

    if (!empty($data_resume)) {
      $this->db->where('id', $data_resume['id']);
      $this->db->delete('notes_resume');
      
      $res['status']  = 200;
      $res['message'] = "Berhasil hapus data.";
      
    } else {
      $res['status']  = 400;
      $res['message'] = "Data tidak ditemukan..";
    }

    return $res;
  }
}

/* End of file M_resume_medis.php */

?>