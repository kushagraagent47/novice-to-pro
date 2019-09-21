<!-- jQuery first, then Other JS. -->
<script src="js/jquery-3.2.0.min.js"></script>


<!-- Js effects for material design. + Tooltips -->
<script src="js/material.min.js"></script>

<!-- Helper scripts (Tabs, Equal height, Scrollbar, etc) -->
<script src="js/theme-plugins.js"></script>

<!-- Init functions -->
<script src="js/main.js"></script>

<!-- Load more news AJAX script -->
<script src="js/ajax-pagination.js"></script>

<!-- Select / Sorting script -->
<script src="js/selectize.min.js"></script>

<!-- Datepicker input field script-->
<script src="js/moment.min.js"></script>
<script src="js/daterangepicker.min.js"></script>

<!-- Widget with events script-->
<script src="js/simplecalendar.js"></script>

<!-- Lightbox plugin script-->
<script src="js/jquery.magnific-popup.min.js"></script>


<script src="js/mediaelement-and-player.min.js"></script>
<script src="js/mediaelement-playlist-plugin.min.js"></script>

<!-- Responsive Header -->
<script>
    function fill1(Value) {
   //Assigning value to "search" div in "search.php" file.
   $('#search_mob').val(Value);
   //Hiding "display" div in "search.php" file.
   $('#display_mob').hide();
}
$(document).ready(function() {
   //On pressing a key on "Search box" in "search.php" file. This function will be called.
   $("#search_mob").keyup(function() {
       //Assigning search box value to javascript variable named as "name".
       var name = $('#search_mob').val();
       //Validating, if "name" is empty.
       if (name == "") {
           //Assigning empty value to "display" div in "search.php" file.
           $("#display_mob").html("");
       }
       //If name is not empty.
       else {
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "ajax.php".
               url: "mobile_search.php",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "search" variable.
                   search_mob: name
               },
               //If result found, this funtion will be called.
               success: function(html) {
                   //Assigning result to "display" div in "search.php" file.
                   $("#display_mob").html(html).show();
               }
           });
       }
   });
});
</script>
<?php
include 'include.php';
$username = $_SESSION['username'];?>
<div class="fixed-sidebar fixed-sidebar-responsive">

	<div class="fixed-sidebar-left sidebar--small" id="sidebar-left-responsive">
		<a href="newsfeed.php" class="logo js-sidebar-open">
			<img src="img/logo.png" alt="Olympus">
		</a>

	</div>

	<div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1-responsive">
		<a href="newsfeed.php" class="logo">
			<img src="img/logo.png" alt="Olympus">
			<h6 class="logo-title">NOVICETOPRO</h6>
		</a>

		<div class="mCustomScrollbar" data-mcs-theme="dark">

			<div class="control-block">
				<div class="author-page author vcard inline-items">
					<div class="author-thumb">
						<img alt="author" src="https://res.cloudinary.com/novicetopro/profile_pictures/36X36/<?php echo $profile_hash1; ?>" class="avatar">
						<span class="icon-status online"></span>
					</div>
					<a href="user_profile.php" class="author-name fn">
						<div class="author-title">
							<?php echo htmlspecialchars($_SESSION['username']); ?> <svg class="olymp-dropdown-arrow-icon">
								<use xlink:href="icons1/icons.svg#olymp-dropdown-arrow-icon"></use>
							</svg>
						</div>
						<span class="author-subtitle"><?php echo $_SESSION['custom_status']; ?></span>
					</a>
				</div>
			</div>

			<div class="ui-block-title ui-block-title-small">
				<h6 class="title">MAIN SECTIONS</h6>
			</div>

			<ul class="left-menu">
				<li>
					<a href="#" class="js-sidebar-open">
						<svg class="olymp-close-icon left-menu-icon">
							<use xlink:href="icons1/icons.svg#olymp-close-icon"></use>
						</svg>
						<span class="left-menu-title">Collapse Menu</span>
					</a>
				</li>
				<li>
					<a href="newsfeed.php">
						<svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip" data-placement="right" data-original-title="NEWSFEED">
							<use xlink:href="icons1/icons.svg#olymp-newsfeed-icon"></use>
						</svg>
						<span class="left-menu-title">Newsfeed</span>
					</a>
				</li>
				<li>
					<a href="personal_info.php">
						<svg class="olymp-happy-faces-icon left-menu-icon" data-toggle="tooltip" data-placement="right" data-original-title="FRIEND GROUPS">
							<use xlink:href="icons1/icons.svg#olymp-happy-faces-icon"></use>
						</svg>
						<span class="left-menu-title">Profile Settings</span>
					</a>
				</li>
				<li>
					<a href="user_following.php">
						<svg class="olymp-headphones-icon left-menu-icon" data-toggle="tooltip" data-placement="right" data-original-title="MUSIC&PLAYLISTS">
							<use xlink:href="icons1/icons.svg#olymp-headphones-icon"></use>
						</svg>
						<span class="left-menu-title">Following</span>
					</a>
				</li>
				<li>
					<a href="user_followers.php">
						<svg class="olymp-headphones-icon left-menu-icon" data-toggle="tooltip" data-placement="right" data-original-title="MUSIC&PLAYLISTS">
							<use xlink:href="icons1/icons.svg#olymp-headphones-icon"></use>
						</svg>
						<span class="left-menu-title">Followers</span>
					</a>
				</li>
				<li>
					<a href="music.php">
						<svg class="olymp-headphones-icon left-menu-icon" data-toggle="tooltip" data-placement="right" data-original-title="MUSIC&PLAYLISTS">
							<use xlink:href="icons1/icons.svg#olymp-headphones-icon"></use>
						</svg>
						<span class="left-menu-title">Music widget</span>
					</a>
				</li>
				<li>
					<a href="badges.php">
						<svg class="olymp-badge-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Community Badges">
						<use xlink:href="icons1/icons.svg#olymp-badge-icon"></use></svg>
						<span class="left-menu-title">Community Badges</span>

					</a>
				</li>
			</ul>

			<div class="ui-block-title ui-block-title-small">
				<h6 class="title">YOUR ACCOUNT</h6>
			</div>

			<ul class="account-settings">
				<li>
					<a href="personal_info.php">

						<svg class="olymp-menu-icon">
							<use xlink:href="icons1/icons.svg#olymp-menu-icon"></use>
						</svg>

						<span>Profile Settings</span>
					</a>
				</li>
				<li>
					<a href="newsfeed.php">
						<svg class="olymp-star-icon left-menu-icon" data-toggle="tooltip" data-placement="right" data-original-title="FAV PAGE">
							<use xlink:href="icons1/icons.svg#olymp-star-icon"></use>
						</svg>

						<span>Newsfeed</span>
					</a>
				</li>
				<li>
					<a href="logout.php">
						<svg class="olymp-logout-icon">
							<use xlink:href="icons1/icons.svg#olymp-logout-icon"></use>
						</svg>

						<span>Log Out</span>
					</a>
				</li>
			</ul>

			<div class="ui-block-title ui-block-title-small">
				<h6 class="title">OTHER</h6>
			</div>

			<ul class="about-olympus">
			<li>
					<a href="https://termsandconditionsgenerator.com/live.php?token=a6gKxurEBYGcO0XJWgVf06Z9wsslQ2Ry">
						<span>Request For manual Upgrade</span>
					</a>
				</li>
				<li>
					<a href="https://termsandconditionsgenerator.com/live.php?token=a6gKxurEBYGcO0XJWgVf06Z9wsslQ2Ry">
						<span>Terms and Conditions</span>
					</a>
				</li>
			</ul>

		</div>
	</div>
