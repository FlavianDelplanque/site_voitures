<?php $title = "Admin";
include '../Elements/header.php';
$voiture = $voitures->show_cars(['id' => $_POST['id']]);
$garantie = $voiture[0]->garantie;
$couleur = $voiture[0]->couleur;
$tableauCouleur = array('Rouge' , 'Bleu', 'Vert', 'Noir', 'Blanc', 'Jaune', 'Autre');
$carburant = $voiture[0]->carburant;
$_SESSION['slugVoiture'] = $voiture[0]->slug;
?>

<h1>Modifier un véhicule</h1>
<form class="col s12" method="POST" action="../Elements/handling/updatecars.php" enctype="multipart/form-data">
    <div class="row">
        <div class="input-field col s4">
            <input placeholder="Marque" id="marque" type="text" class="validate" name="marque" value="<?= $voiture[0]->marque?>">
            <label for="marque" class="active">Marque</label>
        </div>

        <div class="input-field col s4">
            <input id="model" placeholder="Modéle" type="text" class="validate" name="model" value="<?= $voiture[0]->model?>">
            <label for="model" class="active">Modele</label>
        </div>

        <div class="input-field col s4">
            <input placeholder="Prix sans le signe €" id="price" type="text" class="validate" name="prix" value="<?= $voiture[0]->prix?>">
            <label for="price" class="active">Prix</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s8">
            <textarea id="description" class="materialize-textarea" name="desc"><?= $voiture[0]->description?></textarea>
            <label for="description" class="active">Description</label>
        </div>

        <div class="input-field col s4">
            <input id="km" type="text" placeholder="Kilometrage" class="validate" name="km" value="<?= $voiture[0]->km?>">
            <label for="km" class="active">Kilometrage</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s4">
            <select name="garantie">
                <option value="" disabled>Choix de la garantie</option>
                <option value="0" <?php if ($garantie==0) {echo "selected";} ?>>3 Mois</option>
                <option value="1" <?php if ($garantie==1) {echo "selected";} ?>>6 Mois</option>
                <option value="2" <?php if ($garantie==2) {echo "selected";} ?>>9 Mois</option>
            </select>
            <label for="garantie" class="active">Garantie</label>
        </div>

        <div class="input-field col s4">
            <input id="nbchevaux"  placeholder="Nombre de chevaux" type="text" class="validate" name="nbchevaux" value="<?= $voiture[0]->nbchevaux?>">
            <label for="nbchevaux" class="active">Nombre de chevaux</label>
        </div>

        <div class="input-field col s4">
            <input id="type" placeholder="Type" type="text" class="validate" name="type" value="<?= $voiture[0]->type?>">
            <label for="type" class="active">Type</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s4">
            <select name="couleur">
                <option value="" disabled>Couleur dominante</option>
                <?php foreach ($tableauCouleur as $color) :?>
                    <option value="<?= $color?>" <?php if ($couleur==$color) {echo "selected";} ?>><?= $color?></option>
                <?php endforeach; ?>
            </select>


        
            <label for="color" class="active">Couleur</label>
        </div>

        <div class="input-field col s4">
            <select name="carburant">
                <option value="" disabled>Choix du carburant</option>
                <option value="0" <?php if ($carburant==0) {echo "selected";} ?>>Diesel</option>
                <option value="1" <?php if ($carburant==1) {echo "selected";} ?>>Essence</option>
                <option value="2" <?php if ($carburant==2) {echo "selected";} ?>>Hybride</option>
            </select>
            <label for="carbu" class="active">Carburant</label>
        </div>

        <div class="input-field col s4">
            <input id="annee" placeholder="Année" type="text" class="validate" name="annee" value="<?= $voiture[0]->annee?>">
            <label for="annee" class="active">Annee</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s6">
            <input id="img" type="file" class="validate" name="img" accept="image/png">
        </div>
    </div>

    <div class="row">
        <button type="submit"><a class="wave-effect waves-light btn">Envoyer</a></button>
    </div>
</form>

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

<?php require_once '../Elements/footer.php' ?>
