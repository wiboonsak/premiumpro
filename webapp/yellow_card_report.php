<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style1.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="header2">รายงานการ์ดเหลือง</div>
<?php
			switch ($_GET['showPage']){
					case  "" :
				     include( "yellow_list_report.php");
					break;						
					case  "showData" :
				     include( "yellow_detail_report.php");
					break;																						
				}
?>
</body>
</html>