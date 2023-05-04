<?php
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

// Vérifier si les données requises sont présentes
$input = json_decode(file_get_contents("php://input"), true);
if (isset($input['ID']) && isset($input['TYPE'])) {
    // Récupérer les données
    $id = $input['ID'];
    $type = $input['TYPE'];

    // Préparer la requête pour mettre à jour l'utilisateur
    $stmt = $pdo->prepare("UPDATE utilisateurs SET TYPE = ? WHERE ID = ?");

    // Exécuter la requête avec les données
    if ($stmt->execute([$type, $id])) {
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
