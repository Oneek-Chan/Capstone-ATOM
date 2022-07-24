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
	<div class="login" >
		<div class="tabcontent" id="Found" style='margin-top: -40px;'>
			<form  method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
				<img src="img/user.jpg" class="img2">
				<?php 
					echo "<div style='text-align:left; margin-top:10px'><strong style = 'font-size: 20px; line-height:40px'>".$_SESSION['Name']."</strong><br>
					<i style = 'font-size: 15px; text-align: left;'>".$_SESSION['Role']."</i></div>";?>
				<br>
				<input type="password" style ="margin-bottom: 10px;" name="newpass" id="word" placeholder="New Password" value="<?php if(isset($_POST['newpass'])) {echo $_POST['newpass'];}?>" required>
				<input type="password" name="cnewpass" id="words" placeholder="Confirm New Password" value="<?php if(isset($_POST['cnewpass'])) {echo $_POST['cnewpass'];}?>" required><br>
				<input type="checkbox" name="check" onclick="myFunction()"> <b>Show Password</b>
				<input type="submit" name="reset" value="Reset Password"><br>
			</form>
		</div>

		<div class='tabcontent' style='margin-top: -20px;' id='here'>
			<form  method='post' action='<?php echo $_SERVER['PHP_SELF'] ?>'>
				<div class='fgt'>Recover Account<br>
					<sub style='font-weight: normal;'>OTP Verification</sub>
				</div>
				<input type='number' style="letter-spacing: 1em;" name='otp' maxlength="6" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder='------' required><br><br>
				<input type='submit' name='verify' value='Verify'><br>
				<button class='tablink closed' onclick="openPage('Found', this)" id='defaultOpen'>Back</button>
			</form>
		</div>
	</div>

		<?php

			if(isset($_POST['reset'])){
				$np = $_POST['newpass'];
				$cnp = $_POST['cnewpass'];

		  		if ($np == $cnp){
						header("location:resetpass.php");
		  		}
		  		else{
		  			echo '
		  				<script type="text/javascript">
						    swal({
						      title: "Passwords do not match!",
						      icon: "error",
						      button: "Close",
						    });
						    setTimeout(function(){location.reload(1)},3000000);
						</script>';
		  		}
		  	}
			
		?>


	
	<footer style="text-align: center;">
		<p>Copyright <span>&copy;</span> Nocturnal Programming 2022</p>
	</footer>
	<script>
		function myFunction() {
			var y = document.getElementById("words");
		  var x = document.getElementById("word");
		  if (x.type === "password") {
		  	if (y.type === "password") {
			    y.type = "text";
			  } else {
			    x.type = "password";
			  }
		    x.type = "text";
		  } else {
		  	if (y.type === "text") {
			    y.type = "password";
			  } else {
			    x.type = "text";
			  }
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
	    function openPage(pageName,elmnt,) {
		    var i, tabcontent, tablinks;
		    tabcontent = document.getElementsByClassName("tabcontent");
		    for (i = 0; i < tabcontent.length; i++) {
		      tabcontent[i].style.display = "none";
		    }
		    tablinks = document.getElementsByClassName("tablink");
		    for (i = 0; i < tablinks.length; i++) {
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