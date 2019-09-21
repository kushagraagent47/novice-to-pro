<?php
session_start();
include 'include.php';
include 'include_profile.php';

$username2 = $_SESSION['username'];
include 'cloudinary/settings.php';
    $profile_hash =  md5(rand(0,10000));
    $sql = " UPDATE users SET profile_hash = '$profile_hash' WHERE username = '$username2'";
  
		if ( $conn->query($sql) ){

    $profile_username = $_POST['prof_username'];
    $currentDir = getcwd();
    $uploadDirectory = "/cloudinary/uploads/";

    $errors = []; // Store all foreseen and unforseen errors here

    $fileExtensions = ['jpeg','jpg','png']; // Get all the file extensions

    $fileName = $_FILES['myfile']['name'];
    $fileSize = $_FILES['myfile']['size'];
    $fileTmpName  = $_FILES['myfile']['tmp_name'];
    $fileType = $_FILES['myfile']['type'];
    $fileExtension = strtolower(end(explode('.',$fileName)));

    $uploadPath = $currentDir . $uploadDirectory . basename($fileName); 

    if (isset($_POST['submit'])) {

        if (! in_array($fileExtension,$fileExtensions)) {
            $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
        }

        if ($fileSize > 2000000) {
            $errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
        }

        if (empty($errors)) {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

            if ($didUpload) {
                \Cloudinary\Uploader::upload($uploadPath, 
                array("public_id" => "profile_pictures/128X128/$profile_hash", array("format" => "jpg"),"transformation"=>array(
                        array("width"=>400, "height"=>400, "gravity"=>"face", "radius"=>"max", "crop"=>"crop"),
                        array("width"=>128, "height"=>128, "crop"=>"scale")) 
                        )
                        );

                        \Cloudinary\Uploader::upload($uploadPath, 
                        array("public_id" => "profile_pictures/28X28/$profile_hash", array("format" => "jpg"),"transformation"=>array(
                                array("width"=>400, "height"=>400, "gravity"=>"face", "radius"=>"max", "crop"=>"crop"),
                                array("width"=>28, "height"=>28, "crop"=>"scale")) 
                                )
                                );
                        \Cloudinary\Uploader::upload($uploadPath, 
                        array("public_id" => "profile_pictures/36X36/$profile_hash", array("format" => "jpg"),"transformation"=>array(
                                array("width"=>400, "height"=>400, "gravity"=>"face", "radius"=>"max", "crop"=>"crop"),
                                array("width"=>36, "height"=>36, "crop"=>"scale")) 
                                )
                                );
                                \Cloudinary\Uploader::upload($uploadPath, 
                                array("public_id" => "profile_pictures/92X92/$profile_hash", array("format" => "jpg"),"transformation"=>array(
                                        array("width"=>400, "height"=>400, "gravity"=>"face", "radius"=>"max", "crop"=>"crop"),
                                        array("width"=>92, "height"=>92, "crop"=>"scale")) 
                                        )
                                        );
  
                                        ?>
                                        <script type="text/javascript">
                                        window.location.href = 'newsfeed.php';
                                        </script>
                                        <?php
            } else {
                echo "An error occurred somewhere. Try again or contact the admin";
            }
        } else {
            foreach ($errors as $error) {
                echo $error . "These are the errors" . "\n";
            }
        }
    }

}
?>
