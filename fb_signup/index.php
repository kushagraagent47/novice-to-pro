<?php
if(!session_id()) {
    session_start();
}
session_start();
	$conn = mysqli_connect("localhost","root", "", "novice_to_pro");

	if (!isset($_SESSION['access_token'])) {
		header('Location: login.php');
		exit();
	}
?>
<?php $_SESSION['userData']['picture']['url'] ?>
<?php $_SESSION['userData']['id'] ?>
<?php  $_SESSION['userData']['first_name'] ?>
<?php  $_SESSION['userData']['last_name'] ?>
<?php  $_SESSION['userData']['email'] ?>

<?php
	$user_id = $_SESSION['userData']['id'];
	$hash =  md5(rand(0,1000));
	$name = $_SESSION['userData']['first_name'] ." ". $_SESSION['userData']['last_name'];
	$email = $_SESSION['userData']['email'];
	$newid = sprintf('%0d', rand(0, 999));
	$username = $_SESSION['userData']['first_name'] . $newid;
	$query = "SELECT * FROM users WHERE email='$email'";
	$result = $conn->query($query);
    if ($username != '') {
        if (mysqli_num_rows($result)>=1) {
            $users = $result->fetch_assoc();
            $_SESSION['user_id'] = $users['user_id'];
            $_SESSION['name'] = $users['name'];
            $_SESSION['username'] = $users['username'];
            $_SESSION['cateogary'] = $users['cateogary'];
            $_SESSION['email'] = $users['email'];
            $_SESSION['hash'] = $users['hash'];
            $_SESSION['verified'] = $users['verified'];
            $_SESSION['moderator'] = $users['moderator'];
            $_SESSION['logged_in'] = true; ?>
		<script type="text/javascript">
		window.location.href = '/newsfeed.php';
		</script>
		<?php
        } else {
            $sql = "INSERT INTO users (name, password, email, username, verified, hash) "
    . "VALUES ('$name','Hitman47@gmail.com', '$email', '$username', '1', '$hash')";
    
            if ($conn->query($sql)) {
                $_SESSION["name"] = $name;
                $_SESSION["email"] = $email;
                $_SESSION['verified'] = '1';
                $_SESSION["username"] = $username;
                $_SESSION["social"] = '1';
                $_SESSION['logged_in'] = true; ?>
            <script type="text/javascript">
            window.location.href = '/newsfeed.php';
            </script>
            <?php
            }
        }
	}
	else {
		?>
            <script type="text/javascript">
            window.location.href = '/index.php';
            </script>
            <?php
	}
?>
