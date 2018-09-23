<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : websites (websitesController)
 * websites Class to control all websites related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class websites extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('websites_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the websites
     */
    public function index()
    {
        $this->global['pageTitle'] = ': Dashboard';
        
        $this->loadViews("admin/dashboard", $this->global, NULL , NULL);
    }
    
    /**
     * This function is used to load the websites list
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
            
            $count = $this->websites_model->ListingCount($searchText);

			//$returns = $this->paginationCompress ( "Listing/", $count, 5 );
			$returns = $this->paginationCompress ( $this->lang->lang()."/admin/websites/Listing/", $count );
            
            $data['Records'] = $this->websites_model->Listing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = ': websites Listing';
            
            $this->loadViews("admin/websites/list", $this->global, $data, NULL);
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
            $this->global['pageTitle'] = ': Add New websites';
            $data['languages'] = $this->websites_model->Listing_foreign('languages');

            $this->loadViews("admin/websites/add", $this->global, $data, NULL);
        }
    }

    
    /**
     * This function is used to add new websites to the system
     */
    function addNewrow()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
           
            $this->form_validation->set_rules('title','title','trim|max_length[128]|xss_clean');
            
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNew();
            }
            else
            {
                $title 		 	= $this->input->post('title');
              
				$Info['title']=$title;	
				$Info['createdBy']=$this->vendorId;
				$Info['createdDtm']=date('Y-m-d H:i:s');
				$Info['sort_order']=0;							
                $result = $this->websites_model->addNewrow($Info);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New websites created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'websites creation failed');
                }
                
                redirect('admin/websites/addNew');
            }
        }
    }

    
    /**
     * This function is used load websites edit information
     * @param number $Id : Optional : This is websites id
     */
    function editOld($Id = NULL)
    {
        
            if($Id == null)
            {
                redirect('Listing');
            }
            
			
            $data['Info'] = $this->websites_model->getInfo($Id);
            
            $this->global['pageTitle'] = ': Edit websites';
            
            
            $this->loadViews("admin/websites/edit", $this->global, $data, NULL);
        }
    
    
    /**
     * This function is used to edit the websites information
     */
    function editrow()
    {
            
            $Id = $this->input->post('id');
          
            $this->form_validation->set_rules('title','title','trim|max_length[128]|xss_clean');
           
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editOld($Id);
            }
            else
            {
                $title = $this->input->post('title');
                
                
                $Info = array();
				$record = $this->websites_model->getrecord($Id);
											
				$Info['title']=$title;
				$Info['updatedBy']=$this->vendorId;
				$Info['updatedDtm']=date('Y-m-d H:i:s');
				$Info['sort_order']=0;
                $result = $this->websites_model->editrow($Info, $Id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'websites updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'websites updation failed');
                }
                
                redirect('admin/websites/Listing');
            }
        }


    /**
     * This function is used to delete the websites using Id
     * @return boolean $result : TRUE / FALSE
     */
    function deleterow()
    {
        
            $Id = $this->input->post('Id');
            $Info = array('isDeleted'=>1,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            $result = $this->websites_model->deleterow($Id, $Info);
            
            if ($result > 0) { 
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
		   ->update("tbl_websites", array("sort_order" => $order + 1));
	  }
	}

}

?>