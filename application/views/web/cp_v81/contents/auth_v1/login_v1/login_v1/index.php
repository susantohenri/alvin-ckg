<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head>
		<title>LOGIN</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<link rel="shortcut icon" href="<?= $this->_assets; ?>media/logos/favicon.ico" />
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="<?= $this->_assets; ?>plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?= $this->_assets; ?>css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center">
		<!--begin::Theme mode setup on page load-->
		<script>
      var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }
    </script>
		<!--end::Theme mode setup on page load-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<style>body { background-image: url('<?= $this->_assets; ?>media/auth/bg10.jpeg'); } [data-bs-theme="dark"] body { background-image: url('<?= $this->_assets; ?>media/auth/bg10-dark.jpeg'); }</style>
			<div class="d-flex flex-column flex-lg-row flex-column-fluid justify-content-center">

				<div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
					<div class="bg-body d-flex flex-column flex-center rounded-4 w-md-600px p-10">
						<div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">
							<div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">
								<form class="form w-100" novalidate="novalidate" id="form_login" data-kt-redirect-url="../../demo1/dist/index.html" action="#">
                  <input type="hidden" id="csrf_token_hash" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">

                
									<div class="text-center mb-11">
										<h1 class="text-dark fw-bolder mb-3">Log In</h1>
									</div>                  
                  
									<div class="fv-row mb-8">
										<input type="text" placeholder="Username" name="username" autocomplete="off" class="form-control bg-transparent" />
									</div>
									<div class="fv-row mb-3">
										<input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent" />
									</div>
                  
                  <div class="separator my-10"></div>

									<div class="d-grid mb-10">
										<button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
											<span class="indicator-label">Log In</span>
											<span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                      </span>
										</button>
									</div>
								</form>
							</div>              
						</div>
					</div>
				</div>
			</div>
		</div>

		<script src="<?= $this->_assets; ?>plugins/global/plugins.bundle.js"></script>
		<script src="<?= $this->_assets; ?>js/scripts.bundle.js"></script>

    <script>
      const target = "<?= base_url($this->_class); ?>";
    </script>

    <?php if (isset($js)) : ?>
      <?php foreach ($js as $k => $v) : ?>
        <script src="<?= $v; ?>"></script>
      <?php endforeach; ?>
    <?php endif; ?>
	</body>
</html>