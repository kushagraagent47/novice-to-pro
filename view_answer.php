<?php
include 'include.php';

session_start();
include 'include_profile.php';

if ( $_SESSION['logged_in'] != 1 ) {
	echo "You must log in before viewing your profile page!";
	   
  }
else {

$username = $_SESSION['username'];
$answer_id = $_GET['answer_id'];
$ques_id = $_GET['ques_id'];

$query="SELECT * FROM answers WHERE answer_id = '$answer_id'";
$results = mysqli_query($conn,$query);
while ($row = mysqli_fetch_assoc($results)) {
       $answer = $row['answer'];
       $answered_by = $row['answered_by'];
}
$query_ques="SELECT * FROM questions WHERE ques_id = '$ques_id'";
$results_ques = mysqli_query($conn,$query_ques);
while ($row_ques = mysqli_fetch_assoc($results_ques)) {
       $question = $row_ques['question'];
       $asked_by = $row_ques['asked_by'];
}

	?>





<!DOCTYPE html>
<html lang="en">
<head>

	<title>NOVICETOPRO</title>

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
	<link rel="stylesheet" type="text/css" href="css/bootstrap-select.css">

</head>
<body>


<!-- Fixed Sidebar Left -->
<?php include 'side_panel.php';?><!-- ... end Fixed Sidebar Left -->



<!-- ... end Fixed Sidebar Right -->

<!-- Fixed Sidebar Right -->

<!-- ... end Fixed Sidebar Right -->


<!-- Header -->
<?php include 'header.php'; ?>

<!-- ... end Header -->

<!-- Responsive Header -->
<?php include 'mobile_header.php';?><!-- ... end Responsive Header -->

<div class="header-spacer header-spacer-small"></div>


<div class="container">
	<div class="row m-t-50">

		<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
			<div class="ui-block">
				<article class="hentry blog-post single-post single-post-v3">

		

					<ul class="filter-icons">
						
					</ul>
					<h3 class="title"><b><?php echo htmlspecialchars_decode($question);?></b><br></h3>

					<div class="author-date">
						<div class="author-thumb">
							<img alt="author" src="img/friend-harmonic7.jpg" class="avatar">
						</div>
						Asked by 
						<a class="h6 post__author-name fn" <?php echo ' href="people_about.php?profile_username=' . $asked_by . '">'?><?php echo $asked_by;?><br><br><br></a>
						<div class="post__date">
						</div>
					</div>


					<div class="post-content-wrap">

						

						<div class="post-content">
						<div class="tab-pane" id="profile-1" role="tabpanel" aria-expanded="true">
                            <p><?php echo htmlspecialchars_decode($answer); ?></p>
                            ----answered by<a <?php echo ' href="people_about.php?profile_username=' . $answered_by . '">'?> <cite><?php echo htmlspecialchars($answered_by);  ?></cite>
						</div>

				</article>

				


				
			</div>
		</div>

		

	</div>

</div>

<!-- Window-popup-CHAT for responsive min-width: 768px -->

<!-- ... end Window-popup-CHAT for responsive min-width: 768px -->


</body>
</html>
	<?php } ?>