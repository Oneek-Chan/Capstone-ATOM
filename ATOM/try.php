<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title></title>
</head>
<style type="text/css">
.cls-context-menu-link {
  display: block;
  padding: 20px;
  background: lightblue;
  margin: 5px;
  width: 100px;
}

.cls-context-menu {
  position: absolute;
  display: none;
}

.cls-context-menu ul,
#context-menu li {
  list-style: none;
  margin: 0;
  padding: 0;
  background: white;
}

.cls-context-menu {
  border: solid 1px #CCC;
}

.cls-context-menu li {
  border-bottom: solid 1px #CCC;
}

.cls-context-menu li:last-child {
  border: none;
}

.cls-context-menu li a {
  display: block;
  padding: 5px 10px;
  text-decoration: none;
  color: blue;
}

.cls-context-menu li a:hover {
  background: blue;
  color: #FFF;
}
</style>
<body>



<!-- those are the links which should present the dynamic context menu -->
<a id="link-1" href="#" class="folder-clg">right click link-01</a>
<a id="link-1" href="#" class="folder-clg">right click link-02</a>
<a id="link-1" href="#" class="folder-clg">right click link-01</a>
<a id="link-1" href="#" class="folder-clg">right click link-02</a>

<!-- this is the context menu -->
<!-- note the string to=0 where the 0 is the digit to be replaced -->
<div id="div-context-menu" class="cls-context-menu">
  <ul>
    <li><a href="#to=0">link-to=0 -item-1 </a></li>
    <li><a href="#to=0">link-to=0 -item-2 </a></li>
    <li><a href="#to=0">link-to=0 -item-3 </a></li>
  </ul>
</div>





<script type="text/javascript">
	var rgtClickContextMenu = document.getElementById('div-context-menu');

/** close the right click context menu on click anywhere else in the page*/
document.onclick = function(e) {
  rgtClickContextMenu.style.display = 'none';
}

/**
 present the right click context menu ONLY for the elements having the right class
 by replacing the 0 or any digit after the "to-" string with the element id , which
 triggered the event
*/
document.oncontextmenu = function(e) {
  //alert(e.target.id)
  var elmnt = e.target
  if (elmnt.className.startsWith("folder-clg")) {
    e.preventDefault();
    var eid = elmnt.id.replace(/link-/, "")
    rgtClickContextMenu.style.left = e.pageX + 'px'
    rgtClickContextMenu.style.top = e.pageY + 'px'
    rgtClickContextMenu.style.display = 'block'
    var toRepl = "to=" + eid.toString()
    rgtClickContextMenu.innerHTML = rgtClickContextMenu.innerHTML.replace(/to=\d+/g, toRepl)
    //alert(rgtClickContextMenu.innerHTML.toString())
  }
}
</script>
</body>
</html>