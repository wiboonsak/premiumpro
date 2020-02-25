<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style1.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="header2"><a href="dowork.php?workID=<?php echo $_GET['workID']?>&showPage=addCompany" class="header2"><img src="control/images/black_icon/16x16/doc_lines.png" width="16" height="16"  border="0"/>เพิ่มรายชื่อบริษัท</a> |
<a href="dowork.php?workID=<?php echo $_GET['workID']?>&showPage=ListData" class="header2"><img src="control/images/black_icon/16x16/doc_lines.png" width="16" height="16" border="0" />บันทึกการ์ดเหลือง</a>

</div>
<?php
			switch ($_GET['showPage']){
					case  "addCompany" :
					include("yellow_add_corp.php");
					break;	

					case  "listCompany" :
					include( "yellow_list_corp.php");
					break;	
						
					case  "addData" :
					include( "yellow_add_data.php");
					break;		
					
					case  "ListData" :
				     include( "yellow_list_data.php");
					break;	
					
					case  "" :
				     include( "yellow_list_data.php");
					break;						
																				
				}
?>
</body>
</html>