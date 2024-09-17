<?php if (empty($is_tab)): ?>

<div id="kt_app_content" class="app-content flex-column-fluid">
  <div id="kt_app_content_container" class="app-container container-xxl">
  <?php endif; ?>

  <?php
  if (!empty($resume)) {

    $token_form = $token_data;
    $token_form['id_notes_resume'] = $resume['id'];
    $token_form = $this->app_encryption->encrypt_id(json_encode($token_form));
  } else {
    $token_form = $token;
  }
  ?>
  <form class="form w-100" novalidate="novalidate" id="form_11" data-is_tab="<?= !empty($is_tab) ? $is_tab : null; ?>" href="<?= base_url($this->_class . '/form_process/' . $token_form) ?>" action="#">

    <input type="hidden" id="csrf_token_hash_11" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">

    <div class="card h-100">
      <div class="card-header bg-primary">
        <div class="col-8 pt-3">
          <h3 class="float-start mt-5 text-white courier"><?= $title; ?></h3>
        </div>
        <div class="col-4 pt-5">
          <?php if (!empty($resume)) : ?>
            <a href="<?= base_url($this->_class . '/pdf/' . $token_form) ?>" class="btn btn-sm btn-success float-end" target="_blank">PDF</a>
          <?php endif; ?>
        </div>
      </div>
      <div class="card-body">

        <div class="row mt-3 justify-content-center" id="table_container">
          <div class="col-12">
      
            <div class="row mt-4">
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row mb-5">
                  <label for="notes_11_nama_pasien" class="form-label">Nama Pasien</label>
                  <input type="text" class="form-control bg-secondary" id="notes_11_nama_pasien" name="notes_11_nama_pasien" value="<?= isset($reg['nama_pasien']) ? $reg['nama_pasien'] : ''; ?>" readonly>
                </div>
              </div>
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row">
                  <label for="notes_11_umur_pasien" class="form-label">Umur Pasien</label>
                  <input type="text" class="form-control bg-secondary" id="notes_11_umur_pasien" name="notes_11_umur_pasien" value="<?= isset($reg['umur']) ? $reg['umur'] : ''; ?>" readonly>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row">
                  <label for="notes_11_no_bpjs_pasien" class="form-label">No. BPJS</label>
                  <input type="text" class="form-control bg-secondary" id="notes_11_no_bpjs_pasien" name="notes_11_no_bpjs_pasien" value="<?= isset($reg['no_bpjs']) ? $reg['no_bpjs'] : ''; ?>" readonly>
                </div>
              </div>
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row">
                  <label for="notes_11_alamat_pasien" class="form-label">Alamat</label>
                  <input type="text" class="form-control bg-secondary" id="notes_11_alamat_pasien" name="notes_11_alamat_pasien" value="<?= isset($reg['alamat']) ? $reg['alamat'] : ''; ?>" readonly>
                </div>
              </div>
            </div>

            <div class="separator my-5"></div>

            <div class="row mt-4">
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="obat_terapi_pulang" class="form-label text-primary"><?= ucwords(str_replace('_',' ','obat_terapi_pulang'));?></label>
                    <textarea class="form-control" id="obat_terapi_pulang" name="obat_terapi_pulang" rows="1" data-kt-autosize="true" data-kt-element="input" ><?= empty($resume) ? '' : (isset($resume['obat_terapi_pulang']) ? $resume['obat_terapi_pulang'] : ''); ?></textarea>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="keluhan_utama" class="form-label text-primary"><?= ucwords(str_replace('_',' ','keluhan_utama'));?></label>
                    <textarea class="form-control" id="keluhan_utama" name="keluhan_utama" rows="1" data-kt-autosize="true" data-kt-element="input" ><?= empty($resume) ? '': (isset($resume['keluhan_utama']) ? $resume['keluhan_utama'] : ''); ?></textarea>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="keluhan" class="form-label text-primary"><?= ucwords(str_replace('_',' ','keluhan'));?></label>
                    <textarea class="form-control" id="keluhan" name="keluhan" rows="1" data-kt-autosize="true" data-kt-element="input" ><?= empty($resume) ? '': (isset($resume['keluhan']) ? $resume['keluhan'] : ''); ?></textarea>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="informasi_medis" class="form-label text-primary"><?= ucwords(str_replace('_',' ','informasi_medis'));?></label>
                    <textarea class="form-control" id="informasi_medis" name="informasi_medis" rows="1" data-kt-autosize="true" data-kt-element="input" ><?= empty($resume) ? '': (isset($resume['informasi_medis']) ? $resume['informasi_medis'] : ''); ?></textarea>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="ringkasan_riwayat_penyakit_dahulu" class="form-label text-primary"><?= ucwords(str_replace('_',' ','ringkasan_riwayat_penyakit_dahulu'));?></label>
                    <textarea class="form-control" id="ringkasan_riwayat_penyakit_dahulu" name="ringkasan_riwayat_penyakit_dahulu" rows="1" data-kt-autosize="true" data-kt-element="input" ><?= empty($resume) ? '': (isset($resume['ringkasan_riwayat_penyakit_dahulu']) ? $resume['ringkasan_riwayat_penyakit_dahulu'] : ''); ?></textarea>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="ringkasan_pengobatan" class="form-label text-primary"><?= ucwords(str_replace('_',' ','ringkasan_pengobatan'));?></label>
                    <textarea class="form-control" id="ringkasan_pengobatan" name="ringkasan_pengobatan" rows="1" data-kt-autosize="true" data-kt-element="input" ><?= empty($resume) ? '': (isset($resume['ringkasan_pengobatan']) ? $resume['ringkasan_pengobatan'] : ''); ?></textarea>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="terapi_tindakan" class="form-label text-primary"><?= ucwords(str_replace('_',' ','terapi_tindakan'));?></label>
                    <textarea class="form-control" id="terapi_tindakan" name="terapi_tindakan" rows="1" data-kt-autosize="true" data-kt-element="input" ><?= empty($resume) ? '': (isset($resume['terapi_tindakan']) ? $resume['terapi_tindakan'] : ''); ?></textarea>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="diagnosa_kerja" class="form-label text-primary"><?= ucwords(str_replace('_',' ','diagnosa_kerja'));?></label>
                    <textarea class="form-control" id="diagnosa_kerja" name="diagnosa_kerja" rows="1" data-kt-autosize="true" data-kt-element="input" ><?= empty($resume) ? '': (isset($resume['diagnosa_kerja']) ? $resume['diagnosa_kerja'] : ''); ?></textarea>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="diagnosa_banding" class="form-label text-primary"><?= ucwords(str_replace('_',' ','diagnosa_banding'));?></label>
                    <textarea class="form-control" id="diagnosa_banding" name="diagnosa_banding" rows="1" data-kt-autosize="true" data-kt-element="input" ><?= empty($resume) ? '': (isset($resume['diagnosa_banding']) ? $resume['diagnosa_banding'] : ''); ?></textarea>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="diagnosis_hispatologi" class="form-label text-primary"><?= ucwords(str_replace('_',' ','diagnosis_hispatologi'));?></label>
                    <textarea class="form-control" id="diagnosis_hispatologi" name="diagnosis_hispatologi" rows="1" data-kt-autosize="true" data-kt-element="input" ><?= empty($resume) ? '': (isset($resume['diagnosis_hispatologi']) ? $resume['diagnosis_hispatologi'] : ''); ?></textarea>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="differensial_diagnosis" class="form-label text-primary"><?= ucwords(str_replace('_',' ','differensial_diagnosis'));?></label>
                    <textarea class="form-control" id="differensial_diagnosis" name="differensial_diagnosis" rows="1" data-kt-autosize="true" data-kt-element="input" ><?= empty($resume) ? '': (isset($resume['differensial_diagnosis']) ? $resume['differensial_diagnosis'] : ''); ?></textarea>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="gangguan_medis" class="form-label text-primary"><?= ucwords(str_replace('_',' ','gangguan_medis'));?></label>
                    <textarea class="form-control" id="gangguan_medis" name="gangguan_medis" rows="1" data-kt-autosize="true" data-kt-element="input" ><?= empty($resume) ? '': (isset($resume['gangguan_medis']) ? $resume['gangguan_medis'] : ''); ?></textarea>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="ringkasan_riwayat_penyakit" class="form-label text-primary"><?= ucwords(str_replace('_',' ','ringkasan_riwayat_penyakit'));?></label>
                    <textarea class="form-control" id="ringkasan_riwayat_penyakit" name="ringkasan_riwayat_penyakit" rows="1" data-kt-autosize="true" data-kt-element="input" ><?= empty($resume) ? '': (isset($resume['ringkasan_riwayat_penyakit']) ? $resume['ringkasan_riwayat_penyakit'] : ''); ?></textarea>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="diagnosa_awal" class="form-label text-primary"><?= ucwords(str_replace('_',' ','diagnosa_awal'));?></label>
                    <textarea class="form-control" id="diagnosa_awal" name="diagnosa_awal" rows="1" data-kt-autosize="true" data-kt-element="input" ><?= empty($resume) ? '': (isset($resume['diagnosa_awal']) ? $resume['diagnosa_awal'] : ''); ?></textarea>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="kronologis" class="form-label text-primary"><?= ucwords(str_replace('_',' ','kronologis'));?></label>
                    <textarea class="form-control" id="kronologis" name="kronologis" rows="1" data-kt-autosize="true" data-kt-element="input" ><?= empty($resume) ? '': (isset($resume['kronologis']) ? $resume['kronologis'] : ''); ?></textarea>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="pengkajian_fungsi" class="form-label text-primary"><?= ucwords(str_replace('_',' ','pengkajian_fungsi'));?></label>
                    <textarea class="form-control" id="pengkajian_fungsi" name="pengkajian_fungsi" rows="1" data-kt-autosize="true" data-kt-element="input" ><?= empty($resume) ? '': (isset($resume['pengkajian_fungsi']) ? $resume['pengkajian_fungsi'] : ''); ?></textarea>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="riwayat_operasi" class="form-label text-primary"><?= ucwords(str_replace('_',' ','riwayat_operasi'));?></label>
                    <textarea class="form-control" id="riwayat_operasi" name="riwayat_operasi" rows="1" data-kt-autosize="true" data-kt-element="input" ><?= empty($resume) ? '': (isset($resume['riwayat_operasi']) ? $resume['riwayat_operasi'] : ''); ?></textarea>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="riwayat_penyakit_keluarga" class="form-label text-primary"><?= ucwords(str_replace('_',' ','riwayat_penyakit_keluarga'));?></label>
                    <textarea class="form-control" id="riwayat_penyakit_keluarga" name="riwayat_penyakit_keluarga" rows="1" data-kt-autosize="true" data-kt-element="input" ><?= empty($resume) ? '': (isset($resume['riwayat_penyakit_keluarga']) ? $resume['riwayat_penyakit_keluarga'] : ''); ?></textarea>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="pemeriksaan_penunjang" class="form-label text-primary"><?= ucwords(str_replace('_',' ','pemeriksaan_penunjang'));?></label>
                    <textarea class="form-control" id="pemeriksaan_penunjang" name="pemeriksaan_penunjang" rows="1" data-kt-autosize="true" data-kt-element="input" ><?= empty($resume) ? '': (isset($resume['pemeriksaan_penunjang']) ? $resume['pemeriksaan_penunjang'] : ''); ?></textarea>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="pemeriksaan_penunjang_dahulu" class="form-label text-primary"><?= ucwords(str_replace('_',' ','pemeriksaan_penunjang_dahulu'));?></label>
                    <textarea class="form-control" id="pemeriksaan_penunjang_dahulu" name="pemeriksaan_penunjang_dahulu" rows="1" data-kt-autosize="true" data-kt-element="input" ><?= empty($resume) ? '': (isset($resume['pemeriksaan_penunjang_dahulu']) ? $resume['pemeriksaan_penunjang_dahulu'] : ''); ?></textarea>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="pemeriksaan_fisik" class="form-label text-primary"><?= ucwords(str_replace('_',' ','pemeriksaan_fisik'));?></label>
                    <textarea class="form-control" id="pemeriksaan_fisik" name="pemeriksaan_fisik" rows="1" data-kt-autosize="true" data-kt-element="input" ><?= empty($resume) ? '': (isset($resume['pemeriksaan_fisik']) ? $resume['pemeriksaan_fisik'] : ''); ?></textarea>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="terapi_obat" class="form-label text-primary"><?= ucwords(str_replace('_',' ','terapi_obat'));?></label>
                    <textarea class="form-control" id="terapi_obat" name="terapi_obat" rows="1" data-kt-autosize="true" data-kt-element="input" ><?= empty($resume) ? '': (isset($resume['terapi_obat']) ? $resume['terapi_obat'] : ''); ?></textarea>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="terapi_non_obat" class="form-label text-primary"><?= ucwords(str_replace('_',' ','terapi_non_obat'));?></label>
                    <textarea class="form-control" id="terapi_non_obat" name="terapi_non_obat" rows="1" data-kt-autosize="true" data-kt-element="input" ><?= empty($resume) ? '': (isset($resume['terapi_non_obat']) ? $resume['terapi_non_obat'] : ''); ?></textarea>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="prognosa" class="form-label text-primary"><?= ucwords(str_replace('_',' ','prognosa'));?></label>
                    <textarea class="form-control" id="prognosa" name="prognosa" rows="1" data-kt-autosize="true" data-kt-element="input" ><?= empty($resume) ? '': (isset($resume['prognosa']) ? $resume['prognosa'] : ''); ?></textarea>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="instruksi_pulang" class="form-label text-primary"><?= ucwords(str_replace('_',' ','instruksi_pulang'));?></label>
                    <textarea class="form-control" id="instruksi_pulang" name="instruksi_pulang" rows="1" data-kt-autosize="true" data-kt-element="input" ><?= empty($resume) ? '': (isset($resume['instruksi_pulang']) ? $resume['instruksi_pulang'] : ''); ?></textarea>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="hasil_dibawa_pulang" class="form-label text-primary"><?= ucwords(str_replace('_',' ','hasil_dibawa_pulang'));?></label>
                    <textarea class="form-control" id="hasil_dibawa_pulang" name="hasil_dibawa_pulang" rows="1" data-kt-autosize="true" data-kt-element="input" ><?= empty($resume) ? '': (isset($resume['hasil_dibawa_pulang']) ? $resume['hasil_dibawa_pulang'] : ''); ?></textarea>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="informasi_tambahan" class="form-label text-primary"><?= ucwords(str_replace('_',' ','informasi_tambahan'));?></label>
                    <textarea class="form-control" id="informasi_tambahan" name="informasi_tambahan" rows="1" data-kt-autosize="true" data-kt-element="input" ><?= empty($resume) ? '': (isset($resume['informasi_tambahan']) ? $resume['informasi_tambahan'] : ''); ?></textarea>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="kontrol_tgl" class="form-label text-primary"><?= ucwords(str_replace('_',' ','kontrol_tgl'));?></label>
                    <input type="date" class="form-control" id="kontrol_tgl" name="kontrol_tgl" value="<?= empty($resume) ? '': (isset($resume['kontrol_tgl']) ? $resume['kontrol_tgl'] : ''); ?>" >
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="kontrol_terapi" class="form-label text-primary"><?= ucwords(str_replace('_',' ','kontrol_terapi'));?></label>
                    <textarea class="form-control" id="kontrol_terapi" name="kontrol_terapi" rows="1" data-kt-autosize="true" data-kt-element="input" ><?= empty($resume) ? '': (isset($resume['kontrol_terapi']) ? $resume['kontrol_terapi'] : ''); ?></textarea>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="kontrol_alasan" class="form-label text-primary"><?= ucwords(str_replace('_',' ','kontrol_alasan'));?></label>
                    <textarea type="date" class="form-control" id="kontrol_alasan" name="kontrol_alasan" value="<?= empty($resume) ? '': (isset($resume['kontrol_alasan']) ? $resume['kontrol_alasan'] : ''); ?>" rows="1" data-kt-autosize="true" data-kt-element="input" ></textarea>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="kontrol_rencana" class="form-label text-primary"><?= ucwords(str_replace('_',' ','kontrol_rencana'));?></label>
                    <textarea class="form-control" id="kontrol_rencana" name="kontrol_rencana" rows="1" data-kt-autosize="true" data-kt-element="input" ><?= empty($resume) ? '': (isset($resume['kontrol_rencana']) ? $resume['kontrol_rencana'] : ''); ?></textarea>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="kontrol_tindak_lanjut_tgl" class="form-label text-primary"><?= ucwords(str_replace('_',' ','kontrol_tindak_lanjut_tgl'));?></label>
                    <input type="date" class="form-control" id="kontrol_tindak_lanjut_tgl" name="kontrol_tindak_lanjut_tgl" value="<?= empty($resume) ? '': (isset($resume['kontrol_tindak_lanjut_tgl']) ? $resume['kontrol_tindak_lanjut_tgl'] : ''); ?>" >
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="kontrol_tindak_lanjut_konsul_spesialis_lain" class="form-label text-primary"><?= ucwords(str_replace('_',' ','kontrol_tindak_lanjut_konsul_spesialis_lain'));?></label>
                    <textarea class="form-control" id="kontrol_tindak_lanjut_konsul_spesialis_lain" name="kontrol_tindak_lanjut_konsul_spesialis_lain" rows="1" data-kt-autosize="true" data-kt-element="input" ><?= empty($resume) ? '': (isset($resume['kontrol_tindak_lanjut_konsul_spesialis_lain']) ? $resume['kontrol_tindak_lanjut_konsul_spesialis_lain'] : ''); ?></textarea>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="kontrol_tindak_lanjut_lain_lain" class="form-label text-primary"><?= ucwords(str_replace('_',' ','kontrol_tindak_lanjut_lain_lain'));?></label>
                    <textarea type="date" class="form-control" id="kontrol_tindak_lanjut_lain_lain" name="kontrol_tindak_lanjut_lain_lain" value="<?= empty($resume) ? '': (isset($resume['kontrol_tindak_lanjut_lain_lain']) ? $resume['kontrol_tindak_lanjut_lain_lain'] : ''); ?>" rows="1" data-kt-autosize="true" data-kt-element="input" ></textarea>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="sebab_dirawat" class="form-label text-primary"><?= ucwords(str_replace('_',' ','sebab_dirawat'));?></label>
                    <textarea class="form-control" id="sebab_dirawat" name="sebab_dirawat" rows="1" data-kt-autosize="true" data-kt-element="input" ><?= empty($resume) ? '': (isset($resume['sebab_dirawat']) ? $resume['sebab_dirawat'] : ''); ?></textarea>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="sejarah_imunisasi" class="form-label text-primary"><?= ucwords(str_replace('_',' ','sejarah_imunisasi'));?></label>
                    <textarea class="form-control" id="sejarah_imunisasi" name="sejarah_imunisasi" rows="1" data-kt-autosize="true" data-kt-element="input" ><?= empty($resume) ? '': (isset($resume['sejarah_imunisasi']) ? $resume['sejarah_imunisasi'] : ''); ?></textarea>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="pengobatan_dan_tindakan" class="form-label text-primary"><?= ucwords(str_replace('_',' ','pengobatan_dan_tindakan'));?></label>
                    <textarea class="form-control" id="pengobatan_dan_tindakan" name="pengobatan_dan_tindakan" rows="1" data-kt-autosize="true" data-kt-element="input" ><?= empty($resume) ? '': (isset($resume['pengobatan_dan_tindakan']) ? $resume['pengobatan_dan_tindakan'] : ''); ?></textarea>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="rekonsiliasi_obat" class="form-label text-primary"><?= ucwords(str_replace('_',' ','rekonsiliasi_obat'));?></label>
                    <textarea class="form-control" id="rekonsiliasi_obat" name="rekonsiliasi_obat" rows="1" data-kt-autosize="true" data-kt-element="input" ><?= empty($resume) ? '': (isset($resume['rekonsiliasi_obat']) ? $resume['rekonsiliasi_obat'] : ''); ?></textarea>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="kontrol_poli" class="form-label text-primary"><?= ucwords(str_replace('_',' ','kontrol_poli'));?></label>
                    <textarea class="form-control" id="kontrol_poli" name="kontrol_poli" rows="1" data-kt-autosize="true" data-kt-element="input" ><?= empty($resume) ? '': (isset($resume['kontrol_poli']) ? $resume['kontrol_poli'] : ''); ?></textarea>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="obat_pulang" class="form-label text-primary"><?= ucwords(str_replace('_',' ','obat_pulang'));?></label>
                    <textarea class="form-control" id="obat_pulang" name="obat_pulang" rows="1" data-kt-autosize="true" data-kt-element="input" ><?= empty($resume) ? '': (isset($resume['obat_pulang']) ? $resume['obat_pulang'] : ''); ?></textarea>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="discharge_planning" class="form-label text-primary"><?= ucwords(str_replace('_',' ','discharge_planning'));?></label>
                    <textarea class="form-control" id="discharge_planning" name="discharge_planning" rows="1" data-kt-autosize="true" data-kt-element="input" ><?= empty($resume) ? '': (isset($resume['discharge_planning']) ? $resume['discharge_planning'] : ''); ?></textarea>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="rekomendasi_lanjutan" class="form-label text-primary"><?= ucwords(str_replace('_',' ','rekomendasi_lanjutan'));?></label>
                    <textarea class="form-control" id="rekomendasi_lanjutan" name="rekomendasi_lanjutan" rows="1" data-kt-autosize="true" data-kt-element="input" ><?= empty($resume) ? '': (isset($resume['rekomendasi_lanjutan']) ? $resume['rekomendasi_lanjutan'] : ''); ?></textarea>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="terapi" class="form-label text-primary"><?= ucwords(str_replace('_',' ','terapi'));?></label>
                    <textarea class="form-control" id="terapi" name="terapi" rows="1" data-kt-autosize="true" data-kt-element="input" ><?= empty($resume) ? '': (isset($resume['terapi']) ? $resume['terapi'] : ''); ?></textarea>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                  <div class="fv-row">
                    <label for="diagnosa_akhir" class="form-label text-primary"><?= ucwords(str_replace('_',' ','diagnosa_akhir'));?></label>
                    <textarea class="form-control" id="diagnosa_akhir" name="diagnosa_akhir" rows="1" data-kt-autosize="true" data-kt-element="input" ><?= empty($resume) ? '': (isset($resume['diagnosa_akhir']) ? $resume['diagnosa_akhir'] : ''); ?></textarea>
                  </div>
                </div>
                
              </div>
           
            </div>


            
          </div>
        </div>

      </div>

      <div class="card-footer">
        <!-- <button type="reset" class="btn btn-light me-2 float-start">Reset</button> -->

        <?php if (!empty($resume)) : ?>
          <button type="button" class="btn btn-danger me-2 float-start" id="delete_11" href="<?= base_url($this->_class . '/delete_process/' . $token_form) ?>">Hapus</button>
        <?php endif; ?>

        <button type="submit" id="kt_sign_in_submit" class="btn btn-<?= ($resume) ? 'info' : 'primary'; ?> float-end">
          <span class="indicator-label"><?= ($resume) ? 'Update' : 'Submit'; ?></span>

          <span class="indicator-progress">Please wait...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
      </div>

    </div>
  </form>

  <?php if (empty($is_tab)): ?>
  </div>
</div>
<?php endif; ?>


<?php if (isset($js) && !empty($is_tab)) : ?>
<?php foreach ($js as $k => $v) : ?>
  <script src="<?= $v; ?>" <?= (str_contains($v, 'js/mvc')) ? 'async' : null; ?>></script>
<?php endforeach; ?>
<?php endif; ?>