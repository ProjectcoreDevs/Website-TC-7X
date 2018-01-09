<?php session_start();
include_once("../core/functions.php");
$system = new System;
$system->db = $db;

if(isset($_GET['initCart'])){
	if(!isset($_SESSION['cmsCart'])){
		$_SESSION['cmsCart'] = array();
		$_SESSION['cmsCart']['productID'] = array();
		$_SESSION['cmsCart']['productImage'] = array();
		$_SESSION['cmsCart']['productTitle'] = array();
		$_SESSION['cmsCart']['productQuantity'] = array();
		$_SESSION['cmsCart']['productPrice'] = array();
	}
	return true;
}

if(isset($_GET['deleteCart'])){
	if(isset($_SESSION['cmsCart'])){
		$_SESSION['cmsCart'] = array();
		$_SESSION['cmsCart']['productID'] = array();
		$_SESSION['cmsCart']['productImage'] = array();
		$_SESSION['cmsCart']['productTitle'] = array();
		$_SESSION['cmsCart']['productQuantity'] = array();
		$_SESSION['cmsCart']['productPrice'] = array();
	}
	return true;
}

if(isset($_GET['addItem']) && isset($_GET['itemID'])){
	$items = $db->query("SELECT * FROM db_arcania.products WHERE id=".$_GET['itemID']);
	$item = $items->fetch_object();
	$system->addItemToCart($item->id,$item->image,$item->title_en,'1',$item->price);
}

if(isset($_GET['delItem']) && isset($_GET['itemID'])){
	$item = $system->delProductCart($_GET['itemID']);
}

if(isset($_GET['getAllCartItems'])){
	$nbArticles=count($_SESSION['cmsCart']['productID']);
	if($nbArticles <= 0)
		echo '<h5><center>Votre panier est vide ! </center></h5>';
	else{
		for($i=0;$i<$nbArticles;$i++){
			$items = $db->query("SELECT * FROM db_arcania.products WHERE id=".$_SESSION['cmsCart']['productID'][$i]);
			$item = $items->fetch_object();
			?>
			<div style="border-bottom:1px solid #5e5e5e;padding-bottom:5px;">
				<a href="#" title="Supprimer" onclick="delProductCart(<?=$item->id?>)">
                    <span class="fa fa-remove"></span>
                </a>
				<img src="assets/images/<?=$item->image?>" width="20px"/> <?=$item->title_en?> <span class="pull-right" style="margin-right:5px"><?=$item->price?> <img src="assets/images/pts.png" width="10px"/></span>
			</div>
			<?php 
		}
		echo '<h3 style="border-top:2px solid #fff;padding-top:5px;">Total : <span class="pull-right"> '.$system->totalCart().' <img src="assets/images/pts.png" width="15px"/></span></h3>
		<button class="btn btn-theme btn-md btn-block">Checkout</button>
';
	}
}

?>