		<div id = "footer">
			<p>&copy; Dundee and Angus College 2017</p>
			<p>
				<a href = "index.php">Home</a> | <a href = "sitemap.php">Sitemap</a> |<a href = "contactus.php">Contact Us</a> | 
				<?php 
					if (!isset($_SESSION['loggedIn'])){
					echo "<a href='login.php'>Admin Login</a>";
					} else {
					echo "<a href='admin.php'>Admin Page</a> | <a href='scripts/logout.php'>Logout</a>";
					}
					?>
			</p>
		</div>
		
<script>
function myFunction() {
    var x = document.getElementById("topnavigation");
    if (x.className === "navigation") {
        x.className += " responsive";
    } else {
        x.className = "navigation";
    }
}
</script>