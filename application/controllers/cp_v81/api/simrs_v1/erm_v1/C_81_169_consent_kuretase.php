<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
use chriskacerguis\RestServer\RestController;

class C_81_169_consent_kuretase extends RestController {

  function __construct()
  {
    parent::__construct();
    $this->_class = '81_169_consent_kuretase';
    $this->_id_ref_global_tipe_42 = 169;

    $this->load->model('cp_v81/global_v1/M_clinic_profile', 'cp');
    $this->load->model('cp_v81/global_v1/M_hrd', 'hrd');
    $this->load->model('cp_v81/global_v1/M_pasien_reg', 'reg');
    $this->load->model('cp_v81/simrs_v1/erm_v1/M_notes', 'notes');
    $this->load->model('cp_v81/simrs_v1/erm_v1/M_resume_medis', 'resume');
    $this->load->model('cp_v81/simrs_v1/erm_v1/M_81_169_consent_kuretase', 'kuretase');
    $this->db_ref = $this->load->database('db_ref', true);
    $this->_view = 'web/cp_v81/contents/simrs_v1/erm_v1/81_169_consent_kuretase/';
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

    $notes_169 = $notes[0]['json_data']['notes'];

    $output = [
      'status'  => 200,
      'message' => 'Berhasil mendapatkan data',
      'data'    => [
        'status_pemberi_pernyataan' => $notes_169['status_pemberi_pernyataan'],
        'nama_pemberi_pernyataan' => $notes_169['nama_pemberi_pernyataan'],
        'telpon_pemberi_pernyataan' => $notes_169['telpon_pemberi_pernyataan'],
        'umur_pemberi_pernyataan' => $notes_169['umur_pemberi_pernyataan'],
        'alamat_pemberi_pernyataan' => $notes_169['alamat_pemberi_pernyataan'],
        'nama_pasien' => $reg[0]['nama_pasien'],
        'umur_pasien' => $reg[0]['umur'],
        'tanggal_lahir_pasien' => $reg[0]['tanggal_lahir'],
        'jenis_kelamin_pasien' => $reg[0]['kelamin'],
        'diagnosis' => $notes_169['diagnosis'],
        'paraf_diagnosis' => $notes_169['paraf_diagnosis'],
        'paraf_dasar_diagnosis' => $notes_169['paraf_dasar_diagnosis'],
        'paraf_tindakan_kedokteran' => $notes_169['paraf_tindakan_kedokteran'],
        'paraf_indikasi_tindakan' => $notes_169['paraf_indikasi_tindakan'],
        'paraf_tatacara' => $notes_169['paraf_tatacara'],
        'paraf_tujuan' => $notes_169['paraf_tujuan'],
        'paraf_resiko' => $notes_169['paraf_resiko'],
        'paraf_pragnosis' => $notes_169['paraf_pragnosis'],
        'alternatif' => $notes_169['alternatif'],
        'paraf_alternatif' => $notes_169['paraf_alternatif'],
        'lain_lain' => $notes_169['lain_lain'],
        'paraf_lain_lain' => $notes_169['paraf_lain_lain'],
        'ttd_pasien' => $notes_169['ttd_pasien'],
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
        'umur_pemberi_pernyataan',
        'umur_pemberi_pernyataan',
        'required',
        array('required' => 'Mohon isi umur pemberi pernyataan')
      );

      $this->form_validation->set_rules(
        'alamat_pemberi_pernyataan',
        'alamat_pemberi_pernyataan',
        'required',
        array('required' => 'Mohon isi alamat pemberi pernyataan')
      );
      

      
    } else {
      $reg = $this->reg->get(['id_reg' => $post['id_reg']])[0];

      $post['nama_pemberi_pernyataan'] = $reg['nama_pasien'];
      $post['telpon_pemberi_pernyataan'] = $reg['mobile_phone'];
      $post['umur_pemberi_pernyataan'] = $reg['umur'];
      $post['alamat_pemberi_pernyataan'] = $reg['alamat'];
    }

    if ($post['paraf_diagnosis'] == 'on') {
      $this->form_validation->set_rules(
        'diagnosis',
        'diagnosis',
        'required',
        array('required' => 'Mohon isi diagnosis')
      );
    }
    if ($post['paraf_alternatif'] == 'on') {
      $this->form_validation->set_rules(
        'alternatif',
        'alternatif',
        'required',
        array('required' => 'Mohon isi alternatif')
      );
    }
    if ($post['paraf_lain_lain'] == 'on') {
      $this->form_validation->set_rules(
        'lain_lain',
        'lain_lain',
        'required',
        array('required' => 'Mohon isi lain lain')
      );
    }


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
      'umur_pemberi_pernyataan' => $post['umur_pemberi_pernyataan'],
      'alamat_pemberi_pernyataan' => $post['alamat_pemberi_pernyataan'],
      'paraf_diagnosis' => $post['paraf_diagnosis'],
      'diagnosis' => $post['diagnosis'],
      'paraf_dasar_diagnosis' => $post['paraf_dasar_diagnosis'],
      'paraf_tindakan_kedokteran' => $post['paraf_tindakan_kedokteran'],
      'paraf_indikasi_tindakan' => $post['paraf_indikasi_tindakan'],
      'paraf_tatacara' => $post['paraf_tatacara'],
      'paraf_tujuan' => $post['paraf_tujuan'],
      'paraf_resiko' => $post['paraf_resiko'],
      'paraf_pragnosis' => $post['paraf_pragnosis'],
      'alternatif' => $post['alternatif'],
      'paraf_alternatif' => $post['paraf_alternatif'],
      'lain_lain' => $post['lain_lain'],
      'paraf_lain_lain' => $post['paraf_lain_lain'],
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
    
    $pdf_base64 = $this->kuretase->print_notes(['id_reg' => $get['id_reg'], 'id_ref_global_tipe_42' => $this->_id_ref_global_tipe_42]);

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
      $this->form_validation->set_message('validation_ttd_pasien', 'Ukuran tanda tangan  pasien tidak boleh lebih dari 1MB');
      return false;
    }

    return true;
  }

}



/* End of file C_81_169_consent_kuretase.php */

?>