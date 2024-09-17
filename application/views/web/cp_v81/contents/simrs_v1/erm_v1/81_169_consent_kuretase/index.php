<?php if (empty($is_tab)): ?>

<div id="kt_app_content" class="app-content flex-column-fluid">
  <div id="kt_app_content_container" class="app-container container-xxl">
  <?php endif; ?>

  <?php
  if (!empty($notes)) {
    $notes_169 = $notes[0]['json_data']['notes'];

    $token_form = $token_data;
    $token_form['id_notes'] = $notes[0]['id'];
    $token_form = $this->app_encryption->encrypt_id(json_encode($token_form));
  } else {
    $token_form = $token;
  }
  ?>
  <form class="form w-100" novalidate="novalidate" id="form_169" data-is_tab="<?= !empty($is_tab) ? $is_tab : null; ?>" href="<?= base_url($this->_class . '/form_process/' . $token_form) ?>" action="#">

    <input type="hidden" id="csrf_token_hash_169" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">

    <div class="card h-100">
      <div class="card-header bg-primary">
        <div class="col-8 pt-3">
          <h3 class="float-start mt-5 text-white courier"><?= $ref['kode_form']." - ".$ref['nama_form']; ?></h3>
        </div>
        <div class="col-4 pt-5">
          <?php if (!empty($notes)) : ?>
            <a href="<?= base_url($this->_class . '/pdf/' . $token_form) ?>" class="btn btn-sm btn-success float-end" target="_blank">PDF</a>
          <?php endif; ?>
        </div>
      </div>
      <div class="card-body">

        <div class="row mt-3 justify-content-center" id="table_container">
          <div class="col-12">
            <div class="row mt-4">
              <div class="col-lg-12 col-sm-12">
                <div class="fv-row">
                  <label for="notes_169_status_pemberi_pernyataan_0" class="form-label">Status Pemberi Pernyataan</label>
                  <div>
                    <div role="group" aria-label="Basic radio toggle button group">
                      <input type="radio" class="btn-check" name="notes_169_status_pemberi_pernyataan" id="notes_169_status_pemberi_pernyataan_0" value="Pasien" autocomplete="off" <?= !empty($notes_169) && $notes_169['status_pemberi_pernyataan'] == 'Pasien' ? 'checked' : ''; ?>>
                      <label class="btn btn-sm btn-light btn-active-primary" for="notes_169_status_pemberi_pernyataan_0">Pasien</label>

                      <input type="radio" class="btn-check" name="notes_169_status_pemberi_pernyataan" id="notes_169_status_pemberi_pernyataan_1" value="Orang Tua" autocomplete="off" <?= !empty($notes_169) && $notes_169['status_pemberi_pernyataan'] == 'Orang Tua' ? 'checked' : ''; ?>>
                      <label class="btn btn-sm btn-light btn-active-primary" for="notes_169_status_pemberi_pernyataan_1">Orang Tua</label>

                      <input type="radio" class="btn-check" name="notes_169_status_pemberi_pernyataan" id="notes_169_status_pemberi_pernyataan_2" value="Suami" autocomplete="off" <?= !empty($notes_169) && $notes_169['status_pemberi_pernyataan'] == 'Suami' ? 'checked' : ''; ?>>
                      <label class="btn btn-sm btn-light btn-active-primary" for="notes_169_status_pemberi_pernyataan_2">Suami</label>

                      <input type="radio" class="btn-check" name="notes_169_status_pemberi_pernyataan" id="notes_169_status_pemberi_pernyataan_3" value="Istri" autocomplete="off" <?= !empty($notes_169) && $notes_169['status_pemberi_pernyataan'] == 'Istri' ? 'checked' : ''; ?>>
                      <label class="btn btn-sm btn-light btn-active-primary" for="notes_169_status_pemberi_pernyataan_3">Istri</label>

                      <input type="radio" class="btn-check" name="notes_169_status_pemberi_pernyataan" id="notes_169_status_pemberi_pernyataan_4" value="Anak" autocomplete="off" <?= !empty($notes_169) && $notes_169['status_pemberi_pernyataan'] == 'Anak' ? 'checked' : ''; ?>>
                      <label class="btn btn-sm btn-light btn-active-primary" for="notes_169_status_pemberi_pernyataan_4">Anak</label>

                      <input type="radio" class="btn-check" name="notes_169_status_pemberi_pernyataan" id="notes_169_status_pemberi_pernyataan_5" value="Wali" autocomplete="off" <?= !empty($notes_169) && $notes_169['status_pemberi_pernyataan'] == 'Wali' ? 'checked' : ''; ?>>
                      <label class="btn btn-sm btn-light btn-active-primary" for="notes_169_status_pemberi_pernyataan_5">Wali</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row mb-5" style="<?= !empty($notes_169) && $notes_169['status_pemberi_pernyataan'] == 'Pasien' ? 'display: none;' : ''; ?>">
                  <label for="notes_169_nama_pemberi_pernyataan" class="form-label">Nama Pemberi Pernyataan</label>
                  <input type="text" class="form-control" id="notes_169_nama_pemberi_pernyataan" name="notes_169_nama_pemberi_pernyataan" value="<?= isset($notes_169['nama_pemberi_pernyataan']) ? $notes_169['nama_pemberi_pernyataan'] : ''; ?>">
                </div>

                <div class="fv-row mb-5" style="<?= !empty($notes_169) && $notes_169['status_pemberi_pernyataan'] == 'Pasien' ? 'display: none;' : ''; ?>">
                  <label for="notes_169_telpon_pemberi_pernyataan" class="form-label">Telpon Pemberi Pernyataan</label>
                  <input type="text" class="form-control" id="notes_169_telpon_pemberi_pernyataan" name="notes_169_telpon_pemberi_pernyataan" value="<?= isset($notes_169['telpon_pemberi_pernyataan']) ? $notes_169['telpon_pemberi_pernyataan'] : ''; ?>">
                </div>
              </div>
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row mb-5" style="<?= !empty($notes_169) && $notes_169['status_pemberi_pernyataan'] == 'Pasien' ? 'display: none;' : ''; ?>">
                  <label for="notes_169_umur_pemberi_pernyataan" class="form-label">Umur Pemberi Pernyataan</label>
                  <input type="text" class="form-control" id="notes_169_umur_pemberi_pernyataan" name="notes_169_umur_pemberi_pernyataan" value="<?= isset($notes_169['umur_pemberi_pernyataan']) ? $notes_169['umur_pemberi_pernyataan'] : ''; ?>">
                </div>

                <div class="fv-row mb-5" style="<?= !empty($notes_169) && $notes_169['status_pemberi_pernyataan'] == 'Pasien' ? 'display: none;' : ''; ?>">
                  <label for="notes_169_alamat_pemberi_pernyataan" class="form-label">Alamat Pemberi Pernyataan</label>
                  <textarea class="form-control" id="notes_169_alamat_pemberi_pernyataan" name="notes_169_alamat_pemberi_pernyataan"><?= isset($notes_169['alamat_pemberi_pernyataan']) ? ($notes_169['alamat_pemberi_pernyataan']) : ''; ?></textarea>
                </div>
              </div>
            </div>
              

            <div class="row mt-4">
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row mb-5">
                  <label for="notes_169_nama_pasien" class="form-label">Nama Pasien</label>
                  <input type="text" class="form-control bg-secondary" id="notes_169_nama_pasien" name="notes_169_nama_pasien" value="<?= isset($reg['nama_pasien']) ? $reg['nama_pasien'] : ''; ?>" readonly>
                </div>
              </div>
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row">
                  <label for="notes_169_umur_pasien" class="form-label">Umur Pasien</label>
                  <input type="text" class="form-control bg-secondary" id="notes_169_umur_pasien" name="notes_169_umur_pasien" value="<?= isset($reg['umur']) ? $reg['umur'] : ''; ?>" readonly>
                </div>
              </div>
            </div>

            <div class="row mt-4">
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row">
                  <label for="notes_169_tgl_lahir_pasien" class="form-label">Tanggal Lahir Pasien</label>
                  <input type="text" class="form-control bg-secondary" id="notes_169_tgl_lahir_pasien" name="notes_169_tgl_lahir_pasien" value="<?= isset($reg['kelamin']) ? $reg['kelamin'] : ''; ?>" readonly>
                </div>
              </div>
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row">
                  <label for="notes_169_jenis_kelamin_pasien" class="form-label">Jenis Kelamin Pasien</label>
                  <input type="text" class="form-control bg-secondary" id="notes_169_jenis_kelamin_pasien" name="notes_169_jenis_kelamin_pasien" value="<?= isset($reg['tanggal_lahir']) ? $reg['tanggal_lahir'] : ''; ?>" readonly>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-sm-12">
                <div class="table-responsive fv-row">
                  <table class="table table-bordered mt-4">
                      <thead>
                          <tr>
                            <th>NO</th>
                            <th>JENIS INFORMARI</th>
                            <th>ISI INFORMASI</th>
                            <th>PARAF</th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1. </td>
                          <td>Diagnosis (WD dan DD) *</td>
                          <td>
                            <div class="fv-row mb-5">
                              <input type="text" class="form-control" id="notes_169_diagnosis" name="notes_169_diagnosis" value="<?= isset($notes_169['diagnosis']) ? $notes_169['diagnosis'] : ''; ?>">
                            </div>
                          </td>
                          <td>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="notes_169_paraf_diagnosis2" id="notes_169_paraf_diagnosis2" <?= isset($notes_169['paraf_diagnosis']) ? ($notes_169['paraf_diagnosis'] == 'on' ? 'checked' : '') : ''; ?>>
                              <input type="hidden" name="notes_169_paraf_diagnosis" id="notes_169_paraf_diagnosis" value="<?= isset($notes_169['paraf_diagnosis']) ? $notes_169['paraf_diagnosis'] : ''; ?>">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>2. </td>
                          <td>Dasar Diagnosis*</td>
                          <td>Anamnesa, Pemeriksaan fisik, USG</td>
                          <td>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="notes_169_paraf_dasar_diagnosis2" id="notes_169_paraf_dasar_diagnosis2" <?= isset($notes_169['paraf_dasar_diagnosis']) ? ($notes_169['paraf_dasar_diagnosis'] == 'on' ? 'checked' : '') : ''; ?>>
                              <input type="hidden" name="notes_169_paraf_dasar_diagnosis" id="notes_169_paraf_dasar_diagnosis" value="<?= isset($notes_169['paraf_dasar_diagnosis']) ? $notes_169['paraf_dasar_diagnosis'] : ''; ?>">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>3. </td>
                          <td>Tindakan Kedokteran*</td>
                          <td>Kuretase</td>
                          <td>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="notes_169_paraf_tindakan_kedokteran2" id="notes_169_paraf_tindakan_kedokteran2" <?= isset($notes_169['paraf_tindakan_kedokteran']) ? ($notes_169['paraf_tindakan_kedokteran'] == 'on' ? 'checked' : '') : ''; ?>>
                              <input type="hidden" name="notes_169_paraf_tindakan_kedokteran" id="notes_169_paraf_tindakan_kedokteran" value="<?= isset($notes_169['paraf_tindakan_kedokteran']) ? $notes_169['paraf_tindakan_kedokteran'] : ''; ?>">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>4. </td>
                          <td>Indikasi Tindakan*</td>
                          <td>Pemotongan saluran Indung telur</td>
                          <td>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="notes_169_paraf_indikasi_tindakan2" id="notes_169_paraf_indikasi_tindakan2" <?= isset($notes_169['paraf_indikasi_tindakan']) ? ($notes_169['paraf_indikasi_tindakan'] == 'on' ? 'checked' : '') : ''; ?>>
                              <input type="hidden" name="notes_169_paraf_indikasi_tindakan" id="notes_169_paraf_indikasi_tindakan" value="<?= isset($notes_169['paraf_indikasi_tindakan']) ? $notes_169['paraf_indikasi_tindakan'] : ''; ?>">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>5. </td>
                          <td>Tata Cara*</td>
                          <td>
                            <ul>
                              <li>Bius : diberi obat sedative (obat penenang)</li>
                              <li>Posisi : litotomi</li>
                              <li>Pembukaan vagina dengan menggunakan speculum</li>
                              <li>Dilatasi : proses pelebaran leher rahim</li>
                              <li>Kuretase</li>
                            </ul>
                          </td>
                          <td>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="notes_169_paraf_tatacara2" id="notes_169_paraf_tatacara2" <?= isset($notes_169['paraf_tatacara']) ? ($notes_169['paraf_tatacara'] == 'on' ? 'checked' : '') : ''; ?>>
                              <input type="hidden" name="notes_169_paraf_tatacara" id="notes_169_paraf_tatacara" value="<?= isset($notes_169['paraf_tatacara']) ? $notes_169['paraf_tatacara'] : ''; ?>">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>6. </td>
                          <td>Tujuan*</td>
                          <td>Membuang jaringan abnormal yaitu sisa jaringan plasenta dan jaringan yang sudah mengalami keguguran</td>
                          <td>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="notes_169_paraf_tujuan2" id="notes_169_paraf_tujuan2" <?= isset($notes_169['paraf_tujuan']) ? ($notes_169['paraf_tujuan'] == 'on' ? 'checked' : '') : ''; ?>>
                              <input type="hidden" name="notes_169_paraf_tujuan" id="notes_169_paraf_tujuan" value="<?= isset($notes_169['paraf_tujuan']) ? $notes_169['paraf_tujuan'] : ''; ?>">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>7. </td>
                          <td>Resiko*/ Komplikasi</td>
                          <td>
                            <ul>
                              <li>Pendarahan</li>
                              <li>Infeksi</li>
                              <li>Kram perut pada bagian bawah</li>
                              <li>Kelainan posisi rahim</li>
                            </ul>
                          </td>
                          <td>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="notes_169_paraf_resiko2" id="notes_169_paraf_resiko2" <?= isset($notes_169['paraf_resiko']) ? ($notes_169['paraf_resiko'] == 'on' ? 'checked' : '') : ''; ?>>
                              <input type="hidden" name="notes_169_paraf_resiko" id="notes_169_paraf_resiko" value="<?= isset($notes_169['paraf_resiko']) ? $notes_169['paraf_resiko'] : ''; ?>">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>8. </td>
                          <td>Prognosis*</td>
                          <td>Baik</td>
                          <td>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="notes_169_paraf_pragnosis2" id="notes_169_paraf_pragnosis2" <?= isset($notes_169['paraf_pragnosis']) ? ($notes_169['paraf_pragnosis'] == 'on' ? 'checked' : '') : ''; ?>>
                              <input type="hidden" name="notes_169_paraf_pragnosis" id="notes_169_paraf_pragnosis" value="<?= isset($notes_169['paraf_pragnosis']) ? $notes_169['paraf_pragnosis'] : ''; ?>">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>9. </td>
                          <td>Alternatif*</td>
                          <td>
                            <div class="fv-row mb-5">
                              <input type="text" class="form-control" id="notes_169_alternatif" name="notes_169_alternatif" value="<?= isset($notes_169['alternatif']) ? $notes_169['alternatif'] : ''; ?>">
                            </div>
                          </td>
                          <td>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="notes_169_paraf_alternatif2" id="notes_169_paraf_alternatif2" <?= isset($notes_169['paraf_alternatif']) ? ($notes_169['paraf_alternatif'] == 'on' ? 'checked' : '') : ''; ?>>
                              <input type="hidden" name="notes_169_paraf_alternatif" id="notes_169_paraf_alternatif" value="<?= isset($notes_169['paraf_alternatif']) ? $notes_169['paraf_alternatif'] : ''; ?>">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>10. </td>
                          <td>Lain-lain*</td>
                          <td>
                            <div class="fv-row mb-5">
                              <input type="text" class="form-control" id="notes_169_lain_lain" name="notes_169_lain_lain" value="<?= isset($notes_169['lain_lain']) ? $notes_169['lain_lain'] : ''; ?>">
                            </div>
                          </td>
                          <td>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="notes_169_paraf_lain_lain2" id="notes_169_paraf_lain_lain2" <?= isset($notes_169['paraf_lain_lain']) ? ($notes_169['paraf_lain_lain'] == 'on' ? 'checked' : '') : ''; ?>>
                              <input type="hidden" name="notes_169_paraf_lain_lain" id="notes_169_paraf_lain_lain" value="<?= isset($notes_169['paraf_lain_lain']) ? $notes_169['paraf_lain_lain'] : ''; ?>">
                            </div>
                          </td>
                        </tr>
                      </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="separator my-5"></div>

            <div class="row mt-4">
              <div class="col-12">
                <div class="fv-row">
                  <label for="notes_169_ttd_pasien" class="form-label text-primary">TTD Pasien</label>
                  <div class="col-md-12" id="signature_pad">
                    <canvas class="border border-gray-500" id="notes_169_ttd_pasien">
                  </div>
                  <div style="width: 100%" id="signature_pad">
                    <button class="btn btn-sm btn-secondary" id="clear_notes_169_ttd_pasien">Clear</button>
                    <button class="btn btn-sm btn-secondary" id="undo_notes_169_ttd_pasien">Undo</button>
                  </div>
                  <input type="hidden" name="notes_169_ttd_pasien" value="<?= isset($notes_169['ttd_pasien']) ? $notes_169['ttd_pasien'] : ''; ?>">
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="card-footer">
        <!-- <button type="reset" class="btn btn-light me-2 float-start">Reset</button> -->

        <?php if (!empty($notes)) : ?>
          <button type="button" class="btn btn-danger me-2 float-start" id="delete_169" href="<?= base_url($this->_class . '/delete_process/' . $token_form) ?>">Hapus</button>
        <?php endif; ?>

        <button type="submit" id="kt_sign_in_submit" class="btn btn-<?= ($notes) ? 'info' : 'primary'; ?> float-end">
          <span class="indicator-label"><?= ($notes) ? 'Update' : 'Submit'; ?></span>

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