<?php
class Tmain extends CI_Controller {

    function __construct(){
        parent::__construct();
		
		$this->load->library('session');		
		$this->load->helper('url');
		$this->load->model('Teacher_m');
		
		$headerData['classList'] = $this->Teacher_m->get_classList();
		
	}
    
	function tutorial(){
		$headerData['selfurl'] = 'tmain/mainpage';
		$headerData['classList'] = $this->Teacher_m->get_classList();
		$this->data['headerData'] = $headerData;
		$this -> load -> view("teacher/main/tutorial", $this->data);
    }
	
	function mainpage(){
		$headerData['selfurl'] = 'tmain/mainpage';
		$headerData['classList'] = $this->Teacher_m->get_classList();
		$this->data['headerData'] = $headerData;
		$this -> load -> view("teacher/main/mainpage", $this->data);
    }


}
?>
