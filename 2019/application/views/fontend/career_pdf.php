<?php
//============================================================+
// File name   : example_061.php
// Begin       : 2010-05-24
// Last Update : 2014-01-25
//
// Description : Example 061 for TCPDF class
//               XHTML + CSS
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: XHTML + CSS
 * @author Nicola Asuni
 * @since 2010-05-25
 */

// Include the main TCPDF library (search for installation path).
//require_once('tcpdf_include.php');
if($dataid==''){
$dataid = $this->uri->segment(3); 
}else{
    $dataid = $dataid;
}
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
//$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('HATYAI PREMIUM PROPERTY - JOB OPENING');
//$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP,PDF_MARGIN_RIGHT);
$pdf->SetMargins(20, 10, 20, true);

$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);



// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// set font
$pdf->SetFont('thsarabun', '',16);


$pdf->AddPage('P', 'A4');$titlename='';$gender='';$Marital='';$Military='';$Degree1='';$Degree2='';$Degree3='';
	$list_career = $this->Project_model->list_careerform($dataid);
                    foreach ($list_career->result() AS $list_career2){}
                    $datedata = $this->Project_model->GetthaiDateTimeeng($list_career2->date_add);
                    if($list_career2->Title_name=='1'){
                        $titlename = 'นาย / Mr.';
                    }else if($list_career2->Title_name=='2'){
                        $titlename = 'นางสาว / Miss.';
                    }else{
                        $titlename = 'นาง / Mrs.';
                    }
                    if($list_career2->Gender=='1'){
                        $gender = 'ผู้ชาย / Male';
                    }else{
                        $gender = 'ผู้หญิง / Female';
                    }
                    if($list_career2->Type=='1'){
                        $Typecareer = 'เต็มเวลา / Full Time';
                    }else{
                        $Typecareer = 'พาร์ทไทม์ / Part Time';
                    }
                    if($list_career2->Marital_status=='1'){
                        $Marital = 'โสด / Single';
                    }else if($list_career2->Marital_status=='2'){
                        $Marital = 'สมรส / Married';
                    }else{
                        $Marital = 'หย่าร้าง / Divorced';
                    }
                    if($list_career2->Military_Service=='1'){
                        $Military = 'ผ่านการเกณฑ์ทหารแล้ว / Conscripted';
                    }else if($list_career2->Marital_status=='2'){
                        $Military = 'ยังไม่เกณฑ์ทหาร / No Military Service';
                    }else if($list_career2->Marital_status=='3'){
                        $Military = 'ได้รับการยกเว้น / Exempted';
                    }else{
                        $Military = 'หลักสูตรรักษาดินแดน (ร.ด.) / Reserved Officers’ Training CorpCourse (R.O.T.C.)';
                    }
                    if($list_career2->Degree1=='1'){
                        $Degree1 = 'ปวช. / Vocational Certificate';
                    }else if($list_career2->Degree1=='2'){
                        $Degree1 = 'ปวส. / Diploma/High Vocational Certificate';
                    }else if($list_career2->Degree1=='3'){
                        $Degree1 = 'ปริญญาตรี / Bachelor Degrees';
                    }else if($list_career2->Degree1=='4'){
                        $Degree1 = 'ปริญญาโท /  Master Degrees';
                    }else{
                        $Degree1 = 'ปริญญาเอก / Doctor Degrees';
                    }
                    if($list_career2->Degree2=='1'){
                        $Degree2 = 'ปวช. / Vocational Certificate';
                    }else if($list_career2->Degree2=='2'){
                        $Degree2 = 'ปวส. / Diploma/High Vocational Certificate';
                    }else if($list_career2->Degree2=='3'){
                        $Degree2 = 'ปริญญาตรี / Bachelor Degrees';
                    }else if($list_career2->Degree2=='4'){
                        $Degree2 = 'ปริญญาโท /  Master Degrees';
                    }else{
                        $Degree2 = 'ปริญญาเอก / Doctor Degrees';
                    }
                    if($list_career2->Degree3=='1'){
                        $Degree3 = 'ปวช. / Vocational Certificate';
                    }else if($list_career2->Degree3=='2'){
                        $Degree3 = 'ปวส. / Diploma/High Vocational Certificate';
                    }else if($list_career2->Degree3=='3'){
                        $Degree2 = 'ปริญญาตรี / Bachelor Degrees';
                    }else if($list_career2->Degree3=='4'){
                        $Degree2 = 'ปริญญาโท /  Master Degrees';
                    }else{
                        $Degree2 = 'ปริญญาเอก / Doctor Degrees';
                    }
                     if($list_career2->Listening1=='1'){
                        $Listening1 = 'ดีมาก / Excellent';
                    }else if($list_career2->Listening1=='2'){
                        $Listening1 = 'ดี / Good';
                    }else if($list_career2->Listening1=='3'){
                        $Listening1 = 'พอใช้ / Fair';
                    }else{
                        $Listening1 = 'แย่ / Poor';
                    }
                     if($list_career2->Listening2=='1'){
                        $Listening2 = 'ดีมาก / Excellent';
                    }else if($list_career2->Listening2=='2'){
                        $Listening2 = 'ดี / Good';
                    }else if($list_career2->Listening2=='3'){
                        $Listening2 = 'พอใช้ / Fair';
                    }else{
                        $Listening2 = 'แย่ / Poor';
                    }
                     if($list_career2->Listening3=='1'){
                        $Listening3 = 'ดีมาก / Excellent';
                    }else if($list_career2->Listening3=='2'){
                        $Listening3 = 'ดี / Good';
                    }else if($list_career2->Listening3=='3'){
                        $Listening3 = 'พอใช้ / Fair';
                    }else{
                        $Listening3 = 'แย่ / Poor';
                    }
                     if($list_career2->Speaking1=='1'){
                        $Speaking1 = 'ดีมาก / Excellent';
                    }else if($list_career2->Speaking1=='2'){
                        $Speaking1 = 'ดี / Good';
                    }else if($list_career2->Speaking1=='3'){
                        $Speaking1 = 'พอใช้ / Fair';
                    }else{
                        $Speaking1 = 'แย่ / Poor';
                    }
                     if($list_career2->Speaking2=='1'){
                        $Speaking2 = 'ดีมาก / Excellent';
                    }else if($list_career2->Speaking2=='2'){
                        $Speaking2 = 'ดี / Good';
                    }else if($list_career2->Speaking2=='3'){
                        $Speaking2 = 'พอใช้ / Fair';
                    }else{
                        $Speaking2 = 'แย่ / Poor';
                    }
                     if($list_career2->Speaking3=='1'){
                        $Speaking3 = 'ดีมาก / Excellent';
                    }else if($list_career2->Speaking3=='2'){
                        $Speaking3 = 'ดี / Good';
                    }else if($list_career2->Speaking3=='3'){
                        $Speaking3 = 'พอใช้ / Fair';
                    }else{
                        $Speaking3 = 'แย่ / Poor';
                    }
                     if($list_career2->Reading1=='1'){
                        $Reading1 = 'ดีมาก / Excellent';
                    }else if($list_career2->Reading1=='2'){
                        $Reading1 = 'ดี / Good';
                    }else if($list_career2->Reading1=='3'){
                        $Reading1 = 'พอใช้ / Fair';
                    }else{
                        $Reading1 = 'แย่ / Poor';
                    }
                     if($list_career2->Reading2=='1'){
                        $Reading2 = 'ดีมาก / Excellent';
                    }else if($list_career2->Reading2=='2'){
                        $Reading2 = 'ดี / Good';
                    }else if($list_career2->Reading2=='3'){
                        $Reading2 = 'พอใช้ / Fair';
                    }else{
                        $Reading2 = 'แย่ / Poor';
                    }
                     if($list_career2->Reading3=='1'){
                        $Reading3 = 'ดีมาก / Excellent';
                    }else if($list_career2->Reading3=='2'){
                        $Reading3 = 'ดี / Good';
                    }else if($list_career2->Reading3=='3'){
                        $Reading3 = 'พอใช้ / Fair';
                    }else{
                        $Reading3 = 'แย่ / Poor';
                    }
                     if($list_career2->Writing1=='1'){
                        $Writing1 = 'ดีมาก / Excellent';
                    }else if($list_career2->Writing1=='2'){
                        $Writing1 = 'ดี / Good';
                    }else if($list_career2->Writing1=='3'){
                        $Writing1 = 'พอใช้ / Fair';
                    }else{
                        $Writing1 = 'แย่ / Poor';
                    }
                     if($list_career2->Writing2=='1'){
                        $Writing2 = 'ดีมาก / Excellent';
                    }else if($list_career2->Writing2=='2'){
                        $Writing2 = 'ดี / Good';
                    }else if($list_career2->Writing2=='3'){
                        $Writing2 = 'พอใช้ / Fair';
                    }else{
                        $Writing2 = 'แย่ / Poor';
                    }
                     if($list_career2->Writing3=='1'){
                        $Writing3 = 'ดีมาก / Excellent';
                    }else if($list_career2->Writing3=='2'){
                        $Writing3 = 'ดี / Good';
                    }else if($list_career2->Writing3=='3'){
                        $Writing3 = 'พอใช้ / Fair';
                    }else{
                        $Writing3 = 'แย่ / Poor';
                    }
                    
		$html = '<!doctype html>
