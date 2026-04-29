<?php
 session_start()

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../public/assets/css/style.css">

</head>
<body>
<header>
    <nav class="navbar">

        <!-- logo-->

        <p class="logo "><i class="bi bi-film"></i> Ciné<span>SIO</span></p>

        <?php $page = basename($_SERVER['PHP_SELF']); ?>
        
        <!-- menu-->

<?php if (isset($_SESSION['utilisateur'])) :?>
        <ul class="nav-links">
            <li><a href="index.php" class="link <?= ($page == 'index.php') ? 'active' : '' ?>">Accueil</a></li>
            <li><a href="ajouter-film.php"class="link <?= ($page == 'ajouter-film.php') ? 'active' : '' ?>">Ajouter un film</a></li>     
            <li class="pseudo"><i class="bi bi-person"></i><?= $_SESSION['utilisateur']['pseudo'] ?> </li>
            <li class="logout"><a href="deconnexion.php"class="link"><i class="bi bi-box-arrow-right"></i></a></li>
            <li><a href="#"class="link">Contact</a></li>
        </ul>
        
<?php else : ?>

            <ul class="nav-links">
            <li><a href="index.php" class="link <?= ($page == 'index.php') ? 'active' : '' ?>">Accueil</a></li>
            <li><a href="inscription.php" class="link <?= ($page == 'inscription.php') ? 'active' : '' ?>">Inscription</a></li>
            <li><a href="connexion.php" class="link <?= ($page == 'connexion.php') ? 'active' : '' ?>">Connexion</a></li>   
            <li><a href="#"class="link">Contact</a></li>
        </ul>
    
<?php endif; ?>



    </nav>
</header>
<main>