</div>

<!-- Fixed Sidebar Right -->

<header class="header header-responsive" id="site-header-responsive">

	<div class="header-content-wrapper">
		<ul class="nav nav-tabs mobile-app-tabs" role="tablist">
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#request" role="tab">
					<div class="control-icon has-items">
						<svg class="olymp-happy-face-icon">
							<use xlink:href="icons1/icons.svg#olymp-happy-face-icon"></use>
						</svg>
						<div class="label-avatar bg-blue">6</div>
					</div>
				</a>
			</li>
			<?php
                            $message_count = 0;
                            $query_ans1 = "SELECT * FROM chat WHERE receiver = '$usernames' AND seen ='0' ORDER BY time DESC";
                            $results_ans1 = mysqli_query($conn, $query_ans1);
                            while ($row_ans1 = mysqli_fetch_assoc($results_ans1)) {
                                $message_count = $message_count + 1;
                            }?>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#chat" role="tab">
					<div class="control-icon has-items">
						<svg class="olymp-chat---messages-icon">
							<use xlink:href="icons1/icons.svg#olymp-chat---messages-icon"></use>
						</svg>
						<div class="label-avatar bg-purple"><?php echo $message_count;?></div>
					</div>
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#notification" role="tab">
					<div class="control-icon has-items">
						<svg class="olymp-thunder-icon">
							<use xlink:href="icons1/icons.svg#olymp-thunder-icon"></use>
						</svg>
						<div class="label-avatar bg-primary">8</div>
					</div>
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#search1" role="tab">
					<svg class="olymp-magnifying-glass-icon">
						<use xlink:href="icons1/icons.svg#olymp-magnifying-glass-icon"></use>
					</svg>
					<svg class="olymp-close-icon">
						<use xlink:href="icons1/icons.svg#olymp-close-icon"></use>
					</svg>
				</a>
			</li>
		</ul>
	</div>

	<!-- Tab panes -->
	<div class="tab-content tab-content-responsive">

		<div class="tab-pane " id="request" role="tabpanel">

			<div class="mCustomScrollbar" data-mcs-theme="dark">
				<div class="ui-block-title ui-block-title-small">
					<h6 class="title">Followers</h6>
				</div>

				<ul class="notification-list friend-requests">
					<?php
					$query7 = "SELECT * FROM followers WHERE following = '$usernames'";
					$results7 = mysqli_query($conn, $query7);

					?>
					<div class="mCustomScrollbar" data-mcs-theme="dark">
						<ul class="notification-list friend-requests">
							<?php
							while ($row7 = mysqli_fetch_assoc($results7)) {
								$pro_n = $row7['user1'];
								$query_n = "SELECT * FROM users WHERE username = '$pro_n'";
								$results_n = mysqli_query($conn, $query_n);

								while ($row_n = mysqli_fetch_assoc($results_n)) {
									$profil_n = $row_n['profile_hash'];
								}
								?>
								<li class="accepted">
									<div class="author-thumb">
										<img src="https://res.cloudinary.com/novicetopro/profile_pictures/36X36/<?php echo $profil_n; ?>" alt="author">
									</div>
									<div class="notification-event">
										<?php echo $row7['user1']; ?> <a class="h6 notification-friend" <?php echo ' href="people_profile.php?profile_username=' . $row7['user1'] . '">' ?>started</a> following you <a class="notification-link" <?php echo ' href="people_profile.php?profile_username=' . $row7['user1'] . '">' ?></a> </div> <span class="notification-icon">
											<svg class="olymp-happy-face-icon">
												<use xlink:href="icons1/icons.svg#olymp-happy-face-icon"></use>
											</svg>
											</span>

											<div class="more">
												<svg class="olymp-three-dots-icon">
													<use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use>
												</svg>
												<svg class="olymp-little-delete">
													<use xlink:href="icons1/icons.svg#olymp-little-delete"></use>
												</svg>
									</div>
								</li>
							<?php } ?>

						</ul>
						<a href="user_followers.php" class="view-all bg-purple">Check Followers</a>

					</div>
			</div>
		</div>

		<div class="tab-pane " id="chat" role="tabpanel">

			<div class="mCustomScrollbar" data-mcs-theme="dark">
				<div class="ui-block-title ui-block-title-small">
					<h6 class="title">Chat / Messages</h6>
					<a href="#">Mark all as read</a>
					<a href="#">Settings</a>
				</div>
				<ul class="notification-list chat-message">
				<?php
                            $query_ans = "SELECT * FROM chat WHERE receiver = '$usernames' AND seen ='0' ORDER BY time DESC";
                            $results_ans = mysqli_query($conn, $query_ans);
                            while ($row_ans = mysqli_fetch_assoc($results_ans)) {
                                ?>
                                <?php
                                $pro_n3 = $row_ans['sender'];
                                $query_n3 = "SELECT * FROM users WHERE username = '$pro_n3'";
                                $results_n3 = mysqli_query($conn, $query_n3);

                                while ($row_n3 = mysqli_fetch_assoc($results_n3)) {
                                    $profil_n3 = $row_n3['profile_hash'];
                                }
                                ?>
					<li class="message-unread">
						<div class="author-thumb">
							<img src="https://res.cloudinary.com/novicetopro/profile_pictures/36X36/<?php echo $profil_n3; ?>" alt="author">
						</div>
						<div class="notification-event">
                                        <a class="h6 notification-friend" <?php echo ' href="chatting.php?user=' . $row_ans['sender'] . '">' ?><?php echo $row_ans['sender']; ?></a> <?php
                                                                                                                                                                                    $ques_ques = htmlspecialchars_decode($row_ans['message']);
                                                                                                                                                                                    ?> <span class="chat-message-item"><?php echo substr($ques_ques, 0, 14); ?></span>
                                            <span class="notification-date"><time class="entry-date updated"><?php echo date('l, F d Y,H:i', strtotime($row_ans['time'])); ?></time></span>
                                    </div>
                           <span class="notification-icon">
							<svg class="olymp-chat---messages-icon">
								<use xlink:href="icons/icons.svg#olymp-chat---messages-icon"></use>
							</svg>
						</span>
						<div class="more">
							<svg class="olymp-three-dots-icon">
								<use xlink:href="icons/icons.svg#olymp-three-dots-icon"></use>
							</svg>
						</div>
					</li>
							<?php } ?>
				</ul>

				<a href="chatting.php?user=<?php echo $_SESSION['username'];?>" class="view-all bg-purple">View All Messages</a>
			</div>

		</div>
		<div class="tab-pane " id="notification" role="tabpanel">

			<div class="mCustomScrollbar" data-mcs-theme="dark">
				<div class="ui-block-title ui-block-title-small">
					<h6 class="title">Notifications</h6>
					<a href="#">Mark all as read</a>
					<a href="#">Settings</a>
				</div>
				<?php
                    $query6 = "SELECT * FROM answers WHERE answered_by IN (SELECT following FROM followers WHERE user1 = '$usernames') ORDER BY answer_id DESC LIMIT 7";
                    $results6 = mysqli_query($conn, $query6);

                    ?>
				<ul class="notification-list">
				<?php
                            while ($row6 = mysqli_fetch_assoc($results6)) {
                                $pro_user1 = $row6['answered_by'];
                                $query_pro1 = "SELECT * FROM users WHERE username = '$pro_user1'";
                                $results_pro1 = mysqli_query($conn, $query_pro1);

                                while ($row_pro1 = mysqli_fetch_assoc($results_pro1)) {
                                    $profil1 = $row_pro1['profile_hash'];
                                }
                                ?>
				<li>
						<div class="author-thumb">
							<img src="https://res.cloudinary.com/novicetopro/profile_pictures/36X36/<?php echo $profil1; ?>" alt="author">
						</div>
						<div class="notification-event">
						<div><a class="h6 notification-friend" <?php echo ' href="people_about.php?profile_username=' . $row6['answered_by'] . '">' ?><?php echo $row6['answered_by']; ?></a> added an answer <a class="notification-link" <?php echo ' href="view_answer2.php?question='  . '&ques_id=' . $row6['answer_id'] . '">' ?>check now</a> </div> <span class="notification-date"><time class="entry-date updated"><?php echo date('l, F d Y,H:i', strtotime($row6['time_answered'])); ?></time></span>
						</div>
						<span class="notification-icon">
							<svg class="olymp-comments-post-icon">
								<use xlink:href="icons1/icons.svg#olymp-comments-post-icon"></use>
							</svg>
						</span>

						<div class="more">
							<svg class="olymp-three-dots-icon">
								<use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use>
							</svg>
							<svg class="olymp-little-delete">
								<use xlink:href="icons1/icons.svg#olymp-little-delete"></use>
							</svg>
						</div>
					</li>
							<?php } ?>
				</ul>

				<a href="#" class="view-all bg-primary">View All Notifications</a>
			</div>

		</div>

		<div class="tab-pane" id="search1" role="tabpanel">


			<form class="search-bar w-search notification-list friend-requests">
				<div class="form-group with-button">
				<input id="search_mob" placeholder="Search here people or questions..." type="text">
				</div>
				<div id="display_mob"></div>
			</form>


		</div>

	</div>
	<!-- ... end  Tab panes -->

