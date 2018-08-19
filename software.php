<?php
include 'scripts/header.php';
$page = basename(__FILE__, '.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Software Development</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Noto+Sans:700'>
		<link rel="stylesheet" href="css/script.css">
		<link rel="stylesheet" href="css/grid.css">
		<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
		<script src="scripts/slider.js" type"text/javascript"></script>
		<script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
	</head>

	<body>
		<div class="software-grid-container">
			<div class="software-user">
				<?php echo "Welcome " . $username; ?>
			</div>
			<div class="software-banner">
				<img src = "images\banner.png" alt="logo" class="center">
			</div>
			<div class="software-menu">
				<?php include 'scripts/menu.php'; ?>
			</div>
			<div class="software-content">
				<h1 id="header1">HND Software Development</h1>
				<p>
					The Software Development HND is made up of a number of modules which will enable you to gain the HND qualification. This will be detailed further in the tabs below.
				</p>
				<?php include 'scripts/navtabs.php'; ?>
				<div id="quiz" class="tabcontent">
					<?php include 'scripts/softwarequiz.php'; ?>
				</div>
			</div>
			<div class="software-footer">
				<?php include 'scripts/footer.php'; ?>
			</div>
		</div>
		
		<script type = "text/javascript" src = "scripts/quiz.js"></script>
	</body>
</html>
