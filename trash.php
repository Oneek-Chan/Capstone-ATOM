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
	<div id="upload" class="main-panel">	
		 <div id="adobe-dc-view"></div>
 <script src="https://documentcloud.adobe.com/view-sdk/main.js"></script>
 <script type="text/javascript">
    document.addEventListener("adobe_dc_view_sdk.ready", function()
    {
        var adobeDCView = new AdobeDC.View({clientId: "<YOUR_CLIENT_ID>", divId: "adobe-dc-view"});
        adobeDCView.previewFile(
       {
          content:   {location: {url: "https://documentcloud.adobe.com/view-sdk-demo/PDFs/Bodea Brochure.pdf"}},
          metaData: {fileName: "Bodea Brochure.pdf"}
       });
    });
 </script>
	</div>

</body>
</html>