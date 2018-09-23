<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : campaigns (campaignsController)
 * campaigns Class to control all campaigns related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Campaigns extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('campaigns_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the campaigns
     */
    public function index()
    {
        $this->global['pageTitle'] = ': Dashboard';
        
        $this->loadViews("admin/dashboard", $this->global, NULL , NULL);
    }
    
    /**
     * This function is used to load the campaigns list
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
            
            $count = $this->campaigns_model->ListingCount($searchText);

			//$returns = $this->paginationCompress ( "Listing/", $count, 5 );
			$returns = $this->paginationCompress ( "Listing/", $count );
            
            $data['Records'] = $this->campaigns_model->Listing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = ': campaigns Listing';
            
            $this->loadViews("admin/campaigns/list", $this->global, $data, NULL);
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
            $this->global['pageTitle'] = ': Add New campaigns';

            $this->loadViews("admin/campaigns/add", $this->global, $data, NULL);
        }
    }

    
    /**
     * This function is used to add new campaigns to the system
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
            $this->form_validation->set_rules('campaign_id','campaign_id','trim|xss_clean|max_length[128]');
            $this->form_validation->set_rules('active','active','required|max_length[20]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNew();
            }
            else
            {
                $title = ucwords(strtolower($this->input->post('title')));
                $active = $this->input->post('active');
				if ( $this->input->post('campaign_id') ) {
				 $campaign_id = $this->input->post('campaign_id');
				} else {
					$campaign_id = strtotime(date("Y-m-d H:i:s"));
				}
				 
				$files='';
				
				  $Info = array('title'=>$title, 'campaign_id'=>$campaign_id, 'active'=>$active, 'createdBy'=>$this->vendorId, 'createdDtm'=>date('Y-m-d H:i:s'), 'sort_order'=> 0);
                  $result = $this->campaigns_model->addNewrow($Info);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New campaigns created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'campaigns creation failed');
                }
                
                redirect(site_url('admin/campaigns/addNew'));
            }
        }
    }

    
    /**
     * This function is used load campaigns edit information
     * @param number $campaignsId : Optional : This is campaigns id
     */
    function editOld($Id = NULL)
    {
        
            if($Id == null)
            {
                redirect(site_url('admin/campaigns/Listing'));
            }
            
			
            $data['Info'] = $this->campaigns_model->getinfo($Id);
            
            $this->global['pageTitle'] = ': Edit campaigns';
            
            $this->loadViews("admin/campaigns/edit", $this->global, $data, NULL);
        }
    
    
    /**
     * This function is used to edit the campaigns information
     */
    function editrow()
    {
            
            $Id = $this->input->post('id');
            
            $this->form_validation->set_rules('title','title','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('campaign_id','campaign_id','trim|xss_clean|max_length[128]');
            $this->form_validation->set_rules('active','active','required|max_length[20]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editOld($Id);
            }
            else
            {
                $title = ucwords(strtolower($this->input->post('title')));
                $active = $this->input->post('active');
				$campaign_id = $this->input->post('campaign_id');
                
                $Info = array();
				$result = $this->campaigns_model->getrecord($Id);
				
                
                
                $Info = array('title'=>$title, 'campaign_id'=>$campaign_id, 'active'=>$active, 'updatedDtm'=>date('Y-m-d H:i:s') , 'updatedBy'=>$this->vendorId);
               
                
                $result = $this->campaigns_model->editrow($Info, $Id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'campaigns updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'campaigns updation failed');
                }
                
                redirect(site_url('admin/campaigns/Listing'));
            }
			//redirect(site_url('admin/campaigns/Listing'));
        }


    /**
     * This function is used to delete the campaigns using campaignsId
     * @return boolean $result : TRUE / FALSE
     */
    function deleterow()
    {
        
            $id = $this->input->post('id');
            $Info = array('isDeleted'=>1,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            $result = $this->campaigns_model->deleterow($id, $Info);
            
            if ($result > 0) { 
			echo(json_encode(array('status'=>TRUE))); 
			}
            else { echo(json_encode(array('status'=>FALSE))); 
			}
        }
    
	    function deleteimage()
    {
        
            $Id = $this->input->post('id');
			$record = $this->campaigns_model->getrecord($Id);
            $Info = array('image'=>'','updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            $result = $this->campaigns_model->editrow($Info, $Id);
            if ($result > 0) { 
			unlink('./uploads/campaigns/'.$record->image);
			unlink('./uploads/campaigns/1980x1280/'.$record->image);
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
		   ->update("tbl_campaigns", array("sort_order" => $order + 1));
	  }
	}


}

?>