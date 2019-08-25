<?php 

session_start();

if ($_POST['codeco']=="co") {
	header("Location:../../pages/connexion.php");
}
else {
	$_SESSION['idUsers'] = NULL;
	header("Location:../../index.php");
}


?>
