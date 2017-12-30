<?php if(!defined('DarkCoreCMS')) { die('Direct access not permitted');} 
function get_item_store(){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
	$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$sql = "SELECT * FROM ".$DB_WEBSITE.".store_item";
	$i=1;
	$store = array(); 
	if ($stmt = $con->prepare($sql)){
		$stmt->execute();
		$stmt->bind_result($_id,$_item_id,$_name,$_vp_price,$_dp_price,$_dispo);
		while ($stmt->fetch()) {
			$store[$i] = array(
				'id'=> $_id,
				'item_id'=> $_item_id,
				'name'=> $_name,
				'vp_price'=> $_vp_price,
				'dp_price'=> $_dp_price,
				'dispo'=> $_dispo);
		$i++;
		}
		$stmt->close();
	}
	return $store;
	$con->close();
}

function get_order_store_by_user_id($id){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
	$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$sql = "SELECT * FROM ".$DB_WEBSITE.".store_orders WHERE acc_id=? ORDER BY order_id DESC LIMIT 3";
	$i=1;
	$getOrderStore = array(); 
	if ($stmt = $con->prepare($sql)){
		$stmt->bind_param('i', $id);
		$stmt->execute();
		$stmt->bind_result($_order_id,$_acc_id,$_username,$_char_id,$_char_name,$_item_id,$_item_name,$_date);
		while ($stmt->fetch()) {
			$getOrderStore[$i] = array(
				'order_id'=> $_order_id,
				'acc_id'=> $_acc_id,
				'username'=> $_username,
				'char_id'=> $_char_id,
				'char_name'=> $_char_name,
				'item_id'=> $_item_id,
				'item_name'=> $_item_name,
				'date'=> $_date);
		$i++;
		}
		$stmt->close();
	}
	return $getOrderStore;
	$con->close();
}

function get_all_order_store_by_user_id($id){
	global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
	$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
	$sql = "SELECT * FROM ".$DB_WEBSITE.".store_orders WHERE acc_id=? ORDER BY order_id DESC";
	$i=1;
	$getAllOrderStore = array(); 
	if ($stmt = $con->prepare($sql)){
		$stmt->bind_param('i', $id);
		$stmt->execute();
		$stmt->bind_result($_order_id,$_acc_id,$_username,$_char_id,$_char_name,$_item_id,$_item_name,$_date);
		while ($stmt->fetch()) {
			$getAllOrderStore[$i] = array(
				'order_id'=> $_order_id,
				'acc_id'=> $_acc_id,
				'username'=> $_username,
				'char_id'=> $_char_id,
				'char_name'=> $_char_name,
				'item_id'=> $_item_id,
				'item_name'=> $_item_name,
				'date'=> $_date);
		$i++;
		}
		$stmt->close();
	}
	return $getAllOrderStore;
	$con->close();
}
?>