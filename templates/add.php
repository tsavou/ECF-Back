<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once("header.php");

?>

<div class="container">

    <div class="form">
        <h2>Ajouter un matelas</h2>
        <?=$message?>
        <form action="" method="post">

            <div class="form-group">
                <label for="name">Nom du matelas :</label>
                <input type="text" id="name" name="name" value="<?= isset($data["name"]) ? $data["name"] : "" ?>">
            </div>

            <div class="form-group">
                <label for="marque">Marque :</label>
                <input type="text" id="marque" name="marque" value="<?= isset($data["marque"]) ? $data["marque"] : "" ?>" required>
            </div>

            <div class="form-group">
                <label for="selectDimensions">Dimensions :</label>
                <select name="dimensions" id="selectDimensions">
                    <option value="" disabled selected>Selectionnez la dimension</option>
                    <option value="1">90x190</option>
                    <option value="2">140x90</option>
                    <option value="3">160x200</option>
                    <option value="4">180x200</option>
                    <option value="5">200x200</option>
                </select>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="text" id="image" name="image" value="<?= isset($data["poster"]) ? $data["poster"] : "" ?>" required>
            </div>

            <div class="form-group">
                <label for="prix">Prix</label>
                <input type="number" id="prix" name="prix" min="0" value="<?= isset($data["prix"]) ? $data["prix"] : "" ?>" required>
            </div>

            <div class="form-group">
                <label for="promotion">Promotion</label>
                <input type="number" id="promotion" name="promotion" min="0" value="<?= isset($data["promotion"]) ? $data["promotion"] : "" ?>">
            </div>

            <div class="submit">

                <button type="submit" class="button">
                    <span class="button__text">Ajouter</span>
                    <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg">
                            <line y2="19" y1="5" x2="12" x1="12"></line>
                            <line y2="12" y1="12" x2="19" x1="5"></line>
                        </svg></span>
                </button>
            </div>
        </form>


    </div>