<?php
session_start();
include 'include.php';
include 'cloudinary/settings.php';
$answer = mysqli_real_escape_string($conn, $_POST['answer']);
$image_hash =  md5(rand(0,1000000));
$ans = htmlspecialchars($answer);
$user = $_SESSION['username'];
$ques_id = $_GET['ques_id'];
$fileName = $_FILES['myfile']['name'];
if($fileName == "") {
    $sql1 = "INSERT INTO answers (ques_id,  answer, answered_by) " 
	. "VALUES ('$ques_id','$ans','$user')";
	
	if ( $conn->query($sql1) ){ ?>
        <script type="text/javascript">
        window.location.href = 'newsfeed.php';
        </script>
    <?php
    }
}
else {
    $sql11 = "INSERT INTO answers (ques_id,  answer, answered_by, image_src) " 
    . "VALUES ('$ques_id','$ans','$user','$image_hash')";
    if ( $conn->query($sql11) ){
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
                array("public_id" => "answer_uploads/$image_hash", array("format" => "jpg"),"transformation"=>array(
                        ) 
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

