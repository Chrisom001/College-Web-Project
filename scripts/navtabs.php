<!-- This creates the tabs for the user to browse through -->
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'courseContent')">Course Content</button>
  <button class="tablinks" onclick="openCity(event, 'progression')">Progression</button>
  <button class="tablinks" onclick="openCity(event, 'jobs')">Jobs</button>
  <button class="tablinks" onclick="openCity(event, 'studentTestimonials')">Student Testimonials</button>
  <button class="tablinks" id="hide" onclick="openCity(event, 'gallery')">Gallery</button>
  <?php
		//This checks if the page the user is on is the Software development page. If it is, they are shown the quiz tab as well
		if ($page == 'software'){ ?>
			<button class="tablinks" onclick="openCity(event, 'quiz')">Quiz</button>
		<?php }
	?>
</div>
<!-- This pulls the course content from the text file it's stored on -->
<div id="courseContent" class="tabcontent">
<?php 
	include 'coursefiles/'.$page.'/coursecontent.txt';
?>
</div>
<!-- This pulls the course progression from the text file it's stored on -->
<div id="progression" class="tabcontent">
<?php 
	include 'coursefiles/'.$page.'/progression.txt';
?>
</div>
<!-- This pulls the jobs from the text file it's stored on -->
<div id="jobs" class="tabcontent">
<?php 
	include 'coursefiles/'.$page.'/jobs.txt';
?>
</div>
<!-- This section displays any student testimonials which have been submitted. -->
<div id="studentTestimonials" class="tabcontent">
	<p>
		We have a number of student testimonials which have been provided to give you an idea of how students that have taken this course felt about it.
	</p>
	<?php
		include 'scripts/readcomments.php';
	?>
</div>
<!-- This displays the gallery with any images which have been uploaded for each particular area. -->
<div id="gallery" class="tabcontent">
	<div id="slider">
		<a href="#" class="control_next">></a>
		<a href="#" class="control_prev"><</a>
		<ul>
			<?php include 'coursefiles/'.$page.'/images.txt';?>
		</ul>  
	</div>

<div class="slider_option">
  <input type="checkbox" id="checkbox">
  <label for="checkbox">Autoplay Slider</label>
</div>
	<p>If you have any images you'd like to share please upload them here</p>
	<form action="scripts/imageupload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload"></br>
	<input type="hidden" name="course" id="course" value="<?php echo $page;?>">
    <input type="submit" value="Upload Image" name="submit">
</form>
</div>

<script src="scripts/tabs.js"></script>