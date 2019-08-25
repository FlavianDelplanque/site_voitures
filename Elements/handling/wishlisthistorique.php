<?php 

session_start();

require_once '../../class/Database.php';
require_once '../../class/Users.php';
require_once '../../class/Cars.php';

$users = new Users;
$cars = new Cars;


if (isset($_POST['ajoutWishlistIdVoiture'])) {
	$voiture = $cars->show_cars(['id' => $_POST['ajoutWishlistIdVoiture']]);
	$slug = $voiture[0]->slug;
	$users->ajoutWishlist($_POST['ajoutWishlistIdVoiture']);
	header("Location:../../pages/product.php?slug=".$slug);
}
else if (isset($_POST['modificationWishlistIdVoiture'])) {
	$voiture = $cars->show_cars(['id' => $_POST['modificationWishlistIdVoiture']]);
	$slug = $voiture[0]->slug;
	$users->modificationWishlist($_POST['modificationWishlistIdVoiture']);
	header("Location:../../pages/product.php?slug=".$slug);
}
else if (isset($_POST['modificationWishlistSlugVoiture'])) {
	$voiture = $cars->show_cars(['slug' => $_POST['modificationWishlistSlugVoiture']]);
	$users->modificationWishlist($voiture[0]->id);
	header("Location:../../pages/profil.php");
}
else if (isset($_POST['suppressionWishlistIdVoiture'])) {
	$users->suppressionWishlist($_POST['suppressionWishlistIdVoiture']);
	header("Location:../../pages/profil.php");
}
else if (isset($_POST['historiqueIdVoiture'])) {
	$users->historique($_POST['historiqueIdVoiture']);
}

 ?>

