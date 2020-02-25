<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="ddaccordion.js"></script>
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
	width: 200px; /*width of accordion menu*/
}

.arrowlistmenu .menuheader{ /*CSS class for menu headers in general (expanding or not!)*/
			font-family: "Microsoft Sans Serif", Arial, Helvetica, sans-serif;
			font-size: 10pt;
			color: #2f3e45;
			padding-left: 15px;
			background-image: url(images/index/index_26.png);
			height:27px;
			cursor: hand;
			cursor: pointer;
			padding-top: 5px;
}

.arrowlistmenu .openheader{ /*CSS class to apply to expandable header when it's expanded*/
			font-family: "Microsoft Sans Serif", Arial, Helvetica, sans-serif;
			font-size: 10pt;
			color: #2f3e45;
			/*background-image: url(images/index/index_26.png);
			padding-left: 15px;
		    height:27px;*/
}

.arrowlistmenu ul{ /*CSS for UL of each sub menu*/
		list-style-type: none;
		color: #2f3e45;
		margin: 0;
		padding: 0;
		margin-bottom: 0px; /*bottom spacing between each UL and rest of content*/
}

.arrowlistmenu ul li{
			padding-left: 25px;
			background-image: url(images/index/index_26.png);
			height:27px;
			padding-top: 5px;
			font-family: "Microsoft Sans Serif", Arial, Helvetica, sans-serif;
			font-size: 10pt;
			color: #2f3e45;
}

.arrowlistmenu ul li a{
		font-family: "Microsoft Sans Serif", Arial, Helvetica, sans-serif;
		font-size: 10pt;
		color: #2f3e45;
}

.arrowlistmenu ul li a:visited{
		font-family: "Microsoft Sans Serif", Arial, Helvetica, sans-serif;
		font-size: 10pt;
       color: #2f3e45;
}

.arrowlistmenu ul li a:hover{ /*hover state CSS*/
font-family: "Microsoft Sans Serif", Arial, Helvetica, sans-serif;
		font-size: 10pt;
	  color: #2f3e45;
	  background-color: #F3F3F3;
}

</style>
<?php
 
 $queryMenu="SELECT a.id CID, a.cate_name, a.mainCateId, b.mainCateID AS mainSubCID, a.number, b.id AS subCID, b.cate_name AS SubCateName, b.number Subnumber "
." FROM tbl_product_cate a LEFT JOIN tbl_product_cate b ON b.mainCateId = a.id WHERE a.mainCateID =  '0' ORDER BY a.number ASC , b.number ASC   ";
$resultMenu=mysql_query($queryMenu); 
 /*   while($menu=mysql_fetch_assoc($resultMenu)){
			if( $chekMainID!=$menu['CID']){ echo "<br>+ ".$menu['cate_name']; }
			if($menu['SubCateName']){ 
				echo "<br>- - - ".$menu['SubCateName'];
			}
	        $chekMainID=$menu['CID'];
		}*/

?>
<table width="186" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="images/index/index_21.png" width="186" height="42" alt="" /></td>
  </tr>
  <tr>
    <td width="186" height="27"  > 
    <div class="arrowlistmenu">
      <?php
	         $n=1; $chekMainID='';$firstCateID='';
      		  while($menu=mysql_fetch_assoc($resultMenu)){
					if( $chekMainID!=$menu['CID']){  
								if($n > 1){  echo "</ul>"; }
								if($menu['SubCateName']!=''){  $prefix=" + "; }else{ $prefix="&nbsp;&nbsp;&nbsp;";} ?>
								<h3 class="menuheader expandable"><span class="txt11-blue"><?php echo $prefix.$menu['cate_name']?></span></h3>
								<ul class="categoryitems">
				<?php 	}
					if($menu['SubCateName']){  ?>
								<li>&nbsp;-<a href="<?php $_SERVER['PHP_SELF']?>?file=product&CateID=<?php echo $menu['subCID']?>&MCID=<?php echo $menu['CID']?>&CateID=<?php echo $menu['subCID']?>">
								<?php echo $menu['SubCateName']?></a>  (<?php CountDataInCategory2($menu['subCID'])?>)</li>
					<?php }
	       		 $chekMainID=$menu['CID'];
				 $n++;
		}	  
		?>	
        </ul>
      </div>
    </td>
  </tr>
  <tr>
    <td height="20" background="images/index/index_26.png" class="L15">&nbsp;</td>
  </tr>
</table>
<table width="186" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="images/index/index_49.png" width="186" height="38" alt=""></td>
  </tr>
  <tr>
    <td height="34" background="images/index/index_50_2.png">&nbsp;&nbsp; &nbsp;<strong><a href="#" onclick="MM_openBrWindow('detail_product.php','PRODUCTS','status=yes,scrollbars=yes,resizable=yes,width=800,height=700')">น้ำพุ พลังงานแสงอาทิตย์</a></strong></td>
  </tr>
  <tr>
    <td width="200" align="center" background="images/index/index_50_2.png"><a href="#" onclick="MM_openBrWindow('detail_product.php','PRODUCTS','status=yes,scrollbars=yes,resizable=yes,width=800,height=700')"><img src="images/index/index_51.png" alt="" width="133" height="124" border="0"></a></td>
  </tr>
  <tr>
    <td><img src="images/index/index_57_2.png" width="186" height="18" alt=""></td>
  </tr>
</table>