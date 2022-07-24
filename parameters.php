<?php 
	include "conn.php";

  $prog_id = $_GET['prog_id'];
  $col_id = $_GET['col_id'];
  $area_id = $_GET['area_id'];
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
<body  onload="myFunctions()">
	<?php
	    require 'nav.php';
	    $query="SELECT * FROM area WHERE AreaID = '$area_id'";
	    $result = mysqli_query($link, $query);
	    $i = 1;
	          while($row = mysqli_fetch_array($result)){
	            $area_desc = $row['AreaDesc'];
	            $areaCode = $row['AreaCode'];
	            $_SESSION['Area'] = $areaCode;
	            $i++;
	          }
	?>
	<div style="text-align: left;"  class="main-panel">
	    <div style="padding: 0px 30px 0px 30px;">
	      <div style="margin-top:10px">
	        <div style="display:flex; justify-content: space-between;">
	          <h2 style="text-align: left; display: inline; cursor: pointer;" align="left"><?php echo $areaCode.' - <i style="font-weight: normal; font-size: 20px;">'. $area_desc .'</i>'; ?> </h2>
	          <button style="float: right; display: inline; margin-right: 10px; margin-top: 15px" class="add_college" id="myBtn"><i class="fa-solid fa-plus"></i> &nbsp;Add Parameters</button>
	        </div>
	      <hr style="margin-top: 0px;">
	      <div class="breadcrumbs">
	      	<a href="colleges.php">Colleges	</a> 
	      	&emsp;<i class="fa-solid fa-angle-right" style="font-size: 12pt" disabled></i> 
	      	&emsp;<a href="programs.php?col_id=<?php echo $col_id;?>"><?php echo $col_id; ?>	</a> 
	      	&emsp;<i class="fa-solid fa-angle-right" style="font-size: 12pt" disabled></i> 
	      	&emsp;<a href="areas.php?prog_id=<?php echo $prog_id;?>&col_id=<?php echo $col_id;?>"><?php echo $prog_id; ?></a>
	      	&emsp;<i class="fa-solid fa-angle-right" style="font-size: 12pt" disabled></i> 
	      	&emsp;<a href="parameters.php?prog_id=<?php echo $prog_id;?>&col_id=<?php echo $col_id;?>&area_id=<?php echo $area_id;?>"><?php echo $areaCode; ?></a>
	      </div>
      <hr style="margin-top: 0px; margin-bottom: 20px;">
	      <?php
	          $codes = "<span id='code'></span>";
	          $query = "SELECT * FROM area_parameter WHERE AreaCode = '$area_id' ORDER BY AreaCode ASC;";
	          $lab = mysqli_query($link, $query);
	          $blng = 1;
	          while($p = mysqli_fetch_array($lab)){
	            $paramcode = $p['Param_ID']; ?>
	            <a class = 'area' href="benchmarks.php?prog_id=<?php echo $prog_id;?>&col_id=<?php echo $col_id;?>&area_id=<?php echo $area_id;?> &param_id=<?php echo $paramcode;?>">
	            	<i class='fa-solid fa-folder-open'></i>
	            	<div style='margin-left: 10px; background-color: lightgrey; width: 1.5px; height: 100%; display: inline-block; margin-bottom: -5px; margin-right: 5px;'>
	            	</div>&nbsp; PARAMETER <?php echo $p['ParamCode']; ?>
	            </a>
	            <?php
	            $blng++;
	          }
	       ?>
	      </div>
	    </div>
	    <div id="myModal" class="modal">
	      <form method="post" action="#">
	      <!-- Modal content -->
	        <div class="modal-content">
	          <div class="modal-header">
	            <span class="close">&times;</span>
	            <h2>ADD AREAS</h2>
	          </div>
	          <div class="prog-body">
	            <label for="collegeName">Program Code:&nbsp;&nbsp;</label>
	            <input type="text" name="collegeName" required><br>
	            <label for="collegeName">Area Code:&emsp;&emsp;&nbsp;</label>
	            <input type="text" name="collegeName" required><br>
	            <label for="collegeDesc" style="vertical-align: top;">Area Name:&emsp;&emsp;</label>
	            <textarea name="collegeDesc" required></textarea>
	          </div>
	          <div class="modal-footer">
	            <button class="modal-btn" id="myBtn1" name="add_col">Add</button>
	          </div>
	        </div>
	            <!-- The Modal -->
	        <div id="myModal1" class="modal">
	          <!-- Modal content -->
	          <div class="modal-content">
	            <div class="modal-header">
	              <span class="close1">&times;</span>
	              <h2>Authentication</h2>
	            </div>
	            <div class="modal-body" style="text-align: center;">
	              <strong style="font-size:18px">QUAM Password Authentication</strong><br>
	              <input type="password" name="collegeName"style="text-transform: none; text-align: center;" required><br>
	            </div>
	            <div class="modal-footer">
	              <input  class="modal-btn" type="submit" name="add_col" value="Verify">
	            </div>
	          </div>
	        </div>
	      </form>
    	</div>
	</div>

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
var modal1 = document.getElementsById("myModal1");
var btn1 = document.getElementById("myBtn1");
var span1 = document.getElementsByClassName("close1")[0];

btn1.onclick = function() {
  modal1.style.display = "block";
}
span1.onclick = function() {
  modal1.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal1) {
    modal1.style.display = "none";
  }
}
</script>
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
  function myFunctions() {
    var tab1 = document.getElementById("tab1");
    var tab2 = document.getElementById("tab2");
    var tab3 = document.getElementById("tab3");
    var tab4 = document.getElementById("tab4");
    var tab5 = document.getElementById("tab5");
    var tab6 = document.getElementById("tab6");
    tab1.classList.remove("active");
    tab3.classList.add("active");
    tab2.classList.remove("active");
    tab4.classList.remove("active");
    tab5.classList.remove("active");
    tab6.classList.remove("active");
  }
</script>
</body>
</html>