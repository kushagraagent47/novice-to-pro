
<!DOCTYPE html>
<html lang="en">
<head>

	<title>NOVICETOPRO</title>

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

	<!-- Theme Styles CSS -->
	<link rel="stylesheet" type="text/css" href="css/theme-styles.css">
	<link rel="stylesheet" type="text/css" href="css/blocks.css">
	<link rel="stylesheet" type="text/css" href="css/fonts.css">

	<!-- Styles for plugins -->
	<link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" type="text/css" href="css/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-select.css">


</head>

<body class="landing-page">

<div class="content-bg-wrap">
	<div class="content-bg"></div>
</div>


<!-- Landing Header -->
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
		?>
		<div class="modal" id="myModal" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
				  <div class="modal-content">
					<div class="modal-header">
					  <h5 class="modal-title"><b>user with this email already exists<b></h5>
					  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</div>
					<div class="modal-body">
					 <p></p>
					</div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-primary" onClick="document.location.href='index.php'" >Try again</button>
					</div>
				  </div>
				</div>
			  </div>
			  <?php
	}
	else if ($user_result->num_rows > 0) {

		?>
		<div class="modal" id="myModal" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
				  <div class="modal-content">
					<div class="modal-header">
					  <h5 class="modal-title"><b>Username in use<b></h5>
					  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</div>
					<div class="modal-body">
					 <p></p>
					</div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-primary" onClick="document.location.href='index.php'" >Try again</button>
					</div>
				  </div>
				</div>
			  </div>
			  <?php
	  
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
$pass = md5($_POST['password']);
$password = $conn->escape_string($pass);
$result = $conn->query("SELECT * FROM users WHERE email='$email'");
$result1 = $conn->query("SELECT * FROM users WHERE password='$password'");

if ( $result->num_rows == 0 ){ 
?>
<div class="modal" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><b>Username or password is incorrect<b></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
             <p></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" onClick="document.location.href='index.php'" >Try again</button>
            </div>
          </div>
        </div>
      </div>
	  <?php
}
if ( $result1->num_rows == 0 ){ 
	?>
	<div class="modal" id="myModal" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
			  <div class="modal-content">
				<div class="modal-header">
				  <h5 class="modal-title"><b>Username or password is incorrect<b></h5>
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</div>
				<div class="modal-body">
				 <p></p>
				</div>
				<div class="modal-footer">
				  <button type="button" class="btn btn-primary" onClick="document.location.href='index.php'" >Back to home</button>
				</div>
			  </div>
			</div>
		  </div>
		  <?php
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
<div class="container">
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12">
			<div id="site-header-landing" class="header-landing">
				<a href="02-ProfilePage.html" class="logo">
					<img src="img/logo.png" alt="Olympus">
					<h5 class="logo-title">NOVICETOPRO</h5>
				</a>

				<ul class="profile-menu">
					<li>
						<a href="#">About Us</a>
					</li>
					<li>
						<a href="#">Careers</a>
					</li>
					<li>
						<a href="#">FAQS</a>
					</li>
					<li>
						<a href="#">Help & Support</a>
					</li>
					<li>
						<a href="#" class="js-expanded-menu">
							<svg class="olymp-menu-icon"><use xlink:href="icons/icons.svg#olymp-menu-icon"></use></svg>
							<svg class="olymp-close-icon"><use xlink:href="icons/icons.svg#olymp-close-icon"></use></svg>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<!-- ... end Landing Header -->

<!-- Login-Registration Form  -->

<div class="container">
	<div class="row display-flex">
		<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
			<div class="landing-content">
				<h1>Welcome to NOVICETOPRO</h1>
				<p>Share your
					thoughts, write blog posts, show your favourite music via Spotify, earn badges and much more!
				</p>
				<a href="#" class="btn btn-md btn-border c-white">Register Now!</a>
			</div>
		</div>

		<div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-xs-12">
			<div class="registration-login-form">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#home" role="tab">
							<svg class="olymp-login-icon"><use xlink:href="icons/icons.svg#olymp-login-icon"></use></svg>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#profile" role="tab">
							<svg class="olymp-register-icon"><use xlink:href="icons/icons.svg#olymp-register-icon"></use></svg>
						</a>
					</li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane active" id="home" role="tabpanel" data-mh="log-tab">
						<div class="title h6">Register to NOVICETOPRO</div>
						<form action="index.php" method="post" >
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
												<input name="optionsCheckboxes" type="checkbox" required>
												I accept the <a href="#">Terms and Conditions</a> of the website
											</label>
										</div>
									</div>


									<button type="submit" class="btn btn-purple btn-lg full-width" name="register">Complete Registration!</button>
									
									<div class="or"></div>
			
			<a href="#" class="btn btn-lg bg-twitter full-width btn-icon-left"><i class="fa fa-google" aria-hidden="true"><div class="g-signin2" data-onsuccess="onSignIn"></div>
</i>Signup with google</a>

		<a href="#" class="btn btn-lg bg-twitter full-width btn-icon-left"><i class="fa fa-twitter" aria-hidden="true"></i>Signup with Twitter</a>

								</div>
							</div>
						</form>
					</div>

					<div class="tab-pane" id="profile" role="tabpanel" data-mh="log-tab">
						<div class="title h6">Login to your Account</div>
						<form action="index.php" method="post" >
							<div class="row">
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

										
										<p>Don’t you have an account? <a href="index.php">Register Now!</a> it’s really simple and you can start enjoing all the benefits!</p>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- ... end Login-Registration Form  -->





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

<!-- Swiper / Sliders -->
<script src="js/swiper.jquery.min.js"></script>

<!-- Datepicker input field script-->
<script src="js/moment.min.js"></script>
<script src="js/daterangepicker.min.js"></script>

<script src="js/mediaelement-and-player.min.js"></script>
<script src="js/mediaelement-playlist-plugin.min.js"></script>
<!-- GOOGLE LOGIN -->
<script src="https://apis.google.com/js/platform.js" async defer></script>




</body>
</html>
<script>
$('#myModal').modal();
</script>