<?php $title = "Connexion";
include '../Elements/header.php'; 
include '../Elements/nav.php';
?>
<div class="divConnexion">
	<form class="formConnexion" action="../Elements/handling/authentification.php" method="POST" name="connexion">
		<input type="text" name="email" placeholder="Username" class="inputFormulaireConnexion">
		<input type="password" name="mdp" placeholder="Password" class="inputFormulaireConnexion">
		<input type="submit" value="se connecter" class="boutonFormulaireConnexion">
		<p><?php if (isset($_SESSION['erreur'])) { echo $_SESSION['erreur']; } ?></p>
	</form>
	<a href="inscription.php">Pas encore inscrit ?</a>
</div>

<?php include '../Elements/footer.php'; ?>
