<?php
include __DIR__.'/../src/includes/header.php';
require_once __DIR__ .'/../src/repositories/utilisateurRepository.php';



// validation 
$email = '';
$pseudo = '';
$motDePasse = '';
$confirmation = '';
$erreurs=[];
$succes = false;


if ($_SERVER["REQUEST_METHOD"]==="POST") {
   
    $email= trim($_POST['email']  ?? '');
    $pseudo= trim($_POST['pseudo']  ?? '');
    $motDePasse= ($_POST['mot_de_passe']  ?? '');
    $confirmation = ($_POST['confirmation']  ?? '');

 $emailBdd= findUtilisateurByEmail($email);
 $pseudoBdd= findUtilisateurByPseudo($pseudo);
  
//Verification email

 if ($email == ''){
        $erreurs['email']= "l'email est obligatoire";
      } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreurs['email']= "veuillez saisir un email correct";
      } elseif ($emailBdd !== null) {
        $erreurs['email']= "cet email existe déjà";
      }

  //Verification pseudo


    if ($pseudo == ''){   
        $erreurs['pseudo']= "le pseudo est obligatoire";
    } elseif (strlen($pseudo) < 3) {
        $erreurs['pseudo']= "le pseudo doit comporter au moins 3 caractères";
    } elseif ($pseudoBdd !== null) {
        $erreurs['pseudo']= "ce pseudo existe déjà";
    }

  //Verification mdp

      if ($motDePasse == ''){
        
        $erreurs['mot_de_passe']= "le mot de passe est obligatoire";

    } elseif (strlen($motDePasse) < 8) {
        $erreurs['mot_de_passe']= "le mot de passe doit comporter au moins 8 caractères";

    } 

    //Verification confirmation

    if ($confirmation == '') {
      $erreurs['confirmation'] = "ce champ est obligatoire";
    }elseif ($confirmation !== $motDePasse) {
      $erreurs['confirmation'] = "les mots de passe ne correspondent pas";
    } 

//valide

    if (empty($erreurs)) {
            $userData = [
        "email" => $email,
        "pseudo" => $pseudo,
        "mot_de_passe" => password_hash($motDePasse, PASSWORD_DEFAULT),
        
    ];
  $succes = createUtilisateur($userData);
    
   
    if ($succes){
$email = '';
$pseudo = '';
$motDePasse = '';
$confirmation = '';
}
     }     

}

?>

<div class="page-inscription">
<h2>Créer un compte</h2>
<h3>Rejoignez la communauté CineSIO pour accéder à toutes les fonctionnalités</h3>
<?php if ($succes) : ?>
            <div class="succes-message"> Le compte a été créer avec succès !</div>
        <?php endif ; ?>

    <div class="inscription">

    <form action="" method="POST" novalidate>

    <div class="AP">
      <label for="email">Adresse Email <span class="required">*</span></label>
      <input type="text" id="email" name="email" placeholder="Ex: jean.dupont@gmail.com" />

       <?php if (isset($erreurs['email'])) : ?>
                        <div class="erreur-message"> <?=  $erreurs["email"] ?></div>
                    <?php endif; ?>
    </div>

    <div class="AP">
      <label for="pseudo">Pseudonyme <span class="required">*</span></label>
      <input type="text" id="pseudo" name="pseudo" placeholder="Ex: jeanD88" />        
      <p>3 caractères minimum.</p>
      <?php if (isset($erreurs['pseudo'])) : ?>
                        <div class="erreur-message"> <?=  $erreurs["pseudo"] ?></div>
      <?php endif; ?>
    </div>


    <div class="mdp">
        <div>
        <label for="mot_de_passe">Mot de passe <span class="required">*</span></label>
        <input type="password" id="mot_de_passe" name="mot_de_passe" />
        <p>8 caractères minimum.</p>
        <?php if (isset($erreurs['mot_de_passe'])) : ?>
                        <div class="erreur-message"> <?=  $erreurs["mot_de_passe"] ?></div>
        <?php endif; ?>
        </div>

        <div>
         <label for="confirmation">Confirmation <span class="required">*</span></label>
         <input type="password" id="confirmation" name="confirmation" />
         <?php if (isset($erreurs['confirmation'])) : ?>
                        <div class="erreur-message"> <?=  $erreurs["confirmation"] ?></div>
        <?php endif; ?>
         
        </div>
    </div>

    <div  class="AP">
            <button type="submit" class="btn-submit">
                <i class="bi bi-person-add"> </i> M'inscrire maintenant
            </button>
    </div>

    <a href="connexion.php" class="connexion-btn"> Déjà un compte ? Connectez-vous</a>

    </form>

    </div>


</div>

<?php include __DIR__.'/../src/includes/footer.php' ?>