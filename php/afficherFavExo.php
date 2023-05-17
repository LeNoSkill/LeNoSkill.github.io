<?php


session_start();
header('Content-Type: text/html; charset=utf-8');

include 'bdd.php'; // contient le code de la fonction connectDB qui est appelée ci-dessous, on l'a déjà utilisée précédemment

$conn = connectDB("localhost", "smarteats", "root", ""); //vérifier le port de MySQL, si <>80, alors indiquer "localhost:[port]" exemple "localhost:3306"

try {


    // sql 
    $sessionid = $_SESSION['user_id'] ;
    $sql = "Select * from exercice right join favorisexo on exercice.ID = favorisexo.id_exo where favorisexo.id_utilisateur = ?";



    // Prepare statement

    $stmt = $conn->prepare($sql);



    $stmt->execute(array($sessionid));

    $rs = $stmt->fetchAll(PDO::FETCH_ASSOC); //L'opérateur de résolution de portée "double deux-points" (:sourire, fournit un moyen d'accéder aux membres static ou constant, ainsi qu'aux propriétés ou méthodes surchargées d'une classe.

    echo utf8_encode(json_encode($rs));

    // echo ($stmt->rowCount() . " record correspond");

} catch (PDOException $e) {

    echo $sql . "<br>" . $e->getMessage();

}

$conn = null; //fermer la connexion pour libérer les ressources du serveur;

//header ("Location: $_SERVER[HTTP_REFERER]" );

?>