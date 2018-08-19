<?php 
include_once 'db_connection.php';
// This section of code sanitizes a users input and then uploads it to the database to be moderated by an admin or moderator.

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);
$courseID = $_POST['courseID'];
$sql = "INSERT INTO CA_Comments (commentContent, courseID, submittedBy) VALUES (:commentContent, :courseID, :submittedBy)";
$statement = $pdo -> prepare($sql);

$success = $statement -> execute([
        "commentContent" => $comment,
        "courseID" => $courseID,
        "submittedBy" => $name
    ]);
	
if($success && $statement -> rowCount() > 0){
		$pagecheck = "SELECT courseName FROM CA_Courses WHERE courseID = $courseID";
		$pagecheckquery = $pdo -> query($pagecheck);
		$pagecheckresult = $pagecheckquery -> fetchcolumn();
		header('Location: ../'.$pagecheckresult.'.php');
} else {
    echo "Failed to Create User";
	echo "\nPDO::errorInfo():\n";
    print_r($pdo->errorInfo());
}
?>