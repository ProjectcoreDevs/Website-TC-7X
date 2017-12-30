<?php if(!defined('DarkCoreCMS')) { die('Direct access not permitted'); header('Location: ../../');}

class guides{
	function get_guides_data(){
		global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
		$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
		$sql = "SELECT * FROM ".$DB_WEBSITE.".guides ORDER by id ASC";
		$i=1;
		$guide = array();
		if ($stmt = $con->prepare($sql)) {
			$stmt->execute();
			$stmt->bind_result($_id,$_title,$_body,$_link,$_link_body);
			while($stmt->fetch()){
				$guide[$i] = array(
					'id' => $_id,
					'title' => $_title,
					'body' => $_body,
					'link' => $_link,
					'link_body' => $_link_body);
				$i++;
			}
			$stmt->close();
		}
		return $guide;
		$con->close();
	}	
}
?>