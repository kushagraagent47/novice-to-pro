<?php
session_start();

include 'include.php';
include 'include_profile.php';

$usernames = $_SESSION['username'];
?>
<header class="header header-responsive" id="site-header-responsive">

<div class="header-content-wrapper">
    <ul class="nav nav-tabs mobile-app-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#request" role="tab">
                <div class="control-icon has-items">
                    <svg class="olymp-happy-face-icon"><use xlink:href="icons/icons.svg#olymp-happy-face-icon"></use></svg>
                    <div class="label-avatar bg-blue">3</div>
                </div>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#chat" role="tab">
                <div class="control-icon has-items">
                    <svg class="olymp-chat---messages-icon"><use xlink:href="icons/icons.svg#olymp-chat---messages-icon"></use></svg>
                    <div class="label-avatar bg-purple">22</div>
                </div>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#notification" role="tab">
                <div class="control-icon has-items">
                    <svg class="olymp-thunder-icon"><use xlink:href="icons/icons.svg#olymp-thunder-icon"></use></svg>
                    <div class="label-avatar bg-primary">8</div>
                </div>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#search" role="tab">
                <svg class="olymp-magnifying-glass-icon"><use xlink:href="icons/icons.svg#olymp-magnifying-glass-icon"></use></svg>
                <svg class="olymp-close-icon"><use xlink:href="icons/icons.svg#olymp-close-icon"></use></svg>
            </a>
        </li>
    </ul>
</div>

<!-- Tab panes -->
<div class="tab-content tab-content-responsive">

    <div class="tab-pane " id="request" role="tabpanel">

        <div class="mCustomScrollbar" data-mcs-theme="dark">
            <div class="ui-block-title ui-block-title-small">
                <h6 class="title">FRIEND REQUESTS</h6>
                <a href="#">Find Friends</a>
                <a href="#">Settings</a>
            </div>
            <?php
$query321="SELECT * FROM followers WHERE following = '$usernames'";
$results321 = mysqli_query($conn,$query321);

?>
            <ul class="notification-list friend-requests">
            <?php			
            while ($row321 = mysqli_fetch_assoc($results321)) {
                $pro_n = $row321['user1'];
                $query_n="SELECT * FROM users WHERE username = '$pro_n'";
                $results_n = mysqli_query($conn,$query_n);
                
                while ($row_n = mysqli_fetch_assoc($results_n)) {
                $profil_n = $row_n['profile_hash'];
                }
                
            ?>
                <li class="accepted">
                    <div class="author-thumb">
                        <img src="https://res.cloudinary.com/novicetopro/profile_pictures/36X36/<?php echo $profil_n;?>" alt="author">
                    </div>
                    <div class="notification-event">
                            <?php echo $row321['user1']; ?> <a class="h6 notification-friend"<?php echo ' href="people_profile.php?profile_username=' . $row321['user1'] . '">'?> started</a> following you <a class="notification-link"<?php echo ' href="people_profile.php?profile_username=' . $row321['user1'] . '">'?></a>.
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
            <a href="#" class="view-all bg-blue">Check all your Events</a>
        </div>

    </div>

    <div class="tab-pane " id="chat" role="tabpanel">

        <div class="mCustomScrollbar" data-mcs-theme="dark">
            <ul class="notification-list chat-message">
            <?php
$query_ans1="SELECT * FROM questions WHERE asked_for = '$usernames' ORDER BY ques_id DESC";
$results_ans1 = mysqli_query($conn,$query_ans1);
while ($row_ans1 = mysqli_fetch_assoc($results_ans1)) {
?>
<?php
$pro_n3 = $row_ans1['asked_by'];
						$query_n3="SELECT * FROM users WHERE username = '$pro_n3'";
						$results_n3 = mysqli_query($conn,$query_n3);
						
						while ($row_n3 = mysqli_fetch_assoc($results_n3)) {
						$profil_n3 = $row_n3['profile_hash'];
						}
						?>
               <li class="message-unread">
                            <div class="author-thumb">
                                <img src="https://res.cloudinary.com/novicetopro/profile_pictures/36X36/<?php echo $profil_n3;?>" alt="author">
                            </div>
                            <div class="notification-event">
                                <a class="h6 notification-friend"<?php echo ' href="answer.php?question=' . $row_ans1['question'] .  '&asked_by=' .$row_ans1['asked_by']  . '&ques_id=' .$row_ans1['ques_id'].'">'?><?php echo $row_ans['asked_by'];?> asked you a question</a>
                                <?php
						$ques_ques1 = htmlspecialchars_decode($row_ans1['question']);
						?>
                                <span class="chat-message-item"><?php echo substr($ques_ques1,0,14);?></span>
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
        <a href="#" class="view-all bg-purple">View All Questions</a>

    </div>

    <div class="tab-pane " id="notification" role="tabpanel">

        <div class="mCustomScrollbar" data-mcs-theme="dark">
            <div class="ui-block-title ui-block-title-small">
                <h6 class="title">Notifications</h6>
                <a href="#">Mark all as read</a>
                <a href="#">Settings</a>
            </div>
            <?php
$query146="SELECT * FROM answers WHERE answered_by IN (SELECT following FROM followers WHERE user1 = '$usernames') ORDER BY answer_id DESC LIMIT 7";
$results146 = mysqli_query($conn,$query146);

?>
            <ul class="notification-list">
            <?php			
            while ($row146 = mysqli_fetch_assoc($results146)) {
                $pro_user1 = $row146['answered_by'];
						$query_pro1="SELECT * FROM users WHERE username = '$pro_user1'";
						$results_pro1 = mysqli_query($conn,$query_pro1);
						
						while ($row_pro1 = mysqli_fetch_assoc($results_pro1)) {
						$profil1 = $row_pro1['profile_hash'];
						}
						?>
            
                <li>
                    <div class="author-thumb">
                        <img src="https://res.cloudinary.com/novicetopro/profile_pictures/36X36/<?php echo $profil1;?>" alt="author">
                    </div>
                    <div class="notification-event">
                            <div><a class="h6 notification-friend"<?php echo ' href="people_about.php?profile_username=' . $row146['answered_by'] . '">'?><?php echo $row146['answered_by'];?></a> added an answer <a class="notification-link"<?php echo ' href="view_answer2.php?question='  . '&ques_id=' .$row6['answer_id'].'">'?>check now</a></div>
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

            <a href="#" class="view-all bg-primary">View All Notifications</a>
        </div>

    </div>

    <div class="tab-pane " id="search" role="tabpanel">


            <form class="search-bar w-search notification-list friend-requests">
                <div class="form-group with-button">
                    <input class="form-control js-user-search" placeholder="Search here people or pages..." type="text">
                </div>
            </form>


    </div>

</div>
<!-- ... end  Tab panes -->

</header>
