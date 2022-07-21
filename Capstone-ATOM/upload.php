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
	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<style type="text/css">
		.up-content{
		  border-radius: 5px;
		  position: relative;
		  background-color: white;
		  margin: auto;
		  padding: 0;
		  border: 1px solid lightgrey;
		  width: 50%;
		  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
		  -webkit-animation-name: animatetop;
		  -webkit-animation-duration: 0.4s;
		  animation-name: animatetop;
		  animation-duration: 0.4s;
		  font-family: Roboto;
		}
		.up-body select{
		  border-radius: 3px;
		  border: 1px solid lightgrey;
		  outline: none;
		  font-family: Roboto;
		  font-size: 15px;
		  height: 40.5px;
		  width: 86%;
		  margin-bottom: 10px;
		  margin-left: 1px;
		  padding: 7px;
}
	</style>
</head>
	<?php 
	require 'nav.php'; ?>
<body onload="myFunction()">
	<div class="main-panel" ng-app="uploads" ng-controller="uploadsController" ng-init="loadDocument();" style="text-align:left;">
			<div style="margin-top: 25px">
				<h2 style=" font-size: 25px; text-align: left; display: inline; cursor: pointer; margin-left: 35px; line-height: 25px ;" align="left">Recent Uploads</h2>
			</div>
      <hr style="margin-top: 20px; margin-bottom: 20px; width: 93.5%;">

			<div style="overflow: auto; height: 66vh">
				<div id="myModal" class="modal">
      <form action="upload.php" method="post" enctype="multipart/form-data">
      <!-- Modal content -->
        <div class="up-content">
          <div class="modal-header">
            <span class="close">&times;</span>
            <h2>UPLOAD DOCUMENT</h2>
          </div>
          <div class="up-body" style="text-align: center;">
          	<input type="file" accept="application/pdf" name="pdf" class="browse" required><br><br>
          	<select style="width:42%;" required>
          		<option selected hidden>-Select College-</option>
          		<?php
          			$d = "SELECT * FROM colleges;";
          			$e = mysqli_query($link, $d);
			          $m = 1;
			          while($p = mysqli_fetch_array($e)){
			            echo "<option>".$p['CollegeCode']."</option>";
			            $m++;
			          }

          		?>
          	</select>
          	<select style="width:43.5%;" required>
          		<option selected hidden>-Select Area-</option>
          		<?php
          			$z = "SELECT * FROM area;";
          			$o = mysqli_query($link, $z);
			          $mb = 1;
			          while($pa = mysqli_fetch_array($o)){
			            echo "<option>".$pa['AreaCode']." - ".$pa['AreaDesc']."</option>";
			            $mb++;
			          }

          		?>
          	</select>
          	<select required>
          		<option selected hidden>-Select Parameter-</option>
          		<?php
          			$nd = "SELECT * FROM area_parameter;";
          			$oz = mysqli_query($link, $nd);
			          $da = 1;
			          while($ay = mysqli_fetch_array($oz)){
			            echo "<option>Parameter ".$ay['ParamID']." - ".$ay['ParamDesc']."</option>";
			            $da++;
			          }

          		?>
          	</select>
          	<select required>
          		<option selected hidden>-Select Benchmark-</option>
          		<?php
          		$i =1;
          			while ($i < 10) {
          					?>
          					<option> Document Tag <?php echo $i; ?></option>
          					<?php
          				$i++;
          			}
          		?>
          	</select>
          </div>
          <div class="modal-footer" style="margin-top: -40px" >
            <button class="modal-btn" id="myBtn1" name="upload" style="margin-top: 60px;"><i class="fa-solid fa-arrow-up-from-bracket">&emsp;</i>Upload</button>
          </div>
        </div>
      </form>
    </div>

        
      
        <?php

        if (isset($_POST['upload']))
        {
          $pdf=$_FILES['pdf']['name'];
          $pdf_type=$_FILES['pdf']['type'];
          $pdf_size=$_FILES['pdf']['size'];
          $pdf_tem_loc=$_FILES['pdf']['tmp_name'];
          $pdf_store="documents/".$pdf;

          move_uploaded_file($pdf_tem_loc,$pdf_store);

          $sql_upload="INSERT INTO `uploads`(`documentID`, `name`) VALUES (null,'$pdf')";
          $qry_upload=mysqli_query($link,$sql_upload);
          if ($qry_upload) {
          	echo '
			  				<script type="text/javascript">
							    swal({
							      title: "Uploading Successful",
							      icon: "success",
							      button: "Close",
							    });
							    setTimeout(function(){location.reload(1)},3000000);
							</script>';
          }
        }

         ?>

<style type="text/css">
     		.file{
					text-align: left;
					padding: 10px;
					padding-left: 20px;
					border-radius: 5px;
					width: 10%;
					display: inline-block;
					margin: 10px;
					height: 85px;
					background-color: white;
					border: 1px solid lightgrey;
					text-overflow: ellipsis;
					overflow: hidden;
					white-space: nowrap;
				}
				.file:hover{
					cursor: pointer;
					background-color: darkred;
					color: white;
					font-weight: bold;
					transform: scale(1.05);
				}
     		.upload-btn{
				  color: white;
				  align-self: center;
				  text-align: center;
				  height: 50px;
				  padding: 8px 10px;
				  font-size: 15px;
				  font-family: Roboto;
				  margin: 5px;
				  border: none;
				  border-radius: 100px;
				  background-color: #8b0000;
				  width: 250px;
				  position: fixed;
				  bottom: 40px;
				  right: 40px;
				}
				.upload-btn:hover{
				  background-color: #6b0000;
				  color: white;
				  transform: scale(1.02);
				}
     	</style>
     	<div style="margin-left: 25px">
	      <div ng-repeat="document in document" class="file" style="padding: 10px 10px 35px 10px;">
	     	 		<br>
	     	 		<div style="display: flex; justify-content: center; align-items: center; height: 50px; margin-top: 0px;"><img src="img/PDF.png" width="50px"></div><br><span style="font-size: 13px">{{document.name}}</span>
	     	</div>
			</div>
     	<button id="myBtn" class="upload-btn"><i class="fa-solid fa-plus"></i>&emsp;Upload New Document</button>
			</div>
	</div>
</body>
</html>

<script>
var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
  modal.style.display = "block";
}
span.onclick = function() {
  modal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

<script>

	var app = angular.module('uploads', []);

	app.controller('uploadsController', function($scope, $http){
	  
	  $scope.loadDocument = function(){
	    $http.get('getdoc.php').success(function(data){
	            $scope.document = data;
	        })
	  };
	  
	});

</script>

<script>
	function myFunction() {
	  var tab1 = document.getElementById("tab1");
	  var tab2 = document.getElementById("tab2");
	  var tab3 = document.getElementById("tab3");
	  var tab4 = document.getElementById("tab4");
	  var tab5 = document.getElementById("tab5");
	  var tab6 = document.getElementById("tab6");
	  tab1.classList.remove("active");
	  tab2.classList.add("active");
	  tab3.classList.remove("active");
	  tab4.classList.remove("active");
	  tab5.classList.remove("active");
	  tab6.classList.remove("active");
	}
</script>