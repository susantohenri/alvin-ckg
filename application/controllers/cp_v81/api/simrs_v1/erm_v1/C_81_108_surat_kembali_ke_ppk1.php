<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
use chriskacerguis\RestServer\RestController;

class C_81_108_surat_kembali_ke_ppk1 extends RestController {

  function __construct()
  {
    parent::__construct();
    $this->_class = '81_108_surat_kembali_ke_ppk1';
    $this->_id_ref_global_tipe_42 = 108;

    $this->load->model('cp_v81/global_v1/M_clinic_profile', 'cp');
    $this->load->model('cp_v81/global_v1/M_hrd', 'hrd');
    $this->load->model('cp_v81/global_v1/M_pasien_reg', 'reg');
    $this->load->model('cp_v81/simrs_v1/erm_v1/M_notes', 'notes');
    $this->load->model('cp_v81/simrs_v1/erm_v1/M_resume_medis', 'resume');
    $this->load->model('cp_v81/simrs_v1/erm_v1/M_81_108_surat_kembali_ke_ppk1', 'ppk');
    $this->db_ref = $this->load->database('db_ref', true);
    $this->_view = 'web/cp_v81/contents/simrs_v1/erm_v1/81_108_surat_kembali_ke_ppk1/';
  }

  public function index_get()
  {
    $get = $this->get();  

    $this->form_validation->set_data($get);
    $this->form_validation->set_rules('id_reg', 'ID. Registrasi', 'required',
      array('required' => 'Mohon isi ID. Registrasi')
    );
    
    if ($this->form_validation->run() == FALSE) {
      $error_key = array_key_first($this->form_validation->error_array());
      $message = $this->form_validation->error_array()[$error_key];

      $output = [
        'status'  => 400,
        'message' => $message,
      ];

      $this->response($output, $output['status']);
    }


    $resume = $this->resume->get(['id_reg' => $get['id_reg']]);
    $reg = $this->reg->get(['id_reg' => $get['id_reg']]);
    $notes = $this->notes->get(['id_reg'  => $get['id_reg'], 'id_ref_global_tipe_42' => $this->_id_ref_global_tipe_42]);

    if (empty($reg)) {
      $output = [
        'status'  => 400,
        'message' => 'Registrasi tidak ditemukan',
      ];

      $this->response($output, $output['status']);
    }

    if (empty($notes)) {
      $output = [
        'status'  => 400,
        'message' => 'Data tidak ditemukan',
      ];

      $this->response($output, $output['status']);
    }

    $notes_108 = $notes[0]['json_data']['notes'];

    $output = [
      'status'  => 200,
      'message' => 'Berhasil mendapatkan data',
      'data'    => [
        'nama_pasien' => $reg[0]['nama_pasien'],
        'umur_pasien' => $reg[0]['umur'],
        'no_bpjs_pasien' => $reg[0]['no_bpjs'],
        'diagnosa_akhir' => $notes_108['diagnosa_akhir'],
        'terapi' => $notes_108['terapi'],
        'obat_terapi_pulang' => $notes_108['obat_terapi_pulang'],
      ]
    ];
    $this->response($output, $output['status']);
  }

  public function index_post()
  {
    $post = $this->post();

    $this->form_validation->set_data($post);
    $this->form_validation->set_rules('id_reg', 'ID. Registrasi', 'required',
      array('required' => 'Mohon isi ID. Registrasi')
    );

    $this->form_validation->set_rules(
      'diagnosa_akhir',
      'diagnosa_akhir',
      'required',
      array('required' => 'Mohon isi diagnosa akhir')
    );

    $this->form_validation->set_rules(
      'terapi',
      'terapi',
      'required',
      array('required' => 'Mohon isi rekomendasi lanjutan : evaluasi terapi')
    );

    $this->form_validation->set_rules(
      'obat_terapi_pulang',
      'obat_terapi_pulang',
      'required',
      array('required' => 'Mohon isi terapi obat pulang')
    );

    // $this->form_validation->set_rules(
    //   'ttd_pasien',
    //   'ttd_pasien',
    //   'required|valid_base64|callback_validation_ttd_pasien',
    //   [
    //     'required' => 'Mohon isi tanda tangan pasien',
    //     'valid_base64'  => 'Tanda tangan pasien harus dengan format base64'
    //   ]
    // );

    
    if ($this->form_validation->run() == FALSE) {
      $error_key = array_key_first($this->form_validation->error_array());
      $message = $this->form_validation->error_array()[$error_key];

      $output = [
        'status'  => 400,
        'message' => $message,
      ];

      $this->response($output, $output['status']);
    }


    $resume = $this->resume->get(['id_reg' => $post['id_reg']]);
    $reg = $this->reg->get(['id_reg' => $post['id_reg']]);
    if (empty($reg)) {
      $output = [
        'status'  => 400,
        'message' => 'ID. Reg tidak ditemukan',
      ];

      $this->response($output, $output['status']);
    }

    $resume = $this->resume->get(['id_reg' => $post['id_reg']]);
    if (empty($resume)) {
      $output = [
        'status'  => 400,
        'message' => 'Pasien belum memiliki resume',
      ];

      $this->response($output, $output['status']);
    }

    $params_notes_details = [
        'nama_pasien' => $reg[0]['nama_pasien'],
        'umur_pasien' => $reg[0]['umur'],
        'no_bpjs_pasien' => $reg[0]['no_bpjs'],
        'diagnosa_akhir' => !empty($post['diagnosa_akhir']) ? $post['diagnosa_akhir'] : null,
        'terapi' => !empty($post['terapi']) ? $post['terapi'] : null,
        'obat_terapi_pulang' => !empty($post['obat_terapi_pulang']) ? $post['obat_terapi_pulang'] : null,
      // 'ttd_pasien' => !empty($post['ttd_pasien']) ? 'data:image/png;base64,'. $post['ttd_pasien'] : null,
    ];

    $params_notes = [
      'no_rm'                 => $reg[0]['no_rm'],
      'id_pasien_registrasi'  => $post['id_reg'],
      'created_date'          => date('Y-m-d H:i:s'),
      'id_ref_global_tipe_42' => $this->_id_ref_global_tipe_42,
      'notes'                 => $params_notes_details,
    ];

    $notes = $this->notes->get(['id_reg'  => $post['id_reg'], 'id_ref_global_tipe_42' => $this->_id_ref_global_tipe_42]);

    if (!empty($notes)) {
      $params_notes['id_notes'] = $notes[0]['id'];
      $result = $this->notes->edit_notes($params_notes);
    } else {
      $result = $this->notes->tambah_notes($params_notes);
    }



    $this->resume->add([
      'id_reg'  => $post['id_reg'],
    ]);

    $output = [
      'status'  => 200,
      'message' => $result['message'],
    ];
    $this->response($output, $output['status']);
  }

