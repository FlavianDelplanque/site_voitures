<?php $title = "Admin";
require_once '../Elements/header.php'; 
require_once '../Elements/nav.php';


if (isset($infoUsers)&&$infoUsers['statue']==0) {
?>

<div class="row">

            <?php
                $Voitures = $voitures->show_cars();
            ?>

    <div class="col s3">
        <ul class="menu_admin">
            <li><a class="active" href="#add_car">Ajouter un véhicule</a></li>
            <li><a href="#update_car">Modifier un véhicule</a></li>
            <li><a href="#remove_car">Supprimer un véhicule</a></li>
        </ul>
    </div>


    <div class="col s8 row content active" id="add_car">
        <h1>Ajouter un véhicule</h1>
        <form class="col s12" method="POST" action="../Elements/handling/addcar.php" enctype="multipart/form-data">
            <div class="row">
                <div class="input-field col s4">
                    <input placeholder="Marque" id="marque" type="text" class="validate" name="marque">
                    <label for="marque">Marque</label>
                </div>

                <div class="input-field col s4">
                    <input id="model" placeholder="Modéle" type="text" class="validate" name="model">
                    <label for="model">Modele</label>
                </div>

                <div class="input-field col s4">
                    <input placeholder="Prix sans le signe €" id="price" type="text" class="validate" name="prix">
                    <label for="price">Prix</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s8">
                    <textarea id="description" class="materialize-textarea" name="desc"></textarea>
                    <label for="description">Description</label>
                </div>

                <div class="input-field col s4">
                    <input id="km" type="text" placeholder="Kilometrage" class="validate" name="km">
                    <label for="km">Kilometrage</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s4">
                    <select name="garantie">
                        <option value="" disabled selected>Choix de la garantie</option>
                        <option value="0">3 Mois</option>
                        <option value="1">6 Mois</option>
                        <option value="2">9 Mois</option>
                    </select>
                    <label for="garantie">Garantie</label>
                </div>

                <div class="input-field col s4">
                    <input id="nbchevaux"  placeholder="Nombre de chevaux" type="text" class="validate" name="nbchevaux">
                    <label for="nbchevaux">Nombre de chevaux</label>
                </div>

                <div class="input-field col s4">
                    <input id="type" placeholder="Type" type="text" class="validate" name="type">
                    <label for="type">Type</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s4">
                    <select name="couleur">
                        <option value="" disabled selected>Couleur dominante</option>
                        <option value="Rouge">Rouge</option>
                        <option value='Bleu'>Bleu</option>
                        <option value="Vert">Vert</option>
                        <option value="Noir">Noir</option>
                        <option value="Blanc">Blanc</option>
                        <option value="Jaune">Jaune</option>
                        <option value="Autre">Autre</option>
                    </select>
                    <label for="color">Couleur</label>
                </div>

                <div class="input-field col s4">
                    <select name="carburant">
                        <option value="" disabled selected>Choix du carburant</option>
                        <option value="0">Diesel</option>
                        <option value="1">Essence</option>
                        <option value="2">Hybride</option>
                    </select>
                    <label for="carbu">Carburant</label>
                </div>

                <div class="input-field col s4">
                    <input id="annee" placeholder="Année" type="text" class="validate" name="annee">
                    <label for="annee">Annee</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <input id="img" type="file" class="validate" name="img">
                </div>
            </div>

            <div class="row">
                <button type="submit"><a class="wave-effect waves-light btn">Envoyer</a></button>
            </div>
        </form>
    </div>

    <div class="col s8 row content" id="update_car">

        <h1>Modifier un véhicule</h1>
        <div class="row">
            <?php foreach ($Voitures as $voiture) :?>
                <div class="col s12 row">

                    <div class="supp_voiture col s10">
                        <p><?= $voiture->marque?> - <?= $voiture->model ?> - <?=$voiture->prix ?></p>
                    </div>

                    <div class="col s2">
                        <form method="post" action="updatecar.php">
                            <input type="hidden" value="<?= $voiture->id ?>" name='id'>
                            <button type="submit">Modifier</button>
                        </form>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="col s8 row content" id="remove_car">
        <h1>Supprimer un véhicule</h1>
        <div class="row">
            <?php foreach ($Voitures as $voiture) :?>
                <div class="col s12 row">
                    <div class="supp_voiture col s10">
                        <?= $voiture->marque, $voiture->model, $voiture->prix ?>
                    </div>
                    <div class="col s2">
                        <form method="post" action="../Elements/handling/removecar.php">
                            <input type="hidden" value="<?= $voiture->id ?>" name='id'>
                            <button type="submit">Supprimer</button>
                        </form>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems, {});
    });
    (function(){
        var menu = document.querySelector('.menu_admin');
        var as = menu.querySelectorAll('li');
        as.forEach(li => {
            li.addEventListener('click', function(e){
                if(this.classList.contains('active')){
                    return false;
                }
                menu.querySelector('li .active').classList.remove('active');
                this.firstChild.classList.add('active');
                document.querySelector('.content.active').classList.remove('active');
                var attrHref = this.querySelector('a').getAttribute('href').split("#");
                document.getElementById(attrHref[1]).classList.add('active');
            })
        });
    })();
</script>

<?php } else { header("Location:connexion.php"); } ?>

<?php require_once '../Elements/footer.php' ?>
