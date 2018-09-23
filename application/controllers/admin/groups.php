<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : groups (groupsController)
 * groups Class to control all groups related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Groups extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('groups_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the groups
     */
    public function index()
    {
        $this->global['pageTitle'] = ': Dashboard';
        
        $this->loadViews("admin/dashboard", $this->global, NULL , NULL);
    }
    
    /**
     * This function is used to load the groups list
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
            
            $count = $this->groups_model->ListingCount($searchText);

			//$returns = $this->paginationCompress ( "Listing/", $count, 5 );
			$returns = $this->paginationCompress ( "Listing/", $count );
            
            $data['Records'] = $this->groups_model->Listing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = ': groups Listing';
            
            $this->loadViews("admin/groups/list", $this->global, $data, NULL);
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
            $this->global['pageTitle'] = ': Add New groups';
            $data['languages'] = $this->groups_model->Listing_foreign('languages');
            $data['users'] = $this->groups_model->Listing_foreign_users('users');
            $this->loadViews("admin/groups/add", $this->global, $data, NULL);
        }
    }

    
    /**
     * This function is used to add new groups to the system
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
			$this->form_validation->set_rules('active','active','trim|required|max_length[20]');
			$this->form_validation->set_rules('all_languages','languages','trim|required');
			if ( $this->input->post('all_languages') != 1 ) {
            $this->form_validation->set_rules('languages[]','languages','required'); 
			} else {
			$this->form_validation->set_rules('languages[]','languages','trim');	
			}
			$this->form_validation->set_rules('type','type','trim|required');
			if ( $this->input->post('type') != 1 ) {
            $this->form_validation->set_rules('read[]','read','trim'); 
            $this->form_validation->set_rules('write[]','write','trim'); 
            $this->form_validation->set_rules('delete[]','delete','trim'); 
			} else {
			$this->form_validation->set_rules('read','read','trim');	
			$this->form_validation->set_rules('write','write','trim');	
			$this->form_validation->set_rules('delete','delete','trim');
			}
            $this->form_validation->set_rules('users','users','required'); 
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNew();
            }
            else
            {
                $title = ucwords(strtolower($this->input->post('title')));
                $active = $this->input->post('active');
				$all_languages = $this->input->post('all_languages');
				$languages = $this->input->post('languages');
				$users = $this->input->post('users');
				$all_pages = $this->input->post('type');
				$read = $this->input->post('read');
				$write = $this->input->post('write');
				$delete = $this->input->post('delete');
				
				/*echo 'title '.$title.'<br>';
				echo 'active '.$active.'<br>';
				echo 'all languages '.$all_languages.'<br>';
				echo 'languages '.$languages.'<br>';
				echo 'users '.$users.'<br>';
				echo 'all pages '.$all_pages.'<br>';
				echo 'read '; print_r($read).'<br>';
				echo 'write '; print_r($write).'<br>';
				echo 'delete '; print_r($delete).'<br>';
				exit;*/
				
				  $Info = array('title'=>$title, 'active'=>$active, 'all_languages'=>$all_languages, 'all_pages'=>$all_pages, 'createdBy'=>$this->vendorId, 'createdDtm'=>date('Y-m-d H:i:s'), 'sort_order'=> 0);
                  $result = $this->groups_model->addNewrow($Info);
				  // echo $result;
				  //exit;
				  if ( count($languages) > 0 && $all_languages == 0 ) {
					  foreach ( $languages as $l ) {
				  $Info2 = array('tbl_groups'=>$result, 'tbl_languages'=>$l,'createdBy'=>$this->vendorId, 'createdDtm'=>date('Y-m-d H:i:s'), 'sort_order'=> 0);
				  $result2 = $this->groups_model->addNewrow_table('tbl_groups_languages',$Info2);
					  }
				  }
				  if ( $all_pages == 0 ) {
					  if ( count($read) > 0 ) {
					foreach ( $read as $a ) {  
				  $Info3 = array('tbl_groups'=>$result, 'can_read'=>$a,'createdBy'=>$this->vendorId, 'createdDtm'=>date('Y-m-d H:i:s'), 'sort_order'=> 0);
				  $result3 = $this->groups_model->addNewrow_table('tbl_groups_permissions',$Info3);
					}
					}
					if ( count($write) > 0 ) {
					foreach ( $write as $w ) {  
				  $Info4 = array('tbl_groups'=>$result, 'can_write'=>$w,'createdBy'=>$this->vendorId, 'createdDtm'=>date('Y-m-d H:i:s'), 'sort_order'=> 0);
				  $result4 = $this->groups_model->addNewrow_table('tbl_groups_permissions',$Info4);
					}
					}
					if ( count($delete) > 0 ) {
					foreach ( $delete as $d ) {  
				  $Info5 = array('tbl_groups'=>$result, 'can_delete'=>$d,'createdBy'=>$this->vendorId, 'createdDtm'=>date('Y-m-d H:i:s'), 'sort_order'=> 0);
				  $result5 = $this->groups_model->addNewrow_table('tbl_groups_permissions',$Info5);
					}
					}
				  }
				  if ( count($users) > 0 ) {
					foreach ( $users as $u ) {  
				  $Info6 = array('userId'=>$u, 'tbl_groups'=>$result,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
				  $result6 = $this->groups_model->editrow_table('tbl_users',$Info6);
					}
					}
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New groups created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'groups creation failed');
                }
                
                redirect(site_url('admin/groups/addNew'));
            }
        }
    }

    
    /**
     * This function is used load groups edit information
     * @param number $groupsId : Optional : This is groups id
     */
    function editOld($Id = NULL)
    {
        
            if($Id == null)
            {
                redirect(site_url('admin/groups/Listing'));
            }
            
			
            $data['Info'] = $this->groups_model->getinfo($Id);
            
            $this->global['pageTitle'] = ': Edit groups';
            $data['languages'] = $this->groups_model->Listing_foreign('languages');
            $data['users'] = $this->groups_model->Listing_foreign_users('users');
            $data['groups_permissions'] = $this->groups_model->Listing_foreign('groups_permissions');
            $data['groups_languages'] = $this->groups_model->Listing_foreign('groups_languages');
            
            $this->loadViews("admin/groups/edit", $this->global, $data, NULL);
        }
    
    
    /**
     * This function is used to edit the groups information
     */
    function editrow()
    {
            
            $Id = $this->input->post('id');
            
            $this->form_validation->set_rules('title','title','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('active','active','required|max_length[20]');
			$this->form_validation->set_rules('all_languages','languages','trim|required');
			if ( $this->input->post('all_languages') != 1 ) {
            $this->form_validation->set_rules('languages[]','languages','required'); 
			} else {
			$this->form_validation->set_rules('languages[]','languages','trim');	
			}
			$this->form_validation->set_rules('type','type','trim|required');
			if ( $this->input->post('type') != 1 ) {
            $this->form_validation->set_rules('read[]','read','trim'); 
            $this->form_validation->set_rules('write[]','write','trim'); 
            $this->form_validation->set_rules('delete[]','delete','trim'); 
			} else {
			$this->form_validation->set_rules('read','read','trim');	
			$this->form_validation->set_rules('write','write','trim');	
			$this->form_validation->set_rules('delete','delete','trim');
			}
            $this->form_validation->set_rules('users','users','required'); 
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editOld($Id);
            }
            else
            {
                $title = ucwords(strtolower($this->input->post('title')));
                $active = $this->input->post('active');
                
                $Info = array();
				$result = $this->groups_model->getrecord($Id);
                
                $title = ucwords(strtolower($this->input->post('title')));
                $active = $this->input->post('active');
				$all_languages = $this->input->post('all_languages');
				$languages = $this->input->post('languages');
				$users = $this->input->post('users');
				$all_pages = $this->input->post('type');
				$read = $this->input->post('read');
				$write = $this->input->post('write');
				$delete = $this->input->post('delete');
				
				/*echo 'title '.$title.'<br>';
				echo 'active '.$active.'<br>';
				echo 'all languages '.$all_languages.'<br>';
				echo 'languages '.$languages.'<br>';
				echo 'users '.$users.'<br>';
				echo 'all pages '.$all_pages.'<br>';
				echo 'read '; print_r($read).'<br>';
				echo 'write '; print_r($write).'<br>';
				echo 'delete '; print_r($delete).'<br>';
				exit;*/
				
				  $Info = array('title'=>$title, 'active'=>$active, 'all_languages'=>$all_languages, 'all_pages'=>$all_pages, 'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'), 'sort_order'=> 0);
                  $result = $this->groups_model->editrow_table('tbl_groups',$Info,$Id);
				  // echo $result;
				  //exit;
				  
				  if ( count($languages) > 0 && $all_languages == 0 ) {
				 $this->db->delete('tbl_groups_languages',array('tbl_groups'=>$Id));
					  foreach ( $languages as $l ) {
				  $Info2 = array('tbl_groups'=>$result, 'tbl_languages'=>$l,'createdBy'=>$this->vendorId, 'createdDtm'=>date('Y-m-d H:i:s'), 'sort_order'=> 0);
				  $result2 = $this->groups_model->addNewrow_table('tbl_groups_languages',$Info2);
					  }
				  }
				  if ( $all_pages == 0 ) {
					  if ( count($read) > 0 ) {
					foreach ( $read as $a ) { 
					$this->db->delete('tbl_groups_permissions',array('tbl_groups'=>$Id,'can_read'=>$a)); 
				  $Info3 = array('tbl_groups'=>$result, 'can_read'=>$a,'createdBy'=>$this->vendorId, 'createdDtm'=>date('Y-m-d H:i:s'), 'sort_order'=> 0);
				  $result3 = $this->groups_model->addNewrow_table('tbl_groups_permissions',$Info3);
					}
					}
					if ( count($write) > 0 ) {
					foreach ( $write as $w ) { 
					$this->db->delete('tbl_groups_permissions',array('tbl_groups'=>$Id,'can_write'=>$a));  
				  $Info4 = array('tbl_groups'=>$result, 'can_write'=>$w,'createdBy'=>$this->vendorId, 'createdDtm'=>date('Y-m-d H:i:s'), 'sort_order'=> 0);
				  $result4 = $this->groups_model->addNewrow_table('tbl_groups_permissions',$Info4);
					}
					}
					if ( count($delete) > 0 ) {
					foreach ( $delete as $d ) { 
					$this->db->delete('tbl_groups_permissions',array('tbl_groups'=>$Id,'can_delete'=>$a));  
				  $Info5 = array('tbl_groups'=>$result, 'can_delete'=>$d,'createdBy'=>$this->vendorId, 'createdDtm'=>date('Y-m-d H:i:s'), 'sort_order'=> 0);
				  $result5 = $this->groups_model->addNewrow_table('tbl_groups_permissions',$Info5);
					}
					}
				  }
				  if ( count($users) > 0 ) {
					foreach ( $users as $u ) {  
				  $Info6 = array('userId'=>$u, 'tbl_groups'=>$result,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
				  $result6 = $this->groups_model->editrow_table('tbl_users',$Info6,$u);
					}
					}
               
                
                //$result = $this->groups_model->editrow($Info, $Id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'groups updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'groups updation failed');
                }
                
                redirect(site_url('admin/groups/Listing'));
            }
			redirect(site_url('admin/groups/Listing'));
        }


    /**
     * This function is used to delete the groups using groupsId
     * @return boolean $result : TRUE / FALSE
     */
    function deleterow()
    {
        
            $id = $this->input->post('id');
            $Info = array('isDeleted'=>1,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            $result = $this->groups_model->deleterow($id, $Info);
            
            if ($result > 0) { 
			echo(json_encode(array('status'=>TRUE))); 
			}
            else { echo(json_encode(array('status'=>FALSE))); 
			}
        }
    
	    function deleteimage()
    {
        
            $Id = $this->input->post('id');
			$record = $this->groups_model->getrecord($Id);
            $Info = array('image'=>'','updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            $result = $this->groups_model->editrow($Info, $Id);
            if ($result > 0) { 
			unlink('./uploads/groups/'.$record->image);
			unlink('./uploads/groups/1980x1280/'.$record->image);
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
		   ->update("tbl_groups", array("sort_order" => $order + 1));
	  }
	}


}

?>