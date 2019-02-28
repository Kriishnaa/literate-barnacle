<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class EmpModel extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database(); 
    }
    public function emp_data_fetch(){
        $this->db->where('emp_status','Y');
        $this->db->order_by('emp_name');
        $query = $this->db->get('emp_master');
        return $query->result_array(); 
    } 
    public function emp_insert_data($data){
        $query = $this->db->insert('emp_master',$data);
        echo "heroreyoiryiweyoir".$query;
        return $query ? true : false;
    }
    public function emp_single_fetch($emp_id){
        $this->db->where('emp_id',$emp_id);
        $query = $this->db->get('emp_master');
        return $query->row_array(); 
    }
    public function emp_update_data($data,$emp_id){
        $this->db->where('emp_id',$emp_id);
        $query = $this->db->update('emp_master',$data);
        return $query ? true : false;        
    }
    public function emp_delete_data($emp_id){
        $this->db->where('emp_id',$emp_id);
        $this->db->set('emp_status','N');
        $query =  $this->db->update('emp_master');
        return $query ? true : false; 
    }
    public function emp_data_fetch_search($emp_txt){
        $this->db->where('emp_status','Y');
        $this->db->like('emp_name',$emp_txt);
        $this->db->order_by('emp_name');
        $query = $this->db->get('emp_master');
        return $query->result_array(); 
    }
    
}// --- End of Class EmpModel ---// 
?>