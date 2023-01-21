<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Login &mdash; BGES Telkom Lampung</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/favicon-ts.png" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<!-- izitoast -->
	<link rel="stylesheet" href="assets/modules/izitoast/css/iziToast.min.css">
	<!-- End -->
	<link rel="stylesheet" href="assets/css/atlantis.css">
</head>
<body class="login">
	<!-- Ucapan -->
	<?php
		//ubah timezone menjadi jakarta
		date_default_timezone_set("Asia/Jakarta");

		//ambil jam dan menit
		$jam = date('H:i');

		//atur salam menggunakan IF
		if ($jam > '05:30' && $jam < '10:00') {
		    $salam = 'Good Morning';
		} elseif ($jam >= '10:00' && $jam < '15:00') {
		    $salam = 'Good Afternoon';
		} elseif ($jam < '18:00') {
		    $salam = 'Good Afternoon';
		} else {
		    $salam = 'Good Night';
		}

	?>
	<!-- End -->
	<div class="wrapper wrapper-login wrapper-login-full p-0">
		<div class="login-aside w-50 d-flex flex-column align-items-center justify-content-center text-center bg-danger-gradient">
			<h1 class="title fw-bold text-white mb-3">BGES Telkom Lampung</h1>
			<p class="subtitle text-white op-7">Customer Relationship Management</p>
		</div>
		<div class="login-aside w-50 d-flex align-items-center justify-content-center bg-white">
			<div class="container container-login container-transparent animated fadeIn">
				<h3 class="text-center" style="font-weight: normal; color: #dc3545;"><?php echo $salam; ?></h3>
				<h3 class="text-center">Sign In To CRM</h3>
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
							<button name="login" id="btnsimpan" type="submit" class="btn btn-dark col-md-5 float-right mt-3 mt-sm-0 fw-bold" tabindex="4">Sign In</button>
						</div>
					</div>
				</form>
			</div>
			
		</div>
	</div>
	<script src="assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="assets/js/core/popper.min.js"></script>
	<script src="assets/js/core/bootstrap.min.js"></script>
	<script src="assets/js/atlantis.min.js"></script>
	<!-- izitoast -->
	<script src="assets/modules/izitoast/js/iziToast.min.js"></script>
	<!-- End -->
	<!-- Page Script -->
	<script>
	    $('#form-login').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'crud_web.php?pg=login',
            data: $(this).serialize(),
            beforeSend: function() {
                $('#btnsimpan').prop('disabled', true);
            },
            success: function(data) {
                var json = $.parseJSON(data);
                $('#btnsimpan').prop('disabled', false);
                if (json.pesan == 'ok') {
                    iziToast.info({
                        title: 'Sukses',
                        message: 'Berhasil login',
                        position: 'topRight'
                    });
                    setTimeout(function() {
                        window.location.href = "user";
                    }, 2000);

                } else {
                    iziToast.error({
                        title: 'Maaf!',
                        message: json.pesan,
                        position: 'topCenter'
                    });
                }
                //$('#bodyreset').load(location.href + ' #bodyreset');
            }
        });
        return false;
    });
	</script>
</body>
</html>