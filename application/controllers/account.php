<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Account extends CI_Controller {
     public function __construct()

    {

        parent::__construct();

		$this->load->view('widgets/common');

		$this->lg = $this->lang->lang();
		
		//load content
		$this->lang->load('content');

    }  
    public function index($title='') {
        // Set the title
		if ( $title == '' )
			$title = 'real';
		
		$filename = 'account-'.$title;
		if ( ! file_exists(APPPATH . 'views/'.$filename.'.php'))
		{
			show_404();
		}
		
		$newtitle = str_replace('-', ' ', $title);
		if ($newtitle== 'demo'){
			$t_newtitle = $this->sm->getword('TRY A DEMO',$this->lg);
		}else{
			$t_newtitle = $this->sm->getword('OPEN REAL ACCOUNT',$this->lg);
		}

        $this->template->title = $this->sm->getword('ICM',$this->lg).' - '.$t_newtitle;
        $this->template->description = $this->sm->getword('ICM',$this->lg).' '.$t_newtitle;
		$this->template->trigger_meta('keyword',$newtitle.' '.$t_newtitle);
		
        /*$this->template->stylesheet->add('assets/css/default.css');
        $this->template->stylesheet->add('assets/css/common.css');
		$this->template->stylesheet->add('assets/bootstrap/css/bootstrap.css');
        $this->template->stylesheet->add('assets/css/overwrite.css');
        $this->template->stylesheet->add('assets/css/uikit.min.css');
        $this->template->stylesheet->add('assets/css/style.css');
		$this->template->stylesheet->add('assets/css/amd.css');
        $this->template->stylesheet->add('assets/css/ib.css');
        $this->template->javascript->add('assets/js/ib.js');
        $this->template->javascript->add('assets/js/amd.js');*/

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
			if($newtitle == 'real'){
				
				$this->template->stylesheet->add('assets/css/jquery.steps.css');
			}
			$this->template->stylesheet->add('assets/css/rtl/ib.css');
			
		}else{//LTR
			$this->template->stylesheet->add('assets/css/default.css');
			$this->template->stylesheet->add('assets/css/common.css');
			$this->template->stylesheet->add('assets/bootstrap/css/bootstrap.css');
			$this->template->stylesheet->add('assets/css/uikit.min.css');
			$this->template->stylesheet->add('assets/css/style.css');
			$this->template->stylesheet->add('assets/css/styles.css');
			$this->template->stylesheet->add('assets/css/amd.css');
			
			if($newtitle == 'real'){
				
				$this->template->stylesheet->add('assets/css/jquery.steps.css');
			}
			$this->template->stylesheet->add('assets/css/ib.css');

		}
		
		if($newtitle == 'real'){
			
			//$this->template->javascript->add('assets/js/jquery-steps/modernizr-2.6.2.min.js');
			//$this->template->javascript->add('assets/js/jquery-steps/jquery.cookie-1.3.1.js');
			//$this->template->javascript->add('assets/js/jquery-steps/jquery.steps.min.js');
			//$this->template->javascript->add('assets/js/jquery-steps/examples.js');
			$this->template->javascript->add('assets/js/open_real_account.js');
			
			//select2 plugin
			$this->template->stylesheet->add('assets/css/select2.min.css');
			$this->template->javascript->add('assets/js/select2.min.js');
			$this->template->javascript->add('assets/js/select2.init.js');
			
		}
		
		$this->template->stylesheet->add('assets/css/overwrite.css');
		$this->template->javascript->add('assets/js/amd.js');
        $this->template->javascript->add('assets/js/ib.js');
		
		
        $data = array();
		$breadcrumb['breadcrumb'] = array(0=>array('link'=>'home','title'=>$this->sm->getword('home',$this->lg)),1=>array('link'=>'#','title'=>$t_newtitle));
		$this->template->content->view('breadcrumb', $breadcrumb);
        $this->template->content->view('account-'.$title, $data);
        $this->template->publish();
    }
	
	public function validateSteps(){
		
	   //add the header here
		header('Content-Type: application/json');
			
		$this->load->model('open_real_account_model');
		 
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('email',$this->sm->getword('Enter a valid email', $this->lg),'required|valid_email|is_unique[tbl_open_real_account.email]');
		
		$this->form_validation->set_message('is_unique', $this->sm->getword('You have an existing profile under this email.', $this->lg));
		
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]',array('min_length' => $this->sm->getword('Password must be at least 6 characters!', $this->lg)));
		$this->form_validation->set_rules('name',$this->sm->getword('Name', $this->lg), 'required');
		$this->form_validation->set_rules('surname',$this->sm->getword('Last Name', $this->lg), 'required');
		
		if ($this->form_validation->run() == FALSE) {
			//echo validation_errors();
			$arr = array('response' => 0, 'message' => validation_errors()); 
			echo json_encode( $arr );
		} 
		else {
		  // To who are you wanting with input value such to insert as 
		  $Info['email']				=$this->input->post('email');
		  $Info['password']				=getHashedPassword($this->input->post('password'));
		  $Info['name']					=$this->input->post('name');
		  $Info['last_name']			=$this->input->post('surname');
		  $Info['country_of_residence']	=$this->input->post('country');
		  $Info['phone']				=$this->input->post('phone');
		  $Info['regulator_name']		=$this->input->post('regulator_name');
		  
		 
		  //save the record in the database and print success message
		  $result = $this->open_real_account_model->addNewrow($Info);

			if($result > 0)

			{
				//$this->session->set_flashdata('success', $this->sm->getword('Your information has been submitted successfully.', $this->lg));
				$arr = array('response' => 1, 'message' => $this->sm->getword('Your information has been submitted successfully.', $this->lg)); 
			}

			else

			{
				//$this->session->set_flashdata('error', 'Your information has been submitted unsuccessfully.');
				$arr = array('response' => 0, 'message' => $this->sm->getword('Your information has been submitted unsuccessfully.', $this->lg));    

			}
			
			echo json_encode( $arr );
		
		}

	}
	
}