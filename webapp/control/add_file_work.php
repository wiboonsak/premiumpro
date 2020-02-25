<?php session_start();
             if(!isset($_SESSION['adminID'])){
				 		session_destroy();
						?><script language="javascript">
                        		window.location.href='index.php';
                        </script> 
                        <?php 
				 }else{ 
			require_once("config.inc.php");
			include("function.inc.php");
			$link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
			mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");
			//////----------------------config path--------------------------
			$path_product='../uploadfile/';
			//------------------------------------------------------------------
			if($_POST['button']=='Add'){
						$query="INSERT INTO `tbl_work_menu` (`id` ,`txtGet` ,`txtFilename` ,`menuName` ) "
						." VALUES ('' , '".$_POST['txtGet']."', '".$_POST['txtFilename']."'  , '".$_POST['menuName']."') ";
						$result=mysql_query($query);
				}
			//---------------------------------------------------------------------
			if($_POST['button']=='Update'){
					for($i=1;$i < $_POST['Loops']; $i++){ 
						$query="UPDATE `tbl_work_menu` SET  `txtGet` = '".$_POST['textfield'][$i]."'  , `txtFilename`='".$_POST['textfield2'][$i]."' , `menuName` = '".$_POST['textfield3'][$i]."'  WHERE id = '".$_POST['ID'][$i]."' ";
						mysql_query($query);	
					}
				}		
			//---------------------------------------------------------------------	
			if($_POST['action']=='delete'){
						$query="DELETE  FROM tbl_work_menu  WHERE id = '".$_POST['ID']."'  ";
						$result=mysql_query($query);
				}					
			//---------------------------------------------------------------------
			$query="SELECT * FROM tbl_work_menu ORDER BY id ASC ";
			$result=mysql_query($query);
		
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../style1.css" rel="stylesheet" type="text/css" />
<script language="javascript">
		function DeleteThis(ids){ 
			if(confirm('delete ? ')){
						document.form3.action.value='delete';
						document.form3.ID.value=ids;
						document.form3.submit();
				}else{ return false;}
		}
</script>
</head>

<body>
 <p class="header1">Addmenu | <img src="../images/icons/brown_dark/reload_18x21.png" width="18" height="21" /> <a href="add_file_work.php">reload</a></p>
 <hr size="1" color="#333333" class="hr" />
 <form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="form1">
 txtGET 
 <input name="txtGet" type="text" class="textinputNormal" id="txtGet" />
filename 
<label for="txtFilename"></label>
<input name="txtFilename" type="text" class="textinputNormal" id="txtFilename" />
menu name
<input name="menuName" type="text" class="textinputNormal" id="menuName" />
<input type="submit" name="button" id="button" value="Add" />
</form>
<hr size="1" color="#333333" class="hr" />
 <form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="form2">
List Memu 
  <input name="button" type="submit" class="buttonMenu" id="button" value="Update" />
  <br />
<?php $n=1; while($data=mysql_fetch_assoc($result)){ ?>
  txtGET
<input name="textfield[<?php echo $n?>]" type="text" class="textinputNormal"  value="<?php echo $data['txtGet']?>" />
filename
<label for="textfield3"></label>
<input name="textfield2[<?php echo $n?>]" type="text" class="textinputNormal" value="<?php echo $data['txtFilename']?>"/>
menuname
<input name="textfield3[<?php echo $n?>]" type="text" class="textinputNormal"  value="<?php echo $data['menuName']?>" />
<input name="button3" type="button" class="buttonMenu" id="button3" value="Delete" onClick="DeleteThis('<?php echo $data['id']?>')" />
<input type="hidden" name="ID[<?php echo $n?>]" value="<?php  echo $data['id']?>" />
<br />
<?php $n++; } ?>
<input type="hidden" name="Loops" value="<?php echo $n?>" />
</form>
 <form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="form3">
 	<input type="hidden" name="ID"  /><input type="hidden" name="action"  />
 </form>
</body>
</html>
<?php mysql_close()?>
<?php } ?>