</header>
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
						<div class="ui-block-title">
						<a href="chatting.php?user=<?php echo $username;?>" class="h6 title">Chat / Messages</a>
					</div>
							<ul class="your-profile-menu">
							<?php
								//BACK-END GOES HERE//
								$username = $_SESSION['username'];
								$query_friends4 = "SELECT * FROM followers WHERE user1 = '$username'";
								$results_friends4 = mysqli_query($conn, $query_friends4);

								while ($row_friends4 = mysqli_fetch_assoc($results_friends4)) {

									$user_name = $row_friends4['following'];?>
								<li>
									<a href="chatting.php?user=<?php echo $row_friends4['following'];?>"><?php echo $row_friends4['following'];?></a>
								</li>
								<?php } ?>
							</ul>
					</div>
				</div>



			</div>
		</div>
	</div>
</div>
<!-- jQuery first, then Other JS. -->
<script src="js/jquery-3.2.0.min.js"></script>


<!-- Js effects for material design. + Tooltips -->
<script src="js/material.min.js"></script>

<!-- Helper scripts (Tabs, Equal height, Scrollbar, etc) -->
<script src="js/theme-plugins.js"></script>

<!-- Init functions -->
<script src="js/main.js"></script>

<!-- Load more news AJAX script -->
<script src="js/ajax-pagination.js"></script>

<!-- Select / Sorting script -->
<script src="js/selectize.min.js"></script>

<!-- Datepicker input field script-->
<script src="js/moment.min.js"></script>
<script src="js/daterangepicker.min.js"></script>

<!-- Widget with events script-->
<script src="js/simplecalendar.js"></script>

<!-- Lightbox plugin script-->
<script src="js/jquery.magnific-popup.min.js"></script>


<script src="js/mediaelement-and-player.min.js"></script>
<script src="js/mediaelement-playlist-plugin.min.js"></script>