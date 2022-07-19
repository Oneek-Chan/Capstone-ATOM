<?php
	include "conn.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ATOM - Accreditation Tool for Optimal Management</title>
	<link rel="icon" href="img/LOGO_2.png">
	<!----CSS LINKS---->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/right-click.css">
	<!----CDNS---->
	<script src="https://kit.fontawesome.com/a3c2048161.js" crossorigin="anonymous"></script>
</head>
<body>
	<?php 
	require 'nav.php'; ?>
	<div class="main-panel">
		<input type="file" accept="application/pdf" name="file-upload" class="browse"><br>
		<button class="upload"><i class="fa-solid fa-arrow-up-from-bracket"></i>Upload</button>
	</div>
</body>
</html>