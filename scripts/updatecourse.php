<?php
include_once 'db_connection.php';

$coursecontent = $_POST['coursecontent'];
$jobs = $_POST['jobs'];
$progression = $_POST['progression'];
$course = $_POST['course'];
$images = $_POST['images'];
$date = date("Y-m-d");
$coursecontents = "../coursefiles/$course/coursecontent.txt";
$job = "../coursefiles/$course/jobs.txt";
$progressions = "../coursefiles/$course/progression.txt";
$image = "../coursefiles/$course/images.txt";

$coursecontentfile = fopen($coursecontents, "w") or die("Unable to open file!");
fwrite($coursecontentfile, $coursecontent);
fclose($coursecontentfile);

$jobsfile = fopen($job, "w") or die("Unable to open file!");
fwrite($jobsfile, $jobs);
fclose($jobsfile);

$progressionfile = fopen($progressions, "w") or die("Unable to open file!");
fwrite($progressionfile, $progression);
fclose($progressionfile);

$imagesfile = fopen($image, "w") or die("Unable to open file!");
fwrite($imagesfile, $images);
fclose($imagesfile);

$sql = "UPDATE CA_Courses SET lastUpdated = CURDATE() WHERE courseName = '$course'";
$statement = $pdo -> query($sql);

header('Location: ../admin.php');
?>