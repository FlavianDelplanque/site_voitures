<?php $title = "Inscription";
include "../Elements/header.php";
include "../Elements/nav.php";
?>
<form action="../Elements/handling/creationusers.php" method="POST" name="inscription" enctype="multipart/form-data">
	<label>Nom</label>
	<input type="text" name="nom">
	<label>Prénom</label>
	<input type="text" name="prenom">
	<label>Photo</label>
	<input type="file" name="photo">
	<label>Adresse</label>
	<input type="text" name="adresse">
	<label>Email</label>
	<input type="text" name="email">
	<label>Mot de passe</label>
	<input type="text" name="mdp">
	<input type="submit" value="créer un compte" >
	<p><?php if (isset($_SESSION['erreur'])) { echo $_SESSION['erreur']; } ?></p>
</form>


<?php include "../Elements/footer.php"?>