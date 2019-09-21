<?php
error_reporting(0);
include 'include_profile.php';
session_start();
include 'include.php';
if (isset($_POST['submit'])) {
	$profile_username = $_SESSION['username'];
	$query = "SELECT * FROM users WHERE username = '$profile_username'";
	$results = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_assoc($results)) {
		$password = $row['password'];
		$pass = md5($_POST['old_password']);
		if ($password == $pass) {
			$new_pass = md5($_POST['new_password']);
			$sql = "UPDATE users SET password = '$new_pass' WHERE username = '$profile_username'";
			if ($conn->query($sql)) {
				header("location: newsfeed.php");
			}
		} else {
			echo "wrong password";
		}
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

	<title>Your Account - Education And Employement</title>

	<!-- Required meta tags always come first -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap-reboot.css">
	<link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap-grid.css">

	<!-- Theme Styles CSS -->
	<link rel="stylesheet" type="text/css" href="css/theme-styles.css">
	<link rel="stylesheet" type="text/css" href="css/blocks.css">

	<!-- Main Font -->
	<script src="js/webfontloader.min.js"></script>
	<script>
		WebFont.load({
			google: {
				families: ['Roboto:300,400,500,700:latin']
			}
		});
	</script>

	<link rel="stylesheet" type="text/css" href="css/fonts.css">

	<!-- Styles for plugins -->
	<link rel="stylesheet" type="text/css" href="css/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.min.css">
	<script src="js/jquery-3.2.0.min.js"></script>
	<!-- Js effects for material design. + Tooltips -->
	<script src="js/material.min.js"></script>
	<!-- Helper scripts (Tabs, Equal height, Scrollbar, etc) -->
	<script src="js/theme-plugins.js"></script>
	<!-- Init functions -->
	<script src="js/main.js"></script>

	<!-- Select / Sorting script -->
	<script src="js/selectize.min.js"></script>

	<!-- Datepicker input field script-->
	<script src="js/moment.min.js"></script>
	<script src="js/daterangepicker.min.js"></script>


	<script src="js/mediaelement-and-player.min.js"></script>
	<script src="js/mediaelement-playlist-plugin.min.js"></script>

</head>

<body>
	<?php include 'side_panel.php'; ?>

	<!-- Header -->
	<?php include 'header.php'; ?>
	<!-- ... end Header -->


	<!-- Responsive Header -->
	<?php include 'mobile_header.php'; ?>
	<!-- Profile Settings Responsive -->

	<div class="profile-settings-responsive">

		<a href="#" class="js-profile-settings-open profile-settings-open">
			<i class="fa fa-angle-right" aria-hidden="true"></i>
			<i class="fa fa-angle-left" aria-hidden="true"></i>
		</a>
		<div class="mCustomScrollbar" data-mcs-theme="dark">
			<div class="ui-block">
				<div class="your-profile">
					<div class="ui-block-title ui-block-title-small">
						<h6 class="title">Your PROFILE</h6>
					</div>

					<div id="accordion1" role="tablist" aria-multiselectable="true">
						<div class="card">
							<div class="card-header" role="tab" id="headingOne-1">
								<h6 class="mb-0">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-1" aria-expanded="true" aria-controls="collapseOne">
										Profile Settings
										<svg class="olymp-dropdown-arrow-icon">
											<use xlink:href="icons1/icons.svg#olymp-dropdown-arrow-icon"></use>
										</svg>
									</a>
								</h6>
							</div>

							<div id="collapseOne-1" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
								<ul class="your-profile-menu">
									<li>
										<a href="personal_info.php">Personal Information</a>
									</li>
									<li>
										<a href="change_password.php">Change Password</a>
									</li>
									<li>
										<a href="intrests.php">Hobbies and Interests</a>
									</li>
									<li>
										<a href="education.php">Education and Employement</a>
									</li>
								</ul>
							</div>
						</div>
					</div>



				</div>
			</div>
		</div>
	</div>

	<!-- ... end Profile Settings Responsive -->


	<!-- Fixed Sidebar Left -->

	<!-- ... end Responsive Header -->


	<div class="header-spacer header-spacer-small"></div>



	<!-- Your Account Personal Information -->

	<div class="container">
		<div class="row">
			<div class="col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-xs-12">
				<div class="ui-block">
					<div class="ui-block-title">
						<h6 class="title">Change Password</h6>
					</div>
					<div class="ui-block-content">
						<form action="change_password.php" method="post">
							<div class="row">

								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="form-group label-floating">

										<label class="control-label">Current Password</label>
										<input class="form-control" placeholder="" type="password" name="old_password" id="myInput" value="******">

									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
									<div class="form-group label-floating is-empty">
										<label class="control-label">Your New Password</label>
										<input class="form-control" placeholder="" name="new_password" type="password">
									</div>
								</div>


								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<button class="btn btn-primary btn-lg full-width" type="submit" name="submit">Change Password Now!</button>
								</div>

							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="col-xl-3 order-xl-1 col-lg-3 order-lg-1 col-md-12 order-md-2 col-sm-12 col-xs-12 responsive-display-none">
				<div class="ui-block">
					<div class="your-profile">
						<div class="ui-block-title ui-block-title-small">
							<h6 class="title">Your PROFILE</h6>
						</div>

						<div id="accordion" role="tablist" aria-multiselectable="true">
							<div class="card">
								<div class="card-header" role="tab" id="headingOne">
									<h6 class="mb-0">
										<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
											Profile Settings
											<svg class="olymp-dropdown-arrow-icon">
												<use xlink:href="icons1/icons.svg#olymp-dropdown-arrow-icon"></use>
											</svg>
										</a>
									</h6>
								</div>

								<div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
									<ul class="your-profile-menu">
										<li>
											<a href="personal_info.php">Personal Information</a>
										</li>
										<li>
											<a href="change_password.php">Change Password</a>
										</li>
										<li>
											<a href="intrests.php">Hobbies and Interests</a>
										</li>
										<li>
											<a href="education.php">Education and Employement</a>
										</li>
									</ul>
								</div>
							</div>
						</div>


					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- ... end Your Account Personal Information -->

	<!-- ... end Window-popup-CHAT for responsive min-width: 768px -->



	<!-- jQuery first, then Other JS. -->
	<script src="js/jquery-3.2.0.min.js"></script>
	<!-- Js effects for material design. + Tooltips -->
	<script src="js/material.min.js"></script>
	<!-- Helper scripts (Tabs, Equal height, Scrollbar, etc) -->
	<script src="js/theme-plugins.js"></script>
	<!-- Init functions -->
	<script src="js/main.js"></script>

	<!-- Select / Sorting script -->
	<script src="js/selectize.min.js"></script>

	<!-- Datepicker input field script-->
	<script src="js/moment.min.js"></script>
	<script src="js/daterangepicker.min.js"></script>


	<script src="js/mediaelement-and-player.min.js"></script>
	<script src="js/mediaelement-playlist-plugin.min.js"></script>

</body>

</html>