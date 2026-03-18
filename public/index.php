<?php 
require_once __DIR__.'/../src/data/data.php' ;
include __DIR__.'/../src/includes/header.php';
require_once __DIR__.'/../src/lib/fonctions.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/assets/css/style.css">




<div class="titre">
<h1> Catalogue des Films</h1>
<p>Il y a actuellement <span> <?= count($films)?></span> films dans le catalogue</p>
</div>

<?php  ?>

<div class="affichage-card">


    <?php foreach ($films as $film):?>
    <div class="card">

        <span class="badge"><?= strtoupper(substr($film["pays"], 0, 3,) ) ?></span>
        <img src="<?= $film["image"] ?>" alt="film">

            <div class="card-content">
                <h3> <?= $film["titre"] ?></h3>
                <p><?= $film["genre"] ?> - <?= convertirMinute($film["duree"])  ?>min</p>

                  <?php if (strlen($film["synopsis"])>50): ?>
                         <p> <?= substr($film["synopsis"], 0, 70) ?>...</p> 
                  <?php else : ?> 
                        <p> <?= substr($film["synopsis"], 0, 70)?></p>
                 <?php endif ; ?>

            </div>

            <div class="card-action">
                <a href="#" class="btn">Détails</a>
            </div>

    </div>
    <?php endforeach; ?>
</div>



<?php include '../src/includes/footer.php' ?>