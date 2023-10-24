<?php
require_once("header.php");

?>

<div class="container">
    <h1>Bienvenue sur Literie 3000</h1>

    <div class="card-list">


        <?php foreach ($data as $matelas) { ?>
            <div class="card">
                <img src="<?= $matelas['poster'] ?>" alt="<?= $matelas['name'] ?>">
                <div class="card__content">
                    <h2 class="card__title"><?= $matelas['name'] ?></h2>
                    <ul>
                        <li>Marque: <?= $matelas['marque'] ?></li>
                        <li>Dimensions: <?= $matelas['dimensions'] ?></li>
                    </ul>

                    <ul class="price">
                        <li class="<?= $matelas['promotion'] > 0 ? "before-promotion" : "" ?>">
                            <?= $matelas['promotion'] > 0 ? $matelas['prix'] : $matelas['prix'] ?> €
                        </li>
                        <?php if ($matelas['promotion'] > 0) { ?>
                            <li class="promotion"><?= $matelas['prix'] - $matelas['promotion'] ?> €</li>
                        <?php } ?>
                    </ul>


                </div>
            </div>


        <?php }
        ?>
    </div>
</div>




</body>

</html>