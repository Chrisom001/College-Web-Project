<?php
include 'scripts/header.php';
include 'scripts/db_connection.php';
$rec_limit = 5;

if (isset($_GET['page'])){
	$page = $_GET['page'];
	$offset = $rec_limit * $page;
} else {
	$page = 0;
	$offset = 0;
}

$sql = "SELECT * FROM CA_News ORDER BY submittedOn ASC LIMIT :offset, :limit";
$stmt = $pdo->prepare($sql);
$stmt -> bindValue(':offset', (int)$offset, PDO::PARAM_INT);
$stmt -> bindValue(':limit', (int)$rec_limit, PDO::PARAM_INT);
$success = $stmt->execute();
$displayed = 0;
if($success && $stmt->rowCount() > 0){
	$results = $stmt->fetchAll(PDO::FETCH_OBJ);
	$output = "";
	$output .= "<table>";
	$output .= "<th>Title</th>";
	$output .= "<th>Content</th>";
	$output .= "<th>Submitted On</th>";
	foreach($results as $result){
		$output .= "<tr>";
		$output .= "<td>".$result->newsTitle."</td>";
		$output .= "<td>".$result->newsContent."</td>";
		$output .= "<td>".$result->submittedOn."</td>";
		$output .= "</tr>";
		$displayed = $displayed + 1;
	}
	$output .="</table>";
} else {
	$output = "No News Articles";
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Homepage</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset = "utf-8" />
		<link rel="stylesheet" type="text/css" href="css/script.css" media = "screen">
		<link rel="stylesheet" type="text/css" href="css/grid.css" media = "screen">
	</head>
	
	<body>
		<div class="home-grid-container">
			<div class="home-user">
				<?php echo "Welcome " . $username; ?>
			</div>
		<div class="home-banner">
			<img src = "images\banner.png" alt="logo" class="center">
		</div>
		<div class="home-text">
			<p>Welcome to the computing department website. This site will provide you with more information about the courses available</p>
				
			<p>Please use the buttons below to pick a section to start looking at.</p>
		</div>
		<div class="home-buttons">
			<img src="images/networking.png" onClick="location.href='network.php'">
			<img src="images/softwaredev.png" onClick="location.href='software.php'"></br>
			<img src="images/gamesdev.png" onClick="location.href='games.php'">
			<img src="images/computerscience.png" onClick="location.href='compscience.php'"></br>
			<img src="images/webdevelopment.png" onClick="location.href='webdevelopment.php'"> 
		</div>
		<div class="home-news">
			<?php
				echo $output;
				echo "</br>";
				
				if ($page > 0){
					$last = $page - 1;
					echo "<a href = index.php?page=".$last ."'>Last 5 Records</a> |";
				}
					 else if($displayed == $rec_limit){
						echo "<a href =index.php?page=".($page + 1)."'>Next 5 Records</a>";
					} else if($page == 0){
						if($displayed == $rec_limit)
							echo "<a href =index.php?page=".($page + 1)."'>Next 5 Records</a>";
					}
				
			?>
		</div>
		<div class="home-footer">
			<?php include 'scripts/footer.php'; ?>
		</div>
	</div>
	</body>

</html> 