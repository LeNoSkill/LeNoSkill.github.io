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

$fav_color = '';
if(isset($_GET['id'],$_SESSION['user_id']) AND !empty($_GET['id'])){
    //echo('ok');
    $getid=(int)$_GET['id'];
    $sessionid = $_SESSION['user_id'] ;

    $check_fav= $pdo->prepare('SELECT id FROM favorisexo WHERE id_exo = ? AND id_utilisateur = ?');
    $check_fav->execute(array($getid,$sessionid));

    if($check_fav->rowCount()==1){
        
        $ins = $pdo->prepare('DELETE FROM favorisexo WHERE id_exo = ? AND id_utilisateur = ?');
        $ins->execute(array($getid, $sessionid));
        //echo((int)$_GET['id']." reussite");
        
    }
    else{
        $ins = $pdo->prepare('INSERT into favorisexo (id_utilisateur, id_exo) VALUES (?,?)');
        $ins->execute(array($sessionid, $getid));
        $fav_color = 'style="color: red;"'; // si l'élément est présent, ajouter un style avec la couleur rouge
    }

/*    
    $check = $pdo->prepare('SELECT id from recettes WHERE ID = ? ');
    $check->execute(array($getid));


    if($check->rowCount()==1){
        
        $ins = $pdo->prepare('INSERT into favoris (ID_utilisateur, ID_recette) VALUES (?,?)');
        $ins->execute(array($sessionid, $getid));
        //echo((int)$_GET['id']." reussite");
        
    }
    else{
        echo('erreur');
        echo((int)$_GET['id']);
    }*/
}
else{
    echo('erreur');
}


?>