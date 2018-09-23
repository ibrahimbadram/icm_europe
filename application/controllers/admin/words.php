<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : words (wordsController)
 * words Class to control all words related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Words extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('words_model');
        $this->isLoggedIn();   
		$this->lg = $this->lang->lang();
    }
    
    /**
     * This function used to load the first screen of the words
     */
    public function index()
    {
        $this->global['pageTitle'] = ': Dashboard';
        
        $this->loadViews("admin/dashboard", $this->global, NULL , NULL);
    }
    
    /**
     * This function is used to load the words list
     */
    function Listing()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
        
            $searchText = $this->input->post('searchText');
			
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->words_model->ListingCount($searchText);
			
			$returns = $this->paginationCompress ( $this->lg."/admin/words/Listing/", $count, 20 );
            
            $data['Records'] = $this->words_model->Listing($searchText, $returns["page"], $this->uri->segment(5));
            
            $this->global['pageTitle'] = ': words Listing';
            
            $this->loadViews("admin/words/list", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to load the add new form
     */
    function addNew()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            
            $data = array();
            $this->global['pageTitle'] = ': Add New words';
            $data['languages'] = $this->words_model->Listing_foreign('languages');

            $this->loadViews("admin/words/add", $this->global, $data, NULL);
        }
    }

    
    /**
     * This function is used to add new words to the system
     */
    function addNewrow()
    {
		
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $data_languages = $this->words_model->Listing_foreign('languages');
            $this->form_validation->set_rules('title','title','trim|required|max_length[228]|xss_clean');
			if(!empty($data_languages))
                    {
                        foreach($data_languages as $record)
                        {
            $this->form_validation->set_rules('word_'.$record->prefix,'word '.$record->prefix,'max_length[200]');
						}
					}
            $this->form_validation->set_rules('active','active','required|max_length[20]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNew();
            }
            else
            {
                $title = $this->input->post('title');
                $active = $this->input->post('active');
				if(!empty($data_languages))
                    {
                        foreach($data_languages as $record)
                        {
				$Info[$record->prefix] = $this->input->post('word_'.$record->prefix);
						}
					}
					
				
				  $Info['title']=$title;
				  $Info['active']=$active;
				  $Info['createdBy']=$this->vendorId;
				  $Info['createdDtm']=date('Y-m-d H:i:s');
				  $Info['sort_order']= 0;
                  $result = $this->words_model->addNewrow($Info);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New words created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'words creation failed');
                }
                
                redirect(site_url('admin/words/addNew'));
            }
        }
    }

    
    /**
     * This function is used load words edit information
     * @param number $wordsId : Optional : This is words id
     */
    function editOld($Id = NULL)
    {
        
            if($Id == null)
            {
                redirect(site_url('admin/words/Listing'));
            }
            
			
            $data['Info'] = $this->words_model->getinfo($Id);
            $data['languages'] = $this->words_model->Listing_foreign('languages');
            
            $this->global['pageTitle'] = ': Edit words';
            
            $this->loadViews("admin/words/edit", $this->global, $data, NULL);
        }
    
    
    /**
     * This function is used to edit the words information
     */
    function editrow()
    {
            
            $Id = $this->input->post('id');
            $data_languages = $this->words_model->Listing_foreign('languages');
            
            $this->form_validation->set_rules('title','title','trim|required|max_length[228]|xss_clean');
			
			if(!empty($data_languages))
                    {
                        foreach($data_languages as $record)
                        {
            $this->form_validation->set_rules('word_'.$record->prefix,'word '.$record->prefix,'max_length[200]');
						}
					}
			
            $this->form_validation->set_rules('active','active','required|max_length[20]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editOld($Id);
            }
            else
            {
                //$title = uc(strtolower($this->input->post('title')));
                $active = $this->input->post('active');
                
                $Info = array();
				$result = $this->words_model->getrecord($Id);
				
                
               if(!empty($data_languages))
                    {
                        foreach($data_languages as $record)
                        {
				$Info[$record->prefix] = $this->input->post('word_'.$record->prefix);
						}
					}
					
				  //$Info['title']=$title;
				  $Info['active']=$active;
				  $Info['createdBy']=$this->vendorId;
				  $Info['createdDtm']=date('Y-m-d H:i:s');
				  $Info['sort_order']= 0;
               
                
                $result = $this->words_model->editrow($Info, $Id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'words updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'words updation failed');
                }
                
                redirect(site_url('admin/words/editOld/'.$Id));
            }
			redirect(site_url('admin/words/Listing'));
        }


    /**
     * This function is used to delete the words using wordsId
     * @return boolean $result : TRUE / FALSE
     */
    function deleterow()
    {
        
            $id = $this->input->post('id');
            $Info = array('isDeleted'=>1,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            $result = $this->words_model->deleterow($id, $Info);
            
            if ($result > 0) { 
			echo(json_encode(array('status'=>TRUE))); 
			}
            else { echo(json_encode(array('status'=>FALSE))); 
			}
        }
    
	    function deleteimage()
    {
        
            $Id = $this->input->post('id');
			$record = $this->words_model->getrecord($Id);
            $Info = array('image'=>'','updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            $result = $this->words_model->editrow($Info, $Id);
            if ($result > 0) { 
			unlink('./uploads/words/'.$record->image);
			unlink('./uploads/words/1980x2280/'.$record->image);
			echo(json_encode(array('status'=>TRUE))); 
			}
            else { echo(json_encode(array('status'=>FALSE))); 
			}
        }

   function pageNotFound()
    {
        $this->global['pageTitle'] = ': 404 - Page Not Found';
        
        $this->loadViews("404", $this->global, NULL, NULL);
    }
	
	
	public function updateRecordsOrder(){
	  $ids = $this->input->post("page_id_array", TRUE);
	  foreach($ids as $order => $item_id)
	  {
		 $this->db
		   ->where("id", $item_id)
		   ->update("tbl_words", array("sort_order" => $order + 1));
	  }
	}


}

?>