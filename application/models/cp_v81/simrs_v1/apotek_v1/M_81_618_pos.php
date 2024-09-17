<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_81_618_pos extends CI_Model {

  public function add_order($params)
  {
    $this->db->insert('order', $params);
    $id = $this->db->insert_id();

    return $id;
  }
  public function add_order_produk($params)
  {
    $this->db->insert('order_produk', $params);
    $id = $this->db->insert_id();

    return $id;
  }

  public function print_notes($params)
  {
    $this->load->model('cp_v81/global_v1/M_ref', 'ref');
    $this->load->model('cp_v81/global_v1/M_pasien_reg', 'reg');
    $this->load->model('cp_v81/simrs_v1/erm_v1/M_81_618_pos', 'pos');
    $this->load->model('cp_v81/simrs_v1/erm_v1/M_notes', 'notes');
    $this->load->model('cp_v81/simrs_v1/erm_v1/M_resume_medis', 'resume');
    $this->load->model('cp_v81/global_v1/M_clinic_profile', 'cp');
    $this->load->model('cp_v81/global_v1/M_hrd', 'hrd');

    $mpdf = new \Mpdf\Mpdf([
      'format'           => [80, 400], 
      'mode'             => 'utf-8',
      'default_font'     => 'helvetica',
      'orientation'      => 'P',
      'autoPageBreak' => false,
      'default_font_size'   => 10,
      'defaultheaderline'   => 0,
      'defaultfooterline'   => 0,
      'margin_left'         => 5,
      'margin_right'        => 5,
      'margin_top'          => 5,
      'margin_bottom'       => 5,
  ]);

    $data['form'] = $this->ref->get_form_header(['id'  => $params['id_ref_global_tipe_42']])[0];
    $data['title'] = $data['form']['nama_form'];
    $data['clinic'] = $this->cp->get();

    $data['session'] = $this->hrd->get(['no_rm' => $this->data_session['rm_number']])[0];
    $data['hrd_petugas_approve'] = !empty($hrd_petugas_approve) ? $hrd_petugas_approve[0] : [];

    $html = $this->load->view($this->_view . 'pdf', $data, true);

    $data['form']['pdf_file_name'] = $data['form']['pdf_file_name'].$params['id'].'_'.date('ymd');

    $mpdf->SetDisplayMode('fullpage');
    $mpdf->WriteHTML($html);
    // $mpdf->page   = 0;
    // $mpdf->state  = 0;
    $pdf_string = $mpdf->Output($data['form']['pdf_file_name'] . '.pdf', 'S');

    return base64_encode($pdf_string);
  }

  public function get_data_barang($params = [])
  {
    $this->db->select('a.id, a.id_produk, a.no_batch, a.nama_produk');
  
    $this->db->from('mutasi_ro_details a');

    if (!empty($params['no_batch'])) {
      $this->db->where('a.no_batch', $params['no_batch']);
    }

    $query = $this->db->get()->result_array();
      
    return $query;
  }

  public function get_harga_jual($params = [])
  {
    $this->db->select('a.id, a.id_produk, a.harga_jual_sat_kecil');
  
    $this->db->from('mutasi_master_harga_jual a');

    if (!empty($params['id_produk'])) {
      $this->db->where('a.id_produk', $params['id_produk']);
    }

    $query = $this->db->get()->result_array();
      
    return $query;
  }
  
  public function get_stock_opname($params = [])
  {
    $this->db->select('a.id, a.qty, a.id_dept');
  
    $this->db->from('mutasi_stock_opname a');

    if (!empty($params['id_dept'])) {
      $this->db->where('a.id_dept', $params['id_dept']);
    }

    if (!empty($params['id_mutasi_ro_details'])) {
      $this->db->where('a.id_mutasi_ro_details', $params['id_mutasi_ro_details']);
    }

    $query = $this->db->get()->result_array();
      
    return $query;
  }

  public function get_max_id_order()
  {
    $this->db->select('MAX(a.id) AS id');
  
    $this->db->from('order a');

    $query = $this->db->get()->result_array();
      
    return $query;
  }

}

/* End of file M_resume_medis.php */

?>