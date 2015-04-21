<?php
	define("DB_SERVER", "silverbulletsrebooted.rishinaik.com");
	define("DB_USER", "silverbullets");
	define("DB_PASS", "cs179krocks");
	define("DB_NAME", "iowewho");

	// 1. Create a database connection
	$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

	// Test if connection succeeded
	if(mysqli_connect_errno()) 
	{
		die("Database connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
	}
	else
	{
		//echo "Connection to iowewho was succuessful!";
	}
?>