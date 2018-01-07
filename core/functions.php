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
			return 'maintenant';
		}
		$a = array(
			365 * 24 * 60 * 60	=> 'année',
			30 * 24 * 60 * 60	=> 'mois',
			24 * 60 * 60		=> 'jour',
			60 * 60				=> 'heure',
			60					=> 'minute',
			1					=> 'seconde'
		);
		$a_plural = array(
			'année'		=> 'ans',
			'mois'		=> 'mois',
			'jour'		=> 'jours',
			'heure'		=> 'heures',
			'minute'	=> 'minutes',
			'seconde'	=> 'secondes'
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

