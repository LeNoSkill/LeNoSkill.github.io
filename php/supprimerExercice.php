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

  // Vérification de l'existence de l'ID de la exercice
  if (isset($_POST['id'])) {
    $recipeId = $_POST['id'];

    // Préparation de la requête pour supprimer la exercice
    $query = "DELETE FROM exercice WHERE ID = :id";

    try {
      // Préparation de la requête
      $stmt = $pdo->prepare($query);

      // Liaison de l'ID de la exercice à la requête
      $stmt->bindParam(':id', $recipeId, PDO::PARAM_INT);

      // Exécution de la requête
      $stmt->execute();

      // Vérification de la suppression de la exercice
      if ($stmt->rowCount() > 0) {
        echo "exercice supprimée avec succès.";
      } else {
        echo "La exercice n'a pas été trouvée ou n'a pas pu être supprimée.";
      }
    } catch (PDOException $e) {
      echo "Erreur lors de la suppression de la exercice : " . $e->getMessage();
    }
  } else {
    echo "ID de exercice non fourni.";
  }
?>