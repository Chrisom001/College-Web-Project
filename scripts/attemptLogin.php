<?php
include_once 'db_connection.php';
session_start();
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);


$salt = "DustyIsTheBest1995Salt";

$password = $password . $salt;
$password = $password;
$pw = sha1($password);

$sql = "SELECT  * FROM CA_Users WHERE userName = :username AND password = :password";
$statement = $pdo -> prepare($sql);

$success = $statement -> execute ([
    'username' => $username,
    'password' => $pw    
]);



if($success && $statement -> rowCount() > 0){
	$adminsql = "SELECT role FROM CA_Users where userName = '$username'";
    $admin = $pdo -> prepare($adminsql);
    $admin -> execute();
	$adminresult = $admin -> fetchcolumn();
	if ($adminresult == 'admin'){
		$role = "admin";
	} elseif ($adminresult == "moderator"){
		$role = "moderator";
	} else {
		$role = "user";
	}
    setcookie("userCookie", $username . "," . $role, time() + (86400 * 30), "/");
	$_SESSION['loggedIn'] = true;
   header('Location: ../admin.php');
} else {
    echo "Failed to Login";
}

?>