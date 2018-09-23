<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Platforms extends CI_Controller {
       public function __construct()
    {
        parent::__construct();
		$this->load->view('widgets/common');
		$this->lg = $this->lang->lang();
    }   
    public function index($title='') {

		if(empty($title))
			$title = 'mt4_desktop';
		// Set the title
        $newtitle = str_replace('_', ' ', ucfirst($title));				/*$exploaded_title = explode('_', trim($title));						if(!empty($exploaded_title)){			if(array_key_exists(1, $exploaded_title)){				$filename = 'platforms/'.$exploaded_title[0].'/'.$exploaded_title[1];				if ( ! file_exists(APPPATH . 'views/'.$filename.'.php') )				{					show_404();				}			}else{				$filename = 'platforms/'.$exploaded_title[0];				if ( ! file_exists(APPPATH . 'views/'.$filename.'.php') )				{					show_404();				}			}									}*/		
        $this->template->title = $this->sm->getword('ICM',$this->lg).' -  '.$this->sm->getword($newtitle,$this->lg);
        $this->template->description = $this->sm->getword('ICM',$this->lg).' - '.$this->sm->getword($newtitle,$this->lg);
		$this->template->trigger_meta('keyword',$this->sm->getword('ICM',$this->lg).' - '.$this->sm->getword($newtitle,$this->lg));
		
        
		
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


		$page   		= 'MT4/desktop';
		$data			= array();
		$data['lang'] 	= $lang;


		if($title == 'mt4_desktop')
		{//Load MT4 desktop view
			$breadcrumb['breadcrumb']	= array(0=>array('link'=>'home','title'=>$this->sm->getword('home',$this->lg)),1=>array('link'=>'platforms','title'=>$this->sm->getword('platforms',$this->lg)),2=>array('link'=>'#','title'=>$this->sm->getword('MT4 Desktop',$this->lg)));
			$page   = 'MT4/desktop';
			//Load breadcrumbs and innerpages  view
			$this->template->content->view('breadcrumb', $breadcrumb);
			$this->template->content->view('platforms/'.$page, $data);
		}
		else if($title == 'mt4_all')
		{//Load MT4 web view
			$breadcrumb['breadcrumb']	= array(0=>array('link'=>'home','title'=>$this->sm->getword('home',$this->lg)),1=>array('link'=>'platforms','title'=>$this->sm->getword('platforms',$this->lg)),2=>array('link'=>'#','title'=>$this->sm->getword('mt4 all',$this->lg)));
			$page = 'MT4/all';

			$this->template->javascript->add('assets/js/uikit.min.js');
			$this->template->javascript->add('assets/js/uikit-icons.min.js');
			
			if($lang == 'ar' || $lang == 'fa' ){//RTL
				$this->template->stylesheet->add('assets/css/rtl/common-inner.css');
			}else{//LTR
				$this->template->stylesheet->add('assets/css/common-inner.css');

			}

			//Load breadcrumbs and innerpages  view
			$this->template->content->view('breadcrumb', $breadcrumb);
			$this->template->content->view('platforms/'.$page, $data);
			
		}
		else if($title == 'mt4_web')
		{//Load MT4 web view
			$breadcrumb['breadcrumb']	= array(0=>array('link'=>'home','title'=>$this->sm->getword('home',$this->lg)),1=>array('link'=>'platforms','title'=>$this->sm->getword('platforms',$this->lg)),2=>array('link'=>'#','title'=>$this->sm->getword('MT4 Web',$this->lg)));
			$page = 'MT4/web';

			//Load breadcrumbs and innerpages  view
			$this->template->content->view('breadcrumb', $breadcrumb);
			$this->template->content->view('platforms/'.$page, $data);
			
		}
		else if($title == 'mt4_mac')
		{//Load MT4 mac view
			$breadcrumb['breadcrumb']	= array(0=>array('link'=>'home','title'=>$this->sm->getword('home',$this->lg)),1=>array('link'=>'platforms','title'=>$this->sm->getword('platforms',$this->lg)),2=>array('link'=>'#','title'=>$this->sm->getword('MT4 Mac',$this->lg)));
			$page = 'MT4/mac';

			//Load breadcrumbs and innerpages  view
			$this->template->content->view('breadcrumb', $breadcrumb);
			$this->template->content->view('platforms/'.$page, $data);
		}
        else if($title == 'mt4_iphone')
		{//Load MT4 iphone view
			$breadcrumb['breadcrumb']	= array(0=>array('link'=>'home','title'=>$this->sm->getword('home',$this->lg)),1=>array('link'=>'platforms','title'=>$this->sm->getword('platforms',$this->lg)),2=>array('link'=>'#','title'=>$this->sm->getword('MT4 Iphone',$this->lg)));
			$page = 'MT4/iphone';

			//Load breadcrumbs and innerpages  view
			$this->template->content->view('breadcrumb', $breadcrumb);
			$this->template->content->view('platforms/'.$page, $data);
		}
       else if($title == 'mt4_android')
		{//Load MT4 android view
			$breadcrumb['breadcrumb']	= array(0=>array('link'=>'home','title'=>$this->sm->getword('home',$this->lg)),1=>array('link'=>'platforms','title'=>$this->sm->getword('platforms',$this->lg)),2=>array('link'=>'#','title'=>$this->sm->getword('MT4 Android',$this->lg)));
			$page = 'MT4/android';

			//Load breadcrumbs and innerpages  view
			$this->template->content->view('breadcrumb', $breadcrumb);
			$this->template->content->view('platforms/'.$page, $data);

		}
		else if($title == 'mt5_desktop')
		{//Load MT5 desktop view
			$breadcrumb['breadcrumb']	= array(0=>array('link'=>'home','title'=>$this->sm->getword('home',$this->lg)),1=>array('link'=>'platforms','title'=>$this->sm->getword('platforms',$this->lg)),2=>array('link'=>'#','title'=>$this->sm->getword('MT5 Desktop',$this->lg)));
			$page   = 'MT5/desktop';

			//Load breadcrumbs and innerpages  view
			$this->template->content->view('breadcrumb', $breadcrumb);
			$this->template->content->view('platforms/'.$page, $data);
		}
		else if($title == 'mt5_all')
		{//Load MT5 desktop view
			$breadcrumb['breadcrumb']	= array(0=>array('link'=>'home','title'=>$this->sm->getword('home',$this->lg)),1=>array('link'=>'platforms','title'=>$this->sm->getword('platforms',$this->lg)),2=>array('link'=>'#','title'=>$this->sm->getword('MT5 All',$this->lg)));
			$page   = 'MT5/all';

			$this->template->javascript->add('assets/js/uikit.min.js');
			$this->template->javascript->add('assets/js/uikit-icons.min.js');
			if($lang == 'ar' || $lang == 'fa' ){//RTL
				$this->template->stylesheet->add('assets/css/rtl/common-inner.css');
			}else{//LTR
				$this->template->stylesheet->add('assets/css/common-inner.css');

			}

			//Load breadcrumbs and innerpages  view
			$this->template->content->view('breadcrumb', $breadcrumb);
			$this->template->content->view('platforms/'.$page, $data);
		}
		else if($title == 'mt5_web')
		{//Load MT5 web view
			$breadcrumb['breadcrumb']	= array(0=>array('link'=>'home','title'=>$this->sm->getword('home',$this->lg)),1=>array('link'=>'platforms','title'=>$this->sm->getword('platforms',$this->lg)),2=>array('link'=>'#','title'=>$this->sm->getword('MT5 Web',$this->lg)));
			$page = 'MT5/web';

			//Load breadcrumbs and innerpages  view
			$this->template->content->view('breadcrumb', $breadcrumb);
			$this->template->content->view('platforms/'.$page, $data);
			
		}
		else if($title == 'mt5_mac')
		{//Load MT5 mac view
			$breadcrumb['breadcrumb']	= array(0=>array('link'=>'home','title'=>$this->sm->getword('home',$this->lg)),1=>array('link'=>'platforms','title'=>$this->sm->getword('platforms',$this->lg)),2=>array('link'=>'#','title'=>$this->sm->getword('MT5 Mac',$this->lg)));
			$page = 'MT5/mac';

			//Load breadcrumbs and innerpages  view
			$this->template->content->view('breadcrumb', $breadcrumb);
			$this->template->content->view('platforms/'.$page, $data);
		}
        else if($title == 'mt5_iphone')
		{//Load MT5 iphone view
			$breadcrumb['breadcrumb']	= array(0=>array('link'=>'home','title'=>$this->sm->getword('home',$this->lg)),1=>array('link'=>'platforms','title'=>$this->sm->getword('platforms',$this->lg)),2=>array('link'=>'#','title'=>$this->sm->getword('MT5 Iphone',$this->lg)));
			$page = 'MT5/iphone';

			//Load breadcrumbs and innerpages  view
			$this->template->content->view('breadcrumb', $breadcrumb);
			$this->template->content->view('platforms/'.$page, $data);
		}
       else if($title == 'mt5_android')
		{//Load MT5 android view
			$breadcrumb['breadcrumb']	= array(0=>array('link'=>'home','title'=>$this->sm->getword('home',$this->lg)),1=>array('link'=>'platforms','title'=>$this->sm->getword('platforms',$this->lg)),2=>array('link'=>'#','title'=>$this->sm->getword('MT5 Android',$this->lg)));
			$page = 'MT5/android';

			//Load breadcrumbs and innerpages  view
			$this->template->content->view('breadcrumb', $breadcrumb);
			$this->template->content->view('platforms/'.$page, $data);
		}
		//cTrader
		else if($title == 'ctrader_desktop')
		{//Load cTrader desktop view
			$breadcrumb['breadcrumb']	= array(0=>array('link'=>'home','title'=>$this->sm->getword('home',$this->lg)),1=>array('link'=>'platforms','title'=>$this->sm->getword('platforms',$this->lg)),2=>array('link'=>'#','title'=>$this->sm->getword('cTrader Desktop',$this->lg)));
			$page   = 'cTrader/desktop';

			if($lang == 'ar' || $lang == 'fa' ){//RTL
				$this->template->stylesheet->add('assets/css/rtl/common-inner.css');
			}else{//LTR
				$this->template->stylesheet->add('assets/css/common-inner.css');

			}

			//Load breadcrumbs and innerpages  view
			$this->template->content->view('breadcrumb', $breadcrumb);
			$this->template->content->view('platforms/'.$page, $data);
		}
		else if($title == 'ctrader_all')
		{//Load cTrader desktop view
			$breadcrumb['breadcrumb']	= array(0=>array('link'=>'home','title'=>$this->sm->getword('home',$this->lg)),1=>array('link'=>'platforms','title'=>$this->sm->getword('platforms',$this->lg)),2=>array('link'=>'#','title'=>$this->sm->getword('cTrader All',$this->lg)));
			$page   = 'cTrader/all';

			$this->template->javascript->add('assets/js/uikit.min.js');
			$this->template->javascript->add('assets/js/uikit-icons.min.js');
			if($lang == 'ar' || $lang == 'fa' ){//RTL
				$this->template->stylesheet->add('assets/css/rtl/common-inner.css');
			}else{//LTR
				$this->template->stylesheet->add('assets/css/common-inner.css');

			}

			//Load breadcrumbs and innerpages  view
			$this->template->content->view('breadcrumb', $breadcrumb);
			$this->template->content->view('platforms/'.$page, $data);
		}
		else if($title == 'ctrader_web')
		{//Load cTrader web view
			$breadcrumb['breadcrumb']	= array(0=>array('link'=>'home','title'=>$this->sm->getword('home',$this->lg)),1=>array('link'=>'platforms','title'=>$this->sm->getword('platforms',$this->lg)),2=>array('link'=>'#','title'=>$this->sm->getword('ctrader web',$this->lg)));
			$page = 'cTrader/web';

			if($lang == 'ar' || $lang == 'fa' ){//RTL
				$this->template->stylesheet->add('assets/css/rtl/common-inner.css');
			}else{//LTR
				$this->template->stylesheet->add('assets/css/common-inner.css');

			}

			//Load breadcrumbs and innerpages  view
			$this->template->content->view('breadcrumb', $breadcrumb);
			$this->template->content->view('platforms/'.$page, $data);
			
		}
		else if($title == 'ctrader_mac')
		{//Load cTrader mac view
			$breadcrumb['breadcrumb']	= array(0=>array('link'=>'home','title'=>$this->sm->getword('home',$this->lg)),1=>array('link'=>'platforms','title'=>$this->sm->getword('platforms',$this->lg)),2=>array('link'=>'#','title'=>$this->sm->getword('cTrader Mac',$this->lg)));
			$page = 'cTrader/mac';

			//Load breadcrumbs and innerpages  view
			$this->template->content->view('breadcrumb', $breadcrumb);
			$this->template->content->view('platforms/'.$page, $data);
		}
        else if($title == 'ctrader_iphone')
		{//Load cTrader iphone view
			$breadcrumb['breadcrumb']	= array(0=>array('link'=>'home','title'=>$this->sm->getword('home',$this->lg)),1=>array('link'=>'platforms','title'=>$this->sm->getword('platforms',$this->lg)),2=>array('link'=>'#','title'=>$this->sm->getword('ctrader mac',$this->lg)));
			$page = 'cTrader/iphone';

			if($lang == 'ar' || $lang == 'fa' ){//RTL
				$this->template->stylesheet->add('assets/css/rtl/common-inner.css');
			}else{//LTR
				$this->template->stylesheet->add('assets/css/common-inner.css');

			}

			//Load breadcrumbs and innerpages  view
			$this->template->content->view('breadcrumb', $breadcrumb);
			$this->template->content->view('platforms/'.$page, $data);
		}
       else if($title == 'ctrader_android')
		{//Load cTrader android view
			$breadcrumb['breadcrumb']	= array(0=>array('link'=>'home','title'=>$this->sm->getword('home',$this->lg)),1=>array('link'=>'platforms','title'=>$this->sm->getword('platforms',$this->lg)),2=>array('link'=>'#','title'=>$this->sm->getword('ctrader android',$this->lg)));
			$page = 'cTrader/android';

			if($lang == 'ar' || $lang == 'fa' ){//RTL
				$this->template->stylesheet->add('assets/css/rtl/common-inner.css');
			}else{//LTR
				$this->template->stylesheet->add('assets/css/common-inner.css');

			}

			//Load breadcrumbs and innerpages  view
			$this->template->content->view('breadcrumb', $breadcrumb);
			$this->template->content->view('platforms/'.$page, $data);
		}

        // Set a partial's content
        $this->template->footer = '';
        
        // Publish the template
        $this->template->publish();
    }
}