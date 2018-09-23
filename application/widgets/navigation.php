<?php

/*
 * Demo widget
 */
class Navigation extends Widget {

    public function display($data) {
        
        if (!isset($data['items'])) {
            $data['items'] = array('Home', 'About', 'Contact');
        }

		$rand1 = rand(1,10);
		$rand2 = rand(1,10);
		$result = $rand1+$rand2;
		$this->session->set_userdata('rand1',$rand1);
		$this->session->set_userdata('rand2',$rand2);
		$this->session->set_userdata('captcha_result',$result);
		$data['rand1'] = $rand1;
		$data['rand2'] = $rand2;

        $this->view('widgets/navigation', $data);
    }
    
}