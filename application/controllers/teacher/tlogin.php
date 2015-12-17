<?php
class Tlogin extends CI_Controller {

    function __construct(){
        parent::__construct();
		
		$this->load->library('session');		
		$this->load->helper('url');
		$this->load->model('Teacher_m');
		$this->data['user'] = "";
	
		$this->data['focuspos'] = 1;
		
		$headerData['classList'] = $this->Teacher_m->get_classList();
	}
    
	function login(){
		
		$this->data['error'] = "";
		$this->data['user'] = "";
		
		$this -> load -> view("teacher/login/login", $this->data);
    }
	
	function newlogin() 
	{
		$this -> load -> view("teacher/login/newlogin");
	}
	
	function successrgst() 
	{
		$regval = Array();
		$regval['tch_name'] = $this->input->post('tch_name') ? $this->input->post('tch_name') : NULL;
		$regval['tch_sex'] = $this->input->post('tch_sex') ? $this->input->post('tch_sex') : NULL;
		$regval['tch_birthday'] = $this->input->post('tch_birthday') ? $this->input->post('tch_birthday') : NULL;
		$regval['tch_organization'] = $this->input->post('tch_organization') ? $this->input->post('tch_organization') : NULL;
		$regval['tch_country'] = $this->input->post('tch_country') ? $this->input->post('tch_country') : NULL;
		$regval['tch_city'] = $this->input->post('tch_city') ? $this->input->post('tch_city') : NULL;
		$regval['tch_email'] = $this->input->post('tch_email') ? $this->input->post('tch_email') : NULL;
		$regval['tch_pwd'] = $this->input->post('tch_pwd') ? $this->input->post('tch_pwd') : NULL;
		$regval['tch_chk'] = $this->input->post('tch_chk') ? $this->input->post('tch_chk') : NULL;
		
		$this->Teacher_m->set_teacher($regval);
		
		$row = $this->Teacher_m->checkLogin($regval['tch_email'], $regval['tch_pwd']);
		
		$this->session->set_userdata('tch_name', $regval['tch_name']);
		$this->session->set_userdata('tch_sex', $regval['tch_sex']);
		$this->session->set_userdata('tch_organization', $regval['tch_organization']);
		$this->session->set_userdata('tch_country', $regval['tch_country']);
		$this->session->set_userdata('tch_city', $regval['tch_city']);
		$this->session->set_userdata('tch_aboutme', "");
		$this->session->set_userdata('tch_id', $row['idx']);
		
		$headerData['selfurl'] = 'tmain/mainpage';
		$this->data['headerData'] = $headerData;
		$this -> load -> view("teacher/login/successrgst", $this->data);
	}
	
	function check(){
		//date_default_timezone_set("");
		$today = gmdate("Y-m-d H:i:s");
		$regval=array();
		
		$uid = $this->input->post('username');
		$pwd = $this->input->post('password');
		
		if (!$uid)	{
			$this->data['error'] = "Please insert Username";
			$this->data['user'] = $uid;
			$this->data['focuspos'] = 1;
			$this -> load -> view("teacher/login/login", $this->data);
			return;
		}
		if (!$pwd)	{
			$this->data['error'] = "Please insert your Password";
			$this->data['user'] = $uid;
			$this->data['focuspos'] = 2;
			$this -> load -> view("teacher/login/login", $this->data);
			return;
		}
		
		$check = $this->Teacher_m->checkLoginnum($uid, $pwd);

		if($check == 3) {
			$row = $this->Teacher_m->checkLogin($uid, $pwd);
			
			
			$this->session->set_userdata('tch_name', $row['tch_name']);
			$this->session->set_userdata('tch_sex', $row['tch_sex']);
			$this->session->set_userdata('tch_id', $row['idx']);
			$this->session->set_userdata('tch_organization', $row['tch_organization']);
			$this->session->set_userdata('tch_country', $row['tch_country']);
			$this->session->set_userdata('tch_city', $row['tch_city']);
			$this->session->set_userdata('tch_aboutme', $row['tch_aboutme']);
			
			$regval['user_idx']=$row['idx'];
			$regval['reg_time']=$today;
			$regval['note']=1;
			$this->Teacher_m->Registration($regval);
			redirect('tmain/tutorial');
		}
		else {
			if ($check == 2)
			{
				$this->data['error'] = "Please insert your correct password!";
				$this->data['focuspos'] = 2;
			}
			else if ($check == 1)
			{
				$this->data['error'] = "Please insert your correct ID!";
				$this->data['focuspos'] = 1;
			}
		
			$this->data['user'] = $uid;
	
			$this -> load -> view("teacher/login/login", $this->data);
			return;
		}
	}
	
    function logout() {
		$this->session->sess_destroy();
		redirect('tlogin/login');
	}
	
}
?>
