<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Secure_account_opening extends CI_Controller {
      public function __construct()
    {
        parent::__construct();
		$this->load->view('widgets/common');
		$this->lg = $this->lang->lang();
    }  
    public function index($title='') {

		if(empty($title))
			$title = 'secure account opening';

		// Set the title
        $this->template->title = $this->sm->getword('ICM',$this->lg).'- '.ucfirst($title);
        
        // Dynamically add a css stylesheet
        $this->template->stylesheet->add('assets/css/default.css');
        $this->template->stylesheet->add('assets/css/common.css');
		$this->template->stylesheet->add('assets/css/uikit.min.css');
        $this->template->stylesheet->add('assets/css/style.css');
        $this->template->javascript->add('assets/js/amd.js');
		$this->template->stylesheet->add('assets/bootstrap/css/bootstrap.css');
		$this->template->stylesheet->add('assets/css/overwrite.css');
		$this->template->stylesheet->add('assets/css/styles.css');
		$this->template->stylesheet->add('assets/css/amd.css');
        $this->template->stylesheet->add('assets/css/ib.css');
		
        $this->template->javascript->add('assets/js/ib.js');

		$data	= array();
		
			$breadcrumb['breadcrumb']	= array(0=>array('link'=>'home','title'=>'Home'),1=>array('link'=>'about_us','title'=>'About Us'),2=>array('link'=>'#','title'=>'secure account opening'));
			$page = 'regulations';
			
			//add form wizard scripts and css
			$this->template->stylesheet->add('assets/css/jquery.steps.css');
			//$this->template->stylesheet->add('assets/css/bootstrap.min.css');
			//$this->template->javascript->add('assets/js/jquery-steps/modernizr-2.6.2.min.js');
			$this->template->javascript->add('assets/js/jquery-steps/jquery.cookie-1.3.1.js');
			$this->template->javascript->add('assets/js/jquery-steps/jquery.steps.min.js');
			$this->template->javascript->add('assets/js/jquery-steps/Examples?v=szy5AsAuXKpEfwFGRimEy2MhBBlHea801wFJod1pspE1');
			
			$this->template->javascript->add('assets/js/regulations.js');
		
			//Load breadcrumbs and innerpages  view
			$this->template->content->view('en/breadcrumb', $breadcrumb);
			$this->template->content->view('en/about_us/'.$page, $data);
			
	
        // Set a partial's content
        $this->template->footer = '';
        
        // Publish the template
        $this->template->publish();
    }
	
}