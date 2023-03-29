<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartEats</title>
    <link rel="stylesheet" href="../css/Acceuil.css">
    <script src="../js/finisher-header.es5.min.js" type="text/javascript"></script>
    <script src="../js/backgroundanimation.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    .error {color: #ff0000; }
    </style>
</head>

<body>
    <div class="header finisher-header"></div>
    <div class="container">
        <?php include('Traitement_Donne.php'); ?>   
        <form id="connexion-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="theme" class="theme">
                <span class="theme__toggle-wrap">
                    <input id="theme" class="theme__toggle" type="checkbox" role="switch" name="theme" value="dark">
                    <span class="theme__fill"></span>
                    <span class="theme__icon">
                        <span class="theme__icon-part"></span>
                        <span class="theme__icon-part"></span>
                        <span class="theme__icon-part"></span>
                        <span class="theme__icon-part"></span>
                        <span class="theme__icon-part"></span>
                        <span class="theme__icon-part"></span>
                        <span class="theme__icon-part"></span>
                        <span class="theme__icon-part"></span>
                        <span class="theme__icon-part"></span>
                    </span>
                </span>
            </label>
            <img src="../img/logo.png" alt="Logo SmartEats" class="logo">
            <h1 id="connexion-title">Connexion</h1>
            <p><span class="error">* champ obligatoire</span></p><br><br>

            <label for="email">Adresse email :</label>
            <span class="error">* <?php echo $emailErr; ?></span><br>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Mot de passe :</label>
            <span class="error">* <?php echo $passwordErr; ?></span><br>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Se connecter</button>
            <p id="inscription-link">Vous n'avez pas de compte ? <a onclick="openInscriptionForm()"><u>S'inscrire</u></a></p>
        </form>
        <div class="inscription-form" id="inscription-form" style="display:none;">
            <h1>Inscription</h1>
            <p><span class="error">* champ obligatoire</span></p><br><br>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                <label for="name">Nom :</label>
                <span class="error">* <?php echo $nameErr; ?></span><br>
                <input type="text" id="name" name="name" required>
                
                <label for="firstname">Prénom :</label>
                <span class="error">* <?php echo $firstnameErr; ?></span><br>
                <input type="text" id="firstname" name="firstname" required>
                
                <label for="email">Adresse email :</label>
                <span class="error">* <?php echo $emailErr; ?></span><br>
                <input type="email" id="email" name="email" required>
                
                <label for="newpassword">Mot de passe :</label>
                <span class="error">* <?php echo $newpasswordErr; ?></span><br>
                <input type="password" id="newpassword" name="newpassword" required>
                
                <label for="birthdate">Date de naissance :</label>
                <span class="error">* <?php echo $birthdateErr; ?></span><br>
                <input type="date" id="birthdate" name="birthdate">
                
                <label for="weight">Poids (kg) :</label>
                <span class="error">* <?php echo $weightErr; ?></span><br>
                <input type="number" id="weight" name="weight" step="0.1" required>
                
                <label for="height">Taille (cm) :</label>
                <span class="error">* <?php echo $heightErr; ?></span><br>
                <input type="number" id="height" name="height" step="0.1" required>
                
                <span class="error">* <?php echo $genderErr; ?></span><br>
                <input type="radio" name="gender" value="homme" required>Homme
                <input type="radio" name="gender" value="femme" required>Femme
                
                <button type="submit">S'inscrire</button>
            </form>
        </div>
    </div>

    <script>
        /*APPARITION ET D4ISPARITION FORMULAIRE DE CONNEXION*/
        function openInscriptionForm() {
            document.getElementById("connexion-title").style.display = "none";
            document.getElementById("connexion-form").style.display = "none";
            document.getElementById("inscription-form").style.display = "block";
            document.getElementById("inscription-link").style.display = "none";
        }
    </script>
</body>

</html>
