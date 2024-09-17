<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_81_11_resume extends CI_Model {

  public function get_log_erm_cetakan($where = []) {
    if($where) {
      $this->db->where($where);
    }
    $this->db->order_by('id', 'DESC');
    return $this->db->get('log_erm_cetakan')->row_array();
  }

  public function insert_log_erm_cetakan($data) {
    $this->db->insert('log_erm_cetakan', $data);
    return $this->db->affected_rows();
  }

  public function print_resume($params)
  {
    $this->load->model('cp_v81/global_v1/M_ref', 'ref');
    $this->load->model('cp_v81/global_v1/M_pasien_reg', 'reg');
    $this->load->model('cp_v81/simrs_v1/erm_v1/M_81_11_resume', 'erm_resume');
    $this->load->model('cp_v81/simrs_v1/erm_v1/M_notes', 'notes');
    $this->load->model('cp_v81/simrs_v1/erm_v1/M_resume_medis', 'resume');
    $this->load->model('cp_v81/simrs_v1/erm_v1/M_81_11_resume', 'erm_resume');
    $this->load->model('cp_v81/global_v1/M_clinic_profile', 'cp');
    $this->load->model('cp_v81/global_v1/M_hrd', 'hrd');
    $this->db_ref = $this->load->database('db_ref', true);

    $cetakan = $this->erm_resume->get_log_erm_cetakan(['id_reg' => $params['id_reg'], 'kode_form' => $params['id_ref_global_tipe_42']]);


    $this->insert_log_erm_cetakan([
      'id_reg' => $params['id_reg'],
      'kode_form' => $this->_id_ref_global_tipe_42,
      'no_cetak' => $cetakan ? $cetakan['no_cetak'] + 1 : 1,
      'created_date' => date('Y-m-d H:i:s'),
      'created_by' =>  isset($this->data_session) ? $this->data_session['nama'] : 'SIMRS'
    ]);

    $mpdf = new \Mpdf\Mpdf([
      'format'           => 'A4',
      'mode'             => 'utf-8',
      'default_font'     => 'arial',
      'orientation'      => 'P',
      'setAutoTopMargin' => 'stretch',
      'default_font_size'   => 8,
      'defaultheaderline'   => 0,
      'defaultfooterline'   => 0,
      'margin_left'         => 10,
      'margin_right'        => 10,
      'margin_top'          => 10,
      'margin_bottom'       => 15,
    ]);

    $data['form'] = $this->ref->get_form_header(['id'  => $params['id_ref_global_tipe_42']])[0];
    $data['title'] = $data['form']['nama_form'];
    $data['clinic'] = $this->cp->get();
    $data['cetakan'] = $this->erm_resume->get_log_erm_cetakan(['id_reg' => $params['id_reg'], 'kode_form' => $params['id_ref_global_tipe_42']]);


    $data['reg'] = $this->reg->get(['id_reg' => $params['id_reg']])[0];
    $data['resume'] = $this->resume->get(['id_reg' => $params['id_reg']]);
    $data['hrd'] = $this->hrd->get(['no_rm' => $data['reg']['no_rm_dpjp']])[0];

    $html = $this->load->view($this->_view . 'pdf', $data, true);

    $mpdf->SetDisplayMode('fullpage');
    $mpdf->WriteHTML($html);
    $pdf_string = $mpdf->Output($data['title'] . '.pdf', 'S');

    return base64_encode($pdf_string);
  }

}

/* End of file M_resume_medis.php */

?>