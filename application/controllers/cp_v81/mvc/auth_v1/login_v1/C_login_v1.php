<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class C_login_v1 extends MY_Controller {

  
  public function __construct()
  {
    parent::__construct();

    $this->_class = $this->uri->segments[1];
    $this->load->model('cp_v81/global_v1/M_login', 'login');

    $this->_view = 'web/cp_v81/contents/auth_v1/login_v1/login_v1/';
    $this->_assets = base_url('assets/template/metronic/');
    $this->_app_js = $this->_assets . 'web/cp_v81/auth_v1/login_v1/login_v1/';    
  }
  

  public function index()
  {
    $data = [];

    $data['js'] = [
      $this->_app_js .'index.js'
    ];

    $this->load->view($this->_view.'/index', $data, FALSE);
  }

  public function login_process($params = null)
  {
    $post = $this->input->post();

    $data_login = $this->login->do_login([
      'username' => $post['username'],
      'password' => $post['password'],
      'session_timeout' => 720
    ]);

    if ($data_login['status'] != 200) {
      response($data_login);
    } else {
      $this->session->set_userdata('x-token', $data_login['data']['token']);
      $this->session->set_userdata('data_session', $data_login['data']['data_session']);

      response([
        'status' => 200,
        'message' => 'Berhasil login',
        'redirect'  => base_url('81_home')
      ]);
    }
    
  }
}

/* End of file C_login_v1.php */

?>