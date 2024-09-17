<!DOCTYPE html>
<html lang="en">

<head>
	<base href="../" />
	<title>
		<?= !empty($title) ? $title : 'LokalPro'; ?>
	</title>
	<meta charset="utf-8" />
	<meta name="description" content="LokalPro" />
	<meta name="keywords" content="LokalPro" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="LokalPro" />
	<meta property="og:site_name" content="Lokalpro" />
	<link rel="shortcut icon" href="<?= $this->_assets; ?>/media/logos/favicon.ico" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />

	<link href="<?= $this->_assets; ?>/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?= $this->_assets; ?>/plugins/custom/sweetalert2/css/sweetalert2.min.css" rel="stylesheet" type="text/css" />
	<link href="<?= $this->_assets; ?>/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?= $this->_assets; ?>/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<script src="<?= $this->_assets; ?>/plugins/global/plugins.bundle.js"></script>
	<script src="<?= $this->_assets; ?>/plugins/custom/formrepeater/formrepeater.bundle.js"></script>
	<script src="<?= $this->_assets; ?>/plugins/custom/ckeditor/ckeditor-classic.bundle.js"></script>
</head>

<style>
	.btn.btn-secondary {
		color: #ffffff !important;
		border-color: #bdbec1 !important;
		background-color: #bdbec1 !important;
	}
</style>

<body id="kt_app_body" data-kt-app-layout="light-header" data-kt-app-header-fixed="true" data-kt-app-toolbar-enabled="true" class="app-default">
	<script>
		var defaultThemeMode = "light";
		var themeMode;
		if (document.documentElement) {
			if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
				themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
			} else {
				if (localStorage.getItem("data-bs-theme") !== null) {
					themeMode = localStorage.getItem("data-bs-theme");
				} else {
					themeMode = defaultThemeMode;
				}
			}
			if (themeMode === "system") {
				themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
			}
			document.documentElement.setAttribute("data-bs-theme", themeMode);
		}
	</script>
	<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
		<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
			<?php if (!isset($no_header)) : ?>
				<?php $this->load->view('web/cp_v81/layout/header/header'); ?>
			<?php endif; ?>
			<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
				<div class="app-main flex-column flex-row-fluid" id="kt_app_main">



					<div class="d-flex flex-column flex-column-fluid">
						<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
							<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
								<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
									<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
										<!-- <?= $title ?> -->
									</h1>
								</div>
							</div>
						</div>
						<?php $this->load->view($contents); ?>
					</div>

					<?php if (!isset($no_footer)) : ?>
						<?php $this->load->view('web/cp_v81/layout/footer/footer'); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
		<i class="ki-duotone ki-arrow-up">
			<span class="path1"></span>
			<span class="path2"></span>
		</i>
	</div>

	<script>
		const target = "<?= base_url($this->uri->segments[1]); ?>";
		const page_url = "<?= base_url($this->class); ?>";
		const base_url = "<?= base_url(); ?>";
		// untuk csrf token
		const csrf_token_name = '<?= $this->security->get_csrf_token_name(); ?>';
		var csrf_token_hash = '<?= $this->security->get_csrf_hash(); ?>';
	</script>

	<script src="<?= $this->_assets; ?>/js/scripts.bundle.js"></script>
	<script src="<?= $this->_assets; ?>/plugins/custom/datatables/datatables.bundle.js"></script>
	<script src="<?= $this->_assets; ?>/plugins/custom/loadingoverlay/js/loading-overlay.js"></script>
	<script src="<?= $this->_assets; ?>/plugins/custom/sweetalert2/js/sweetalert2.all.min.js"></script>
	<script src="<?= $this->_assets; ?>/js/mvc/custom.js"></script>

	<?php if (isset($js)) : ?>
		<?php foreach ($js as $k => $v) : ?>
			<script src="<?= $v; ?>"></script>
		<?php endforeach; ?>
	<?php endif; ?>
</body>

</html>