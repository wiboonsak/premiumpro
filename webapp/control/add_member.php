<?php   
        if($_POST['action']=='Add'){
			
			$query="SELECT * FROM tbl_package WHERE id = '".$_POST['PackageID']."' ";
			$result  = mysql_query($query);
			$data=mysql_fetch_assoc($result);
			
			$_POST['packageDuration']=$data['duration'];
			$_POST['packageFee']=$data['rent_fee'];
			$_POST['pakageKeyFee']=$data['key_fee'];
			$_POST['packageName']=$data['packageName'];
			
			 $date=date("Y--m-d");
			 $_POST['CardNumber']= $_POST['set1']." ".$_POST['set2']." ".$_POST['set3']." ".$_POST['set4'];
			 $_POST['CardExpire'] = $_POST['selectMonth']." ".$_POST['selectYear'];
			 $query=" INSERT  IGNORE INTO  `tbl_member` "
			 ." (`id` ,`username` ,`password` ,`email` ,`firstname` ,`lastname` ,`gender` ,`address` ,`country` ,`birthday` ,`zipcode` ,`packageID` , "
			 ."`packageDuration` ,`packageFee` ,`pakageKeyFee` ,`date_regis` ,`dateMember` ,`NameOnCard` ,`CardType` ,`CardNumber` ,`CardExpire` ,`CW` ,`advance`,`packageName`,`registerType` ) "
			 ." VALUES "
			 ." ( '' ,  '".$_POST['username']."',  '".$_POST['password']."',  '".$_POST['email']."',  '".$_POST['firstname']."',  '".$_POST['lastname']."',  '".$_POST['gender']."',  '".$_POST['address']."',  '".$_POST['country']."',  '".$_POST['birthday']."',  '".$_POST['zipcode']."',  '".$data['id']."' "
			 ." ,  '".$_POST['packageDuration']."',  '".$_POST['packageFee']."',  '".$_POST['pakageKeyFee']."',  '".$date."', '".$date."',  '".$_POST['NameOnCard']."',  '".$_POST['CardType']."',  '".$_POST['CardNumber']."',  '".$_POST['CardExpire']."',  '".$_POST['CW']."' ,  '".$_POST['advance']."'  ,  '".$_POST['packageName']."', 'new' ) ";
			 //echo $query;
			 if(mysql_query($query)){
				 		 $memID=mysql_insert_id();
				//------------------add mailbox------------------///
					     $query="SELECT * FROM tbl_mailbox WHERE member_id ='' ORDER BY id ASC LIMIT 0,1 ";
						$result=mysql_query($query);
						$data=mysql_fetch_assoc($result);
						//---------------update mailbox --------------------------------------------------------------------------------------//
					   $query="UPDATE IGNORE tbl_mailbox SET member_id = '".$memID."' , box_status='rent' WHERE id = '".$data['id']."' ";
						mysql_query($query);
						//---------------update member expired---------------------------------------------------------------------------//
						$currDate=date("Y-m-d");
						$dateExpire =  date("Y-m-d",  mktime (0,0,0,date("m")+$_POST['packageDuration'],  date("d"),  date("Y")));
						$query="UPDATE tbl_member SET date_start='".$currDate."'	,  date_expired= '".$dateExpire."' , userStatus = 'member' WHERE id = '".$memID."' ";
						mysql_query($query);
						//unset($_POST['action']);
						include('mailto_member.php');
				 	?> 
                    <script language="javascript">
                    alert('เพิ่ม member เรียบร้อยแล้ว');
					window.location.href='main.php?work=AddMember';
                    </script>
                    <?php 
				 }else{
					?>
                    <script language="javascript">
                    alert('เกิดข้อผิดพลาดในการเพิ่ม  member ');
					window.location.href='main.php?work=AddMember';
                    </script>   <?php 	 
				}
			}
       //-----------------------------------------------------------------------

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script> 
<script> 
$(document).ready(function(){
$('#username').keyup(username_check);
});
	
