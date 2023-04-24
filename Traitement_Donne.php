<?php
session_start();
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

        if (strlen($newpassword) < 8) {

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

        } else {

            $today = new DateTime();

            $birthdateObj = new DateTime($birthdate);

            $age = $birthdateObj->diff($today)->y;

    

            if ($age < 12) {

                $birthdateErr = "Vous devez avoir au moins 12 ans.";

            }

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

    }

    if ($nameErr == "" && $firstnameErr == "" && $emailErr == "" && $newpasswordErr == "" && $birthdateErr == "" && $weightErr == "" && $heightErr == "" && $genderErr == "") {

        include('php/EntreeDonneBDD.php');

        //$_SESSION['user_id'] = $user['ID']; mit de base dans la bddd
        $_SESSION['user_name'] = $name;
        //$_SESSION['user_type'] = $user['TYPE']; 0 de base donc ne change rien car de base est jsute client pas admin
        $_SESSION['user_prenom'] = $firstname;

        header("Location: php/test.php");

        exit;

    }



}



?>