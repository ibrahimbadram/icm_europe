<?php if(!defined('BASEPATH')) exit('No direct script access allowed');



class Campaigns_model extends CI_Model

{

    /**

     * This function is used to get the campaigns listing count

     * @param string $searchText : This is optional search text

     * @return number $count : This is row count

     */

    function ListingCount($searchText = '')

    {

        $this->db->select('BaseTbl.id, BaseTbl.title, BaseTbl.campaign_id, BaseTbl.active');

        $this->db->from('tbl_campaigns as BaseTbl');

        $this->db->where('BaseTbl.isDeleted', 0);

        $query = $this->db->get();

        return count($query->result());

    }

    

    /**

     * This function is used to get the campaigns listing count

     * @param string $searchText : This is optional search text

     * @param number $page : This is pagination offset

     * @param number $segment : This is pagination limit

     * @return array $result : This is result

     */

    function Listing($searchText = '', $page, $segment)

    {

        $this->db->select('BaseTbl.id, BaseTbl.title, BaseTbl.campaign_id, BaseTbl.active');

        $this->db->from('tbl_campaigns as BaseTbl');

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

    



    function addNewrow($campaignsInfo)

    {

        $this->db->trans_start();

		//print_r($campaignsInfo);exit;

        $this->db->insert('tbl_campaigns', $campaignsInfo);

        

        $insert_id = $this->db->insert_id();

        

        $this->db->trans_complete();

        

        return $insert_id;

    }

    

    /**

     * This function used to get campaigns information by id

     * @param number $id : This is campaigns id

     * @return array $result : This is campaigns information

     */

	 

	 function getrecord($id)

    {

        $this->db->select('id, title, campaign_id, active');

        $this->db->from('tbl_campaigns');

        $this->db->where('isDeleted', 0);

        $this->db->where('id', $id);

		

        $query = $this->db->get();

        

        return $query->row();

    }

	

    function getinfo($id)

    {

        $this->db->select('id, title, campaign_id, active');

        $this->db->from('tbl_campaigns');

        $this->db->where('isDeleted', 0);

        $this->db->where('id', $id);

        $query = $this->db->get();

        

        return $query->result();

    }

    

    

    /**

     * This function is used to update the campaigns information

     * @param array $campaignsInfo : This is campaigns updated information

     * @param number $id : This is campaigns id

     */

    function editrow($campaignsInfo, $id)

    {

        $this->db->where('id', $id);

        $this->db->update('tbl_campaigns', $campaignsInfo);

        

        return TRUE;

    }

    

    

    

    /**

     * This function is used to delete the campaigns information

     * @param number $id : This is campaigns id

     * @return boolean $result : TRUE / FALSE

     */

    function deleterow($id, $campaignsInfo)

    {

        $this->db->where('id', $id);

        $this->db->update('tbl_campaigns', $campaignsInfo);

        

        return $this->db->affected_rows();

    }



   public function uploadlang($lang,$uploaddir) { 

	  $config = array();

      $config['upload_path']   = './uploads/'.$uploaddir; 

      $config['allowed_types'] = 'gif|jpg|png|jpeg'; 

      $config['max_size'] = 5024;

      $config['remove_spaces'] = TRUE;

      $this->load->library('upload', $config);

	  $this->upload->initialize($config);

      if ( !$this->upload->do_upload($lang,true)) {

         $error = array('error' => $this->upload->display_errors()); 

		 print_r($error);

          exit;

      }else { 

        $path = $this->upload->data();

		$this->lang_lib->lang_compress($uploaddir, $path["file_name"]);

		$this->thumb($path["file_name"],$uploaddir);

			return  $path["file_name"];

      } 

   }



	private function thumb( $name='',$uploaddir='' ) {

		$config['source_lang']   = './uploads/'.$uploaddir.'/'.$name;

		$config['new_lang']   = './uploads/'.$uploaddir.'/1980x1280/'.$name;

		$config['maintain_ratio'] = TRUE;

		$config['width']          = 1980;

		$config['height']         = 1280;

		$this->load->library('lang_lib', $config);

		$this->lang_lib->initialize($config);

		// resize

		if ( ! $this->lang_lib->resize())

		{

			print_r($this->lang_lib->display_errors());

				exit;

			$error['resize'][] = $this->lang_lib->display_errors();

		}

		else

		{

			 $path = $this->upload->data();

			 

			// otherwise, put each upload data to an array.

			//$success[] = $upload_data;

			

			//Compress the lang after resize

			$this->lang_lib->lang_compress($uploaddir.'/1980x1280', $path["file_name"]);

					

		}

	}

    /**

     * This function is used to match campaigns password for change password

     * @param number $id : This is campaigns id

     */

	 



}



  