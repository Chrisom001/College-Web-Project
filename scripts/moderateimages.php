<?php 
//This looks for any images which haven't been moderated at this stage. If there are any it displays a link which can be used to verify an image is appropriate for the site.

$rec_limit = 2;

if (isset($_GET['page'])){
	$page = $_GET['page'];
	$offset = $rec_limit * $page;
} else {
	$page = 0;
	$offset = 0;
}

$modimagechecksql = "SELECT * FROM CA_Images WHERE moderated = 'No' LIMIT :offset, :limit";
$modimagecheckquery = $pdo -> prepare($modimagechecksql);
$modimagecheckquery -> bindValue(':offset', (int)$offset, PDO::PARAM_INT);
$modimagecheckquery -> bindValue(':limit', (int)$rec_limit, PDO::PARAM_INT);

$success = $modimagecheckquery->execute();
$displayed = 0;

if($success && $modimagecheckquery->rowCount() > 0){
	$modimagechecks = $modimagecheckquery -> fetchAll(PDO::FETCH_OBJ);
	
	$modimageoutput = "";
	$modimageoutput .= "<table>";
	$modimageoutput .= "<th>Image Link</th><th>Course</th><th>Approve</th><th>Deny</th>";
	
	foreach ($modimagechecks as $modimagecheck){
		$coursecheck1 = "SELECT courseName FROM CA_Courses WHERE courseID = $modimagecheck->courseID";
		$coursecheckquery1 = $pdo -> query($coursecheck1);
		$coursecheckresult1 = $coursecheckquery1 -> fetchcolumn();
		
		$imageID = $modimagecheck->imageID;
		$modimageoutput .= "<tr>";
		$modimageoutput .= "<td><a href='" . $modimagecheck->location . "'>Image</></td>";
		$modimageoutput .= "<td>" . $coursecheckresult1 . "</td>";
		$modimageoutput .= "<td>
			<form id='approvecomment' name='approvecomment' method='POST' action='scripts/approveimage.php'>
			<input type='hidden' name = 'imageID' value=".$imageID." id='imageID'>
			<input type='hidden' name = 'coursename' value='".$coursecheckresult1."' id='coursename'>
			<input type='image' src='images/Yes.png' alt='Submit Form' />
			</form></td>";
			
		$modimageoutput .= "<td>
			<form id='removecomment' name='removecomment' method='POST' action='scripts/denyimage.php'>
			<input type='hidden' name = 'imageID' value=".$imageID." id='imageID'>
			<input type='hidden' name = 'coursename' value='".$coursecheckresult1."' id='coursename'>
			<input type='image' src='images/No.png' alt='Submit Form' />
			</form></td>";
		$modimageoutput .= "</tr>";
		$displayed = $displayed + 1;
	}
	$modimageoutput .= "</table>";
	echo $modimageoutput;
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
		echo "There are no images to be Moderated!";
	}
?>