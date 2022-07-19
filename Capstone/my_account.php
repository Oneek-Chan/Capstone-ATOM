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
		require 'nav.php';
	?>
	<div id="my_account" class="main-panel">
		<img src="img/user.jpg" class="userpic">
		<?php 
	    	$uname = $_SESSION['Username'];
	    	$qry = "SELECT b.* from credentials a INNER JOIN user b WHERE a.Username = '$uname'";
	    	$sult = mysqli_query($link, $qry);
				if ($ow = mysqli_fetch_array($sult)) {
					echo "<div  style='font-size:20px; float: left; margin-top: 50px; margin-left: 20px; text-transform:uppercase;'><strong style='font-size:20px;'>".$uname."</strong><br>
							<i style='font-size:12px'>".$ow["Designation"]."</i><div><br>";
				}
	    ?>
	    
	</div>
</body>
</html>