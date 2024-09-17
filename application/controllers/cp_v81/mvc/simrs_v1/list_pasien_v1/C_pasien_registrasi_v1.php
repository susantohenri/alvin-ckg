<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_pasien_registrasi_v1 extends MY_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->_class = $this->uri->segments[1];
    $this->load->model('cp_v81/global_v1/M_pasien_reg', 'reg');

    $this->_view = 'web/cp_v81/contents/simrs_v1/list_pasien_v1/pasien_registrasi_v1/';
    $this->_app_js = $this->_assets . 'web/cp_v81/simrs_v1/list_pasien_v1/pasien_registrasi_v1/';
    $this->_master = 'web/cp_v81/layout/';
  }

  public function index($params = null)
  {
    $data['url'] = base_url($this->_class);
    $data['title'] = 'LIST PASIEN REGISTRASI';
    $data['contents'] = "{$this->_view}index";

    $data['css'] = [];
    $data['js'] = [
      $this->_app_js . 'index.js?t='. time(),
    ];

    $this->load->view($this->_master . "master", $data);
  }

  public function get_datatables()
  {
    $get = $this->input->get();

    $params = [
      'jenis_rawat' => !empty($get['jenis_rawat']) ? $get['jenis_rawat'] : null,
      'tanggal_awal' => $get['tanggal_mulai'],
      'tanggal_akhir' => $get['tanggal_selesai'],
      'status' => $get['status'],
      'list_registrasi' => $get['list_registrasi'],
      'search'  => $get['search']['value'],
      'order_column' => $get['order'][0]['column'],
      'order_dir' => $get['order'][0]['dir'],
      'limit' => $get['length'],
      'offset' => $get['start'],
    ];

    $data_reg = $this->reg->get_serverside($params);

    $i = $get['start'] + 1;
    $data = [];

    foreach ($data_reg['result'] as $k0 => $v0) {
      $token_data = json_encode([
        'id_reg'    => $v0['id_reg'],
        'no_rm'     => $v0['no_rm'],
      ]);
      $token_redirect = $this->app_encryption->encrypt_id($token_data, $this->data_session['rm_number']);

      $button = '';
      $button .= '<a href="' . base_url('81_erm_list/' . $token_redirect) . '" class="btn btn-sm btn-primary my-auto py-2">ERM</a>
      ';

      $row = [];
      $row[] = $i++ . '.';
      $row[] = $button;
      $row[] = $v0['nama_pasien'];
      $row[] = $v0['no_rm'];
      $row[] = $v0['no_reg'];
      $row[] = $v0['tanggal_checkin'];
      $row[] = $v0['tanggal_checkout'];
      $row[] = $v0['alamat'];
      $row[] = $v0['alamat2'];
      $data[] = $row;
    }

    echo json_encode([
      'recordsTotal'  => $data_reg['record_total'],
      'recordsFiltered'  => $data_reg['record_filter'],
      'data'  => $data
    ]);
  }
}

/* End of file C_pasien_registrasi_v1.php */
