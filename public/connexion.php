<?php
include __DIR__.'/../src/includes/header.php';
require_once __DIR__ .'/../src/repositories/utilisateurRepository.php';

// validation 
$email = '';
$motDePasse = '';
$erreurs=[];

if ($_SERVER["REQUEST_METHOD"]==="POST") {
   
    $email= trim($_POST['email']  ?? '');
    $motDePasse= ($_POST['mot_de_passe']  ?? '');

$utilisateurs = findUtilisateurByEmail($email);

if ($utilisateurs == null) {
    $erreurs['email']= "cet utilisateur n'existe pas";
} elseif (!password_verify($motDePasse, $utilisateurs['mot_de_passe'] )) {
    $erreurs['mot_de_passe']= "email ou mot de passe incorrect";
} else {
$_SESSION['utilisateur'] = [
    'id' => $utilisateurs['id'],
    'pseudo' => $utilisateurs['pseudo']
];


header('location: index.php');
exit; 

}
}
?>

<div class="page-connexion">
<h2>Connexion</h2>
<h3>Accédez à votre espace membre CinéSIO</h3>


    <div class="connexion">

        <form action="" method="POST" novalidate>

    <div class="EM">
      <label for="email">Adresse Email </span></label>
      <input type="text" id="email" name="email" placeholder="Ex: votre@gmail.com" value="<?= htmlspecialchars($email) ?>"/>

       <?php if (isset($erreurs['email'])) : ?>
                        <div class="erreur-message"> <?=  $erreurs["email"] ?></div>
         <?php endif; ?>

    </div>

    <div class="EM">
        <label for="mot_de_passe">Mot de passe </span></label>
        <input type="password" id="mot_de_passe" name="mot_de_passe" />
        <?php if (isset($erreurs['mot_de_passe'])) : ?>
                        <div class="erreur-message"> <?=  $erreurs["mot_de_passe"] ?></div>
        <?php endif; ?>
    </div>

        <div  class="AP">
            <button type="submit" class="btn-submit">
                <i class="bi bi-box-arrow-in-right"> </i> Se connecter
            </button>
    </div>

    <a href="inscription.php" class="inscription-btn"> Pas encore de compte ? Créer un compte</a>

        </form>

    </div>


</div>

<?php include __DIR__.'/../src/includes/footer.php' ?>