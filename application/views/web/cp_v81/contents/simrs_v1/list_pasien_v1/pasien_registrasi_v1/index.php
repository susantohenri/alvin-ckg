<div id="kt_app_content" class="app-content flex-column-fluid">
  <div id="kt_app_content_container" class="app-container container-xxl">
  
    <div class="card card-flush">

      <!--begin::Card body-->
      <div class="card-body">
        <div class="row collapse" id="filter_container">
          <div class="col-12 col-lg-auto mb-1">
            <div class="input-group input-group-sm mb-1">
              <span class="input-group-text bg-primary text-white" id="basic-addon1">Bulan</span>
              <select class="form-select form-control-sm text-right text-md-left" id="bulan" aria-label="Pilihan bulan">
                <?php foreach (BULAN as $k0 => $v0) : ?>
                  <option value="<?= $k0 ?>" <?= $k0 == date('m') ? 'selected' : null; ?>><?= $v0; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="col-12 col-lg-auto mb-1">
            <div class="input-group input-group-sm mb-1">
              <span class="input-group-text bg-primary text-white" id="basic-addon1">Tahun</span>
              <select class="form-select text-right text-md-left" id="tahun" aria-label="Pilihan tahun">
                <?php for ($i = 2019; $i <= date('Y'); $i++) : ?>
                  <option value="<?= $i ?>" <?= $i == date('Y') ? 'selected' : null; ?>><?= $i; ?></option>
                <?php endfor; ?>
              </select>
            </div>
          </div>

          <div class="col-6 col-lg-auto mb-1">
            <div class="input-group input-group-sm mb-1">
              <span class="input-group-text bg-primary text-white" id="basic-addon1">Jenis Rawat</span>
              <select class="form-select text-right text-md-left" id="jenis_rawat" aria-label="Pilihan jenis rawat">
                <option value="">Semua</option>
                <option value="RJ">Rawat Jalan</option>
                <option value="RI">Rawat Inap</option>
              </select>
            </div>
          </div>

          <div class="col-6 col-lg-auto mb-1">
            <div class="input-group input-group-sm mb-1">
              <span class="input-group-text bg-primary text-white" id="basic-addon1">Status Pasien</span>
              <select class="form-select text-right text-md-left" id="status_pasien" aria-label="Pilihan jenis rawat">
                <option value="">Semua</option>
                <option value="aktif" selected>Aktif</option>
                <option value="arsip">Sudah Checkout</option>
              </select>
            </div>
          </div>
        </div>

        <div class="row mt-3 justify-content-center">
          <div class="col-12 col-xl-12">
            <table class="table table-condensed table-row-bordered nowrap" id="table_reg" width="100%">
              <thead class="fw-semibold fs-6 text-muted">
                <tr>
                  <th class="text-center align-middle">#</th>
                  <th class="text-center align-middle"></th>
                  <th class="text-center align-middle">NAMA PASIEN</th>
                  <th class="text-center align-middle">NO RM</th>
                  <th class="text-center align-middle">NO REGISTRASI</th>
                  <th class="text-center align-middle">CHECKIN</th>
                  <th class="text-center align-middle">CHECKOUT</th>
                  <th class="text-center align-middle">ALAMAT 1</th>
                  <th class="text-center align-middle">ALAMAT 2</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>

      </div>
      <!--end::Card body-->
    </div>

  </div>
</div>

<?php if (isset($js) && !empty($is_tab)) : ?>
  <?php foreach ($js as $k => $v) : ?>
    <script src="<?= $v; ?>" <?= (str_contains($v, 'js/mvc')) ? 'async' : null; ?>></script>
  <?php endforeach; ?>
<?php endif; ?>