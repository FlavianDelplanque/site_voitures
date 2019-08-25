<?php $title = "Galerie";
include "../Elements/header.php";
include "../Elements/nav.php"; ?>

<?php $Voitures = $voitures->show_cars(); 
?>

  <main class="row main_galerie">

<?php foreach ($Voitures as $voiture) :?>
    <div class="row col m3 s12">
      <div class="col s12">
        <div class="card">
          <div class="card-image">
            <img src="../<?=$voiture->photo?>">
            <span class="card-title"><?=$voiture->model?></span>
            <a class="btn-floating halfway-fab waves-effect waves-light grey" href='product.php?slug=<?= $voiture->slug?>'><i class="material-icons button">+</i></a>
          </div>
          <div class="card-content perso">
            <p><?=$voiture->description?></p>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('select');
  var instances = M.FormSelect.init(elems,{});
});

</script>
<?php include "../Elements/footer.php"?>
