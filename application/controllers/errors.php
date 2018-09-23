<?php

if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Errors extends CI_Controller {

      public function __construct()

    {

        parent::__construct();

		$this->load->view('widgets/common');

		$this->lg = $this->lang->lang();

    }  

    public function index() {


        $this->template->title = '404';

        $this->template->description = $this->sm->getword('ICM',$this->lg);

		$this->template->trigger_meta('keyword','Page Not found');
		
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

		$this->template->javascript->add('assets/js/uikit.min.js');

		

        $data = array();
	
        $this->template->content->view('error', $data);

        $this->template->publish();

    }

	

}