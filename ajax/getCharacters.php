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
			<td>Race</td>
			<td>Class</td>
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
				<td>'.$chars->name.'</td>';
				if($chars->race == 1){ // humain
					if($chars->gender == 1)
						echo '<td><img src="assets/images/races/race_human_female.jpg" width="20px"/></td>';
					else
						echo '<td><img src="assets/images/races/race_human_male.jpg" width="20px"/></td>';
				}
				elseif($chars->race == 2){ // orc
					if($chars->gender == 1)
						echo '<td><img src="assets/images/races/race_orc_female.jpg" width="20px"/></td>';
					else
						echo '<td><img src="assets/images/races/race_orc_male.jpg" width="20px"/></td>';
				}
				elseif($chars->race == 3){ // dwarf
					if($chars->gender == 1)
						echo '<td><img src="assets/images/races/race_dwarf_female.jpg" width="20px"/></td>';
					else
						echo '<td><img src="assets/images/races/race_dwarf_male.jpg" width="20px"/></td>';
				}
				elseif($chars->race == 4){ // night-elf
					if($chars->gender == 1)
						echo '<td><img src="assets/images/races/race_nightelf_female.jpg" width="20px"/></td>';
					else
						echo '<td><img src="assets/images/races/race_nightelf_male.jpg" width="20px"/></td>';
				}
				elseif($chars->race == 5){ // undead
					if($chars->gender == 1)
						echo '<td><img src="assets/images/races/race_scourge_female.jpg" width="20px"/></td>';
					else
						echo '<td><img src="assets/images/races/race_scourge_male.jpg" width="20px"/></td>';
				}
				elseif($chars->race == 6){ // tauren
					if($chars->gender == 1)
						echo '<td><img src="assets/images/races/race_tauren_female.jpg" width="20px"/></td>';
					else
						echo '<td><img src="assets/images/races/race_tauren_male.jpg" width="20px"/></td>';
				}
				elseif($chars->race == 7){ // gnome
					if($chars->gender == 1)
						echo '<td><img src="assets/images/races/race_gnome_female.jpg" width="20px"/></td>';
					else
						echo '<td><img src="assets/images/races/race_gnome_male.jpg" width="20px"/></td>';
				}
				elseif($chars->race == 8){ // troll
					if($chars->gender == 1)
						echo '<td><img src="assets/images/races/race_troll_female.jpg" width="20px"/></td>';
					else
						echo '<td><img src="assets/images/races/race_troll_male.jpg" width="20px"/></td>';
				}
				elseif($chars->race == 9){ // goblin
					if($chars->gender == 1)
						echo '<td><img src="assets/images/races/race_goblin_female.jpg" width="20px"/></td>';
					else
						echo '<td><img src="assets/images/races/race_goblin_male.jpg" width="20px"/></td>';
				}
				elseif($chars->race == 10){ // blood-elf
					if($chars->gender == 1)
						echo '<td><img src="assets/images/races/race_bloodelf_female.jpg" width="20px"/></td>';
					else
						echo '<td><img src="assets/images/races/race_bloodelf_male.jpg" width="20px"/></td>';
				}
				elseif($chars->race == 11){ // draenei
					if($chars->gender == 1)
						echo '<td><img src="assets/images/races/race_draenei_female.jpg" width="20px"/></td>';
					else
						echo '<td><img src="assets/images/races/race_draenei_male.jpg" width="20px"/></td>';
				}
				elseif($chars->race == 22){ // worgen
					if($chars->gender == 1)
						echo '<td><img src="assets/images/races/race_worgen_female.jpg" width="20px"/></td>';
					else
						echo '<td><img src="assets/images/races/race_worgen_male.jpg" width="20px"/></td>';
				}
				elseif($chars->race == 24){ // pandaren neutral
					if($chars->gender == 1)
						echo '<td><img src="assets/images/races/race_pandaren_female.jpg" width="20px"/></td>';
					else
						echo '<td><img src="assets/images/races/race_pandaren_male.jpg" width="20px"/></td>';
				}
				elseif($chars->race == 25){ // pandaren alliance
					if($chars->gender == 1)
						echo '<td><img src="assets/images/races/race_pandaren_female.jpg" width="20px"/></td>';
					else
						echo '<td><img src="assets/images/races/race_pandaren_male.jpg" width="20px"/></td>';
				}
				elseif($chars->race == 26){ // pandaren horde
					if($chars->gender == 1)
						echo '<td><img src="assets/images/races/race_pandaren_female.jpg" width="20px"/></td>';
					else
						echo '<td><img src="assets/images/races/race_pandaren_male.jpg" width="20px"/></td>';
				}
				else{ // unknown
					echo '<td><img src="assets/images/races/race_no.png" width="20px"/></td>';
				}
				if($chars->class == 1){ // warrior
					echo '<td><img src="assets/images/class/class_warrior.jpg" width="20px"/></td>';
				}
				elseif($chars->class == 2){ // paladin
					echo '<td><img src="assets/images/class/class_paladin.jpg" width="20px"/></td>';
				}
				elseif($chars->class == 3){ // hunter
					echo '<td><img src="assets/images/class/class_hunter.jpg" width="20px"/></td>';
				}
				elseif($chars->class == 4){ // rogue
					echo '<td><img src="assets/images/class/class_rogue.jpg" width="20px"/></td>';
				}
				elseif($chars->class == 5){ // priest
					echo '<td><img src="assets/images/class/class_priest.jpg" width="20px"/></td>';
				}
				elseif($chars->class == 6){ // death knight
					echo '<td><img src="assets/images/class/class_deathknight.jpg" width="20px"/></td>';
				}
				elseif($chars->class == 7){ // shaman
					echo '<td><img src="assets/images/class/class_shaman.jpg" width="20px"/></td>';
				}
				elseif($chars->class == 8){ // mage
					echo '<td><img src="assets/images/class/class_mage.jpg" width="20px"/></td>';
				}
				elseif($chars->class == 9){ // warlock
					echo '<td><img src="assets/images/class/class_warlock.jpg" width="20px"/></td>';
				}
				elseif($chars->class == 10){ // monk
					echo '<td><img src="assets/images/class/class_monk.jpg" width="20px"/></td>';
				}
				elseif($chars->class == 11){ // druid
					echo '<td><img src="assets/images/class/class_druid.jpg" width="20px"/></td>';
				}
				elseif($chars->class == 12){ // demon hunter
					echo '<td><img src="assets/images/class/class_demonhunter.jpg" width="20px"/></td>';
				}
				else{// unknown
					echo '<td><img src="assets/images/class/class_no.png" width="20px"/></td>';
				}
				echo '<td>'.$chars->level.'</td>
				<td>'.$zone->name.'</td>
				<td><button class="btn btn-theme btn-xs btn-block">Manage</button></td>
			</tr>';
		}
	}
}


?>
