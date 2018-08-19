<?php
 	include 'scripts/header.php';
	
	//Checks if a user has been created
	
	if (isset ($_GET["created"])){
		echo "<script>";
		echo "alert('The user was created successfully!');";
		echo "</script>";
	}
	// Checks if a user is an Admin or Moderator. If not, they are sent back to the homepage.
	if ($role != "admin"){
		if ($role != "moderator"){
			header('Location: index.php');
		}
	}

	//This pulls a list of users from the database to use with the delete users function
	$deletesql = "SELECT * FROM CA_Users";
	$deletequery = $pdo -> query($deletesql);
	$deletes = $deletequery -> fetchAll(PDO::FETCH_OBJ);
	$deleteoutput = "";
	
		foreach ($deletes as $delete){
			$deleteoutput .= "<option value ='".$delete->userID."'>".$delete->userName."</option>";
		}
		
		// This pulls a list of courses from the database to use with the update courses function.
	$coursesql = "SELECT courseName, fullcoursename FROM CA_Courses";
	$coursesquery = $pdo -> query($coursesql);
	$courses = $coursesquery -> fetchAll(PDO::FETCH_OBJ);
	$courseoutput = "";
	
		foreach ($courses as $course){
			$courseoutput .= "<option value ='".$course->courseName."'>".$course->fullcoursename."</option>";
		}
		
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title><?php echo $page; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Noto+Sans:700'>
  <link rel="stylesheet" href="css/script.css">
  <link rel="stylesheet" href="css/grid.css">
  <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
</head>

<body>
	<div class="admin-grid-container">
		<div class="admin-user">
			<?php echo "Welcome " . $username; ?>
		</div>
		<div class="admin-banner">
			<img src = "images\banner.png" alt="logo" class="center">
		</div>
		<div class="admin-menu">
			<?php include 'scripts/menu.php'; ?>
		</div>
		<?php
			if ($role == "admin") { 
				include 'scripts/adminsection.php';
			}
		?>
		
			<!-- This section shows any comments that require moderation-->
			<div class = "admin-moderateComments">
				<p>
					Below there will be a list of comments to be moderated.
				</p>
				<?php 
					include 'scripts/moderatecommentlist.php';
				?>
			</div>
			
			<!-- This section is to moderate any images -->
			<div class = "admin-moderateImages">
				<p>
					Below there will be a list of images to be moderated.
				</p>
				<?php 
					include 'scripts/moderateimages.php';
				?>
			</div>
			<div class = "admin-footer">
				<?php include 'scripts/footer.php'; ?>
			</div>
		</div>
	
		
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

</body>
</html>