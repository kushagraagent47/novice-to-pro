<?php
include 'include_profile.php';

include 'include.php';

session_start();

// if ( $_SESSION['logged_in'] != 1 ) {

// 	header("location:index.php");

//   }
//   if ( $_SESSION['verified'] != 1 ) {
// 	?><script type="text/javascript">
// 	window.location.href = 'verify_page.php';
// 	</script>

// <?php
	// }
$ques_id = $_GET['ques_id'];
$username = $_SESSION['username'];
 
?>

<!DOCTYPE html>
<html lang="en">
<head>

	<title>ANSWER</title>

	<!-- Required meta tags always come first -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>
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
<?php include 'side_panel.php';?>

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


<div class="container">
	<div class="row m-t-50">

		<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
			<div class="ui-block">
				<article class="hentry blog-post single-post single-post-v3">
<?php
$asked_pro = $_GET['asked_by'];
$query_pro="SELECT * FROM users WHERE username = '$asked_pro'";
$results_pro = mysqli_query($conn,$query_pro);

while ($row_pro = mysqli_fetch_assoc($results_pro)) {
$profi = $row_pro['profile_hash'];
}
?>
		

					<ul class="filter-icons">
						
					</ul>
					<h3 class="title"><b><?php echo $_GET['question'];?></b><br></h3>

					<div class="author-date">
						<div class="author-thumb">
							<img alt="author" src="https://res.cloudinary.com/novicetopro/profile_pictures/28X28/<?php echo $profi;?>" class="avatar">
						</div>
						by
						<a class="h6 post__author-name fn" <?php echo ' href="people_profile.php?profile_username=' . $_GET['asked_by'] . '">'?><?php echo $_GET['asked_by'];?><br><br><br></a>
						<div class="post__date">
						</div>
					</div>


					<div class="post-content-wrap">

						

						<div class="post-content">
						<div class="tab-pane" id="profile-1" role="tabpanel" aria-expanded="true">
						<form method="post" enctype="multipart/form-data" <?php echo ' action="answer_upload.php?ques_id=' . $ques_id . '"> '?>>
								
							<textarea id="editor" name="answer" >Write your answer here!</textarea>
							<input type="hidden" name="ques_id" value="<?php echo $ques_id ?>"/>
							<script>
									ClassicEditor
									
									.create( document.querySelector( '#editor' ) )
									.then( editor => {
									console.log( editor );
									} )
									.catch( error => {
									console.error( error );
								} );
							</script>
									<input type="file" name="myfile" id="fileToUpload">

							 		<button type="submit" class="btn btn-primary" name="submit" >submit</button>

							</form>
							
						</div>
						<br><br>
						_____________________________________________________________________________________________________________________
						
						<h3 class="title"><b><font color="#887E7C">Checkout other answers---</font></b><br></h3>
						<?php
$query1="SELECT * FROM answers WHERE ques_id = '$ques_id' ORDER BY upvotes DESC";
$results1 = mysqli_query($conn,$query1);
while ($row1 = mysqli_fetch_assoc($results1)) {
	$answered_by1 = $row1['answered_by'];
	$query_pro="SELECT * FROM users WHERE username = '$answered_by1'";
$results_pro = mysqli_query($conn,$query_pro);

while ($row_pro = mysqli_fetch_assoc($results_pro)) {
$profil = $row_pro['profile_hash'];
}
?>
		<br><br><br><br><br>
		
						<div class="author-date">
						<div class="author-thumb">
							<img alt="author" src="https://res.cloudinary.com/novicetopro/profile_pictures/36X36/<?php echo $profil;?>" class="avatar">
						</div>
						by
						<a class="h6 post__author-name fn" href="#"><?php echo $row1['answered_by'];?><br><br><br></a>
						<div class="post__date">
						</div>
					</div>


		<p><?php echo htmlspecialchars_decode($row1['answer']); ?></p>
		----answered by<a <?php echo ' href="people_about.php?profile_username=' . $answered_by1 . '">'?> <cite><?php echo htmlspecialchars($answered_by1);  ?></cite></a>
		_____________________________________________________________________________________________________________________
<?php }
?>
				</article>
			


				
			</div>
		</div>

		<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12">
			<aside>
				<div class="ui-block">
					<div class="ui-block-title">
						<h6 class="title">Related Questions</h6>
					</div>
				</div>

				<div class="ui-block">
					<article class="hentry blog-post blog-post-v3 featured-post-item">

<?php

$query="SELECT * FROM questions  ORDER BY RAND() LIMIT 4";
$results = mysqli_query($conn,$query);
while ($row = mysqli_fetch_assoc($results)) {
	$question_id1 = $row['ques_id'];
	$total_answer = 0;
	$query_likes = "SELECT * FROM answers WHERE ques_id = '$question_id1' ";
	$results_likes1 = mysqli_query($conn, $query_likes);
	while ($row_likes1 = mysqli_fetch_assoc($results_likes1)) {
		$total_answer = $total_answer + 1;
	}
	?>
						<div class="post-content">

							<div class="author-date">
								by
								<a class="h6 post__author-name fn" href="#"><?php echo $row['asked_by'];?></a>
								<div class="post__date">
									<time class="published" datetime="2017-04-24T18:18">
										<?php echo $row['asked_time'];?>
									</time>
								</div>
							</div>

							<a class="h4 post-title" <?php echo ' href="answer.php?question=' . $row['question'] .  '&asked_by=' .$row['asked_by']  . '&ques_id=' .$row['ques_id'].'">'?><?php echo substr($row['question'],0,63); ?>...</a>

							<div class="post-additional-info inline-items">

								

								<div class="comments-shared">
									<a href="#" class="post-add-icon inline-items">
										<svg class="olymp-speech-balloon-icon"><use xlink:href="icons1/icons.svg#olymp-speech-balloon-icon"></use></svg>
										<span><?php echo $total_answer; ?></span>
									</a>
								</div>

							</div>
						</div>
						<?php } ?>
					</article>
				</div>



				
			</aside>
		</div>

	</div>

</div>


<!-- Window-popup-CHAT for responsive min-width: 768px -->

<!-- ... end Window-popup-CHAT for responsive min-width: 768px -->


</body>
</html>
