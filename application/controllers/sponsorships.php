<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sponsorships extends CI_Controller {
      public function __construct()
    {
        parent::__construct();
		$this->load->view('widgets/common');
		$this->lg = $this->lang->lang();
    }  
    public function index($title='') {

		if(empty($title))
			$title = 'polo';
		$filename = 'sponsorships/'.$title;		if ( ! file_exists(APPPATH . 'views/'.$filename.'.php') )		{			show_404();		}
		// Set the title
        $newtitle = str_replace('-', ' ', $title);
        $this->template->title = $this->sm->getword('ICM',$this->lg).' - '.$this->sm->getword('Sponsorships',$this->lg);
        $this->template->description = $this->sm->getword('ICM',$this->lg).' - '.$this->sm->getword('Sponsorships',$this->lg);
		$this->template->trigger_meta('keyword',$this->sm->getword('ICM',$this->lg).' '.$this->sm->getword('Sponsorships',$this->lg));
        
        
		
		//language detect
		$lang = $this->lang->lang();

		if($lang == 'ar' || $lang == 'fa' ){//RTL
			
			// Dynamically add a css stylesheet
			$this->template->stylesheet->add('assets/css/rtl/default.css');
			$this->template->stylesheet->add('assets/css/rtl/common.css');
			$this->template->stylesheet->add('assets/css/rtl/uikit.min.css');
			$this->template->stylesheet->add('assets/css/rtl/style.css');
			
			$this->template->stylesheet->add('assets/bootstrap/css/rtl-bootstrap.css');
			
			$this->template->stylesheet->add('assets/css/rtl/styles.css');
			$this->template->stylesheet->add('assets/css/rtl/amd.css');
			$this->template->stylesheet->add('assets/css/rtl/ib.css');
			
		}else{//LTR
			// Dynamically add a css stylesheet
			$this->template->stylesheet->add('assets/css/default.css');
			$this->template->stylesheet->add('assets/css/common.css');
			$this->template->stylesheet->add('assets/css/uikit.min.css');
			$this->template->stylesheet->add('assets/css/style.css');
			
			$this->template->stylesheet->add('assets/bootstrap/css/bootstrap.css');
			$this->template->stylesheet->add('assets/css/styles.css');
			$this->template->stylesheet->add('assets/css/amd.css');
			$this->template->stylesheet->add('assets/css/ib.css');

		}
		$this->template->stylesheet->add('assets/css/overwrite.css');
		$this->template->javascript->add('assets/js/amd.js');
        $this->template->javascript->add('assets/js/ib.js');
		$data	= array();
		$newtitle = str_replace('-', ' ', $title);
		
$breadcrumb['breadcrumb']	= array(0=>array('link'=>'home','title'=>$this->sm->getword('home',$this->lg)),1=>array('link'=>'about_us/sponsorships','title'=>$this->sm->getword('Sponsorships',$this->lg)),2=>array('link'=>'#','title'=> $this->sm->getword(ucfirst($newtitle),$this->lg)));
			//Load breadcrumbs and innerpages  view
			$this->template->content->view('breadcrumb', $breadcrumb);
			$this->template->content->view('sponsorships/'.$title, $data);
        // Set a partial's content
        $this->template->footer = '';
        
        // Publish the template
        $this->template->publish();
    }
}