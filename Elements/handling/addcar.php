<?php
require_once '../../class/Database.php';

require_once '../../class/Cars.php';

require_once '../../function/function_car.php';

require_once '../../function/function_img.php';

$extensionFiles = explode('/', $_FILES['img']['type']);
$microtime = explode(" ", microtime());
$microtime = implode("", $microtime);
$microtime = explode(".", $microtime);
$microtime = implode("", $microtime);
$_FILES['img']['name'] = $microtime.".".$extensionFiles[1];
$path_img = verif_img($_FILES['img'], '../../img/photo_voiture/');


$para_cars = [
    'marque' => $_POST['marque'],
    'model' => $_POST['model'],
    'prix' => $_POST['prix'],
    'desc' => $_POST['desc'],
    'garantie' => $_POST['garantie'],
    'nbchevaux' => $_POST['nbchevaux'],
    'km' => $_POST['km'],
    'couleur' => $_POST['couleur'],
    'type' => $_POST['type'],
    'carburant' => $_POST['carburant'],
    'annee' => $_POST['annee'],
    'img' => $path_img,
];

$car = treatment_cars($para_cars);


$cars = new Cars;
$cars->add_cars($car);

header('Location:../../pages/admin.php');
?>
