<?php
error_reporting(0); 
include 'include_profile.php';

session_start();
$username = $_SESSION['username'];
include 'include.php';
$query="SELECT * FROM users WHERE username = '$username'";
$results = mysqli_query($conn,$query);
$tutorial2 = 0;
while ($row = mysqli_fetch_assoc($results)) {
$tutorial2 = $row['tutorial2'];
?>



<!DOCTYPE html>
<html lang="en">
<head>

	<title>Profile Page - About</title>

	<!-- Required meta tags always come first -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<!--Bootstrap Tour CSS -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tour/0.11.0/css/bootstrap-tour-standalone.min.css" rel="stylesheet"/>
	<!-- END -->

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
											<svg class="olymp-three-dots-icon"><use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use></svg>
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
							<a href="user_following.php" class="btn btn-control bg-blue">
								<svg class="olymp-happy-face-icon"><use xlink:href="icons1/icons.svg#olymp-happy-face-icon"></use></svg>
							</a>

							<a href="user_followers.php" class="btn btn-control bg-purple">
								<svg class="olymp-chat---messages-icon"><use xlink:href="icons1/icons.svg#olymp-chat---messages-icon"></use></svg>
							</a>

							<div class="btn btn-control bg-primary more" id="step1">
								<svg class="olymp-settings-icon"><use xlink:href="icons1/icons.svg#olymp-settings-icon"></use></svg>

								<ul class="more-dropdown more-with-triangle triangle-bottom-right">
									<li>
										<a href="#" data-toggle="modal" data-target="#update-profile-photo">Update Profile Photo</a>
									</li>
									<li>
										<a href="#" data-toggle="modal" data-target="#update-header-photo">Update Header Photo</a>
									</li>
									<li>
										<a href="personal_info.php">Account Settings</a>
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
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use></svg></a>
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
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use></svg></a>
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
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use></svg></a>
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
			<svg class="olymp-close-icon"><use xlink:href="icons1/icons.svg#olymp-close-icon"></use></svg>
		</a>

		<div class="ui-block-title">
			<h6 class="title">Update Profile Photo</h6>
		</div>

		<a href="#" class="upload-photo-item">
			<svg class="olymp-computer-icon"><use xlink:href="icons1/icons.svg#olymp-computer-icon"></use></svg>

			
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


<!-- ... end Window-popup-CHAT for responsive min-width: 768px -->




<!-- jQuery first, then Other JS. -->
<!-- Bootstrap Tour -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tour/0.11.0/js/bootstrap-tour-standalone.min.js"></script>

<!--End -->
<script>
 // Instance the tour
 var tour = new Tour({
  steps: [
  {
    element: "#step1",
	title: "Update Account",
    content: "Add profile picture and many more"
   },
  {
    element: "#search",
    placement: "auto", 
    backdropPadding: 5,   
    content: "Can't find the post you're looking for?  Use our search engine to find it.",
    template: "<div class='popover tour hca-tooltip--left-nav'><div class='arrow'></div><div class='row'><div class='col-sm-12'><div data-role='next' class='close'>X</div></div></div><div class='row'><div class='col-sm-2'><i class='fa fa-search fa-3x' aria-hidden='true'></i></div><div class='col-sm-10'><p class='popover-content'></p><a id='hca-left-nav--tooltip-ok' href='#' data-role='next' class='btn hca-tooltip--okay-btn'>Okay</a></div></div></div>"
  },
  {
    element: "#comment",
    placement: "top",
    backdropPadding: 20,    
    content: "Have something to say? Leave a new comment by click the textarea below.",
    template: "<div class='popover tour hca-tooltip--left-nav'><div class='arrow'></div><div class='row'><div class='col-sm-12'><div data-role='next' class='close'>X</div></div></div><div class='row'><div class='col-sm-2'><i class='fa fa-paper-plane fa-3x' aria-hidden='true'></i></div><div class='col-sm-10'><p class='popover-content'></p><a id='hca-left-nav--tooltip-ok' href='#' data-role='next' class='btn hca-tooltip--okay-btn'>Okay</a></div></div></div>"
  }],
    animation: true,
    backdrop: true,  
    storage: false,
	smartPlacement: true, 
});
</script>
</body>
</html>