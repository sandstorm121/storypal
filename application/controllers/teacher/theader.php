<?php
class Theader extends CI_Controller {

    function __construct(){
        parent::__construct();
		
		$this->load->library('session');		
		$this->load->helper('url');
		$this->load->model('Teacher_m');
		
	}
    
	function editprofile(){
		$regval = Array();
		$selfurl = $this->input->post('selfurl') ? $this->input->post('selfurl') : 'tmain/mainpage';
		$regval['tch_name'] = $this->input->post('tch_name') ? $this->input->post('tch_name') : NULL;
		$regval['tch_sex'] = $this->input->post('tch_sex') ? $this->input->post('tch_sex') : NULL;
		$regval['tch_organization'] = $this->input->post('tch_organization') ? $this->input->post('tch_organization') : NULL;
		$regval['tch_country'] = $this->input->post('tch_country') ? $this->input->post('tch_country') : NULL;
		$regval['tch_city'] = $this->input->post('tch_city') ? $this->input->post('tch_city') : NULL;
		$regval['tch_aboutme'] = $this->input->post('tch_aboutme') ? $this->input->post('tch_aboutme') : NULL;
		
		
		$this->Teacher_m->update_teacher($regval);
		
		$this->session->set_userdata('tch_name', $regval['tch_name']);
		$this->session->set_userdata('tch_sex', $regval['tch_sex']);
		$this->session->set_userdata('tch_organization', $regval['tch_organization']);
		$this->session->set_userdata('tch_country', $regval['tch_country']);
		$this->session->set_userdata('tch_city', $regval['tch_city']);
		$this->session->set_userdata('tch_aboutme', $regval['tch_aboutme']);
				
		redirect($selfurl);
    }
	
	function selectClass() {
		$selfurl = $this->input->post('selfurl') ? $this->input->post('selfurl') : 'tmain/mainpage';
		$cur_clsIdx = $this->input->post('selectClass') ? $this->input->post('selectClass') : NULL;
		$this->session->set_userdata('cur_clsIdx', $cur_clsIdx);
		redirect($selfurl);
	}
	
	function logout() {
		$this->session->sess_destroy();
		redirect('StartPage');
	}
	
}
?>
