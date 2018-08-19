<?php
	include_once 'db_connection.php';
	if (!isset($_COOKIE[userCookie])){
		$username = "Guest";
	} else {
		$pieces = explode(",", $_COOKIE["userCookie"]);
		$username = $pieces[0];
		$role = $pieces[1];
	}
	session_start();
?>