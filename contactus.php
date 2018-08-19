<?php
include 'scripts/header.php';
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Contact Us</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Noto+Sans:700'>
  <link rel="stylesheet" href="css/script.css">
  <link rel="stylesheet" href="css/grid.css">
  <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
</head>

<body>
	<div class="contact-grid-container">
			<div class="contact-user">
				<?php echo "Welcome " . $username; ?>
			</div>
		<div class="contact-banner">
			<img src = "images\banner.png" alt="logo" class="center">
		</div>
		<div class="contact-menu">
			<?php include 'scripts/menu.php'; ?>
		</div>
		<div class="contact-text">
			<h1 id="header1">Contact Us</h1>
				<p>If you want to contact us with some feedback about the website or you would like some more information. Please use the form below and we'll get back to you as quickly as we can.</p>
		</div>
		<div class="contact-email">
			<form id="userform">
				Name:  </br>
				<input type="text" name="name">
				</br>
				</br>
				Email Address </br>
				<input type="textarea" name="email">
				</br></br>
				Feedback Type </br>
				<input type="radio" name="feedback" value="Comments" checked>Comment
				<input type="radio" name="feedback" value="Question" >Question
				<input type="radio" name="feedback" value="Request" >Request
				</br></br>
				Do you wish a reply? </br>
				<input type="radio" name="reply" value="yes" checked>Yes
				</br>
				<input type="radio" name="reply" value="no" >No
				</br></br>
				<textarea name="message" form="userform" maxlength=250 style="width:80%; height: 40%">Enter your message here... Maximum length 250 characters</textarea>
				</br></br>
				<input type="submit" value="Submit">
			</form>
		</div>
		<div class="contact-details">
			The other ways to contact the college are </br> </br>
				
				Phone Number: 0300 123 1010 </br>
				
				Postal Address: </br>
				Arbroath Campus, Keptie Road, Arbroath, Scotland, DD11 3EA. </br>
				Gardyne Campus, Gardyne Road, Dundee, Scotland, DD5 1NY.</br>
				Kingsway Campus, Old Glamis Road, Dundee, Scotland, DD3 8LE.
		</div>
		<div class="contact-footer">
			<?php include 'scripts/footer.php'; ?>
		</div>
	</div>

</body>
</html>
