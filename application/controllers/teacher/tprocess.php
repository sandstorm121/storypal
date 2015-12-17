<?php
class Tprocess extends CI_Controller {
	
    function __construct(){
        parent::__construct();
		
		$this->load->library('session');		
		$this->load->helper('url');
		$this->load->model('Teacher_m');
		
		$headerData['classList'] = $this->Teacher_m->get_classList();
		
	}
    
	function feedbacknostu(){
		$headerData['selfurl'] = 'tpro/feedbacknostu';
		$headerData['classList'] = $this->Teacher_m->get_classList();
		$this->data['headerData'] = $headerData;
		$this -> load -> view("teacher/process/feedbacknostu", $this->data);
    }
	
	function feedbackstu(){
		$headerData['selfurl'] = 'tpro/feedbackstu';
		$headerData['classList'] = $this->Teacher_m->get_classList();
		$this->data['headerData'] = $headerData;
		$this -> load -> view("teacher/process/feedbackstu", $this->data);
    }
	
	function feedbackcomment(){
		$headerData['selfurl'] = 'tpro/feedbackcomment';
		$headerData['classList'] = $this->Teacher_m->get_classList();
		$this->data['headerData'] = $headerData;	

		$this -> load -> view("teacher/process/feedbackcomment", $this->data);
    }
	
	function feedbackcommentres(){
		$headerData['selfurl'] = 'tpro/feedbackcommentres';
		$headerData['classList'] = $this->Teacher_m->get_classList();
		$this->data['headerData'] = $headerData;	
		$this -> load -> view("teacher/process/feedbackcommentres", $this->data);
    }
	
	function monitornostu(){
		$headerData['selfurl'] = 'tpro/monitornostu';
		$headerData['classList'] = $this->Teacher_m->get_classList();
		$this->data['headerData'] = $headerData;	
		$this -> load -> view("teacher/process/monitornostu", $this->data);
    }
	
	function monitorstu(){
		$headerData['selfurl'] = 'tpro/monitorstu';
		$headerData['classList'] = $this->Teacher_m->get_classList();
		$this->data['headerData'] = $headerData;
		$this -> load -> view("teacher/process/monitorstu", $this->data);
    }
	
	function editstu(){
		$headerData['selfurl'] = 'tpro/editstu';
		$headerData['classList'] = $this->Teacher_m->get_classList();
		$this->data['headerData'] = $headerData;
		$this -> load -> view("teacher/process/editstu", $this->data);
    }
	
	function regclass(){
		$headerData['selfurl'] = 'tpro/regclass';
		$headerData['classList'] = $this->Teacher_m->get_classList();
		$this->data['headerData'] = $headerData;
		$this -> load -> view("teacher/process/regclass", $this->data);
    }
	
	function regclassButton() {
		
		$regval['cls_type'] = $this->input->post('r1') ? $this->input->post('r1') : NULL;
		$regval['cls_title'] = $this->input->post('cls_title') ? $this->input->post('cls_title') : NULL;
		
		$this->Teacher_m->set_class($regval);
		redirect('tpro/regclass');
	}
	
	function regstu(){
		
		$numCards = $this->input->post('numCards') ? $this->input->post('numCards') : 0;
		$isButtonClick = $this->input->post('isButtonClick') ? $this->input->post('isButtonClick') : 0;
		$curSelCard = $this->input->post('curSelCard') ? $this->input->post('curSelCard') : 1;
		
		$regval['stu_name']		= $this->input->post('stu_name') ? $this->input->post('stu_name') : NULL;	
		$regval['stu_grdemail'] = $this->input->post('stu_grdemail') ? $this->input->post('stu_grdemail') : NULL;
		$regval['stu_nickname'] = $this->input->post('stu_nickname') ? $this->input->post('stu_nickname') : NULL;
		$regval['stu_id']       = $this->input->post('stu_id') ? $this->input->post('stu_id') : NULL;
		$regval['stu_pwd']      = $this->input->post('stu_pwd') ? $this->input->post('stu_pwd') : NULL;
		
		if ($isButtonClick == 2) {
			
			//$this->Teacher_m->update_student($regval, $curSelCard);
			
			$this->Teacher_m->set_student($regval);
		}
		
		if ($isButtonClick == 3) {
			$row = $this->Teacher_m->get_student($curSelCard);
			$this->data['stu_name'] = $row['stu_name'];
			$this->data['stu_grdemail'] = $row['stu_grdemail'];
			$this->data['stu_nickname'] = $row['stu_nickname'];
			$this->data['stu_id'] = $row['stu_id'];
			$this->data['stu_pwd'] = $row['stu_pwd'];
			//$this->Teacher_m->update_student($regval, $curSelCard);
		}
		
		$headerData['selfurl'] = 'tpro/regstu';
		$headerData['classList'] = $this->Teacher_m->get_classList();
		$this->data['headerData'] = $headerData;
		$this->data['numCards'] = $numCards;
		$this->data['isButtonClick'] = $isButtonClick;
		$this->data['curSelCard'] = $curSelCard;
		$this -> load -> view("teacher/process/regstu", $this->data);
    }
	
}
?>
