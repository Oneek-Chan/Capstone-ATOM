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
			<img src="img/user.jpg" class="img"><br>
				<?php 
					echo "<strong style = 'font-size: 20px;'>".$_SESSION['Name']."</strong><br>
					<i style = 'font-size: 15px;'>".$_SESSION['Role']."</i><br>";?>
				<sub style = 'font-size: 14px;'>OTP will be sent to this number:</sub><br>
				<strong style = 'font-size: 14px;'>+63907*****79</strong><br>
			<input type="submit" name="submit" value="Send OTP" style = 'margin-top: 15px;' onclick="openPage('here', this)"><br>
			<button class='tablink closed'><a href="index.php" style="text-decoration: none;">Not Me</a></button>
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

			if(isset($_POST['verify'])){
				$code = 609033;
				$otp = $_POST['otp'];

		  		if ($code == $otp){
		  			header ('location:reset.php');
		  		}
		  		else{
		  			echo '
		  				<script type="text/javascript">
						    swal({
						      title: "Incorrect OTP Code!",
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