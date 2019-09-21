
<?php 
session_start();
include 'include.php';

$username = $_SESSION['username'];
$user = $_GET['user'];
$query = "SELECT * FROM (SELECT * FROM chat WHERE (receiver = '$username' AND sender ='$user') OR (receiver = '$user' AND sender = '$username') ORDER BY time DESC LIMIT 5)tmp order by tmp.time asc";
$run = $conn->query($query);
while ($row = $run->fetch_array()) {
    $sender = $row['sender'];
    $query187 = "SELECT * FROM users WHERE username = '$sender'";
    $results187 = mysqli_query($conn, $query187);
    while ($row187 = mysqli_fetch_assoc($results187)) {
        $user_name = $row187['name'];
        $image_link = $row187['profile_hash'];
        ?><div id="chat_data">
            <ul class="notification-list chat-message chat-message-field">

                <li>
                    <div class="author-thumb">
                        <img src="https://res.cloudinary.com/novicetopro/profile_pictures/36X36/<?php echo $image_link; ?>" alt="author">
                    </div>
                    <div class="notification-event">
                        <a href="#" class="h6 notification-friend"><?php echo $user_name; ?></a>
                        <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['time']; ?></time></span>
                        <br>
                        <span class="chat-message-item"><?php echo $row['message']; ?></span>
                    </div>
                </li>

        </div>
    <?php }
} ?>