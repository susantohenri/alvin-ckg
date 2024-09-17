<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
            <?= $title;?>                
            </h1>
        </div>
    </div>
</div>
<div id="kt_app_content" class="app-content flex-column-fluid">
  <div id="kt_app_content_container" class="app-container container-xxl">
  <div class="card h-100">
    <div class="card-body">
      <div class="row justify-content-center">
        <?php foreach ($erm as $k0 => $v0) : ?>
            <div class="col-md-2 me-3 mb-3">
                <a href="<?= base_url($v0['route']) ?>">
                    <div class="card hover-elevate-up shadow-sm parent-hover">
                        <div class="card-body text-center">
                            <i class="<?= $v0['icon']; ?> fs-3x fa-fw text-dark"></i>
                            <h6 class="text-dark mt-3"> <?= $v0['name']; ?></h6>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>


  </div>
</div>