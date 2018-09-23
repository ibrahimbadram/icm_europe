<?php if(!defined('BASEPATH')) exit('No direct script access allowed');



class websites_model extends CI_Model

{

    /**

     * This function is used to get the websites listing count

     * @param string $searchText : This is optional search text

     * @return number $count : This is row count

     */

    function ListingCount($searchText = '')

    {

        $this->db->select('*');

		  if(!empty($searchText)) {

            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";

            $this->db->where($likeCriteria);

        }

        $this->db->from('tbl_websites as BaseTbl');

        $this->db->where('BaseTbl.isDeleted', 0);

        $query = $this->db->get();

        

        return count($query->result());

    }

    

    /**

     * This function is used to get the websites listing count

     * @param string $searchText : This is optional search text

     * @param number $page : This is pagination offset

     * @param number $segment : This is pagination limit

     * @return array $result : This is result

     */

    function Listing($searchText = '', $page, $segment)

    {

        $this->db->select('*');

        $this->db->from('tbl_websites as BaseTbl');

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



    function addNewrow($websitesInfo)

    {

        $this->db->trans_start();

		//print_r($websitesInfo);exit;

        $this->db->insert('tbl_websites', $websitesInfo);

        

        $insert_id = $this->db->insert_id();

        

        $this->db->trans_complete();

        

        return $insert_id;

    }

    

    /**

     * This function used to get websites information by id

     * @param number $id : This is websites id

     * @return array $result : This is websites information

     */

	 

	 function getrecord($id)

    {

        $this->db->select('*');

        $this->db->from('tbl_websites');

        $this->db->where('isDeleted', 0);

        $this->db->where('id', $id);

		

        $query = $this->db->get();

        

        return $query->row();

    }

	

    function getinfo($id)

    {

        $this->db->select('*');

        $this->db->from('tbl_websites');

        $this->db->where('isDeleted', 0);

        $this->db->where('id', $id);

        $query = $this->db->get();

        

        return $query->result();

    }

    

    

    /**

     * This function is used to update the websites information

     * @param array $websitesInfo : This is websites updated information

     * @param number $id : This is websites id

     */

    function editrow($websitesInfo, $id)

    {

        $this->db->where('id', $id);

        $this->db->update('tbl_websites', $websitesInfo);

        

        return TRUE;

    }

    

    

    

    /**

     * This function is used to delete the websites information

     * @param number $id : This is websites id

     * @return boolean $result : TRUE / FALSE

     */

    function deleterow($id, $websitesInfo)

    {

        $this->db->where('id', $id);

       // $this->db->update('tbl_websites', $websitesInfo);
        $this->db->delete('tbl_websites');

        

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

	  

	  $this->load->library('image_lib', $config);

      if ( !$this->upload->do_upload($image,true)) {

         $error = array('error' => $this->upload->display_errors()); 

		 print_r($error);

          exit;

      }else { 

        $path = $this->upload->data();

		$this->image_lib->image_compress($uploaddir, $path["file_name"]);

		$this->thumb($path["file_name"],$uploaddir);

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

     * This function is used to match websites password for change password

     * @param number $id : This is websites id

     */

	 



}



  