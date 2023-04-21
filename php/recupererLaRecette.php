<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smarteats";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Erreur de connexion : " . $conn->connect_error);
}

// Récupérer l'ID de la recette
$recipe_id = $_POST['id'];

// Préparer la requête pour récupérer la recette par ID
$query = "SELECT * FROM recettes WHERE ID = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $recipe_id);
$stmt->execute();

$result = $stmt->get_result();
$recipe = $result->fetch_assoc();

if ($recipe) {
  // Retourner la recette en format JSON
  header('Content-Type: application/json');
  echo json_encode($recipe);
} else {
  http_response_code(404);
  echo "Aucune recette trouvée avec cet ID";
}

$stmt->close();
$conn->close();
?>
