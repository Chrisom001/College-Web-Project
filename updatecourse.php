<?php
 	include 'scripts/header.php';
	if ($role != "admin"){
		if ($role != "moderator"){
			header('Location: index.php');
		}
	}
	
	$page = $_POST['courses'];
	$coursecontent = "coursefiles/$page/coursecontent.txt";
	$job = "coursefiles/$page/jobs.txt";
	$progression = "coursefiles/$page/progression.txt";
	$images = "coursefiles/$page/images.txt";
	
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Admin - Update Course</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Noto+Sans:700'>
  <link rel="stylesheet" href="css/script.css">
  <link rel="stylesheet" href="css/grid.css">
  <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
</head>

<body>
	<div class="updateCourse-grid-container">
			<div class="updateCourse-user">
				<?php echo "Welcome " . $username; ?>
			</div>
		<div class="updateCourse-banner">
			<img src = "images\banner.png" alt="logo" class="center">
		</div>
		<div class="updateCourse-menu">
			<?php include 'scripts/menu.php'; ?>
		</div>
		<!-- This section below pulls information from the text files related to whichever course was picked by the user and displays it in a text box, allowing a user to edit the codepen
		This means instead of saving everything into the database it can be done slightly easier here. They then submit this and it then overwrites the current text file with the new text -->
		<div class="updateCourse-content">
			<p>Below you will be able to edit the text files which contain the content for each section of the course tabs.</p>
		</div>
		<div class="updateCourse-update">
			<form id="updatecourse" name="updatecourse" method="POST" action="scripts/updatecourse.php">
				<label for="coursecontent"><span>Course Content:</span></label>
				<textarea name="coursecontent" id="coursecontent" form="updatecourse" cols=70 rows=10 maxlength=2000>
				<?php 
					include ("$coursecontent");
				?>
				</textarea> </br>
				<label for="jobs"><span>Jobs:</span></label>
				<textarea name="jobs" id="jobs" form="updatecourse" cols=70 rows=10 maxlength=1000>
				
				<?php 
					include ("$job");
				?>
				
				</textarea> </br>
				<label for="progression"><span>Progression:</span></label>
				<textarea name="progression" id="progression" form="updatecourse" cols=70 rows=10 maxlength=1000>
				
				<?php 
					include ("$progression");
				?>
				
				</textarea> </br>
				<input type="hidden" name="course" id="course" value="<?php echo $course;?>">
				<label for="progression"><span>Images:</span></label>
				<textarea name="images" id="images" form="updatecourse" cols=70 rows=10 maxlength=1000>
				
				<?php 
					include ("$images");
				?>
				
				</textarea> </br>
				<input type="hidden" name="course" id="course" value="<?php echo $course;?>">
				<input type="submit" value="Submit" id="updatecourse" />
			</form>
		</div>
		<div class="updateCourse-footer">
			<?php include 'scripts/footer.php'; ?>
		</div>
	</div>
		
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</body>
</html>
