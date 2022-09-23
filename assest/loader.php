<?php

	date_default_timezone_set('Asia/Karachi');

	define ("DB_HOST_NAME", "localhost");
	define ("DB_USER", "root");
	define ("DB_PASS", "");
	define ("DB_NAME", "ledger system");

	

	$conn	=	new mysqli(DB_HOST_NAME, DB_USER, DB_PASS, DB_NAME, 3306);
	if ($conn -> connect_errno) {
	  echo "Failed to connect to MySQL: " . $conn -> connect_error;
	  exit();
	}

?>