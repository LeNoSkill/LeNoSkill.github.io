<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smarteats";

// Création de l'objet PDO et connexion à la base de données
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Configure PDO pour générer des exceptions en cas d'erreur
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}


if(isset($_GET['id'], $_SESSION['user_id']) && !empty($_GET['id'])){
    $getid=(int)$_GET['id'];
    $sessionid = $_SESSION['user_id'];

    $check_fav = $pdo->prepare('SELECT id FROM favoris WHERE ID_recette = ? AND ID_utilisateur = ?');
    $check_fav->execute(array($getid, $sessionid));

    if($check_fav->rowCount() == 1){
        $is_favorited = true; // L'élément est dans la liste de favoris
    }
    else{
        $is_favorited = false; // L'élément n'est pas dans la liste de favoris
    }

    // Si l'élément est dans la liste de favoris, ajouter la classe "fav-rouge" pour changer la couleur
    $fav_class = $is_favorited ? 'fav-rouge' : '';

    echo '<span class="fav ' . $fav_class . '" data-id="' . $getid . '">Favoris</span>';
}
else{
    echo('erreur');
}
?>
