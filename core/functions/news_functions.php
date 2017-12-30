<?php if(!defined('DarkCoreCMS')) { die('Direct access not permitted'); header('Location: ../../');}

class news{
	function get_last_news(){
		global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
		$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
		$sql = "SELECT * FROM ".$DB_WEBSITE.".news ORDER by id DESC LIMIT 1";
		$i=1;
		$news = array();
		if ($stmt = $con->prepare($sql)) {
			$stmt->execute();
			$stmt->bind_result($_id,$_title,$_body,$_autorAvatar,$_autor,$_date);
			while($stmt->fetch()){
				$news[$i] = array(
					'id' => $_id,
					'title' => $_title,
					'body' => $_body,
					'autor_avatar' => $_autorAvatar,
					'autor' => $_autor,
					'date' => $_date);
			}
			$stmt->close();
		}
		return $news;
		$con->close();
	}
	
	function get_all_news(){
		global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
		$con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
		$sql = "SELECT * FROM ".$DB_WEBSITE.".news ORDER by id DESC";
		$i=1;
		$news = array();
		if ($stmt = $con->prepare($sql)) {
			$stmt->execute();
			$stmt->bind_result($_id,$_title,$_body,$_autorAvatar,$_autor,$_date);
			while($stmt->fetch()){
				$news[$i] = array(
					'id' => $_id,
					'title' => $_title,
					'body' => $_body,
					'autor_avatar' => $_autorAvatar,
					'autor' => $_autor,
					'date' => $_date);
				$i++;
			}
			$stmt->close();
		}
		return $news;
		$con->close();
	}
}
?>