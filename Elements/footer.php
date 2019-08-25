<!-- Je fais une div contenant ma navbar du bas (footer) -->
<?php
$test2 = $_SERVER["PHP_SELF"];

$cheminjs = explode("/", $test2);

if(end($cheminjs)=="index.php")
  {
  $cheminjs = "javascript/main.css";
  }
else
 {
   $cheminjs = "../javascript/main.js";
 }
 ?>


<div class="position">
  <div class="footernav">
    <div class="adress">
      <p> 426 rue Gutenberg à Calais</p>
      <img class="reseau" src="../img/divers/insta.png" alt="icone instagram">
      <img class="reseau"src="../img/divers/fb.png" alt="icone facebook">
    </div>
    <?php echo'<medium>&copy; copyright '.date('Y').'</medium>'; ?>
  </div>
</div>

<script src="<?= $cheminjs ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script> 
 
          <script type="text/javascript">
         $(document).ready(function(){
            $(".owl-carousel").owlCarousel({
               items: 1,
               nav: true,
               autoplay: true,
               loop: true,
            });
         });
         </script> 
</body>
</html>

