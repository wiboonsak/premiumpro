<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct() {
       parent::__construct();
		
         $this->load->model('User_model');
         $this->load->model('Project_model');
         if($this->session->userdata('weblang')==''){
			 $this->session->set_userdata('weblang', 'en');
		 }
    }
	
	
	//---------------------------------
	public function index()
	{
		$this->load->view('fontend/contact');
	}
                //---------------------- inputName inputEmail inputPhone textareaMessage
	public function sendContactMail(){
		$inputName = $this->input->post('sendername');
		$inputEmail = $this->input->post('emailaddress');
		$inputPhone = $this->input->post('telephone');
		$lineid = $this->input->post('sendersubject');
		$textareaMessage = $this->input->post('sendermessage');

               
		$from_email = $inputEmail;
		$to_email = 'wiboonsak.suw@gmail.com';	
		$email_body = '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<style>
		body{
		font-family: arial; 
		font-size: 11pt; 
	}
	</style>

</head>

<body>
	
	<table width="70%" align="center" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #D5D5D5;">
  <tbody>
    <tr>
      <td align="center" bgcolor="#0179bf" style="color:#FFFFFF;"><h2>Contact from Website</h2>www.hatyaipremiumproperty.com<br><br></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" style="font-size: 16pt; color: #666666; font-weight: 400; padding-left: 25px;">Dear Administrator</td>
    </tr>
    <tr>
      <td align="left" valign="top" style="font-size: 11pt; color: #666666; line-height: 25px; padding-left: 25px;">
		  <p>A customer contacted you from the www.hatyaipremiumproperty.com website. The content below:</p><br></td>
    </tr>
    <tr>
      <td>        
	<table width="90%" border="0" align="center" cellpadding="3" cellspacing="0">
          <tbody>
            <tr>
              <td width="20%" height="40" align="right" bgcolor="#F7F7F7"><strong>Contacts Name:</strong></td>
              <td width="2%" height="40" bgcolor="#F7F7F7">&nbsp;</td>
              <td width="73%" height="40" bgcolor="#F7F7F7">'.$inputName.'</td>
            </tr>
            <tr>
              <td height="40" align="right"><strong>Phone:</strong></td>
              <td height="40">&nbsp;</td>
              <td height="40">'.$inputPhone.'</td>
            </tr>
            <tr>
              <td height="40" align="right" bgcolor="#F7F7F7"><strong>Email:</strong></td>
              <td height="40" bgcolor="#F7F7F7">&nbsp;</td>
              <td height="40" bgcolor="#F7F7F7">'.$inputEmail.'</td>
            </tr>
            <tr>
              <td height="40" align="right" valign="top"><strong>Message:</strong></td>
              <td height="40">&nbsp;</td>
              <td height="40">'.$textareaMessage.'
				</td>
            </tr>
          </tbody>
        </table>
</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="50px">&nbsp;</td>
    </tr>
  </tbody>
</table>

</body>
</html>
';		
		 
		
		$this->email->from($from_email, 'HATYAI PREMIUM PROPERTY'); 
        $this->email->to($to_email);
        $this->email->subject('จดหมายติดต่อจากคุณ '.$inputName .'( HATYAI PREMIUM PROPERTY )'); 
        $this->email->message($email_body); 
        //Send mail 
        if($this->email->send()){ 
            echo " <script>alert('Your message has been send.');"
            . "location.replace('http://hatyaipremiumproperty.com/2019/Contact')"
                    . "</script>";
		

        }else{ 
          echo " <script>alert('Error Send mail.');</script>";
        }		

	}
	
      
	
	
}
