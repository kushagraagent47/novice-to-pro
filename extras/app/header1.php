<?php 
include 'include_profile.php';

include 'include.php';
session_start();

$usernames = $_SESSION['username'];

if(isset($_POST['status_submit'])){

    $status = $_POST['status'];
    $sql = "UPDATE users SET custom_status='$status' WHERE username = '$usernames'";
    if ( $conn->query($sql) ){
        header("location: newsfeed.php");   
        } 
    }
?>
<head>

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
<link rel="stylesheet" type="text/css" href="css/mediaelement-playlist-plugin.min.css">
<link rel="stylesheet" type="text/css" href="css/mediaelementplayer.css">

<!-- Lightbox popup script-->
<link rel="stylesheet" type="text/css" href="css/magnific-popup.css">


</head>
<header class="header" id="site-header">

<div class="page-title">
    <h6>Newsfeed</h6>
</div>

<div class="header-content-wrapper">
    <form class="search-bar w-search notification-list friend-requests">
        <div class="form-group with-button">
            <input class="form-control js-user-search" placeholder="Search here people or pages..." type="text" onkeyup="showResult(this.value)">
            <button>
                <svg class="olymp-magnifying-glass-icon"><use xlink:href="icons/icons.svg#olymp-magnifying-glass-icon"></use></svg>
            </button>
        </div>
    </form>

    <a href="find_friends.php" class="link-find-friend">Find friends</a>

    <div class="control-block">

        <div class="control-icon more has-items">
            <svg class="olymp-happy-face-icon"><use xlink:href="icons/icons.svg#olymp-happy-face-icon"></use></svg>
            <div class="label-avatar bg-blue">6</div>

            <div class="more-dropdown more-with-triangle triangle-top-center">
                <div class="ui-block-title ui-block-title-small">
                    <h6 class="title">FRIEND REQUESTS</h6>
                    <a href="find_friends.php">Find Friends</a>
                    <a href="personal_info.php">Settings</a>
                </div>
                <?php
$query7="SELECT * FROM followers WHERE following = '$usernames'";
$results7 = mysqli_query($conn,$query7);

?>
                <div class="mCustomScrollbar" data-mcs-theme="dark">
                    <ul class="notification-list friend-requests">
                    <?php			
                while ($row7 = mysqli_fetch_assoc($results7)) {
                ?>
                        <li class="accepted">
                            <div class="author-thumb">
                                <img src="img/avatar57-sm.jpg" alt="author">
                            </div>
                            <div class="notification-event">
                                <?php echo $row7['user1']; ?> <a class="h6 notification-friend"<?php echo ' href="people_profile.php?profile_username=' . $row7['user1'] . '">'?> started</a>following you <a class="notification-link"<?php echo ' href="people_profile.php?profile_username=' . $row7['user1'] . '">'?></a>.
                            </div>
                            <span class="notification-icon">
                                <svg class="olymp-happy-face-icon"><use xlink:href="icons/icons.svg#olymp-happy-face-icon"></use></svg>
                            </span>

                            <div class="more">
                                <svg class="olymp-three-dots-icon"><use xlink:href="icons/icons.svg#olymp-three-dots-icon"></use></svg>
                                <svg class="olymp-little-delete"><use xlink:href="icons/icons.svg#olymp-little-delete"></use></svg>
                            </div>
                        </li>
                        <?php
                }
                ?>
                    </ul>
                </div>

                <a href="#" class="view-all bg-blue">Check all your Events</a>
            </div>
        </div>

        <div class="control-icon more has-items">
            <svg class="olymp-chat---messages-icon"><use xlink:href="icons/icons.svg#olymp-chat---messages-icon"></use></svg>
            <div class="label-avatar bg-purple">2</div>

            <div class="more-dropdown more-with-triangle triangle-top-center">
                <div class="ui-block-title ui-block-title-small">
                    <h6 class="title">Questions for you</h6>
                </div>

                <div class="mCustomScrollbar" data-mcs-theme="dark">
                    <ul class="notification-list chat-message">
                    <?php
$query_ans="SELECT * FROM questions WHERE asked_for = '$usernames' ORDER BY ques_id DESC";
$results_ans = mysqli_query($conn,$query_ans);
while ($row_ans = mysqli_fetch_assoc($results_ans)) {
?>
                        <li class="message-unread">
                            <div class="author-thumb">
                                <img src="img/avatar59-sm.jpg" alt="author">
                            </div>
                            <div class="notification-event">
                                <a class="h6 notification-friend"<?php echo ' href="answer.php?question=' . $row_ans['question'] .  '&asked_by=' .$row_ans['asked_by']  . '&ques_id=' .$row_ans['ques_id'].'">'?><?php echo $row_ans['asked_by'];?> asked you a question</a>
                                <?php
						$ques_ques = htmlspecialchars_decode($row_ans['question']);
						?>
                                <span class="chat-message-item"><?php echo substr($ques_ques,0,14);?></span>
                                <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
                            </div>
                            <span class="notification-icon">
                                <svg class="olymp-chat---messages-icon"><use xlink:href="icons/icons.svg#olymp-chat---messages-icon"></use></svg>
                            </span>
                            <div class="more">
                                <svg class="olymp-three-dots-icon"><use xlink:href="icons/icons.svg#olymp-three-dots-icon"></use></svg>
                            </div>
                        </li>
<?php } ?>
                       

                       
                    </ul>
                </div>

                <a href="#" class="view-all bg-purple">View All Messages</a>
            </div>
        </div>

        <div class="control-icon more has-items">
            <svg class="olymp-thunder-icon"><use xlink:href="icons/icons.svg#olymp-thunder-icon"></use></svg>

            <div class="label-avatar bg-primary">8</div>

            <div class="more-dropdown more-with-triangle triangle-top-center">
                <div class="ui-block-title ui-block-title-small">
                    <h6 class="title">Notifications</h6>
                    <a href="#">Mark all as read</a>
                    <a href="#">Settings</a>
                </div>
                <?php
