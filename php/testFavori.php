<?php
// Connexion à la base de données
$pdo = new PDO("mysql:host=localhost;dbname=smarteats", "root", "");

// Récupération de l'identifiant de la recette
$recette_id = $_POST["recette_id"];

// Insertion de la recette dans la base de données
$statement = $pdo->prepare("INSERT INTO recettes (id) VALUES (:id)");
$statement->bindParam(":id", $recette_id, PDO::PARAM_INT);
$statement->execute();

// Réponse de la requête AJAX
echo "La recette a été aux favoirs.";
?>