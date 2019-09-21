<?php
session_start();
include 'include_profile.php';
$p_username = $_SESSION['username'];
?>

<div class="fixed-sidebar">
	<div class="fixed-sidebar-left sidebar--small" id="sidebar-left">
		<a href="newsfeed.php" class="logo">
			<img src="img/logo.png" alt="Olympus">
		</a>

		<div class="mCustomScrollbar" data-mcs-theme="dark">
			<ul class="left-menu">
				<li>
					<a href="#" class="js-sidebar-open">
						<svg class="olymp-menu-icon left-menu-icon" data-toggle="tooltip" data-placement="right" data-original-title="OPEN MENU">
							<use xlink:href="icons1/icons.svg#olymp-menu-icon"></use>
						</svg>
					</a>
				</li>
				<li>
					<a href="newsfeed.php">
						<svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip" data-placement="right" data-original-title="NEWSFEED">
							<use xlink:href="icons1/icons.svg#olymp-newsfeed-icon"></use>
						</svg>
					</a>
				</li>
				<!-- <li>
					<a href="find_friends.php">
						<svg class="olymp-happy-faces-icon left-menu-icon" data-toggle="tooltip" data-placement="right" data-original-title="Find People">
							<use xlink:href="icons1/icons.svg#olymp-happy-faces-icon"></use>
						</svg>
					</a>
				</li> -->

				<li>
					<a href="user_following.php">
						<svg class="olymp-cupcake-icon left-menu-icon" data-toggle="tooltip" data-placement="right" data-original-title="Following">
							<use xlink:href="icons1/icons.svg#olymp-cupcake-icon"></use>
						</svg>
					</a>
				</li>
				<li>
					<a href="user_followers.php">
						<svg class="olymp-stats-icon left-menu-icon" data-toggle="tooltip" data-placement="right" data-original-title="Followers">
							<use xlink:href="icons1/icons.svg#olymp-stats-icon"></use>
						</svg>
					</a>
				</li>
				<li>
					<a href="music.php">
						<svg class="olymp-headphones-icon left-menu-icon" data-toggle="tooltip" data-placement="right" data-original-title="MUSIC&PLAYLISTS">
							<use xlink:href="icons1/icons.svg#olymp-headphones-icon"></use>
						</svg>
					</a>
				</li>
				<li>
					<a href="badges.php">
						<svg class="olymp-badge-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Community Badges">
						<use xlink:href="icons1/icons.svg#olymp-badge-icon"></use></svg>
					</a>
				</li>

				<li>
					<a href="music.php">
						<svg class="olymp-manage-widgets-icon left-menu-icon" data-toggle="tooltip" data-placement="right" data-original-title="Manage Widgets">
							<use xlink:href="icons1/icons.svg#olymp-manage-widgets-icon"></use>
						</svg>
					</a>
				</li>

			</ul>
		</div>
	</div>
	<div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1">
		<a href="index.php" class="logo">
			<img src="img/logo.png" alt="Olympus">
			<h6 class="logo-title">NOVICETOPRO</h6>
		</a>

		<div class="mCustomScrollbar" data-mcs-theme="dark">
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
						<svg class="olymp-star-icon left-menu-icon" data-toggle="tooltip" data-placement="right" data-original-title="FAV PAGE">
							<use xlink:href="icons1/icons.svg#olymp-star-icon"></use>
						</svg>
						<span class="left-menu-title">Profile settings</span>
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
					<a href="find_friends.php">
						<svg class="olymp-happy-faces-icon left-menu-icon" data-toggle="tooltip" data-placement="right" data-original-title="FRIEND GROUPS">
							<use xlink:href="icons1/icons.svg#olymp-happy-faces-icon"></use>
						</svg>
						<span class="left-menu-title">Find Friends</span>
					</a>
				</li>
				<li>
					<a href="music.php">
						<svg class="olymp-headphones-icon left-menu-icon" data-toggle="tooltip" data-placement="right" data-original-title="MUSIC&PLAYLISTS">
							<use xlink:href="icons1/icons.svg#olymp-headphones-icon"></use>
						</svg>
						<span class="left-menu-title">MUSIC</span>
					</a>
				</li>


			</ul>
			<div class="profile-completion">

				<span>Complete <a href="personal_info.php">your profile</a> so people can know more about you!</span>

			</div>
		</div>
	</div>
</div>

<!-- ... end Fixed Sidebar Left -->

<!-- Fixed Sidebar Left -->

<!-- ... end Fixed Sidebar Right -->


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