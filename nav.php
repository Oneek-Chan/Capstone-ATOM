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
	<!----CSS LINKS---->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/right-click.css">
	<!----CDNS---->
	<script src="https://kit.fontawesome.com/a3c2048161.js" crossorigin="anonymous"></script>
</head>
<body>
	<nav class="top-nav">
		<img src="img/LOGO_2.png" width="180px;" style="margin-top: -20px; margin-left: 20px; float:left;">
		<form style="justify-content: center; display:inline-flex; width: 50%; margin-left:10vw; margin-top: 4px; float:left;">
			<input type="text" name="search-details" placeholder="Search..." class="search">
			<button name="search" class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
		</form>
		<img src="img/user.jpg" style="float: right; margin-top: 5px;" onclick="myFunction()" class="dropbtn user">
		<img src="img/notif.png" width="25px" style="float: right; margin-top: 15px; margin-right: 20px; margin-top: 17px;">
		<div class="dropdown">
		 	<div id="myDropdown" class="dropdown-content">
			    <?php 
			    	$uname = $_SESSION['Username'];
			    	$qry = "SELECT b.* from credentials a INNER JOIN user b WHERE a.Username = '$uname'";
			    	$sult = mysqli_query($link, $qry);
       				if ($ow = mysqli_fetch_array($sult)) {
       					echo "<div style='text-align:center'><strong style='font-size:17px'>".$uname."</strong><br>
       							<i style='font-size:12px'>".$ow["Designation"]."</i><div><br>";
       				}
			    ?>
			    <hr><a href="my_account.php">My Account</a>
			    <a href="index.php">Log Out</a>
		  	</div>
		</div>
		
	</nav>
	<nav class="side-nav" id="myDIV"> 
		<ul>
			<a href="home.php"><li class="tabs active" id="tab1"><i class="fa-solid fa-list-check" ></i>Status</li>
			<a href="upload.php"><li class="tabs" id="tab2"><i class="fa-solid fa-arrow-up-from-bracket"></i>Uploads</li></a>
			<a href="colleges.php"><li class="tabs" id="tab3"><i class="fa-solid fa-arrow-up-from-bracket"></i>Colleges</li></a>
			<a href="areas.php"><li class="tabs" id="tab4"><i class="fa-solid fa-arrow-up-from-bracket"></i>Areas</li></a>
			<li class="tabs" id="tab5"><i class="fa-solid fa-clock-rotate-left"></i>History</li>
			<a href="trash.php"><li class="tabs" id="tab6"><i class="fa-solid fa-trash"></i>Trash</li></a>
	</nav>

<script type="text/javascript">
	function myFunction() {
	  document.getElementById("myDropdown").classList.toggle("show");
	}
	window.onclick = function(event) {
	  if (!event.target.matches('.dropbtn')) {
	    var dropdowns = document.getElementsByClassName("dropdown-content");
	    var i;
	    for (i = 0; i < dropdowns.length; i++) {
	      var openDropdown = dropdowns[i];
	      if (openDropdown.classList.contains('show')) {
	        openDropdown.classList.remove('show');
	      }
	    }
	  }
	}
</script>
<script>
var header = document.getElementById("myDIV");
var btns = header.getElementsByClassName("tabs");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  });
}
</script>

</body>
</html>