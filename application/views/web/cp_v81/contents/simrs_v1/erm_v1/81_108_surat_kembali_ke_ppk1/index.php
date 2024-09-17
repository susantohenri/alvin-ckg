<?php if (empty($is_tab)): ?>

<div id="kt_app_content" class="app-content flex-column-fluid">
  <div id="kt_app_content_container" class="app-container container-xxl">
  <?php endif; ?>

  <?php
  if (!empty($notes)) {
    $notes_108 = $notes[0]['json_data']['notes'];

    $token_form = $token_data;
    $token_form['id_notes'] = $notes[0]['id'];
    $token_form = $this->app_encryption->encrypt_id(json_encode($token_form));
  } else {
    $token_form = $token;
  }
  ?>
  <form class="form w-100" novalidate="novalidate" id="form_108" data-is_tab="<?= !empty($is_tab) ? $is_tab : null; ?>" href="<?= base_url($this->_class . '/form_process/' . $token_form) ?>" action="#">

    <input type="hidden" id="csrf_token_hash_108" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">

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
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row mb-5">
                  <label for="notes_108_nama_pasien" class="form-label">Nama Pasien</label>
                  <input type="text" class="form-control bg-secondary" id="notes_108_nama_pasien" name="notes_108_nama_pasien" value="<?= isset($reg['nama_pasien']) ? $reg['nama_pasien'] : ''; ?>" readonly>
                </div>
              </div>
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row">
                  <label for="notes_108_umur_pasien" class="form-label">Umur Pasien</label>
                  <input type="text" class="form-control bg-secondary" id="notes_108_umur_pasien" name="notes_108_umur_pasien" value="<?= isset($reg['umur']) ? $reg['umur'] : ''; ?>" readonly>
                </div>
              </div>
            </div>

            <div class="separator my-5"></div>

            <div class="row mt-4">
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row">
                  <label for="notes_108_no_bpjs_pasien" class="form-label">No. BPJS</label>
                  <input type="text" class="form-control bg-secondary" id="notes_108_no_bpjs_pasien" name="notes_108_no_bpjs_pasien" value="<?= isset($reg['no_bpjs']) ? $reg['no_bpjs'] : ''; ?>" readonly>
                </div>
              </div>
              <div class="col-lg-6 col-sm-12">
                <div class="fv-row">
                  <label for="notes_108_diagnosa_akhir" class="form-label text-primary">Diagnosa Akhir</label>
                  <textarea class="form-control" id="notes_108_diagnosa_akhir" name="notes_108_diagnosa_akhir"><?= isset($notes_108['diagnosa_akhir']) ? $notes_108['diagnosa_akhir'] : '' ?></textarea>
                </div>
              </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-6 col-sm-12">
                  <div class="fv-row">
                    <label for="notes_108_obat_terapi_pulang" class="form-label text-primary">Terapi Obat Pulang</label>
                    <textarea class="form-control" id="notes_108_obat_terapi_pulang" name="notes_108_obat_terapi_pulang"><?= isset($notes_108['obat_terapi_pulang']) ? $notes_108['obat_terapi_pulang'] : '' ?></textarea>
                  </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                  <div class="fv-row">
                    <label for="notes_108_terapi" class="form-label text-primary">Rekomendasi Lanjutan : Evaluasi Terapi </label>
                    <textarea class="form-control" id="notes_108_terapi" name="notes_108_terapi"><?= isset($notes_108['terapi']) ? $notes_108['terapi'] : '' ?></textarea>
                  </div>
                </div>
              </div>

            <!-- <div class="row mt-4">
              <div class="col-12">
                <div class="fv-row">
                  <label for="notes_108_ttd_pasien" class="form-label text-primary">TTD Pasien</label>
                  <div class="col-md-12" id="signature_pad">
                    <canvas class="border border-gray-500" id="notes_108_ttd_pasien">
                  </div>
                  <div style="width: 100%" id="signature_pad">
                    <button class="btn btn-sm btn-secondary" id="clear_notes_108_ttd_pasien">Clear</button>
                    <button class="btn btn-sm btn-secondary" id="undo_notes_108_ttd_pasien">Undo</button>
                  </div>
                  <input type="hidden" name="notes_108_ttd_pasien" value="<?= isset($notes_108['ttd_pasien']) ? $notes_108['ttd_pasien'] : ''; ?>">
                </div>
              </div>
            </div> -->
          </div>
        </div>

      </div>

      <div class="card-footer">
        <!-- <button type="reset" class="btn btn-light me-2 float-start">Reset</button> -->

        <?php if (!empty($notes)) : ?>
          <button type="button" class="btn btn-danger me-2 float-start" id="delete_108" href="<?= base_url($this->_class . '/delete_process/' . $token_form) ?>">Hapus</button>
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