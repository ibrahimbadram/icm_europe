<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Pages (PagesController)
 * Pages Class to control all Pages related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Pages extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pages_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the Pages
     */
    public function index()
    {
        $this->global['pageTitle'] = ': Dashboard';
        
        $this->loadViews("admin/dashboard", $this->global, NULL , NULL);
    }
    
    /**
     * This function is used to load the Pages list
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
            
            $count = $this->Pages_model->ListingCount($searchText);

			//$returns = $this->paginationCompress ( "Listing/", $count, 5 );
			$returns = $this->paginationCompress ( $this->lang->lang()."/admin/pages/Listing/", $count );
            
            $data['Records'] = $this->Pages_model->Listing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = ': Pages Listing';
            
            $this->loadViews("admin/pages/list", $this->global, $data, NULL);
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
            $this->global['pageTitle'] = ': Add New Pages';
            $data['languages'] = $this->Pages_model->Listing_foreign('languages');

            $this->loadViews("admin/pages/add", $this->global, $data, NULL);
        }
    }

    
    /**
     * This function is used to add new Pages to the system
     */
    function addNewrow()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $data_languages = $this->Pages_model->Listing_foreign('languages');
            $this->form_validation->set_rules('title','title','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('image','image','trim|xss_clean|max_length[128]');  
            $this->form_validation->set_rules('website','website','trim|xss_clean|max_length[2]');      
			     $this->form_validation->set_rules('file','file','trim|xss_clean|max_length[128]');
            
			if(!empty($data_languages))
                    {
                        foreach($data_languages as $record)
                        {
            $this->form_validation->set_rules('title_'.$record->prefix,'title '.$record->prefix,'trim');
            $this->form_validation->set_rules('description_'.$record->prefix,'description '.$record->prefix,'trim');
						}
					}
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNew();
            }
            else
            {
                $title 		 	= $this->input->post('title');
                $description 	= $this->input->post('description');                
				$date 			= $this->input->post('date');             
				$website 			= $this->input->post('website');                   
				$sub_title		= $this->input->post('sub_title');				
				$files = $filess = '';
				if ( !empty($_FILES['image']['name']) ) {
					$files=$this->Pages_model->uploadImage('image','pages');
				}								if ( !empty($_FILES['file']['name']) ) {					
				$filess=$this->Pages_model->uploadFile('file','pages');				}
				
				if(!empty($data_languages))
                    {
                        foreach($data_languages as $record)
                        {
						$Info['title_'.$record->prefix]=$this->input->post('title_'.$record->prefix);
						$Info['description_'.$record->prefix]=$this->input->post('description_'.$record->prefix);				
						$Info['sub_title_'.$record->prefix]= $this->input->post('sub_title_'.$record->prefix);										$Info['date_'.$record->prefix]=$this->input->post('date_'.$record->prefix);
						}
					}
				$Info['title']=$title;				
				$Info['image']=$files;			
				$Info['website']=$website;								
				$Info['file']=$filess;
				$Info['createdBy']=$this->vendorId;
				$Info['createdDtm']=date('Y-m-d H:i:s');
				$Info['sort_order']=0;								
                $result = $this->Pages_model->addNewrow($Info);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Pages created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Pages creation failed');
                }
                
                redirect('admin/pages/addNew');
            }
        }
    }

    
    /**
     * This function is used load Pages edit information
     * @param number $Id : Optional : This is Pages id
     */
    function editOld($Id = NULL)
    {
        
            if($Id == null)
            {
                redirect('Listing');
            }
            
			
            $data['Info'] = $this->Pages_model->getInfo($Id);
            
            $this->global['pageTitle'] = ': Edit Pages';
            $data['languages'] = $this->Pages_model->Listing_foreign('languages');
            
            $this->loadViews("admin/pages/edit", $this->global, $data, NULL);
        }
    
    
    /**
     * This function is used to edit the Pages information
     */
    function editrow()
    {
            
            $Id = $this->input->post('id');
            $data_languages = $this->Pages_model->Listing_foreign('languages');
            
            $this->form_validation->set_rules('title','title','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('image','image','trim|xss_clean|max_length[128]'); 
            $this->form_validation->set_rules('website','website','trim|xss_clean|max_length[2]'); 
			$this->form_validation->set_rules('file','file','trim|xss_clean|max_length[128]');
            
				if(!empty($data_languages))
                    {
                        foreach($data_languages as $record)
                        {
            $this->form_validation->set_rules('title_'.$record->prefix,'title '.$record->prefix,'trim');
            $this->form_validation->set_rules('description_'.$record->prefix,'description '.$record->prefix,'trim');
						}
					}
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editOld($Id);
            }
            else
            {
                $title = ucwords(strtolower($this->input->post('title')));
                $description = $this->input->post('description');
                $website = $this->input->post('website');
                
                $Info = array();
				$record = $this->Pages_model->getrecord($Id);
				
                if ( !empty($_FILES['image']['name']) ) {
				$files=$this->Pages_model->uploadImage('image','pages');
				} else {
				$files= $record->image;
				}								if ( !empty($_FILES['file']['name']) ) {				$filess=$this->Pages_model->uploadFile('file','pages');				} else {				$filess= $record->file;				}
                
                if(!empty($data_languages))
                    {
                        foreach($data_languages as $record)
                        {
						$Info['title_'.$record->prefix]=$this->input->post('title_'.$record->prefix);
						$Info['description_'.$record->prefix]=$this->input->post('description_'.$record->prefix);						
						$Info['sub_title_'.$record->prefix]= $this->input->post('sub_title_'.$record->prefix);										
						$Info['date_'.$record->prefix]=$this->input->post('date_'.$record->prefix);
						}
					}
				$Info['title']=$title;
				$Info['image']=$files;	
				$Info['website']=$website;								
				$Info['file']=$filess;
				$Info['createdBy']=$this->vendorId;
				$Info['createdDtm']=date('Y-m-d H:i:s');
				$Info['sort_order']=0;
                
                $result = $this->Pages_model->editrow($Info, $Id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Pages updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Pages updation failed');
                }
                
                redirect('admin/pages/Listing');
            }
        }


    /**
     * This function is used to delete the Pages using Id
     * @return boolean $result : TRUE / FALSE
     */
    function deleterow()
    {
        
            $Id = $this->input->post('Id');
            $Info = array('isDeleted'=>1,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            $result = $this->Pages_model->deleterow($Id, $Info);
            
            if ($result > 0) { 
			echo(json_encode(array('status'=>TRUE))); 
			}
            else { echo(json_encode(array('status'=>FALSE))); 
			}
        }
    
	    function deleteimage()
    {
        
            $Id = $this->input->post('id');
			$record = $this->Pages_model->getrecord($Id);
            $Info = array('image'=>'','updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            $result = $this->Pages_model->editrow($Info, $Id);
            if ($result > 0) { 
			unlink('./uploads/pages/'.$record->image);
			unlink('./uploads/pages/1980x1280/'.$record->image);
			echo(json_encode(array('status'=>TRUE))); 
			}
            else { echo(json_encode(array('status'=>FALSE))); 
			}
        }				function deletefile()    {                    $Id = $this->input->post('id');			$record = $this->Pages_model->getrecord($Id);            $Info = array('file'=>'','updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));            $result = $this->Pages_model->editrow($Info, $Id);            if ($result > 0) { 			unlink('./uploads/pages/'.$record->file);			echo(json_encode(array('status'=>TRUE))); 			}            else { echo(json_encode(array('status'=>FALSE))); 			}        }		
	
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
		   ->update("tbl_pages", array("sort_order" => $order + 1));
	  }
	}

}

?>