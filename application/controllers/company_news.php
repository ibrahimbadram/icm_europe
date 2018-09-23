<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class company_news extends CI_Controller {
     public function __construct()
    {

        parent::__construct();

		$this->load->view('widgets/common');
			
		$this->lg = $this->lang->lang();

    } 
    public function index($url_title='') {
		
		// Set the title
		
		$data	= array();
		$check = $this->sm->getRecord('tbl_company_news',array('url_title'=>$url_title));
		if(  count($check) == 0 ){
		redirect(site_url('page_not_found'));
		}
		$data['check'] = $this->sm->getoneRecord('tbl_company_news',array('url_title'=>$url_title));
		
		
        $this->template->title = $this->sm->getword('ICM',$this->lg).' | '.$this->sm->getword('News',$this->lg).' | '.$data['check']['title_'.$this->lg];
		
		
		$lang = $this->lg;
		if($lang == 'ar' || $lang == 'fa' ){//RTL
			$this->template->stylesheet->add('assets/css/rtl/default.css');
			$this->template->stylesheet->add('assets/css/rtl/common.css');
			$this->template->stylesheet->add('assets/bootstrap/css/rtl-bootstrap.css');
			$this->template->stylesheet->add('assets/css/rtl/uikit.min.css');
			$this->template->stylesheet->add('assets/css/rtl/style.css');
			$this->template->stylesheet->add('assets/css/rtl/styles.css');
			$this->template->stylesheet->add('assets/css/rtl/amd.css');
			$this->template->stylesheet->add('assets/css/rtl/ib.css');

		}else{//LTR

			$this->template->stylesheet->add('assets/css/default.css');
			$this->template->stylesheet->add('assets/css/common.css');
			$this->template->stylesheet->add('assets/bootstrap/css/bootstrap.css');
			$this->template->stylesheet->add('assets/css/uikit.min.css');
			$this->template->stylesheet->add('assets/css/style.css');
			$this->template->stylesheet->add('assets/css/styles.css');
			$this->template->stylesheet->add('assets/css/amd.css');
			$this->template->stylesheet->add('assets/css/ib.css');
		}
		
		$this->template->stylesheet->add('assets/css/overwrite.css');
		$this->template->javascript->add('assets/js/amd.js');
        $this->template->javascript->add('assets/js/ib.js');

		
		$data['url_title'] = $url_title;
		
		//$breadcrumb['breadcrumb']	= array(0=>array('link'=>'home','title'=>'Home'),1=>array('link'=>'about_us/news','title'=>'News'), 2=>array('link'=>'#','title'=>$news_title));
		
		$breadcrumb['breadcrumb']	= array(0=>array('link'=>'home','title'=>$this->sm->getword('home',$this->lg)),1=>array('link'=>'about_us/news','title'=>$this->sm->getword('Company News',$this->lg)),2=>array('link'=>'#','title'=>''));
		
		
		//Load breadcrumbs and innerpages  view
		$this->template->content->view('breadcrumb', $breadcrumb);
		//$this->template->content->view('news/'.$page, $data);
		$this->template->content->view('company_news/company_news_details', $data);
		// Set a partial's content
        $this->template->footer = '';
        
        // Publish the template
        $this->template->publish();
	}

}