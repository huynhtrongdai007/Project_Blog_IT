<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model  {

	public function create($formArray)
	{
		$this->db->insert('tbl_categorys',$formArray);
	}

	public function getAllCategorys($params=[])
	{
		if (!empty($params['queryString'])) {
			$this->db->like('name',$params['queryString']);
		}
		$result = $this->db->get('tbl_categorys')->result_array();
		return $result;
	}

	public function getById($id)
	{
		$this->db->where('id',$id);
		$result = $this->db->get('tbl_categorys')->row_array();
		return $result;
	}

	public function update($id,$formArray)
	{
		$this->db->where('id',$id);
		$this->db->update('tbl_categorys',$formArray);
	}

	public function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('tbl_categorys');
	}

	// Front Function

	public function getAllCategorysFront($params=[])
	{
	 	$this->db->where('tbl_categorys.status',1);
		$result = $this->db->get('tbl_categorys')->result_array();
		return $result;
	}
}
