<?php
include_once 'db_connection.php';

// This code takes a users input and then sanitises it before uploading it up to the database to be displayed on the site.

$newsTitle = filter_input(INPUT_POST, 'newsTitle', FILTER_SANITIZE_STRING);
$newsContent = filter_input(INPUT_POST, 'newsContent', FILTER_SANITIZE_STRING);
$username = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);

$usersql = "SELECT userID FROM CA_Users where userName = '$username'";
$user = $pdo -> prepare($usersql);
$user -> execute();
$userresult = $user -> fetchcolumn();
$today = date(Ymd);

$sql = "INSERT INTO CA_News (newsTitle, newsContent, userID, submittedOn) VALUES (:newstitle, :newscontent, :userid, :submittedon)";
$statement = $pdo -> prepare($sql);

$success = $statement -> execute([
        "newstitle" => $newsTitle,
        "newscontent" => $newsContent,
        "userid" => $userresult,
		"submittedon" => $today
    ]);
	
	if($success && $statement -> rowCount() > 0){
		header('Location: ../admin.php');
} else {
    echo "Failed to Create User";
	echo "\nPDO::errorInfo():\n";
    print_r($pdo->errorInfo());
}
?>