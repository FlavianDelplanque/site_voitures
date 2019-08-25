<?php

include_once 'function_img.php';

/*
 * @param array
 * fonction qui traite l'ajout d'une voiture.
 */

function treatment_cars($array){
    $array_treaty = [];
    $treaty_marque = strtoupper($array['marque']);
    $treaty_model = ucfirst($array['model']);
    $treaty_prix = intval($array['prix']);
    $treaty_desc = $array['desc'];
    $treaty_garantie = intval($array['garantie']);
    $treaty_nbchevaux = intval($array['nbchevaux']);
    $treaty_km = intval($array['km']);
    $treaty_color= $array['couleur'];
    $treaty_type= $array['type'];
    $treaty_carburant= intval($array['carburant']);
    $treaty_annee= intval($array['annee']);
    $treaty_slug = random_string();
    $treaty_img= $array['img'];

    $array_treaty = [
        'marque' => $treaty_marque,
        'model' => $treaty_model,
        'prix' => $treaty_prix,
        'desc' => $treaty_desc,
        'garantie' => $treaty_garantie,
        'nbchevaux' => $treaty_nbchevaux,
        'km' => $treaty_km,
        'couleur' => $treaty_color,
        'type' => $treaty_type,
        'carburant' => $treaty_carburant,
        'annee' => $treaty_annee,
        'slug' => $treaty_slug,
        'img' => $treaty_img
    ];
    return $array_treaty;
}

function random_string($length=10){
    $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string = '';
    for($i=0; $i<$length; $i++){
        $string .= $chars[rand(0, strlen($chars)-1)];
    }
    return $string;
}


?>
