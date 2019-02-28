<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class EmpController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url','form'));
        $this->load->model('empModel');
        $this->load->library('session');
    }
    
    public function index(){
        $data = array();
        $data['emp_details'] = $this->empModel->emp_data_fetch();
        $data['emp_search'] = NULL;
        $this->load->view('EmpView',$data);
    }
    
    public function emp_reg(){
        $this->load->view('EmpAdd');
    }
    
    public function emp_reg_save(){
        $data = array();
        $data['emp_name'] = trim($this->input->post('empName'));
        $data['emp_password'] = md5(trim($this->input->post('empPassword')));
        $data['emp_mail'] = trim($this->input->post('empMail'));
        $data['emp_mobile'] = trim($this->input->post('empMobile'));
        if(!empty($this->input->post('empBirthdate'))){
            $dob = explode("-",$this->input->post('empBirthdate'));//date post pattern yyyy/mm/dd 
            $data['emp_birthdate'] = mktime(1,1,1,$dob[1],$dob[2],$dob[0]);
        }
        $data['emp_address'] = trim($this->input->post('empAddress'));
        $data['emp_city'] = trim($this->input->post('empCity'));
        $data['emp_gender'] = trim($this->input->post('empGender'));
        if(!empty($this->input->post('empLanguage'))){
            $data['emp_language'] = implode(',',$this->input->post('empLanguage'));
        }
        if(!empty($_FILES['empProfile']['name'])){
            $config['upload_path'] = 'assets/emp_profile/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 3072; // 3MB;
            $config['max_width'] = 3000; 
            $config['max_height'] = 3000; 
            $config['file_name'] = $_FILES['empProfile']['name'];
            //Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            if($this->upload->do_upload('empProfile')){
                $uploadData = $this->upload->data();
                $picture = $uploadData['file_name'];
            }else{
                $picture = '';
            }
        }else{
            $picture = '';
        }
        $data['emp_profile'] = $picture;
        $data = array(
            'emp_name'=>$data['emp_name'],
            'emp_password'=>$data['emp_password'],
            'emp_mail'=>$data['emp_mail'],
            'emp_mobile'=>$data['emp_mobile'],
            'emp_birthdate'=>$data['emp_birthdate'],
            'emp_address'=>$data['emp_address'],
            'emp_city'=>$data['emp_city'],
            'emp_gender'=>$data['emp_gender'],
            'emp_language'=>$data['emp_language'],
            'emp_profile'=>$data['emp_profile'],
            );
        $query = $this->empModel->emp_insert_data($data);
        if($query){
            $this->session->set_flashdata('msg', 'Data has been Inserted !!!'); 
        }else{
            $this->session->set_flashdata('msg', 'Oops ! Soemting went wrong , data was not Inserted !!!'); 
        }
        redirect('EmpController/emp_reg');
    }
    
    public function emp_edit($emp_id){
        $data = array();
        $data['emp_details'] = $this->empModel->emp_single_fetch($emp_id);
        $this->load->view('empEdit',$data);
    }
    
    public function emp_edit_save(){
        $data = array();
        $emp_id = trim($this->input->post('empID'));
        $data['emp_name'] = trim($this->input->post('empName'));
        $data['emp_password'] = trim($this->input->post('empPassword'));
        $data['emp_mail'] = trim($this->input->post('empMail'));
        $data['emp_mobile'] = trim($this->input->post('empMobile'));
        if(!empty($this->input->post('empBirthdate'))){
            $dob = explode("-",$this->input->post('empBirthdate'));//date post pattern yyyy/mm/dd 
            $data['emp_birthdate'] = mktime(1,1,1,$dob[1],$dob[2],$dob[0]);
        }
        $data['emp_address'] = trim($this->input->post('empAddress'));
        $data['emp_city'] = trim($this->input->post('empCity'));
        $data['emp_gender'] = trim($this->input->post('empGender'));
        if(!empty($this->input->post('empLanguage'))){
            $data['emp_language'] = implode(',',$this->input->post('empLanguage'));
        }
        if(!empty($_FILES['empProfile']['name'])){
            $config['upload_path'] = 'assets/emp_profile/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 3072; // 3MB;
            $config['max_width'] = 3000; 
            $config['max_height'] = 3000; 
            $config['file_name'] = $_FILES['empProfile']['name'];
            //Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            if($this->upload->do_upload('empProfile')){
                $uploadData = $this->upload->data();
                $picture = $uploadData['file_name'];
            }else{
                $picture = '';
            }
        }else{
            $picture = $this->input->post('old_profile');
        }
        $data['emp_profile'] = $picture;
        $data = array(
            'emp_name'=>$data['emp_name'],
            'emp_password'=>$data['emp_password'],
            'emp_mail'=>$data['emp_mail'],
            'emp_mobile'=>$data['emp_mobile'],
            'emp_birthdate'=>$data['emp_birthdate'],
            'emp_address'=>$data['emp_address'],
            'emp_city'=>$data['emp_city'],
            'emp_gender'=>$data['emp_gender'],
            'emp_language'=>$data['emp_language'],
            'emp_profile'=>$data['emp_profile'],
            );
        $query = $this->empModel->emp_update_data($data,$emp_id);
        if($query){
            $this->session->set_flashdata('msg', 'Data has been Updated !!!'); 
        }else{
            $this->session->set_flashdata('msg', 'Oops ! Soemting went wrong , data was not Updated !!!'); 
        }
        redirect('EmpController/emp_edit/'.$emp_id);
    }
   
    public function emp_delete($emp_id){
        $query = $this->empModel->emp_delete_data($emp_id);
        if($query){
            $this->session->set_flashdata('msg', 'Data has been Deleted !!!'); 
        }else{
            $this->session->set_flashdata('msg', 'Oops ! Data not Deleted !!!'); 
        }
        redirect('EmpController/');
    }
    
    public function emp_search(){
        $emp_search = trim($this->input->post('emp_search'));
        $data = array();
        $data['emp_details'] = $this->empModel->emp_data_fetch_search($emp_search);
        $data['emp_search'] = $emp_search;
        $this->load->view('EmpView',$data);
    }
}// --- End of Class EmpController --- // 
?>