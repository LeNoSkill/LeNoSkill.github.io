<?php
include 'bdd.php';  // fichier avec le code de la fonction connectDB
$conn=connectDB("localhost","SmartEats", "root", ""); //adresse du serveur BD , nom de la bd, nom utilisateur, mot de passe

$email = $_POST['email'];
$password = $_POST['password'];

echo "Email: " . $email . "<br>";
echo "Password: " . $password . "<br>";

try {
  $query = "SELECT * FROM utilisateurs WHERE MAIL = ?";
  $statement = $conn->prepare($query);
  $statement->execute([$email]);

  $user = $statement->fetch(PDO::FETCH_ASSOC);

  if ($user && password_verify($password, $user['PASSWORD'])) {
    /*session_start();
    $_SESSION['user_id'] = $user['ID'];
    $_SESSION['user_email'] = $user['MAIL'];
    $_SESSION['user_name'] = $user['NOM'];
    $_SESSION['user_firstname'] = $user['PRENOM'];*/
    echo "ok";
  } else {
    echo "Adresse email ou mot de passe incorrect";
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}


?>
