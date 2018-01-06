<?php require_once 'config.php';

class Auth{
	function isLogged() {
		if(!empty($_SESSION)) {
			if(isset($_SESSION['cms_auth'])) {
				return true;
			} else {
				return false;
			}
		}
		else {
			return false;
		}
	}

	function isAdmin() {
		if(isset($_SESSION['cms_is_admin'])) {
			return true;
		}
		else {
			return false;
		}
	}
	

}

class System {
	
	public $db;
	
	function getUserInfo($id) {
		$user = $this->db->query("SELECT * FROM ".$web_database.".accounts WHERE auth_account='".$id."'");
		$user = $user->fetch_object();
		return $user;
	}
	
}

?>

