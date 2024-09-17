<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
use chriskacerguis\RestServer\RestController;

class C_81_3070_consent_aps extends RestController {

  function __construct()
  {
    parent::__construct();
    $this->_class = '81_3070_consent_aps';
    $this->_id_ref_global_tipe_42 = 3070;

    $this->load->model('cp_v81/global_v1/M_clinic_profile', 'cp');
    $this->load->model('cp_v81/global_v1/M_hrd', 'hrd');
    $this->load->model('cp_v81/global_v1/M_pasien_reg', 'reg');
    $this->load->model('cp_v81/simrs_v1/erm_v1/M_notes', 'notes');
    $this->load->model('cp_v81/simrs_v1/erm_v1/M_81_3070_consent_aps', 'aps');
    $this->load->model('cp_v81/simrs_v1/erm_v1/M_resume_medis', 'resume');
    $this->db_ref = $this->load->database('db_ref', true);
    
    $this->_view = 'web/cp_v81/contents/simrs_v1/erm_v1/81_3070_consent_aps/';
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

    $notes_3070 = $notes[0]['json_data']['notes'];

    $output = [
      'status'  => 200,
      'message' => 'Berhasil mendapatkan data',
      'data'    => [
        'status_pemberi_pernyataan' => $notes_3070['status_pemberi_pernyataan'],
        'nama_pemberi_pernyataan' => $notes_3070['nama_pemberi_pernyataan'],
        'telpon_pemberi_pernyataan' => $notes_3070['telpon_pemberi_pernyataan'],
        'tgl_lahir_pemberi_pernyataan' => $notes_3070['tgl_lahir_pemberi_pernyataan'],
        'jenis_kelamin_pemberi_pernyataan' => $notes_3070['jenis_kelamin_pemberi_pernyataan'],
        'nama_pasien' => $reg[0]['nama_pasien'],
        'umur_pasien' => $reg[0]['umur'],
        'jenis_kelamin_pasien' => $reg[0]['kelamin'],
        'prognosa' => $notes_3070['prognosa'],
        'instruksi_pulang' => $notes_3070['instruksi_pulang'],
        'ttd_pasien' => $notes_3070['ttd_pasien'],
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
      'status_pemberi_pernyataan',
      'status_pemberi_pernyataan',
      'required|in_list[Pasien,Orang Tua,Suami,Istri,Anak,Wali]',
      [
        'required' => 'Mohon pilih status pemberi pernyataan',
        'in_list' => 'Status pemberi pernyataan tidak sesuai',
      ]
    );

    if ($post['status_pemberi_pernyataan'] != 'Pasien') {
      $this->form_validation->set_rules(
        'nama_pemberi_pernyataan',
        'nama_pemberi_pernyataan',
        'required',
        array('required' => 'Mohon isi nama pemberi pernyataan')
      );

      $this->form_validation->set_rules(
        'telpon_pemberi_pernyataan',
        'telpon_pemberi_pernyataan',
        'required',
        array('required' => 'Mohon isi no. telp pemberi pernyataan')
      );

      $this->form_validation->set_rules(
        'tgl_lahir_pemberi_pernyataan',
        'tgl_lahir_pemberi_pernyataan',
        'required',
        array('required' => 'Mohon isi tanggal lahir pemberi pernyataan')
      );

      $this->form_validation->set_rules(
        'jenis_kelamin_pemberi_pernyataan',
        'jenis_kelamin_pemberi_pernyataan',
        'required',
        array('required' => 'Mohon isi alamat pemberi pernyataan')
      );
    } else {
      $reg = $this->reg->get(['id_reg' => $post['id_reg']])[0];

      $post['nama_pemberi_pernyataan'] = $reg['nama_pasien'];
      $post['telpon_pemberi_pernyataan'] = $reg['mobile_phone'];
      $post['tgl_lahir_pemberi_pernyataan'] = $reg['umur'];
      $post['jenis_kelamin_pemberi_pernyataan'] = $reg['alamat'];
    }

    $this->form_validation->set_rules(
      'prognosa',
      'prognosa',
      'required',
      array('required' => 'Mohon isi diagnosa awal')
    );

    $this->form_validation->set_rules(
      'instruksi_pulang',
      'instruksi_pulang',
      'required',
      array('required' => 'Mohon isi intruksi pulang')
    );

    $this->form_validation->set_rules(
      'ttd_pasien',
      'ttd_pasien',
      'required|valid_base64|callback_validation_ttd_pasien',
      [
        'required' => 'Mohon isi tanda tangan pasien',
        'valid_base64'  => 'Tanda tangan pasien harus dengan format base64'
      ]
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
      'status_pemberi_pernyataan' => $post['status_pemberi_pernyataan'],
      'nama_pemberi_pernyataan' => $post['nama_pemberi_pernyataan'],
      'telpon_pemberi_pernyataan' => $post['telpon_pemberi_pernyataan'],
      'tgl_lahir_pemberi_pernyataan' => $post['tgl_lahir_pemberi_pernyataan'],
      'jenis_kelamin_pemberi_pernyataan' => $post['jenis_kelamin_pemberi_pernyataan'],
      'nama_pasien' => $reg[0]['nama_pasien'],
      'prognosa' => $post['prognosa'],
      'instruksi_pulang' => $post['instruksi_pulang'],
      'umur_pasien' => $reg[0]['umur'],
      'ttd_pasien' => !empty($post['ttd_pasien']) ? 'data:image/png;base64,'. $post['ttd_pasien'] : null,
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
      'prognosa' => !empty($post['prognosa']) ? $post['prognosa'] : null,
      'instruksi_pulang' => !empty($post['instruksi_pulang']) ? $post['instruksi_pulang'] : null,
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
    
    $pdf_base64 = $this->aps->print_notes(['id_reg' => $get['id_reg'], 'id_ref_global_tipe_42' => $this->_id_ref_global_tipe_42]);

    $output = [
      'status'  => 200,
      'message' => 'Berhasil mendapatkan data',
      'data'    => [
        'pdf_base64' => $pdf_base64
      ]
    ];
    $this->response($output, $output['status']);
  }


  public function validation_ttd_pasien($params)
  {
    $decodedImage = base64_decode($params);
    $mime = finfo_buffer(finfo_open(), $decodedImage, FILEINFO_MIME_TYPE);
    $ext =  (explode('/', $mime)[1]);

    if ($ext != 'png') {
      $this->form_validation->set_message('validation_ttd_pasien', 'Tanda tangan pasien harus berformat PNG');
      return false;
    }

    $size = (strlen($params) * 3 / 4) - substr_count(substr($params, -2), '=');
    if ($size > 1000000) {
      $this->form_validation->set_message('validation_ttd_pasien', 'Ukuran tanda tangan tidak boleh lebih dari 1MB');
      return false;
    }

    return true;
  }

}

/* End of file C_81_3070_consent_aps.php */

?>