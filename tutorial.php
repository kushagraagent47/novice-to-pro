<?php
session_start();
include 'include.php';
$user = $_SESSION['username'];
$sql129 = "UPDATE users SET tutorial='1' WHERE username='$user'";
if ( $conn->query($sql129) ){
        
}
?>