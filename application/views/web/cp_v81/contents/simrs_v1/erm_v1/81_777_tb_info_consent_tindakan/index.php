<?php if (empty($is_tab)): ?>

<div id="kt_app_content" class="app-content flex-column-fluid">
  <div id="kt_app_content_container" class="app-container container-xxl">
  <?php endif; ?>

  <?php
  if (!empty($notes)) {
    $notes_777 = $notes[0]['json_data']['notes'];

    $token_form = $token_data;
    $token_form['id_notes'] = $notes[0]['id'];
    $token_form = $this->app_encryption->encrypt_id(json_encode($token_form));
  } else {
    $token_form = $token;
  }
  ?>
  <form class="form w-100" novalidate="novalidate" id="form_777" data-is_tab="<?= !empty($is_tab) ? $is_tab : null; ?>" href="<?= base_url($this->_class . '/form_process/' . $token_form) ?>" action="#">

    <input type="hidden" id="csrf_token_hash_777" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">

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
                  <label for="notes_777_status_pemberi_pernyataan_0" class="form-label">Status Pemberi Pernyataan</label>
                  <div>
                    <div role="group" aria-label="Basic radio toggle button group">
                      <input type="radio" class="btn-check" name="notes_777_status_pemberi_pernyataan" id="notes_777_status_pemberi_pernyataan_0" value="Pasien" autocomplete="off" <?= !empty($notes_777) && $notes_777['status_pemberi_pernyataan'] == 'Pasien' ? 'checked' : ''; ?>>
                      <label class="btn btn-sm btn-light btn-active-primary" for="notes_777_status_pemberi_pernyataan_0">Pasien</label>

                      <input type="radio" class="btn-check" name="notes_777_status_pemberi_pernyataan" id="notes_777_status_pemberi_pernyataan_1" value="Orang Tua" autocomplete="off" <?= !empty($notes_777) && $notes_777['status_pemberi_pernyataan'] == 'Orang Tua' ? 'checked' : ''; ?>>
                      <label class="btn btn-sm btn-light btn-active-primary" for="notes_777_status_pemberi_pernyataan_1">Orang Tua</label>

                      <input type="radio" class="btn-check" name="notes_777_status_pemberi_pernyataan" id="notes_777_status_pemberi_pernyataan_2" value="Suami" autocomplete="off" <?= !empty($notes_777) && $notes_777['status_pemberi_pernyataan'] == 'Suami' ? 'checked' : ''; ?>>
                      <label class="btn btn-sm btn-light btn-active-primary" for="notes_777_status_pemberi_pernyataan_2">Suami</label>

                      <input type="radio" class="btn-check" name="notes_777_status_pemberi_pernyataan" id="notes_777_status_pemberi_pernyataan_3" value="Istri" autocomplete="off" <?= !empty($notes_777) && $notes_777['status_pemberi_pernyataan'] == 'Istri' ? 'checked' : ''; ?>>
                      <label class="btn btn-sm btn-light btn-active-primary" for="notes_777_status_pemberi_pernyataan_3">Istri</label>

                      <input type="radio" class="btn-check" name="notes_777_status_pemberi_pernyataan" id="notes_777_status_pemberi_pernyataan_4" value="Anak" autocomplete="off" <?= !empty($notes_777) && $notes_777['status_pemberi_pernyataan'] == 'Anak' ? 'checked' : ''; ?>>
                      <label class="btn btn-sm btn-light btn-active-primary" for="notes_777_status_pemberi_pernyataan_4">Anak</label>

                      <input type="radio" class="btn-check" name="notes_777_status_pemberi_pernyataan" id="notes_777_status_pemberi_pernyataan_5" value="Wali" autocomplete="off" <?= !empty($notes_777) && $notes_777['status_pemberi_pernyataan'] == 'Wali' ? 'checked' : ''; ?>>
                      <label class="btn btn-sm btn-light btn-active-primary" for="notes_777_status_pemberi_pernyataan_5">Wali</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row mb-5" style="<?= !empty($notes_777) && $notes_777['status_pemberi_pernyataan'] == 'Pasien' ? 'display: none;' : ''; ?>">
                  <label for="notes_777_nama_pemberi_pernyataan" class="form-label">Nama Pemberi Pernyataan</label>
                  <input type="text" class="form-control" id="notes_777_nama_pemberi_pernyataan" name="notes_777_nama_pemberi_pernyataan" value="<?= isset($notes_777['nama_pemberi_pernyataan']) ? $notes_777['nama_pemberi_pernyataan'] : ''; ?>">
                </div>

                <div class="fv-row mb-5" style="<?= !empty($notes_777) && $notes_777['status_pemberi_pernyataan'] == 'Pasien' ? 'display: none;' : ''; ?>">
                  <label for="notes_777_telpon_pemberi_pernyataan" class="form-label">Telpon Pemberi Pernyataan</label>
                  <input type="text" class="form-control" id="notes_777_telpon_pemberi_pernyataan" name="notes_777_telpon_pemberi_pernyataan" value="<?= isset($notes_777['telpon_pemberi_pernyataan']) ? $notes_777['telpon_pemberi_pernyataan'] : ''; ?>">
                </div>
              </div>
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row mb-5" style="<?= !empty($notes_777) && $notes_777['status_pemberi_pernyataan'] == 'Pasien' ? 'display: none;' : ''; ?>">
                  <label for="notes_777_umur_pemberi_pernyataan" class="form-label">Umur Pemberi Pernyataan</label>
                  <input type="text" class="form-control" id="notes_777_umur_pemberi_pernyataan" name="notes_777_umur_pemberi_pernyataan" value="<?= isset($notes_777['umur_pemberi_pernyataan']) ? $notes_777['umur_pemberi_pernyataan'] : ''; ?>">
                </div>

                <div class="fv-row mb-5" style="<?= !empty($notes_777) && $notes_777['status_pemberi_pernyataan'] == 'Pasien' ? 'display: none;' : ''; ?>">
                  <label for="notes_777_alamat_pemberi_pernyataan" class="form-label">Alamat Pemberi Pernyataan</label>
                  <textarea class="form-control" id="notes_777_alamat_pemberi_pernyataan" name="notes_777_alamat_pemberi_pernyataan"><?= isset($notes_777['alamat_pemberi_pernyataan']) ? ($notes_777['alamat_pemberi_pernyataan']) : ''; ?></textarea>
                </div>
              </div>
            </div>
              

            <div class="row mt-4">
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row mb-5">
                  <label for="notes_777_nama_pasien" class="form-label">Nama Pasien</label>
                  <input type="text" class="form-control bg-secondary" id="notes_777_nama_pasien" name="notes_777_nama_pasien" value="<?= isset($reg['nama_pasien']) ? $reg['nama_pasien'] : ''; ?>" readonly>
                </div>
              </div>
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row">
                  <label for="notes_777_umur_pasien" class="form-label">Umur Pasien</label>
                  <input type="text" class="form-control bg-secondary" id="notes_777_umur_pasien" name="notes_777_umur_pasien" value="<?= isset($reg['umur']) ? $reg['umur'] : ''; ?>" readonly>
                </div>
              </div>
            </div>

            <div class="row mt-4">
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row">
                  <label for="notes_777_tgl_lahir_pasien" class="form-label">Tanggal Lahir Pasien</label>
                  <input type="text" class="form-control bg-secondary" id="notes_777_tgl_lahir_pasien" name="notes_777_tgl_lahir_pasien" value="<?= isset($reg['kelamin']) ? $reg['kelamin'] : ''; ?>" readonly>
                </div>
              </div>
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row">
                  <label for="notes_777_jenis_kelamin_pasien" class="form-label">Jenis Kelamin Pasien</label>
                  <input type="text" class="form-control bg-secondary" id="notes_777_jenis_kelamin_pasien" name="notes_777_jenis_kelamin_pasien" value="<?= isset($reg['tanggal_lahir']) ? $reg['tanggal_lahir'] : ''; ?>" readonly>
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
                          <td>Diagnosa</td>
                          <td>
                            TB Paru <b>Anak / Dewasa, Terkonfirmasi Bakteriologis / Klinis / TB Ekstra paru *</b>
                          </td>
                          <td>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="notes_777_paraf_diagnosis2" id="notes_777_paraf_diagnosis2" <?= isset($notes_777['paraf_diagnosis']) ? ($notes_777['paraf_diagnosis'] == 'on' ? 'checked' : '') : ''; ?>>
                              <input type="hidden" name="notes_777_paraf_diagnosis" id="notes_777_paraf_diagnosis" value="<?= isset($notes_777['paraf_diagnosis']) ? $notes_777['paraf_diagnosis'] : ''; ?>">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>2. </td>
                          <td>Dasar Diagnosa</td>
                          <td>Anamnesa, Pemeriksaan Klinis, Penunjang (BTA/TCM/Rontgen/PA)</td>
                          <td>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="notes_777_paraf_dasar_diagnosis2" id="notes_777_paraf_dasar_diagnosis2" <?= isset($notes_777['paraf_dasar_diagnosis']) ? ($notes_777['paraf_dasar_diagnosis'] == 'on' ? 'checked' : '') : ''; ?>>
                              <input type="hidden" name="notes_777_paraf_dasar_diagnosis" id="notes_777_paraf_dasar_diagnosis" value="<?= isset($notes_777['paraf_dasar_diagnosis']) ? $notes_777['paraf_dasar_diagnosis'] : ''; ?>">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>3. </td>
                          <td>Tindakan Kedokteran/td>
                          <td>Pemberian OAT <b>Kategori Anak / Kat. 1/ Kat. 2*</b></td>
                          <td>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="notes_777_paraf_tindakan_kedokteran2" id="notes_777_paraf_tindakan_kedokteran2" <?= isset($notes_777['paraf_tindakan_kedokteran']) ? ($notes_777['paraf_tindakan_kedokteran'] == 'on' ? 'checked' : '') : ''; ?>>
                              <input type="hidden" name="notes_777_paraf_tindakan_kedokteran" id="notes_777_paraf_tindakan_kedokteran" value="<?= isset($notes_777['paraf_tindakan_kedokteran']) ? $notes_777['paraf_tindakan_kedokteran'] : ''; ?>">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>4. </td>
                          <td>Indikasi Tindakan</td>
                          <td>Pemotongan saluran Indung telur</td>
                          <td>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="notes_777_paraf_indikasi_tindakan2" id="notes_777_paraf_indikasi_tindakan2" <?= isset($notes_777['paraf_indikasi_tindakan']) ? ($notes_777['paraf_indikasi_tindakan'] == 'on' ? 'checked' : '') : ''; ?>>
                              <input type="hidden" name="notes_777_paraf_indikasi_tindakan" id="notes_777_paraf_indikasi_tindakan" value="<?= isset($notes_777['paraf_indikasi_tindakan']) ? $notes_777['paraf_indikasi_tindakan'] : ''; ?>">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>5. </td>
                          <td>Tata Cara</td>
                          <td>Sesuai SOP Pengobatan Tuberkolosis Anak/Dewasa</td>
                          <td>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="notes_777_paraf_tatacara2" id="notes_777_paraf_tatacara2" <?= isset($notes_777['paraf_tatacara']) ? ($notes_777['paraf_tatacara'] == 'on' ? 'checked' : '') : ''; ?>>
                              <input type="hidden" name="notes_777_paraf_tatacara" id="notes_777_paraf_tatacara" value="<?= isset($notes_777['paraf_tatacara']) ? $notes_777['paraf_tatacara'] : ''; ?>">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>6. </td>
                          <td>Tujuan</td>
                          <td>
                            <ul>
                              <li>Menyembuhkan, mengembalikan kualitas hidup dan produktivitas pasien</li>
                              <li>Mencegah kematian akibat TBC</li>
                              <li>Mencegah kekambuhan TB</li>
                              <li>Mengurangi penularan TB kepada orang lain</li>
                              <li>Mencegah terjadinya resistensi obat dan penularan</li>
                            </ul>
                          </td>
                          <td>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="notes_777_paraf_tujuan2" id="notes_777_paraf_tujuan2" <?= isset($notes_777['paraf_tujuan']) ? ($notes_777['paraf_tujuan'] == 'on' ? 'checked' : '') : ''; ?>>
                              <input type="hidden" name="notes_777_paraf_tujuan" id="notes_777_paraf_tujuan" value="<?= isset($notes_777['paraf_tujuan']) ? $notes_777['paraf_tujuan'] : ''; ?>">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>7. </td>
                          <td>Resiko</td>
                          <td>Kuman kebal obat jika pasien tidak patuh minum obat</td>
                          <td>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="notes_777_paraf_resiko2" id="notes_777_paraf_resiko2" <?= isset($notes_777['paraf_resiko']) ? ($notes_777['paraf_resiko'] == 'on' ? 'checked' : '') : ''; ?>>
                              <input type="hidden" name="notes_777_paraf_resiko" id="notes_777_paraf_resiko" value="<?= isset($notes_777['paraf_resiko']) ? $notes_777['paraf_resiko'] : ''; ?>">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>8. </td>
                          <td>Komplikasi</td>
                          <td>
                            Efek samping obat yang bisa terjadi seperti : mual, muntah, nyeri sendi, gatal-gatal, warna kemerahan pada air kencing, gangguan pencernaan, pusing.
                          </td>
                          <td>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="notes_777_paraf_komplikasi2" id="notes_777_paraf_komplikasi2" <?= isset($notes_777['paraf_komplikasi']) ? ($notes_777['paraf_komplikasi'] == 'on' ? 'checked' : '') : ''; ?>>
                              <input type="hidden" name="notes_777_paraf_komplikasi" id="notes_777_paraf_komplikasi" value="<?= isset($notes_777['paraf_komplikasi']) ? $notes_777['paraf_komplikasi'] : ''; ?>">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>9. </td>
                          <td>Prognosis</td>
                          <td><b>Bahan / Dubia ad bonam / Dubia ad malam*</b></td>
                          <td>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="notes_777_paraf_resiko_prognosis2" id="notes_777_paraf_resiko_prognosis2" <?= isset($notes_777['paraf_resiko_prognosis']) ? ($notes_777['paraf_resiko_prognosis'] == 'on' ? 'checked' : '') : ''; ?>>
                              <input type="hidden" name="notes_777_paraf_resiko_prognosis" id="notes_777_paraf_resiko_prognosis" value="<?= isset($notes_777['paraf_resiko_prognosis']) ? $notes_777['paraf_resiko_prognosis'] : ''; ?>">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>10. </td>
                          <td>Alternatif dan Resiko</td>
                          <td>
                            Bila tidak diobati prognosis makin memburuk dan dapat menularkan ke orang lain 
                          </td>
                          <td>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="notes_777_paraf_alternatif2" id="notes_777_paraf_alternatif2" <?= isset($notes_777['paraf_alternatif']) ? ($notes_777['paraf_alternatif'] == 'on' ? 'checked' : '') : ''; ?>>
                              <input type="hidden" name="notes_777_paraf_alternatif" id="notes_777_paraf_alternatif" value="<?= isset($notes_777['paraf_alternatif']) ? $notes_777['paraf_alternatif'] : ''; ?>">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>11. </td>
                          <td>Lain-lain</td>
                          <td>
                            <ul>
                              <li>Investigasi kontak akan dilakukan oleh petugas puskesmas atau kader TB wilayah setempat</li>
                              <li>Bila tidak mengembil obat dalam 2x24 jam bersedia untuk dilakukan kunjungan rumah / pelacakan</li>
                            </ul>
                          </td>
                          <td>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="notes_777_paraf_lain_lain2" id="notes_777_paraf_lain_lain2" <?= isset($notes_777['paraf_lain_lain']) ? ($notes_777['paraf_lain_lain'] == 'on' ? 'checked' : '') : ''; ?>>
                              <input type="hidden" name="notes_777_paraf_lain_lain" id="notes_777_paraf_lain_lain" value="<?= isset($notes_777['paraf_lain_lain']) ? $notes_777['paraf_lain_lain'] : ''; ?>">
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
              <div class="col-lg-6 col-sm-12">
              </div>
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row">
                  <label for="notes_777_nama_saksi" class="form-label">Nama Saksi</label>
                  <input type="text" class="form-control" id="notes_777_nama_saksi" name="notes_777_nama_saksi" value="<?= isset($notes_777['nama_saksi']) ? $notes_777['nama_saksi'] : ''; ?>">
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-sm-6">
                <div class="fv-row">
                  <label for="notes_777_ttd_pasien" class="form-label text-primary">TTD Pasien</label>
                  <div class="col-md-12" id="signature_pad">
                    <canvas class="border border-gray-500" id="notes_777_ttd_pasien">
                  </div>
                  <div style="width: 100%" id="signature_pad">
                    <button class="btn btn-sm btn-secondary" id="clear_notes_777_ttd_pasien">Clear</button>
                    <button class="btn btn-sm btn-secondary" id="undo_notes_777_ttd_pasien">Undo</button>
                  </div>
                  <input type="hidden" name="notes_777_ttd_pasien" value="<?= isset($notes_777['ttd_pasien']) ? $notes_777['ttd_pasien'] : ''; ?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="fv-row">
                  <label for="notes_777_ttd_saksi" class="form-label text-primary">TTD Saksi</label>
                  <div class="col-md-12" id="signature_pad">
                    <canvas class="border border-gray-500" id="notes_777_ttd_saksi">
                  </div>
                  <div style="width: 100%" id="signature_pad">
                    <button class="btn btn-sm btn-secondary" id="clear_notes_777_ttd_saksi">Clear</button>
                    <button class="btn btn-sm btn-secondary" id="undo_notes_777_ttd_saksi">Undo</button>
                  </div>
                  <input type="hidden" name="notes_777_ttd_saksi" value="<?= isset($notes_777['ttd_saksi']) ? $notes_777['ttd_saksi'] : ''; ?>">
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="card-footer">
        <!-- <button type="reset" class="btn btn-light me-2 float-start">Reset</button> -->

        <?php if (!empty($notes)) : ?>
          <button type="button" class="btn btn-danger me-2 float-start" id="delete_777" href="<?= base_url($this->_class . '/delete_process/' . $token_form) ?>">Hapus</button>
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