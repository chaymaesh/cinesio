<?php
include __DIR__.'/../src/includes/header.php';
require_once __DIR__ .'/../src/repositories/filmRepository.php';
require_once __DIR__.'/../src/lib/fonctions.php';

$genres = getGenre();
$paysListe= getPays();

// validation 
$titre = '';
$date = '';
$duree = '';
$synopsis = '';
$image = '';
$genre = '';
$pays = '';
$erreurs=[];
$succes = false;

if ($_SERVER["REQUEST_METHOD"]==="POST") {
   
    $titre= trim($_POST['titre']  ?? '');
    $date= trim($_POST['date_sortie']  ?? '');
    $duree= trim($_POST['duree']  ?? '');
    $synopsis = trim($_POST['synopsis']  ?? '');
    $image = trim($_POST['image']  ?? '');
    $genre = trim($_POST['genre']  ?? '');
    $pays = trim($_POST['pays']  ?? '');


// validation du titre 

    if ($titre == ''){
        
        $erreurs['titre']= "le titre est obligatoire";

    } elseif (strlen($titre) < 2) {
        $erreurs['titre']= "le titre doit comporter au moins 2 caractères";

    }

// date 
 if ($date == ''){
       
        $erreurs['date']= "la date est obligatoire";
 }
 
 // durée

  if ($duree == ''){
       
        $erreurs['duree']= "la durée est obligatoire";
 } elseif ($duree <= 0) {
        $erreurs['duree']= "la durée doit être supérieur à 0";

    }
 
//synopsis
 if ($synopsis == ''){
        
        $erreurs['synopsis']= "le synopsis est obligatoire";

    } elseif (strlen($synopsis) < 10) {
        $erreurs['synopsis']= "le synopsis doit comporter au moins 10 caractères";

    }

// image 
 if ($image == ''){
        $erreurs['image']= "l'image est obligatoire";
      } elseif (!filter_var($image, FILTER_VALIDATE_URL)) {
        $erreurs['image']= "veuillez saisir une URL correct";
      }

// genre
    if ($genre == ''){
        //le pseudo n'a pas été saisi
        $erreurs['genre']= "le genre est obligatoire";

    } 

// pays 
 if ($pays == ''){
        
        $erreurs['pays']= "le pays est obligatoire";

    } 

    if (empty($erreurs)) {
            $filmData = [
        "titre" => $titre,
        "date_sortie" => $date,
        "duree" => $duree,
        "synopsis" => $synopsis,
        "image" => $image,
        "genre" => $genre,
        "pays" => $pays
    ];
  $succes = insertFilm($filmData);
    
   
    if ($succes){
       $titre = '';
    $date = '';
    $duree = '';
    $synopsis = '';
    $image = '';
    $genre = '';
    $pays = '';
}
     }     

}
?>



<div class="page-formulaire"> 
<h2>Ajouter un nouveau film</h2>
<h3>Veuillez renseigner les informations ci-dessous pour ajouter un film au catalogue CineSIO</h3>
<?php if ($succes) : ?>
            <div class="succes-message"> Le film a été ajouter avec succès !</div>
        <?php endif ; ?>
</div>


<div class="formulaire">
    <form action="" method="POST" novalidate>

        <div class="seul">
            <label for="titre">Titre du film <span class="required">*</span></label>
            <input type="text" id="titre" name="titre" placeholder="Ex: Dune: Deuxième Partie" 
            value="<?= $titre ?>"
                   required
                   minlength="2" />

                    <?php if (isset($erreurs['titre'])) : ?>
                        <div class="erreur-message"> <?=  $erreurs["titre"] ?></div>
                    <?php endif; ?>
        </div>

        <div class="double">
            <div >
                <label for="date_sortie">Date de sortie <span class="required">*</span></label>
                <input type="date" id="date_sortie" name="date_sortie" value="<?= $date ?>"/>

                <?php if (isset($erreurs['date'])) : ?>
                        <div class="erreur-message"> <?=  $erreurs["date"] ?></div>
                    <?php endif; ?>
            </div>
             <div>
                <label for="duree">Durée (en minutes) <span class="required">*</span> </label>
                <input type="number" id="duree" name="duree" placeholder="Ex: 166" value="<?= $duree ?>" />
                <?php if (isset($erreurs['duree'])) : ?>
                        <div class="erreur-message"> <?=  $erreurs["duree"] ?></div>
                    <?php endif; ?>
            </div>
        </div>

         <div  class="seul">
            <label for="synopsis">Synopsis <span class="required">*</span></label>
            <textarea name="synopsis" rows="5" placeholder="Le héro commence son périple..." ><?= $synopsis ?></textarea>
            <?php if (isset($erreurs['synopsis'])) : ?>
                        <div class="erreur-message"> <?=  $erreurs["synopsis"] ?></div>
                    <?php endif; ?>
        </div>

        <div  class="seul">
            <label for="image">Affiche web (URL de l'image) <span class="required">*</span></label>
            <input type="url" id="image" name="image" placeholder="http://exemple.com/image.jpg" value="<?= $image ?>"/>
            <?php if (isset($erreurs['image'])) : ?>
                        <div class="erreur-message"> <?=  $erreurs["image"] ?></div>
                    <?php endif; ?>
        </div>

        <div class="double">
            <div>
            <label for="genre">Genre <span class="required">*</span> :</label> 
                <select id="genre" name="genre" value="<?= $genre ?>">
                    <option value="">Sélectionner un genre</option>
                     <?php foreach ($genres as $genre) : ?>
                        <option value="<?=  $genre["id"]?>"> <?= $genre["nom"] ?> </option>
                     <?php endforeach ; ?>
                </select>
                <?php if (isset($erreurs['genre'])) : ?>
                        <div class="erreur-message"> <?=  $erreurs["genre"] ?></div>
                    <?php endif; ?>
            </div>
            <div>
            <label for="pays">Pays <span class="required">*</span> :</label> 
                <select id="pays" name="pays" value="<?= $pays ?>">
                    <option value="">Sélectionner un pays</option>
                     <?php foreach ($paysListe as $p) : ?>
                        <option value="<?=  $p["id"]?>"> <?= $p["nom"] ?> </option>
                     <?php endforeach ; ?>
                </select>
                <?php if (isset($erreurs['pays'])) : ?>
                        <div class="erreur-message"> <?=  $erreurs["pays"] ?></div>
                    <?php endif; ?>
            </div>
        </div>
        
        <div  class="seul">
            <button type="submit" class="btn-submit">
                <i class="bi bi-plus-circle"> </i> Ajouter ce film au catalogue
            </button>
        </div>



    </form>



</div>


<?php include __DIR__.'/../src/includes/footer.php' ?>



