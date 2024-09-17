<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_erm_list_v1 extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->_class = $this->uri->segments[1];

    // $this->load->model('cp_v81/global_v1/M_clinic_profile', 'cp');
    // $this->load->model('cp_v81/global_v1/M_hrd', 'hrd');
    // $this->load->model('cp_v81/global_v1/M_ref', 'ref');
    $this->load->model('cp_v81/global_v1/M_pasien_reg', 'reg');
    $this->load->model('cp_v81/simrs_v1/erm_v1/M_notes', 'notes');
    $this->load->model('cp_v81/simrs_v1/erm_v1/M_resume_medis', 'resume');

    $this->_view = 'web/cp_v81/contents/simrs_v1/erm_v1/erm_list_v1/';
    $this->_master = 'web/cp_v81/layout/';
    $this->_app_js = $this->_assets . 'web/cp_v81/simrs_v1/rm_v1/erm_list_v1/';
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
    $data['title'] = 'LIST ERM';
    $data['contents'] = "{$this->_view}index";

    $data['css'] = [];
    $data['js'] = [];


    $data['erm'] = [
      [
        'name'  => '3070 ERM APS',
        'route' => '81_3070_consent_aps'
      ],
      [
        'name'  => 'TEST ERM',
        'route' => '81_test_erm'
      ],
      [
        'name'  => '84 ERM BEBAS ALERGI OBAT',
        'route' => '81_84_surat_pernyataan_bebas_alergi_obat'
      ],
      [
        'name'  => '104 ERM BAYAR JAMINAN',
        'route' => '81_104_consent_bayar_jaminan'
      ],
      [
        'name'  => '107 ERM PERSETUJUAN ANASTESI',
        'route' => '81_107_consent_anastesi'
      ],
      [
        'name'  => '108 ERM KEMBALI KE PPK',
        'route' => '81_108_surat_kembali_ke_ppk1'
      ],
      [
        'name'  => '169 ERM KURETASE',
        'route' => '81_169_consent_kuretase'
      ],
      [
        'name'  => '41 ERM KURSEKSIO CAESARIA',
        'route' => '81_41_edukasi_sc'
      ],
      [
        'name'  => '134 ERM TINDAKAN OPERASI',
        'route' => '81_134_consent_op'
      ],
      [
        'name'  => '138 ERM TINDAKAN BIUS',
        'route' => '81_138_consent_bius'
      ],
      [
        'name'  => '777 ERM INFO CONSENT TINDAKAN',
        'route' => '81_777_tb_info_consent_tindakan'
      ],
      [
        'name'  => '118 ERM JASARAHARJA',
        'route' => '81_118_consent_status_jasaraharja'
      ],
      [
        'name'  => '11 ERM RESUME',
        'route' => '81_11_resume'
      ],
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
