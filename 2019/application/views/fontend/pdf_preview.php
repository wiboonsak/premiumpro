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
$pdf->SetTitle('Akira Speedboat - Transport Booking ID # '.$dataid.'');
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


$pdf->AddPage('P', 'A4');
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
		
		$html = '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Booking Transport || Akira Speedboat</title>
	
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	
	

<link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">

</head>

<body style="margin: 0;font-size: 8px;font-weight: 400;line-height: 1.5;color: #212529;text-align: left;background-color: #fff;">
	

<div style="padding: 30px;">

    
    <div style="position: relative;background-color: #FFF;min-height: 680px;padding: 15px;overflow: auto!important;">
        <div style="100%">
            <header style="padding: 10px 0;margin-bottom: 20px;border-bottom: 1px solid #3989c6;">
            <table >
    <tr >
    <td style="width:380px"> <div style="font-size: 3em;color: #3989c6;">ข้อมูลส่วนตัว / PERSONAL</div> 
    <div style="font-size: 2em;"><strong>Name:</strong> '.$titlename.' '.$list_career2->First_name.' '.$list_career2->Last_name.'<br><strong>National ID card no.:</strong> '.$list_career2->Card_no.'<br><strong>Date of birth:</strong> '.$this->Project_model->GetthaiDateeng($list_career2->Birth_day).' &nbsp; <strong>Age:</strong> '.$list_career2->Age.' &nbsp; <strong>Gender:</strong> '.$gender.'<br>strong>Religion:</strong> '.$list_career2->Religion.' &nbsp; strong>Race:</strong> '.$list_career2->Race.' &nbsp; strong>Nationality:</strong> '.$list_career2->Nationality.'<br>strong>Weight:</strong> '.$list_career2->Weight.' &nbsp; strong>Height:</strong> '.$list_career2->Height.'<br>strong>Marital status:</strong> '.$list_career2->Marital_status.' &nbsp; strong>Military Service:</strong> '.$list_career2->Military_Service.'</div>
    
    </td>
   <td style="width:380px">
   </td>
    </tr>
 
</table>
                
            </header>
 
                <div style="font-size: 3em;margin-bottom: 50px;">Thank you!</div>
                <div style="padding-left: 6px;border-left: 6px solid #3989c6;">
                   &nbsp;&nbsp; <div style="font-size: 2em;">NOTICE:<br>The Price included Ferry ticket and Transfer, Please check in before 30 minutes.</div>
                </div>
            </main>
            <br>
            <footer style="width: 650px;text-align: center!important;color: #777;border-top: 1px solid #aaa;padding: 8px 0;">
                <p style="font-size: 2em;">&nbsp;&nbsp;This booking was created on a computer and is valid without the signature and seal.</p>
            </footer>
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
$pdf->Output('booking_pdf_'.$dataid.'.pdf', 'I');
//$pdf->Output(__DIR__ .'/transportPDF/booking_pdf_'.$bookingid.'.pdf', 'F');
//============================================================+
// END OF FILE
//============================================================+
