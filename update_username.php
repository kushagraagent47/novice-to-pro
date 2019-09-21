<?php
session_start();
$user = $_SESSION['username'];

include 'include.php';
if(isset($_POST['register'])) {
    $new = $_POST['username'];
$count = 0;
    $query="SELECT * FROM users WHERE username = '$new'";
    $results = mysqli_query($conn,$query);
    while ($row = mysqli_fetch_assoc($results)) {
        $count = $count + 1;
    }
    if($count != 0){

        $_SESSION['message'] = "Username in use";
        header("location:newsfeed.php");
        }
else {
    $sql = "UPDATE users SET username = '$new' WHERE username = '$user'";
    if ( $conn->query($sql) ){
        $sql2 = "UPDATE followers SET user1='$new' WHERE user1 = '$user'";
        if ($conn->query($sql2)) {
       $_SESSION['message1'] = 1;
       $_SESSION['username'] = $new;
            header("location:newsfeed.php");
        }
}
}
}