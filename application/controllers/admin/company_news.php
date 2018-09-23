<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : company_news (company_newsController)
 * company_news Class to control all company_news related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class company_news extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('company_news_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the company_news
     */
    public function index()
    {
        $this->global['pageTitle'] = ': Dashboard';
        
        $this->loadViews("admin/dashboard", $this->global, NULL , NULL);
    }
    
    /**
     * This function is used to load the company_news list
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
            
            $count = $this->company_news_model->ListingCount($searchText);

			//$returns = $this->paginationCompress ( "Listing/", $count, 5 );
			$returns = $this->paginationCompress ( $this->lang->lang()."/admin/company_news/Listing/", $count );
            
            $data['Records'] = $this->company_news_model->Listing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = ': company_news Listing';
            
            $this->loadViews("admin/company_news/list", $this->global, $data, NULL);
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
            $this->global['pageTitle'] = ': Add New company_news';
            $data['languages'] = $this->company_news_model->Listing_foreign('languages');

            $this->loadViews("admin/company_news/add", $this->global, $data, NULL);
        }
    }

    
    /**
     * This function is used to add new company_news to the system
     */
    function addNewrow()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $data_languages = $this->company_news_model->Listing_foreign('languages');
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
				$sub_title		= $this->input->post('sub_title');				
				$files = $filess = '';
				if ( !empty($_FILES['image']['name']) ) {
					$files=$this->company_news_model->uploadImage('image','company_news');
				}								if ( !empty($_FILES['file']['name']) ) {					
				$filess=$this->company_news_model->uploadFile('file','company_news');				}
				
				if(!empty($data_languages))
                    {
                        foreach($data_languages as $record)
                        {
						$Info['title_'.$record->prefix]=$this->input->post('title_'.$record->prefix);
						$Info['description_'.$record->prefix]=$this->input->post('description_'.$record->prefix);				
						$Info['sub_title_'.$record->prefix]= $this->input->post('sub_title_'.$record->prefix);										$Info['date_'.$record->prefix]=$this->input->post('date_'.$record->prefix);
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
				$Info['updatedDtm']=date('Y-m-d H:i:s');
				$Info['sort_order']=0;								
                $result = $this->company_news_model->addNewrow($Info);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New company_news created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'company_news creation failed');
                }
                
                redirect('admin/company_news/addNew');
            }
        }
    }

    
    /**
     * This function is used load company_news edit information
     * @param number $Id : Optional : This is company_news id
     */
    function editOld($Id = NULL)
    {
        
            if($Id == null)
            {
                redirect('Listing');
            }
            
			
            $data['Info'] = $this->company_news_model->getInfo($Id);
            
            $this->global['pageTitle'] = ': Edit company_news';
            $data['languages'] = $this->company_news_model->Listing_foreign('languages');
            
            $this->loadViews("admin/company_news/edit", $this->global, $data, NULL);
        }
    
    
    /**
     * This function is used to edit the company_news information
     */
    function editrow()
    {
            
            $Id = $this->input->post('id');
            $data_languages = $this->company_news_model->Listing_foreign('languages');
            
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
				$record = $this->company_news_model->getrecord($Id);
				
                if ( !empty($_FILES['image']['name']) ) {
				$files=$this->company_news_model->uploadImage('image','company_news');
				} else {
				$files= $record->image;
				}								if ( !empty($_FILES['file']['name']) ) {				$filess=$this->company_news_model->uploadFile('file','company_news');				} else {				$filess= $record->file;				}
                
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
                
                $result = $this->company_news_model->editrow($Info, $Id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'company_news updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'company_news updation failed');
                }
                
                redirect('admin/company_news/Listing');
            }
        }


    /**
     * This function is used to delete the company_news using Id
     * @return boolean $result : TRUE / FALSE
     */
    function deleterow()
    {
        
            $Id = $this->input->post('Id');
            $Info = array('isDeleted'=>1,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            $result = $this->company_news_model->deleterow($Id, $Info);
            
            if ($result > 0) { 
			echo(json_encode(array('status'=>TRUE))); 
			}
            else { echo(json_encode(array('status'=>FALSE))); 
			}
        }
    
	    function deleteimage()
    {
        
            $Id = $this->input->post('id');
			$record = $this->company_news_model->getrecord($Id);
            $Info = array('image'=>'','updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            $result = $this->company_news_model->editrow($Info, $Id);
            if ($result > 0) { 
			unlink('./uploads/company_news/'.$record->image);
			unlink('./uploads/company_news/1980x1280/'.$record->image);
			echo(json_encode(array('status'=>TRUE))); 
			}
            else { echo(json_encode(array('status'=>FALSE))); 
			}
        }				function deletefile()    {                    $Id = $this->input->post('id');			$record = $this->company_news_model->getrecord($Id);            $Info = array('file'=>'','updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));            $result = $this->company_news_model->editrow($Info, $Id);            if ($result > 0) { 			unlink('./uploads/company_news/'.$record->file);			echo(json_encode(array('status'=>TRUE))); 			}            else { echo(json_encode(array('status'=>FALSE))); 			}        }		
	
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
		   ->update("tbl_company_news", array("sort_order" => $order + 1));
	  }
	}

}

?>