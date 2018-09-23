<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class About_us extends CI_Controller {
     public function __construct()
    {

        parent::__construct();

		$this->load->view('widgets/common');
			
		$this->lg = $this->lang->lang();

    } 
    public function index($title='') {
		
		if(empty($title))
			$title = 'profile';


       $filename = 'about_us/'.$title;
		if ( ! file_exists(APPPATH . 'views/'.$filename.'.php'))
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

		$page   = 'profile';
		$data	= array();
	
	
			
		if($title == 'profile')
		{
			$page = 'profile';
			
			//Load company profile view
			$breadcrumb['breadcrumb']	= array(0=>array('link'=>'home','title'=>$this->sm->getword('home',$this->lg)),1=>array('link'=>'about_us','title'=>$this->sm->getword('About Us',$this->lg)),2=>array('link'=>'#','title'=>$this->sm->getword('Profile',$this->lg)));
			
			
			
			// Set the title
			$this->template->title = $this->sm->getword('ICM',$this->lg).' - '.$this->sm->getword('Profile',$this->lg);
			
			//Load breadcrumbs and innerpages  view
			$this->template->content->view('breadcrumb', $breadcrumb);
			$this->template->content->view('about_us/'.$page, $data);
		}
		else if($title == 'regulations')
		{//Load regulations view
			$breadcrumb['breadcrumb']	= array(0=>array('link'=>'home','title'=>$this->sm->getword('home',$this->lg)),1=>array('link'=>'about_us','title'=>$this->sm->getword('About Us',$this->lg)),2=>array('link'=>'#','title'=>$this->sm->getword('Regulations',$this->lg)));
			
			$page = 'regulations';
			
			//add form wizard scripts and css
			$this->template->stylesheet->add('assets/css/jquery.steps.css');
			//$this->template->stylesheet->add('assets/css/bootstrap.min.css');
			$this->template->javascript->add('assets/js/jquery-steps/modernizr-2.6.2.min.js');
			$this->template->javascript->add('assets/js/jquery-steps/jquery.cookie-1.3.1.js');
			$this->template->javascript->add('assets/js/jquery-steps/jquery.steps.min.js');
			$this->template->javascript->add('assets/js/jquery-steps/examples.js');
			
			if($lang == 'ar' || $lang == 'fa' ){//RTL
				
			}else{
				
			}
			
			$this->template->javascript->add('assets/js/regulations.js');
			
			// Set the title
			$this->template->title = $this->sm->getword('ICM',$this->lg).' - '.$this->sm->getword('Regulations',$this->lg);
			
			//get all countries for country table
			$data['countries'] = $this->sm->getAllRecords('country');
			
			
			//Load breadcrumbs and innerpages  view
			$this->template->content->view('breadcrumb', $breadcrumb);
			$this->template->content->view('about_us/'.$page, $data);
			
		}
		else if($title == 'advantages')
		{//Load advantages view
			$breadcrumb['breadcrumb']	= array(0=>array('link'=>'home','title'=>$this->sm->getword('home',$this->lg)),1=>array('link'=>'about_us','title'=>$this->sm->getword('About Us',$this->lg)),2=>array('link'=>'#','title'=>$this->sm->getword('Advantages',$this->lg)));
			
			$page = 'advantages';
			
			// Set the title
			$this->template->title = $this->sm->getword('ICM',$this->lg).' - '.$this->sm->getword('Advantages',$this->lg);
			
			//Load breadcrumbs and innerpages  view
			$this->template->content->view('breadcrumb', $breadcrumb);
			$this->template->content->view('about_us/'.$page, $data);
		}
        else if($title == 'careers')
		{//Load careers view
			$breadcrumb['breadcrumb']	= array(0=>array('link'=>'home','title'=>$this->sm->getword('home',$this->lg)),1=>array('link'=>'about_us','title'=>$this->sm->getword('About Us',$this->lg)),2=>array('link'=>'#','title'=>$this->sm->getword('Careers',$this->lg)));
			
			$page = 'careers';
			
			// Set the title
			$this->template->title = $this->sm->getword('ICM',$this->lg).' - '.$this->sm->getword('Careers',$this->lg);
			
			//Load breadcrumbs and innerpages  view
			$this->template->content->view('breadcrumb', $breadcrumb);
			$this->template->content->view('about_us/'.$page, $data);
		}
       else if($title == 'awards')
		{//Load awards view
			$breadcrumb['breadcrumb']	= array(0=>array('link'=>'home','title'=>$this->sm->getword('home',$this->lg)),1=>array('link'=>'about_us','title'=>$this->sm->getword('About Us',$this->lg)),2=>array('link'=>'#','title'=>$this->sm->getword('Awards',$this->lg)));
			
			$page = 'awards';

			// Set the title
			$this->template->title = $this->sm->getword('ICM',$this->lg).' - '.$this->sm->getword('Awards',$this->lg);
			
			//Load breadcrumbs and innerpages  view
			$this->template->content->view('breadcrumb', $breadcrumb);
			$this->template->content->view('about_us/'.$page, $data);
		}
		else if($title == 'contact_us')
		{//Load contact_us view
			$breadcrumb['breadcrumb']	= array(0=>array('link'=>'home','title'=>$this->sm->getword('home',$this->lg)),1=>array('link'=>'about_us','title'=>$this->sm->getword('About Us',$this->lg)),2=>array('link'=>'#','title'=>$this->sm->getword('Contact Us',$this->lg)));
			
			$page = $title;
			
			// Set the title
			$this->template->title = $this->sm->getword('ICM',$this->lg).' - '.$this->sm->getword('Contact Us',$this->lg);
			
			//Load breadcrumbs and innerpages  view
			$this->template->content->view('breadcrumb', $breadcrumb);
			$this->template->content->view('about_us/'.$page, $data);
		}
		else if($title == 'news')
		{//Load news view
			$breadcrumb['breadcrumb']	= array(0=>array('link'=>'home','title'=>$this->sm->getword('home',$this->lg)),1=>array('link'=>'about_us','title'=>$this->sm->getword('About Us',$this->lg)),2=>array('link'=>'#','title'=>$this->sm->getword('News',$this->lg)));
			
			$page = 'news';
			
			// Set the title
			$this->template->title = $this->sm->getword('ICM',$this->lg).' - '.$this->sm->getword('News',$this->lg);
			
			$this->template->javascript->add('assets/js/uikit.min.js');
			$this->template->javascript->add('assets/js/uikit-icons.min.js');
			
			//Load breadcrumbs and innerpages  view
			$this->template->content->view('breadcrumb', $breadcrumb);
			$this->template->content->view('about_us/'.$page, $data);
		}
		else if($title == 'sr')
		{//Load sr view
			$breadcrumb['breadcrumb']	= array(0=>array('link'=>'home','title'=>$this->sm->getword('home',$this->lg)),1=>array('link'=>'about_us','title'=>$this->sm->getword('About Us',$this->lg)),2=>array('link'=>'#','title'=>$this->sm->getword('CSR',$this->lg)));
			
			$page = 'sr';
			
			// Set the title
			$this->template->title = $this->sm->getword('ICM',$this->lg).' - '.$this->sm->getword('CSR',$this->lg);
			
			$this->template->stylesheet->add('assets/css/common-inner.css');

			//Load breadcrumbs and innerpages  view
			$this->template->content->view('breadcrumb', $breadcrumb);
			$this->template->content->view('about_us/'.$page, $data);
		}
		else if($title == 'sponsorships')
		{//Load sponsorships view
			$breadcrumb['breadcrumb']	= array(0=>array('link'=>'home','title'=>$this->sm->getword('home',$this->lg)),1=>array('link'=>'about_us','title'=>$this->sm->getword('About Us',$this->lg)),2=>array('link'=>'#','title'=>$this->sm->getword('Sponsorships',$this->lg)));
			
			$page = 'sponsorships';
			
			// Set the title
			$this->template->title = $this->sm->getword('ICM',$this->lg).' - '.$this->sm->getword('Sponsorships',$this->lg);
			
			//Load breadcrumbs and innerpages  view
			$this->template->content->view('breadcrumb', $breadcrumb);
			$this->template->content->view('about_us/'.$page, $data);
		}
		else if($title == 'events')
		{//Load events view
			//Load events view
			$breadcrumb['breadcrumb']	= array(0=>array('link'=>'home','title'=>$this->sm->getword('home',$this->lg)),1=>array('link'=>'about_us','title'=>$this->sm->getword('About Us',$this->lg)),2=>array('link'=>'#','title'=>$this->sm->getword('Events',$this->lg)));
			
			$page = 'events';

			// Set the title
			$this->template->title = $this->sm->getword('ICM',$this->lg).' - '.$this->sm->getword('Events',$this->lg);

			//Load breadcrumbs and innerpages  view
			$this->template->content->view('breadcrumb', $breadcrumb);
			$this->template->content->view('about_us/'.$page, $data);

		}

        // Set a partial's content
        $this->template->footer = '';
        
        // Publish the template
        $this->template->publish();
    }
	
	public function getNewsDetails($id=0){
		if(empty($id))
			$title = 1;
		
		// Set the title
        $this->template->title = $this->sm->getword('ICM',$this->lg).' - '.$this->sm->getword('News',$this->lg);
        
        // Dynamically add a css stylesheet
      /*  $this->template->stylesheet->add('assets/css/default.css');
        $this->template->stylesheet->add('assets/css/common.css');
        $this->template->stylesheet->add('assets/css/amd.css');
		$this->template->stylesheet->add('assets/css/uikit.min.css');
        $this->template->stylesheet->add('assets/css/style.css');
        $this->template->javascript->add('assets/js/amd.js');
		
		$this->template->stylesheet->add('assets/bootstrap/css/bootstrap.css');
		$this->template->stylesheet->add('assets/css/overwrite.css');
		$this->template->stylesheet->add('assets/css/styles.css');
        $this->template->stylesheet->add('assets/css/ib.css');
		
        $this->template->javascript->add('assets/js/ib.js');		*/
		
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

		$page   = 'news_'.$id;
		
		
		if(($id !=1 && $id !=2 && $id !=3 && $id !=4 && $id !=5) || (!is_numeric($id)) ){
			redirect('page_not_found');
		}
		
		
		if($id==6){
			$news_title = 'For the Third Consecutive Year';
		}
		elseif($id==5){
			$news_title = 'US indices Tumble on Trade Tension, Dollar Recovers';
		}
		elseif($id==4){
			$news_title = 'Dollar Retreats from 11-Month high post BOE, OPEC in Focus';
		}
		elseif($id==3){
			$news_title = 'Dollar Holds Steady near 11-month high, Pound Falls ahead of BOE';
		}
		elseif($id==2){
			$news_title = 'Dollar Index soars to an eleven-month high, US indices recover';
		}
		elseif($id==1){
			$news_title = 'Global Stocks Drop on US-China Trade War, Dollar Down';
		}
		$data	= array();
		$data['id'] = $id;
		
		//$breadcrumb['breadcrumb']	= array(0=>array('link'=>'home','title'=>'Home'),1=>array('link'=>'about_us/news','title'=>'News'), 2=>array('link'=>'#','title'=>$news_title));
		
		$breadcrumb['breadcrumb']	= array(0=>array('link'=>'home','title'=>$this->sm->getword('home',$this->lg)),1=>array('link'=>'resources/market_news','title'=>$this->sm->getword('Market News',$this->lg)),2=>array('link'=>'#','title'=>''));
		
		
		//Load breadcrumbs and innerpages  view
		$this->template->content->view('breadcrumb', $breadcrumb);
		//$this->template->content->view('news/'.$page, $data);
		$this->template->content->view('news/news_details', $data);
		// Set a partial's content
        $this->template->footer = '';
        
        // Publish the template
        $this->template->publish();
	}
}