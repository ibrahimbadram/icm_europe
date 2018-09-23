<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pages extends CI_Controller {
           public function __construct()
    {
        parent::__construct();
		$this->load->view('widgets/common');
		$this->lg = $this->lang->lang();
    }  
    public function index($title='') {

		if(empty($title))
			$title = 'terms_and_conditions';
			
			
		
		// Set the title
        $newtitle = str_replace('_', ' ', ucfirst($title));
        if($title == 'AML_KYC_policy'){
			$newtitle = 'AML & KYC Policy';
		}
		 if($title == 'terms_and_conditions_bonuses'){
			$newtitle = 'Terms and Conditions';
		}
		
		$filename = 'other_pages/'.$title;
		if ( ! file_exists(APPPATH . 'views/'.$filename.'.php'))
		{
			show_404();
		}
		
        $this->template->title = $this->sm->getword('ICM',$this->lg).' - '.$this->sm->getword($newtitle,$this->lg);

        $this->template->description = $this->sm->getword($newtitle,$this->lg);

		$this->template->trigger_meta('keyword',$this->sm->getword($newtitle,$this->lg));
		
		//language detect
		$lang = $this->lang->lang();

		if($lang == 'ar' || $lang == 'fa' ){//RTL
			$this->template->stylesheet->add('assets/css/rtl/default.css');
			$this->template->stylesheet->add('assets/css/rtl/common.css');
			$this->template->stylesheet->add('assets/bootstrap/css/rtl-bootstrap.css');
			$this->template->stylesheet->add('assets/css/rtl/uikit.min.css');
			$this->template->stylesheet->add('assets/css/rtl/style.css');
			$this->template->stylesheet->add('assets/css/rtl/amd.css');
			$this->template->stylesheet->add('assets/css/rtl/ib.css');
			
		}else{//LTR*/
			$this->template->stylesheet->add('assets/css/default.css');
			$this->template->stylesheet->add('assets/css/common.css');
			$this->template->stylesheet->add('assets/bootstrap/css/bootstrap.css');
			$this->template->stylesheet->add('assets/css/uikit.min.css');
			$this->template->stylesheet->add('assets/css/style.css');
			$this->template->stylesheet->add('assets/css/amd.css');
			$this->template->stylesheet->add('assets/css/ib.css');

		}

		$this->template->stylesheet->add('assets/css/overwrite.css');
		$this->template->javascript->add('assets/js/amd.js');
        $this->template->javascript->add('assets/js/ib.js');

		$page   = 'terms_and_conditions';
		$data	= array();

		if($title == 'terms_and_conditions')
		{//Load Terms and conditions view
			
			$page   = 'terms_and_conditions';
			
			//Load breadcrumbs and innerpages  view
			$breadcrumb['breadcrumb']	= array(0=>array('link'=>'home','title'=>$this->sm->getword('home',$this->lg)),1=>array('link'=>'#','title'=>$this->sm->getword('Terms and Conditions',$this->lg)));
			$this->template->content->view('breadcrumb', $breadcrumb);
			
			//Load innerpages  view
			$this->template->content->view('other_pages/'.$page, $data);
		}
		else if($title == 'risk_warning')
		{//Load Risk warning view
			
			$page = 'risk_warning';
			
			//Load breadcrumbs and innerpages  view
			$breadcrumb['breadcrumb']	= array(0=>array('link'=>'home','title'=>$this->sm->getword('home',$this->lg)),1=>array('link'=>'#','title'=>$this->sm->getword('Risk Warning',$this->lg)));
			$this->template->content->view('breadcrumb', $breadcrumb);
			
			//Load innerpages  view
			$this->template->content->view('other_pages/'.$page, $data);
			
		}
		else if($title == 'order_execution_policy')
		{//Load Order execution Policy view
			
			$page = 'order_execution_policy';
			
			//Load breadcrumbs and innerpages  view
			$breadcrumb['breadcrumb']	= array(0=>array('link'=>'home','title'=>$this->sm->getword('home',$this->lg)),1=>array('link'=>'#','title'=>$this->sm->getword('Order Execution Policy',$this->lg)));
			$this->template->content->view('breadcrumb', $breadcrumb);
			
			//Load innerpages  view
			$this->template->content->view('other_pages/'.$page, $data);
			
		}
		else if($title == 'privacy_policy')
		{//Load Privacy Policy view
			
			$page = 'privacy_policy';
			
			//Load breadcrumbs and innerpages  view
			$breadcrumb['breadcrumb']	= array(0=>array('link'=>'home','title'=>$this->sm->getword('home',$this->lg)),1=>array('link'=>'#','title'=>$this->sm->getword('Privacy Policy',$this->lg)));
			$this->template->content->view('breadcrumb', $breadcrumb);

			//Load innerpages  view
			$this->template->content->view('other_pages/'.$page, $data);
		}
        else if($title == 'AML_KYC_policy')
		{//Load AML_KYC_policy view
			
			$page = 'AML_KYC_policy';
			
			//Load breadcrumbs and innerpages  view
			$breadcrumb['breadcrumb']	= array(0=>array('link'=>'home','title'=>$this->sm->getword('home',$this->lg)),1=>array('link'=>'#','title'=>$this->sm->getword('AML & KYC Policy',$this->lg)));
			$this->template->content->view('breadcrumb', $breadcrumb);
			
			//Load innerpages  view
			$this->template->content->view('other_pages/'.$page, $data);
		}
        else if($title == 'terms_and_conditions_bonuses')
		{//Load AML_KYC_policy view
			
			$page = 'terms_and_conditions_bonuses';
			
			//Load breadcrumbs and innerpages  view
			$breadcrumb['breadcrumb']	= array(0=>array('link'=>'home','title'=>$this->sm->getword('home',$this->lg)),1=>array('link'=>'#','title'=>$this->sm->getword('Terms and Conditions',$this->lg)));
			$this->template->content->view('breadcrumb', $breadcrumb);
			
			//Load innerpages  view
			$this->template->content->view('other_pages/'.$page, $data);
		}
       
        // Set a partial's content
        $this->template->footer = '';
        
        // Publish the template
        $this->template->publish();
    }
}