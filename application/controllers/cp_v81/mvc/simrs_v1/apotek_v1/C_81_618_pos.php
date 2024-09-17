<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_81_618_pos extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->_class = $this->uri->segments[1];
    $this->_id_ref_global_tipe_42 = 618;
    $this->_id_dept = 1010;


    $this->load->model('cp_v81/global_v1/M_clinic_profile', 'cp');
    $this->load->model('cp_v81/global_v1/M_hrd', 'hrd');
    $this->load->model('cp_v81/global_v1/M_dept', 'dept');
    $this->load->model('cp_v81/global_v1/M_ref', 'ref');
    $this->load->model('cp_v81/global_v1/M_pasien_reg', 'reg');
    $this->load->model('cp_v81/simrs_v1/erm_v1/M_notes', 'notes');
    $this->load->model('cp_v81/simrs_v1/erm_v1/M_resume_medis', 'resume');
    $this->load->model('cp_v81/simrs_v1/apotek_v1/M_81_618_pos', 'pos');

    $this->_view = 'web/cp_v81/contents/simrs_v1/apotek_v1/81_618_pos/';
    $this->_app_js = $this->_assets . 'web/cp_v81/simrs_v1/apotek_v1/81_618_pos/';
    $this->_master = 'web/cp_v81/layout/';
  }

  public function index($params = null)
  {
  
    // $token_data = $this->_check_token($params);
    // $data['token'] = $params;
    // $data['token_data'] = $token_data;
    $token_data = json_encode([
      'id' => $this->_id_ref_global_tipe_42,
      'id_dept' => $this->_id_dept
    ]);
    $token_redirect = $this->app_encryption->encrypt_id($token_data, $this->data_session['rm_number']);
    $data['token_data'] = $token_redirect;

    $data['url'] = base_url($this->_class);
    $data['title'] = 'ERM';
    $data['contents'] = "{$this->_view}index";

    $data['css'] = [];
    $data['js'] = [
      $this->_app_js . 'index.js?t='. time(),
    ];

    if (!empty($token_data['is_tab'])) {
      $data['is_tab'] = $token_data['is_tab'];
      $this->load->view($data['contents'], $data);
    } else {
      $this->load->view($this->_master . "master", $data);
    }
  }

  public function pdf($params)
  {
    $token_data = $this->_check_token($params);

    $pdf_base64 = $this->pos->print_notes(['id_ref_global_tipe_42' => $token_data['id']]);

    $pdf = base64_decode($pdf_base64);
    header("Content-type:application/pdf");
    echo $pdf;
  }

  public function get_data_barang($params = null)
    {
      $token_data = $this->_check_token($params);
      $get = $this->input->get();
  
      $data = [];
      $message = '';
      $status = 200;
      $barang = $this->pos->get_data_barang(['no_batch' => $get['no_batch']]);
      $dept = $this->dept->get(['id' => $this->_id_dept]);
      $harga = count($barang) != 0 ? $this->pos->get_harga_jual(['id_produk' => $barang[0]['id_produk']]) : [];
      $stock_opname = count($barang) != 0 ? $this->pos->get_stock_opname(['id_dept' => $this->_id_dept,'id_mutasi_ro_details' => $barang[0]['id']]) : [];
      
      if (count($barang) == 0){
        $status = 400;
        $message = 'NO BATCH TIDAK DITEMUKAN';
        if (count($harga) == 0){
          $status = 400;
          $message = 'NO BATCH ADA, TAPI MASTER HARGA JUAL TIDAK ADA';
        } else {
          if($stock_opname['qty'] == 0){
            $status = 400;
            $message = 'STOCK KOSONG. NO BATCH ADA, MASTER HARGA JUAL ADA';
          }
          if (count($stock_opname) == 0){
            $status = 400;
            $message = 'STOCK TIDAK ADA. NO BATCH ADA, MASTER HARGA JUAL ADA';
          }
        }
      } else {
        $data = [
          "id" => $barang[0]['id'],
          "id_produk" => $barang[0]['id_produk'],
          "nama_produk" => $barang[0]['nama_produk'],
          "no_batch" => $barang[0]['no_batch'],
          // "kode_produk" => $barang[0]['kode_produk'],
          // "bpjs_kode_produk_obat" => $barang[0]['bpjs_kode_produk_obat'],
          "harga" => $harga[0]['harga_jual_sat_kecil'],
          "qty_stock" => $stock_opname[0]['qty'],
          "nama_dept" => $dept[0]['nama_dept'],
        ];
      }
      $output = [
        'status'  => $status,
        'message' => $message,
        'data' => $data
      ];
  
      response($output);
    }

    public function form_process_barang()
    {  
      $post = $this->input->post();

      $id_order_max = $this->pos->get_max_id_order();

      $this->form_validation->set_data($post);

      $this->form_validation->set_rules(
        'racik_tipe[]',
        'racik_tipe',
        'required',
        array('required' => 'Mohon pilih tipe')
      );

      $this->form_validation->set_rules(
        'racik[]',
        'racik',
        'required',
        array('required' => 'Mohon isi nama')
      );
      $this->form_validation->set_rules(
        'qty_barang[]',
        'qty_barang',
        'required',
        array('required' => 'Mohon pilih tipe')
      );

      $this->form_validation->set_rules(
        'id_barang[]',
        'id_barang',
        'required',
        array('required' => 'Mohon isi nama')
      );
      $this->form_validation->set_rules(
        'harga_barang[]',
        'harga_barang',
        'required',
        array('required' => 'Mohon pilih tipe')
      );

      $this->form_validation->set_rules(
        'subtotal[]',
        'subtotal',
        'required',
        array('required' => 'Mohon isi nama')
      );

      if ($this->form_validation->run() == FALSE) {
        $error_key = array_key_first($this->form_validation->error_array());
        $message = $this->form_validation->error_array()[$error_key];
  
        $output = [
          'status'  => 400,
          'message' => $message,
        ];
      } else {
        $params = [
          'tipe_resep' => 'POS',
          'total_order_produk' => 1,
          'total_retur ' => 0,
          'total_tagihan_produk ' => $post['total'],
          'total_tagihan  ' => $post['total'],
          'total_pembayaran ' => $post['total'],
        ];

        $this->pos->add_order($params);

        // foreach ($post['id_barang'] as $key => $value) {
  
        //   $params = [
        //     'id'  => ($key+1),
        //     'tipe_resep'  => $post['racik_tipe'][$key],
        //     'total_tagihan_produk'  => $post['subtotal'][$key],
        //     'pembayaran_cash'  => $post['subtotal'][$key],
        //     'total_tagihan'  => $post['subtotal'][$key],
        //     'total_pembayaran'  => $post['subtotal'][$key],
        //     'total_order_produk'  => $post['qty_barang'][$key],
        //   ];

        //   // $result = $this->pos->add($params);
        // }

        $output = [
          'status'  => 200,
          // 'data' => $post,
          'message' => 'Success',
        ];
      }

      response($output);
    }

}

/* End of file C_81_618_pos.php */
