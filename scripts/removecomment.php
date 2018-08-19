<?php
include_once 'db_connection.php';

$commentID = $_POST['commentID'];

$sql = "DELETE FROM CA_Comments WHERE commentID = '$commentID'";
$statement = $pdo -> query($sql);

header('Location: ../admin.php');
?>