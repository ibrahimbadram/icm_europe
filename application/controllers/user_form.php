<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class User_form extends CI_Controller {

 	    public function __construct()

    {
        parent::__construct();
		$this->load->view('widgets/common');
		$this->lg = $this->lang->lang();
    }   

    public function index($title='') {



	if ( ! file_exists(APPPATH . 'views/other_forms/'.$title.'.php'))		
	{			show_404();		}

		$lang = $this->lang->lang();

        $data = array();

        $this->load->view('other_forms/'.$title, $data);

    }

	


}