<?php
include 'bdd.php';  // fichier avec le code de la fonction connectDB
$conn=connectDB("91.216.107.186","smart2093867", "smart2093867", "v1fp5eo26b"); //adresse du serveur BD , nom de la bd, nom utilisateur, mot de passe
try {

    $MAIL=$_POST["email"]; //récupérer les valeurs du formulaire, à adapter en fonction du formulaire
    
    // Verifie si l'email est déja présent dans la base de données 
    $emailCheckStmt = $conn->prepare("SELECT * FROM utilisateurs WHERE MAIL = :MAIL");
    $emailCheckStmt->bindParam(':MAIL', $MAIL);
    $emailCheckStmt->execute();

    if ($emailCheckStmt->rowCount() > 0) {
        echo "<script>alert('Votre email est déjà utiliser chez nous !'); window.history.back();</script>";
        exit;
    }

    $NOM=$_POST["name"];
    $PRENOM=$_POST["firstname"];
    $DATENAISSANCE=$_POST["birthdate"];
    $POIDS=$_POST["weight"];
    $TAILLE_CM=$_POST["height"];
    $SEXE=$_POST["gender"];

    // Hash and salt the password
    $PASSWORD = password_hash($_POST["newpassword"], PASSWORD_BCRYPT);

    // insert a row in the societe table
    $stmt = $conn->prepare("INSERT INTO utilisateurs (MAIL, PASSWORD, NOM, PRENOM, DATENAISSANCE, POIDS,TAILLE_CM ,SEXE) VALUES (:MAIL, :PASSWORD, :NOM, :PRENOM, :DATENAISSANCE, :POIDS,:TAILLE_CM ,:SEXE)");
    $stmt->bindParam(':MAIL', $MAIL);
    $stmt->bindParam(':PASSWORD', $PASSWORD, PDO::PARAM_STR);
    $stmt->bindParam(':NOM', $NOM);
    $stmt->bindParam(':PRENOM', $PRENOM);
    $stmt->bindParam(':DATENAISSANCE', $DATENAISSANCE);
    $stmt->bindParam(':POIDS', $POIDS);
    $stmt->bindParam(':TAILLE_CM', $TAILLE_CM);
    $stmt->bindParam(':SEXE', $SEXE);
    $stmt->execute();

    // echo a message to say the insert succeeded
//	if ($stmt){
//        echo $stmt->rowCount() . " records inserted successfully" ;
//    }
    
    // get the ID of the last inserted row
    $societeId = $conn->lastInsertId();
    

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

//header ("Location: $_SERVER[HTTP_REFERER]" ); // si nécessaire rediriger ver la page précédente

?>
