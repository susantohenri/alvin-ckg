<div class="app-navbar flex-shrink-0">
  <!--begin::Search-->
  <?php //$this->load->view('web/cp_v81/layout/header/header_navbar_search'); ?>
  <!--end::Search-->
  <!--begin::Activities-->
  <?php //$this->load->view('web/cp_v81/layout/header/header_navbar_activities'); ?>
  <!--end::Activities-->
  <!--begin::Notifications-->
  <?php //$this->load->view('web/cp_v81/layout/header/header_navbar_notifications'); ?>
  <!--end::Notifications-->
  <!--begin::Chat-->
  <?php //$this->load->view('web/cp_v81/layout/header/header_navbar_chat'); ?>
  <!--end::Chat-->
  <!--begin::My apps links-->
  <?php //$this->load->view('web/cp_v81/layout/header/header_navbar_apps'); ?>
  <!--end::My apps links-->
  <!--begin::Theme mode-->
  <?php $this->load->view('web/cp_v81/layout/header/header_navbar_theme'); ?>
  <!--end::Theme mode-->
  <!--begin::User menu-->
  <?php $this->load->view('web/cp_v81/layout/header/header_navbar_user'); ?>
  <!--end::User menu-->

  <!--begin::Header menu toggle-->
  <div class="app-navbar-item d-lg-none ms-2 me-n2" title="Show header menu">
    <div class="btn btn-flex btn-icon btn-active-color-primary w-30px h-30px" id="kt_app_header_menu_toggle">
    <i class="fa-solid fa-bars fa-2x"></i>
    </div>
  </div>
  <!--end::Header menu toggle-->
</div>