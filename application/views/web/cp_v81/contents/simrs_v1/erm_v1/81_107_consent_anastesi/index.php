<?php if (empty($is_tab)): ?>

<div id="kt_app_content" class="app-content flex-column-fluid">
  <div id="kt_app_content_container" class="app-container container-xxl">
  <?php endif; ?>

  <?php
  if (!empty($notes)) {
    $notes_107 = $notes[0]['json_data']['notes'];

    $token_form = $token_data;
    $token_form['id_notes'] = $notes[0]['id'];
    $token_form = $this->app_encryption->encrypt_id(json_encode($token_form));
  } else {
    $token_form = $token;
  }
  ?>
  <form class="form w-100" novalidate="novalidate" id="form_107" data-is_tab="<?= !empty($is_tab) ? $is_tab : null; ?>" href="<?= base_url($this->_class . '/form_process/' . $token_form) ?>" action="#">

    <input type="hidden" id="csrf_token_hash_107" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">

    <div class="card h-100">
      <div class="card-header bg-primary">
        <div class="col-8 pt-3">
          <h3 class="float-start mt-5 text-white courier"><?= $ref['kode_form']." ".$ref['nama_form']; ?></h3>
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
                  <label for="notes_107_status_pemberi_pernyataan_0" class="form-label">Status Pemberi Pernyataan</label>
                  <div>
                    <div role="group" aria-label="Basic radio toggle button group">
                      <input type="radio" class="btn-check" name="notes_107_status_pemberi_pernyataan" id="notes_107_status_pemberi_pernyataan_0" value="Pasien" autocomplete="off" <?= !empty($notes_107) && $notes_107['status_pemberi_pernyataan'] == 'Pasien' ? 'checked' : ''; ?>>
                      <label class="btn btn-sm btn-light btn-active-primary" for="notes_107_status_pemberi_pernyataan_0">Pasien</label>

                      <input type="radio" class="btn-check" name="notes_107_status_pemberi_pernyataan" id="notes_107_status_pemberi_pernyataan_1" value="Orang Tua" autocomplete="off" <?= !empty($notes_107) && $notes_107['status_pemberi_pernyataan'] == 'Orang Tua' ? 'checked' : ''; ?>>
                      <label class="btn btn-sm btn-light btn-active-primary" for="notes_107_status_pemberi_pernyataan_1">Orang Tua</label>

                      <input type="radio" class="btn-check" name="notes_107_status_pemberi_pernyataan" id="notes_107_status_pemberi_pernyataan_2" value="Suami" autocomplete="off" <?= !empty($notes_107) && $notes_107['status_pemberi_pernyataan'] == 'Suami' ? 'checked' : ''; ?>>
                      <label class="btn btn-sm btn-light btn-active-primary" for="notes_107_status_pemberi_pernyataan_2">Suami</label>

                      <input type="radio" class="btn-check" name="notes_107_status_pemberi_pernyataan" id="notes_107_status_pemberi_pernyataan_3" value="Istri" autocomplete="off" <?= !empty($notes_107) && $notes_107['status_pemberi_pernyataan'] == 'Istri' ? 'checked' : ''; ?>>
                      <label class="btn btn-sm btn-light btn-active-primary" for="notes_107_status_pemberi_pernyataan_3">Istri</label>

                      <input type="radio" class="btn-check" name="notes_107_status_pemberi_pernyataan" id="notes_107_status_pemberi_pernyataan_4" value="Anak" autocomplete="off" <?= !empty($notes_107) && $notes_107['status_pemberi_pernyataan'] == 'Anak' ? 'checked' : ''; ?>>
                      <label class="btn btn-sm btn-light btn-active-primary" for="notes_107_status_pemberi_pernyataan_4">Anak</label>

                      <input type="radio" class="btn-check" name="notes_107_status_pemberi_pernyataan" id="notes_107_status_pemberi_pernyataan_5" value="Wali" autocomplete="off" <?= !empty($notes_107) && $notes_107['status_pemberi_pernyataan'] == 'Wali' ? 'checked' : ''; ?>>
                      <label class="btn btn-sm btn-light btn-active-primary" for="notes_107_status_pemberi_pernyataan_5">Wali</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row mb-5" style="<?= !empty($notes_107) && $notes_107['status_pemberi_pernyataan'] == 'Pasien' ? 'display: none;' : ''; ?>">
                  <label for="notes_107_nama_pemberi_pernyataan" class="form-label">Nama Pemberi Pernyataan</label>
                  <input type="text" class="form-control" id="notes_107_nama_pemberi_pernyataan" name="notes_107_nama_pemberi_pernyataan" value="<?= isset($notes_107['nama_pemberi_pernyataan']) ? $notes_107['nama_pemberi_pernyataan'] : ''; ?>">
                </div>

                <div class="fv-row mb-5" style="<?= !empty($notes_107) && $notes_107['status_pemberi_pernyataan'] == 'Pasien' ? 'display: none;' : ''; ?>">
                  <label for="notes_107_telpon_pemberi_pernyataan" class="form-label">Telpon Pemberi Pernyataan</label>
                  <input type="text" class="form-control" id="notes_107_telpon_pemberi_pernyataan" name="notes_107_telpon_pemberi_pernyataan" value="<?= isset($notes_107['telpon_pemberi_pernyataan']) ? $notes_107['telpon_pemberi_pernyataan'] : ''; ?>">
                </div>
              </div>
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row mb-5" style="<?= !empty($notes_107) && $notes_107['status_pemberi_pernyataan'] == 'Pasien' ? 'display: none;' : ''; ?>">
                  <label for="notes_107_umur_pemberi_pernyataan" class="form-label">Umur Pemberi Pernyataan</label>
                  <input type="text" class="form-control" id="notes_107_umur_pemberi_pernyataan" name="notes_107_umur_pemberi_pernyataan" value="<?= isset($notes_107['umur_pemberi_pernyataan']) ? $notes_107['umur_pemberi_pernyataan'] : ''; ?>">
                </div>

                <div class="fv-row mb-5" style="<?= !empty($notes_107) && $notes_107['status_pemberi_pernyataan'] == 'Pasien' ? 'display: none;' : ''; ?>">
                  <label for="notes_107_alamat_pemberi_pernyataan" class="form-label">Alamat Pemberi Pernyataan</label>
                  <textarea class="form-control" id="notes_107_alamat_pemberi_pernyataan" name="notes_107_alamat_pemberi_pernyataan"><?= isset($notes_107['alamat_pemberi_pernyataan']) ? ($notes_107['alamat_pemberi_pernyataan']) : ''; ?></textarea>
                </div>
              </div>
            </div>

            <div class="row mt-4">
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row mb-5">
                  <label for="notes_107_nama_pasien" class="form-label">Nama Pasien</label>
                  <input type="text" class="form-control bg-secondary" id="notes_107_nama_pasien" name="notes_107_nama_pasien" value="<?= isset($reg['nama_pasien']) ? $reg['nama_pasien'] : ''; ?>" readonly>
                </div>
              </div>
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row">
                  <label for="notes_107_umur_pasien" class="form-label">Umur Pasien</label>
                  <input type="text" class="form-control bg-secondary" id="notes_107_umur_pasien" name="notes_107_umur_pasien" value="<?= isset($reg['umur']) ? $reg['umur'] : ''; ?>" readonly>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row">
                  <label for="notes_107_tanggal_lahir_pasien" class="form-label">Tangal Lahir Pasien</label>
                  <input type="text" class="form-control bg-secondary" id="notes_107_tanggal_lahir_pasien" name="notes_107_tanggal_lahir_pasien" value="<?= isset($reg['tanggal_lahir']) ? $reg['tanggal_lahir'] : ''; ?>" readonly>
                </div>
              </div>
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row">
                  <label for="notes_107_no_rm_pasien" class="form-label">No RM</label>
                  <input type="text" class="form-control bg-secondary" id="notes_107_no_rm_pasien" name="notes_107_no_rm_pasien" value="<?= isset($reg['no_rm']) ? $reg['no_rm'] : ''; ?>" readonly>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row">
                  <label for="notes_107_dokter_anestesi_pasien" class="form-label">Dokter Anestesi</label>
                  <input type="text" class="form-control" id="notes_107_dokter_anestesi_pasien" name="notes_107_dokter_anestesi_pasien" value="<?= isset($notes_107['dokter_anestesi_pasien']) ? $notes_107['dokter_anestesi_pasien'] : ''; ?>">
                </div>
              </div>
            
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row">
                  <label for="notes_107_teknik_pembiusan_pasien" class="form-label">Teknik Pembiusan</label>
                  <select name="notes_107_teknik_pembiusan_pasien" id="notes_107_teknik_pembiusan_pasien" class="form-select" aria-label="Select example">
                    <option value="" <?= isset($notes_107['teknik_pembiusan_pasien']) ? ($notes_107['teknik_pembiusan_pasien'] == "" ? 'selected' : '' ): ''; ?> >Pilih Teknik Pembiusan</option>
                    <option value="Pembiusan Umum" <?= isset($notes_107['teknik_pembiusan_pasien']) ? ($notes_107['teknik_pembiusan_pasien'] == "Pembiusan Umum" ? 'selected' : '' ): ''; ?>>Pembiusan Umum</option>
                    <option value="Spiral atau Epidural Analgesi/Anestesi" <?= isset($notes_107['teknik_pembiusan_pasien']) ? ($notes_107['teknik_pembiusan_pasien'] == "Spiral atau Epidural Analgesi/Anestesi" ? 'selected' : '' ): ''; ?>>Spiral atau Epidural Analgesi/Anestesi</option>
                    <option value="Never Block" <?= isset($notes_107['teknik_pembiusan_pasien']) ? ($notes_107['teknik_pembiusan_pasien'] == "Never Block" ? 'selected' : '' ): ''; ?>>Never Block</option>
                    <option value="Monitoring Anesthesia Care (MAC)" <?= isset($notes_107['teknik_pembiusan_pasien']) ? ($notes_107['teknik_pembiusan_pasien'] == "Monitoring Anesthesia Care (MAC)" ? 'selected' : '' ): ''; ?>>Monitoring Anesthesia Care (MAC)</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row">
                  <label for="notes_107_jenis_hipnotik_pasien" class="form-label">Jenis Hipnotik</label>
                  <select name="notes_107_jenis_hipnotik_pasien" id="notes_107_jenis_hipnotik_pasien" class="form-select" aria-label="Select example">
                  <option value="" <?= isset($notes_107['jenis_hipnotik_pasien']) ? ($notes_107['jenis_hipnotik_pasien'] == "" ? 'selected' : '' ): ''; ?>>Pilih Jenis Hipnotik</option>
                    <option value="sedasi" <?= isset($notes_107['jenis_hipnotik_pasien']) ? ($notes_107['jenis_hipnotik_pasien'] == "sedasi" ? 'selected' : '' ): ''; ?>>Sedasi</option>
                    <option value="tanpa_sedasi" <?= isset($notes_107['jenis_hipnotik_pasien']) ? ($notes_107['jenis_hipnotik_pasien'] == "tanpa_sedasi" ? 'selected' : '' ): ''; ?>>Tanpa Sedasi</option>
                  </select>
                </div>
              </div>
            </div>
            

            <div class="separator my-5"></div>

            <div class="row mt-4">
              <div class="col-6">
                <div class="fv-row">
                  <label for="notes_107_ttd_pasien" class="form-label text-primary">TTD Pasien</label>
                  <div class="col-md-12" id="signature_pad">
                    <canvas class="border border-gray-500" id="notes_107_ttd_pasien">
                  </div>
                  <div style="width: 100%" id="signature_pad">
                    <button class="btn btn-sm btn-secondary" id="clear_notes_107_ttd_pasien">Clear</button>
                    <button class="btn btn-sm btn-secondary" id="undo_notes_107_ttd_pasien">Undo</button>
                  </div>
                  <input type="hidden" name="notes_107_ttd_pasien" value="<?= isset($notes_107['ttd_pasien']) ? $notes_107['ttd_pasien'] : ''; ?>">
                </div>
              </div>
              <div class="col-6">
                <div class="fv-row">
                  <label for="notes_107_ttd_pemberi_pernyataan" class="form-label text-primary">TTD Pemberi Permyataan </label>
                  <div class="col-md-12" id="signature_pad">
                    <canvas class="border border-gray-500" id="notes_107_ttd_pemberi_pernyataan">
                  </div>
                  <div style="width: 100%" id="signature_pad">
                    <button class="btn btn-sm btn-secondary" id="clear_notes_107_ttd_pemberi_pernyataan">Clear</button>
                    <button class="btn btn-sm btn-secondary" id="undo_notes_107_ttd_pemberi_pernyataan">Undo</button>
                  </div>
                  <input type="hidden" name="notes_107_ttd_pemberi_pernyataan" value="<?= isset($notes_107['ttd_pemberi_pernyataan']) ? $notes_107['ttd_pemberi_pernyataan'] : ''; ?>">
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-12">
                <div id="container-1">
                <?php if (isset($notes_107['ttd_saksi'])) : ?>
                  <?php if (count($notes_107['ttd_saksi']) == 0) : ?>
                  <div class="fv-row row">
                    <label for="notes_107_ttd_saksi" class="form-label text-primary label_notes_107_ttd_saksi">TTD Saksi</label>
                    <div class="col-md-12" id="signature_pad">
                      <canvas class="border border-gray-500" id="notes_107_ttd_saksi_0">
                    </div>
                    <div style="width: 100%" id="signature_pad">
                      <button class="btn btn-sm btn-secondary clear_notes" id="clear_notes_107_ttd_saksi_0">Clear</button>
                      <button class="btn btn-sm btn-secondary undo_notes" id="undo_notes_107_ttd_saksi_0">Undo</button>
                      <button class="btn btn-sm btn-danger delete">Hapus</button>
                    </div>
                    <input type="hidden" name="notes_107_ttd_saksi[0]" class="signature-input">
                  </div>
                <?php else : ?>
                  <?php for ($i=0; $i < count($notes_107['ttd_saksi']); $i++) : ?>
                    <div class="fv-row row">
                      <label for="notes_107_ttd_saksi" class="form-label text-primary label_notes_107_ttd_saksi">TTD Saksi</label>
                      <div class="col-md-12" id="signature_pad">
                        <canvas class="border border-gray-500" id="notes_107_ttd_saksi_<?= $i; ?>">
                      </div>
                      <div style="width: 100%" id="signature_pad">
                        <button class="btn btn-sm btn-secondary clear_notes" id="clear_notes_107_ttd_saksi_<?= $i; ?>">Clear</button>
                        <button class="btn btn-sm btn-secondary undo_notes" id="undo_notes_107_ttd_saksi_<?= $i; ?>">Undo</button>
                        <button class="btn btn-sm btn-danger delete">Hapus</button>
                      </div>
                      <input type="hidden" name="notes_107_ttd_saksi[<?= $i; ?>]" class="signature-input" value="<?= isset($notes_107['ttd_saksi'][$i]) ? $notes_107['ttd_saksi'][$i] : ''; ?>">
                    </div>
                  <?php endfor; ?>
                <?php endif; ?>
                <?php else : ?>
                  <div class="fv-row row">
                    <label for="notes_107_ttd_saksi" class="form-label text-primary label_notes_107_ttd_saksi">TTD Saksi</label>
                    <div class="col-md-12" id="signature_pad">
                      <canvas class="border border-gray-500" id="notes_107_ttd_saksi_0">
                    </div>
                    <div style="width: 100%" id="signature_pad">
                      <button class="btn btn-sm btn-secondary clear_notes" id="clear_notes_107_ttd_saksi_0">Clear</button>
                      <button class="btn btn-sm btn-secondary undo_notes" id="undo_notes_107_ttd_saksi_0">Undo</button>
                      <button class="btn btn-sm btn-danger delete">Hapus</button>
                    </div>
                    <input type="hidden" name="notes_107_ttd_saksi[0]" class="signature-input">
                  </div>
                <?php endif; ?>
                  
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <button type="button" id="addButton-1"class="btn btn-sm btn-primary py-2">
                    TAMBAH
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="card-footer">
        <!-- <button type="reset" class="btn btn-light me-2 float-start">Reset</button> -->

        <?php if (!empty($notes)) : ?>
          <button type="button" class="btn btn-danger me-2 float-start" id="delete_107" href="<?= base_url($this->_class . '/delete_process/' . $token_form) ?>">Hapus</button>
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