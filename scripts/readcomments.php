<?php
$coursesql = "SELECT courseID FROM CA_Courses where courseName = '$page'";
$courseID = $pdo -> prepare($coursesql);
$courseID -> execute();
$IDresult = $courseID -> fetchcolumn();
// This checks if any comments have been posted for a particular course and only if it has been moderated.
$commentcheck = "SELECT COUNT(commentID) FROM CA_Comments WHERE courseID = $IDresult AND moderated = 'Yes'";
$commentcheckquery = $pdo -> query($commentcheck);
$commentcheckresult = $commentcheckquery -> fetchcolumn();

$commentsql = "SELECT * FROM CA_Comments WHERE courseID = $IDresult AND moderated = 'Yes'";
$commentquery = $pdo -> query($commentsql);
$comments = $commentquery -> fetchAll(PDO::FETCH_OBJ);
//This displays any moderated comments by users
$commentoutput = "";
$commentoutput .= "<table>";
$commentoutput .= "<th>Comment</th><th>Submitted By</th>";
	if ($commentcheckresult > 0){
		foreach ($comments as $comment){
			 $commentoutput .= "<tr>";
			 $commentoutput .= "<td>" . $comment->commentContent . "</td>";
			 $commentoutput .= "<td>" . $comment->submittedBy . "</td>";
			 $commentoutput .= "</tr>";
		}
		$commentoutput .= "</table>";
		
		echo $commentoutput;
	} else {
		echo "There are no comments to display!";
		echo "</br>";
		echo "Be the first to add one";
	}
?>
<!-- This allows users to submit their own comments for the site -->
<form id="newcommentform" name="newcommentform" method="POST" action="newcomment.php">
	<input type="hidden" name="courseID" id="courseID" value="<?php echo $IDresult;?>">
	<input type="submit" value="Create Comment" id="newcomment" />
</form>