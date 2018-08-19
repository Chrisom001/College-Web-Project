<div class = "navigation" id="topnavigation">
		<?php
				if ($page !="index"){
					echo "<a href='index.php'>Homepage</a>";
				}
				if ($page != "network"){
					echo "<a href='network.php'>Networking and Technical Support</a>";
				}
				if ($page != "software"){
					echo "<a href='software.php'>Software Development</a>";
				}
				if ($page != "games"){
					echo "<a href='games.php'>Games Development</a>";
				}
				if ($page != "webdevelopment"){
					echo "<a href='webdevelopment.php'>Digital Design & Web Development</a>";
				}
				if ($page != "compscience"){
					echo "<a href='compscience.php'>Computer Science</a>";
				}
				if ($page != "contactus"){
					echo "<a href='contactus.php'>Contact Us</a>";
				}
				 if (!isset($_SESSION['loggedIn'])){
					echo "<a href='login.php'>Admin Login</a>";
				} else {
					echo "<a href='scripts/logout.php'>Logout</a>";
				} 
				?>
				<a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
	</div> <!-- End of Menu -->