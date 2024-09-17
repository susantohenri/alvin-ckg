<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_81_test_erm extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->_class = $this->uri->segments[1];
    $this->_id_ref_global_tipe_42 = 3070;

    $this->load->model('cp_v81/global_v1/M_clinic_profile', 'cp');
    $this->load->model('cp_v81/global_v1/M_hrd', 'hrd');
    $this->load->model('cp_v81/global_v1/M_ref', 'ref');
    $this->load->model('cp_v81/global_v1/M_pasien_reg', 'reg');
    $this->load->model('cp_v81/simrs_v1/erm_v1/M_81_test_erm', 'aps');
    $this->load->model('cp_v81/simrs_v1/erm_v1/M_notes', 'notes');
    $this->load->model('cp_v81/simrs_v1/erm_v1/M_resume_medis', 'resume');

    $this->_view = 'web/cp_v81/contents/simrs_v1/erm_v1/81_test_erm/';
    $this->_master = 'web/cp_v81/layout/';
    $this->_app_js = $this->_assets . 'web/cp_v81/simrs_v1/erm_v1/81_test_erm/';
  }

  public function index($params = null)
  {
    if (empty($params)) {
      redirect(base_url('81_home'));
    }

    $token_data = $this->_check_token($params);
    $data['token'] = $params;
    $data['token_data'] = $token_data;

    $data['url'] = base_url($this->_class);
    $data['title'] = '3070 ERM ASP';
    $data['contents'] = "{$this->_view}index";

    $data['css'] = [];
    $data['js'] = [
      $this->_assets . 'js/signature_pad.min.js',
      $this->_app_js . 'index.js?t='. time(),
    ];

    $data['ref'] = $this->ref->get_form_header(['id' => $this->_id_ref_global_tipe_42])[0];
    $data['reg'] = $this->reg->get(['id_reg' => $token_data['id_reg']])[0];
    $data['resume'] = $this->resume->get(['id_reg' => $token_data['id_reg']]);
    $data['notes'] = $this->notes->get(['id_reg'  => $token_data['id_reg'], 'id_ref_global_tipe_42' => $this->_id_ref_global_tipe_42]);

    if (!empty($token_data['is_tab'])) {
      $data['is_tab'] = $token_data['is_tab'];
      $this->load->view($data['contents'], $data);
    } else {
      $this->load->view($this->_master . "master", $data);
    }
  }

  public function form_process($params = null)
  {
    $token_data = $this->_check_token($params);

    $post = $this->input->post();

    $this->form_validation->set_rules(
      'notes_3070_status_pemberi_pernyataan',
      'status_pemberi_pernyataan',
      'required',
      array('required' => 'Mohon pilih status pemberi pernyataan')
    );

    if ($post['notes_3070_status_pemberi_pernyataan'] != 'Pasien') {
      $this->form_validation->set_rules(
        'notes_3070_nama_pemberi_pernyataan',
        'nama_pemberi_pernyataan',
        'required',
        array('required' => 'Mohon isi nama pemberi pernyataan')
      );

      $this->form_validation->set_rules(
        'notes_3070_telpon_pemberi_pernyataan',
        'telpon_pemberi_pernyataan',
        'required',
        array('required' => 'Mohon isi no. telp pemberi pernyataan')
      );

      $this->form_validation->set_rules(
        'notes_3070_tgl_lahir_pemberi_pernyataan',
        'tgl_lahir_pemberi_pernyataan',
        'required',
        array('required' => 'Mohon isi tanggal lahir pemberi pernyataan')
      );

      $this->form_validation->set_rules(
        'notes_3070_jenis_kelamin_pemberi_pernyataan',
        'jenis_kelamin_pemberi_pernyataan',
        'required',
        array('required' => 'Mohon isi jenis_kelamin pemberi pernyataan')
      );
      $this->form_validation->set_rules(
        'notes_3070_prognosa',
        'prognosa',
        'required',
        array('required' => 'Mohon isi alasan pulang')
      );
  
      $this->form_validation->set_rules(
        'notes_3070_instruksi_pulang',
        'instruksi_pulang',
        'required',
        array('required' => 'Mohon isi instruksi pulang')
      );
    } else {
      $reg = $this->reg->get(['id_reg' => $token_data['id_reg']])[0];

      $post['notes_3070_nama_pemberi_pernyataan'] = $reg['nama_pasien'];
      $post['notes_3070_telpon_pemberi_pernyataan'] = $reg['mobile_phone'];
      $post['notes_3070_tgl_lahir_pemberi_pernyataan'] = $reg['umur'];
      $post['notes_3070_jenis_kelamin_pemberi_pernyataan'] = $reg['kelamin'];
    }


    $this->form_validation->set_rules(
      'notes_3070_ttd_pasien',
      'ttd_pasien',
      'required',
      array('required' => 'Mohon isi tanda tangan pasien')
    );

    if ($this->form_validation->run() == FALSE) {
      $error_key = array_key_first($this->form_validation->error_array());
      $message = $this->form_validation->error_array()[$error_key];

      $output = [
        'status'  => 400,
        'message' => $message,
      ];
    } else {

      $notes = [];
      foreach ($post as $k0 => $v0) {
        if (str_contains($k0, '_' . $this->_id_ref_global_tipe_42 . '_')) {
          $notes_key = str_replace('notes_' . $this->_id_ref_global_tipe_42 . '_', '', $k0);
          $notes[$notes_key] = $v0;
        }
      }

      $params = [
        'no_rm'                 => $token_data['no_rm'],
        'id_pasien_registrasi'  => $token_data['id_reg'],
        'created_date'          => date('Y-m-d H:i:s'),
        'id_ref_global_tipe_42' => $this->_id_ref_global_tipe_42,
        'notes'                 => $notes,
      ];

      if (!empty($token_data['id_notes'])) {
        $params['id_notes'] = $token_data['id_notes'];
        $result = $this->notes->edit_notes($params);
      } else {
        $result = $this->notes->tambah_notes($params);
      }


      $this->resume->add([
        'id_reg'  => $token_data['id_reg'],
      ]);

      $output = [
        'status'  => 200,
        'message' => 'Success',
      ];
    }

    response($output);
  }

  public function delete_process($params = null)
  {
    $token_data = $this->_check_token($params);

    $output = $this->notes->hapus_notes(['id_notes' => $token_data['id_notes']]);

    $output = [
      'status'  => $output['status'] == '200' ? 200 : 400,
      'message' => $output['message']
    ];

    response($output);
  }


  public function pdf($params)
  {
    $token_data = $this->_check_token($params);

    $notes = $this->notes->get(['id_reg'  => $token_data['id_reg'], 'id_ref_global_tipe_42' => $this->_id_ref_global_tipe_42]);

    if (empty($notes)) {
      $params = [
        'no_rm'                 => $token_data['no_rm'],
        'id_pasien_registrasi'  => $token_data['id_reg'],
        'created_date'          => date('Y-m-d H:i:s'),
        'id_petugas_approve'    => $this->data_session['rm_number'],
        'id_ref_global_tipe_42' => $this->_id_ref_global_tipe_42,
        'notes'                 => [],
      ];
      $this->notes->tambah_notes($params);
    }

    $pdf_base64 = $this->aps->print_notes(['id_reg' => $token_data['id_reg'], 'id_ref_global_tipe_42' => $this->_id_ref_global_tipe_42]);

    $pdf = base64_decode($pdf_base64);
    header("Content-type:application/pdf");
    echo $pdf;
  }
}

/* End of file C_81_test_erm.php */
