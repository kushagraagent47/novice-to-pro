<?php
error_reporting(0); 
include 'include_profile.php';

session_start();
include 'include.php';
$username = $_SESSION['username'];
if ( $_SESSION['verified'] != 1 ) {
	?><script type="text/javascript">
	window.location.href = 'verify_page.php';
	</script>

<?php
  }
if (isset($_POST['save'])) {

$hobbies = $_POST['hobbies'];
$fav_tv_shows = $_POST['fav_tv_shows'];
$fav_movies = $_POST['fav_movies'];
$fav_games = $_POST['fav_games'];
$fav_music = $_POST['fav_music'];
$fav_books = $_POST['fav_books'];
$fav_writers = $_POST['fav_writer'];
$other_intrests = $_POST['other_intrests'];
		
$result = $conn->query("SELECT * FROM users WHERE username='$username'") or die($mysqli->error());
$sql = "UPDATE users SET hobbies='$hobbies', fav_tv_shows = '$fav_tv_shows', fav_movies = '$fav_movies', fav_games = '$fav_games', fav_music = '$fav_music', fav_books = '$fav_books' , fav_writer = '$fav_writers', other_hobbies='$other_intrests' WHERE username='$username'";
if ( $conn->query($sql) ){
			header("location: intrests.php");    
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>

	<title>Your Account - Hobbies And Interests</title>

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


<!-- Fixed Sidebar Left -->
<?php include'side_panel.php'; ?>


<!-- ... end Fixed Sidebar Left -->


<!-- Fixed Sidebar Right -->

<!-- Header -->
<?php include'header.php'; ?>
<!-- ... end Header -->


<!-- Responsive Header -->
<?php include 'mobile_header.php';?>
<!-- ... end Responsive Header -->


<div class="header-spacer header-spacer-small"></div>


<!-- Main Header Your Account -->


<!-- ... end Main Header Your Account -->


<?php

$query="SELECT * FROM users WHERE username = '$username'";
$results = mysqli_query($conn,$query);
while ($row = mysqli_fetch_assoc($results)) {
?>
<!-- Your Account Personal Information -->
<form method="post" action="intrests.php">
<div class="container">
	<div class="row">
		<div class="col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-xs-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Hobbies and Interests</h6>
				</div>
				<div class="ui-block-content">
					
						<div class="row">

							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="form-group label-floating">
									<label class="control-label">Hobbies</label>
								<textarea class="form-control" placeholder="" name="hobbies" ><?php echo htmlspecialchars($row['hobbies']); ?>
								</textarea>
								</div>
								<div class="form-group label-floating">
									<label class="control-label">Favourite TV Shows</label>
									<textarea class="form-control" placeholder=""  name="fav_tv_shows"><?php echo htmlspecialchars($row['fav_tv_shows']); ?></textarea>
								</div>
								<div class="form-group label-floating">
									<label class="control-label">Favourite Movies</label>
									<textarea class="form-control" placeholder="" name="fav_movies" ><?php echo htmlspecialchars($row['fav_movies']); ?> </textarea>
								</div>
								<div class="form-group label-floating">
									<label class="control-label">Favourite Games</label>
									<textarea class="form-control" placeholder="" name="fav_games" ><?php echo htmlspecialchars($row['fav_games']); ?> </textarea>
								</div>

								<button class="btn btn-secondary btn-lg full-width">Cancel</button>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="form-group label-floating">
									<label class="control-label">Favourite Music Bands / Artists</label>
									<textarea class="form-control" placeholder="" name="fav_music" ><?php echo htmlspecialchars($row['fav_music']); ?></textarea>
								</div>
								<div class="form-group label-floating">
									<label class="control-label">Favourite Books</label>
									<textarea class="form-control" placeholder="" name="fav_books" ><?php echo htmlspecialchars($row['fav_books']); ?></textarea>
								</div>
								<div class="form-group label-floating">
									<label class="control-label">Favourite Writers</label>
									<textarea class="form-control" placeholder="" name="fav_writer" ><?php echo htmlspecialchars($row['fav_writer']); ?></textarea>
								</div>
								<div class="form-group label-floating">
									<label class="control-label">Other intrests</label>
									<textarea class="form-control" placeholder="" name="other_intrests" ><?php echo htmlspecialchars($row['other_hobbies']); ?></textarea>
								</div>
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


<!-- ... end Your Account Personal Information -->


<!-- Window-popup-CHAT for responsive min-width: 768px --

</body>
</html>
<?php

	
}

?>