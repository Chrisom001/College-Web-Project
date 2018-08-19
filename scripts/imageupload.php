<?php
include_once 'db_connection.php';
$course = $_POST['course'];
//This gets the courseID for the course which the image was uploaded for
$courseIDcheck = "SELECT courseID FROM CA_Courses WHERE courseName = '$course'";
$courseIDcheckquery = $pdo -> query($courseIDcheck);
$courseIDcheckresult = $courseIDcheckquery -> fetchcolumn();
$courseID = $courseIDcheckresult;


$target_dir = "../images/courses/$course/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		$filename = basename($_FILES['fileToUpload']['name']);
		$filelocation = "images/courses/$course/$filename";
		echo $filelocation;
		$sql = "INSERT INTO CA_Images (location, courseID) VALUES (:location, :courseID)";
		$statement = $pdo -> prepare($sql);
		$success = $statement -> execute([
        "location" => $filelocation,
		"courseID" => $courseID
    ]);
	
		if($success && $statement -> rowCount() > 0){
		} else {
			echo "Failed to Insert Record";
			echo "\nPDO::errorInfo():\n";
			print_r($pdo->errorInfo());
		}
		
		chmod("../".$filelocation, 0644);
		header('Location: ../'.$course.'.php');
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>