<?php session_start();
include_once("../core/functions.php");
$system = new System;
$system->db = $db;

if(isset($_GET['initCharacterLists'])){
	$char = $db->query('SELECT * FROM '.$characters_database.'.characters WHERE account="'.$_SESSION['cms_user_id'].'"');
	if($char->num_rows == 0){
		echo '<tr>
			<td>Vous n\'avez pas encore de personnages !</td>
		</tr>';
	}
	else{
		echo '<tr>
			<td>Faction</td>
			<td>Name</td>
			<td>Level</td>
			<td>Zone</td>
			<td>Action</td>
		</tr>';
		while($chars = $char->fetch_object()){
			$zones = $db->query('SELECT * FROM '.$web_database.'.wow_zones WHERE zoneID="'.$chars->zone.'"');
			$zone = $zones->fetch_object();
			if($chars->race == 1 || $chars->race == 3 || $chars->race == 4 || $chars->race == 7 || $chars->race == 11 || $chars->race == 22 || $chars->race == 25){
				$factionImg = 'alliance.png';
			}
			else if($chars->race == 2 || $chars->race == 5 || $chars->race == 6 || $chars->race == 8 || $chars->race == 9 || $chars->race == 10 || $chars->race == 26){
				$factionImg = 'horde.png';
			}
			else{
				$factionImg = 'unk-race.png';
			}
			echo '<tr>
				<td><img src="assets/images/'.$factionImg.'" width="20px"/></td>
				<td>'.$chars->name.'</td>
				<td>'.$chars->level.'</td>
				<td>'.$zone->name.'</td>
				<td><button class="btn btn-theme btn-xs btn-block">Manage</button></td>
			</tr>';
		}
	}
}


?>
