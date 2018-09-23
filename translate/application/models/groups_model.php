<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Groups_model extends CI_Model
{
    /**
     * This function is used to get the groups listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function ListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.id, BaseTbl.title, BaseTbl.active, BaseTbl.all_languages, BaseTbl.all_pages');
        $this->db->from('tbl_groups as BaseTbl');
        $this->db->where('BaseTbl.isDeleted', 0);
        $query = $this->db->get();
        
        return count($query->result());
    }
    
    /**
     * This function is used to get the groups listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
	 function Listing_foreign($table)
    {
        $this->db->select('*');
        $this->db->from('tbl_'.$table.' as BaseTbl');
		$this->db->order_by('sort_order','desc');
        $this->db->where('BaseTbl.isDeleted', 0);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
	
	function Listing_foreign_users($table)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.name, BaseTbl.tbl_groups, BaseTbl.roleId');
        $this->db->from('tbl_'.$table.' as BaseTbl');
        $this->db->where('BaseTbl.isDeleted', 0);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
	
    function Listing($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.id, BaseTbl.title,  BaseTbl.active, BaseTbl.all_languages, BaseTbl.all_pages');
        $this->db->from('tbl_groups as BaseTbl');
		$this->db->order_by('sort_order','desc');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isDeleted', 0);
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    

    function addNewrow($groupsInfo)
    {
        $this->db->trans_start();
		
        $this->db->insert('tbl_groups', $groupsInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
	
    function addNewrow_table($table,$groupsInfo)
    {
        $this->db->trans_start();
		
        $this->db->insert($table, $groupsInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    /**
     * This function used to get groups information by id
     * @param number $id : This is groups id
     * @return array $result : This is groups information
     */
	 
	 function getrecord($id)
    {
        $this->db->select('id, title,  active, all_languages, all_pages');
        $this->db->from('tbl_groups');
        $this->db->where('isDeleted', 0);
        $this->db->where('id', $id);
		
        $query = $this->db->get();
        
        return $query->row();
    }
	
    function getinfo($id)
    {
        $this->db->select('id, title,  active, all_languages, all_pages');
        $this->db->from('tbl_groups');
        $this->db->where('isDeleted', 0);
        $this->db->where('id', $id);
        $query = $this->db->get();
        
        return $query->result();
    }
    
    
    /**
     * This function is used to update the groups information
     * @param array $groupsInfo : This is groups updated information
     * @param number $id : This is groups id
     */
    function editrow($groupsInfo, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_groups', $groupsInfo);
        
        return TRUE;
    }
    
    function editrow_table($table,$groupsInfo, $id)
    {
        $this->db->where('id', $id);
        $this->db->update($table, $groupsInfo);
        
        return TRUE;
    }
    
    /**
     * This function is used to delete the groups information
     * @param number $id : This is groups id
     * @return boolean $result : TRUE / FALSE
     */
    function deleterow($id, $groupsInfo)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_groups', $groupsInfo);
        
        return $this->db->affected_rows();
    }

   public function uploadImage($image,$uploaddir) { 
	  $config = array();
      $config['upload_path']   = './uploads/'.$uploaddir; 
      $config['allowed_types'] = 'gif|jpg|png|jpeg'; 
      $config['max_size'] = 5024;
      $config['remove_spaces'] = TRUE;
      $this->load->library('upload', $config);
	  $this->upload->initialize($config);
      if ( !$this->upload->do_upload($image,true)) {
         $error = array('error' => $this->upload->display_errors()); 
		 print_r($error);
          exit;
      }else { 
        $path = $this->upload->data();
		$this->thumb($path["file_name"],$uploaddir);
		$this->image_lib->image_compress($uploaddir, $path["file_name"]);
			return  $path["file_name"];
      } 
   }

	private function thumb( $name='',$uploaddir='' ) {
		$config['source_image']   = './uploads/'.$uploaddir.'/'.$name;
		$config['new_image']   = './uploads/'.$uploaddir.'/1980x1280/'.$name;
		$config['maintain_ratio'] = TRUE;
		$config['width']          = 1980;
		$config['height']         = 1280;
		$this->load->library('image_lib', $config);
		$this->image_lib->initialize($config);
		// resize
		if ( ! $this->image_lib->resize())
		{
			print_r($this->image_lib->display_errors());
				exit;
			$error['resize'][] = $this->image_lib->display_errors();
		}
		else
		{
			 $path = $this->upload->data();
			 
			// otherwise, put each upload data to an array.
			//$success[] = $upload_data;
			
			//Compress the image after resize
			$this->image_lib->image_compress($uploaddir.'/1980x1280', $path["file_name"]);
					
		}
	}
    /**
     * This function is used to match groups password for change password
     * @param number $id : This is groups id
     */
	 

}

  