<html>
<head>
<meta charset="utf-8">

	
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	
	

<link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">

</head>

<body style="margin: 0;font-size: 8px;font-weight: 400;line-height: 1.5;color: #212529;text-align: left;background-color: #fff;">
	

<div style="padding: 20px;">

    
    <div style="position: relative;background-color: #FFF;min-height: 680px;padding: 15px;overflow: auto!important;">
    <span style="font-size:30px;font-weight: bold;">ใบสมัครงาน</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <span style="font-size:20px;float:left">วันที่สมัคร '.$datedata.'</span>
        <div style="100%">
            
            <table >
    <tr >
    <td style="width:320px"> <div style="font-size: 3em;color: #3989c6;">ข้อมูลส่วนตัว / PERSONAL</div> 
    <div style="font-size: 2em;"><strong>Name:</strong> '.$titlename.' '.$list_career2->First_name.' '.$list_career2->Last_name.'<br><strong>National ID card no.:</strong> '.$list_career2->Card_no.'<br><strong>Date of birth:</strong> '.$this->Project_model->GetthaiDateeng($list_career2->Birth_day).' &nbsp;<strong>Age:</strong> '.$list_career2->Age.'<br><strong>Gender:</strong> '.$gender.'&nbsp; <strong>Religion:</strong> '.$list_career2->Religion.'<br><strong>Nationality:</strong> '.$list_career2->Nationality.'&nbsp;<strong>Weight:</strong> '.$list_career2->Weight.'&nbsp; <strong>Height:</strong> '.$list_career2->Height.'<br><strong>Marital status:</strong> '.$Marital.'<br><strong>Military Service:</strong> '.$Military.'</div>
    
    </td>
   <td style="width:300px">
   <div style="font-size: 3em;color: #3989c6;">ข้อมูลการติดต่อ / CONTACT INFO</div> 
    <div style="font-size: 2em;"><strong>Current Address:</strong> '.$list_career2->Address.' <br><strong>Mobile Phone Number:</strong> '.$list_career2->Phone_Number.'<br><strong>E-mail:</strong> '.$list_career2->Email.' <br><strong>Person to notify emergency:</strong> '.$list_career2->Person_to_notify.' <br><strong>Mobile Phone Number:</strong> '.$list_career2->Person_phone_to.'</div>
   </td>
    </tr>
 
