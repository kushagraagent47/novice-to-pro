<?php
error_reporting(0); 
session_start();
include 'include.php';
include 'include_profile.php';
$username = $_SESSION['username'];
if (isset($_POST['save'])) {




$name = $_POST['name'];
$website = $_POST['website'];
$email = $_POST['email'];
$birthday = $_POST['datetimepicker'];
$phone_number = $_POST['phone_number'];
$description = $_POST['description'];
$birthplace = $_POST['birth_place'];
$occupation = $_POST['occupation'];
$gender = $_POST['gender'];
$facebook = $_POST['facebook'];
$twitter = $_POST['twitter'];
$instagram = $_POST['instagram'];
$discord = $_POST['discord']; 


$result = $conn->query("SELECT * FROM users WHERE username='$username'") or die($mysqli->error());
$sql = "UPDATE users SET name='$name', website = '$website', email = '$email', phone_no = '$phone_number' , description = '$description'
, birthplace = '$birthplace' , birthday='$birthday' ,occupation = '$occupation', gender = '$gender' , facebook = '$facebook', twitter = '$twitter' , discord = '$discord', instagram = '$instagram' WHERE username='$username'";
if ( $conn->query($sql) ){
	
	header("location:newsfeed.php");
} 
else {
  echo "Something went wrong!";
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

</head>
<body>

<!-- Profile Settings Responsive -->
<?php

$query="SELECT * FROM users WHERE username = '$username'";
$results = mysqli_query($conn,$query);
while ($row = mysqli_fetch_assoc($results)) {
?>

<!-- ... end Profile Settings Responsive -->


<!-- Fixed Sidebar Left -->
<?php include 'side_panel.php'; ?>
<!-- ... end Fixed Sidebar Left -->


<!-- Fixed Sidebar Right -->

<!-- ... end Fixed Sidebar Right -->

<!-- Fixed Sidebar Right -->

<!-- ... end Fixed Sidebar Right -->


<!-- Header -->
<?php include'header.php'; ?>

<!-- ... end Header -->


<!-- Responsive Header -->
<?php include 'mobile_header.php';?>
<!-- ... end Responsive Header -->


<div class="header-spacer header-spacer-small"></div>


<!-- Main Header Your Account -->



<!-- ... end Main Header Your Account -->


<!-- Your Account Personal Information -->
<form method="post" action="personal_info.php">
<div class="container">
	<div class="row">
		<div class="col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-xs-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Personal Information</h6>
				</div>
				<div class="ui-block-content">
						<div class="row">

							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="form-group label-floating">
									<label class="control-label">Your Name</label>
									<input class="form-control" placeholder="" type="text" name="name" value="<?php echo htmlspecialchars($row['name']); ?>">
								</div>

								<div class="form-group label-floating">
									<label class="control-label">Your Email</label>
									<input class="form-control" placeholder="" type="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>">
								</div>

								<div class="form-group date-time-picker label-floating">
									<label class="control-label" name="birthday">Your Birthday</label>
									<input name="datetimepicker" value="<?php echo htmlspecialchars($row['birthday']); ?>" />
									<span class="input-group-addon">
										<svg class="olymp-month-calendar-icon icon"><use xlink:href="icons1/icons.svg#olymp-month-calendar-icon"></use></svg>
									</span>
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								

								<div class="form-group label-floating">
									<label class="control-label">Your Website</label>
									<input class="form-control" placeholder="" name="website" type="" value="<?php echo htmlspecialchars($row['website']); ?>">
								</div>


								<div class="form-group label-floating is-empty">
									<label class="control-label">Your Phone Number</label>
									<input class="form-control" placeholder="" name="phone_number" value ="<?php echo htmlspecialchars($row['phone_no']); ?>" type="text">
								</div>
							</div>

							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								
							</div>
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								
							</div>
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								</div>
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="form-group label-floating">
									<label class="control-label">Write a little description about you</label>
									<textarea class="form-control" name="description" placeholder=""value = "<?php echo htmlspecialchars($row['description']); ?>"></textarea>
								</div>

								
								</div>
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="form-group label-floating is-empty">
									<label class="control-label">Your Birthplace</label>
									<input class="form-control" name="birth_place" value="<?php echo htmlspecialchars($row['birthplace']); ?>" placeholder="" type="text">
								</div>

								<div class="form-group label-floating">
									<label class="control-label">Your Occupation</label>
									<input class="form-control" placeholder="" name="occupation" type="text" value="<?php echo htmlspecialchars($row['occupation']); ?>">
								</div>

								<div class="form-group label-floating is-select">
									</div>

								<div class="form-group label-floating">
									</div>
							</div>
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="form-group with-icon label-floating">
									<label class="control-label">Your Facebook Account</label>
									<input class="form-control" type="text" name="facebook"value="<?php echo htmlspecialchars($row['facebook']); ?>">
									<i class="fa fa-facebook c-facebook" aria-hidden="true"></i>
								</div>
								<div class="form-group with-icon label-floating">
									<label class="control-label">Your Twitter Account</label>
									<input class="form-control" name="twitter" type="text" value="<?php echo htmlspecialchars($row['twitter']); ?>">
									<i class="fa fa-twitter c-twitter" aria-hidden="true"></i>
								</div>
								<div class="form-group with-icon label-floating is-empty">
									<label class="control-label">Your Instagram Account</label>
									<input class="form-control" name="instagram" value ="<?php echo htmlspecialchars($row['instagram']); ?>"type="text">
									<i class="fa fa-instagram c-instagram" aria-hidden="true"></i>
								</div>
								<div class="form-group with-icon label-floating">
									<label class="control-label">discord</label>
									<input class="form-control" type="text" name="discord" value="<?php echo htmlspecialchars($row['instagram']); } ?>">
									<i class="fa fa-discord c-discord" name="discord" aria-hidden="true"></i>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<button class="btn btn-secondary btn-lg full-width">Restore all Attributes</button>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<button type="submit" class="btn btn-primary btn-lg full-width" name="save">Save all Changes</button>
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
										<svg class="olymp-dropdown-arrow-icon"><use xlink:href="icons1/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
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


<!-- Window-popup-CHAT for responsive min-width: 768px -->

<!-- ... end Window-popup-CHAT for responsive min-width: 768px -->



<!-- jQuery first, then Other JS. -->

</body>
</html>
