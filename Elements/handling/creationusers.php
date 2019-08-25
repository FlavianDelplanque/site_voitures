<?php 

require_once '../../class/Database.php';
require_once '../../class/Users.php';
require_once '../../function/function_img.php';

session_start();

$tableauInfo = array('nom', 'prenom', 'adresse', 'mdp');

foreach ($tableauInfo as $info) {
	if (empty($_POST[$info])) {
		$_SESSION['erreur'] = "champ vide";
		header("Location:../../pages/inscription.php");
		exit();
	}
}

$Nom = htmlspecialchars($_POST['nom']);
$Prenom = htmlspecialchars($_POST['prenom']);
$Adresse = htmlspecialchars($_POST['adresse']);
$Mail = htmlspecialchars($_POST['email']);
$Password = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

if (preg_match("#^[a-zA-Z]+@[a-zA-Z]+\.[a-zA-Z]{2,5}$#",$Mail)) {
	$users = new Users;
	$emailVerif = $users->infoUsers($Mail);
	if (!empty($emailVerif)) {
		$_SESSION['erreur'] = "email déjà utiliser";
		header("Location:../../pages/inscription.php");
	}
	else {
		$extensionFiles = explode('/', $_FILES['photo']['type']);
		$microtime = explode(" ", microtime());
		$microtime = implode("", $microtime);
		$microtime = explode(".", $microtime);
		$microtime = implode("", $microtime);
		$_FILES['photo']['name'] = $microtime.".".$extensionFiles[1];
		$Photo = verif_img($_FILES['photo'], "../../img/photo_profil/");
		$idUsers = $users->addCompte($Nom, $Prenom, $Adresse, $Photo, $Mail, $Password);
		$_SESSION['idUsers'] = $idUsers;
		$_SESSION['erreur'] = "";
		header("Location:../../pages/profil.php");
	}
}
else {
	$_SESSION['erreur'] = "email incorrect";
	header("Location:../../pages/inscription.php");
}


 ?>