$query6="SELECT * FROM answers WHERE answered_by IN (SELECT following FROM followers WHERE user1 = '$usernames') ORDER BY answer_id DESC LIMIT 7";
$results6 = mysqli_query($conn,$query6);

?>

                <div class="mCustomScrollbar" data-mcs-theme="dark">
                    <ul class="notification-list">
                    <?php			
                while ($row6 = mysqli_fetch_assoc($results6)) {
                ?>
                        <li>
                            <div class="author-thumb">
                                <img src="img/avatar62-sm.jpg" alt="author">
                            </div>
                            <div class="notification-event">
                                <div><a class="h6 notification-friend"<?php echo ' href="people_about.php?profile_username=' . $row6['answered_by'] . '">'?><?php echo $row6['answered_by'];?></a> added an answer <a class="notification-link"<?php echo ' href="view_answer2.php?question='  . '&ques_id=' .$row6['answer_id'].'">'?>check now</a></div>
                                <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
                            </div>
                                <span class="notification-icon">
                                    <svg class="olymp-comments-post-icon"><use xlink:href="icons/icons.svg#olymp-comments-post-icon"></use></svg>
                                </span>

                            <div class="more">
                                <svg class="olymp-three-dots-icon"><use xlink:href="icons/icons.svg#olymp-three-dots-icon"></use></svg>
                                <svg class="olymp-little-delete"><use xlink:href="icons/icons.svg#olymp-little-delete"></use></svg>
                            </div>
                        </li>
<?php
                }
                ?>
                        
                    </ul>
                </div>

                <a href="#" class="view-all bg-primary">View All Notifications</a>
            </div>
        </div>

        <div class="author-page author vcard inline-items more">
            <div class="author-thumb">
                <img alt="author" src="img/author-page.jpg" class="avatar">
                <span class="icon-status online"></span>
                <div class="more-dropdown more-with-triangle">
                    <div class="mCustomScrollbar" data-mcs-theme="dark">
                        <div class="ui-block-title ui-block-title-small">
                            <h6 class="title">Your Account</h6>
                        </div>

                        <ul class="account-settings">
                            <li>
                                <a href="personal_info.php">

                                    <svg class="olymp-menu-icon"><use xlink:href="icons/icons.svg#olymp-menu-icon"></use></svg>

                                    <span>Profile Settings</span>
                                </a>
                            </li>
                            <li>
                                <a href="newsfeed.php">
                                    <svg class="olymp-star-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="FAV PAGE"><use xlink:href="icons/icons.svg#olymp-star-icon"></use></svg>

                                    <span>Newsfeed</span>
                                </a>
                            </li>
                            <li>
                                <a href="logout.php">
                                    <svg class="olymp-logout-icon"><use xlink:href="icons/icons.svg#olymp-logout-icon"></use></svg>

                                    <span>Log Out</span>
                                </a>
                            </li>
                        </ul>
                    <!--
                        <div class="ui-block-title ui-block-title-small">
                            <h6 class="title">Chat Settings</h6>
                        </div>

                        <ul class="chat-settings">
                            <li>
                                <a href="#">
                                    <span class="icon-status online"></span>
                                    <span>Online</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="icon-status away"></span>
                                    <span>Away</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="icon-status disconected"></span>
                                    <span>Disconnected</span>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <span class="icon-status status-invisible"></span>
                                    <span>Invisible</span>
                                </a>
                            </li>
                        </ul>
-->
                        <div class="ui-block-title ui-block-title-small">
                            <h6 class="title">Custom Status</h6>
                        </div>
<?php
$query123="SELECT * FROM users WHERE username = '$usernames'";
$results123 = mysqli_query($conn,$query123);

while ($row123 = mysqli_fetch_assoc($results123)) {
    $custom_status = $row123['custom_status'];
}
?>

                        <form action="header.php" method="post" class="form-group with-button custom-status">
                            <input class="form-control" placeholder="" name = "status" type="text" value="<?php echo $custom_status;?>">

                            <button name="status_submit" class="bg-purple">
                                <svg class="olymp-check-icon"><use xlink:href="icons/icons.svg#olymp-check-icon"></use></svg>
                            </button>
                        </form>

                        <div class="ui-block-title ui-block-title-small">
                            <h6 class="title">About NOVICETOPRO</h6>
                        </div>

                        <ul>
                            <li>
                                <a href="#">
                                    <span>Terms and Conditions</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span>FAQs</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span>Careers</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span>Contact</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
            <?php $_SESSION['custom_status'] = $custom_status;?>
            <a href="user_profile.php" class="author-name fn">
                <div class="author-title">
                <?php echo htmlspecialchars($_SESSION['username']); ?><svg class="olymp-dropdown-arrow-icon"><use xlink:href="icons/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
                </div>
                <span class="author-subtitle"><?php echo $custom_status; ?></span>
            </a>
        </div>

    </div>
</div>

</header>
<script>
function showResult(str) {
  if (str.length==0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}
</script>