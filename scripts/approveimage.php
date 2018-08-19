<?php
include_once 'db_connection.php';

$imageID = $_POST['imageID'];
$coursename = $_POST['coursename'];
//This code updates an image to show that it has been approved, and then adding the relevant code to the images file to allow it to be displayed on the website live.
$locationcheck = "SELECT location FROM CA_Images WHERE imageID = $imageID";
$locationcheckquery = $pdo -> query($locationcheck);
$locationcheckresult = $locationcheckquery -> fetchcolumn();
$imagefilename = "../coursefiles/$coursename/images.txt";
$inserttext = "<li><img src='$locationcheckresult' /></li>";
file_put_contents($imagefilename, $inserttext, FILE_APPEND);

$sql = "DELETE FROM CA_Images WHERE imageID = '$imageID'";
$statement = $pdo -> query($sql);



header('Location: ../admin.php');
?>