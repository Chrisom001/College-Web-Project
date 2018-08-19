<?php
include_once 'db_connection.php';
//If the user selects Update User it runs this script to update rather than delete
if (isset($_POST["updateUsers"])){
	$user = $_POST['users'];
	$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
	$salt = "DustyIsTheBest1995Salt";

	$password = $password . $salt;
	$pw = sha1($password);
	
	$sql = "UPDATE CA_Users SET password = :password WHERE userID = :username";
	$statement = $pdo -> prepare($sql);

	$success = $statement -> execute([
        "username" => $user,
        "password" => $pw,
    ]);
	
	if($success && $statement -> rowCount() > 0){
		header('Location: ../admin.php');
		} else {
    echo "Failed to Update User";
	echo "<br />";
	echo $user;
	echo "<br />";
	echo $pw;
	echo "<br />";
	echo "\nPDO::errorInfo():\n";
    print_r($pdo->errorInfo()); 
}

} else {
	$users = $_POST['users'];
	echo $users;
	 $sql = "DELETE FROM CA_Users WHERE userID = $users";
	$statement = $pdo -> query($sql);
	header('Location: ../admin.php'); 
} 
?>