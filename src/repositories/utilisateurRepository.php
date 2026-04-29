 <?php
 
 require_once __DIR__ ."/../database/connection.php";

 function findUtilisateurByEmail(string $email) : ?array {
    //Connection à la bdd
    $connexion = getConnexion();

//execution de la requete
    $requeteSQL = "SELECT *
FROM utilisateur
WHERE email = :email";
    $requete = $connexion ->prepare($requeteSQL);

    $requete->bindValue("email", $email);
    $requete ->execute();

//récuperation des enrgistrements
    $requete -> setFetchMode(PDO::FETCH_ASSOC);
    $email = $requete->fetch();

    return $email ?: null;
 }

 function findUtilisateurByPseudo(string $pseudo) : ?string {
    //Connection à la bdd
    $connexion = getConnexion();

//execution de la requete
    $requeteSQL = "SELECT pseudo
FROM utilisateur
WHERE pseudo = :pseudo";
    $requete = $connexion ->prepare($requeteSQL);

    $requete->bindValue("pseudo", $pseudo);
    $requete ->execute();

//récuperation des enrgistrements
    $requete -> setFetchMode(PDO::FETCH_ASSOC);
    $pseudo = $requete->fetchColumn();

    return $pseudo ?: null;
 }

 
function createUtilisateur(array $data) : bool {
        $connexion = getConnexion();

    $requeteSQL = "INSERT INTO utilisateur (email, pseudo, mot_de_passe)
VALUES (:email, :pseudo, :mot_de_passe)";
    $requete = $connexion ->prepare($requeteSQL);
    $requete->bindValue("email", $data["email"]);
    $requete->bindValue("pseudo", $data["pseudo"]);
    $requete->bindValue("mot_de_passe", $data["mot_de_passe"]);


    return $requete ->execute();
    
}