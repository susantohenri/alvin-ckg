<div id="kt_app_content" class="app-content flex-column-fluid">
  <div id="kt_app_content_container" class="app-container container-xxl">

    <?php 
      // $token = $token_data;
      // $token['is_tab']  = true;
      // $token = $this->app_encryption->encrypt_id(json_encode($token), $this->data_session['rm_number']);
    ?>

    <!-- <input type="hidden" name="token" value="<?= $token; ?>"> -->
  
    <div class="mb-5">
      <div class="d-grid">
        <ul class="nav nav-tabs nav-line-tabs nav-fill fs-5">
          <li class="nav-item">
              <button class="nav-link task-btn active" data-bs-toggle="tab" href="#pos_tab_1">POS</button>
          </li>
          <li class="nav-item">
              <button class="nav-link task-btn" data-bs-toggle="tab" href="#pos_tab_2">Tab 2</button>
          </li>
          <li class="nav-item">
              <button class="nav-link task-btn" data-bs-toggle="tab" href="#pos_tab_3">Tab 3</button>
          </li>
          <li class="nav-item">
              <button class="nav-link task-btn" data-bs-toggle="tab" href="#pos_tab_4">Tab 4</button>
          </li>
        </ul>

      </div>
    </div>

    <div class="tab-content" id="ErmTabContent">
      <div class="tab-pane fade show active" id="pos_tab_1" role="tabpanel">
        <div id="container_pos_tab_1" class="row">
        <div class="col-12 mb-3">
          <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
              <div id="kt_app_toolbar_container" class=" d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                      BARANG                
                    </h1>
                </div>
              </div>
            </div>
            <div id="kt_app_content" class="app-content flex-column-fluid">
              <div id="kt_app_content_container" class="">
                <div class="row">
                  <div class="col-sm-4">
                    <div class="card">
                      <div class="card-body">
                        <h3>BATCH NUMBER</h3>
                        <form class="form mt-3" id="form_barang" href="<?= base_url($this->_class . '/get_data_barang/' . $token_data) ?>"  action="#">
                          <input type="hidden" id="csrf_token_hash" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>"> 
                          <div class="fv-row mb-3">
                            <input type="text" class="form-control" id="no_batch" name="no_batch" autofocus>
                          </div>
                        </form>
                        <div id="liveAlertPlaceholder"></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-8">
                    <div class="card">
                      <div class="card-body">
                        <h3>NAMA BARANG</h3>
                        <form class="form mt-3" id="form_daftar_barang" href="<?= base_url($this->_class . '/form_process_barang/' . $token_data) ?>" action="#">
                          <div class="table-responsive">
                            <table class="table" id="list_barang" width="100%">
                              <thead class="text-center">
                                <tr>
                                  <th>No</th>
                                  <th>Actions</th>
                                  <th>R</th>
                                  <th>Nama Barang</th>
                                  <th width="10%">QTY</th>
                                  <th width="10%">Total</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr id="row_barang_default">
                                  <td colspan="6" class="text-center">- Belum ada Barang -</td>
                                </tr>
                              </tbody>
                              <tfoot>
                                <tr>
                                  <td class="text-end" colspan="5">Total</td>
                                  <td class="text-end">
                                    Rp <span id="barang_total_label"></span>
                                    <input type="hidden" name="total" class="barang_total" id="barang_total" value="0">
                                  </td>
                                </tr>
                              </tfoot>
                            </table>
                          </div>
                          <button type="submit" class="btn btn-sm btn-primary float-end m-1">Simpan</button>
                          <a href="<?= base_url($this->_class . '/pdf/' . $token_data) ?>" class="btn btn-sm btn-success float-end m-1" target="_blank">PDF</a>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <!-- <script src="https://mia.oiffel.com/assets/template/metronic/web/cp_v11/simrs_v1/barang_v1/11_3531_barang_dept/js/edit.js?t=1725687036"></script> -->
        </div>
        </div>
      </div>
      <div class="tab-pane fade" id="pos_tab_2" role="tabpanel">
        <div id="container_pos_tab_2" class="row">
        222
        </div>
      </div>
      <div class="tab-pane fade" id="pos_tab_3" role="tabpanel">
        <div id="container_pos_tab_3" class="row">
        333
        </div>
      </div>
      <div class="tab-pane fade" id="pos_tab_4" role="tabpanel">
        <div id="container_pos_tab_4" class="row">
        444
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Input QTY</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="form mt-3" id="form_input_qty" action="#">
          <div class="mb-3">
            <label for="qty_barang_input" class="col-form-label">QTY</label>
            <input type="number" class="form-control" id="qty_barang_input">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>