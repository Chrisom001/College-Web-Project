<!-- This section is for the form relating to the creation of new users -->
		<div class ="admin-createUser">
			<p>Please enter the new users details here making sure that it is entered correctly.</p>
			<form id="createUserForm" name="createUser" method="POST" action="scripts/createuser.php">
				<label for="username"><span>Username:</span></label>  
				<input type="text" name="username" id="username" maxlength="20" /> </br>
				<label for="password"><span>Password:</span></label>
				<input type="password" name="password" id="password"/> </br>
				<label for="role"><span>Role:</span></label>
				<select name="role">
					<option value = "moderator">Moderator</option>
					<option value = "admin">Admin</option>
				</select> </br>
				<input type="submit" value="Submit" id="loginsubmit" />
			</form>
		</div>
		<!-- This section is for the form relating to the News Posts -->
		<div class = "admin-createNewsPost">
			<p>Please enter the new news post details</p>
			<form id="createNewsForm" name="createUser" method="POST" action="scripts/createnews.php">
				<label for="newsTitle"><span>Title:</span></label>  
				<input type="text" name="newsTitle" id="newsTitle" maxlength="55" /> </br>
				<label for="newsContent"><span>Content:</span></label>
				<textarea name="newsContent" id="newsContent" form="createNewsForm" style="width:80%; height: 40%">Please enter the news article here limited to 500 characters</textarea> </br>
				<input type="hidden" name="user" id="user" value="<?php echo $username;?>">
				<input type="submit" value="Submit" id="createnews" />
			</form>
		</div>
			
			<!-- This section is for the form relating to updating Courses -->
			<div class = "admin-updateCourses">
			<p>Please select the course below to update it</p>
				<form id="updatecourses" name="deleteUser" method="POST" action="updatecourse.php">
					<label for="courses"><span>Courses:</span></label>
					<select name="courses">
						<?php echo $courseoutput; ?>
					</select> </br>
					<input type="submit" value="Submit" id="updatecourses" />
				</form>
			</div>
			
			<!-- This section is for the form relating to delete users -->
			<div class = "admin-deleteUser">
				<p>Please select the user in the dropdown to update or delete .</p>
				<form id="deleteUsers" name="deleteUser" method="POST" action="scripts/deleteuser.php" onsubmit="return confirm('Are you sure you want to submit this form?')">
					<label for="users"><span>Users:</span></label>
					<select name="users">
						<?php echo $deleteoutput; ?>
					</select> </br>
					<label for="password"><span>Password:</span></label>
					<input type="password" name="password" id="password"/> </br>
					<input type="submit" value="Delete" name = "deleteUsers" id="deleteUsers" />
					<input type="submit" value="Update" name= "updateUsers" id="updateUsers" />
				</form>
			</div>