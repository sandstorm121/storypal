<?php
class Teacher_m extends CI_Model {
	
	function __construct(){
			parent::__construct();
			$this->load->database();
			$this->load->library('user_action');
			$this->load->library('session');
    }
	
	function sessionIsValid()
	{
		$t_perm = $this->session->userdata('t_perm');
		if (isset($t_perm))
		{
			return true;
		}
		else
		{
			redirect('/tlogin/login');
			return false;
		}
	}
	
	function checkLogin($id, $password)
	{
		$sql = "SELECT SHA('$password') AS pwd";
		$query = $this->db->query($sql);
		$pwd = $query->row_array();

		$sql = "SELECT * from t_teachers as t1 where t1.tch_email = '$id' AND t1.tch_pwd = '".$pwd['pwd']."' AND t1.del_time is NULL";
		
		$query = $this -> db -> query($sql);
		if($query->num_rows() > 0)
			return $query -> row_array();
		else{
			return null;
		}
	}

	function checkLoginnum($id, $password)
	{
		$sql = "SELECT SHA('$password') AS pwd";
		$query = $this->db->query($sql);
		$pwd = $query->row_array();

		$sql = "SELECT * from t_teachers where tch_email = '$id' AND del_time is NULL";
		$query = $this -> db -> query($sql);
		if($query->num_rows() == 0) return 1;

		$sql1 = "SELECT * from t_teachers where tch_email = '$id' AND tch_pwd = '".$pwd['pwd']."' AND del_time is NULL";
		$query1 = $this -> db -> query($sql1);
		if($query1->num_rows() == 0) return 2;
	
		return 3;
	}
	
	function Registration($val)
	{
		return $this->db->insert('t_logs', $val);
	}
	
	function get_teacherData($regval) {
		$sql = "select * from t_teachers where tch_name = '".$regval['tch_name']."'";
		$query = $this->db->query($sql);
		$row = $query->row_array();
		return $row;
	}
	
	function set_teacher($regval)
	{
		$today = gmdate("Y-m-d H:i:s");
		
		$sql = "insert into t_teachers (tch_name, tch_birthday, tch_organization, tch_country, tch_city, tch_sex, tch_email, tch_pwd, reg_time) ";
		$sql .=" values('".$regval['tch_name']."','".$regval['tch_birthday']."','".$regval['tch_organization']."','".$regval['tch_country']."','".$regval['tch_city']."','".$regval['tch_sex']."','".$regval['tch_email']."',SHA('".$regval['tch_pwd']."'),'".$today."')";
		
		$query = $this->db->query($sql);
		return;
	}
	
	function set_student($regval)
	{
		$today = gmdate("Y-m-d H:i:s");
		
		$sql = "insert into t_students (stu_name, stu_grdemail, stu_nickname, stu_id, stu_pwd, reg_time) ";
		$sql .=" values('".$regval['stu_name']."','".$regval['stu_grdemail']."','".$regval['stu_nickname']."','".$regval['stu_id']."','".$regval['stu_pwd']."','".$today."')";
		
		$query = $this->db->query($sql);
		return;
	}
	
	function update_teacher($regval) 
	{
		$cur_idx = $this->session->userdata('tch_id');
		$sql = "UPDATE t_teachers SET tch_name='".$regval['tch_name']."', tch_sex='".$regval['tch_sex']."', tch_organization='".$regval['tch_organization']."', tch_country='".$regval['tch_country']."', tch_city='".$regval['tch_city']."', tch_aboutme='".$regval['tch_aboutme']."'  WHERE idx='$cur_idx'";
		
		$query = $this->db->query($sql);
		return;
	}
	
	function update_student($regval, $stuid) 
	{
		$sql = "UPDATE t_students SET stu_name='".$regval['stu_name']."', stu_grdemail='".$regval['stu_grdemail']."', stu_nickname='".$regval['stu_nickname']."', stu_id='".$regval['stu_id']."', stu_pwd='".$regval['stu_pwd']."'  WHERE idx='$stuid'";
		
		$query = $this->db->query($sql);
		return;
	}
	
	function set_class($regval) 
	{
		$today = gmdate("Y-m-d H:i:s");
		
		$sql = "insert into t_classes (cls_type, cls_title, tch_idx, reg_time) ";
		$sql .=" values('".$regval['cls_type']."','".$regval['cls_title']."','".$this->session->userdata('tch_id')."','".$today."')";
		
		$query = $this->db->query($sql);
		return;
		
	}
	
	function get_student($curIdx) 
	{
		$sql = "select * from t_students where idx = $curIdx";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result;
		
	}
	
	function get_classList() {
		
		$cur_clsIdx = $this->session->userdata('tch_id') ? $this->session->userdata('tch_id') : 0;
	
		$sql = "select * from t_classes where tch_idx = $cur_clsIdx";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
	
}
?>
