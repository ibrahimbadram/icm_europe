<?php
class Sm extends CI_Model {
	
function getAllRecords($table,$cond="",$order="",$limit="",$group_by=""){
if(!empty($cond))
$this->db->where($cond);
if(!empty($order))
$this->db->order_by($order,'asc');
if(!empty($limit))
$this->db->limit($limit);
if(!empty($group_by))
$this->db->group_by($group_by);
$this->db->where('IsDeleted',FALSE);
$q = $this->db->get($table);
return $q->result_array();
}
function getAllrecords_nowebsite($table,$cond="",$order="",$limit="",$group_by=""){
if(!empty($cond))
$this->db->where($cond);
if(!empty($order))
$this->db->order_by($order,'asc');
if(!empty($limit))
$this->db->limit($limit);
if(!empty($group_by))
$this->db->group_by($group_by);
$this->db->where('IsDeleted',FALSE);
$q = $this->db->get($table);
return $q->result_array();
}
function getRecord($table,$cond=""){
if(!empty($cond))
$this->db->where($cond);
$q = $this->db->get($table);
return $q->row();
}
function getoneRecord($table,$cond=""){
if(!empty($cond))
$this->db->where($cond);
$q = $this->db->get($table);
return $q->row_array();
}
function getcell($table,$cond,$column){
$this->db->from($table);
$this->db->where($cond);
return $this->db->get()->row()->$table;
}
function getword($word,$column){
$this->db->from('tbl_words');
$this->db->where(array('title'=>$word, 'isDeleted'=>0));
return $this->db->get()->row()->$column;
}

function getcontent($word,$column){
$this->db->from('tbl_pages');
$this->db->where(array('title'=>$word, 'isDeleted'=>0));
return $this->db->get()->row()->$column;
}
public function get_cond($from,$to,$col,$cond,$table){
$this->db->limit($from,$to);
$this->db->where('IsDeleted',0);
$this->db->where($cond);
$this->db->order_by($col,'DESC');
$query=$this->db->get($table);
return $query->result_array();
}
function getFirstRecord($table,$cond="",$order=""){
if(!empty($cond))
$this->db->where($cond);
if(!empty($order))
$this->db->order_by($order,'asc');
$this->db->limit(1);
$q = $this->db->get($table);
return $q->row();
}
function search($keyword,$table){
$this->db->where('IsDeleted',false);
$this->db->like('title',$keyword);
$this->db->or_like('description',$keyword);
$q = $this->db->get($table);
return $q->result_array();
}
function create_popup_registration()
{
$this->db->set('name', $this->input->post('name'));
$this->db->set('last_name', $this->input->post('last_name'));
$this->db->set('email', $this->input->post('email'));
$this->db->set('lang_ref', $this->input->post('lang_ref'));
$this->db->set('website', site_url());
$this->db->set('phone_code', $this->input->post('phone_code'));
$this->db->set('phone', $this->input->post('phone'));
$this->db->insert('popup_registration');
$id = $this->db->insert_id();
return $id;
}
}
?>