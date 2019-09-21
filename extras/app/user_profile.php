<?php
error_reporting(0); 
include 'include_profile.php';

session_start();
if ( $_SESSION['logged_in'] != 1 ) {
	echo "You must log in before viewing your profile page!";
	   
  }
else {

$username = $_SESSION['username'];
include 'include.php';
$query="SELECT * FROM users WHERE username = '$username'";
$results = mysqli_query($conn,$query);

while ($row = mysqli_fetch_assoc($results)) {

?>



<!DOCTYPE html>
<html lang="en">
<head>

	<title>Profile Page - About</title>

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
<?php include 'mobile_header.php';?>
<!-- ... end Responsive Header -->

<div class="header-spacer"></div>

<!-- Top Header -->

<div class="container">
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="ui-block">
				<div class="top-header">
					<div class="top-header-thumb">
						<img src="img/top-header1.jpg" alt="nature">
					</div>
					<div class="profile-section">
					<div class="row">
							<div class="col-lg-5 col-md-5 ">
								<ul class="profile-menu">
									<li>
										<a href="user_timeline.php" >Timeline</a>
									</li>
									<li>
										<a href="user_profile.php"class="active">About</a>
									</li>
								</ul>
							</div>
							<div class="col-lg-5 ml-auto col-md-5">
								<ul class="profile-menu">
									<li>
										<a href="user_following.php">Following</a>
									</li>
									<li>
										<a href="user_followers.php">Followers</a>
									</li>
									<li>
										<div class="more">
											<svg class="olymp-three-dots-icon"><use xlink:href="icons/icons.svg#olymp-three-dots-icon"></use></svg>
											<ul class="more-dropdown more-with-triangle">
												<li>
													<a href="#">Report Profile</a>
												</li>
												<li>
													<a href="#">Block Profile</a>
												</li>
											</ul>
										</div>
									</li>
								</ul>
							</div>
						</div>
					

						<div class="control-block-button">
							<a href="35-YourAccount-FriendsRequests.html" class="btn btn-control bg-blue">
								<svg class="olymp-happy-face-icon"><use xlink:href="icons/icons.svg#olymp-happy-face-icon"></use></svg>
							</a>

							<a href="#" class="btn btn-control bg-purple">
								<svg class="olymp-chat---messages-icon"><use xlink:href="icons/icons.svg#olymp-chat---messages-icon"></use></svg>
							</a>

							<div class="btn btn-control bg-primary more">
								<svg class="olymp-settings-icon"><use xlink:href="icons/icons.svg#olymp-settings-icon"></use></svg>

								<ul class="more-dropdown more-with-triangle triangle-bottom-right">
									<li>
										<a href="#" data-toggle="modal" data-target="#update-profile-photo">Update Profile Photo</a>
									</li>
									<li>
										<a href="#" data-toggle="modal" data-target="#update-header-photo">Update Header Photo</a>
									</li>
									<li>
										<a href="29-YourAccount-AccountSettings.html">Account Settings</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="top-header-author">
						<a href="user_profile.php" class="author-thumb">
							<img src="https://res.cloudinary.com/novicetopro/profile_pictures/128X128/<?php echo $row['profile_hash'];?>" alt="author">
						</a>
						<div class="author-content">
							<a href="user_profile.php" class="h4 author-name"><?php echo $username ?></a>
							<div class="country"><?php echo htmlspecialchars($row['birthplace']); ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- ... end Top Header -->

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
							<span class="text"><?php echo htmlspecialchars($row['hobbies']); ?>
							</span>
								</li>
								<li>
									<span class="title">Favourite TV Shows:</span>
									<span class="text"><?php echo htmlspecialchars($row['fav_tv_shows']); ?></span>
								</li>
								<li>
									<span class="title">Favourite Movies:</span>
									<span class="text"><?php echo htmlspecialchars($row['fav_movies']); ?></span>
								</li>
								<li>
									<span class="title">Favourite Games:</span>
									<span class="text"><?php echo htmlspecialchars($row['fav_games']); ?></span>
								</li>
							</ul>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<ul class="widget w-personal-info item-block">
								<li>
									<span class="title">Favourite Music Bands / Artists:</span>
									<span class="text"><?php echo htmlspecialchars($row['fav_music']); ?></span>
								</li>
								<li>
									<span class="title">Favourite Books:</span>
									<span class="text"><?php echo htmlspecialchars($row['fav_books']); ?></span>
								</li>
								<li>
									<span class="title">Favourite Writers:</span>
									<span class="text"><?php echo htmlspecialchars($row['fav_writer']); ?></span>
								</li>
								<li>
									<span class="title">Other Interests:</span>
									<span class="text"><?php echo htmlspecialchars($row['other_hobbies']); ?></span>
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
									<span class="title"><?php echo htmlspecialchars($row['edu1_title']); ?></span>
									<span class="date"><?php echo htmlspecialchars($row['edu1_time']); ?></span>
									<span class="text"><?php echo htmlspecialchars($row['edu1_description']); ?></span>
								</li>
								<li>
									<span class="title"><?php echo htmlspecialchars($row['edu2_title']); ?></span>
									<span class="date"><?php echo htmlspecialchars($row['edu2_time']); ?></span>
									<span class="text"><?php echo htmlspecialchars($row['edu2_description']); ?></span>
								</li>
								<li>
									<span class="title"><?php echo htmlspecialchars($row['edu3_title']); ?></span>
									<span class="date"><?php echo htmlspecialchars($row['edu3_time']); ?></span>
									<span class="text"><?php echo htmlspecialchars($row['edu3_description']); ?></span>
								</li>
							</ul>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<ul class="widget w-personal-info item-block">
							<li>
									<span class="title"><?php echo htmlspecialchars($row['emp1_title']); ?></span>
									<span class="date"><?php echo htmlspecialchars($row['emp1_time']); ?></span>
									<span class="text"><?php echo htmlspecialchars($row['emp1_description']); ?></span>
								</li>
								
								<li>
									<span class="title"><?php echo htmlspecialchars($row['emp2_title']); ?></span>
									<span class="date"><?php echo htmlspecialchars($row['emp2_time']); ?></span>
									<span class="text"><?php echo htmlspecialchars($row['emp2_description']); ?></span>
								</li>
								
								<li>
									<span class="title"><?php echo htmlspecialchars($row['emp3_title']); ?></span>
									<span class="date"><?php echo htmlspecialchars($row['emp3_time']); ?></span>
									<span class="text"><?php echo htmlspecialchars($row['emp3_description']); ?></span>
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
							<span class="text"><?php echo htmlspecialchars($row['description']); ?>
							</span>
						</li>
						<li>
							<span class="title">Birthday:</span>
							<span class="text"><?php echo htmlspecialchars($row['birthday']); ?></span>
						</li>
						<li>
							<span class="title">Lives in:</span>
							<span class="text"><?php echo htmlspecialchars($row['birthplace']); ?></span>
						</li>
						<li>
							<span class="title">Occupation:</span>
							<span class="text"><?php echo htmlspecialchars($row['occupation']); ?></span>
						</li>
						<li>
							<span class="title">Gender:</span>
							<span class="text"><?php echo htmlspecialchars($row['gender']); ?></span>
						</li>
						<li>
							<span class="title">Email:</span>
							<a href="#" class="text"><?php echo htmlspecialchars($row['email']); ?></a>
						</li>
						<li>
							<span class="title">Website:</span>
							<a href="#" class="text"><?php echo htmlspecialchars($row['website']); ?></a>
						</li>
						<li>
							<span class="title">Phone Number:</span>
							<span class="text"><?php echo htmlspecialchars($row['phone_no']); ?></span>
						</li>
					</ul>
					<div class="widget w-socials">
						<h6 class="title">Other Social Networks:</h6>
						<a class="social-item bg-facebook" <?php echo ' href="https://www.facebook.com/' . $row['facebook'] . '"'?>>
							<i class="fa fa-facebook" aria-hidden="true"></i>
							Facebook
						</a>
						<a class="social-item bg-twitter"<?php echo ' href="https://www.twitter.com/' . $row['twitter'] . '"'?>>
							<i class="fa fa-twitter" aria-hidden="true"></i>
							Twitter
						</a>
						<a class="social-item bg-twitter"<?php echo ' href="https://www.instagram.com/' . $row['instagram'] . '"'?>>
							<i class="fa fa-instagram" aria-hidden="true"></i>
							Instagram
						</a>
						
						<a class="social-item bg-twitter"<?php echo ' href="https://www.instagram.com/' . $row['instagram'] . '"'?>>
							<i class="fa fa-github" aria-hidden="true"></i>
							Github
						</a>
						
						<a class="social-item bg-twitter"<?php echo ' href="https://www.instagram.com/' . $row['instagram'] . '"'?>>
							<i class="fa fa-discord" aria-hidden="true"></i>
							Discord
						</a>
					</div>
					
					</div>
			</div>
		</div>
	</div>
</div>

<?php
}
?>


<!-- Window-popup Update Header Photo -->

<div class="modal fade" id="update-profile-photo">
	<div class="modal-dialog ui-block window-popup update-profile-photo">
		<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
			<svg class="olymp-close-icon"><use xlink:href="icons/icons.svg#olymp-close-icon"></use></svg>
		</a>

		<div class="ui-block-title">
			<h6 class="title">Update Profile Photo</h6>
		</div>

		<a href="#" class="upload-photo-item">
			<svg class="olymp-computer-icon"><use xlink:href="icons/icons.svg#olymp-computer-icon"></use></svg>

			
<form action="profile_upload.php" method="post" enctype="multipart/form-data">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="file-upload">
		<input type="file" name="myfile" id="fileToUpload">
        <input type="submit" name="submit" value="Upload" >
		<input type="hidden" name="prof_username" value="<?php echo $_SESSION['username']; ?>">
		</div>
</div>
</form>

</body>


		</a>

	

		
		</a>
	</div>
</div>




<!-- ... end Window-popup Update Header Photo -->



<!-- ... end Window-popup Choose from my Photo -->


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

<script src="js/mediaelement-and-player.min.js"></script>
<script src="js/mediaelement-playlist-plugin.min.js"></script>

</body>
</html>
<?php } ?>