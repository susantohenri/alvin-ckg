<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_81_home extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->_class = $this->uri->segments[1];

    // $this->load->model('cp_v81/global_v1/M_clinic_profile', 'cp');
    // $this->load->model('cp_v81/global_v1/M_hrd', 'hrd');
    // $this->load->model('cp_v81/global_v1/M_ref', 'ref');
    $this->load->model('cp_v81/global_v1/M_pasien_reg', 'reg');

    $this->_view = 'web/cp_v81/contents/auth_v1/home_v1/81_home/';
    $this->_master = 'web/cp_v81/layout/';
    $this->_app_js = $this->_assets . 'web/cp_v81/auth_v1/home_v1/81_home/';
  }

  public function index($params = null)
  {
    // if (empty($params)) {
    //   redirect(base_url('81_home'));
    // }

    // $token_data = $this->_check_token($params);
    // $data['token'] = $params;
    // $data['token_data'] = $token_data;

    $data['url'] = base_url($this->_class);
    $data['title'] = 'HOME';
    $data['contents'] = "{$this->_view}index";

    $data['css'] = [];
    $data['js'] = [];


    $data['erm'] = [
      [
        'name'  => 'PASIEN REG',
        'icon' => 'fas fa-hospital-user',
        'route' => '81_list_pasien_reg'
      ],
      [
        'name'  => 'POS',
        'icon' => 'fas fa-braille',
        'route' => '81_618_pos'
      ],
    //   [
    //     'name'  => 'CREATE TELE',
    //     'icon' => 'fas fa-plus-square',
    //     'route' => '81_7305_tele_create_konsul'
    //   ],
    //   [
    //     'name'  => 'DOC TELE',
    //     'icon' => 'fas fa-folder-open',
    //     'route' => '81_7308_tele_doc_konsul_baru'
    //   ],
    //   [
    //     'name'  => 'Rekap Diet',
    //     'icon' => 'fas fa-chart-pie',
    //     'route' => '81_487_gizi_rekap_diet_pasien'
    //   ],
    //   [
    //     'name'  => 'Home',
    //     'icon' => 'fas fa-home',
    //     'route' => '81_home'
    //   ],
    //   [
    //     'name'  => 'Cron Newsletter',
    //     'icon' => 'fas fa-mail-bulk',
    //     'route' => '81_cp_cron_email_newsletter'
    //   ],
    //   [
    //     'name'  => 'Contracts',
    //     'icon' => 'fas fa-file-signature',
    //     'route' => '81_cp_contracts'
    //   ],
    //   [
    //     'name'  => 'ASC Agreement',
    //     'icon' => 'fas fa-clipboard',
    //     'route' => '81_cp_acs_agreement'
    //   ],
    //   [
    //     'name'  => 'Crew Jobs List',
    //     'icon' => 'fas fa-users-between-lines',
    //     'route' => '81_cp_crew_job_list'
    //   ],
    //   [
    //     'name'  => 'HOME',
    //     'icon' => 'fas fa-home',
    //     'route' => '81_kirene_home'
    //   ],
    //   [
    //     'name'  => 'LOGIN',
    //     'icon' => 'fas fa-right-to-bracket',
    //     'route' => '81_kirene_login'
    //   ],
    //   [
    //     'name'  => 'SIGN IN',
    //     'icon' => 'fas fa-id-card',
    //     'route' => '81_kirene_signup'
    //   ],
    ];

    if (!empty($token_data['is_tab'])) {
      $data['is_tab'] = $token_data['is_tab'];
      $this->load->view($data['contents'], $data);
    } else {
      $this->load->view($this->_master . "master", $data);
    }
  }
}

/* End of file C_erm_list_v1.php */
