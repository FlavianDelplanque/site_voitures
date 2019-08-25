<?php
include_once '../../class/Cars.php';

$effacer = new Cars;
$effacer->remove_cars($_POST['id']);

header('Location:../../pages/admin.php');
