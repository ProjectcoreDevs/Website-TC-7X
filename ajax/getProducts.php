<?php session_start();
include_once("../core/functions.php");
$system = new System;
$system->db = $db;

$search_result = 'No results';
$addToCart = 'Add to Basket';
$moreInfos = 'More informations';

if(isset($_GET['sendServer']) && isset($_GET['sendCharacter']) && isset($_GET['categorie'])){
	$server = $_GET['sendServer'];
	$character = $_GET['sendCharacter'];
	$category = $_GET['categorie'];
	if($server != 0 || $character != 0 || $category != 0){
		if($category == 100){
			$item = $db->query("SELECT * FROM ".$web_database.".products");
		}
		else{
			$item = $db->query("SELECT * FROM ".$web_database.".products WHERE categoryID='".$category."'");
		}
		if($item->num_rows >= 1){
			while($items = $item->fetch_object()){
				
				if(isset($_SESSION['langID']) && ($_SESSION['langID']==1)){
					$title = $items->title_fr;
					$content_title = $items->content_title_fr;
					$content_description = $items->content_description_fr;
				}
				elseif(isset($_SESSION['langID']) && ($_SESSION['langID']==2)){
					$title = $items->title_es;
					$content_title = $items->content_title_es;
					$content_description = $items->content_description_es;
				}
				else{
					$title = $items->title_en;
					$content_title = $items->content_title_en;
					$content_description = $items->content_description_en;
				}
				
				echo '<tr>
					<td><img src="assets/images/'.$items->image.'" style="width:30px;border-radius:5px"/> '.$title.'</td>
					<td>'.$items->price.' point</td>
					<td><button class="btn btn-theme pull-right" onclick="addProductCart('.$items->id.')">'.$addToCart.'</button></td>
				</tr>';
			}
		}
		else{
			echo '<tr>
				<td>'.$search_result.' !</td>
			</tr>';
		}
	}
}


?>