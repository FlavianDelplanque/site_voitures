<?php
$title='Bienvenue';
require_once 'class/Cars.php';
include "Elements/header.php";
$test = $voitures->show_cars();
//voiture->photo ça me donne le chemin de la photo correspondant a la voiture.
//voiture->marque ça me donne la marque de la voiture correspondant.
?>

<?php include "Elements/nav.php"?>


        <main>
         <section class="carousel" >
            <div class="owl-carousel owl-theme">
               <?php foreach ($test as $voiture) :?>
                  <div style="background-image:url(<?=$voiture->photo?>)">
                     <a href="" class="t1"><?=$voiture->marque ?></a>
                  </div>
               <?php endforeach ?>
            </div>
         </section>

         </main>

         

<?php include "Elements/footer.php" ?>
