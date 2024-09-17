<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_81_11_resume extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->_class = $this->uri->segments[1];
    $this->_id_ref_global_tipe_42 = 11;

    $this->load->model('cp_v81/global_v1/M_clinic_profile', 'cp');
    $this->load->model('cp_v81/global_v1/M_hrd', 'hrd');
    $this->load->model('cp_v81/global_v1/M_pasien_reg', 'reg');
    $this->load->model('cp_v81/simrs_v1/erm_v1/M_81_11_resume', 'erm_resume');
    $this->load->model('cp_v81/simrs_v1/erm_v1/M_resume_medis', 'resume');

    $this->_view = 'web/cp_v81/contents/simrs_v1/erm_v1/81_11_resume/';
    $this->_master = 'web/cp_v81/layout/';
    $this->_app_js = $this->_assets . 'web/cp_v81/simrs_v1/erm_v1/81_11_resume/';
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
    $data['title'] = '11 ERM DNR';
    $data['contents'] = "{$this->_view}index";

    $data['css'] = [];
    $data['js'] = [
      $this->_assets . 'js/signature_pad.min.js',
      $this->_app_js . 'index.js?t='. time(),
    ];

    $data['reg'] = $this->reg->get(['id_reg' => $token_data['id_reg']])[0];
    $data['resume'] = $this->resume->get(['id_reg' => $token_data['id_reg']]);

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

    $reg = $this->reg->get(['id_reg' => $token_data['id_reg']])[0];

    $this->form_validation->set_rules(
      'diagnosa_awal',
      'diagnosa_awal',
      'required',
      array('required' => 'Mohon isi diagnosa awal')
    );

  

      $this->resume->add([
        'id_reg'  => $token_data['id_reg'],
        'obat_terapi_pulang' => !empty($post['obat_terapi_pulang']) ? $post['obat_terapi_pulang'] : null,
        'keluhan_utama' => !empty($post['keluhan_utama']) ? $post['keluhan_utama'] : null,
        'keluhan' => !empty($post['keluhan']) ? $post['keluhan'] : null,
        'informasi_medis' => !empty($post['informasi_medis']) ? $post['informasi_medis'] : null,
        'ringkasan_riwayat_penyakit_dahulu' => !empty($post['ringkasan_riwayat_penyakit_dahulu']) ? $post['ringkasan_riwayat_penyakit_dahulu'] : null,
        'ringkasan_pengobatan' => !empty($post['ringkasan_pengobatan']) ? $post['ringkasan_pengobatan'] : null,
        'terapi_tindakan' => !empty($post['terapi_tindakan']) ? $post['terapi_tindakan'] : null,
        'diagnosa_kerja' => !empty($post['diagnosa_kerja']) ? $post['diagnosa_kerja'] : null,
        'diagnosa_banding' => !empty($post['diagnosa_banding']) ? $post['diagnosa_banding'] : null,
        'diagnosis_hispatologi' => !empty($post['diagnosis_hispatologi']) ? $post['diagnosis_hispatologi'] : null,
        'differensial_diagnosis' => !empty($post['differensial_diagnosis']) ? $post['differensial_diagnosis'] : null,
        'gangguan_medis' => !empty($post['gangguan_medis']) ? $post['gangguan_medis'] : null,
        'ringkasan_riwayat_penyakit' => !empty($post['ringkasan_riwayat_penyakit']) ? $post['ringkasan_riwayat_penyakit'] : null,
        'diagnosa_awal' => !empty($post['diagnosa_awal']) ? $post['diagnosa_awal'] : null,
        'kronologis' => !empty($post['kronologis']) ? $post['kronologis'] : null,
        'pengkajian_fungsi' => !empty($post['pengkajian_fungsi']) ? $post['pengkajian_fungsi'] : null,
        'riwayat_operasi' => !empty($post['riwayat_operasi']) ? $post['riwayat_operasi'] : null,
        'riwayat_penyakit_keluarga' => !empty($post['riwayat_penyakit_keluarga']) ? $post['riwayat_penyakit_keluarga'] : null,
        'pemeriksaan_penunjang' => !empty($post['pemeriksaan_penunjang']) ? $post['pemeriksaan_penunjang'] : null,
        'pemeriksaan_penunjang_dahulu' => !empty($post['pemeriksaan_penunjang_dahulu']) ? $post['pemeriksaan_penunjang_dahulu'] : null,
        'pemeriksaan_fisik' => !empty($post['pemeriksaan_fisik']) ? $post['pemeriksaan_fisik'] : null,
        'terapi_obat' => !empty($post['terapi_obat']) ? $post['terapi_obat'] : null,
        'terapi_non_obat' => !empty($post['terapi_non_obat']) ? $post['terapi_non_obat'] : null,
        'prognosa' => !empty($post['prognosa']) ? $post['prognosa'] : null,
        'instruksi_pulang' => !empty($post['instruksi_pulang']) ? $post['instruksi_pulang'] : null,
        'hasil_dibawa_pulang' => !empty($post['hasil_dibawa_pulang']) ? $post['hasil_dibawa_pulang'] : null,
        'informasi_tambahan' => !empty($post['informasi_tambahan']) ? $post['informasi_tambahan'] : null,
        'kontrol_tgl' => !empty($post['kontrol_tgl']) ? $post['kontrol_tgl'] : null,
        'kontrol_terapi' => !empty($post['kontrol_terapi']) ? $post['kontrol_terapi'] : null,
        'kontrol_alasan' => !empty($post['kontrol_alasan']) ? $post['kontrol_alasan'] : null,
        'kontrol_rencana' => !empty($post['kontrol_rencana']) ? $post['kontrol_rencana'] : null,
        'kontrol_tindak_lanjut_tgl' => !empty($post['kontrol_tindak_lanjut_tgl']) ? $post['kontrol_tindak_lanjut_tgl'] : null,
        'kontrol_tindak_lanjut_konsul_spesialis_lain' => !empty($post['kontrol_tindak_lanjut_konsul_spesialis_lain']) ? $post['kontrol_tindak_lanjut_konsul_spesialis_lain'] : null,
        'kontrol_tindak_lanjut_lain_lain' => !empty($post['kontrol_tindak_lanjut_lain_lain']) ? $post['kontrol_tindak_lanjut_lain_lain'] : null,
        'sebab_dirawat' => !empty($post['sebab_dirawat']) ? $post['sebab_dirawat'] : null,
        'sejarah_imunisasi' => !empty($post['sejarah_imunisasi']) ? $post['sejarah_imunisasi'] : null,
        'pengobatan_dan_tindakan' => !empty($post['pengobatan_dan_tindakan']) ? $post['pengobatan_dan_tindakan'] : null,
        'rekonsiliasi_obat' => !empty($post['rekonsiliasi_obat']) ? $post['rekonsiliasi_obat'] : null,
        'kontrol_poli' => !empty($post['kontrol_poli']) ? $post['kontrol_poli'] : null,
        'obat_pulang' => !empty($post['obat_pulang']) ? $post['obat_pulang'] : null,
        'discharge_planning' => !empty($post['discharge_planning']) ? $post['discharge_planning'] : null,
        'rekomendasi_lanjutan' => !empty($post['rekomendasi_lanjutan']) ? $post['rekomendasi_lanjutan'] : null,
        'terapi' => !empty($post['terapi']) ? $post['terapi'] : null,
        'diagnosa_akhir' => !empty($post['diagnosa_akhir']) ? $post['diagnosa_akhir'] : null,
      ]);

      $output = [
        'status'  => 200,
        'message' => 'Success',
      ];
    // }

    response($output);
  }

  public function delete_process($params = null)
  {
    $token_data = $this->_check_token($params);

    $output = $this->resume->hapus_notes_resume(['id_reg'  => $token_data['id_reg'], 'id_notes_resume' => $token_data['id_notes_resume']]);

    $output = [
      'status'  => $output['status'] == '200' ? 200 : 400,
      'message' => $output['message']
    ];

    response($output);
  }


  public function pdf($params)
  {
    $token_data = $this->_check_token($params);

    $resume = $this->resume->get(['id_reg'  => $token_data['id_reg'], 'id_notes_resume' => $token_data['id_notes_resume']]);

    response($resume);

    if (empty($resume)) {
      $params = [
        'no_rm'                 => $token_data['no_rm'],
        'id_pasien_registrasi'  => $token_data['id_reg'],
        'created_date'          => date('Y-m-d H:i:s'),
        'id_petugas_approve'    => $this->data_session['rm_number'],
        'id_ref_global_tipe_42' => $this->_id_ref_global_tipe_42,
        'resume'                 => [],
      ];
    }

    $pdf_base64 = $this->erm_resume->print_resume(['id_reg' => $token_data['id_reg'], 'id_ref_global_tipe_42' => $this->_id_ref_global_tipe_42]);

    $output = [
      'status'  => 200,
      'data' => $pdf_base64
    ];

    // response($output);

    $pdf = base64_decode($pdf_base64);
    header("Content-type:application/pdf");
    echo $pdf;
  }
}

/* End of file C_81_11_resume.php */
