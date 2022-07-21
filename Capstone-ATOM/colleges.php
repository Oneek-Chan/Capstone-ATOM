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
<body onload="myFunctions()">
  <?php
    require 'nav.php';
  ?>

  <!--------------------------------------------------------------------COLLEGES------------------------->
  <div id="colleges" style="text-align: left;" class="main-panel">
    <div style="padding: 0px 30px 0px 30px;">
      <div style="margin-top:10px">
        <div style="display:flex; justify-content: space-between;">
          <h2 style="text-align: left; display: inline; cursor: pointer;" align="left">COLLEGES</h2>
          <button style="float: right; display: inline; margin-right: 10px; margin-top: 15px" class="add_college" id="myBtn"><i class="fa-solid fa-plus"></i> &nbsp;Add College</button>
        </div>
      <hr style="margin-top: 0px; margin-bottom: 20px;">
      <?php 
        $query = "SELECT * FROM colleges;";
        $res = mysqli_query($link, $query);
        $n1 = 1;
        while($r = mysqli_fetch_array($res)){
          $ccode = $r['CollegeCode'];
        ?>
        <a class = 'folder-clg'><i class='fa-solid fa-folder-open' ></i> <div style="margin-left: 10px; background-color: lightgrey; width: 1.5px; height: 100%; display: inline-block; margin-bottom: -5px; margin-right: 5px;" ></div> &nbsp;<?php echo $ccode;?></a>
        <?php
          $n1++;
        }
       ?>
      </div>
      <hr style="margin-top: 25px; margin-bottom: 10px; height: 3px; background-color: #8b0000;">
      <div style="display: block;">
        <div style="display:flex; justify-content: space-between;">
          <h2 style="text-align: left; display: inline; cursor: pointer;" align="left" >PROGRAMS</h2>
          <button style="float: right; display: inline; margin-right: 10px; margin-top: 15px" class="add_programs" id="add"><i class="fa-solid fa-plus"></i>&nbsp;Add Program</button>
        </div>
      <?php 

        $q = "SELECT * FROM colleges;";
        $t = mysqli_query($link, $q);
        $i =1;
        while($re = mysqli_fetch_array($t)){
          $dcode = $re['CollegeCode'];
          $i++;
        }
      ?>
      <div style="margin-top:10px;">
        
        <?php 
          $quer = "SELECT * FROM programs WHERE CollegeCode = '$dcode';";
          $resu = mysqli_query($link, $quer);
          $n2 = 1;
          while($ro = mysqli_fetch_array($resu)){
            $pcode = $ro['ProgramID'];

        ?>
        
        <a class = 'folder-clg' onclick="myFunction('<?php echo $pcode;?>');">
          <i class='fa-solid fa-folder-open'></i>
           <div style="margin-left: 10px; background-color: lightgrey; width: 1.5px; height: 100%; display: inline-block; margin-bottom: -5px; margin-right: 5px;"></div> &nbsp;<?php echo $pcode;?>
        </a>
        <?php
            $n2++;
          }
        ?>
      </div>
      </div>
    </div>
    <!------------------------------ The Modal --------------------------------------->
    <div id="myModal" class="modal">
      <form method="post" action="#">
      <!-- Modal content -->
        <div class="modal-content">
          <div class="modal-header">
            <span class="close">&times;</span>
            <h2>ADD COLLEGE</h2>
          </div>
          <div class="modal-body">
            <label for="collegeName">College Code:&nbsp;&nbsp;</label>
            <input type="text" name="collegeName" required><br>
            <label for="collegeDesc" style="vertical-align: top;">College Name:&nbsp;</label>
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
    <div id="prog" class="modal">
      <form method="post" action="#">
      <!-- Modal content -->
        <div class="prog-content" style=" width: 41%;">
          <div class="modal-header">
            <span class="close2">&times;</span>
            <h2>ADD PROGRAM</h2>
          </div>
          <div class="modal-body">
            <label for="collegeName">College Code:&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <select name="collegeName" required>
              <option selected hidden>-Select College-</option>
              <?php
                $que = "SELECT * FROM colleges";
                $reu = mysqli_query($link, $que);
                $w = 1;
                while($a = mysqli_fetch_array($reu)){
                  echo "<option> ".$a['CollegeCode']."</option>";
                  $w++;
                }
              ?>
            </select>
            <label for="collegeName">Program Code:&nbsp;&nbsp;</label>
            <input type="text" name="collegeName" style="width: 283px;" required><br>
            <label for="collegeDesc" style="vertical-align: top;">Program Name:&nbsp;</label>
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
              <input  class="modal-btn" type="submit" onchange="" name="add_col" value="Verify">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!----------------------------------------------------------------------AREAS-------------------------->
  <div id="areas" style="display: none; text-align: left;" class="main-panel">

    <div style="padding: 0px 30px 0px 30px;">
      <div style="margin-top:10px">
        <div style="display:flex; justify-content: space-between;">
          <h2 style="text-align: left; display: inline; cursor: pointer;" align="left"><a onclick="myFunction('CICS')"><i class="fa-solid fa-arrow-left"></i></a>&nbsp;&nbsp;AREAS</h2>
          <button style="float: right; display: inline; margin-right: 10px; margin-top: 15px" class="add_college" id="myBtn"><i class="fa-solid fa-plus"></i> &nbsp;Add Areas</button>
        </div>
      <hr style="margin-top: 0px; margin-bottom: 20px;">
      <?php
          $codes = "<span id='code'></span>";
          $query = "SELECT * FROM area WHERE ProgramCode = 'BSIT';";
          $lab = mysqli_query($link, $query);
          $blng = 1;
          while($p = mysqli_fetch_array($lab)){
            $acode = $p['AreaCode'];
            echo "<a class = 'area'> <i class='fa-solid fa-folder-open'></i><div style='margin-left: 10px; background-color: lightgrey; width: 1.5px; height: 100%; display: inline-block; margin-bottom: -5px; margin-right: 5px;'></div> &nbsp;".$acode."</a>";
            $blng++;
          }
       ?>
      </div>
    </div>
    <hr style="margin-top: 25px; margin-bottom: 10px; height: 3px; background-color: #8b0000; width: 95%;">
    <div style="padding: 0px 30px 0px 30px;">
      <div style="margin-top:10px">
        <div style="display:flex; justify-content: space-between;">
          <h2 style="text-align: left; display: inline; cursor: pointer;" align="left"><a href="colleges.php"></a>&nbsp;&nbsp;PARAMETERS</h2>
          <button style="float: right; display: inline; margin-right: 10px; margin-top: 15px" class="add_college" id="myBtn"><i class="fa-solid fa-plus"></i> &nbsp;Add Parameters</button>
        </div>
      <hr style="margin-top: 0px; margin-bottom: 20px;">
      <?php
          $queue = "SELECT * FROM area_parameter WHERE AreaCode = '$acode';";
          $labs = mysqli_query($link, $queue);
          $bilng = 1;
          while($pa = mysqli_fetch_array($labs)){
            $paramcode = $pa['ParamID'];
            echo "<a class = 'area'><i class='fa-solid fa-folder-open' style='display: inline-block'></i><div style='margin-left: 10px; background-color: lightgrey; width: 1.5px; height: 100%; display: inline-block; margin-bottom: -5px; margin-right: 5px;'></div>  &nbsp; PARAMETER ".$paramcode."</a>";
            $bilng++;
          }
       ?>
      </div>
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