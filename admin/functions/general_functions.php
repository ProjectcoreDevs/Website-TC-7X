<?php include 'config.php';

/********************************************
****************Login function***************
********************************************/

function admin_encrypt($username, $password){
  $password = sha1(strtoupper($username) . ":" . strtoupper($password));
	  return $password;
}

function admin_login($username,$password){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_AUTH;
	$con = mysqli_connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$sql = "SELECT username, sha_pass_hash FROM ".$DB_AUTH.".account WHERE username=? AND sha_pass_hash=?";
	if ($stmt = $con->prepare($sql)) {
		$stmt->bind_param("ss", $username, $password);
		$stmt->execute();
		$stmt->store_result();
		$cols = $stmt->num_rows;
		if ($cols != 1)
			return 'no';
		else
			return 'yes';
		$stmt->close();
	}
	$con->close();
}

function check_user_rank($username){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_AUTH;
	$con = mysqli_connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$sql = "SELECT * FROM ".$DB_AUTH.".account WHERE username=? AND rank=1";
	if ($stmt = $con->prepare($sql)) {
		$stmt->bind_param("s", $username);
		$stmt->execute();
		$stmt->store_result();
		$cols = $stmt->num_rows;
		if ($cols != 1)
			return 'no';
		else
			return 'yes';
		$stmt->close();
	}
	$con->close();
}

/********************************************
*****************Menu function***************
********************************************/
function get_menu(){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
	$con = mysqli_connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$sql = "SELECT id,submenu,name,address FROM ".$DB_WEBSITE.".menu LIMIT 10";
	$i=1;
	if ($stmt = $con->prepare($sql)) {
		$stmt->execute();
		$stmt->bind_result($_id, $_submenu, $_name, $_address);
		while($stmt->fetch()){
			$menus[$i] = array(
					'id' => $_id,
					'submenu' => $_submenu,
					'name' => $_name,
					'address' => $_address);
			$i++;
		}
		$stmt->close();
	}
	return $menus;
	$con->close();
}

function get_submenu($menuId){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
	$con = mysqli_connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$sql = "SELECT menuID,id,name,address FROM ".$DB_WEBSITE.".submenu WHERE menuID='".$menuId."'";
	$i=1;
	if ($stmt = $con->prepare($sql)) {
		$stmt->execute();
		$stmt->bind_result($_menuID, $_id, $_name, $_address);
		while($stmt->fetch()){
			$submenus[$i] = array(
					'menuID' => $_menuID,
					'id' => $_id,
					'name' => $_name,
					'address' => $_address);
			$i++;
		}
		$stmt->close();
	}
	return $submenus;
	$con->close();
}

/********************************************
***************request function**************
********************************************/

function get_last_accounts(){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_AUTH;
	$con = mysqli_connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$sql = "SELECT id,username,email,joindate,online FROM ".$DB_AUTH.".account LIMIT 5";
	$i=1;
	if ($stmt = $con->prepare($sql)) {
		$stmt->execute();
		$stmt->bind_result($_id, $_username, $_email, $_joindate, $_online);
		while($stmt->fetch()){
			$accs[$i] = array(
					'id' => $_id,
					'username' => $_username,
					'email' => $_email,
					'joindate' => $_joindate,
					'online' => $_online);
			$i++;
		}
		$stmt->close();
	}
	return $accs;
	$con->close();
}

function get_last_characters(){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_CHARACTERS;
	$con = mysqli_connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$sql = "SELECT guid,name,race,class,level,map FROM ".$DB_CHARACTERS.".characters LIMIT 5";
	$i=1;
	if ($stmt = $con->prepare($sql)) {
		$stmt->execute();
		$stmt->bind_result($_guid, $_name, $_race, $_class, $_level, $_map);
		while($stmt->fetch()){
			$chars[$i] = array(
					'guid' => $_guid,
					'name' => $_name,
					'race' => $_race,
					'class' => $_class,
					'level' => $_level,
					'map' => $_map);
			$i++;
		}
		$stmt->close();
	}
	return $chars;
	$con->close();
}

function get_map($map){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
	$con = mysqli_connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$sql = "SELECT name FROM ".$DB_WEBSITE.".maps WHERE ID='".$map."'";
	if ($stmt = $con->prepare($sql)) {
		$stmt->execute();
		$stmt->bind_result($_name);
		while($stmt->fetch()){
			$chars = array(
					'name' => $_name);
		}
		$stmt->close();
	}
	return $chars;
	$con->close();
}

?>