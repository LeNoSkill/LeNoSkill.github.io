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
if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['duree']) && isset($_POST['description']) && isset($_POST['objectif']) ) {
    // Récupérer les données du formulaire
    $id = $_POST['id'];
    $name = $_POST['name'];
    $duree = $_POST['duree'];
    $description = $_POST['description'];
    $objectif = $_POST['objectif'];
    $image_url = $_POST['image_url4'] ?? '';

    // Préparer la requête pour mettre à jour la recette
    $stmt = $pdo->prepare("UPDATE exercice SET nom = ?, duree = ?, descript = ?, objectif = ?,image_url = ? WHERE ID = ?");

    // Exécuter la requête avec les données du formulaire
    if ($stmt->execute([$name, $duree, $description, $objectif,$image_url, $id])) {
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
