<?php
error_reporting(0); 

session_start();
include 'include.php';
$username = $_SESSION['username'];

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
                        <svg class="olymp-dropdown-arrow-icon"><use xlink:href="icons/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
                    </a>
                </h6>
            </div>

            <div id="collapseOne-1" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                <ul class="your-profile-menu">
                    <li>
                        <a href="personal_info.php">Personal Information</a>
                    </li>
                    <li>
                        <a href="30-YourAccount-ChangePassword.html">Change Password</a>
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


    <div class="ui-block-title">
        <a href="33-YourAccount-Notifications.html" class="h6 title">Notifications</a>
        <a href="#" class="items-round-little bg-primary">8</a>
    </div>
    <div class="ui-block-title">
        <a href="34-YourAccount-ChatMessages.html" class="h6 title">Chat / Messages</a>
    </div>
    <div class="ui-block-title">
        <a href="35-YourAccount-FriendsRequests.html" class="h6 title">Friend Requests</a>
        <a href="#" class="items-round-little bg-blue">4</a>
    </div>
    <div class="ui-block-title ui-block-title-small">
        <h6 class="title">FAVOURITE PAGE</h6>
    </div>
    <div class="ui-block-title">
        <a href="36-FavPage-SettingsAndCreatePopup.html" class="h6 title">Create Fav Page</a>
    </div>
    <div class="ui-block-title">
        <a href="36-FavPage-SettingsAndCreatePopup.html" class="h6 title">Fav Page Settings</a>
    </div>
</div>
</div>
</div>
</div>

<!-- ... end Profile Settings Responsive -->


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
										<svg class="olymp-dropdown-arrow-icon"><use xlink:href="icons/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
									</a>
								</h6>
							</div>

							<div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
								<ul class="your-profile-menu">
									<li>
										<a href="personal_info.php">Personal Information</a>
									</li>
									<li>
										<a href="30-YourAccount-ChangePassword.html">Change Password</a>
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


					<div class="ui-block-title">
						<a href="33-YourAccount-Notifications.html" class="h6 title">Following</a>
						<a href="#" class="items-round-little bg-primary">8</a>
					</div>
					<div class="ui-block-title">
						<a href="34-YourAccount-ChatMessages.html" class="h6 title">Followers</a>
					</div>
					
			</div>
		</div>
	</div>
</div>


<!-- ... end Your Account Personal Information -->


<!-- Window-popup-CHAT for responsive min-width: 768px -->

<div class="ui-block popup-chat popup-chat-responsive">
	<div class="ui-block-title">
		<span class="icon-status online"></span>
		<h6 class="title" >Chat</h6>
		<div class="more">
			<svg class="olymp-three-dots-icon"><use xlink:href="icons/icons.svg#olymp-three-dots-icon"></use></svg>
			<svg class="olymp-little-delete js-chat-open"><use xlink:href="icons/icons.svg#olymp-little-delete"></use></svg>
		</div>
	</div>
	<div class="mCustomScrollbar">
		<ul class="notification-list chat-message chat-message-field">
			<li>
				<div class="author-thumb">
					<img src="img/avatar14-sm.jpg" alt="author" class="mCS_img_loaded">
				</div>
				<div class="notification-event">
					<span class="chat-message-item">Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks</span>
					<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
				</div>
			</li>

			<li>
				<div class="author-thumb">
					<img src="img/author-page.jpg" alt="author" class="mCS_img_loaded">
				</div>
				<div class="notification-event">
					<span class="chat-message-item">Don’t worry Mathilda!</span>
					<span class="chat-message-item">I already bought everything</span>
					<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:29pm</time></span>
				</div>
			</li>

			<li>
				<div class="author-thumb">
					<img src="img/avatar14-sm.jpg" alt="author" class="mCS_img_loaded">
				</div>
				<div class="notification-event">
					<span class="chat-message-item">Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks</span>
					<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
				</div>
			</li>
		</ul>
	</div>

	<form>

		<div class="form-group label-floating is-empty">
			<label class="control-label">Press enter to post...</label>
			<textarea class="form-control" placeholder=""></textarea>
			<div class="add-options-message">
				<a href="#" class="options-message">
					<svg class="olymp-computer-icon"><use xlink:href="icons/icons.svg#olymp-computer-icon"></use></svg>
				</a>
				<div class="options-message smile-block">

					<svg class="olymp-happy-sticker-icon"><use xlink:href="icons/icons.svg#olymp-happy-sticker-icon"></use></svg>

					<ul class="more-dropdown more-with-triangle triangle-bottom-right">
						<li>
							<a href="#">
								<img src="img/icon-chat1.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat2.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat3.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat4.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat5.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat6.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat7.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat8.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat9.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat10.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat11.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat12.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat13.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat14.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat15.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat16.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat17.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat18.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat19.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat20.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat21.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat22.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat23.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat24.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat25.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat26.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat27.png" alt="icon">
							</a>
						</li>
					</ul>
				</div>
			</div>
			 </div>

	</form>


</div>

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
<?php

	
}

?>