<?php
include __DIR__.'/../src/includes/header.php';
require_once __DIR__ .'/../src/repositories/filmRepository.php';
require_once __DIR__.'/../src/lib/fonctions.php';

$films=findAllFilms();

$messageErreur= "";
$produitRecherche = null ; 


$id = $_GET['id'] ?? '';


if ($id === '') {
    $messageErreur = "URL invalide : identifiant de film manquant ";
} elseif (filter_var($id, FILTER_VALIDATE_INT)=== false ){
    $messageErreur = "URL invalide : identifiant doit être une valeur numérique";
} elseif((int)$id <= 0) {
    $messageErreur = "URL invalide : identifiant doit être strictement positif ";
} else {
    
    $id = (int)$id;   
   
    foreach($films as $film) {
        if ($film['id']=== $id){
            $produitRecherche = $film;
            break;
        }
            
    }
    if ($produitRecherche === null) {
        $messageErreur = "Le film rechercher n'existe pas dans le catalogue";
    }
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/assets/css/style.css">
    
<a href="index.php?id=<?= $film['id'] ?>" class="retour"> <i class="bi bi-arrow-left"></i>Retour au catalogue</a>

      <?php if ($messageErreur !== "") : ?>
        <div class="erreur">
            <?= $messageErreur ?>
        </div>
    <?php else : ?>
        <div class=" fiche-film">
           
            
            <img src="<?= $film["image"] ?>" alt="film">

            <div class="contenue">
                    <div class="date-genre-pays">
                        <p><?= $produitRecherche["initiale"] ?></p>
                        <p><?= $produitRecherche["nom_genre"] ?></p>
                        <p><?= substr($produitRecherche["date_sortie"], 0, 4)?></p>
                    </div>

               
            <h2> <?= htmlspecialchars($produitRecherche['titre'])  ?> </h2>
            <p><i class="bi bi-clock"></i><?= convertirMinute($produitRecherche['duree']) ?></p>
            <p><?= htmlspecialchars($produitRecherche['synopsis']) ?></p> 

                <div class="card-action">
                    <a href="#" class="btn-catalogue">On verra plus tard...</a>
                </div>
            </div>
          
        </div>
    <?php endif ; ?>








    <?php include '../src/includes/footer.php' ?>