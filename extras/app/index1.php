<?php
session_start();
//Signup Backend
include 'include.php';
if (isset($_POST['register'])) {


	$name = $_POST['name'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$status = $_POST['status'];
	$password = md5($_POST['password']);
	$hash =  md5(rand(0,1000));
	$result = $conn->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());
	$user_result = $conn->query("SELECT * FROM users WHERE username='$username'") or die($mysqli->error());
  
  
	if ($result->num_rows > 0) {
		echo "user already exists";
		
	}
	else if ($user_result->num_rows > 0) {
	  echo "Username already in use";
	  
  }
	else { 
  
		$sql = "INSERT INTO users (name, username, email, cateogary , password, hash) " 
				. "VALUES ('$name','$username','$email', '$status', '$password','$hash')";
  
		if ( $conn->query($sql) ){
  
		$_SESSION["name"] = $name;
		$_SESSION["username"] = $username;
		$_SESSION["email"] = $email;
		$_SESSION["status"] = $status;
		$_SESSION['logged_in'] = true;
  
		  $to      = $email; // Send email to our user
		  $subject = 'Novice | Verification'; // Give the email a subject 
		  $message = '
   
		  Thanks for signing up!
		  Your account has been created,
		  Please click this link to activate your account:
		  http://www.novicetopro.com/verify.php?email='.$email.'&hash='.$hash.'
   
  '; // Our message above including the link
					   
	  $headers = 'From:noreply@novicetopro.com' . "\r\n"; // Set from headers
	  mail($to, $subject, $message, $headers); // Send our email
		  
	  header("location: newsfeed.php");    
		}
  
		else {
		echo "nai hua";
	  }
  
	}
}
//Login backend
if (isset($_POST['submit'])) {

  
$email = $conn->escape_string($_POST['email']);
$result = $conn->query("SELECT * FROM users WHERE email='$email'");

if ( $result->num_rows == 0 ){ 
  echo "username or password is incorrect";
}
else { 
	$users = $result->fetch_assoc();
	if (md5($_POST['password']) == $users['password']) {
		$_SESSION['user_id'] = $users['user_id'];
		$_SESSION['name'] = $users['name'];
		$_SESSION['username'] = $users['username'];
		$_SESSION['cateogary'] = $users['cateogary'];
		$_SESSION['email'] = $users['email'];
		$_SESSION['verified'] = $users['verified'];
		$_SESSION['moderator'] = $users['moderator'];
		$_SESSION['logged_in'] = true;
		header("location: newsfeed.php");
	}
}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>

	<title>Landing Page</title>

	<!-- Required meta tags always come first -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<!-- Main Font -->
	<script src="js/webfontloader.min.js"></script>

	<script>
		WebFont.load({
			google: {
				families: ['Roboto:300,400,500,700:latin']
			}
		});
	</script>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap-reboot.css">
	<link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap-grid.css">

	<!-- Main Styles CSS -->
	<link rel="stylesheet" type="text/css" href="css/main.min.css">
	<link rel="stylesheet" type="text/css" href="css/fonts.min.css">



</head>

<body class="landing-page">

<div class="content-bg-wrap"></div>


<!-- Header Standard Landing  -->

<div class="header--standard header--standard-landing" id="header--standard">
	<div class="container">
		<div class="header--standard-wrap">

			<a href="#" class="logo">
				<div class="img-wrap">
					<img src="img/logo.png" alt="Olympus">
					<img src="img/logo-colored-small.png" alt="Olympus" class="logo-colored">
				</div>
				<div class="title-block">
					<h6 class="logo-title">NOVICETOPRO</h6>
					<div class="sub-title">SOCIAL NETWORK</div>
				</div>
			</a>

			<a href="#" class="open-responsive-menu js-open-responsive-menu">
				<svg class="olymp-menu-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-menu-icon"></use></svg>
			</a>

			<div class="nav nav-pills nav1 header-menu">
				<div class="mCustomScrollbar">
					<ul>
						<li class="nav-item">
							<a href="#" class="nav-link">Home</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false" tabindex='1'>Profile</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="#">Profile Page</a>
								<a class="dropdown-item" href="#">Newsfeed</a>
								<a class="dropdown-item" href="#">Post Versions</a>
							</div>
						</li>
						<li class="nav-item dropdown dropdown-has-megamenu">
							<a href="#" class="nav-link dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false" tabindex='1'>Forums</a>
							<div class="dropdown-menu megamenu">
								<div class="row">
									<div class="col col-sm-3">
										<h6 class="column-tittle">Main Links</h6>
										<a class="dropdown-item" href="#">Profile Page<!--<span class="tag-label bg-blue-light">new</span>--></a>
									
									</div>
								<!--	<div class="col col-sm-3">
										<h6 class="column-tittle">Corporate</h6>
									</div>
									<div class="col col-sm-3">
										<h6 class="column-tittle">Forums</h6>
									</div>-->
								</div>
							</div>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">Terms & Conditions</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">Events</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">Privacy Policy</a>
						</li>
						<li class="close-responsive-menu js-close-responsive-menu">
							<svg class="olymp-close-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
						</li>
						<li class="nav-item js-expanded-menu">
							<a href="#" class="nav-link">
								<svg class="olymp-menu-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-menu-icon"></use></svg>
								<svg class="olymp-close-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
							</a>
						</li>
						
				</div>
			</div>
		</div>
	</div>
</div>

<!-- ... end Header Standard Landing  -->
<div class="header-spacer--standard"></div>

<div class="container">
	<div class="row display-flex">
		<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
			<div class="landing-content">
				<h1>Welcome to NOVICETOPRO</h1>
				<p>Share your
					thoughts, write blog posts, show your favourite music via Spotify, earn badges and much more!
				</p>
				<a href="index.php" class="btn btn-md btn-border c-white">Register Now!</a>
			</div>
		</div>

		<div class="col col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12">
		<!--Form-->
		<form action="index.php" method="post" >
			<!-- Login-Registration Form  -->
			
			<div class="registration-login-form">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#home" role="tab">
							<svg class="olymp-login-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-login-icon"></use></svg>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#profile" role="tab">
							<svg class="olymp-register-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-register-icon"></use></svg>
						</a>
					</li>
				</ul>
			
				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane active" id="home" role="tabpanel" data-mh="log-tab">
						<div class="title h6">Register to NOVICETOPRO</div>
						<form class="content">
							<div class="row">
							<div class="col-xl-12 col-lg-12 col-md-12">
								<div class="form-group label-floating is-empty">
										<label class="control-label">Your name</label>
										<input class="form-control" placeholder="" name = "name"type="text">
									</div>
								</div>
								
								<div class="col-xl-12 col-lg-12 col-md-12">
									<div class="form-group label-floating is-empty">
										<label class="control-label">Your username</label>
										<input class="form-control" placeholder="" name = "username" type="text">
									</div>
									<div class="form-group label-floating is-empty">
										<label class="control-label">Your Email</label>
										<input class="form-control" placeholder="" name = "email" type="email">
									</div>
									
									<div class="form-group label-floating is-empty">
										<label class="control-label">Your Password</label>
										<input class="form-control" placeholder="" name = "password" type="password">
									</div>

									<div class="form-group label-floating is-select">
										<label class="control-label" id="status" name="status">What are you</label>
										<select class="selectpicker form-control"id="status" name="status" size="auto">
											<option value="novice">Novice/Student</option>
											<option value="pro">Professional</option>
										</select>
									</div>
									<div class="remember">
										<div class="checkbox">
											<label>
												<input name="optionsCheckboxes" type="checkbox">
												I accept the <a href="#">Terms and Conditions</a> of the website
											</label>
										</div>
									</div>


									<button type="submit" class="btn btn-purple btn-lg full-width" name="register">Complete Registration!</button>
								</div>
							</div>
						</form>
					</div>


					<div class="tab-pane" id="profile" role="tabpanel" data-mh="log-tab">
					<form action="index.php" method="post" >
						<div class="title h6">Login to your Account</div>
						<form class="content">
							<div class="row">
							<!--Login form-->
							
									<div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
									<div class="form-group label-floating is-empty">
											<label class="control-label">Your Email</label>
											<input class="form-control" placeholder="" name="email" type="email">
										</div>
										<div class="form-group label-floating is-empty">
											<label class="control-label">Your Password</label>
											<input class="form-control" placeholder="" name="password" type="password">
										</div>

										<div class="remember">

											<div class="checkbox">
												<label>
													<input name="optionsCheckboxes" type="checkbox">
													Remember Me
												</label>
											</div>
											<a href="#" class="forgot">Forgot my Password</a>
										</div>

										<button type="submit" class="btn btn-purple btn-lg full-width" name="submit">Login</button>

										<div class="or"></div>
			
										<a href="#" class="btn btn-lg bg-facebook full-width btn-icon-left"><i class="fab fa-facebook-f" aria-hidden="true"></i>Login with Facebook</a>
			
										<a href="#" class="btn btn-lg bg-twitter full-width btn-icon-left"><i class="fab fa-twitter" aria-hidden="true"></i>Login with Twitter</a>
			
			
										<p>Don’t you have an account? <a href="index.php">Register Now!</a> it’s really simple and you can start enjoing all the benefits!</p>
									</div>
								</div>
						</form>
					</div>
				</div>
			</div>
			
				<!-- ... end Login-Registration Form  -->		</div>
		</div>
</div>


<!-- JS Scripts -->
<script src="js/jquery-3.2.1.js"></script>
<script src="js/jquery.appear.js"></script>
<script src="js/jquery.mousewheel.js"></script>
<script src="js/perfect-scrollbar.js"></script>
<script src="js/jquery.matchHeight.js"></script>
<script src="js/svgxuse.js"></script>
<script src="js/imagesloaded.pkgd.js"></script>
<script src="js/Headroom.js"></script>
<script src="js/velocity.js"></script>
<script src="js/ScrollMagic.js"></script>
<script src="js/jquery.waypoints.js"></script>
<script src="js/jquery.countTo.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/material.min.js"></script>
<script src="js/bootstrap-select.js"></script>
<script src="js/smooth-scroll.js"></script>
<script src="js/selectize.js"></script>
<script src="js/swiper.jquery.js"></script>
<script src="js/moment.js"></script>
<script src="js/daterangepicker.js"></script>
<script src="js/simplecalendar.js"></script>
<script src="js/fullcalendar.js"></script>
<script src="js/isotope.pkgd.js"></script>
<script src="js/ajax-pagination.js"></script>
<script src="js/Chart.js"></script>
<script src="js/chartjs-plugin-deferred.js"></script>
<script src="js/circle-progress.js"></script>
<script src="js/loader.js"></script>
<script src="js/run-chart.js"></script>
<script src="js/jquery.magnific-popup.js"></script>
<script src="js/jquery.gifplayer.js"></script>
<script src="js/mediaelement-and-player.js"></script>
<script src="js/mediaelement-playlist-plugin.min.js"></script>

<script src="js/base-init.js"></script>
<script defer src="fonts/fontawesome-all.js"></script>

<script src="Bootstrap/dist/js/bootstrap.bundle.js"></script>

</body>
</html>