<?php
		$servername = "localhost";
		$username = "root";     //server username
		$password = "";          //server password 
		$dbname = "accreditation";  //database name

		$link = mysqli_connect($servername, $username, $password, $dbname);
				if (!$link) {
	  				die("Connection failed: " . mysqli_connect_error());
				}
?>