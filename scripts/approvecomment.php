<?php
include_once 'db_connection.php';

$commentID = $_POST['commentID'];
//This updates a comment to show it has been moderated and approved.
$sql = "UPDATE CA_Comments SET moderated = 'Yes' WHERE commentID = '$commentID'";
$statement = $pdo -> query($sql);

header('Location: ../admin.php');
?>