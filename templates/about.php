<?php
require_once("header.php");

?>

<div class="container">
    <h1>A propos de nous</h1>

    <h2>LA BRIGADE DWWM:</h2>

    <div class="card-list">
    <?php foreach ($data as $person) { ?>
        <div class="about-card">
            <img src="../public/assets/img/brigade/<?=$person?>.jpg" alt="">
        </div>

        <?php }
        ?>


        


    </div>
</div>




</body>

</html>