<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gallery extends CI_Controller {
      public function __construct()
    {
        parent::__construct();
		$this->load->view('widgets/common');
		$this->lg = $this->lang->lang();
    }  
    public function index($cat="") {
		//if(empty($cat))
			//$cat = 'Fulham_4-2_Burnley';

		//get the url title and search the category from the database
		$category_record = $this->sm->getRecord('tbl_category_gal', array('url_title'=>$cat));
		
		if ( ! $category_record)		
		{			
		show_404();		
		}
		
		
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
			
		}else{//LTR
			$this->template->stylesheet->add('assets/css/default.css');
			$this->template->stylesheet->add('assets/css/common.css');
			$this->template->stylesheet->add('assets/bootstrap/css/bootstrap.css');
			$this->template->stylesheet->add('assets/css/uikit.min.css');
			$this->template->stylesheet->add('assets/css/style.css');
			$this->template->stylesheet->add('assets/css/amd.css');
			$this->template->stylesheet->add('assets/css/ib.css');

		}

		
		$data	= array();
		
		
		if($lang == 'ar' || $lang == 'fa' ){//RTL
			$this->template->stylesheet->add('assets/css/rtl/common-inner.css');
		}else{//LTR
			$this->template->stylesheet->add('assets/css/common-inner.css');
		}
		
		$this->template->stylesheet->add('assets/css/overwrite.css');
		$this->template->javascript->add('assets/js/amd.js');
		$this->template->stylesheet->add('assets/dist/css/lightbox.css');
        $this->template->javascript->add('assets/dist/js/lightbox.js');	
		
        $this->template->javascript->add('assets/js/ib.js');		
		
		$title_lg = 'title_'.$this->lg;
		
		$breadcrumb['breadcrumb'] = array(0=>array('link'=>'home','title'=>$this->sm->getword('home',$this->lg)),1=>array('link'=>'#','title'=>$category_record->$title_lg));
		
		//get the gallery related to the selected category
		$data['gallery'] 	= $this->sm->getAllrecords_nowebsite('tbl_gallery', array('category_gal'=>$category_record->id));
		$data['category'] 	= $category_record;
		
		$this->template->content->view('breadcrumb', $breadcrumb);		
		$this->template->content->view('about_us/gallery/index', $data);
        // Set a partial's content
        $this->template->footer = '';
       
        // Publish the template
        $this->template->publish();
    }
	
	
}