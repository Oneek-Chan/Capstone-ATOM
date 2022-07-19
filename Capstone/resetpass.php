<?php
	session_start();
	include "conn.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ATOM - Accreditation Tool for Optimal Management</title>
	<link rel="icon" href="img/LOGO_2.png">
	<!--- CSS LINKS --->
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
	<nav class="navbar">
		<img src="img/LOGO_2.png">
		<ul>
			<li><a href="#">About Us</a></li>
			<li><a href="#">Contact Us</a></li>
			<li><a href="index.php">Log In</a></li>
		</ul>
	</nav>
	<div class="logo">
		<img src="img/LOGO_1.png" class="pic">
	</div>
	<div class="login" >
		<div class="tabcontent" style='margin-top: -10px; display: block;'>
			<form  method="post" action="index.php">
				<h1>Password<br>Successfully<br>Reset<br></h1>
				<input type="submit" value="Done"><br>
			</form>
		</div>
	</div>
	
	<footer style="text-align: center;">
		<p>Copyright <span>&copy;</span> Nocturnal Programming 2022</p>
	</footer>
	<script type="text/javascript">
        function disableBack() { window.history.forward(); }
        setTimeout("disableBack()", 300);
        window.onunload = function () { null };
	</script>
	
</body>
</html>