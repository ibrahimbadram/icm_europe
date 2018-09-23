<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : languages (languagesController)
 * languages Class to control all languages related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Languages extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('languages_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the languages
     */
    public function index()
    {
        $this->global['pageTitle'] = ': Dashboard';
        
        $this->loadViews("admin/dashboard", $this->global, NULL , NULL);
    }
    
    /**
     * This function is used to load the languages list
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
            
           // $this->load->library('pagination');
            
            $count = $this->languages_model->ListingCount($searchText);

			//$returns = $this->paginationCompress ( "Listing/", $count, 5 );
			$returns = $this->paginationCompress ( "Listing/", $count );
            
            $data['Records'] = $this->languages_model->Listing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = ': languages Listing';
            
            $this->loadViews("admin/languages/list", $this->global, $data, NULL);
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
            $this->global['pageTitle'] = ': Add New languages';

            $this->loadViews("admin/languages/add", $this->global, $data, NULL);
        }
    }

    
    /**
     * This function is used to add new languages to the system
     */
    function addNewrow()
    {
		
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            
            $this->form_validation->set_rules('title','title','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('prefix','prefix','trim|xss_clean|max_length[128]');
            $this->form_validation->set_rules('active','active','required|max_length[20]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNew();
            }
            else
            {
                $title = ucwords(strtolower($this->input->post('title')));
                $active = $this->input->post('active');
				 $prefix = $this->input->post('prefix');
				$files='';
				
				  $Info = array('title'=>$title, 'prefix'=>$prefix, 'active'=>$active, 'createdBy'=>$this->vendorId, 'createdDtm'=>date('Y-m-d H:i:s'), 'sort_order'=> 0);
                  $result = $this->languages_model->addNewrow($Info);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New languages created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'languages creation failed');
                }
                
                redirect(site_url('admin/languages/addNew'));
            }
        }
    }

    
    /**
     * This function is used load languages edit information
     * @param number $languagesId : Optional : This is languages id
     */
    function editOld($Id = NULL)
    {
        
            if($Id == null)
            {
                redirect(site_url('admin/languages/Listing'));
            }
            
			
            $data['Info'] = $this->languages_model->getinfo($Id);
            
            $this->global['pageTitle'] = ': Edit languages';
            
            $this->loadViews("admin/languages/edit", $this->global, $data, NULL);
        }
    
    
    /**
     * This function is used to edit the languages information
     */
    function editrow()
    {
            
            $Id = $this->input->post('id');
            
            $this->form_validation->set_rules('title','title','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('prefix','prefix','trim|required|xss_clean|max_length[128]');
            $this->form_validation->set_rules('active','active','required|max_length[20]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editOld($Id);
            }
            else
            {
                $title = ucwords(strtolower($this->input->post('title')));
                $active = $this->input->post('active');
				$prefix = $this->input->post('prefix');
                
                $Info = array();
				$result = $this->languages_model->getrecord($Id);
				
                
                
                $Info = array('title'=>$title, 'prefix'=>$prefix, 'active'=>$active, 'updatedDtm'=>date('Y-m-d H:i:s') , 'updatedBy'=>$this->vendorId);
               
                
                $result = $this->languages_model->editrow($Info, $Id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'languages updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'languages updation failed');
                }
                
                redirect(site_url('admin/languages/Listing'));
            }
			//redirect(site_url('admin/languages/Listing'));
        }


    /**
     * This function is used to delete the languages using languagesId
     * @return boolean $result : TRUE / FALSE
     */
    function deleterow()
    {
        
            $id = $this->input->post('id');
            $Info = array('isDeleted'=>1,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            $result = $this->languages_model->deleterow($id, $Info);
            
            if ($result > 0) { 
			echo(json_encode(array('status'=>TRUE))); 
			}
            else { echo(json_encode(array('status'=>FALSE))); 
			}
        }
    
	    function deleteimage()
    {
        
            $Id = $this->input->post('id');
			$record = $this->languages_model->getrecord($Id);
            $Info = array('image'=>'','updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            $result = $this->languages_model->editrow($Info, $Id);
            if ($result > 0) { 
			unlink('./uploads/languages/'.$record->image);
			unlink('./uploads/languages/1980x1280/'.$record->image);
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
		   ->update("tbl_languages", array("sort_order" => $order + 1));
	  }
	}


}

?>