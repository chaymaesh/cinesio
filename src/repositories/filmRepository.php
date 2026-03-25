 <?php
 
 require_once __DIR__ ."/../database/connection.php";

 function findAllFilms(): array {
   
//Connection à la bdd
    $connexion = getConnexion();

//execution de la requete
    $requeteSQL = "SELECT film.id, film.titre, film.date_sortie, film.duree, 
    film.synopsis, film.image, film.id_genre, film.id_pays, genre.nom as nom_genre, pays.nom as nom_pays, pays.initiale  
    FROM film, pays, genre 
    WHERE film.id_genre=genre.id AND film.id_pays=pays.id";
    $requete = $connexion ->prepare($requeteSQL);
    $requete ->execute();

//récuperation des enrgistrements
    $requete -> setFetchMode(PDO::FETCH_ASSOC);
    $films = $requete->fetchAll();
    return $films;

}


function findFilmById(int $id): ?array {
   
//Connection à la bdd
    $connexion = getConnexion();

//Preparation de la requête
$requeteSQL = "SELECT film.id, film.titre, film.date_sortie, film.duree, 
    film.synopsis, film.image, film.id_genre, film.id_pays, genre.nom as nom_genre, pays.nom as nom_pays, pays.initiale  
    FROM film, pays, genre
    WHERE film.id_genre=genre.id AND film.id_pays=pays.id AND id = :id";
$requete = $connexion->prepare($requeteSQL);

//Execution de la requête 
// 1. Donner une valeur au paramètre : id
$requete->bindValue("id", $id);
//2. executer la requete 
$requete->execute();

//recuperer les résultats $
$films = $requete->fetch(PDO::FETCH_ASSOC);


if ($films=== false){
  return null;
} 

return $films;
}
