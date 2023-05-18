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
    //echo($getid);
    $check_fav = $pdo->prepare('SELECT id FROM favorisexo WHERE id_exo = ? AND id_utilisateur = ?');
    $check_fav->execute(array($getid, $sessionid));

    if($check_fav->rowCount() == 1){
        $is_favorited=true; // L'élément est dans la liste de favoris
    }
    else{
        $is_favorited=false; // L'élément n'est pas dans la liste de favoris
    }

   /* // Si l'élément est dans la liste de favoris, ajouter la classe "fav-rouge" pour changer la couleur
    $fav_class = $is_favorited ? 'fav-rouge' : '';

    echo '<span class="fav ' . $fav_class . '" data-id="' . $getid . '">Favoris</span>';*/
   // echo($is_favorited);
   $response = array("is_favorited" => $is_favorited); // Créer un tableau associatif avec la propriété "is_favorited"
    echo json_encode($response); // Convertir le tableau en JSON et le renvoyer en tant que réponse
}
else{
    echo('erreur');
}
?>
