<?php
include_once 'db_connection.php';

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING);

$salt = "DustyIsTheBest1995Salt";

$password = $password . $salt;
$pw = sha1($password);


$sql = "INSERT INTO CA_Users (userName, password, role) VALUES (:username, :password, :role)";
$statement = $pdo -> prepare($sql);

$success = $statement -> execute([
        "username" => $username,
        "password" => $pw,
        "role" => $role
    ]);
	
	if($success && $statement -> rowCount() > 0){
		header('Location: ../admin.php?created=yes');
} else {
    echo "Failed to Create User";
	echo "\nPDO::errorInfo():\n";
    print_r($pdo->errorInfo());
}
?>