function username_check(){	
var username = $('#username').val();
if(username == "" || username.length < 4){
	$('#username').css('border', '1px #CCC solid');
	$('#tick').hide();
	$('#cross').fadeIn();
	document.form1.userpass.value=0;
}else{
 
jQuery.ajax({
   type: "POST",
   url: "check.php",
   data: 'username='+ username,
   cache: false,
   success: function(response){
			if(response == 1){
				$('#username').css('border', '2px #C33 solid');	
				$('#tick').hide();
				$('#cross').fadeIn();
				document.form1.userpass.value=0;
			}else{
				$('#username').css('border', '2px #090 solid');
				$('#cross').hide();
				$('#tick').fadeIn();
				document.form1.userpass.value=1;
			}
		}
	});
   }
}
 //---------------------
</script> 
<script language="javascript">
		 function FormValid(){
	 	    if(document.form1.username.value==""){
				alert('please input username');
				document.form1.username.focus();
				return false;
			}
		    if(document.form1.password.value==""){
				alert('please input password');
				document.form1.password.focus();
				return false;
			}
			if(document.form1.password.value.length < 6){
					alert('password 6-characters minimum');
					document.form1.password.focus();
					return false();
			}
		    if(document.form1.password2.value==""){
				alert('please Retype password');
				document.form1.password2.focus();
				return false;
			}
			if(document.form1.password2.value!=document.form1.password.value){
				alert('please check password and retype password');
				document.form1.password2.focus();
				return false;				
				}
			if(document.form1.email.value==""){
				alert('please input email');
				document.form1.email.focus();
				return false;
			}else{
				var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
				var address = document.form1.email.value;
				if(reg.test(address) == false) {
				  alert('Invalid Email Address');
				  document.form1.email.focus();
				  return false;
			   }
		    }
			if(document.form1.firstname.value==""){
				alert('please input firstname');
				document.form1.firstname.focus();
				return false;
			}
			if(document.form1.lastname.value==""){
				alert('please input lastname');
				document.form1.lastname.focus();
				return false;
			}
			var gender='no';
			var radios = document.form1.gender; 
			for (var i=0; i < radios.length; i++) { 
 			 if (radios[i].checked) { 
  				 gender='yes';
  			 } 
			}
			if(gender=='no'){
				alert('please select gender');
				return false;					
			}
			if(document.form1.address.value==""){
				alert('please input address');
				document.form1.address.focus();
				return false;
			}
			if(document.form1.zipcode.value==""){
				alert('please input zipcode');
				document.form1.zipcode.focus();
				return false;
			}
			if(document.form1.birthday.value==""){
				alert('please input birthday');
				document.form1.birthday.focus();
				return false;
			}			
			if(document.form1.advance.value==""){
				alert('please input advance');
				document.form1.advance.focus();
				return false;
			}		
		  	if((document.form1.userpass.value==0) ||(document.form1.userpass.value=='')){
				alert('please check username');
				document.form1.userpass.focus();
				return false;
			}else{
				document.form1.action.value='Add';
			    document.form1.submit();
			}
	 }
  
</script>
<style>
#username{
	padding:2px;
	font-size:18px;
	border:2px #CCC solid;
}

#tick{display:none}
#cross{display:none}
</style>

<style type="text/css">
<!--
#cross {display:none}
#tick {display:none}
#username {	padding:2px;
	font-size:18px;
	border:2px #CCC solid;
}
-->
</style>
</head>

