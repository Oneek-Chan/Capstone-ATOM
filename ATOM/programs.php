<?php 
  include "conn.php";
  $col_id = $_GET['col_id'];
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
<body onload="myFunctions()">
  <?php
    require 'nav.php';
  ?>

  <!--------------------------------------------------------------------COLLEGES------------------------->
  <div style="text-align: left;" class="main-panel">
    <div style="padding: 0px 30px 0px 30px;">
      <div style="margin-top:10px">
        <div style="display:flex; justify-content: space-between;">
          <h2 style="text-align: left; display: inline; cursor: pointer;" align="left"><?php echo $col_id; ?></h2>
          <button style="float: right; display: inline; margin-right: 10px; margin-top: 15px" class="add_college" id="myBtn"><i class="fa-solid fa-plus"></i> &nbsp;Add Programs</button>
        </div>
      <hr style="margin-top: 0px;">
      <div class="breadcrumbs">
      	<a href="colleges.php">Colleges</a> &emsp;<i class="fa-solid fa-angle-right" style="font-size: 12pt" disabled></i> &emsp;<a href="programs.php?col_id=<?php echo $col_id;?>"><?php echo $col_id; ?></a>
      </div>
      <hr style="margin-top: 0px; margin-bottom: 20px;">
      <?php 
        $query = "SELECT * FROM programs WHERE CollegeCode ='$col_id';";
        $res = mysqli_query($link, $query);
        $n1 = 1;
        while($r = mysqli_fetch_array($res)){
          $pcode = $r['ProgramID'];
        ?>
        <a class = 'folder-clg' href="areas.php?prog_id=<?php echo $pcode;?>&col_id=<?php echo $col_id;?>"><i class='fa-solid fa-folder-open' ></i> <div style="margin-left: 10px; background-color: lightgrey; width: 1.5px; height: 100%; display: inline-block; margin-bottom: -5px; margin-right: 5px;" ></div> &nbsp;<?php echo $pcode;?></a>
        <?php
          $n1++;
        }
       ?>
      </div>
    </div>
    <!------------------------------ The Modal --------------------------------------->
    <div id="myModal" class="modal">
      <form method="post" action="#">
      <!-- Modal content -->
        <div class="modal-content">
          <div class="modal-header">
            <span class="close">&times;</span>
            <h2>ADD PROGRAMS</h2>
          </div>
          <div class="modal-body">
            <label for="CollegeCode">College Code:	&emsp;</label>
            <input type="text" name="CollegeCode" required><br>
            <label for="programCode">Program Code:&nbsp;&nbsp;</label>
            <input type="text" name="programCode" required><br>
            <label for="programName" style="vertical-align: top;">Program Name:&nbsp;</label>
            <textarea name="programName" required></textarea>
          </div>
          <div class="modal-footer">
            <button class="modal-btn" id="auth" name="add_col">Add</button>
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
var auth = document.getElementById("auth");
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
<script>
  function myFunction(program) {
  var x = document.getElementById("areas");
  var y = document.getElementById("colleges");
  var z = document.getElementById("code");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display = "none";
    z.innerHTML = program;
  } 
  else if (y.style.display === "none"){
    x.style.display = "none";
    y.style.display = "block";
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