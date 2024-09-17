<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
use chriskacerguis\RestServer\RestController;

class C_81_11_resume extends RestController {

  function __construct()
  {
    parent::__construct();
    $this->_class = '81_11_resume';
    $this->_id_ref_global_tipe_42 = 11;

    $this->load->model('cp_v81/global_v1/M_clinic_profile', 'cp');
    $this->load->model('cp_v81/global_v1/M_hrd', 'hrd');
    $this->load->model('cp_v81/global_v1/M_pasien_reg', 'reg');
    $this->load->model('cp_v81/simrs_v1/erm_v1/M_notes', 'notes');
    $this->load->model('cp_v81/simrs_v1/erm_v1/M_resume_medis', 'resume');
    $this->load->model('cp_v81/simrs_v1/erm_v1/M_81_11_resume', 'erm_resume');
    $this->db_ref = $this->load->database('db_ref', true);
    $this->_view = 'web/cp_v81/contents/simrs_v1/erm_v1/81_11_resume/';
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

    $resume = $this->resume->get(['id_reg'  => $get['id_reg']]);
    if (empty($resume)) {
      $output = [
        'status'  => 400,
        'message' => 'Data tidak ditemukan',
      ];

      $this->response($output, $output['status']);
    }

    $output = [
      'status'  => 200,
      'message' => 'Berhasil mendapatkan data',
      'data'    => [
        'id'  => $resume['id'],
        'id_reg'  => $resume['id_reg'],
        'nama_pasien' => $reg[0]['nama_pasien'],
        'umur' => $reg[0]['umur'],
        'no_bpjs' => $reg[0]['no_bpjs'],
        'alamat' => $reg[0]['alamat'],
        'obat_terapi_pulang' => $resume['obat_terapi_pulang'],
        'keluhan_utama' => $resume['keluhan_utama'],
        'keluhan' => $resume['keluhan'],
        'informasi_medis' => $resume['informasi_medis'],
        'ringkasan_riwayat_penyakit_dahulu' => $resume['ringkasan_riwayat_penyakit_dahulu'],
        'ringkasan_pengobatan' => $resume['ringkasan_pengobatan'],
        'terapi_tindakan' => $resume['terapi_tindakan'],
        'diagnosa_kerja' => $resume['diagnosa_kerja'],
        'diagnosa_banding' => $resume['diagnosa_banding'],
        'diagnosis_hispatologi' => $resume['diagnosis_hispatologi'],
        'differensial_diagnosis' => $resume['differensial_diagnosis'],
        'gangguan_medis' => $resume['gangguan_medis'],
        'ringkasan_riwayat_penyakit' => $resume['ringkasan_riwayat_penyakit'],
        'diagnosa_awal' => $resume['diagnosa_awal'],
        'kronologis' => $resume['kronologis'],
        'pengkajian_fungsi' => $resume['pengkajian_fungsi'],
        'riwayat_operasi' => $resume['riwayat_operasi'],
        'riwayat_penyakit_keluarga' => $resume['riwayat_penyakit_keluarga'],
        'pemeriksaan_penunjang' => $resume['pemeriksaan_penunjang'],
        'pemeriksaan_penunjang_dahulu' => $resume['pemeriksaan_penunjang_dahulu'],
        'pemeriksaan_fisik' => $resume['pemeriksaan_fisik'],
        'terapi_obat' => $resume['terapi_obat'],
        'terapi_non_obat' => $resume['terapi_non_obat'],
        'prognosa' => $resume['prognosa'],
        'instruksi_pulang' => $resume['instruksi_pulang'],
        'hasil_dibawa_pulang' => $resume['hasil_dibawa_pulang'],
        'informasi_tambahan' => $resume['informasi_tambahan'],
        'kontrol_tgl' => $resume['kontrol_tgl'],
        'kontrol_terapi' => $resume['kontrol_terapi'],
        'kontrol_alasan' => $resume['kontrol_alasan'],
        'kontrol_rencana' => $resume['kontrol_rencana'],
        'kontrol_tindak_lanjut_tgl' => $resume['kontrol_tindak_lanjut_tgl'],
        'kontrol_tindak_lanjut_konsul_spesialis_lain' => $resume['kontrol_tindak_lanjut_konsul_spesialis_lain'],
        'kontrol_tindak_lanjut_lain_lain' => $resume['kontrol_tindak_lanjut_lain_lain'],
        'sebab_dirawat' => $resume['sebab_dirawat'],
        'sejarah_imunisasi' => $resume['sejarah_imunisasi'],
        'pengobatan_dan_tindakan' => $resume['pengobatan_dan_tindakan'],
        'rekonsiliasi_obat' => $resume['rekonsiliasi_obat'],
        'kontrol_poli' => $resume['kontrol_poli'],
        'obat_pulang' => $resume['obat_pulang'],
        'discharge_planning' => $resume['discharge_planning'],
        'rekomendasi_lanjutan' => $resume['rekomendasi_lanjutan'],
        'terapi' => $resume['terapi'],
        'diagnosa_akhir' => $resume['diagnosa_akhir'],
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

    $reg = $this->reg->get(['id_reg' => $post['id_reg']]);
    if (empty($reg)) {
      $output = [
        'status'  => 400,
        'message' => 'ID. Reg tidak ditemukan',
      ];

      $this->response($output, $output['status']);
    }

    $resume = $this->resume->get(['id_reg'  => $post['id_reg']]);
    
    $result = $this->resume->add([
      'id_reg'  => $post['id_reg'],
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
    
    // if ($this->form_validation->run() == FALSE) {
    //   $error_key = array_key_first($this->form_validation->error_array());
    //   $message = $this->form_validation->error_array()[$error_key];

    //   $output = [
    //     'status'  => 400,
    //     'message' => $message,
    //   ];

    //   $this->response($output, $output['status']);
    // }

    $reg = $this->reg->get(['id_reg' => $delete['id_reg']]);
    if (empty($reg)) {
      $output = [
        'status'  => 400,
        'message' => 'Registrasi tidak ditemukan',
      ];

      $this->response($output, $output['status']);
    }

    $resume = $this->resume->get(['id_reg'  => $delete['id_reg']]);

    if (empty($resume)) {
      $output = [
        'status'  => 400,
        'message' => 'Data tidak ditemukan',
      ];

      $this->response($output, $output['status']);
    }

    $output = $this->resume->hapus_notes_resume(['id_reg'  => $delete['id_reg']]);

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


    $resume = $this->resume->get(['id_reg'  => $get['id_reg']]);
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
    
    $pdf_base64 = $this->erm_resume->print_resume(['id_reg' => $get['id_reg'], 'id_ref_global_tipe_42' => $this->_id_ref_global_tipe_42]);

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



/* End of file C_81_11_resume.php */

?>