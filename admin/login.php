<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Login &mdash; BGES CRM</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/favicon-ts.png" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<!-- izitoast -->
	<link rel="stylesheet" href="../assets/modules/izitoast/css/iziToast.min.css">
	<!-- End -->
	<link rel="stylesheet" href="../assets/css/atlantis.css">
</head>
<body class="login">
	<div class="wrapper wrapper-login wrapper-login-full p-0">
		<div class="login-aside w-50 d-flex flex-column align-items-center justify-content-center text-center bg-danger-gradient">
			<h1 class="title fw-bold text-white mb-3">BGES CRM</h1>
			<p class="subtitle text-white op-7">Customer Relationship Management</p>
		</div>
		<div class="login-aside w-50 d-flex align-items-center justify-content-center bg-white">
			<div class="container container-login container-transparent animated fadeIn">
				<h3 class="text-center">Sign In To Applicaton</h3>
				<form id="form-login" class="needs-validation" novalidate="">
					<div class="login-form">
						<div class="form-group">
							<label for="username" class="placeholder"><b>Username</b></label>
							<input id="username" name="username" tabindex="1" autofocus type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="password" class="placeholder"><b>Password</b></label>
							<!-- <a href="#" class="link float-right">Forget Password ?</a> -->
							<div class="position-relative">
								<input id="password" name="password" tabindex="2" type="password" class="form-control" required>
								<div class="show-password">
									<i class="icon-eye"></i>
								</div>
							</div>
						</div>
						<div class="form-group form-action-d-flex mb-3">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="rememberme">
								<label class="custom-control-label m-0" for="rememberme">Remember Me</label>
							</div>
							<button name="login" type="submit" class="btn btn-dark col-md-5 float-right mt-3 mt-sm-0 fw-bold" tabindex="4">Sign In</button>
						</div>
					</div>
				</form>
			</div>
			
		</div>
	</div>
	<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../assets/js/core/popper.min.js"></script>
	<script src="../assets/js/core/bootstrap.min.js"></script>
	<script src="../assets/js/atlantis.min.js"></script>
	<!-- izitoast -->
	<script src="../assets/modules/izitoast/js/iziToast.min.js"></script>
	<!-- End -->
	<!-- Page Script -->
	<script>
	    $('#form-login').submit(function(e) {
	      e.preventDefault();
	      $.ajax({
	        type: 'POST',
	        url: 'login_cek.php?id=5448dfhcr27467576c78a50vi98j0ruv0w',
	        data: $(this).serialize(),
	        success: function(data) {
	          if (data == "ok") {
	            iziToast.info({
	              title: 'Sukses',
	              message: 'Login Berhasil',
	              position: 'topRight'
	            });
	            setTimeout(function() {
	              window.location.reload();
	            }, 2000);
	          } else {
	            iziToast.error({
	              title: 'Maaf',
	              message: 'Username atau Password Salah',
	              position: 'topCenter'
	            });
	          }
	        }
	      });
	      return false;
	    });
	</script>
</body>
</html>