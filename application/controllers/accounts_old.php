<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Accounts extends CI_Controller {
 	    public function __construct()
    {
        parent::__construct();
		$this->load->view('widgets/common');
		$this->lg = $this->lang->lang();
    }   
    public function index($title='') {
        // Set the title
		if ( $title == '' )
			$title = 'type';
		$filename = 'account-'.$title;		if ( ! file_exists(APPPATH . 'views/'.$filename.'.php'))		{			show_404();		}
        $this->template->title = $this->sm->getword('ICM',$this->lg).' - '.' '.$this->sm->getword('Accounts',$this->lg).' '.$title;
        $this->template->description = $this->sm->getword('Accounts',$this->lg).' '.$title;
		$this->template->trigger_meta('keyword',$this->sm->getword('Accounts',$this->lg).' '.$title);

		
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
		
        $data = array();
		$breadcrumb['breadcrumb'] = array(0=>array('link'=>'home','title'=>$this->sm->getword('home',$this->lg)),1=>array('link'=>'accounts','title'=>$this->sm->getword('Accounts',$this->lg)),2=>array('link'=>'#','title'=>$this->sm->getword($title,$this->lg)));
		$this->template->content->view('breadcrumb', $breadcrumb);
        $this->template->content->view('account-'.$title, $data);
        $this->template->publish();
    }
	
}