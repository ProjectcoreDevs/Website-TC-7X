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
	
	public function getUserInfo($id) {
		$user = $this->db->query("SELECT * FROM ".$web_database.".accounts WHERE auth_account='".$id."'");
		$user = $user->fetch_object();
		return $user;
	}
	
	public function addItemToCart($productID,$productImage,$productTitle,$productQuantity,$productPrice){
		if(isset($_SESSION['cmsCart']['productID'])){
			$positionProduit = array_search($productID, $_SESSION['cmsCart']['productID']);

			if ($positionProduit !== false){
				$_SESSION['cmsCart']['productQuantity'][$positionProduit] += $productQuantity ;
				return 'true';
			}
			else{
				array_push($_SESSION['cmsCart']['productID'],$productID);
				array_push($_SESSION['cmsCart']['productImage'],$productImage);
				array_push($_SESSION['cmsCart']['productTitle'],$productTitle);
				array_push($_SESSION['cmsCart']['productQuantity'],$productQuantity);
				array_push($_SESSION['cmsCart']['productPrice'],$productPrice);
				return 'true';
			}
		}
		else
			return 'false';
	}

	public function delProductCart($productID){
		$tmp = array();
		$tmp['productID'] = array();
		$tmp['productImage'] = array();
		$tmp['productTitle'] = array();
		$tmp['productQuantity'] = array();
		$tmp['productPrice'] = array();
		$tmp['locked'] = $_SESSION['cmsCart']['locked'];

		for($i = 0; $i < count($_SESSION['cmsCart']['productID']); $i++){
			if ($_SESSION['cmsCart']['productID'][$i] !== $productID){
				array_push($tmp['productID'],$_SESSION['cmsCart']['productID'][$i]);
				array_push($tmp['productImage'],$_SESSION['cmsCart']['productImage'][$i]);
				array_push($tmp['productTitle'],$_SESSION['cmsCart']['productTitle'][$i]);
				array_push($tmp['productQuantity'],$_SESSION['cmsCart']['productQuantity'][$i]);
				array_push($tmp['productPrice'],$_SESSION['cmsCart']['productPrice'][$i]);
			}
		}
		
		$_SESSION['cmsCart'] =  $tmp;
		
		unset($tmp);
	}
	
	public function totalCart(){
		$total=0;
		for($i = 0; $i < count($_SESSION['cmsCart']['productID']); $i++){
			$total += $_SESSION['cmsCart']['productQuantity'][$i] * $_SESSION['cmsCart']['productPrice'][$i];
		}
		return $total;
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