  public function index_delete()
  {
    $delete = $this->delete();

    $this->form_validation->set_data($delete);
    $this->form_validation->set_rules('id_reg', 'ID. Registrasi', 'required',
      array('required' => 'Mohon isi ID. Registrasi')
    );
    
    if ($this->form_validation->run() == FALSE) {
      $error_key = array_key_first($this->form_validation->error_array());
      $message = $this->form_validation->error_array()[$error_key];

      $output = [
        'status'  => 400,
        'message' => $message,
      ];

      $this->response($output, $output['status']);
    }

    $resume = $this->resume->get(['id_reg' => $delete['id_reg']]);
    $reg = $this->reg->get(['id_reg' => $delete['id_reg']]);
    if (empty($reg)) {
      $output = [
        'status'  => 400,
        'message' => 'Registrasi tidak ditemukan',
      ];

      $this->response($output, $output['status']);
    }


    $notes = $this->notes->get(['id_reg'  => $delete['id_reg'], 'id_ref_global_tipe_42' => $this->_id_ref_global_tipe_42]);

    if (empty($notes)) {
      $output = [
        'status'  => 400,
        'message' => 'Data tidak ditemukan',
      ];

      $this->response($output, $output['status']);
    }

    $output = $this->notes->hapus_notes(['id_notes' => $notes[0]['id']]);

    $output = [
      'status'  => $output['status'] == '200' ? 200 : 400,
      'message' => $output['message']
    ];
    $this->response($output, $output['status']);
  }

  public function pdf_get()
  {
    $get = $this->get();  

    $this->form_validation->set_data($get);
    $this->form_validation->set_rules('id_reg', 'ID. Registrasi', 'required',
      array('required' => 'Mohon isi ID. Registrasi')
    );
    
    if ($this->form_validation->run() == FALSE) {
      $error_key = array_key_first($this->form_validation->error_array());
      $message = $this->form_validation->error_array()[$error_key];

      $output = [
        'status'  => 400,
        'message' => $message,
      ];

      $this->response($output, $output['status']);
    }


    $resume = $this->resume->get(['id_reg' => $get['id_reg']]);
    $reg = $this->reg->get(['id_reg' => $get['id_reg']]);
    $notes = $this->notes->get(['id_reg'  => $get['id_reg'], 'id_ref_global_tipe_42' => $this->_id_ref_global_tipe_42]);

    if (empty($reg)) {
      $output = [
        'status'  => 400,
        'message' => 'Registrasi tidak ditemukan',
      ];

      $this->response($output, $output['status']);
    }

    if (empty($notes)) {
      $output = [
        'status'  => 400,
        'message' => 'Data tidak ditemukan',
      ];

      $this->response($output, $output['status']);
    }
    
    $pdf_base64 = $this->ppk->print_notes(['id_reg' => $get['id_reg'], 'id_ref_global_tipe_42' => $this->_id_ref_global_tipe_42]);

    $output = [
      'status'  => 200,
      'message' => 'Berhasil mendapatkan data',
      'data'    => [
        'pdf_base64' => $pdf_base64
      ]
    ];
    $this->response($output, $output['status']);
  }


  // public function validation_ttd_pasien($params)
  // {
  //   $decodedImage = base64_decode($params);
  //   $mime = finfo_buffer(finfo_open(), $decodedImage, FILEINFO_MIME_TYPE);
  //   $ext =  (explode('/', $mime)[1]);

  //   if ($ext != 'png') {
  //     $this->form_validation->set_message('validation_ttd_pasien', 'Tanda tangan pasien harus berformat PNG');
  //     return false;
  //   }

  //   $size = (strlen($params) * 3 / 4) - substr_count(substr($params, -2), '=');
  //   if ($size > 1000000) {
  //     $this->form_validation->set_message('validation_ttd_pasien', 'Ukuran tanda tangan tidak boleh lebih dari 1MB');
  //     return false;
  //   }

  //   return true;
  // }

}

/* End of file C_81_108_surat_kembali_ke_ppk1.php */

?>