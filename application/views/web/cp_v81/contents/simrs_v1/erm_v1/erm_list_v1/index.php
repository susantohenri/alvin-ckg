<div id="kt_app_content" class="app-content flex-column-fluid">
  <div id="kt_app_content_container" class="app-container container-xxl">


  <div class="card h-100">
    <div class="card-body">
      <div class="row justify-content-center">
        
        <?php foreach ($erm as $k0 => $v0) : ?>
        <div class="col-xl-2 col-4">
          <a href="<?= base_url($v0['route'] .'/'. $token) ?>" class="card hover-elevate-up shadow-sm parent-hover">
            <div class="card-body d-flex flex-column align-items-center">
              <i class="ki-duotone ki-some-files parent-hover-primary fs-3x">
                <span class="path1"></span>
                <span class="path2"></span>
              </i>
      
              <div class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold">
                <?= $v0['name']; ?>
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