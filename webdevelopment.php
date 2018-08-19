<?php
include 'scripts/header.php';
$page = basename(__FILE__, '.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Digital Design & Web Development</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Noto+Sans:700'>
	<link rel="stylesheet" href="css/script.css">
	<link rel="stylesheet" href="css/grid.css">
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src="scripts/slider.js" type"text/javascript"></script>
	<script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
</head>

<body>
	<div class="web-grid-container">
			<div class="web-user">
				<?php echo "Welcome " . $username; ?>
			</div>
		<div class="web-banner">
			<img src = "images\banner.png" alt="logo" class="center">
		</div>
		<div class="web-menu">
			<?php include 'scripts/menu.php'; ?>
		</div>
		<div class="web-content">
			<h1 id="header1">HNC Digital Design and Web Development</h1>
			<p>
				The Digital Design and Web Development HNC is made up of a number of modules which will enable you to gain the HNC qualification and move onto the HND. This will be detailed further in the tabs below.
			</p>
			<?php include 'scripts/navtabs.php'; ?>
		</div>
		<div class="web-footer">
			<?php include 'scripts/footer.php'; ?>
		</div>
	</div>
	
</body>
</html>
