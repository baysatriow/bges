<?php
session_start();
require("../config/database.php");
require("../config/function.php");
require("../config/function_sekolah.php");
require("../config/functions.crud.php");


if (isset($_SESSION['id_user'])) {
  $user 		   = mysqli_fetch_array(mysqli_query($koneksi, "select * from tb_user where id_user='$_SESSION[id_user]'"));
  $order_count 	   = mysqli_fetch_array(mysqli_query($koneksi, "select count(1) from tb_order"));
  $total_order 	   = $order_count[0];
  $status_count    = mysqli_fetch_array(mysqli_query($koneksi, "select count(status_order) from tb_order where status_order like 'COMPLETE'"));
  $total_complete  = $status_count[0];
  $pelanggan_count = mysqli_fetch_array(mysqli_query($koneksi, "select count(1) from tb_pelanggan"));
  $total_pelanggan = $pelanggan_count[0];
  $kontrak_count   = mysqli_fetch_array(mysqli_query($koneksi, "select count(1) from tb_kontrak"));
  $total_kontrak   = $kontrak_count[0];
  $user_setting    = mysqli_fetch_array(mysqli_query($koneksi, "select * from tb_user where id_user='$_SESSION[id_user]'"));
  $order		   = mysqli_fetch_array(mysqli_query($koneksi, "select * from tb_order"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Admin &mdash; BGES CRM</title>
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
	<link rel="stylesheet" href="../assets/css/atlantis.css">
	<!-- Select From Dropdown Bootstrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../assets/css/demo.css">
	<!-- Custom -->
	<link rel="stylesheet" href="../assets/css/custom.css">
	<!-- CSS TOASTR -->
    <link rel="stylesheet" href="../assets/modules/izitoast/css/iziToast.min.css">
    <link rel="stylesheet" href="../assets/modules/select2/dist/css/select2.min.css">

    <script src="../assets/js/core/jquery.3.2.1.min.js"></script>
    <!-- izitoast -->
    <!-- JS Libraies -->
    <script src="../assets/modules/izitoast/js/iziToast.min.js"></script>
    <script src="../assets/modules/sweetalert/sweetalert.min.js"></script>
    <!-- JS Libraies -->
    <script src="../assets/modules/cleave-js/dist/cleave.min.js"></script>
    <script src="../assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
	<!-- Ajax Autofill Library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="red">
				
				<a href="." class="logo">
					<img src="../assets/img/logo/telkomss.png" width="140" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="red2">
				<div class="container-fluid">
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="../assets/img/logo.png" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="../assets/img/logo.png" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4><?= $user['nama']?></h4>
												<p class="text-muted"><?= $user['Roles']?></p><a href="logout.php" class="btn btn-xs btn-secondary btn-sm"><i class="fas fa-sign-out-alt"></i> Logout</a>
											</div>
										</div>
									</li>
									<!-- <li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">My Profile</a>
										<a class="dropdown-item" href="#">My Balance</a>
										<a class="dropdown-item" href="#">Inbox</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">Account Setting</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="logout.php">Logout</a>
									</li> -->
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>
		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2" data-background-color="dark">
			<?php include ("menu.php"); ?>			
		</div>
		<div class="main-panel">
			<div class="container">
				<?php include ("content.php"); ?>
			</div>
			<footer class="footer">
				<?php include ("footer.php"); ?>
			</footer>
		</div>
		
		<!-- Custom template | don't include it in your project! -->
		<div class="custom-template">
			<div class="title">Settings</div>
			<div class="custom-content">
				<div class="switcher">
					<div class="switch-block">
						<h4>Logo Header</h4>
						<div class="btnSwitch">
							<button type="button" class="changeLogoHeaderColor" data-color="dark"></button>
							<button type="button" class="selected changeLogoHeaderColor" data-color="blue"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="green"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="red"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="white"></button>
							<br/>
							<button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Navbar Header</h4>
						<div class="btnSwitch">
							<button type="button" class="changeTopBarColor" data-color="dark"></button>
							<button type="button" class="changeTopBarColor" data-color="blue"></button>
							<button type="button" class="changeTopBarColor" data-color="purple"></button>
							<button type="button" class="changeTopBarColor" data-color="light-blue"></button>
							<button type="button" class="changeTopBarColor" data-color="green"></button>
							<button type="button" class="changeTopBarColor" data-color="orange"></button>
							<button type="button" class="changeTopBarColor" data-color="red"></button>
							<button type="button" class="changeTopBarColor" data-color="white"></button>
							<br/>
							<button type="button" class="changeTopBarColor" data-color="dark2"></button>
							<button type="button" class="selected changeTopBarColor" data-color="blue2"></button>
							<button type="button" class="changeTopBarColor" data-color="purple2"></button>
							<button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
							<button type="button" class="changeTopBarColor" data-color="green2"></button>
							<button type="button" class="changeTopBarColor" data-color="orange2"></button>
							<button type="button" class="changeTopBarColor" data-color="red2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Sidebar</h4>
						<div class="btnSwitch">
							<button type="button" class="selected changeSideBarColor" data-color="white"></button>
							<button type="button" class="changeSideBarColor" data-color="dark"></button>
							<button type="button" class="changeSideBarColor" data-color="dark2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Background</h4>
						<div class="btnSwitch">
							<button type="button" class="changeBackgroundColor" data-color="bg2"></button>
							<button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
							<button type="button" class="changeBackgroundColor" data-color="bg3"></button>
							<button type="button" class="changeBackgroundColor" data-color="dark"></button>
						</div>
					</div>
				</div>
			</div>
			<?php 
			if($user['level'] == "Admin"){
			?>
			<div class="custom-toggle">
				<i class="flaticon-settings"></i>
			</div>
		</div>
		<?php } ?>
		<!-- End Custom template -->
	</div>
	<!--   Core JS Files   -->
	
	<script src="../assets/js/core/popper.min.js"></script>
	<script src="../assets/js/core/bootstrap.min.js"></script>
	<!-- Select From Dropdown Bootstrap -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
	<!-- jQuery UI -->
	<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	<!-- Bootstrap Toggle -->
	<script src="../assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
	<!-- jQuery Scrollbar -->
	<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<!-- Datatables -->
	<script src="../assets/js/plugin/datatables/datatables.min.js"></script>
	<!-- Magnific Popup -->
	<script src="../assets/js/plugin/jquery.magnific-popup/jquery.magnific-popup.min.js"></script>
	<!-- Atlantis JS -->
	<script src="../assets/js/atlantis.min.js"></script>
	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="../assets/modules/select2/dist/js/select2.full.min.js"></script>
	<script src="../assets/js/setting-demo2.js"></script>
	<!-- active menu -->
	<script type="text/javascript">
      var url = window.location;
      // for sidebar menu entirely but not cover treeview
      $('ul.nav a').filter(function() {
        return this.href == url;
      }).parent().addClass('active');

      // for treeview
      $('ul.nav-collapse a').filter(function() {
        return this.href == url;
      }).closest('.nav-item').addClass('active');
    </script>
	<script >
		$(document).ready(function() {
			$('#basic-datatables1').DataTable({
			});

			// $('#basic-datatables2').DataTable({
			// });

			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

			$('#addRowButton').click(function() {
				$('#add-row').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),
					action
					]);
				$('#addRowModal').modal('hide');

			});
		});
		
		// POP IMAGE
		$('.image-gallery').magnificPopup({
			delegate: 'a', 
			type: 'image',
			removalDelay: 300,
			gallery:{
				enabled:false,
			},
			mainClass: 'mfp-with-zoom', 
			zoom: {
				enabled: true, 
				duration: 300,
				easing: 'ease-in-out',
				opener: function(openerElement) {
					return openerElement.is('img') ? openerElement : openerElement.find('img');
				}
			}
		});
	</script>
</body>
</html>
<?php
} else {
  include "login.php";
}

?>