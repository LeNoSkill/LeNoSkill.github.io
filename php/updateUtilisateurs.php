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

// Vérifier si toutes les données requises sont présentes dans $_POST
if (isset($_POST['ID']) && isset($_POST['TYPE']) && isset($_POST['NOM']) && isset($_POST['PRENOM']) && isset($_POST['MAIL']) && isset($_POST['DATENAISSANCE']) && isset($_POST['POIDS']) && isset($_POST['TAILLE_CM']) && isset($_POST['SEXE'])) {
    // Récupérer les données du formulaire
    $id = $_POST['ID'];
    $type = $_POST['TYPE'];
    $nom = $_POST['NOM'];
    $prenom = $_POST['PRENOM'];
    $mail = $_POST['MAIL'];
    $datenaissance = $_POST['DATENAISSANCE'];
    $poids = $_POST['POIDS'];
    $taille_cm = $_POST['TAILLE_CM'];
    $sexe = $_POST['SEXE'];

    // Préparer la requête pour mettre à jour l'utilisateur
    $stmt = $pdo->prepare("UPDATE utilisateurs SET TYPE = ?, NOM = ?, PRENOM = ?, MAIL = ?, DATENAISSANCE = ?, POIDS = ?, TAILLE_CM = ?, SEXE = ? WHERE ID = ?");

    // Exécuter la requête avec les données du formulaire
    if ($stmt->execute([$type, $nom, $prenom, $mail, $datenaissance, $poids, $taille_cm, $sexe, $id])) {
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
