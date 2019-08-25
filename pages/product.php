<?php
$title = 'produit';
include "../Elements/header.php";
include "../Elements/nav.php";

$slug =(isset($_GET['slug'])? $_GET['slug'] : false);
$voiture = $voitures->show_cars(['slug' => $slug]);
$historique = $users->historique($voiture[0]->id);
?>

  <main class="container main_product">

    <div class="row car">
      <div class="col s12 car">
        <img class="materialboxed center-align" width="650" src="../<?=$voiture[0]->photo?>">
      </div>
      <div class="col s12">
          <h1><?=$voiture[0]->marque?></h1>
      </div>
      <div class='col s12'>
          <?=$voiture[0]->description?>
      </div>
      <div class="striped">
        <table>
        <thead>
          <tr>
              <th>Informations supplémentaires</th>
              <th></th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>Marque</td>
            <td><?=$voiture[0]->marque?></td>
          </tr>
          <tr>
            <td>Modèle</td>
            <td><?=$voiture[0]->model?></td>
          </tr>
          <tr>
            <td>Prix</td>
            <td><?=$voiture[0]->prix?></td>
          </tr>
          <tr>
            <td>Garantie</td>
            <td><?=$voiture[0]->garantie?></td>
          </tr>
          <tr>
            <td>Nombre de chevaux</td>
            <td><?=$voiture[0]->nbchevaux?></td>
          </tr>
          <tr>
            <td>Kilomètrage</td>
            <td><?=$voiture[0]->km?></td>
          </tr>
          <tr>
            <td>Couleur</td>
            <td><?=$voiture[0]->couleur?></td>
          </tr>
          <tr>
            <td>Type</td>
            <td><?=$voiture[0]->type?></td>
          </tr>
          <tr>
            <td>Carburant</td>
            <td><?=$voiture[0]->carburant?></td>
          </tr>
          <tr>
            <td>Année</td>
            <td><?=$voiture[0]->annee?></td>
          </tr>
        </tbody>
      </table>

      </div>

    </div>

    <form action="../Elements/handling/wishlisthistorique.php" method="POST">
    <?php
    $wishlist = explode(",", $infoUsers['wishlist']);
    $verifWishlist = array_search($voiture[0]->id, $wishlist);
    if ($verifWishlist==0) :?>
      <button name="ajoutWishlistIdVoiture" value="<?= $voiture[0]->id ?>">Ajouter la voiture a la wishlist</button>
    <?php else :?>
      <button name="modificationWishlistIdVoiture" value="<?= $voiture[0]->id ?>">Supprimer la voiture de la wishlist</button>
    <?php endif ?>
    </form>

</main>

<?php include "../Elements/footer.php"?>

<script>
document.addEventListener('DOMContentLoaded', function() {
var elems = document.querySelectorAll('.materialboxed');
var instances = M.Materialbox.init(elems,{});
});

document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('select');
  var instances = M.FormSelect.init(elems,{});
});


</script>
