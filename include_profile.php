<?php
include 'include.php';
session_start();
$usernames = $_SESSION['username'];

$query1123="SELECT * FROM users WHERE username = '$usernames'";
$results1123 = mysqli_query($conn,$query1123);

while ($row1123 = mysqli_fetch_assoc($results1123)) {
    $profile_hash1 = $row1123['profile_hash'];
    $twitter_id = $row1123['twitter'];
}
?>