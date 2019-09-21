<?php
error_reporting(0); 

session_start();
include 'include.php';
if ( $_SESSION['logged_in'] != 1 ) {
	echo "You must log in before viewing your profile page!";
	   
  }
else {
$profile_username = $_GET['profile_username'];
$username = $_SESSION['username'];

$query="SELECT * FROM users WHERE username = '$profile_username'";
$results = mysqli_query($conn,$query);

while ($row = mysqli_fetch_assoc($results)) {
	$user_name = $row['name'];
	$user_hobbies = $row['hobbies'];
	$user_fav_tv_shows = $row['fav_tv_shows'];
	$user_fav_movies = $row['fav_movies'];
	$user_fav_games = $row['fav_games'];
	$user_fav_music = $row['fav_music'];
	$user_fav_books = $row['fav_books'];
	$user_fav_writer = $row['fav_writer'];
	$user_description = $row['description'];
	$user_birthday = $row['birthday'];
	$user_birthplace = $row['birthplace'];
	$user_occupation = $row['occupation'];
	$user_gender = $row['gender'];
	$user_email = $row['email'];
	$user_website = $row['website'];
	$user_phone_no = $row['phone_no'];
	$user_facebook = $row['facebook'];
	$user_twitter = $row['twitter'];
	$user_instagram = $row['instagram'];
	$user_edu1_title = $row['edu1_title'];
	$user_edu1_time = $row['edu1_time'];
	$user_edu1_description = $row['edu1_description'];
	$user_edu2_title = $row['edu2_title'];
	$user_edu2_time = $row['edu2_time'];
	$user_edu2_description = $row['edu2_description'];
	$user_edu3_title = $row['edu3_title'];
	$user_edu3_time = $row['edu3_time'];
	$user_edu3_description = $row['edu3_description'];
	$user_emp1_title = $row['emp1_title'];
	$user_emp1_time = $row['emp1_time'];
	$user_emp1_description = $row['emp1_description'];
	$user_emp2_title = $row['emp2_title'];
	$user_emp2_time = $row['emp2_time'];
	$user_emp2_description = $row['emp2_description'];
	$user_emp3_title = $row['emp3_title'];
	$user_emp3_time = $row['emp3_time'];
	$user_emp3_description = $row['emp3_description'];

}

if(isset($_REQUEST['follow'])){
	$user_username = $_POST['profile_username'];
	$sql = "INSERT INTO followers ( user1 , following) " 
. "VALUES ('$username' , '$user_username' )";
if ($conn->query($sql)){
	header("location: newsfeed.php");
}
}
if(isset($_REQUEST['unfollow'])){
	$user_username = $_POST['profile_username'];
	$sql = "DELETE FROM followers WHERE user1 = '$username' AND following = '$user_username'";
if ($conn->query($sql)){
	header("location: newsfeed.php");
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

	<title>Favorit Page - About</title>

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
	<link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" type="text/css" href="css/swiper.min.css">

	<!-- Lightbox popup script-->
	<link rel="stylesheet" type="text/css" href="css/magnific-popup.css">


</head>
<body>

<!-- Fixed Sidebar Left -->
<?php include 'side_panel.php'; ?>
<!-- ... end Fixed Sidebar Left -->


<!-- Fixed Sidebar Right -->

<!-- ... end Fixed Sidebar Right -->

<!-- Fixed Sidebar Right -->

<div class="fixed-sidebar right fixed-sidebar-responsive">

	<div class="fixed-sidebar-right sidebar--small" id="sidebar-right-responsive">

		<a href="#" class="olympus-chat inline-items js-chat-open">
			<svg class="olymp-chat---messages-icon"><use xlink:href="icons/icons.svg#olymp-chat---messages-icon"></use></svg>
		</a>

	</div>

</div>

<!-- ... end Fixed Sidebar Right -->


<!-- Header -->
<?php include'header.php'; ?>


<!-- ... end Header -->


<!-- Responsive Header -->
<?php
include 'mobile_header.php';
?>
<!-- ... end Responsive Header -->

<div class="header-spacer"></div>

<div class="container">
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="ui-block">
				<div class="top-header top-header-favorit">
					<div class="top-header-thumb">
						<img src="img/top-header2.jpg" alt="nature">
						<div class="top-header-author">
							<div class="author-thumb">
								<img src="img/author-main2.jpg" alt="author">
							</div>
							<div class="author-content">
								<a href="#" class="h3 author-name"><?php echo $user_name; ?></a>
								<div class="country"><?php echo $user_birthplace; ?></div>
							</div>
						</div>
					</div>
					<div class="profile-section">
						<div class="row">
							<div class="col-xl-8 m-auto col-lg-8 col-md-12">
								<ul class="profile-menu">
								<?php
$follow_result = $conn->query("SELECT * FROM followers WHERE user1='$username' AND following = '$profile_username'");

if ( $follow_result->num_rows == 0 ){
	?> 
 <form action="people_profile.php" method="post" > 
						<button class="btn btn-sm bg-blue" type="submit" name="follow">Follow</button>
						<input type="hidden" name="profile_username" value="<?php echo $profile_username; ?>"/>
						</form>	
<?php } else { ?>
<form action="people_profile.php" method="post" > 
<button class="btn btn-sm bg-blue" type="submit" name="unfollow">Unfollow</button>
<input type="hidden" name="profile_username" value="<?php echo $profile_username; ?>"/>
</form>	

<?php } ?>
								<li>
										<a <?php echo ' href="people_profile.php?profile_username=' . $profile_username . '">'?>Timeline</a>
									</li>
									<li>
										<a <?php echo ' href="people_following.php?profile_username=' . $profile_username . '">'?>Following</a>
									</li>
									<li>
										<a <?php echo ' href="people_followers.php?profile_username=' . $profile_username . '">'?>Followers</a>
									</li>
									<li>
										<a class="active" <?php echo ' href="people_about.php?profile_username=' . $profile_username . '">'?>About</a>
									</li>
									<li>
										<a href="09-ProfilePage-Videos.html">Spotify playlist</a>
									</li>
								</ul>
							</div>
						</div>

						<div class="control-block-button">
							<a href="#" class="btn btn-control bg-primary">
								<svg class="olymp-star-icon"><use xlink:href="icons/icons.svg#olymp-star-icon"></use></svg>
							</a>

							<a href="#" class="btn btn-control bg-purple">
								<svg class="olymp-chat---messages-icon"><use xlink:href="icons/icons.svg#olymp-chat---messages-icon"></use></svg>
							</a>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-xl-8 order-xl-2 col-lg-8 order-lg-2 col-md-12 order-md-1 col-sm-12 col-xs-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Hobbies and Interests</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>
				<div class="ui-block-content">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<ul class="widget w-personal-info item-block">
								<li>
									<span class="title">Hobbies:</span>
							<span class="text"><?php echo htmlspecialchars($user_hobbies); ?>
							</span>
								</li>
								<li>
									<span class="title">Favourite TV Shows:</span>
									<span class="text"><?php echo htmlspecialchars($user_fav_tv_shows); ?></span>
								</li>
								<li>
									<span class="title">Favourite Movies:</span>
									<span class="text"><?php echo htmlspecialchars($user_fav_movies); ?> </span>
								</li>
								<li>
									<span class="title">Favourite Games:</span>
									<span class="text"><?php echo htmlspecialchars($user_fav_games); ?></span>
								</li>
							</ul>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<ul class="widget w-personal-info item-block">
								<li>
									<span class="title">Favourite Music Bands / Artists:</span>
									<span class="text"><?php echo htmlspecialchars($user_fav_music); ?></span>
								</li>
								<li>
									<span class="title">Favourite Books:</span>
									<span class="text"><?php echo htmlspecialchars($user_fav_books); ?></span>
								</li>
								<li>
									<span class="title">Favourite Writers:</span>
									<span class="text"><?php echo htmlspecialchars($user_fav_writer); ?> </span>
								</li>
								<li>
									<span class="title">Other Interests:</span>
									<span class="text"><?php echo htmlspecialchars($user_description); ?></span>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Education and Employement</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>
				<div class="ui-block-content">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<ul class="widget w-personal-info item-block">
								<li>
									<span class="title"><?php echo htmlspecialchars($user_edu1_title); ?></span>
									<span class="date"><?php echo htmlspecialchars($user_edu1_time); ?></span>
									<span class="text"><?php echo htmlspecialchars($user_edu1_description); ?></span>
								</li>
								<li>
									<span class="title"><?php echo htmlspecialchars($user_edu2_title); ?></span>
									<span class="date"><?php echo htmlspecialchars($user_edu2_time); ?></span>
									<span class="text"><?php echo htmlspecialchars($user_edu2_description); ?></span>
								</li>
								<li>
									<span class="title"><?php echo htmlspecialchars($user_edu3_title); ?></span>
									<span class="date"><?php echo htmlspecialchars($user_edu3_time); ?></span>
									<span class="text"><?php echo htmlspecialchars($user_edu3_description); ?></span>
								</li>
								</ul>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<ul class="widget w-personal-info item-block">
								<li>
									<span class="title"><?php echo htmlspecialchars($user_emp1_title); ?></span>
									<span class="date"><?php echo htmlspecialchars($user_emp1_time); ?></span>
									<span class="text"><?php echo htmlspecialchars($user_emp1_description); ?></span>
								</li>
								
								<li>
									<span class="title"><?php echo htmlspecialchars($user_emp2_title); ?></span>
									<span class="date"><?php echo htmlspecialchars($user_emp2_time); ?></span>
									<span class="text"><?php echo htmlspecialchars($user_emp2_description); ?></span>
								</li>
								
								<li>
									<span class="title"><?php echo htmlspecialchars($user_emp3_title); ?></span>
									<span class="date"><?php echo htmlspecialchars($user_emp3_time); ?></span>
									<span class="text"><?php echo htmlspecialchars($user_emp3_description); ?></span>
								</li>	
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 order-xl-1 col-lg-4 order-lg-1 col-md-12 order-md-2 col-sm-12 col-xs-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Personal Info</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>
				<div class="ui-block-content">
					<ul class="widget w-personal-info">
						<li>
							<span class="title">About Me:</span>
							<span class="text"><?php echo htmlspecialchars($user_description); ?>
							</span>
						</li>
						<li>
							<span class="title">Birthday:</span>
							<span class="text"><?php echo htmlspecialchars($user_birthday); ?></span>
						</li>
						<li>
							<span class="title">Birthplace:</span>
							<span class="text"><?php echo htmlspecialchars($user_birthplace); ?></span>
						</li>
						<li>
							<span class="title">Occupation:</span>
							<span class="text"><?php echo htmlspecialchars($user_occupation); ?></span>
						</li>
						<li>
							<span class="title">Gender:</span>
							<span class="text"><?php echo htmlspecialchars($user_gender); ?></span>
						</li>
						<li>
							<span class="title">Email:</span>
							<a href="#" class="text"><?php echo htmlspecialchars($user_email); ?></a>
						</li>
						<li>
							<span class="title">Website:</span>
							<a href="#" class="text"><?php echo htmlspecialchars($user_website); ?></a>
						</li>
						<li>
							<span class="title">Phone Number:</span>
							<span class="text"><?php echo htmlspecialchars($user_phone_no); ?></span>
						</li>
					</ul>

					<div class="widget w-socials">
						<h6 class="title">Other Social Networks:</h6>
						<a class="social-item bg-facebook" <?php echo ' href="https://www.facebook.com/' . $user_facebook . '"'?>>
							<i class="fa fa-facebook" aria-hidden="true"></i>
							Facebook
						</a>
						<a class="social-item bg-twitter"<?php echo ' href="https://www.twitter.com/' . $user_twitter . '"'?>>
							<i class="fa fa-twitter" aria-hidden="true"></i>
							Twitter
						</a>
						<a class="social-item bg-twitter"<?php echo ' href="https://www.instagram.com/' . $user_instagram . '"'?>>
							<i class="fa fa-instagram" aria-hidden="true"></i>
							Instagram
						</a>
						
						<a class="social-item bg-twitter"<?php echo ' href="https://www.instagram.com/' . $user_instagram . '"'?>>
							<i class="fa fa-github" aria-hidden="true"></i>
							Github
						</a>
						
						<a class="social-item bg-twitter"<?php echo ' href="https://www.instagram.com/' . $user_instagram . '"'?>>
							<i class="fa fa-discord" aria-hidden="true"></i>
							Discord
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

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

<!-- Lightbox popup script-->
<script src="js/jquery.magnific-popup.min.js"></script>

<!-- Swiper / Sliders -->
<script src="js/swiper.jquery.min.js"></script>

<script src="js/mediaelement-and-player.min.js"></script>
<script src="js/mediaelement-playlist-plugin.min.js"></script>


</body>
</html>
<?php } ?>