<?php 
//This section of code checks for any comments which haven't been moderated or approved at this stage and displays them ready to be moderated.

$rec_limit = 2;

if (isset($_GET['page'])){
	$page = $_GET['page'];
	$offset = $rec_limit * $page;
} else {
	$page = 0;
	$offset = 0;
}
 
$modcommentsql = "SELECT * FROM CA_Comments WHERE moderated = 'No' LIMIT :offset, :limit";
$modcommentquery = $pdo -> prepare($modcommentsql);
$modcommentquery -> bindValue(':offset', (int)$offset, PDO::PARAM_INT);
$modcommentquery -> bindValue(':limit', (int)$rec_limit, PDO::PARAM_INT);

$success = $modcommentquery->execute();
$displayed = 0;

if($success && $modcommentquery->rowCount() > 0){
	$modcomments = $modcommentquery -> fetchAll(PDO::FETCH_OBJ);
	
	$modcommentoutput = "";
	$modcommentoutput .= "<table>";
	$modcommentoutput .= "<th>Comment</th><th>Submitted By</th><th>Course</th><th>Approve</th><th>Deny</th>";
	foreach ($modcomments as $modcomment){
		$coursecheck = "SELECT courseName FROM CA_Courses WHERE courseID = $modcomment->courseID";
		$coursecheckquery = $pdo -> query($coursecheck);
		$coursecheckcheckresult = $coursecheckquery -> fetchcolumn();
		
		$commentID = $modcomment->commentID;
		$modcommentoutput .= "<tr>";
		$modcommentoutput .= "<td>" . $modcomment->commentContent . "</td>";
		$modcommentoutput .= "<td>" . $modcomment->submittedBy . "</td>";
		$modcommentoutput .= "<td>" . $coursecheckcheckresult . "</td>";
		$modcommentoutput .= "<td>
			<form id='approvecomment' name='approvecomment' method='POST' action='scripts/approvecomment.php'>
			<input type='hidden' name = 'commentID' value=".$commentID." id='commentID'>
			<input type='image' src='images/Yes.png' alt='Submit Form' />
			</form></td>";
			
		$modcommentoutput .= "<td>
			<form id='removecomment' name='removecomment' method='POST' action='scripts/removecomment.php'>
			<input type='hidden' name = 'commentID' value=".$commentID." id='commentID'>
			<input type='image' src='images/No.png' alt='Submit Form' />
			</form></td>";
		$modcommentoutput .= "</tr>";
		$displayed = $displayed + 1;
	}
	
	$modcommentoutput .= "</table>";
	
	echo $modcommentoutput;
	echo "</br>";
 		if ($page > 0){
			$last = $page - 1;
			echo "<a href = admin.php?page=".$last ."'>Last 2 Records</a> |";
		}
		else if($displayed == $rec_limit){
			echo "<a href =admin.php?page=".($page + 1)."'>Next 2 Records</a>";
		} else if($page == 0){
			if($displayed == $rec_limit)
			echo "<a href =admin.php?page=".($page + 1)."'>Next 2 Records</a>";
		} 
} else {
		echo "There are no comments to be Moderated!";
	}
?>