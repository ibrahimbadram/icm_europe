<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : category_gal (category_galController)
 * category_gal Class to control all category_gal related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class category_gallery extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('category_gal_model');
        $this->load->model('websites_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the category_gal
     */
    public function index()
    {
        $this->global['pageTitle'] = ': Dashboard';
        
        $this->loadViews("admin/dashboard", $this->global, NULL , NULL);
    }
    
    /**
     * This function is used to load the category_gal list
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
            
            $count = $this->category_gal_model->ListingCount($searchText);

			//$returns = $this->paginationCompress ( "Listing/", $count, 5 );
			$returns = $this->paginationCompress ( $this->lang->lang()."/admin/category_gallery/Listing/", $count );
            
            $data['Records'] = $this->category_gal_model->Listing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = ': category_gal Listing';
            
            $this->loadViews("admin/category_gallery/list", $this->global, $data, NULL);
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
            $this->global['pageTitle'] = ': Add New category_gal';
            $data['languages'] = $this->category_gal_model->Listing_foreign('languages');
            $data['websites'] = $this->websites_model->Listing_foreign('websites');

            $this->loadViews("admin/category_gallery/add", $this->global, $data, NULL);
        }
    }

    
    /**
     * This function is used to add new category_gal to the system
     */
    function addNewrow()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $data_languages = $this->category_gal_model->Listing_foreign('languages');
            $this->form_validation->set_rules('title','title','trim|max_length[128]|xss_clean');
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
				$files = $filess = '';
				if ( !empty($_FILES['image']['name']) ) {
					$files=$this->category_gal_model->uploadImage('image','category_gal');
				}								if ( !empty($_FILES['file']['name']) ) {					
				$filess=$this->category_gal_model->uploadFile('file','category_gal');				}
				
				if(!empty($data_languages))
                    {
                        foreach($data_languages as $record)
                        {
						$Info['title_'.$record->prefix]=$this->input->post('title_'.$record->prefix);
						$Info['description_'.$record->prefix]=$this->input->post('description_'.$record->prefix);
						$Info['date_'.$record->prefix]=$this->input->post('date_'.$record->prefix);						
						}
					}
					
				$url_title = str_replace(array(" ","&",",","(",")",".","!","?",'"',"+","*","/","'"),array("-"),$this->input->post("title"));
				$url_title = preg_replace("/[^\w\s]+/u","-" ,$url_title);
				$url_title = str_replace(array("à"),array("a"),$url_title);
				$url_title = str_replace(array("è"),array("e"),$url_title);
				$url_title = str_replace(array("é"),array("e"),$url_title);
				$url_title = str_replace(array("ù"),array("u"),$url_title);
				//check first if the title exists
				$Info["url_title"] = $url_title;
				$Info['title']=$title;				
				$Info['image']=$files;			
				$Info['website']=$website;								
				$Info['file']=$filess;
				$Info['createdBy']=$this->vendorId;
				$Info['createdDtm']=date('Y-m-d H:i:s');
				$Info['sort_order']=0;								
                $result = $this->category_gal_model->addNewrow($Info);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New category_gal created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'category_gal creation failed');
                }
                
                redirect('admin/category_gallery/addNew');
            }
        }
    }

    
    /**
     * This function is used load category_gal edit information
     * @param number $Id : Optional : This is category_gal id
     */
    function editOld($Id = NULL)
    {
        
            if($Id == null)
            {
                redirect('Listing');
            }
            
			
            $data['Info'] = $this->category_gal_model->getInfo($Id);
            
            $this->global['pageTitle'] = ': Edit category_gal';
            $data['languages'] = $this->category_gal_model->Listing_foreign('languages');
            $data['websites'] = $this->websites_model->Listing_foreign('websites');
			
            $this->loadViews("admin/category_gallery/edit", $this->global, $data, NULL);
        }
    
    
    /**
     * This function is used to edit the category_gal information
     */
    function editrow()
    {
            
            $Id = $this->input->post('id');
            $data_languages = $this->category_gal_model->Listing_foreign('languages');
            
            $this->form_validation->set_rules('title','title','trim|max_length[128]|xss_clean');
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
				$record = $this->category_gal_model->getrecord($Id);
				
                if ( !empty($_FILES['image']['name']) ) {
				$files=$this->category_gal_model->uploadImage('image','category_gal');
				} else {
				$files= $record->image;
				}								if ( !empty($_FILES['file']['name']) ) {				$filess=$this->category_gal_model->uploadFile('file','category_gal');				} else {				$filess= $record->file;				}
                
                if(!empty($data_languages))
                    {
                        foreach($data_languages as $record)
                        {
							$Info['title_'.$record->prefix]=$this->input->post('title_'.$record->prefix);
							$Info['description_'.$record->prefix]=$this->input->post('description_'.$record->prefix);	
							$Info['date_'.$record->prefix]=$this->input->post('date_'.$record->prefix);
						}
					}
				$url_title = str_replace(array(" ","&",",","(",")",".","!","?",'"',"+","*","/","'"),array("-"),$this->input->post("title"));
				$url_title = preg_replace("/[^\w\s]+/u","-" ,$url_title);
				$url_title = str_replace(array("à"),array("a"),$url_title);
				$url_title = str_replace(array("è"),array("e"),$url_title);
				$url_title = str_replace(array("é"),array("e"),$url_title);
				$url_title = str_replace(array("ù"),array("u"),$url_title);
				//check first if the title exists
				//$Info["url_title"] = $url_title;
				$Info['title']=$title;
				$Info['image']=$files;	
				$Info['website']=$website;								
				$Info['file']=$filess;
				$Info['updatedBy']=$this->vendorId;
				$Info['updatedDtm']=date('Y-m-d H:i:s');
				$Info['sort_order']=0;
                //print_r($Info);
				//exit;
                $result = $this->category_gal_model->editrow($Info, $Id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'category_gal updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'category_gal updation failed');
                }
                
                redirect('admin/category_gallery/Listing');
            }
        }


    /**
     * This function is used to delete the category_gal using Id
     * @return boolean $result : TRUE / FALSE
     */
    function deleterow()
    {
        
            $Id = $this->input->post('Id');
            $Info = array('isDeleted'=>1,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            $result = $this->category_gal_model->deleterow($Id, $Info);
            
            if ($result > 0) { 
			echo(json_encode(array('status'=>TRUE))); 
			}
            else { echo(json_encode(array('status'=>FALSE))); 
			}
        }
    
	    function deleteimage()
    {
        
            $Id = $this->input->post('id');
			$record = $this->category_gal_model->getrecord($Id);
            $Info = array('image'=>'','updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            $result = $this->category_gal_model->editrow($Info, $Id);
            if ($result > 0) { 
			unlink('./uploads/category_gal/'.$record->image);
			unlink('./uploads/category_gal/1980x1280/'.$record->image);
			echo(json_encode(array('status'=>TRUE))); 
			}
            else { echo(json_encode(array('status'=>FALSE))); 
			}
        }				
		function deletefile(){                    
			$Id = $this->input->post('id');			
			$record = $this->category_gal_model->getrecord($Id);            
			$Info = array('file'=>'','updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
			$result = $this->category_gal_model->editrow($Info, $Id);            
			if ($result > 0) { 			
				unlink('./uploads/category_gal/'.$record->file);			
				echo(json_encode(array('status'=>TRUE))); 			
			}            
			else { 
				echo(json_encode(array('status'=>FALSE))); 			
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
		   ->update("tbl_category_gal", array("sort_order" => $order + 1));
	  }
	}

}

?>