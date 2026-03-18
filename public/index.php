

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<?php include '../src/includes/header.php' ?>


<?php include '../src/data/data.php' ?>


<h1> Catalogue des Films</h1>
<p><?= count($films)?></p>


<?php foreach ($films as $film):?>
<div class="card">

<span class="badge"><?= strtoupper( mb_substr($film["pays"], 0, 3,) ) ?></span>
  <img src="<?= $film["image"] ?>" alt="film">

    <div class="card-content">
        <h3> <?= $film["titre"] ?></h3>
        <p><?= $film["genre"] ?> - <?= $film["duree"]  ?>min</p>
        <p> <?= $film["synopsis"] ?></p>       
    </div>

    <div class="card-action">
        <a href="#" class="btn">Détails</a>
    </div>

</div>
<?php endforeach; ?>

<?php include '../src/includes/footer.php' ?>