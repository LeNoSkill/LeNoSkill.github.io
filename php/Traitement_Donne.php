<?php
//Inscription
$nameErr = $firstnameErr = $emailErr = $newpasswordErr = $birthdateErr = $weightErr = $heightErr = $genderErr = "";
//Connexion
$emailErr = $passwordErr = "";

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (empty($_POST["name"])) {
        $nameErr = "Nom requis";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Seules les lettres, les espaces et les tirets sont autorisés";
        }
    }

    if (empty($_POST["firstname"])) {
        $firstnameErr = "Prénom requis";
    } else {
        $firstname = test_input($_POST["firstname"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $firstname)) {
            $firstnameErr = "Seules les lettres, les espaces et les tirets sont autorisés";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Le mail est requis";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Le format d'email est invalide";
        }
    }

    if (empty($_POST["newpassword"])) {
        $newpasswordErr = "Le mot de passe est requis";
    } else {
        $newpassword = test_input($_POST["newpassword"]);
        if (strlen($password) < 8) {
            $newpasswordErr = "Le mot de passe doit avoir au moins 8 caractères";
        } else if (preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,}$/', $newpassword)) {
            $newpasswordErr = "Le mot de passe est trop faible. Veuillez choisir un mot de passe plus fort";
        }
    }

    if (empty($_POST["birthdate"])) {
        $birthdateErr = "La date de naissance est requise";
    } else {
        $birthdate = test_input($_POST["birthdate"]);
        if (strtotime($birthdate) > time()) {
            $birthdateErr = "La date de naissance ne peut pas être dans le futur";
        }
    }

    if (empty($_POST["weight"])) {
        $weightErr = "Le poids est requis";
    } else {
        $weight = test_input($_POST["weight"]);
        if (!is_numeric($weight) || $weight <= 0) {
            $weightErr = "Le poids doit être un nombre positif";
        }
    }

    if (empty($_POST["height"])) {
        $heightErr = "La taille est requise";
    } else {
        $height = test_input($_POST["height"]);
        if (!is_numeric($height) || $height <= 0) {
            $heightErr = "La taille doit être un nombre positif";
        }
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Le genre est requis";
    } else {
        $gender = test_input($_POST["gender"]);
        if ($gender !== "homme" && $gender !== "femme") {
            $genderErr = "Le genre doit être soit 'homme' soit 'femme'";
        }
    }

}

/*
echo "Nom: " . $name . "<br>";
echo "Prénom: " . $firstname . "<br>";
echo "Email: " . $email . "<br>";
echo "Mot de passe: " . $newpassword . "<br>";
echo "Date de naissance: " . $birthdate . "<br>";
echo "Poids: " . $weight . "<br>";
echo "Taille: " . $height . "<br>";
echo "Genre: " . $gender . "<br>";
*/

// pour connecté a la bdd include('EntreeDonneBDD.php'); 

?>