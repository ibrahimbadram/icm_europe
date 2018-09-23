<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {
      public function __construct()
    {
        parent::__construct();
		$this->load->view('widgets/common');
		$this->lg = $this->lang->lang();
    }  
    public function index() {
        // Set the title
        $this->template->title = 'ICM TRADER';
        
        // Dynamically add a css stylesheet
        $this->template->stylesheet->add('assets/css/amd.css');

        $data = array(); // load from model (but using a dummy array here)
        $this->template->content->view('home', $data);
        
        // Set a partial's content
        $this->template->footer = 'Made with Twitter Bootstrap';
        
        // Publish the template
        $this->template->publish();
    }
}