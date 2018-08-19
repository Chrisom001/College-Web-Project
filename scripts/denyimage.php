<?php
include_once 'db_connection.php';

$imageID = $_POST['imageID'];
$coursename = $_POST['coursename'];

//This pulls the location of the file from the database
$locationcheck = "SELECT location FROM CA_Images WHERE imageID = $imageID";
$locationcheckquery = $pdo -> query($locationcheck);
$locationcheckresult = $locationcheckquery -> fetchcolumn();

//This is the location for the images file.
$imagefilename = "../coursefiles/$coursename/images.txt";

//This deletes the file
unlink('../' . $locationcheckresult);

//This deletes the entry from the database
$sql = "DELETE FROM CA_Images WHERE imageID = '$imageID'";
$statement = $pdo -> query($sql);
header('Location: ../admin.php');
?>