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

// Vérification de l'existence de l'ID de l'utilisateur
$input = json_decode(file_get_contents("php://input"), true);
if (isset($input['ID'])) {
    // Récupérer les données
    $userId = $input['ID'];

  // Préparation de la requête pour supprimer l'utilisateur
  $query = "DELETE FROM utilisateurs WHERE ID = :id";

  try {
    // Préparation de la requête
    $stmt = $pdo->prepare($query);

    // Liaison de l'ID de l'utilisateur à la requête
    $stmt->bindParam(':id', $userId, PDO::PARAM_INT);

    // Exécution de la requête
    $stmt->execute();

    // Vérification de la suppression de l'utilisateur
    if ($stmt->rowCount() > 0) {
      echo "Utilisateur supprimé avec succès.";
    } else {
      echo "L'utilisateur n'a pas été trouvé ou n'a pas pu être supprimé.";
    }
  } catch (PDOException $e) {
    echo " " . $e->getMessage();
  }
} else {
  echo "ID d'utilisateur non fourni.";
}
?>
