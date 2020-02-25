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
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: control :::</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript">
			function windowOpener(windowHeight, windowWidth, windowName, windowUri)
			{
					var centerWidth = (window.screen.width - windowWidth) / 2;
					var centerHeight = (window.screen.height - windowHeight) / 2;
    				newWindow = window.open(windowUri, windowName, 'resizable=1,scrollbars=1,width=' + windowWidth +  ',height=' + windowHeight +  ',left=' +centerWidth + ',top=' + centerHeight);
					newWindow.focus();
					return newWindow.name;
		}
</script>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="ddaccordion.js">
/***********************************************
* Accordion Content script- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* Visit http://www.dynamicDrive.com for hundreds of DHTML scripts
* This notice must stay intact for legal use
***********************************************/
</script>
<script type="text/javascript">
ddaccordion.init({
	headerclass: "expandable", //Shared CSS class name of headers group that are expandable
	contentclass: "categoryitems", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [0], //index of content(s) open by default [index1, index2, etc]. [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", "openheader"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["prefix", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})


</script>

<style type="text/css">

.arrowlistmenu{
width: 180px; /*width of accordion menu*/
}

.arrowlistmenu .menuheader{ /*CSS class for menu headers in general (expanding or not!)*/
font: bold 14px Arial;
color: white;
background: black url(titlebar.png) repeat-x center left;
margin-bottom: 10px; /*bottom spacing between header and rest of content*/
text-transform: uppercase;
padding: 4px 0 4px 10px; /*header text is indented 10px*/
cursor: hand;
cursor: pointer;
}

.arrowlistmenu .openheader{ /*CSS class to apply to expandable header when it's expanded*/
background-image: url(titlebar-active.png);
}

.arrowlistmenu ul{ /*CSS for UL of each sub menu*/
list-style-type: none;
margin: 0;
padding: 0;
margin-bottom: 8px; /*bottom spacing between each UL and rest of content*/
}

.arrowlistmenu ul li{
padding-bottom: 2px; /*bottom spacing between menu items*/
}

.arrowlistmenu ul li a{
color: #A70303;
background: url(arrowbullet.png) no-repeat center left; /*custom bullet list image*/
display: block;
padding: 2px 0;
padding-left: 19px; /*link text is indented 19px*/
text-decoration: none;
font-weight: bold;
border-bottom: 1px solid #dadada;
font-size: 90%;
}

.arrowlistmenu ul li a:visited{
color: #A70303;
}

.arrowlistmenu ul li a:hover{ /*hover state CSS*/
color: #A70303;
background-color: #F3F3F3;
}

</style><script language="JavaScript" type="text/javascript" src="wysiwyg2.js"></script>
<script language="Javascript1.2"><!-- // load htmlarea
//_editor_url = "http://localhost/cv4/citymall/lib/htmlarea/";                     // URL to htmlarea files
_editor_url = 'htmlarea/'; 
var win_ie_ver = parseFloat(navigator.appVersion.split("MSIE")[1]);
if (navigator.userAgent.indexOf('Mac')        >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Windows CE') >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Opera')      >= 0) { win_ie_ver = 0; }
if (win_ie_ver >= 5.5) {
  document.write('<scr' + 'ipt src="' +_editor_url+ 'editor.js"');
  document.write(' language="Javascript1.2"></scr' + 'ipt>');  
} else { document.write('<scr'+'ipt>function editor_generate() { return false; }</scr'+'ipt>'); }
// --></script>

</head>
</head>

<body onLoad="show_clock()">
<table width="959" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#E3E3E3"><table width="945" height="99" border="0" align="center" cellpadding="0" cellspacing="0" id="Table_01">
      <tr>
        <td width="286" height="99"><img src="images/admi_head_01-copy.jpg" width="286" height="99" alt="" /></td>
        <td background="images/onimax/Onimaxhead_02.jpg" width="574" height="99"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td width="65%" align="right">&nbsp;</td>
            </tr>
             <tr>
            <td align="right" class="txt10-brown">Hello : <?php echo $_SESSION['admin_name']?>&nbsp;&nbsp;&nbsp;</td>
          </tr>
          <tr>
            <td align="right"><script language="JavaScript" src="liveclock.js" type="text/javascript">

/*
Live Clock Script-
By Mark Plachetta (astro@bigpond.net.au?) based on code from DynamicDrive.com
For full source code, 100's more DHTML scripts, and Terms Of Use,
visit http://www.dynamicdrive.com
*/

                </script>&nbsp;</td>
            </tr>
         
        </table></td>
        <td><img src="images/onimax/Onimaxhead_03.jpg" alt="" width="85" height="99" border="0" usemap="#Map" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td bgcolor="#e3e3e3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="206" align="left" valign="top">
       	  <img src="images/main/spacer.gif" width="1" height="10" alt="" />
          
          
<div class="arrowlistmenu">
      <h3 class="menuheader expandable"><img src="images/black_icon/16x16/brackets2.png" width="16" height="16" hspace="5" align="absmiddle" />โครงการ </h3>
        <ul class="categoryitems">
            <li><a href="main.php?work=addCategory1&group=1">เพิ่มโครงการ</a></li>
           <li><a href="main.php?work=addEmp">เพิ่มผู้ใช้งาน</a></li>
          <li><a href="main.php?work=empWork">กำหนดสิทธิผู้ใช้งาน</a></li>
                 </ul>
    <!--   <h3 class="menuheader expandable"><img src="images/black_icon/16x16/brackets2.png" width="16" height="16" hspace="5" align="absmiddle" />รายงาน</h3>
       
        <ul class="categoryitems">
            <li><a href="main.php?work=OrderList">สรุปค่าใช้จ่าย</a></li>
            <li><a href="main.php?work=OrderListHistory">รายงานค่าใช้จ่ายประจำบ้าน</a></li>            
        </ul>     -->
 
               
     
     
      
           
        <h3 class="menuheader expandable"><img src="images/black_icon/16x16/brackets2.png" width="16" height="16" hspace="5" align="absmiddle" />Admin User</h3>
        <ul class="categoryitems">
         <?php if($_SESSION['admin_type']==1){ ?>
            <li><a href="main.php?work=User">เพิ่ม Admin</a></li>
            <?php }?>
            <li><a href="main.php?work=chpass">เปลี่ยนรหัสผ่าน</a></li>
        </ul>        
</div>

          
          
          </td>
        <td width="754" valign="top"><table id="Table_" width="745" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td colspan="3"><img src="images/main/center_main_01.png" width="745" height="14" alt="" /></td>
          </tr>
          <tr>
            <td width="10" bgcolor="#E3E3E3">&nbsp;</td>
            <td  width="727" height="550" valign="top"  bgcolor="#FFFFFF" class="copyRight">
              <?php 
			           //------------------Product---------//
					  
					 switch($_GET['work']) 
					 {
						 case   'addCategory1' :
								 include("categoryAdd.php");
								 break;
							 
						//-----------------addEmp---------------//		
						case   'addEmp' :
								 include("addEmp.php");
								 break;	 
						case   'empWork' :
								 include("empWork.php");
								 break;	 
						//-----------------addReccord---------------//		
						case   'addReccord' :
								 include("addReccord.php");
								 break;	 
						case   'articleList' :
								 include("newsList.php");
								 break;	 								 
						//-----------------customerList---------------//		
						case   'customerList' :
								 include("customerList.php");
								 break;	 		
						case   'memberdetail' :
								 include("memberdetail.php");
								  break;	 
						//-----------------helloword---------------//		
						case   'helloword' :
								 include("helloword.php");
								 break;	 		
						//-----------------addContact---------------//		
						case   'addContact' :
								 include("addContact.php");
								 break;	 																			 						 								 
						//-----------------Banner---------------//
						case 'bannerAdd2' :
						         include("bannerAdd2.php");
								 break;
						case 'bannerList2' :
						         include("bannerList2.php");	
								 break;																						 
						//-----------------gallery---------------//
						case 'gallery' :
						         include("gallery_list.php");																						 
						 		 break;	
						case 'galleryAdd' :
						         include("gallery_addd.php");																						 
						 		 break;				 					 
						//-----------------webboard---------------//							
						case 'webboard' :
						         include("webboardview.php");																						 
						 		 break;										 
						//-----------------addPhone SMs---------------//							
						case 'addPhone' :
						         include("addPhone.php");																						 
						 		 break;										 							 
						//-----------------promotion---------------//							
						case 'promotion' :
						         include("promotion.php");																						 
						 		 break;			
						//-----------------promotion---------------//							
						case 'headerAdd' :
						         include("header_add.php");																						 
						 		 break;											 				 
						//-----------------user---------------//		
						case 'User' :		 
						         include("user.php");
								 break;		
						case 'chpass' :		 
						         include("chpass.php");
								 break;										 
								 															 
					 }
						
			  ?></td>
            <td bgcolor="#E3E3E3" width="8">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3"><img src="images/main/center_main_05.png" width="745" height="15" alt="" /></td>
          </tr>
        </table></td>
      </tr>
    </table>
   </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="40" align="center" bgcolor="#36454C" class="txt-8">...me-fi.com...</td>
  </tr>
</table>

<map name="Map" id="Map">
  <area shape="rect" coords="5,56,82,94" href="logout.php" title="Logout" />
</map>
</body>
</html>
<?php mysql_close()?>
<?php } ?>