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
	
	public function timeAgo($ptime) {
		$etime = time() - $ptime;
		if ($etime < 1)
		{
			return 'now';
		}
		$a = array(
			365 * 24 * 60 * 60	=> 'year',
			30 * 24 * 60 * 60	=> 'month',
			24 * 60 * 60		=> 'day',
			60 * 60				=> 'hour',
			60					=> 'minute',
			1					=> 'second'
		);
		$a_plural = array(
			'year'		=> 'years',
			'month'		=> 'months',
			'day'		=> 'days',
			'hour'		=> 'hours',
			'minute'	=> 'minutes',
			'second'	=> 'seconds'
			);

		foreach ($a as $secs => $str){
			$d = $etime / $secs;
			if ($d >= 1){
				$r = round($d);
				return $r.' '.($r > 1 ? $a_plural[$str] : $str);
			}
		}
	}
}

?>

