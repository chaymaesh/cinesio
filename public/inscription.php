<?php
include __DIR__.'/../src/includes/header.php';
require_once __DIR__ .'/../src/repositories/utilisateurRepository.php';


?>

<div class="page-inscription">
<h1>Créer un compte</h1>
<h3>Rejoignez la communauté CineSIO pour accéder à toutes les fonctionnalités</h3>

    <div class="inscription">

      <label for="email">Adresse Email <span class="required">*</span></label>
            <input type="text" id="titre" name="titre" placeholder="Ex: jean.dupont@gmail.com" 
            value="<?= $titre ?>"
                   required
                   minlength="2" />




    </div>







</div>

