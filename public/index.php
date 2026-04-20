<?php 
//require_once __DIR__.'/../src/data/data.php' ; 
include __DIR__.'/../src/includes/header.php';
require_once __DIR__.'/../src/lib/fonctions.php';
require_once __DIR__ .'/../src/repositories/filmRepository.php';
$films = findAllFilms();

?>





<div class="titre">
<h1> Catalogue des Films</h1>
<p>Il y a actuellement <span> <?= count($films)?></span> films dans le catalogue</p>
</div>

<?php  ?>

<div class="affichage-card">


    <?php foreach ($films as $film):?>

    <div class="card">
        

        <span class="badge"><?= strtoupper(substr($film["initiale"], 0, 3,) ) ?></span>
        <img src="<?= $film["image"] ?>" alt="film">

            <div class="card-content">
                <h3> <?= $film["titre"] ?></h3>
                <p><?= $film["nom_genre"] ?> - <?= convertirMinute($film["duree"])  ?></p>

                  <?php if (strlen($film["synopsis"])>50): ?>
                         <p> <?= substr($film["synopsis"], 0, 70) ?>...</p> 
                  <?php else : ?> 
                        <p> <?= substr($film["synopsis"], 0, 70)?></p>
                 <?php endif ; ?>

            </div>

            <div class="card-action">
                
                <a href="detail-film.php?id=<?= $film['id'] ?>" class="btn">Détail</a>
            </div>

    </div>
    <?php endforeach; ?>
</div>



<?php include '../src/includes/footer.php' ?>