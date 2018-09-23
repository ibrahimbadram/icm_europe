<?php

if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Landing_pages extends CI_Controller {

 	    public function __construct()

    {
        parent::__construct();
		$this->load->view('widgets/common');
		$this->lg = $this->lang->lang();

    }   

    public function index($title='') {

	if ( ! file_exists(APPPATH . 'views/landing_pages/'.$title.'.php'))		{			show_404();		}
		$lang = $this->lang->lang();
        $data = array();
        $this->load->view('landing_pages/'.$title, $data);
    }
	

	
    public function signup($title='') {

		$finalresult = '';

if ( trim($_POST['telephone']) != '' && substr($_POST['telephone'], 0, 1) === '+') {
} else {
$finalresult = '<h4 style="color:red"><img src="assets/registration/images/landing/error.gif" /> Check your telephone number please</h4>';
echo $finalresult;
exit;
}
if ( trim($_POST['email']) != '' && $this->checkEmail($_POST['email'])) {
} else {
$finalresult = '<h4 style="color:red"><img src="assets/registration/images/landing/error.gif" /> Check your email please</h4>';
echo $finalresult;
exit;	
}
if ( trim($_POST['country']) != '' ) {
} else {
$finalresult = '<h4 style="color:red"><img src="assets/registration/images/landing/error.gif" /> Check your country please</h4>';
echo $finalresult;
exit;	
}
if ( trim($_POST['name']) != '' ) {
} else {
$finalresult = '<h4 style="color:red"><img src="assets/registration/images/landing/error.gif" /> Check your country please</h4>';
echo $finalresult;
exit;	
}

if ( trim($_POST['captcha']) != '' ) {
} else {
$finalresult = '<h4 style="color:red"><img src="assets/registration/images/landing/error.gif" /> Check captcha please</h4>';
echo $finalresult;
exit;	
}
$contries = $this->sm->getRecord('registration',array('email'=>$_POST['email']));
if ( count($contries) > 0 ) {
$finalresult = '<h4 style="color:red"><img src="assets/registration/images/landing/error.gif" /> This email already registered</h4>';
echo $finalresult;
exit;
}
 else{
//echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
//$sql = "INSERT INTO `registration` (`name`,`email`,`telephone`,`country`,`created_date`,`address`) VALUES ('".$_POST['name']."','".$_POST['email']."','".$_POST['telephone']."','".$_POST['country']."','".date('Y-m-d H:i:s')."','".$_POST['address']."' )";
$data['name']=$_POST['name'];
$data['email']=$_POST['email'];
$data['phone']=$_POST['telephone'];
$data['country']=$_POST['country'];
$data['`created_date`']= date('Y-m-d H:i:s');
$data['address']='';
$insert = $this->db->insert('registration',$data);
if ( $insert  ) {
$finalresult = 1;
}
else {
$finalresult = '<h4 style="color:red"><img src="assets/registration/images/landing/error.png" /> Try again please</h4>';
}


echo $finalresult;

    }
	
	function checkEmail($email) {
	if ( strpos($email, '@') !== false ) {
		$split = explode('@', $email);
		return (strpos($split['1'], '.') !== false ? true : false);
	}
	else {
		return false;
	}
}
	

}