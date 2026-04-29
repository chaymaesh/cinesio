<?php
include __DIR__.'/../src/includes/header.php';
require_once __DIR__ .'/../src/repositories/utilisateurRepository.php';


?>

<div class="page-inscription">
<h2>Créer un compte</h2>
<h3>Rejoignez la communauté CineSIO pour accéder à toutes les fonctionnalités</h3>

    <div class="inscription">

    <form action="" method="POST" novalidate>

    <div class="AP">
      <label for="email">Adresse Email <span class="required">*</span></label>
      <input type="text" id="email" name="email" placeholder="Ex: jean.dupont@gmail.com" />
    </div>

    <div class="AP">
      <label for="pseudo">Pseudonyme <span class="required">*</span></label>
      <input type="text" id="pseudo" name="pseudo" placeholder="Ex: jeanD88" />        
      <p>3 caractères minimum.</p>
    </div>


    <div class="mdp">
        <div>
        <label for="mot_de_passe">Mot de passe <span class="required">*</span></label>
        <input type="password" id="mot_de_passe" name="mot_de_passe" />
        <p>8 caractères minimum.</p>
        </div>

        <div>
         <label for="confirmation">Confirmation <span class="required">*</span></label>
         <input type="password" id="confirmation" name="confirmation" />
         
        </div>
    </div>

    <div  class="AP">
            <button type="submit" class="btn-submit">
                <i class="bi bi-person-add"> </i> M'inscrire maintenant
            </button>
    </div>

    <a href="connexion.php" class="connexion"> Déjà un compte ? Connectez-vous</a>

    </form>

    </div>


</div>

<?php include __DIR__.'/../src/includes/footer.php' ?>