<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Newsletter_model extends CI_Model
{

    public  $lang = "en";

    function __construct() {
        parent::__construct();
        $this->lang = $this->uri->segment(1);
		if($this->lang == '' || $this->lang == 'home'){
			$this->lang = 'en';
		}

    }
    // get all newsletter
    function get_all()
    {
        $this->db->where('lang_ref', $this->lang);
        $result = $this->db->get('newsletter');
        return $result->result_array();
    }
    // get one newsletter by its id
    function get_one($id) {
        $this->db->where('lang_ref', $this->lang);
        $this->db->where('id', $id);
        $result = $this->db->get('newsletter');
        return $result->row();
    }


    function create()
    {
        $this->db->set('name', $this->input->post('name'));
        $this->db->set('email', $this->input->post('email'));
        $this->db->set('lang_ref', $this->input->post('lang_ref'));
        $this->db->set('phone', $this->input->post('phone'));
        $this->db->insert('newsletter');
        $id = $this->db->insert_id();
        return $id;
    }


    function delete($id) {
        $this->db->where('id', $id);
        $query = $this->db->delete('newsletter');
        return $query;
    }
	
	// get all newsletter
    function findWhere($condition="")
    {
        $this->db->where('lang_ref', $this->lang);
		
		if(!empty($condition)){
			$this->db->where($condition);
		}
        $result = $this->db->get('newsletter');
		
        return $result->result_array();
    }
}

/* End of file news_model.php */
    /* Location: ./application/models/newsletter_model.php */