<?php if (empty($is_tab)): ?>

<div id="kt_app_content" class="app-content flex-column-fluid">
  <div id="kt_app_content_container" class="app-container container-xxl">
  <?php endif; ?>

  <?php
  if (!empty($notes)) {
    $notes_138 = $notes[0]['json_data']['notes'];

    $token_form = $token_data;
    $token_form['id_notes'] = $notes[0]['id'];
    $token_form = $this->app_encryption->encrypt_id(json_encode($token_form));
  } else {
    $token_form = $token;
  }
  ?>
  <form class="form w-100" novalidate="novalidate" id="form_138" data-is_tab="<?= !empty($is_tab) ? $is_tab : null; ?>" href="<?= base_url($this->_class . '/form_process/' . $token_form) ?>" action="#">

    <input type="hidden" id="csrf_token_hash_138" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">

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
                  <label for="notes_138_status_pemberi_pernyataan_0" class="form-label">Status Pemberi Pernyataan</label>
                  <div>
                    <div role="group" aria-label="Basic radio toggle button group">
                      <input type="radio" class="btn-check" name="notes_138_status_pemberi_pernyataan" id="notes_138_status_pemberi_pernyataan_0" value="Pasien" autocomplete="off" <?= !empty($notes_138) && $notes_138['status_pemberi_pernyataan'] == 'Pasien' ? 'checked' : ''; ?>>
                      <label class="btn btn-sm btn-light btn-active-primary" for="notes_138_status_pemberi_pernyataan_0">Pasien</label>

                      <input type="radio" class="btn-check" name="notes_138_status_pemberi_pernyataan" id="notes_138_status_pemberi_pernyataan_1" value="Orang Tua" autocomplete="off" <?= !empty($notes_138) && $notes_138['status_pemberi_pernyataan'] == 'Orang Tua' ? 'checked' : ''; ?>>
                      <label class="btn btn-sm btn-light btn-active-primary" for="notes_138_status_pemberi_pernyataan_1">Orang Tua</label>

                      <input type="radio" class="btn-check" name="notes_138_status_pemberi_pernyataan" id="notes_138_status_pemberi_pernyataan_2" value="Suami" autocomplete="off" <?= !empty($notes_138) && $notes_138['status_pemberi_pernyataan'] == 'Suami' ? 'checked' : ''; ?>>
                      <label class="btn btn-sm btn-light btn-active-primary" for="notes_138_status_pemberi_pernyataan_2">Suami</label>

                      <input type="radio" class="btn-check" name="notes_138_status_pemberi_pernyataan" id="notes_138_status_pemberi_pernyataan_3" value="Istri" autocomplete="off" <?= !empty($notes_138) && $notes_138['status_pemberi_pernyataan'] == 'Istri' ? 'checked' : ''; ?>>
                      <label class="btn btn-sm btn-light btn-active-primary" for="notes_138_status_pemberi_pernyataan_3">Istri</label>

                      <input type="radio" class="btn-check" name="notes_138_status_pemberi_pernyataan" id="notes_138_status_pemberi_pernyataan_4" value="Anak" autocomplete="off" <?= !empty($notes_138) && $notes_138['status_pemberi_pernyataan'] == 'Anak' ? 'checked' : ''; ?>>
                      <label class="btn btn-sm btn-light btn-active-primary" for="notes_138_status_pemberi_pernyataan_4">Anak</label>

                      <input type="radio" class="btn-check" name="notes_138_status_pemberi_pernyataan" id="notes_138_status_pemberi_pernyataan_5" value="Wali" autocomplete="off" <?= !empty($notes_138) && $notes_138['status_pemberi_pernyataan'] == 'Wali' ? 'checked' : ''; ?>>
                      <label class="btn btn-sm btn-light btn-active-primary" for="notes_138_status_pemberi_pernyataan_5">Wali</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row mb-5" style="<?= !empty($notes_138) && $notes_138['status_pemberi_pernyataan'] == 'Pasien' ? 'display: none;' : ''; ?>">
                  <label for="notes_138_nama_pemberi_pernyataan" class="form-label">Nama Pemberi Pernyataan</label>
                  <input type="text" class="form-control" id="notes_138_nama_pemberi_pernyataan" name="notes_138_nama_pemberi_pernyataan" value="<?= isset($notes_138['nama_pemberi_pernyataan']) ? $notes_138['nama_pemberi_pernyataan'] : ''; ?>">
                </div>

                <div class="fv-row mb-5" style="<?= !empty($notes_138) && $notes_138['status_pemberi_pernyataan'] == 'Pasien' ? 'display: none;' : ''; ?>">
                  <label for="notes_138_telpon_pemberi_pernyataan" class="form-label">Telpon Pemberi Pernyataan</label>
                  <input type="text" class="form-control" id="notes_138_telpon_pemberi_pernyataan" name="notes_138_telpon_pemberi_pernyataan" value="<?= isset($notes_138['telpon_pemberi_pernyataan']) ? $notes_138['telpon_pemberi_pernyataan'] : ''; ?>">
                </div>
              </div>
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row mb-5" style="<?= !empty($notes_138) && $notes_138['status_pemberi_pernyataan'] == 'Pasien' ? 'display: none;' : ''; ?>">
                  <label for="notes_138_umur_pemberi_pernyataan" class="form-label">Umur Pemberi Pernyataan</label>
                  <input type="text" class="form-control" id="notes_138_umur_pemberi_pernyataan" name="notes_138_umur_pemberi_pernyataan" value="<?= isset($notes_138['umur_pemberi_pernyataan']) ? $notes_138['umur_pemberi_pernyataan'] : ''; ?>">
                </div>

                <div class="fv-row mb-5" style="<?= !empty($notes_138) && $notes_138['status_pemberi_pernyataan'] == 'Pasien' ? 'display: none;' : ''; ?>">
                  <label for="notes_138_alamat_pemberi_pernyataan" class="form-label">Alamat Pemberi Pernyataan</label>
                  <textarea class="form-control" id="notes_138_alamat_pemberi_pernyataan" name="notes_138_alamat_pemberi_pernyataan"><?= isset($notes_138['alamat_pemberi_pernyataan']) ? ($notes_138['alamat_pemberi_pernyataan']) : ''; ?></textarea>
                </div>
              </div>
            </div>
              

            <div class="row mt-4">
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row mb-5">
                  <label for="notes_138_nama_pasien" class="form-label">Nama Pasien</label>
                  <input type="text" class="form-control bg-secondary" id="notes_138_nama_pasien" name="notes_138_nama_pasien" value="<?= isset($reg['nama_pasien']) ? $reg['nama_pasien'] : ''; ?>" readonly>
                </div>
              </div>
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row">
                  <label for="notes_138_umur_pasien" class="form-label">Umur Pasien</label>
                  <input type="text" class="form-control bg-secondary" id="notes_138_umur_pasien" name="notes_138_umur_pasien" value="<?= isset($reg['umur']) ? $reg['umur'] : ''; ?>" readonly>
                </div>
              </div>
            </div>

            <div class="row mt-4">
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row">
                  <label for="notes_138_no_rm_pasien" class="form-label">No. Rekam Medis</label>
                  <input type="text" class="form-control bg-secondary" id="notes_138_no_rm_pasien" name="notes_138_no_rm_pasien" value="<?= isset($reg['no_rm']) ? $reg['no_rm'] : ''; ?>" readonly>
                </div>
              </div>
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row mb-5">
                  <label for="notes_138_pembiusan" class="form-label">Pembiusan</label>
                  <select name="notes_138_pembiusan" id="notes_138_pembiusan" class="form-select" aria-label="Select example">
                    <option value="" <?= isset($notes_138['pembiusan']) ? ($notes_138['pembiusan'] == "" ? 'selected' : '' ): ''; ?>>Pilih Pembiusan</option>
                    <option value="umum" <?= isset($notes_138['pembiusan']) ? ($notes_138['pembiusan'] == "umum" ? 'selected' : '' ): ''; ?>>Umum</option>
                    <option value="lokal" <?= isset($notes_138['pembiusan']) ? ($notes_138['pembiusan'] == "lokal" ? 'selected' : '' ): ''; ?>>Lokal</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="separator my-5"></div>

            <div class="row mt-4">
              <div class="col-lg-6 col-sm-12">
              </div>
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row">
                  <label for="notes_138_nama_saksi" class="form-label">Nama Saksi</label>
                  <input type="text" class="form-control" id="notes_138_nama_saksi" name="notes_138_nama_saksi" value="<?= isset($notes_138['nama_saksi']) ? $notes_138['nama_saksi'] : ''; ?>">
                </div>
              </div>
            </div>


            <div class="row mt-4">
              <div class="col-sm-6">
                <div class="fv-row">
                  <label for="notes_138_ttd_pasien" class="form-label text-primary">TTD Pasien</label>
                  <div class="col-md-12" id="signature_pad">
                    <canvas class="border border-gray-500" id="notes_138_ttd_pasien">
                  </div>
                  <div style="width: 100%" id="signature_pad">
                    <button class="btn btn-sm btn-secondary" id="clear_notes_138_ttd_pasien">Clear</button>
                    <button class="btn btn-sm btn-secondary" id="undo_notes_138_ttd_pasien">Undo</button>
                  </div>
                  <input type="hidden" name="notes_138_ttd_pasien" value="<?= isset($notes_138['ttd_pasien']) ? $notes_138['ttd_pasien'] : ''; ?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="fv-row">
                  <label for="notes_138_ttd_saksi" class="form-label text-primary">TTD Saksi</label>
                  <div class="col-md-12" id="signature_pad">
                    <canvas class="border border-gray-500" id="notes_138_ttd_saksi">
                  </div>
                  <div style="width: 100%" id="signature_pad">
                    <button class="btn btn-sm btn-secondary" id="clear_notes_138_ttd_saksi">Clear</button>
                    <button class="btn btn-sm btn-secondary" id="undo_notes_138_ttd_saksi">Undo</button>
                  </div>
                  <input type="hidden" name="notes_138_ttd_saksi" value="<?= isset($notes_138['ttd_saksi']) ? $notes_138['ttd_saksi'] : ''; ?>">
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="card-footer">
        <!-- <button type="reset" class="btn btn-light me-2 float-start">Reset</button> -->

        <?php if (!empty($notes)) : ?>
          <button type="button" class="btn btn-danger me-2 float-start" id="delete_138" href="<?= base_url($this->_class . '/delete_process/' . $token_form) ?>">Hapus</button>
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