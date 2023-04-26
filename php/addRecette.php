<?php
// Connexion à la base de données
// Connexion à la base de données
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

// Vérifier si toutes les données requises sont présentes dans $_POST
if (isset($_POST['name']) && isset($_POST['temps_preparation']) && isset($_POST['temps_cuisson']) && isset($_POST['instructions_preparation']) && isset($_POST['liste_ingredients']) && isset($_POST['calories_par_portion']) && isset($_POST['proteines_par_portion']) && isset($_POST['glucides_par_portion']) && isset($_POST['graisses_par_portion']) && isset($_POST['fibres_par_portion'])) {
    // Récupérer les données du formulaire
 
    $name = $_POST['name'];
    $temps_preparation = $_POST['temps_preparation'];
    $temps_cuisson = $_POST['temps_cuisson'];
    $instructions_preparation = $_POST['instructions_preparation'];
    $liste_ingredients = $_POST['liste_ingredients'];
    $calories_par_portion = $_POST['calories_par_portion'];
    $proteines_par_portion = $_POST['proteines_par_portion'];
    $glucides_par_portion = $_POST['glucides_par_portion'];
    $graisses_par_portion = $_POST['graisses_par_portion'];
    $fibres_par_portion = $_POST['fibres_par_portion'];
    $image_url = $_POST['image_url'] ?? '';

    // Préparer la requête pour mettre à jour la recette
    $stmt = $pdo->prepare("INSERT INTO `recettes` (`nom_recette`, `temps_preparation`, `temps_cuisson`, `instructions_preparation`, `liste_ingredients`, `calories_par_portion`, `proteines_par_portion`, `glucides_par_portion`, `graisses_par_portion`, `fibres_par_portion`, `image_url`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");


    // Exécuter la requête avec les données du formulaire
    if ($stmt->execute([$name, $temps_preparation, $temps_cuisson, $instructions_preparation, $liste_ingredients, $calories_par_portion, $proteines_par_portion, $glucides_par_portion, $graisses_par_portion, $fibres_par_portion, $image_url])) {
        // Si la requête s'exécute avec succès, renvoyer un statut JSON "success"
        echo json_encode(["status" => "success"]);
    } else {
        // Sinon, renvoyer un statut JSON "error"
        echo json_encode(["status" => "error"]);
    }
} else {
    // Si les données requises ne sont pas présentes, renvoyer un statut JSON "error"
    echo json_encode(["status" => "error"]);
}
?>
