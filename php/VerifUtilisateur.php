<?php
include 'bdd.php';
$conn = connectDB("localhost", "smarteats", "root", "");

try {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Vérifie si l'e-mail existe dans la base de données
    $emailCheckStmt = $conn->prepare("SELECT * FROM utilisateurs WHERE MAIL = :MAIL");
    $emailCheckStmt->bindParam(':MAIL', $email);
    $emailCheckStmt->execute();

    if ($emailCheckStmt->rowCount() > 0) {
        // Si l'e-mail existe, récupérez le mot de passe haché
        $user = $emailCheckStmt->fetch(PDO::FETCH_ASSOC);
        $hash = $user['PASSWORD'];
        echo "Submitted password: " . $password . "<br>";
        echo "Stored hash: " . $hash . "<br>";
        // Vérifiez si le mot de passe soumis correspond au mot de passe haché enregistré
        if (password_verify($password, $hash)) {
            // Connexion réussie, démarrez une session et redirigez l'utilisateur
            session_start();
            $_SESSION['user_id'] = $user['ID'];
            $_SESSION['user_name'] = $user['NOM'];
            $_SESSION['user_type'] = $user['TYPE'];
            $_SESSION['user_prenom'] = $user['PRENOM'];
            header("Location: test.php");
        } else {
            // Mot de passe incorrect
            
            echo "<script>alert('Mot de passe incorrect.'); window.history.back();</script>";
        }
    } else {
        // L'e-mail n'existe pas
        echo "<script>alert('Adresse e-mail inconnue.'); window.history.back();</script>";
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
