<?php
	################################################
				 function PageDisplay($query,$perPage,$cPage,$self){
						$result =mysql_query($query);
						$totalRow=mysql_num_rows($result);
						$totalPage=ceil($totalRow/$perPage);
								echo "";
								for($i=1;$i<=$totalPage;$i++){
										echo "<a href='$self&page=$i'>";
										if($i==$cPage)echo "<b><font size='+1'> ";
										echo  $i." ";
										if($i==$cPage)echo "</font></b>";
										echo "</a> ";
								}
				 }
	################################################
                  function clearMailBoxData($MemID,$boxID){
						$query="UPDATE IGNORE tbl_mailbox SET member_id = '' , box_status='empty' WHERE member_id = '".$MemID."' AND id = '".$boxID."' ";
						mysql_query($query);
						$query="UPDATE  IGNORE tbl_member SET userStatus='new' WHERE id = '".$MemID."'  ";
						mysql_query($query);
						$query="SELECT * FROM  `tbl_mail_data` WHERE memID= '".$MemID."' ";
						$result =mysql_query($query);
						while($data=mysql_fetch_assoc($result)){
									if($data['mailPicuture']!=''){
										@unlink("../uploadfile/thb/".$data['mailPicuture']);
									}
									if($data['mailPicuture']!=''){
										@unlink("../uploadfile/".$data['mailPicuture']);
									}
									//----------------------dell po-------------------
									$query="DELETE IGNORE FROM tbl_mailpo_number WHERE mailID='".$data['id']."' ";
									mysql_query($query);
									$query="SELECT * FROM tbl_mailpo_data WHERE mailID = '".$data['id']."'  ";
									$result2=mysql_query($query);
									while($file=mysql_fetch_assoc($result2)){
											if($file['fileUpload']!=''){
												@unlink("../uploadfile/".$file['fileUpload']);
											}
									}
									$query="DELETE IGNORE FROM tbl_mailpo_data WHERE mailID='".$data['id']."'";
									mysql_query($query);
							}
						$query="DELETE IGNORE FROM `tbl_mail_data` WHERE memID= '".$MemID."' ";
						mysql_query($query);
		     }
	################################################
	function GetNewFileName($uploadFile,&$uploadFileName,$fileExt){
			$info =  pathinfo($uploadFileName);
			$thaiYear=date("Y")+543;
		    $dayFile=date("mdHis");
	 	    //$uploadFileName =  $fileExt.$info[filename]."_".$thaiYear.$dayFile.".".$info[extension];
			 $uploadFileName =  $dayFile.".".$info[extension];
			$fileExt=$info[extension];
	}
	################################################
	function  getID($numID){
			$PrintID= strlen($numID);
			if($PrintID==1){
					echo "00".$numID;
			}
			if($PrintID==2){
					echo "0".$numID;
			}
			if($PrintID==3){
					echo "".$numID;
			}
	}
	################################################
	function ArrangeDateThai($date){
			$DateArray = explode("-",$date);
			$DateArray[0]=$DateArray[0]+543;
			echo $DateArray[2]."-".$DateArray[1]."-".$DateArray[0];
	}
	################################################
	function ArrangeDateEng($date){
			$DateArray = explode("-",$date);
			echo $DateArray[2]."-".$DateArray[1]."-".$DateArray[0];
	}
	################################################
		function GetThaiDate($day){
		$dateArray = explode("-",$day);
		$date= $dateArray[2];
		$mon= $dateArray[1];
		$year= $dateArray[0]+543;
		$monthArray = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
		if($date < 10){ $date = str_replace("0", "", $date); } 
		echo $date."&nbsp;&nbsp;".$monthArray[$mon]."&nbsp;&nbsp;".$year;
	}
	################################################
	function DisplayNumberFormat($num){
					$priceArray = explode(".",$num);
					if($priceArray[1]==""){  $priceArray[1]="00";}
					echo  number_format($priceArray[0]).".".$priceArray[1];
	}
	################################################
	function CheckService($MailID){
			$query="SELECT COUNT(id) NumService FROM tbl_mailpo_data WHERE mailID = '".$MailID."' ";
			$result=mysql_query($query);
			$data=mysql_fetch_assoc($result);
			if($data['NumService'] > 0 ){
					echo "<a href='viewsevice.php?mailID=$MailID'>View</a> ";
			}else{
					echo "-";
			}
	}
	################################################
	function sumPoSevice($poID){
			$query="SELECT SUM(totalUnit*rate) totalPrice FROM tbl_mailpo_data WHERE mailID='".$poID."' ";
			$result=mysql_query($query);
			$data=mysql_fetch_assoc($result);
			DisplayNumberFormat($data['totalPrice']);
	}	
	################################################
	function CountDataInCategory($cateID){
				$query="SELECT COUNT(id) NumID FROM tbl_product_data  WHERE MainCate='".$cateID."' ";
				$result=mysql_query($query);
				$data=mysql_fetch_assoc($result);
				echo $data['NumID'];
	}
	################################################
	function CountDataInCategory2($cateID){
				$query="SELECT COUNT(id) NumID FROM tbl_product_data  WHERE MainGroup='".$cateID."' ";
				$result=mysql_query($query);
				$data=mysql_fetch_assoc($result);
				echo $data['NumID'];
	}
	################################################
				function create_thub($impath,$img,$fix_width,$fix_height){
					$source = $impath.$img;
					$cache_dir =$impath."thb/";
					$tsrc=$impath."thb/".$img;
					$imgType = substr($img,-3,3);
					$days = 1;
				
						//---- make scale width and height

						 $imgsize = @getImageSize($source);
						$x_ratio = $fix_width / $imgsize[0];
						$y_ratio = $fix_height / $imgsize[1];

						//IF width and high < MAX
						if ( ($imgsize[0] <= $max_x) && ($imgsize[1] <= $max_y) )  {
								$new_x = $imgsize[0];
								$new_y = $imgsize[1];
						} else if ( ($x_ratio * $imgsize[1]) < $fix_height){
								$new_x = $fix_width;
								$new_y = ceil($x_ratio * $imgsize[1]);
						}
						else {
								$new_x = ceil($y_ratio * $imgsize[0]);
								$new_y = $fix_height;
						}

					$n_width=$new_x;
					$n_height=$new_y;
					
					//----start make thumb------

							//----start make thumb------

					if(($imgType=='jpg')||($imgType=='JPG')){
							$im=ImageCreateFromJPEG($source); 
							$width=ImageSx($im);              // Original picture width is stored
							$height=ImageSy($im);             // Original picture height is stored
							$newimage=imagecreatetruecolor($n_width,$n_height);    
							//imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
							imagecopyresampled($newimage, $im, 0, 0, 0, 0, $n_width,$n_height,$width,$height); 
							ImageJpeg($newimage,$tsrc);
					
					}else if(($imgType=='gif')||($imgType=='GIF')){
							$im=ImageCreateFromGIF($source);
							$width=ImageSx($im);              // Original picture width is stored
							$height=ImageSy($im);                  // Original picture height is stored
							$newimage=imagecreatetruecolor($n_width,$n_height);
							//imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
							imagecopyresampled($newimage, $im, 0, 0, 0, 0, $n_width,$n_height,$width,$height); 
								if (function_exists("imagegif")) {
								//Header("Content-type: image/gif");
								ImageGIF($newimage,$tsrc);
								}
								elseif (function_exists("imagejpeg")) {
								//Header("Content-type: image/jpeg");
								ImageJPEG($newimage,$tsrc);
								}
					}else if(($imgType=='png')||($imgType=='PNG')){	
							$im = @imagecreatefrompng($source);
							$width=ImageSx($im);              // Original picture width is stored
							$height=ImageSy($im);                  // Original picture height is stored
							$newimage=imagecreatetruecolor($n_width,$n_height);
							//imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
							imagecopyresampled($newimage, $im, 0, 0, 0, 0, $n_width,$n_height,$width,$height); 
							imagepng($newimage,$tsrc);
					}		



				//---------------Clear cache--------------------------------------
				   if($dp = @opendir($cache_dir)) {
								while($file = readdir($dp)) {
										if(preg_match('/^img_/', $file)) {
											 $mtime = @filemtime("$cache_dir/$file");
											 if($mtime < time() - 3600 * 24 * $days) @unlink("$cache_dir/$file");
										}
									}
								closedir($dp);
							  }
					
			}	
	################################################
				function create_thub2($impath,$img,$fix_width,$fix_height){
					$source = $impath.$img;
					$cache_dir =$impath."tempx/";
					$tsrc=$impath."tempx/".$img;
					$imgType = substr($img,-3,3);
					$days = 1;
				
						//---- make scale width and height

						 $imgsize = @getImageSize($source);
						$x_ratio = $fix_width / $imgsize[0];
						$y_ratio = $fix_height / $imgsize[1];

						//IF width and high < MAX
						if ( ($imgsize[0] <= $max_x) && ($imgsize[1] <= $max_y) )  {
								$new_x = $imgsize[0];
								$new_y = $imgsize[1];
						} else if ( ($x_ratio * $imgsize[1]) < $fix_height){
								$new_x = $fix_width;
								$new_y = ceil($x_ratio * $imgsize[1]);
						}
						else {
								$new_x = ceil($y_ratio * $imgsize[0]);
								$new_y = $fix_height;
						}

					$n_width=$new_x;
					$n_height=$new_y;
					
					//----start make thumb------

							//----start make thumb------

					if(($imgType=='jpg')||($imgType=='JPG')){
							$im=ImageCreateFromJPEG($source); 
							$width=ImageSx($im);              // Original picture width is stored
							$height=ImageSy($im);             // Original picture height is stored
							$newimage=imagecreatetruecolor($n_width,$n_height);    
							//imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
							imagecopyresampled($newimage, $im, 0, 0, 0, 0, $n_width,$n_height,$width,$height); 
							ImageJpeg($newimage,$tsrc);
					
					}else if(($imgType=='gif')||($imgType=='GIF')){
							$im=ImageCreateFromGIF($source);
							$width=ImageSx($im);              // Original picture width is stored
							$height=ImageSy($im);                  // Original picture height is stored
							$newimage=imagecreatetruecolor($n_width,$n_height);
							//imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
							imagecopyresampled($newimage, $im, 0, 0, 0, 0, $n_width,$n_height,$width,$height); 
								if (function_exists("imagegif")) {
								//Header("Content-type: image/gif");
								ImageGIF($newimage,$tsrc);
								}
								elseif (function_exists("imagejpeg")) {
								//Header("Content-type: image/jpeg");
								ImageJPEG($newimage,$tsrc);
								}
					}else if(($imgType=='png')||($imgType=='PNG')){	
							$im = @imagecreatefrompng($source);
							$width=ImageSx($im);              // Original picture width is stored
							$height=ImageSy($im);                  // Original picture height is stored
							$newimage=imagecreatetruecolor($n_width,$n_height);
							//imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
							imagecopyresampled($newimage, $im, 0, 0, 0, 0, $n_width,$n_height,$width,$height); 
							imagepng($newimage,$tsrc);
					}		



				//---------------Clear cache--------------------------------------
				   if($dp = @opendir($cache_dir)) {
								while($file = readdir($dp)) {
										if(preg_match('/^img_/', $file)) {
											 $mtime = @filemtime("$cache_dir/$file");
											 if($mtime < time() - 3600 * 24 * $days) @unlink("$cache_dir/$file");
										}
									}
								closedir($dp);
							  }
					
			}	
	###############################################
	function ShowNewHotSale($product_status){
					 if($product_status==1){
					 	$imageShow="";
					 }
					 if($product_status==2){
					 	$imageShow="<img src='images/sale.png' width='100' height='98' >";
					 }	 
					 if($product_status==3){
					 	$imageShow="<img src='images/hotdeal.png' width='100' height='98' >";
					 }						 
					 if($product_status==4){
					 	$imageShow="<img src='images/new.png' width='100' height='98' >";
					 }
					 echo $imageShow;
	}
	###############################################
	function  getFirstImage($productID,&$FirstImageName){
				$query="SELECT * FROM tbl_product_img WHERE product_ID= '".$productID."' ORDER BY id DESC ";
				$result=mysql_query($query);
				$data=mysql_fetch_assoc($result);
				$FirstImageName=$data['file_name'];
				return $FirstImageName;
	}

	function dir_copy($srcdir, $dstdir, $offset = '', $verbose = false) 
{ 
    // A function to copy files from one directory to another one, including subdirectories and 
    // nonexisting or newer files. Function returns number of files copied. 
    // This function is PHP implementation of Windows xcopy  A:\dir1\* B:\dir2 /D /E /F /H /R /Y 
    // Syntaxis: [$returnstring =] dircopy($sourcedirectory, $destinationdirectory [, $offset] [, $verbose]); 
    // Example: $num = dircopy('A:\dir1', 'B:\dir2', 1); 

    // Original by SkyEye.  Remake by AngelKiha. 
    // Linux compatibility by marajax. 
    // ([danbrown AT php DOT net): *NIX-compatibility noted by Belandi.] 
    // Offset count added for the possibilty that it somehow miscounts your files.  This is NOT required. 
    // Remake returns an explodable string with comma differentiables, in the order of: 
    // Number copied files, Number of files which failed to copy, Total size (in bytes) of the copied files, 
    // and the files which fail to copy.  Example: 5,2,150000,\SOMEPATH\SOMEFILE.EXT|\SOMEPATH\SOMEOTHERFILE.EXT 
    // If you feel adventurous, or have an error reporting system that can log the failed copy files, they can be 
    // exploded using the | differentiable, after exploding the result string. 
    // 
    if(!isset($offset)) $offset=0; 
    $num = 0; 
    $fail = 0; 
    $sizetotal = 0; 
    $fifail = ''; 
	//echo $dstdir."<br>";
	//echo $srcdir;
    if(!is_dir($dstdir)) mkdir($dstdir); 
    if($curdir = opendir($srcdir)) { 
        while($file = readdir($curdir)) { 
            if($file != '.' && $file != '..') { 
//                $srcfile = $srcdir . '\\' . $file;    # deleted by marajax 
//                $dstfile = $dstdir . '\\' . $file;    # deleted by marajax 
                $srcfile = $srcdir . '/' . $file;    # added by marajax 
                $dstfile = $dstdir . '/' . $file;    # added by marajax 
                if(is_file($srcfile)) { 
                    if(is_file($dstfile)) $ow = filemtime($srcfile) - filemtime($dstfile); else $ow = 1; 
                    if($ow > 0) { 
                        if($verbose) echo "Copying '$srcfile' to '$dstfile'...<br />"; 
                        if(copy($srcfile, $dstfile)) { 
                            touch($dstfile, filemtime($srcfile)); $num++; 
                            chmod($dstfile, 0777);    # added by marajax 
                            $sizetotal = ($sizetotal + filesize($dstfile)); 
                            if($verbose) echo "OK\n"; 
                        } 
                        else { 
                            echo "Error: File '$srcfile' could not be copied!<br />\n"; 
                            $fail++; 
                            $fifail = $fifail.$srcfile.'|'; 
                        } 
                    } 
                } 
                else if(is_dir($srcfile)) { 
                    $res = explode(',',$ret); 
//                    $ret = dircopy($srcfile, $dstfile, $verbose); # deleted by patrick 
                    $ret = dir_copy($srcfile, $dstfile, $verbose); # added by patrick 
                    $mod = explode(',',$ret); 
                    $imp = array($res[0] + $mod[0],$mod[1] + $res[1],$mod[2] + $res[2],$mod[3].$res[3]); 
                    $ret = implode(',',$imp); 
                } 
            } 
        } 
        closedir($curdir); 
    } 
    $red = explode(',',$ret); 
    $ret = ($num + $red[0]).','.(($fail-$offset) + $red[1]).','.($sizetotal + $red[2]).','.$fifail.$red[3]; 
    return $ret; 
} 
	###############################################
   function recursive_remove_directory($directory, $empty=FALSE)
				{
					// if the path has a slash at the end we remove it here
					if(substr($directory,-1) == '/')
					{
						$directory = substr($directory,0,-1);
					}

					// if the path is not valid or is not a directory ...
					if(!file_exists($directory) || !is_dir($directory))
					{
						// ... we return false and exit the function
						return FALSE;

					// ... if the path is not readable
					}elseif(!is_readable($directory))
					{
						// ... we return false and exit the function
						return FALSE;

					// ... else if the path is readable
					}else{

						// we open the directory
						$handle = opendir($directory);

						// and scan through the items inside
						while (FALSE !== ($item = readdir($handle)))
						{
							// if the filepointer is not the current directory
							// or the parent directory
							if($item != '.' && $item != '..')
							{
								// we build the new path to delete
								$path = $directory.'/'.$item;

								// if the new path is a directory
								if(is_dir($path)) 
								{
									// we call this function with the new path
									recursive_remove_directory($path);

								// if the new path is a file
								}else{
									// we remove the file
									unlink($path);
								}
							}
						}
						// close the directory
						closedir($handle);

						// if the option to empty is not set to true
						if($empty == FALSE)
						{
							// try to delete the now empty directory
							if(!rmdir($directory))
							{
								// return false if not possible
								return FALSE;
							}
						}
						// return success
						return TRUE;
					}
				}
	###############################################
	function GetEngDate($day2){
		$dateArray = explode("-",$day2);
		//echo "Day 2 = ".$day2."<br>";
		$date= $dateArray[2];
		$mon= $dateArray[1];
		$year= $dateArray[0];
		$monthArray3 = Array("01"=>"January","02"=>"February","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"August","09"=>"September","10"=>"October","11"=>"November","12"=>"December");
		if($date < 10){ $date = str_replace("0", "", $date); } 
		echo $date."&nbsp;&nbsp;".$monthArray3[$mon]."&nbsp;&nbsp;".$year;
	}	
?>
