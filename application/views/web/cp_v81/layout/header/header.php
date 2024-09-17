<div id="kt_app_header" class="app-header">
  <div class="app-container container-xxl d-flex align-items-stretch justify-content-between"
    id="kt_app_header_container">
    <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 me-lg-15">
      <a href="../../demo1/dist/index.html">
        <img alt="Logo" src="<?= $this->_assets; ?>/media/logos/default.svg"
          class="h-20px h-lg-30px app-sidebar-logo-default theme-light-show" />
        <img alt="Logo" src="<?= $this->_assets; ?>/media/logos/default-dark.svg"
          class="h-20px h-lg-30px app-sidebar-logo-default theme-dark-show" />
      </a>
    </div>
    <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
      <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true"
        data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}"
        data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end"
        data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true"
        data-kt-swapper-mode="{default: 'append', lg: 'prepend'}"
        data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
        <?php $this->load->view('web/cp_v81/layout/header/header_menu'); ?>
      </div>
      <?php $this->load->view('web/cp_v81/layout/header/header_navbar'); ?>
    </div>
  </div>
</div>