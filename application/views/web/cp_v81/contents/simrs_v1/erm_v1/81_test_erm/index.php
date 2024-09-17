<?php if (empty($is_tab)): ?>

<div id="kt_app_content" class="app-content flex-column-fluid">
  <div id="kt_app_content_container" class="app-container container-xxl">
  <?php endif; ?>

  <?php
  if (!empty($notes)) {
    $notes_test = $notes[0]['json_data']['notes'];

    $token_form = $token_data;
    $token_form['id_notes'] = $notes[0]['id'];
    $token_form = $this->app_encryption->encrypt_id(json_encode($token_form));
  } else {
    $token_form = $token;
  }
  ?>
  <form class="form w-100" novalidate="novalidate" id="form_test" data-is_tab="<?= !empty($is_tab) ? $is_tab : null; ?>" href="<?= base_url($this->_class . '/form_process/' . $token_form) ?>" action="#">

    <input type="hidden" id="csrf_token_hash_test" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">

    <div class="card h-100">
      <div class="card-header bg-primary">
        <div class="col-8 pt-3">
          <h3 class="float-start mt-5 text-white courier"><?= $title; ?></h3>
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
                  <label for="notes_test_status_pemberi_pernyataan_0" class="form-label">Status Pemberi Pernyataan</label>
                  <div>
                    <div role="group" aria-label="Basic radio toggle button group">
                      <input type="radio" class="btn-check" name="notes_test_status_pemberi_pernyataan" id="notes_test_status_pemberi_pernyataan_0" value="Pasien" autocomplete="off" <?= !empty($notes_test) && $notes_test['status_pemberi_pernyataan'] == 'Pasien' ? 'checked' : ''; ?>>
                      <label class="btn btn-sm btn-light btn-active-primary" for="notes_test_status_pemberi_pernyataan_0">Pasien</label>

                      <input type="radio" class="btn-check" name="notes_test_status_pemberi_pernyataan" id="notes_test_status_pemberi_pernyataan_1" value="Orang Tua" autocomplete="off" <?= !empty($notes_test) && $notes_test['status_pemberi_pernyataan'] == 'Orang Tua' ? 'checked' : ''; ?>>
                      <label class="btn btn-sm btn-light btn-active-primary" for="notes_test_status_pemberi_pernyataan_1">Orang Tua</label>

                      <input type="radio" class="btn-check" name="notes_test_status_pemberi_pernyataan" id="notes_test_status_pemberi_pernyataan_2" value="Suami" autocomplete="off" <?= !empty($notes_test) && $notes_test['status_pemberi_pernyataan'] == 'Suami' ? 'checked' : ''; ?>>
                      <label class="btn btn-sm btn-light btn-active-primary" for="notes_test_status_pemberi_pernyataan_2">Suami</label>

                      <input type="radio" class="btn-check" name="notes_test_status_pemberi_pernyataan" id="notes_test_status_pemberi_pernyataan_3" value="Istri" autocomplete="off" <?= !empty($notes_test) && $notes_test['status_pemberi_pernyataan'] == 'Istri' ? 'checked' : ''; ?>>
                      <label class="btn btn-sm btn-light btn-active-primary" for="notes_test_status_pemberi_pernyataan_3">Istri</label>

                      <input type="radio" class="btn-check" name="notes_test_status_pemberi_pernyataan" id="notes_test_status_pemberi_pernyataan_4" value="Anak" autocomplete="off" <?= !empty($notes_test) && $notes_test['status_pemberi_pernyataan'] == 'Anak' ? 'checked' : ''; ?>>
                      <label class="btn btn-sm btn-light btn-active-primary" for="notes_test_status_pemberi_pernyataan_4">Anak</label>

                      <input type="radio" class="btn-check" name="notes_test_status_pemberi_pernyataan" id="notes_test_status_pemberi_pernyataan_5" value="Wali" autocomplete="off" <?= !empty($notes_test) && $notes_test['status_pemberi_pernyataan'] == 'Wali' ? 'checked' : ''; ?>>
                      <label class="btn btn-sm btn-light btn-active-primary" for="notes_test_status_pemberi_pernyataan_5">Wali</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row mb-5" style="<?= !empty($notes_test) && $notes_test['status_pemberi_pernyataan'] == 'Pasien' ? 'display: none;' : ''; ?>">
                  <label for="notes_test_nama_pemberi_pernyataan" class="form-label">Nama Pemberi Pernyataan</label>
                  <input type="text" class="form-control" id="notes_test_nama_pemberi_pernyataan" name="notes_test_nama_pemberi_pernyataan" value="<?= isset($notes_test['nama_pemberi_pernyataan']) ? $notes_test['nama_pemberi_pernyataan'] : ''; ?>">
                </div>

                <div class="fv-row mb-5" style="<?= !empty($notes_test) && $notes_test['status_pemberi_pernyataan'] == 'Pasien' ? 'display: none;' : ''; ?>">
                  <label for="notes_test_telpon_pemberi_pernyataan" class="form-label">Telpon Pemberi Pernyataan</label>
                  <input type="text" class="form-control" id="notes_test_telpon_pemberi_pernyataan" name="notes_test_telpon_pemberi_pernyataan" value="<?= isset($notes_test['telpon_pemberi_pernyataan']) ? $notes_test['telpon_pemberi_pernyataan'] : ''; ?>">
                </div>
              </div>
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row mb-5" style="<?= !empty($notes_test) && $notes_test['status_pemberi_pernyataan'] == 'Pasien' ? 'display: none;' : ''; ?>">
                  <label for="notes_test_tgl_lahir_pemberi_pernyataan" class="form-label">Tanggal Lahir Pernyataan</label>
                  <input type="date" class="form-control" id="notes_test_tgl_lahir_pemberi_pernyataan" name="notes_test_tgl_lahir_pemberi_pernyataan" value="<?= isset($notes_test['tgl_lahir_pemberi_pernyataan']) ? $notes_test['tgl_lahir_pemberi_pernyataan'] : ''; ?>">
                </div>

                <div class="fv-row mb-5" style="<?= !empty($notes_test) && $notes_test['status_pemberi_pernyataan'] == 'Pasien' ? 'display: none;' : ''; ?>">
                  <label for="notes_test_jenis_kelamin_pemberi_pernyataan" class="form-label">Jenis Kelamin</label>
                  <select name="notes_test_jenis_kelamin_pemberi_pernyataan" id="notes_test_jenis_kelamin_pemberi_pernyataan" class="form-select" aria-label="Select example">
                    <option value="" <?= isset($notes_test['jenis_kelamin_pemberi_pernyataan']) ? ($notes_test['jenis_kelamin_pemberi_pernyataan'] == "" ? 'selected' : '' ): ''; ?>>Pilih Jenis Kelamin</option>
                    <option value="l" <?= isset($notes_test['jenis_kelamin_pemberi_pernyataan']) ? ($notes_test['jenis_kelamin_pemberi_pernyataan'] == "1" ? 'selected' : '' ): ''; ?>>Laki-laki</option>
                    <option value="p" <?= isset($notes_test['jenis_kelamin_pemberi_pernyataan']) ? ($notes_test['jenis_kelamin_pemberi_pernyataan'] == "p" ? 'selected' : '' ): ''; ?>>Perempuan</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row mt-4">
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row mb-5">
                  <label for="notes_test_nama_pasien" class="form-label">Nama Pasien</label>
                  <input type="text" class="form-control bg-secondary" id="notes_test_nama_pasien" name="notes_test_nama_pasien" value="<?= isset($reg['nama_pasien']) ? $reg['nama_pasien'] : ''; ?>" readonly>
                </div>
              </div>
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row">
                  <label for="notes_test_tgl_lahir_pasien" class="form-label">Tanggal Lahir Pasien</label>
                  <input type="text" class="form-control bg-secondary" id="notes_test_tgl_lahir_pasien" name="notes_test_tgl_lahir_pasien" value="<?= isset($reg['tanggal_lahir']) ? $reg['tanggal_lahir'] : ''; ?>" readonly>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row mb-5">
                  <label for="notes_test_jenis_kelamin_pasien" class="form-label">Jenis Kelamin</label>
                  <select name="notes_test_jenis_kelamin_pasien" id="notes_test_jenis_kelamin_pasien" class="form-select" aria-label="Select example" disabled>
                    <option value="" <?= isset($reg['kelamin']) ? ($reg['kelamin'] == "" ? 'selected' : '' ): ''; ?>>Pilih Jenis Kelamin</option>
                    <option value="l" <?= isset($reg['kelamin']) ? ($reg['kelamin'] == "Laki-laki" ? 'selected' : '' ): ''; ?>>Laki-laki</option>
                    <option value="p" <?= isset($reg['kelamin']) ? ($reg['kelamin'] == "Perempuan" ? 'selected' : '' ): ''; ?>>Perempuan</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="separator my-5"></div>

            <div class="row mt-4">
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row">
                  <label for="notes_test_prognosa" class="form-label text-primary">Alasan Pulang</label>
                  <textarea class="form-control" id="notes_test_prognosa" name="notes_test_prognosa"><?= isset($notes_test['prognosa']) ? ($notes_test['prognosa']) : ''; ?></textarea>
                </div>
              </div>
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row">
                  <label for="notes_test_instruksi_pulang" class="form-label text-primary">Instruksi Pulang</label>
                  <textarea class="form-control" id="notes_test_instruksi_pulang" name="notes_test_instruksi_pulang"><?= isset($notes_test['instruksi_pulang']) ? ($notes_test['instruksi_pulang']) : ''; ?></textarea>
                </div>
              </div>
            </div>

            <div class="row mt-4">
              <div class="col-12">
                <div class="fv-row">
                  <label for="notes_test_ttd_pasien" class="form-label text-primary">TTD Pasien</label>
                  <div class="col-md-12" id="signature_pad">
                    <canvas class="border border-gray-500" id="notes_test_ttd_pasien">
                  </div>
                  <div style="width: 100%" id="signature_pad">
                    <button class="btn btn-sm btn-secondary" id="clear_notes_test_ttd_pasien">Clear</button>
                    <button class="btn btn-sm btn-secondary" id="undo_notes_test_ttd_pasien">Undo</button>
                  </div>
                  <input type="hidden" name="notes_test_ttd_pasien" value="<?= isset($notes_test['ttd_pasien']) ? $notes_test['ttd_pasien'] : ''; ?>">
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="card-footer">
        <!-- <button type="reset" class="btn btn-light me-2 float-start">Reset</button> -->

        <?php if (!empty($notes)) : ?>
          <button type="button" class="btn btn-danger me-2 float-start" id="delete_test" href="<?= base_url($this->_class . '/delete_process/' . $token_form) ?>">Hapus</button>
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