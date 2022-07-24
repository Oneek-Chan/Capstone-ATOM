<?php
		$servername = "padayon.ts.infra.dranem.me";
		$username = "maria";     //server username
		$password = "maria123";          //server password 
		$dbname = "accreditation_db";  //database name

		$link = mysqli_connect($servername, $username, $password, $dbname);
				if (!$link) {
	  				die("Connection failed: " . mysqli_connect_error());
				}
?>