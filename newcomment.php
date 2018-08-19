<?php
include 'scripts/header.php';
?><!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>New Comment</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/script.css">
  <link rel="stylesheet" href="css/grid.css">
</head>

<body>
	<div class="login-grid-container">
			<div class="login-user">
				<?php echo "Welcome " . $username; ?>
			</div>
			<div class="login-banner">
				<img src = "images\banner.png" alt="logo" class="center">
			</div>
			<div class="login-menu">
				<?php include 'scripts/menu.php'; ?>
			</div>
			<div class="login-content">
				<p>Please enter your comment below</p> </br>
				<form id="newcommentform" name="newcommentform" method="POST" action="scripts/addcomment.php">
					<label for="name"><span>Your Name:</span></label>  
					<input type="text" name="name" id="name" maxlength="55" /> </br>
					<label for="comment"><span>Comment:</span></label>
					<textarea name="comment" id="comment" form="newcommentform" cols=100 rows=20 maxlength=500>Please enter your comment here (limited to 500 characters)</textarea> </br>
					<input type="hidden" name="courseID" id="courseID" value="<?php echo $_POST['courseID']; ?>">
					<input type="submit" value="Create Comment" id="newcomment" />
				</form>
			</div>
			<footer class="login-footer">
				<?php include 'scripts/footer.php'; ?>
			</footer>
		</div>
</body>
</html>
