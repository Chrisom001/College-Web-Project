<?php
include 'scripts/header.php';
?><!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Noto+Sans:700'>
  <link rel="stylesheet" href="css/script.css">
  <link rel="stylesheet" href="css/grid.css">
  <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
  <script src="scripts/jssor.js" type="text/javascript"></script>
</head>

<body>
	<!-- <div class = "containerLogin"> -->
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
				<p>Please enter your login information below</p> </br></br>
				<form id="login" name="login" method="POST" action="scripts/attemptLogin.php">
					<label for="username"><span>Username:</span></label>  
					<input type="text" name="username" id="username" /> </br>
					<label for="password"><span>Password:</span></label>
					<input type="password" name="password" id="password" />
					<input type="submit" value="Submit" id="loginsubmit" />
				</form>
			</div>
			<footer class="login-footer">
				<?php include 'scripts/footer.php'; ?>
			</footer>
		</div>
	<!-- </div> -->

	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</body>
</html>