</table>
      
     <table>
    <tr>
    <td style="width:620px"> <div style="font-size: 3em;color: #3989c6;">ประวัติการศึกษา 1 / EDUCATIONAL BACKGROUND 1</div> 
    <div style="font-size: 2em;"><strong>Name:</strong> '.$Degree1.'&nbsp;<strong>Institution :</strong> '.$list_career2->Institution1.'&nbsp; <strong>Faculty:</strong> '.$list_career2->Faculty1.'<br><strong>Major:</strong> '.$list_career2->Major1.'&nbsp;<strong>GPA:</strong> '.$list_career2->GPA1.'&nbsp;<strong>From Year:</strong> '.$this->Project_model->GetthaiDateeng($list_career2->From_Year1).'&nbsp; <strong>To Year:</strong> '.$this->Project_model->GetthaiDateeng($list_career2->To_Year1).'</div>
    </td>
    </tr>
    </table>';
    if($list_career2->Degree2!=''){
        
     $html = $html.'
    <table>
    <tr>
    <td style="width:620px"> <div style="font-size: 3em;color: #3989c6;">ประวัติการศึกษา 2 / EDUCATIONAL BACKGROUND 2</div> 
    <div style="font-size: 2em;"><strong>Name:</strong> '.$Degree2.'&nbsp;<strong>Institution :</strong> '.$list_career2->Institution2.'&nbsp; <strong>Faculty:</strong> '.$list_career2->Faculty2.'<br><strong>Major:</strong> '.$list_career2->Major2.'&nbsp;<strong>GPA:</strong> '.$list_career2->GPA2.'&nbsp;<strong>From Year:</strong> '.$this->Project_model->GetthaiDateeng($list_career2->From_Year2).'&nbsp; <strong>To Year:</strong> '.$this->Project_model->GetthaiDateeng($list_career2->To_Year2).'</div>
    </td>
    </tr>
    </table>';
    }
    if($list_career2->Degree3!=''){
    $html = $html.'
         <table>
    <tr>
    <td style="width:620px"> <div style="font-size: 3em;color: #3989c6;">ประวัติการศึกษา 3 / EDUCATIONAL BACKGROUND 3</div> 
    <div style="font-size: 2em;"><strong>Name:</strong> '.$Degree3.'&nbsp;<strong>Institution :</strong> '.$list_career2->Institution3.'&nbsp; <strong>Faculty:</strong> '.$list_career2->Faculty3.'<br><strong>Major:</strong> '.$list_career2->Major3.'&nbsp;<strong>GPA:</strong> '.$list_career2->GPA3.'&nbsp;<strong>From Year:</strong> '.$this->Project_model->GetthaiDateeng($list_career2->From_Year3).'&nbsp; <strong>To Year:</strong> '.$this->Project_model->GetthaiDateeng($list_career2->To_Year3).'</div>
    </td>
    </tr>
    </table>';
    }
    if($list_career2->Company1!=''){
    $html = $html.'
    <table>
    <tr>
    <td style="width:620px"> <div style="font-size: 3em;color: #3989c6;">ประสบการณ์การทำงาน 1 / WORK HISTORY 1</div> 
    <div style="font-size: 2em;"><strong>Company:</strong> '.$list_career2->Company1.'&nbsp;<strong>Position:</strong> '.$list_career2->Positionhistory1.'&nbsp;<strong>Salary:</strong> '.number_format($list_career2->Salary1,2).'&nbsp;<strong>Start Date:</strong> '.$this->Project_model->GetthaiDateeng($list_career2->Start_Datehistory1).'&nbsp;<strong>End Date:</strong> '.$this->Project_model->GetthaiDateeng($list_career2->End_Datehistory1).'<br><strong>Your responsibilities in brief:</strong> '.$list_career2->Your_responsibilities1.'<br><strong>Reason for Leaving:</strong> '.$list_career2->ReasonforLeaving1.' </div>
    </td>
    </tr>
    </table>';
    }
    if($list_career2->Company2!=''){
    $html = $html.'
    <table>
    <tr>
    <td style="width:620px"> <div style="font-size: 3em;color: #3989c6;">ประสบการณ์การทำงาน 2 / WORK HISTORY 2</div> 
    <div style="font-size: 2em;"><strong>Company:</strong> '.$list_career2->Company2.'&nbsp;<strong>Position:</strong> '.$list_career2->Positionhistory2.'&nbsp;<strong>Salary:</strong> '.number_format($list_career2->Salary2,2).'&nbsp;<strong>Start Date:</strong> '.$this->Project_model->GetthaiDateeng($list_career2->Start_Datehistory2).'&nbsp;<strong>End Date:</strong> '.$this->Project_model->GetthaiDateeng($list_career2->End_Datehistory2).'<br><strong>Your responsibilities in brief:</strong> '.$list_career2->Your_responsibilities2.'<br><strong>Reason for Leaving:</strong> '.$list_career2->ReasonforLeaving2.' </div>
    </td>
    </tr>
    </table>';
    }
    if($list_career2->Company3!=''){
    $html = $html.'
         <table>
    <tr>
    <td style="width:620px"> <div style="font-size: 3em;color: #3989c6;">ประสบการณ์การทำงาน 3 / WORK HISTORY 3</div> 
    <div style="font-size: 2em;"><strong>Company:</strong> '.$list_career2->Company3.'&nbsp;<strong>Position:</strong> '.$list_career2->Positionhistory3.'&nbsp;<strong>Salary:</strong> '.number_format($list_career2->Salary3,2).'&nbsp;<strong>Start Date:</strong> '.$this->Project_model->GetthaiDateeng($list_career2->Start_Datehistory3).'&nbsp;<strong>End Date:</strong> '.$this->Project_model->GetthaiDateeng($list_career2->End_Datehistory3).'<br><strong>Your responsibilities in brief:</strong> '.$list_career2->Your_responsibilities3.'<br><strong>Reason for Leaving:</strong> '.$list_career2->ReasonforLeaving3.' </div>
    </td>
    </tr>
    </table>';
    }
    if($list_career2->Training_Course1!=''){
    $html = $html.'
    
    <table>
    <tr>
    <td style="width:620px"> <div style="font-size: 3em;color: #3989c6;">การฝึกอบรม 1/ TRAINING & CERTIFICATION 1</div> 
    <div style="font-size: 2em;"><strong>Training Course:</strong> '.$list_career2->Training_Course1.'&nbsp;<strong>Training Institution:</strong> '.$list_career2->Training_Institution1.'&nbsp;<strong>Date of Training:</strong> '.$this->Project_model->GetthaiDateeng($list_career2->Date_of_Training1).'&nbsp;<strong>Training Duration:</strong> '.$list_career2->Training_Duration1.'</div>
    </td>
    </tr>
    </table>';
    }
    if($list_career2->Training_Course2!=''){
    $html = $html.'
        <table>
    <tr>
    <td style="width:620px"> <div style="font-size: 3em;color: #3989c6;">การฝึกอบรม 2/ TRAINING & CERTIFICATION 2</div> 
    <div style="font-size: 2em;"><strong>Training Course:</strong> '.$list_career2->Training_Course2.'&nbsp;<strong>Training Institution:</strong> '.$list_career2->Training_Institution2.'&nbsp;<strong>Date of Training:</strong> '.$this->Project_model->GetthaiDateeng($list_career2->Date_of_Training2).'&nbsp;<strong>Training Duration:</strong> '.$list_career2->Training_Duration2.'</div>
    </td>
    </tr>
    </table>';
    }
    if($list_career2->Training_Course3!=''){
    $html = $html.'
    <table>
    <tr>
    <td style="width:620px"> <div style="font-size: 3em;color: #3989c6;">การฝึกอบรม 3/ TRAINING & CERTIFICATION 3</div> 
    <div style="font-size: 2em;"><strong>Training Course:</strong> '.$list_career2->Training_Course3.'&nbsp;<strong>Training Institution:</strong> '.$list_career2->Training_Institution3.'&nbsp;<strong>Date of Training:</strong> '.$this->Project_model->GetthaiDateeng($list_career2->Date_of_Training3).'&nbsp;<strong>Training Duration:</strong> '.$list_career2->Training_Duration3.'</div>
    </td>
    </tr>
    </table>';
    }
    if($list_career2->LANGUAGE1!=''){
    $html = $html.'
    <table>
    <tr>
    <td style="width:620px"> <div style="font-size: 3em;color: #3989c6;">ความสามารถด้านภาษา 1 / LANGUAGE SKILLS 1</div> 
    <div style="font-size: 2em;"><strong>LANGUAGE:</strong> '.$list_career2->LANGUAGE1.'<br><strong>Listening:</strong> '.$Listening1.'&nbsp;<strong>Speaking:</strong> '.$Speaking1.'&nbsp;<strong>Reading:</strong> '.$Reading1.'&nbsp;<strong>Writing:</strong> '.$Writing1.'</div>
    </td>
    </tr>
    </table>';
    }
    if($list_career2->LANGUAGE2!=''){
    $html = $html.'
    <table>
    <tr>
    <td style="width:620px"> <div style="font-size: 3em;color: #3989c6;">ความสามารถด้านภาษา 2 / LANGUAGE SKILLS 2</div> 
    <div style="font-size: 2em;"><strong>LANGUAGE:</strong> '.$list_career2->LANGUAGE2.'<br><strong>Listening:</strong> '.$Listening2.'&nbsp;<strong>Speaking:</strong> '.$Speaking2.'&nbsp;<strong>Reading:</strong> '.$Reading2.'&nbsp;<strong>Writing:</strong> '.$Writing2.'</div>
    </td>
    </tr>
    </table>';
    }
    if($list_career2->LANGUAGE3!=''){
    $html = $html.'
    <table>
    <tr>
    <td style="width:620px"> <div style="font-size: 3em;color: #3989c6;">ความสามารถด้านภาษา 3 / LANGUAGE SKILLS 3</div> 
    <div style="font-size: 2em;"><strong>LANGUAGE:</strong> '.$list_career2->LANGUAGE3.'<br><strong>Listening:</strong> '.$Listening3.'&nbsp;<strong>Speaking:</strong> '.$Speaking3.'&nbsp;<strong>Reading:</strong> '.$Reading3.'&nbsp;<strong>Writing:</strong> '.$Writing3.'</div>
    </td>
    </tr>
    </table>';
    }
    $html = $html.'
     <table>
    <tr>
    <td style="width:620px"> <div style="font-size: 3em;color: #3989c6;">ลักษณะงานที่สนใจ / POSITION DESIRED</div> 
    <div style="font-size: 2em;"><strong>Position:</strong> '.$list_career2->Position.'&nbsp;<strong>Type:</strong> '.$Typecareer.'&nbsp;<strong>Expected Salary:</strong> '.number_format($list_career2->Expected_Salary,2).'<br><strong>Start Date:</strong> '.$this->Project_model->GetthaiDateeng($list_career2->Start_Date).'</div>
    </td>
    </tr>
    </table>   

        
               
                
            </main>
            
        </div>
       
    </div>
</div>
	
</body>
</html>';


$pdf->writeHTML($html, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();
ob_clean();
// ---------------------------------------------------------

//Close and output PDF document
//$pdf->Output('doc.pdf', 'I');
//$pdf->Output(__DIR__ .'/career_pdf/career_pdf_'.$dataid.'.pdf', 'F');
$pdf->Output('/home/premiumpro/domains/hatyaipremiumproperty.com/public_html/2019/uploadfile/career_pdf/career_pdf_'.$dataid.'.pdf', 'F');
//============================================================+
// END OF FILE
//============================================================+
