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
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
	<div class="login">
		<div class="tabcontent" id="Back">
			<form  method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
				<input style ="margin-bottom: 20px;" type="text" name="username" placeholder="Username" required>
				<input type="password" name="password" id="password" placeholder="Password" required><br>
				<input type="checkbox" name="check" onclick="myFunction()"> <b>Show Password</b><br>
				<input type="submit" name="submit" value="Log In"><br>
				<a class="tablink" style="margin-top: 10px;" onclick="openPage('Forgot', this, '#094f28')" >Forgot Password</a>
			</form>
		</div>
		<div class='tabcontent' style='margin-top: -20px;' id='Forgot'>
			<form  method='post' action='<?php echo $_SERVER['PHP_SELF'] ?>'>
				<div class='fgt'>Recover Account<br>
					<sub style='font-weight: normal;'>Identify your Account</sub>
				</div>
				<input type='text' name='u_name' placeholder='Enter Username or Email' required><br><br>
				<input type='submit' name='search' value='Search'><br>
				<button class='tablink closed' onclick="openPage('Back', this, '#094f28')" id='defaultOpen'>Back</button>
			</form>
		</div>
		<?php

			if(isset($_POST['submit'])){
				$name = $_POST['username'];
				$pass = $_POST['password'];
				$e_pass = md5($pass);
				$query = "SELECT * from credentials WHERE Username = '$name' AND Password = '$e_pass'";

		  		if ($result = mysqli_query($link,$query))
		  		{
		  			$rowcount = mysqli_num_rows($result);
		  			if($rowcount == 1){
		  				$_SESSION['Username'] = $name;
		  				header("location:home.php");
		  			}
		  			else{
		  				echo '
			  				<script type="text/javascript">
							    swal({
							      title: "Incorrect Credentials!",
							      icon: "error",
							      button: "Close",
							    });
							    setTimeout(function(){location.reload(1)},3000000);
							</script>';
		  			}
		  		}
				}
			elseif(isset($_POST['search'])){
				$u_name = $_POST['u_name'];
				$query = "SELECT b.* from credentials a INNER JOIN user b WHERE a.Username = '$u_name'";
				$result = mysqli_query($link,$query);
		  		if ($row = mysqli_fetch_array($result)){
		  			$_SESSION['Name'] = $row['FirstName'].' '.$row['LastName'];
		  			$_SESSION['Role'] = $row['Designation'];
		  			header("location:acc-found.php");
		  		}
		  		else{
	  				echo '
		  				<script type="text/javascript">
						    swal({
						      title: "User not Found!",
						      icon: "error",
						      button: "Close",
						    });
						</script>';
	  			}
			}
		?>
	</div>
	<footer style="text-align: center;">
		<p>Copyright <span>&copy;</span> Nocturnal Programming 2022</p>
	</footer>
	<script>
	function myFunction() {
	  var x = document.getElementById("password");
	  if (x.type === "password") {
	    x.type = "text";
	  } else {
	    x.type = "password";
	  }
	}
	</script>
	<script type="text/javascript">
        function disableBack() { window.history.forward(); }
        setTimeout("disableBack()", 300);
        window.onunload = function () { null };
	</script>
	<script>
	    function openPage(pageName,elmnt,color) {
		    var i, tabcontent, tablinks;
		    tabcontent = document.getElementsByClassName("tabcontent");
		    for (i = 0; i < tabcontent.length; i++) {
		      tabcontent[i].style.display = "none";
		    }
		    tablinks = document.getElementsByClassName("tablink");
		    for (i = 0; i < tablinks.length; i++) {
		      tablinks[i].style.backgroundColor = "";
		      tablinks[i].style.color = "black"
		    }
		    document.getElementById(pageName).style.display = "block";
		    elmnt.style.backgroundColor = color;
		    elmnt.style.color = "black";
		}
	  	document.getElementById("defaultOpen").click();
	</script>
</body>
</html>