<body><form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="form1">
<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
        <td class="txt10-black">
         <?php include("member_menux.php")?>
    </td>
  </tr>
  
  <tr>
    <td>  
    <table width="100%" border="0" cellspacing="5" cellpadding="0">
      <tr>
        <td width="38%" align="right"><span class="txt10-black">User Login
          <input name="userpass" type="hidden"  id="userpass" />
        </span></td>
        <td width="62%"><span class="txt10-black">
          <input type="text" name="username" id="username" />
          <img src="tick.png" alt="" width="16" height="16" id="tick"/> <img src="cross.png" alt="" width="16" height="16" id="cross"/> 4 characters minimum</span></td>
      </tr>
      <tr>
        <td align="right"><span class="txt10-black">Create a password</span></td>
        <td><span class="txt10-black">
          <input type="password" name="password" id="password" />
          6-characters minimum; case sensitive.</span></td>
      </tr>
      <tr>
        <td align="right"><span class="txt10-black">Retype password</span></td>
        <td><span class="txt10-black">
          <input type="password" name="password2" id="password2" />
        </span></td>
      </tr>
      <tr>
        <td align="right"><span class="txt10-black">E-mail</span></td>
        <td><span class="txt10-black">
          <input name="email" type="text" id="email" size="40" />
        </span></td>
      </tr>
      <tr>
        <td align="right"><span class="txt10-black">First Name</span></td>
        <td><span class="txt10-black">
          <input name="firstname" type="text" id="firstname" size="40" />
        </span></td>
      </tr>
      <tr>
        <td align="right"><span class="txt10-black">Last Name</span></td>
        <td><span class="txt10-black">
          <input name="lastname" type="text" id="lastname" size="40" />
        </span></td>
      </tr>
      <tr>
        <td align="right"><span class="txt10-black">Gender</span></td>
        <td><span class="txt10-black">
          <input type="radio" name="gender" id="radio" value="Male" />
          Male&nbsp;&nbsp;
          <input type="radio" name="gender" id="radio" value="Female" />
          Female</span></td>
      </tr>
      <tr>
        <td align="right"><span class="txt10-black">Address</span></td>
        <td><span class="txt10-black">
          <textarea name="address" id="address" cols="45" rows="5"></textarea>
        </span></td>
      </tr>
      <tr>
        <td align="right"><span class="txt10-black">Country / Region</span></td>
        <td><span class="txt10-black">
        <?php 
				$query="SELECT * FROM tbl_package WHERE active='1'  ORDER BY main_set_id ";
				$resultList = mysql_query($query);
		?>
          <select id="country" name="country" >
            <option  value="Afghanistan"> Afghanistan (افغانستان) </option>
            <option  value="Aland Islands"> Aland Islands </option>
            <option  value="Albania"> Albania (Shqipëria) </option>
            <option  value="Algeria"> Algeria (الجزائر) </option>
            <option  value="American Samoa"> American Samoa </option>
            <option  value="Andorra"> Andorra </option>
            <option  value="Angola"> Angola </option>
            <option  value="Anguilla"> Anguilla </option>
            <option  value="Antarctica"> Antarctica </option>
            <option  value="Antigua and Barbuda"> Antigua and Barbuda </option>
            <option  value="Argentina"> Argentina </option>
            <option  value="Armenia"> Armenia (Հայաստան) </option>
            <option  value="Aruba"> Aruba </option>
            <option  value="Australia"> Australia </option>
            <option  value="Austria"> Austria (Österreich) </option>
            <option  value="Azerbaijan"> Azerbaijan (Azərbaycan) </option>
            <option  value="Bahamas"> Bahamas </option>
            <option  value="Bahrain"> Bahrain (البحرين) </option>
            <option  value="Bangladesh"> Bangladesh (বাংলাদেশ) </option>
            <option  value="Barbados"> Barbados </option>
            <option  value="Belarus"> Belarus (Белару́сь) </option>
            <option  value="Belgium"> Belgium (België) </option>
            <option  value="Belize"> Belize </option>
            <option  value="Benin"> Benin (Bénin) </option>
            <option  value="Bermuda"> Bermuda </option>
            <option  value="Bhutan" > Bhutan (འབྲུག་ཡུལ) </option>
            <option  value="Bolivia"> Bolivia </option>
            <option  value="Bosnia and Herzegovina"> Bosnia and Herzegovina </option>
            <option  value="Botswana"> Botswana </option>
            <option  value="Bouvet Island"> Bouvet Island </option>
            <option  value="Brazil"> Brazil (Brasil) </option>
            <option  value="British Indian Ocean Territory"> British Indian Ocean Territory </option>
            <option  value="Brunei"> Brunei (Brunei Darussalam) </option>
            <option  value="Bulgaria"> Bulgaria (България) </option>
            <option  value="Burkina Faso"> Burkina Faso </option>
            <option  value="Burundi"> Burundi (Uburundi) </option>
            <option  value="Cambodia"> Cambodia (Kampuchea) </option>
            <option  value="Cameroon" > Cameroon (Cameroun) </option>
            <option  value="Canada"> Canada </option>
            <option  value="Cape Verde"> Cape Verde (Cabo Verde) </option>
            <option  value="Cayman Islands"> Cayman Islands </option>
            <option  value="Central African Republic"> Central African Republic </option>
            <option  value="Chad"> Chad (Tchad) </option>
            <option  value="Chile"> Chile </option>
            <option  value="China"> China (中国) </option>
            <option  value="Christmas Island"> Christmas Island </option>
            <option  value="Cocos Islands"> Cocos Islands </option>
            <option  value="Colombia"> Colombia </option>
            <option  value="Comoros"> Comoros (Comores) </option>
            <option  value="Congo"> Congo </option>
            <option  value="CD"> Congo, Democratic Republic </option>
            <option  value="Cook Islands"> Cook Islands </option>
            <option  value="Costa Rica"> Costa Rica </option>
            <option  value="Côte d'Ivoire"> Côte d&#39;Ivoire </option>
            <option  value="Croatia"> Croatia (Hrvatska) </option>
            <option  value="Cuba"> Cuba </option>
            <option  value="Cyprus"> Cyprus (Κυπρος) </option>
            <option  value="Czech Republic"> Czech Republic (Česko) </option>
            <option  value="Denmark"> Denmark (Danmark) </option>
            <option  value="Djibouti"> Djibouti </option>
            <option  value="Dominica"> Dominica </option>
            <option  value="Dominican Republic"> Dominican Republic </option>
            <option  value="Ecuador"> Ecuador </option>
            <option  value="Egypt"> Egypt (مصر) </option>
            <option  value="El Salvador"> El Salvador </option>
            <option  value="Equatorial Guinea" > Equatorial Guinea </option>
            <option  value="Eritrea"> Eritrea (Ertra) </option>
            <option  value="Estonia"> Estonia (Eesti) </option>
            <option  value="Ethiopia"> Ethiopia (Ityop&#39;iya) </option>
            <option  value="Falkland Islands"> Falkland Islands </option>
            <option  value="Faroe Islands"> Faroe Islands </option>
            <option  value="Fiji"> Fiji </option>
            <option  value="Finland"> Finland (Suomi) </option>
            <option  value="France"> France </option>
            <option  value="French Guiana"> French Guiana </option>
            <option  value="French Polynesia"> French Polynesia </option>
            <option  value="French Southern Territories"> French Southern Territories </option>
            <option  value="Gabon"> Gabon </option>
            <option  value="Gambia"> Gambia </option>
            <option  value="Georgia"> Georgia (საქართველო) </option>
            <option  value="Germany"> Germany (Deutschland) </option>
            <option  value="Ghana"> Ghana </option>
            <option  value="Gibraltar"> Gibraltar </option>
            <option  value="Greece"> Greece (Ελλάς) </option>
            <option  value="Grenada"> Grenada </option>
            <option  value="Guadeloupe"> Guadeloupe </option>
            <option  value="Guam"> Guam </option>
            <option  value="Guatemala"> Guatemala </option>
            <option  value="Guernsey"> Guernsey </option>
            <option  value="Guinea"> Guinea (Guinée) </option>
            <option  value="Guinea-Bissau"> Guinea-Bissau (Guiné-Bissau) </option>
            <option  value="Guyana"> Guyana </option>
            <option  value="Haiti"> Haiti (Haïti) </option>
            <option  value="Heard Island and McDonald Islands"> Heard Island and McDonald Islands </option>
            <option  value="Honduras"> Honduras </option>
            <option  value="Hong Kong"> Hong Kong </option>
            <option  value="Hungary"> Hungary (Magyarország) </option>
            <option  value="Iceland"> Iceland (Ísland) </option>
            <option  value="India"> India </option>
            <option  value="Indonesia"> Indonesia </option>
            <option  value="Iran"> Iran (ایران) </option>
            <option  value="Iraq"> Iraq (العراق) </option>
            <option  value="Ireland"> Ireland </option>
            <option  value="Isle of Man"> Isle of Man </option>
            <option  value="Israel"> Israel (ישראל) </option>
            <option  value="Italy"> Italy (Italia) </option>
            <option  value="Jamaica"> Jamaica </option>
            <option  value="Japan"> Japan (日本) </option>
            <option  value="Jersey"> Jersey </option>
            <option  value="Kazakhstan"> Kazakhstan (Қазақстан) </option>
            <option  value="Kenya"> Kenya </option>
            <option  value="Kiribati"> Kiribati </option>
            <option  value="KW"> Kuwait (الكويت) </option>
            <option  value="Kyrgyzstan"> Kyrgyzstan (Кыргызстан) </option>
            <option  value="Laos"> Laos (ນລາວ) </option>
            <option  value="Latvia"> Latvia (Latvija) </option>
            <option  value="Lebanon"> Lebanon (لبنان) </option>
            <option  value="Lesotho"> Lesotho </option>
            <option  value="Liberia"> Liberia </option>
            <option  value="Libya"> Libya (ليبيا) </option>
            <option  value="Liechtenstein" > Liechtenstein </option>
            <option  value="Lithuania"> Lithuania (Lietuva) </option>
            <option  value="Luxembourg"> Luxembourg (Lëtzebuerg) </option>
            <option  value="Macao"> Macao </option>
            <option  value="Macedonia"> Macedonia (Македонија) </option>
            <option  value="Madagascar"> Madagascar (Madagasikara) </option>
            <option  value="Malawi"> Malawi </option>
            <option  value="Malaysia"> Malaysia </option>
            <option  value="Maldives"> Maldives (ގުޖޭއްރާ ޔާއްރިހޫމްޖ) </option>
            <option  value="Mali"> Mali </option>
            <option  value="Malta"> Malta </option>
            <option  value="Marshall Islands"> Marshall Islands </option>
            <option  value="Martinique"> Martinique </option>
            <option  value="Mauritania" > Mauritania (موريتانيا) </option>
            <option  value="Mauritius"> Mauritius </option>
            <option  value="Mayotte"> Mayotte </option>
            <option  value="Mexico"> Mexico (México) </option>
            <option  value="Micronesia"> Micronesia </option>
            <option  value="Moldova"> Moldova </option>
            <option  value="Monaco"> Monaco </option>
            <option  value="Mongolia"> Mongolia (Монгол Улс) </option>
            <option  value="Montenegro"> Montenegro (Црна Гора) </option>
            <option  value="Montserrat"> Montserrat </option>
            <option  value="Morocco"> Morocco (المغرب) </option>
            <option  value="Mozambique"> Mozambique (Moçambique) </option>
            <option  value="Myanmar"> Myanmar (Burma) </option>
            <option  value="Namibia"> Namibia </option>
            <option  value="Nauru"> Nauru (Naoero) </option>
            <option  value="Nepal"> Nepal (नेपाल) </option>
            <option  value="Netherlands"> Netherlands (Nederland) </option>
            <option  value="Netherlands Antilles"> Netherlands Antilles </option>
            <option  value="New Caledonia"> New Caledonia </option>
            <option  value="New Zealand"> New Zealand </option>
            <option  value="Nicaragua"> Nicaragua </option>
            <option  value="Niger"> Niger </option>
            <option  value="Nigeria"> Nigeria </option>
            <option  value="Niue"> Niue </option>
            <option  value="Norfolk Island"> Norfolk Island </option>
            <option  value="Northern Mariana Islands"> Northern Mariana Islands </option>
            <option  value="North Korea "> North Korea (조선) </option>
            <option  value="Norway"> Norway (Norge) </option>
            <option  value="Oman"> Oman (عمان) </option>
            <option  value="Pakistan"> Pakistan (پاکستان) </option>
            <option  value="Palau"> Palau (Belau) </option>
            <option  value="Palestinian Territories"> Palestinian Territories </option>
            <option  value="Panama"> Panama (Panamá) </option>
            <option  value="PG"> Papua New Guinea </option>
            <option  value="Paraguay"> Paraguay </option>
            <option  value="Peru"> Peru (Perú) </option>
            <option  value="Philippines"> Philippines (Pilipinas) </option>
            <option  value="PN"> Pitcairn </option>
            <option  value="Poland"> Poland (Polska) </option>
            <option  value="Portugal"> Portugal </option>
            <option  value="Puerto Rico"> Puerto Rico </option>
            <option  value="Qatar"> Qatar (قطر) </option>
            <option  value="Reunion"> Reunion </option>
            <option  value="Romania"> Romania (România) </option>
            <option  value="Russia"> Russia (Россия) </option>
            <option  value="Rwanda"> Rwanda </option>
            <option  value="Saint Helena"> Saint Helena </option>
            <option  value="Saint Kitts and Nevis"> Saint Kitts and Nevis </option>
            <option  value="Saint Lucia"> Saint Lucia </option>
            <option  value="Saint Pierre and Miquelon"> Saint Pierre and Miquelon </option>
            <option  value="Saint Vincent and the Grenadines"> Saint Vincent and the Grenadines </option>
            <option  value="Samoa"> Samoa </option>
            <option  value="San Marino"> San Marino </option>
            <option  value="Sao Tome and Principe"> Sao Tome and Principe (São Tomé and Príncipe) </option>
            <option  value="Saudi Arabia"> Saudi Arabia (المملكة العربية السعودية) </option>
            <option  value="Senegal"> Senegal (Sénégal) </option>
            <option  value="Serbia"> Serbia (Србија) </option>
            <option  value="Serbia and Montenegro"> Serbia and Montenegro (Србија и Црна Гора) </option>
            <option  value="Seychelles"> Seychelles </option>
            <option  value="Sierra Leone"> Sierra Leone </option>
            <option  value="Singapore"> Singapore (Singapura) </option>
            <option  value="Slovakia"> Slovakia (Slovensko) </option>
            <option  value="Slovenia"> Slovenia (Slovenija) </option>
            <option  value="Solomon Islands"> Solomon Islands </option>
            <option  value="Somalia"> Somalia (Soomaaliya) </option>
            <option  value="South Africa" > South Africa </option>
            <option  value="South Georgia and the South Sandwich Islands"> South Georgia and the South Sandwich Islands </option>
            <option  value="South Korea"> South Korea (한국) </option>
            <option  value="Spain"> Spain (España) </option>
            <option  value="Sri Lanka"> Sri Lanka </option>
            <option  value="Sudan"> Sudan (السودان) </option>
            <option  value="Suriname"> Suriname </option>
            <option  value="SJ"> Svalbard and Jan Mayen </option>
            <option  value="Swaziland"> Swaziland </option>
            <option  value="Sweden"> Sweden (Sverige) </option>
            <option  value="Switzerland"> Switzerland (Schweiz) </option>
            <option  value="Syria"> Syria (سوريا) </option>
            <option  value="Taiwan"> Taiwan (台灣) </option>
            <option  value="Tajikistan"> Tajikistan (Тоҷикистон) </option>
            <option  value="Tanzania"> Tanzania </option>
            <option  value="Thailand"selected="selected" > Thailand (ราชอาณาจักรไทย) </option>
            <option  value="Timor-Leste"> Timor-Leste </option>
            <option  value="Togo"> Togo </option>
            <option  value="Tokelau"> Tokelau </option>
            <option  value="Tonga"> Tonga </option>
            <option  value="Trinidad and Tobago"> Trinidad and Tobago </option>
            <option  value="Tunisia"> Tunisia (تونس) </option>
            <option  value="Turkey"> Turkey (Türkiye) </option>
            <option  value="Turkmenistan"> Turkmenistan (Türkmenistan) </option>
            <option  value="Turks and Caicos Islands"> Turks and Caicos Islands </option>
            <option  value="Tuvalu"> Tuvalu </option>
            <option  value="Uganda"> Uganda </option>
            <option  value="UA"> Ukraine (Україна) </option>
            <option  value="United Arab Emirates" > United Arab Emirates </option>
            <option  value="United Kingdom"> United Kingdom </option>
            <option  value="United States"> United States </option>
            <option  value="United States minor outlying islands"> United States minor outlying islands </option>
            <option  value="Uruguay"> Uruguay </option>
            <option  value="Uzbekistan"> Uzbekistan (O&#39;zbekiston) </option>
            <option  value="Vanuatu"> Vanuatu </option>
            <option  value="Vatican City"> Vatican City (Città del Vaticano) </option>
            <option  value="Venezuela"> Venezuela </option>
            <option  value="Vietnam"> Vietnam (Việt Nam) </option>
            <option  value="Virgin Islands, British"> Virgin Islands, British </option>
            <option  value="Virgin Islands, U.S."> Virgin Islands, U.S. </option>
            <option  value="Wallis and Futuna"> Wallis and Futuna </option>
            <option  value="Western Sahara"> Western Sahara (الصحراء الغربية) </option>
            <option  value="Yemen "> Yemen (اليمن) </option>
            <option  value="Zambia"> Zambia </option>
            <option  value="Zimbabwe"> Zimbabwe </option>
          </select>
        </span></td>
      </tr>
      <tr>
        <td align="right"><span class="txt10-black">Zip code</span></td>
        <td><span class="txt10-black">
          <input name="zipcode" type="text" id="zipcode" size="10" />
        </span></td>
      </tr>
      <tr>
        <td align="right"><span class="txt10-black">Birthday</span></td>
        <td><span class="txt10-black">
          <input name="birthday" type="text" id="birthday" />
          Example: 20/06/1990</span></td>
      </tr>
      <tr>
        <td align="right"><span class="txt10-black">Please Choose rental team</span></td>
        <td><span class="txt10-black">
          <select name="PackageID">
            <?php while($data=mysql_fetch_assoc($resultList)){ ?>
            <option value="<?php echo $data['id']?>" <?php if($data['id']==$_GET['Package']){ echo "selected";}?>><?php echo $data['packageName']?> ,Rent <?php echo number_format($data['duration'])?> Month, Total <?php echo number_format($data['rent_fee']+$data['key_fee'])?> Thb.</option>
            <?php } ?>
          </select>
        </span></td>
        <!--rent_fee	key_fee	duration -->
      </tr>
      <tr>
        <td align="right"><span class="txt10-black">Pay for Advance </span></td>
        <td><span class="txt10-black">
          <input type="text" name="advance" id="advance" />
        ฿.</span></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><span class="txt10-black">
          <input type="button" name="NexBt" id="NexBt" value="  Add Member" onClick="FormValid();" />
          <input type="hidden" name="action" id="action" />
        </span></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><span class="txt10-black">&nbsp;</span></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>