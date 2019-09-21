<?php
include 'include.php';
session_start();
include 'include.php';
include 'include_profile.php';
if ( $_SESSION['verified'] != 1 ) {
	?><script type="text/javascript">
	window.location.href = 'verify_page.php';
	</script>

<?php
  }
$username1122 = $_SESSION['username'];
if(isset($_POST['music'])){
	$music_widget = $_POST['song'];
	$sql = "UPDATE users SET song_widget = '$music_widget' WHERE username = '$username1122'";
	if ( $conn->query($sql) ){
		header("location:newsfeed.php");

}
else {
	echo"something went wrong";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

	<title>Music And Playlists</title>

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
	<link rel="stylesheet" type="text/css" href="css/bootstrap-select.css">
	<link rel="stylesheet" type="text/css" href="css/mediaelement-playlist-plugin.min.css">
	<link rel="stylesheet" type="text/css" href="css/mediaelementplayer.css">

</head>

<body>

<!-- Fixed Sidebar Left -->
<?php
include 'side_panel.php';
?>
<!-- ... end Fixed Sidebar Right -->


<!-- Header -->
<?php
include 'header.php';
include 'mobile_header.php';

?>
<!-- ... end Responsive Header -->

<div class="header-spacer header-spacer-small"></div>


<div class="main-header">
	<div class="content-bg-wrap">
		<div class="content-bg bg-music"></div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 m-auto col-md-8 col-sm-12 col-xs-12">
				<div class="main-header-content">
					<h1>Listen and Share Music!</h1>
					<p>Here you’ll be able to manage your Soundcloud playlist widget and listen all the saved playlists from
						your friends! </p>
				</div>
			</div>
		</div>
	</div>

	<img class="img-bottom" src="img/music-bottom.png" alt="friends">
</div>


<div class="container">
	<div class="row">
		<div class="col-xl-9 order-xl-2 col-lg-6 order-lg-2 col-md-12 order-md-1 col-sm-12 col-xs-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Your songs</h6>
				</div>
				<div class="ui-block-content">
				<form action="music.php" method="post" > 

						<fieldset class="form-group label-floating is-select">
							<label class="control-label" name="song">SONG WIDGET</label>
							<select class="selectpicker form-control"name="song" size="auto">
								<option value="on">ON</option>
								<option value="off">OFF</option>
							</select>
						</fieldset>


					<div class="row">
						
						<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<a>	<button class="btn btn-green btn-lg full-width btn-icon-left" name = "music">SAVE<i aria-hidden="true"></i></button></a>
								
						</div>
					</div>
					</form>

				</div>
			</div>

		</div>

		<div class="col-xl-3 order-xl-1 col-lg-6 order-lg-1 col-md-12 order-md-2 col-sm-12 col-xs-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">My Playlist</h6>
					<a href="#" class="more">
						<svg class="olymp-three-dots-icon"><use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use></svg>
					</a>
				</div>

				<ol class="widget w-playlist">
					
				<iframe width="100%" height="450" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/263741978&color=%234e7366&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe>				</ol>

			</div>
		</div>
	</div>
</div>
<!--

<div class="container">
	<div class="row">
		<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Green Goo’s Playlist</h6>
					<a href="#" class="more">
							<span class="c-green">
								<svg class="olymp-remove-playlist-icon"><use xlink:href="icons1/icons.svg#olymp-remove-playlist-icon"></use></svg>
							</span>
					</a>
				</div>

				<ol class="widget w-playlist">
					<li class="js-open-popup" data-popup-target=".playlist-popup">
						<div class="playlist-thumb" data-toggle="tooltip" data-placement="top" title="PLAY / ADD TO PLAYER">
							<img src="img/playlist6.jpg" alt="thumb-composition">
							<div class="overlay"></div>
							<a href="#" class="play-icon">
								<svg class="olymp-music-play-icon-big"><use xlink:href="icons1/icons-music.svg#olymp-music-play-icon-big"></use></svg>
							</a>
						</div>

						<div class="composition">
							<a href="#" class="composition-name">The Past Starts Slow...</a>
							<a href="#" class="composition-author">System of a Revenge</a>
						</div>

						<div class="composition-time">
							<time class="published" datetime="2017-03-24T18:18">3:22</time>
							<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown">
									<li>
										<a href="#">Add Song to Player</a>
									</li>
									<li>
										<a href="#">Add Playlist to Player</a>
									</li>
								</ul>
							</div>
						</div>

					</li>

					<li class="js-open-popup" data-popup-target=".playlist-popup">
						<div class="playlist-thumb" data-toggle="tooltip" data-placement="top" title="PLAY / ADD TO PLAYER">
							<img src="img/playlist7.jpg" alt="thumb-composition">
							<div class="overlay"></div>
							<a href="#" class="play-icon">
								<svg class="olymp-music-play-icon-big"><use xlink:href="icons1/icons-music.svg#olymp-music-play-icon-big"></use></svg>
							</a>
						</div>

						<div class="composition">
							<a href="#" class="composition-name">The Pretender</a>
							<a href="#" class="composition-author">Kung Fighters</a>
						</div>

						<div class="composition-time">
							<time class="published" datetime="2017-03-24T18:18">5:48</time>
							<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown">
									<li>
										<a href="#">Add Song to Player</a>
									</li>
									<li>
										<a href="#">Add Playlist to Player</a>
									</li>
								</ul>
							</div>
						</div>

					</li>
					<li class="js-open-popup" data-popup-target=".playlist-popup">
						<div class="playlist-thumb" data-toggle="tooltip" data-placement="top" title="PLAY / ADD TO PLAYER">
							<img src="img/playlist8.jpg" alt="thumb-composition">
							<div class="overlay"></div>
							<a href="#" class="play-icon">
								<svg class="olymp-music-play-icon-big"><use xlink:href="icons1/icons-music.svg#olymp-music-play-icon-big"></use></svg>
							</a>
						</div>

						<div class="composition">
							<a href="#" class="composition-name">Blood Brothers</a>
							<a href="#" class="composition-author">Iron Maid</a>
						</div>

						<div class="composition-time">
							<time class="published" datetime="2017-03-24T18:18">3:06</time>
							<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown">
									<li>
										<a href="#">Add Song to Player</a>
									</li>
									<li>
										<a href="#">Add Playlist to Player</a>
									</li>
								</ul>
							</div>
						</div>

					</li>
					<li class="js-open-popup" data-popup-target=".playlist-popup">
						<div class="playlist-thumb" data-toggle="tooltip" data-placement="top" title="PLAY / ADD TO PLAYER">
							<img src="img/playlist9.jpg" alt="thumb-composition">
							<div class="overlay"></div>
							<a href="#" class="play-icon">
								<svg class="olymp-music-play-icon-big"><use xlink:href="icons1/icons-music.svg#olymp-music-play-icon-big"></use></svg>
							</a>
						</div>

						<div class="composition">
							<a href="#" class="composition-name">Seven Nation Army</a>
							<a href="#" class="composition-author">The Black Stripes</a>
						</div>

						<div class="composition-time">
							<time class="published" datetime="2017-03-24T18:18">6:17</time>
							<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown">
									<li>
										<a href="#">Add Song to Player</a>
									</li>
									<li>
										<a href="#">Add Playlist to Player</a>
									</li>
								</ul>
							</div>
						</div>

					</li>
					<li class="js-open-popup" data-popup-target=".playlist-popup">
						<div class="playlist-thumb" data-toggle="tooltip" data-placement="top" title="PLAY / ADD TO PLAYER">
							<img src="img/playlist10.jpg" alt="thumb-composition">
							<div class="overlay"></div>
							<a href="#" class="play-icon">
								<svg class="olymp-music-play-icon-big"><use xlink:href="icons1/icons-music.svg#olymp-music-play-icon-big"></use></svg>
							</a>
						</div>

						<div class="composition">
							<a href="#" class="composition-name">Killer Queen</a>
							<a href="#" class="composition-author">Archiduke</a>
						</div>

						<div class="composition-time">
							<time class="published" datetime="2017-03-24T18:18">5:40</time>
							<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown">
									<li>
										<a href="#">Add Song to Player</a>
									</li>
									<li>
										<a href="#">Add Playlist to Player</a>
									</li>
								</ul>
							</div>
						</div>

					</li>
				</ol>
			</div>
		</div>
		<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Green Goo’s Playlist</h6>
					<a href="#" class="more">
							<span data-toggle="tooltip" data-placement="top"   data-original-title="SAVE PLAYLIST">
								<svg class="olymp-save-playlist-icon"><use xlink:href="icons1/icons.svg#olymp-save-playlist-icon"></use></svg>
							</span>
					</a>
				</div>

				<ol class="widget w-playlist without-cover">
					<li class="js-open-popup" data-popup-target=".playlist-popup">
						<div class="playlist-thumb" data-toggle="tooltip" data-placement="top" title="PLAY / ADD TO PLAYER">
							<a href="#" class="play-icon">
								<svg class="olymp-music-play-icon-big"><use xlink:href="icons1/icons-music.svg#olymp-music-play-icon-big"></use></svg>
							</a>
						</div>

						<div class="composition">
							<a href="#" class="composition-name">The Past Starts Slow...</a>
							<a href="#" class="composition-author">System of a Revenge</a>
						</div>

						<div class="composition-time">
							<time class="published" datetime="2017-03-24T18:18">3:22</time>
							<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown">
									<li>
										<a href="#">Add Song to Player</a>
									</li>
									<li>
										<a href="#">Add Playlist to Player</a>
									</li>
								</ul>
							</div>
						</div>

					</li>

					<li class="js-open-popup" data-popup-target=".playlist-popup">
						<div class="playlist-thumb" data-toggle="tooltip" data-placement="top" title="PLAY / ADD TO PLAYER">
							<a href="#" class="play-icon">
								<svg class="olymp-music-play-icon-big"><use xlink:href="icons1/icons-music.svg#olymp-music-play-icon-big"></use></svg>
							</a>
						</div>

						<div class="composition">
							<a href="#" class="composition-name">The Pretender</a>
							<a href="#" class="composition-author">Kung Fighters</a>
						</div>

						<div class="composition-time">
							<time class="published" datetime="2017-03-24T18:18">5:48</time>
							<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown">
									<li>
										<a href="#">Add Song to Player</a>
									</li>
									<li>
										<a href="#">Add Playlist to Player</a>
									</li>
								</ul>
							</div>
						</div>

					</li>
					<li class="js-open-popup" data-popup-target=".playlist-popup">
						<div class="playlist-thumb" data-toggle="tooltip" data-placement="top" title="PLAY / ADD TO PLAYER">
							<a href="#" class="play-icon">
								<svg class="olymp-music-play-icon-big"><use xlink:href="icons1/icons-music.svg#olymp-music-play-icon-big"></use></svg>
							</a>
						</div>

						<div class="composition">
							<a href="#" class="composition-name">Blood Brothers</a>
							<a href="#" class="composition-author">Iron Maid</a>
						</div>

						<div class="composition-time">
							<time class="published" datetime="2017-03-24T18:18">3:06</time>
							<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown">
									<li>
										<a href="#">Add Song to Player</a>
									</li>
									<li>
										<a href="#">Add Playlist to Player</a>
									</li>
								</ul>
							</div>
						</div>

					</li>
					<li class="js-open-popup" data-popup-target=".playlist-popup">
						<div class="playlist-thumb" data-toggle="tooltip" data-placement="top" title="PLAY / ADD TO PLAYER">
							<a href="#" class="play-icon">
								<svg class="olymp-music-play-icon-big"><use xlink:href="icons1/icons-music.svg#olymp-music-play-icon-big"></use></svg>
							</a>
						</div>

						<div class="composition">
							<a href="#" class="composition-name">Seven Nation Army</a>
							<a href="#" class="composition-author">The Black Stripes</a>
						</div>

						<div class="composition-time">
							<time class="published" datetime="2017-03-24T18:18">6:17</time>
							<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown">
									<li>
										<a href="#">Add Song to Player</a>
									</li>
									<li>
										<a href="#">Add Playlist to Player</a>
									</li>
								</ul>
							</div>
						</div>

					</li>
					<li class="js-open-popup" data-popup-target=".playlist-popup">
						<div class="playlist-thumb" data-toggle="tooltip" data-placement="top" title="PLAY / ADD TO PLAYER">
							<a href="#" class="play-icon">
								<svg class="olymp-music-play-icon-big"><use xlink:href="icons1/icons-music.svg#olymp-music-play-icon-big"></use></svg>
							</a>
						</div>

						<div class="composition">
							<a href="#" class="composition-name">Killer Queen</a>
							<a href="#" class="composition-author">Archiduke</a>
						</div>

						<div class="composition-time">
							<time class="published" datetime="2017-03-24T18:18">5:40</time>
							<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown">
									<li>
										<a href="#">Add Song to Player</a>
									</li>
									<li>
										<a href="#">Add Playlist to Player</a>
									</li>
								</ul>
							</div>
						</div>

					</li>
				</ol>
			</div>
		</div>
		<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Marina V’s Playlist</h6>
					<a href="#" class="more">
							<span class="c-green">
								<svg class="olymp-remove-playlist-icon"><use xlink:href="icons1/icons.svg#olymp-remove-playlist-icon"></use></svg>
							</span>
					</a>
				</div>

				<ol class="widget w-playlist">
					<li class="js-open-popup" data-popup-target=".playlist-popup">
						<div class="playlist-thumb" data-toggle="tooltip" data-placement="top" title="PLAY / ADD TO PLAYER">
							<img src="img/playlist11.jpg" alt="thumb-composition">
							<div class="overlay"></div>
							<a href="#" class="play-icon">
								<svg class="olymp-music-play-icon-big"><use xlink:href="icons1/icons-music.svg#olymp-music-play-icon-big"></use></svg>
							</a>
						</div>

						<div class="composition">
							<a href="#" class="composition-name">The Cowboy</a>
							<a href="#" class="composition-author">System of a Revenge</a>
						</div>

						<div class="composition-time">
							<time class="published" datetime="2017-03-24T18:18">4:02</time>
							<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown">
									<li>
										<a href="#">Add Song to Player</a>
									</li>
									<li>
										<a href="#">Add Playlist to Player</a>
									</li>
								</ul>
							</div>
						</div>

					</li>

					<li class="js-open-popup" data-popup-target=".playlist-popup">
						<div class="playlist-thumb" data-toggle="tooltip" data-placement="top" title="PLAY / ADD TO PLAYER">
							<img src="img/playlist12.jpg" alt="thumb-composition">
							<div class="overlay"></div>
							<a href="#" class="play-icon">
								<svg class="olymp-music-play-icon-big"><use xlink:href="icons1/icons-music.svg#olymp-music-play-icon-big"></use></svg>
							</a>
						</div>

						<div class="composition">
							<a href="#" class="composition-name">The Astronaut</a>
							<a href="#" class="composition-author">Jason Bowie</a>
						</div>

						<div class="composition-time">
							<time class="published" datetime="2017-03-24T18:18">3:54</time>
							<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown">
									<li>
										<a href="#">Add Song to Player</a>
									</li>
									<li>
										<a href="#">Add Playlist to Player</a>
									</li>
								</ul>
							</div>
						</div>

					</li>
					<li class="js-open-popup" data-popup-target=".playlist-popup">
						<div class="playlist-thumb" data-toggle="tooltip" data-placement="top" title="PLAY / ADD TO PLAYER">
							<img src="img/playlist13.jpg" alt="thumb-composition">
							<div class="overlay"></div>
							<a href="#" class="play-icon">
								<svg class="olymp-music-play-icon-big"><use xlink:href="icons1/icons-music.svg#olymp-music-play-icon-big"></use></svg>
							</a>
						</div>

						<div class="composition">
							<a href="#" class="composition-name">City’s Hero</a>
							<a href="#" class="composition-author">Kung Fighters</a>
						</div>

						<div class="composition-time">
							<time class="published" datetime="2017-03-24T18:18">4:36</time>
							<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown">
									<li>
										<a href="#">Add Song to Player</a>
									</li>
									<li>
										<a href="#">Add Playlist to Player</a>
									</li>
								</ul>
							</div>
						</div>

					</li>
					<li class="js-open-popup" data-popup-target=".playlist-popup">
						<div class="playlist-thumb" data-toggle="tooltip" data-placement="top" title="PLAY / ADD TO PLAYER">
							<img src="img/playlist14.jpg" alt="thumb-composition">
							<div class="overlay"></div>
							<a href="#" class="play-icon">
								<svg class="olymp-music-play-icon-big"><use xlink:href="icons1/icons-music.svg#olymp-music-play-icon-big"></use></svg>
							</a>
						</div>

						<div class="composition">
							<a href="#" class="composition-name">Enter Madman</a>
							<a href="#" class="composition-author">MetalDeath</a>
						</div>

						<div class="composition-time">
							<time class="published" datetime="2017-03-24T18:18">5:27</time>
							<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown">
									<li>
										<a href="#">Add Song to Player</a>
									</li>
									<li>
										<a href="#">Add Playlist to Player</a>
									</li>
								</ul>
							</div>
						</div>

					</li>
					<li class="js-open-popup" data-popup-target=".playlist-popup">
						<div class="playlist-thumb" data-toggle="tooltip" data-placement="top" title="PLAY / ADD TO PLAYER">
							<img src="img/playlist15.jpg" alt="thumb-composition">
							<div class="overlay"></div>
							<a href="#" class="play-icon">
								<svg class="olymp-music-play-icon-big"><use xlink:href="icons1/icons-music.svg#olymp-music-play-icon-big"></use></svg>
							</a>
						</div>

						<div class="composition">
							<a href="#" class="composition-name">Wunderbuss</a>
							<a href="#" class="composition-author">James White</a>
						</div>

						<div class="composition-time">
							<time class="published" datetime="2017-03-24T18:18">4:09</time>
							<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown">
									<li>
										<a href="#">Add Song to Player</a>
									</li>
									<li>
										<a href="#">Add Playlist to Player</a>
									</li>
								</ul>
							</div>
						</div>

					</li>
				</ol>
			</div>
		</div>
		<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Elaine D’s Playlist</h6>
					<a href="#" class="more">
							<span class="c-green">
								<svg class="olymp-remove-playlist-icon"><use xlink:href="icons1/icons.svg#olymp-remove-playlist-icon"></use></svg>
							</span>
					</a>
				</div>

				<ol class="widget w-playlist">
					<li class="js-open-popup" data-popup-target=".playlist-popup">
						<div class="playlist-thumb" data-toggle="tooltip" data-placement="top" title="PLAY / ADD TO PLAYER">
							<img src="img/playlist16.jpg" alt="thumb-composition">
							<div class="overlay"></div>
							<a href="#" class="play-icon">
								<svg class="olymp-music-play-icon-big"><use xlink:href="icons1/icons-music.svg#olymp-music-play-icon-big"></use></svg>
							</a>
						</div>

						<div class="composition">
							<a href="#" class="composition-name">The Juggler</a>
							<a href="#" class="composition-author">Poison Apple</a>
						</div>

						<div class="composition-time">
							<time class="published" datetime="2017-03-24T18:18">5:17</time>
							<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown">
									<li>
										<a href="#">Add Song to Player</a>
									</li>
									<li>
										<a href="#">Add Playlist to Player</a>
									</li>
								</ul>
							</div>
						</div>

					</li>

					<li class="js-open-popup" data-popup-target=".playlist-popup">
						<div class="playlist-thumb" data-toggle="tooltip" data-placement="top" title="PLAY / ADD TO PLAYER">
							<img src="img/playlist17.jpg" alt="thumb-composition">
							<div class="overlay"></div>
							<a href="#" class="play-icon">
								<svg class="olymp-music-play-icon-big"><use xlink:href="icons1/icons-music.svg#olymp-music-play-icon-big"></use></svg>
							</a>
						</div>

						<div class="composition">
							<a href="#" class="composition-name">Leap of Faith</a>
							<a href="#" class="composition-author">Eden Artifact</a>
						</div>

						<div class="composition-time">
							<time class="published" datetime="2017-03-24T18:18">8:24</time>
							<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown">
									<li>
										<a href="#">Add Song to Player</a>
									</li>
									<li>
										<a href="#">Add Playlist to Player</a>
									</li>
								</ul>
							</div>
						</div>

					</li>
					<li class="js-open-popup" data-popup-target=".playlist-popup">
						<div class="playlist-thumb" data-toggle="tooltip" data-placement="top" title="PLAY / ADD TO PLAYER">
							<img src="img/playlist18.jpg" alt="thumb-composition">
							<div class="overlay"></div>
							<a href="#" class="play-icon">
								<svg class="olymp-music-play-icon-big"><use xlink:href="icons1/icons-music.svg#olymp-music-play-icon-big"></use></svg>
							</a>
						</div>

						<div class="composition">
							<a href="#" class="composition-name">Bat Tornado</a>
							<a href="#" class="composition-author">The Revengers</a>
						</div>

						<div class="composition-time">
							<time class="published" datetime="2017-03-24T18:18">4:57</time>
							<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown">
									<li>
										<a href="#">Add Song to Player</a>
									</li>
									<li>
										<a href="#">Add Playlist to Player</a>
									</li>
								</ul>
							</div>
						</div>

					</li>
					<li class="js-open-popup" data-popup-target=".playlist-popup">
						<div class="playlist-thumb" data-toggle="tooltip" data-placement="top" title="PLAY / ADD TO PLAYER">
							<img src="img/playlist19.jpg" alt="thumb-composition">
							<div class="overlay"></div>
							<a href="#" class="play-icon">
								<svg class="olymp-music-play-icon-big"><use xlink:href="icons1/icons-music.svg#olymp-music-play-icon-big"></use></svg>
							</a>
						</div>

						<div class="composition">
							<a href="#" class="composition-name">Top Pressure</a>
							<a href="#" class="composition-author">Jason Bowie</a>
						</div>

						<div class="composition-time">
							<time class="published" datetime="2017-03-24T18:18">3:21</time>
							<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown">
									<li>
										<a href="#">Add Song to Player</a>
									</li>
									<li>
										<a href="#">Add Playlist to Player</a>
									</li>
								</ul>
							</div>
						</div>

					</li>
					<li class="js-open-popup" data-popup-target=".playlist-popup">
						<div class="playlist-thumb" data-toggle="tooltip" data-placement="top" title="PLAY / ADD TO PLAYER">
							<img src="img/playlist20.jpg" alt="thumb-composition">
							<div class="overlay"></div>
							<a href="#" class="play-icon">
								<svg class="olymp-music-play-icon-big"><use xlink:href="icons1/icons-music.svg#olymp-music-play-icon-big"></use></svg>
							</a>
						</div>

						<div class="composition">
							<a href="#" class="composition-name">Night Troopers</a>
							<a href="#" class="composition-author">Iron Maid</a>
						</div>

						<div class="composition-time">
							<time class="published" datetime="2017-03-24T18:18">5:54</time>
							<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown">
									<li>
										<a href="#">Add Song to Player</a>
									</li>
									<li>
										<a href="#">Add Playlist to Player</a>
									</li>
								</ul>
							</div>
						</div>

					</li>
				</ol>
			</div>
		</div>
	</div>
</div>

-->
<div class="modal fade" id="faqs-popup">
	<div class="modal-dialog ui-block window-popup faqs-popup">
		<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
			<svg class="olymp-close-icon"><use xlink:href="icons1/icons.svg#olymp-close-icon"></use></svg>
		</a>

		<div class="ui-block-title">
			<h6 class="title">Link your Playlist FAQs</h6>
		</div>


		<div id="accordion" role="tablist" aria-multiselectable="true">
				<div class="card">
					<div class="card-header" role="tab" id="headingOne">
						<h6 class="mb-0">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
								Linking your <span class="c-green">Spotify</span> Account
								<i class="fa fa-angle-down" aria-hidden="true"></i>
							</a>
						</h6>
					</div>

					<div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
						<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillumered dolore eu fugiat nulla
							pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
							mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem
						</p>
					</div>
				</div>

				<div class="card">
					<div class="card-header" role="tab" id="headingTwo">
						<h6 class="mb-0">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
								Choosing your Olympus Playlist
								<i class="fa fa-angle-down" aria-hidden="true"></i>
							</a>
						</h6>
					</div>

					<div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingOne">
						<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillumered dolore eu fugiat nulla
							pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
							mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem
						</p>
					</div>
				</div>
				<div class="card">
					<div class="card-header" role="tab" id="headingThree">
						<h6 class="mb-0">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
								Choosing your Olympus Playlist
								<i class="fa fa-angle-down" aria-hidden="true"></i>
							</a>
						</h6>
					</div>

					<div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
						<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillumered dolore eu fugiat nulla
							pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
							mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem
						</p>
					</div>
				</div>
				<div class="card">
					<div class="card-header" role="tab" id="headingFour">
						<h6 class="mb-0">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
								Choosing your Olympus Playlist
								<i class="fa fa-angle-down" aria-hidden="true"></i>
							</a>
						</h6>
					</div>

					<div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour">
						<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillumered dolore eu fugiat nulla
							pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
							mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem
						</p>
					</div>
				</div>
				<div class="card">
					<div class="card-header" role="tab" id="headingFive">
						<h6 class="mb-0">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
								Choosing your Olympus Playlist
								<i class="fa fa-angle-down" aria-hidden="true"></i>
							</a>
						</h6>
					</div>

					<div id="collapseFive" class="collapse" role="tabpanel" aria-labelledby="headingFive">
						<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillumered dolore eu fugiat nulla
							pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
							mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem
						</p>
					</div>
				</div>
			</div>

	</div>
</div>


<div class="window-popup playlist-popup">

	<a href="" class="icon-close js-close-popup">
		<svg class="olymp-close-icon"><use xlink:href="icons1/icons.svg#olymp-close-icon"></use></svg>
	</a>

	<table class="playlist-popup-table">

		<thead>

		<tr>

			<th class="play">
				PLAY
			</th>

			<th class="cover">
				COVER
			</th>

			<th class="song-artist">
				SONG AND ARTIST
			</th>

			<th class="album">
				ALBUM
			</th>

			<th class="released">
				RELEASED
			</th>

			<th class="duration">
				DURATION
			</th>

			<th class="spotify">
				GET IT ON SPOTIFY
			</th>

			<th class="remove">
				REMOVE
			</th>
		</tr>

		</thead>

		<tbody>
		<tr>
			<td class="play">
				<a href="#" class="play-icon">
					<svg class="olymp-music-play-icon-big"><use xlink:href="icons1/icons-music.svg#olymp-music-play-icon-big"></use></svg>
				</a>
			</td>
			<td class="cover">
				<div class="playlist-thumb">
					<img src="img/playlist19.jpg" alt="thumb-composition">
				</div>
			</td>
			<td class="song-artist">
				<div class="composition">
					<a href="#" class="composition-name">We Can Be Heroes</a>
					<a href="#" class="composition-author">Jason Bowie</a>
				</div>
			</td>
			<td class="album">
				<a href="#" class="album-composition">Ziggy Firedust</a>
			</td>
			<td class="released">
				<div class="release-year">2014</div>
			</td>
			<td class="duration">
				<div class="composition-time">
					<time class="published" datetime="2017-03-24T18:18">6:17</time>
				</div>
			</td>
			<td class="spotify">
				<i class="fa fa-spotify composition-icon" aria-hidden="true"></i>
			</td>
			<td class="remove">
				<a href="#" class="remove-icon">
					<svg class="olymp-close-icon"><use xlink:href="icons1/icons.svg#olymp-close-icon"></use></svg>
				</a>
			</td>
		</tr>

		<tr>
			<td class="play">
				<a href="#" class="play-icon">
					<svg class="olymp-music-play-icon-big"><use xlink:href="icons1/icons-music.svg#olymp-music-play-icon-big"></use></svg>
				</a>
			</td>
			<td class="cover">
				<div class="playlist-thumb">
					<img src="img/playlist6.jpg" alt="thumb-composition">
				</div>
			</td>
			<td class="song-artist">
				<div class="composition">
					<a href="#" class="composition-name">The Past Starts Slow and Ends</a>
					<a href="#" class="composition-author">System of a Revenge</a>
				</div>
			</td>
			<td class="album">
				<a href="#" class="album-composition">Wonderize</a>
			</td>
			<td class="released">
				<div class="release-year">2014</div>
			</td>
			<td class="duration">
				<div class="composition-time">
					<time class="published" datetime="2017-03-24T18:18">6:17</time>
				</div>
			</td>
			<td class="spotify">
				<i class="fa fa-spotify composition-icon" aria-hidden="true"></i>
			</td>
			<td class="remove">
				<a href="#" class="remove-icon">
					<svg class="olymp-close-icon"><use xlink:href="icons1/icons.svg#olymp-close-icon"></use></svg>
				</a>
			</td>
		</tr>

		<tr>
			<td class="play">
				<a href="#" class="play-icon">
					<svg class="olymp-music-play-icon-big"><use xlink:href="icons1/icons-music.svg#olymp-music-play-icon-big"></use></svg>
				</a>
			</td>
			<td class="cover">
				<div class="playlist-thumb">
					<img src="img/playlist7.jpg" alt="thumb-composition">
				</div>
			</td>
			<td class="song-artist">
				<div class="composition">
					<a href="#" class="composition-name">The Pretender</a>
					<a href="#" class="composition-author">Kung Fighters</a>
				</div>
			</td>
			<td class="album">
				<a href="#" class="album-composition">Warping Lights</a>
			</td>
			<td class="released">
				<div class="release-year">2014</div>
			</td>
			<td class="duration">
				<div class="composition-time">
					<time class="published" datetime="2017-03-24T18:18">6:17</time>
				</div>
			</td>
			<td class="spotify">
				<i class="fa fa-spotify composition-icon" aria-hidden="true"></i>
			</td>
			<td class="remove">
				<a href="#" class="remove-icon">
					<svg class="olymp-close-icon"><use xlink:href="icons1/icons.svg#olymp-close-icon"></use></svg>
				</a>
			</td>
		</tr>

		<tr>
			<td class="play">
				<a href="#" class="play-icon">
					<svg class="olymp-music-play-icon-big"><use xlink:href="icons1/icons-music.svg#olymp-music-play-icon-big"></use></svg>
				</a>
			</td>
			<td class="cover">
				<div class="playlist-thumb">
					<img src="img/playlist8.jpg" alt="thumb-composition">
				</div>
			</td>
			<td class="song-artist">
				<div class="composition">
					<a href="#" class="composition-name">Seven Nation Army</a>
					<a href="#" class="composition-author">The Black Stripes</a>
				</div>
			</td>
			<td class="album">
				<a href="#" class="album-composition ">Icky Strung (LIVE at Cube Garden)</a>
			</td>
			<td class="released">
				<div class="release-year">2014</div>
			</td>
			<td class="duration">
				<div class="composition-time">
					<time class="published" datetime="2017-03-24T18:18">6:17</time>
				</div>
			</td>
			<td class="spotify">
				<i class="fa fa-spotify composition-icon" aria-hidden="true"></i>
			</td>
			<td class="remove">
				<a href="#" class="remove-icon">
					<svg class="olymp-close-icon"><use xlink:href="icons1/icons.svg#olymp-close-icon"></use></svg>
				</a>
			</td>
		</tr>

		<tr>
			<td class="play">
				<a href="#" class="play-icon">
					<svg class="olymp-music-play-icon-big"><use xlink:href="icons1/icons-music.svg#olymp-music-play-icon-big"></use></svg>
				</a>
			</td>
			<td class="cover">
				<div class="playlist-thumb">
					<img src="img/playlist9.jpg" alt="thumb-composition">
				</div>
			</td>
			<td class="song-artist">
				<div class="composition">
					<a href="#" class="composition-name">Leap of Faith</a>
					<a href="#" class="composition-author">Eden Artifact</a>
				</div>
			</td>
			<td class="album">
				<a href="#" class="album-composition">The Assassins’s Soundtrack</a>
			</td>
			<td class="released">
				<div class="release-year">2014</div>
			</td>
			<td class="duration">
				<div class="composition-time">
					<time class="published" datetime="2017-03-24T18:18">6:17</time>
				</div>
			</td>
			<td class="spotify">
				<i class="fa fa-spotify composition-icon" aria-hidden="true"></i>
			</td>
			<td class="remove">
				<a href="#" class="remove-icon">
					<svg class="olymp-close-icon"><use xlink:href="icons1/icons.svg#olymp-close-icon"></use></svg>
				</a>
			</td>
		</tr>

		<tr>
			<td class="play">
				<a href="#" class="play-icon">
					<svg class="olymp-music-play-icon-big"><use xlink:href="icons1/icons-music.svg#olymp-music-play-icon-big"></use></svg>
				</a>
			</td>
			<td class="cover">
				<div class="playlist-thumb">
					<img src="img/playlist10.jpg" alt="thumb-composition">
				</div>
			</td>
			<td class="song-artist">
				<div class="composition">
					<a href="#" class="composition-name">Killer Queen</a>
					<a href="#" class="composition-author">Archiduke</a>
				</div>
			</td>
			<td class="album">
				<a href="#" class="album-composition ">News of the Universe</a>
			</td>
			<td class="released">
				<div class="release-year">2014</div>
			</td>
			<td class="duration">
				<div class="composition-time">
					<time class="published" datetime="2017-03-24T18:18">6:17</time>
				</div>
			</td>
			<td class="spotify">
				<i class="fa fa-spotify composition-icon" aria-hidden="true"></i>
			</td>
			<td class="remove">
				<a href="#" class="remove-icon">
					<svg class="olymp-close-icon"><use xlink:href="icons1/icons.svg#olymp-close-icon"></use></svg>
				</a>
			</td>
		</tr>
		</tbody>
	</table>

	<audio id="mediaplayer" data-showplaylist="true">
		<source src="mp3/Twice.mp3" title="Track 1" data-poster="track1.png" type="audio/mpeg">
		<source src="mp3/Twice.mp3" title="Track 2" data-poster="track2.png" type="audio/mpeg">
		<source src="mp3/Twice.mp3" title="Track 3" data-poster="track3.png" type="audio/mpeg">
		<source src="mp3/Twice.mp3" title="Track 4" data-poster="track4.png" type="audio/mpeg">
	</audio>

</div>


<!-- ... end Window-popup-CHAT for responsive min-width: 768px -->


<!-- jQuery first, then Other JS. -->


</body>
</html>


