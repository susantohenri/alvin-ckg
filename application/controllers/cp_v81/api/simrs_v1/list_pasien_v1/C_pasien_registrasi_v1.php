<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
use chriskacerguis\RestServer\RestController;

class C_pasien_registrasi_v1 extends RestController {

  function __construct()
  {
    parent::__construct();
    $this->_class = 'pasien_registrasi';

    $this->load->model('cp_v81/global_v1/M_clinic_profile', 'cp');
    $this->load->model('cp_v81/global_v1/M_pasien_reg', 'reg');
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


    $reg = $this->reg->get(['id_reg' => $get['id_reg']]);
    if (empty($reg)) {
      $output = [
        'status'  => 400,
        'message' => 'Registrasi tidak ditemukan',
      ];

      $this->response($output, $output['status']);
    }

    $output = [
      'status'  => 200,
      'message' => 'Berhasil mendapatkan data',
      'data'    => $reg
    ];
    $this->response($output, $output['status']);
  }

  public function list_all_pasien_get()
  {
    $get = $this->get();  


    $reg = $this->reg->get_all();
    if (empty($reg)) {
      $output = [
        'status'  => 400,
        'message' => 'Registrasi tidak ditemukan',
      ];

      $this->response($output, $output['status']);
    }

    $output = [
      'status'  => 200,
      'message' => 'Berhasil mendapatkan data',
      'data'    => $reg
    ];
    $this->response($output, $output['status']);
  }

}

/* End of file C_resume_v1.php */

?>