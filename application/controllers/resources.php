<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Resources extends CI_Controller {
      public function __construct()
    {
        parent::__construct();
		$this->load->view('widgets/common');
		$this->lg = $this->lang->lang();
    }  
    public function index($title='') {

		if(empty($title))
			$title = 'market_news';

		// Set the title
        $newtitle = str_replace('_', ' ', ucfirst($title));
        $this->template->title = $this->sm->getword('ICM',$this->lg).' - '.$this->sm->getword('Resources',$this->lg).' '.$this->sm->getword('Resources',$this->lg).' '.$this->sm->getword($newtitle,$this->lg);        $this->template->description = $this->sm->getword('ICM',$this->lg).' - '.$this->sm->getword('Resources',$this->lg).' '.$this->sm->getword('Resources',$this->lg).' '.$this->sm->getword($newtitle,$this->lg);		$this->template->trigger_meta('keyword',$this->sm->getword('Resources',$this->lg).' '.$this->sm->getword('Resources',$this->lg).' '.$this->sm->getword($newtitle,$this->lg));
        
        // Dynamically add a css stylesheet
       /* $this->template->stylesheet->add('assets/css/default.css');
        $this->template->stylesheet->add('assets/css/common.css');
		$this->template->stylesheet->add('assets/css/uikit.min.css');
        $this->template->stylesheet->add('assets/css/style.css');
        $this->template->javascript->add('assets/js/amd.js');
		$this->template->stylesheet->add('assets/bootstrap/css/bootstrap.css');
		$this->template->stylesheet->add('assets/css/overwrite.css');
		$this->template->stylesheet->add('assets/css/amd.css');
        $this->template->stylesheet->add('assets/css/ib.css');
        $this->template->javascript->add('assets/js/ib.js');*/

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

		$page   = 'market_news';
		$data	= array();
		$this->template->javascript->add('assets/js/uikit.min.js');
		$this->template->javascript->add('assets/js/uikit-icons.min.js');
		if($lang == 'ar' || $lang == 'fa' ){//RTL
			$this->template->stylesheet->add('assets/css/rtl/common-inner.css');
		}else{//LTR
			$this->template->stylesheet->add('assets/css/common-inner.css');
		}
		
		$this->template->stylesheet->add('assets/css/overwrite.css');
		$this->template->javascript->add('assets/js/amd.js');
        $this->template->javascript->add('assets/js/ib.js');		$page = $title;		$breadcrumb['breadcrumb'] = array(0=>array('link'=>'home','title'=>$this->sm->getword('home',$this->lg)),1=>array('link'=>'resources','title'=>$this->sm->getword('Resources',$this->lg)),2=>array('link'=>'#','title'=>$this->sm->getword($newtitle,$this->lg)));				$this->template->content->view('breadcrumb', $breadcrumb);		$this->template->content->view('resources/'.$page, $data);
		
        // Set a partial's content
        $this->template->footer = '';
       
        // Publish the template
        $this->template->publish();
    }
	
	public function getMarketNewsDetails($id=1){
		$this->lg = $this->lang->lang();
		if(empty($id))
			$title = 1;

		// Set the title
        $this->template->title = $this->sm->getword('ICM',$this->lg).' - '.$this->sm->getword('Market News',$this->lg);
        
        // Dynamically add a css stylesheet
        $this->template->stylesheet->add('assets/css/default.css');
        $this->template->stylesheet->add('assets/css/common.css');
        $this->template->stylesheet->add('assets/css/amd.css');
		$this->template->stylesheet->add('assets/css/uikit.min.css');
        $this->template->stylesheet->add('assets/css/style.css');
        $this->template->javascript->add('assets/js/amd.js');
		
		$this->template->stylesheet->add('assets/bootstrap/css/bootstrap.css');
		$this->template->stylesheet->add('assets/css/overwrite.css');
		$this->template->stylesheet->add('assets/css/styles.css');
        $this->template->stylesheet->add('assets/css/ib.css');
		
        $this->template->javascript->add('assets/js/ib.js');

		$news_title   = $this->sm->getcontent('resources/market_news/'.$id,'title_'.$this->lg);
		
		$data	= array();
		$data['title'] = $news_title;
		$data['desc'] = $this->sm->getcontent('resources/market_news/'.$id,'description_'.$this->lg);
		$data['img'] = $this->sm->getcontent('resources/market_news/'.$id,'image');		$breadcrumb['breadcrumb']	= array(0=>array('link'=>'home','title'=>'Home'),1=>array('link'=>'resources/market_news','title'=>$this->sm->getword('Market News',$this->lg)));

		//Load breadcrumbs and innerpages  view
		$this->template->content->view('breadcrumb', $breadcrumb);
		$this->template->content->view('resources/market_news_details', $data);
		// Set a partial's content
        $this->template->footer = '';
        
        // Publish the template
        $this->template->publish();
	}
}