<?php 

session_start();

require_once '../../class/Database.php';
require_once '../../class/Users.php';

$Mail = htmlspecialchars($_POST['email']);
$Password = $_POST['mdp'];

$users = new Users;
$message = $users->verifConnexion($Mail, $Password);

 ?>
