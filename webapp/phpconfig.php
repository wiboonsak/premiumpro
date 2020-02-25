<?php session_start();
	include("control/config.inc.php");
	include("control/function.inc.php");
	date_default_timezone_set("Asia/Bangkok");
	//---------------------------------------------------------------------------------------------------------------------------------------------------
			$link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
			mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");
	//---------------------------------------------------------------------------------------------------------------------------------------------------
	$path_product="uploadfile/";		
	$path_product_thb="uploadfile/thb/";
	$path_product_tempx="uploadfile/tmp/";
	
	//---------------------------------START SESSION------------------------------------		
		   $dateOrder=date("Y-m-dHis");
		   

		  
		
?>