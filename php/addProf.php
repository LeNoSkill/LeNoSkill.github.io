<?php
// Connexion à la base de données
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "examen";

// Création de l'objet PDO et connexion à la base de données
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Configure PDO pour générer des exceptions en cas d'erreur
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Vérifier si toutes les données requises sont présentes dans $_POST
if (isset($_POST['name']) && isset($_POST['prename']) && isset($_POST['gestion']) && isset($_POST['password'])) {
    // Récupérer les données du formulaire
 
    $name = $_POST['name'];
    $prename = $_POST['prename'];
    $gestion = $_POST['gestion'];
    $password = $_POST['password'];

    // Préparer la requête pour mettre à jour la recette
    $stmt = $pdo->prepare("INSERT INTO `prof` (`NOM`, `PRENOM`, `GESTION`, `PASSWORD`) VALUES (?, ?, ?, ?)");


    // Exécuter la requête avec les données du formulaire
    if ($stmt->execute([$name, $prename, $gestion, $password])) {
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