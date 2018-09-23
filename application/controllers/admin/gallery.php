<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : gallery (galleryController)
 * gallery Class to control all gallery related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class gallery extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('gallery_model');
        $this->load->model('category_gal_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the gallery
     */
    public function index()
    {
        $this->global['pageTitle'] = ': Dashboard';
        
        $this->loadViews("admin/dashboard", $this->global, NULL , NULL);
    }
    
    /**
     * This function is used to load the gallery list
     */
    function Listing($category_gal=0)
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
            
            $count = $this->gallery_model->ListingCount($searchText);

			//$returns = $this->paginationCompress ( "Listing/", $count, 5 );
			$returns = $this->paginationCompress ( $this->lang->lang()."/admin/gallery/Listing/".$this->uri->segment(5)."/", $count );
            
			
            $data['Records'] = $this->gallery_model->Listing($searchText, $returns["page"], $this->uri->segment(6),$category_gal);
            
            $this->global['pageTitle'] = ': gallery Listing';
            
            $this->loadViews("admin/gallery/list", $this->global, $data, NULL);
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
            $this->global['pageTitle'] = ': Add New gallery';
            $data['languages'] = $this->gallery_model->Listing_foreign('languages');
			$data['category_gal'] = $this->category_gal_model->getrecord($this->uri->segment(5));
			
            $this->loadViews("admin/gallery/add", $this->global, $data, NULL);
        }
    }

    
    /**
     * This function is used to add new gallery to the system
     */
    function addNewrow($category_gal=0)
	
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $data_languages = $this->gallery_model->Listing_foreign('languages');
            $this->form_validation->set_rules('title','title','trim|max_length[128]|xss_clean');
            $this->form_validation->set_rules('image','image','trim|xss_clean|max_length[128]');    
            
			if(!empty($data_languages))
                    {
                        foreach($data_languages as $record)
                        {
            $this->form_validation->set_rules('title_'.$record->prefix,'title '.$record->prefix,'trim');
						}
					}
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNew();
            }
            else
            {
                $title 		 	= $this->input->post('title');             
				$date 			= $this->input->post('date');           			
				$files = '';
				if ( !empty($_FILES['image']['name']) ) {
					$files=$this->gallery_model->uploadImage('image','gallery');
				}
				
				if(!empty($data_languages))
                    {
                        foreach($data_languages as $record)
                        {
						$Info['title_'.$record->prefix]=$this->input->post('title_'.$record->prefix);
						$Info['date_'.$record->prefix]=$this->input->post('date_'.$record->prefix);						
						}
					}
					
				//check first if the title exists
				$Info['title']=$title;				
				$Info['image']=$files;	
				$Info['category_gal']=$category_gal;	
				$Info['createdBy']=$this->vendorId;
				$Info['createdDtm']=date('Y-m-d H:i:s');
				$Info['sort_order']=0;								
                $result = $this->gallery_model->addNewrow($Info);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New gallery created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'gallery creation failed');
                }
                
                redirect('admin/gallery/addNew/'.$category_gal);
            }
        }
    }

    
    /**
     * This function is used load gallery edit information
     * @param number $Id : Optional : This is gallery id
     */
    function editOld($Id = NULL)
    {
        
            if($Id == null)
            {
                redirect('Listing');
            }
            
			
            $data['Info'] = $this->gallery_model->getInfo($Id);
            
            $this->global['pageTitle'] = ': Edit gallery';
            $data['languages'] = $this->gallery_model->Listing_foreign('languages');
			
			
            $this->loadViews("admin/gallery/edit", $this->global, $data, NULL);
        }
    
    
    /**
     * This function is used to edit the gallery information
     */
    function editrow($category_gal=0)
    {
            
            $Id = $this->input->post('id');
            $data_languages = $this->gallery_model->Listing_foreign('languages');
            
            $this->form_validation->set_rules('title','title','trim|max_length[128]|xss_clean');
            $this->form_validation->set_rules('image','image','trim|xss_clean|max_length[128]'); 
            
				if(!empty($data_languages))
                    {
                        foreach($data_languages as $record)
                        {
            $this->form_validation->set_rules('title_'.$record->prefix,'title '.$record->prefix,'trim');
						}
					}
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editOld($Id);
            }
            else
            {
                $title = ucwords(strtolower($this->input->post('title')));
                
                $Info = array();
				$record = $this->gallery_model->getrecord($Id);
				
				
                if ( !empty($_FILES['image']['name']) ) {
				$files=$this->gallery_model->uploadImage('image','gallery');
				} else {
				$files= $record->image;
				}
                
                if(!empty($data_languages))
                    {
                        foreach($data_languages as $record)
                        {
							$Info['title_'.$record->prefix]=$this->input->post('title_'.$record->prefix);	
							$Info['date_'.$record->prefix]=$this->input->post('date_'.$record->prefix);
						}
					}
				
				//check first if the title exists
				//$Info["url_title"] = $url_title;
				$Info['title']=$title;
				$Info['image']=$files;		
				$Info['updatedBy']=$this->vendorId;
				$Info['updatedDtm']=date('Y-m-d H:i:s');
				$Info['sort_order']=0;
                //print_r($Info);
				//exit;
                $result = $this->gallery_model->editrow($Info, $Id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'gallery updated successfully');
					
                }
                else
                {
                    $this->session->set_flashdata('error', 'gallery updation failed');
                }
                
                redirect('admin/gallery/Listing/'.$category_gal);
            }
        }


    /**
     * This function is used to delete the gallery using Id
     * @return boolean $result : TRUE / FALSE
     */
    function deleterow()
    {
        
            $Id = $this->input->post('Id');
            $Info = array('isDeleted'=>1,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            $result = $this->gallery_model->deleterow($Id, $Info);
            
            if ($result > 0) { 
			echo(json_encode(array('status'=>TRUE))); 
			}
            else { echo(json_encode(array('status'=>FALSE))); 
			}
        }
    
	    function deleteimage()
    {
        
            $Id = $this->input->post('id');
			$record = $this->gallery_model->getrecord($Id);
            $Info = array('image'=>'','updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            $result = $this->gallery_model->editrow($Info, $Id);
            if ($result > 0) { 
			unlink('./uploads/gallery/'.$record->image);
			unlink('./uploads/gallery/1980x1280/'.$record->image);
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
		   ->update("tbl_gallery", array("sort_order" => $order + 1));
	  }
	}

}

?>