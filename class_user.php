<?php
require_once('class_db.php');

class User{
    
    public function isloggedin($user_name){
        if(!(isset($user_name) && $user_name!='') ){
            header("location:index.php"); // make this return true for more flexability
             
        }
        
        //return !(isset($loggedIn) && $loggedIn!='');
    }
    
	/**
	 * Get user data object
	 *
	 * @param $user_id Users id from login
	 * @return object(stdClass) error message on failure / object of user's data on success
	 */
	/*public function get_user_data($user_id){
		global $db;
		
		$table = "members";
		
		$query = "SELECT * 
				  FROM $table
				  WHERE id = $user_id;
				 ";
		
		$obj = $db->select($query);
		
		if(!$obj){
			return "no user found!";
		}
		
		return $obj[0];
	}*/
    public function get_user_data($user_name){
		global $db;
		
		$table = "members";
		
		$query = "SELECT * 
				  FROM $table
				  WHERE user_display_name = '$user_name';
				 ";
		
		$obj = $db->select($query);
		
		if(!$obj){
			return "no user found!";
		}
		
		return $obj[0];
	}
    
    public function get_all_user_data(){
		global $db;
		
		$table = "members";
		
		$query = "SELECT * 
				  FROM $table;";
		
		$obj = $db->select($query);
		
		if(!$obj){
			return "no user found!";
		}
		
		return $obj;
	}
	
	/**
	 * Get user's friends
	 *
	 * @param $user_id Users id from login
	 * @return object(stdClass) error message on failure / object of user's data on success
	 */
	public function get_user_friends($user_name){
		global $db;
		
		$table = "friends";
		
		$query = "SELECT FriendB 
				  FROM $table
				  WHERE FriendA = '$user_name';
				 ";

		$objs = $db->select($query);
		
		if(!$objs){
			return "Error!";
		}
		
		return $objs;
	}
	
	/**
	 * Get user data object
	 *
	 * @param $user_id Users id from login
	 * @return object(stdClass) error message on failure / object of user's data on success
	 */
	public function set_user_password($user_id, $user_pass){
		global $db;
		
        $user_pass = password_hash($user_pass, PASSWORD_BCRYPT);
        
		$table = "friends";
		
		$query = "UPDATE members
				  SET user_pass='$user_pass'
				  WHERE id=$user_id;
				 ";
		
		$stmt = $db->query($query);
		
		$count = $stmt->rowCount();

        if ($count > 0) {
        	return true;
		}
		
		return false;
	}
    
	
	/**
	 * Updates users full name
	 *
	 * @param $fname The users first name
	 * @param $lname The users last name
	 * @return bool False on failure / array Database rows on success
	 */
	public function set_user_full_name(){
		
	}
	
	/**
	 * Checks the password of user against password in database
	 *
	 * @param $user_name The display name entered in by the user
	 * @param $user_pass The password entered in by the user
	 * @return bool False on failure / true on success
	 */
	public function check_user_login($user_name, $user_pass){
		global $db;
		
		$table = 'members';
		
		$query = "SELECT user_pass 
				  FROM $table 
				  WHERE user_display_name = '$user_name' AND active = 'Yes'";
		
		$stmt = $db->select($query);
		
		if ($stmt) {
			if (password_verify ($user_pass, $stmt[0]->user_pass)) {
				return true;
			}
		}
		return false;
	}
	
	public function set_status($user_id, $status_content){
		global $db;
		
		$table = "status";
		
		$query = "INSERT INTO $table(user_id, status_content)
				  VALUES($user_id, '$status_content');
				 ";
		
		$stmt = $db->query($query);
		
		$count = $stmt->rowCount();

        if ($count > 0) {
        	return true;
		}
		
		return false;
	}
}

$user = new User();
?>