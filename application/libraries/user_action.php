<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

define('PHPASS_HASH_STRENGTH', 8);
define('PHPASS_HASH_PORTABLE', FALSE);

define('STATUS_ACTIVATED', '1');
define('STATUS_NOT_ACTIVATED', '0');

class User_action
{
	function __construct()
	{
		$this-> CI =& get_instance();
		$this-> CI ->load-> library('session');
	}

    // Check User's Duplicate
    function checkDupUserID($checkID){
        $this -> CI -> db -> where("userid", $checkID);
        $query = $this -> CI -> db -> get_where("mh_users");

        $data = $query -> result();
        if ( count($data) > 0 ) return true; else return false;
    }
    
    // Creat New User 
    function createUser($data){
         if($this -> checkDupUserID($data['userid']) == false){
             
             $data['password'] = md5($data['password']);
			 $data['point'] = 5000;
             $data['created'] = date("Y-m-d H:i:s");
             if ($this -> CI -> db -> insert('mh_users', $data)){
                 return true;
             }
             return false;
         }
         return true;
    }
    
    // Update User Info
    function updateUser($data){
        
        $udata['username'] = $data['username'];
        $udata['password'] = $data['password'];
        $udata['password'] = md5($udata['password']);   
        $udata['email'] = $data['email'];
        $udata['phone'] = $data['phone'];
        
        $this -> CI -> db -> where("userid", $data['userid']);                  
        $this -> CI -> db -> update("mh_users", $udata); 
        
        $this -> userSessionChange($data);
        
        return true;
        
    }
    
    // Check Login Information
    function checkLogin($data){
        $data['password'] = md5($data['password']);
 
        $this -> CI -> db -> where("userid", $data['userid']);
        $this -> CI -> db -> where("password", $data['password']);
        $query = $this -> CI -> db -> get_where("mh_users");
        
        $r = $query -> result_array();
        
        if(count($r) > 0){
            $this -> makeLoginSession($r[0]);
            return true;
        }else
            return false;
    }
   
    // Create Login Session
    function makeLoginSession($data){
        $sessionArray = array(
            "user_idx"      => $data['id'],
            "user_id"       => $data['userid'],
            "user_name"     => $data['username'],
            "user_email"    => $data['email'],
            "user_point"    => $data['point'],
            "user_phone"    => $data['phone'] 
        );
        $this-> CI -> session -> set_userdata($sessionArray);
        
    }
    
    // Update Login Session
    function userSessionChange($data){
        $sessionArray = array(
            "user_name"     => $data['username'],
            "user_email"    => $data['email'],
            "user_phone"    => $data['phone']
        );
        
        $this-> CI -> session -> set_userdata($sessionArray);
    }
    
    	// Get Date Time with Timezone
	function getCurrentDateTime($option){
		date_default_timezone_set('Asia/Shanghai');
		if($option == 0){
			return  date('Y-m-d H:i:s');
		}else{
			return date('Y-m-d');
		}
	}
	
    // Delete Login Session 
    function logout(){
        $this-> CI ->session->sess_destroy();
    }
}