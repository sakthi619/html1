<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Common_model extends CI_Model
{
    //common for all
    public function insert_record($table,$values)
	{		
		$this->db->insert($table,$values);
		return $this->db->insert_id();	
	}
	
	public function update_record($table,$values,$where = '')
	{
		if($where)
			$this->db->where($where); 	
		$this->db->update($table,$values);
	}
	
	public function delete_record($table,$where)
	{
		 $this->db->delete($table, $where); 
	}
	
	//Select the single record from db
	public function get_record($table,$fields='*',$where='')
	{
			if($fields)
				$this->db->select($fields);
			if(!empty($where))
				$this->db->where($where);
			return $this->db->get($table)->row();					
	}
	
	//Select the single record from db with or condition
	public function get_record_or($table,$fields='*',$where='',$orwhere='')
	{
			if($fields)
				$this->db->select($fields);
			if(!empty($where))
				$this->db->where($where);
			if(!empty($orwhere))
				$this->db->or_where($orwhere);
			return $this->db->get($table)->row();					
	}
	
	//Select the multiple records from db
	public function get_records($table,$fields='*',$where='')
	{
			if($fields)
				$this->db->select($fields);
			if(!empty($where))
				$this->db->where($where);
			return $this->db->get($table)->result();		
			
	}
	
	//Select the multiple records from db
	public function get_records_limit($table,$fields='*',$where='',$start = '',$limit = '')
	{
			if($fields)
				$this->db->select($fields);
			if(!empty($where))
				$this->db->where($where);
			if($limit!='' && $start!=''){
			   $this->db->limit($start, $limit);
			}
			return $this->db->get($table)->result();		
			
	}
	
	
	//Select the count multiple records from db
	public function get_records_count($table,$fields='*',$where='')
	{
		if(!empty($where))
			$this->db->where($where);
		$this->db->from($table);
		return $this->db->count_all_results();	
			
	}
	
	
	//Select the multiple record from db
	public function get_records_order_by($table,$fields='*',$where='',$orderby,$type = 'ASC')
	{
			if($fields)
				$this->db->select($fields);
			if(!empty($where))
				$this->db->where($where);
			$this->db->order_by($orderby, $type); 
			return $this->db->get($table)->result();		
			
	}
	
	
}
