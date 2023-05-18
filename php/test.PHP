<?php session_start(); ?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Smarteats</title>
  <link rel="icon" href="../img/logo.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="../css/pageprincipale.css">
  <style>
        /* Fond du tableau */
        #utilisateursTable {
      background-color: #f8f9fa;
    }
  
    /* En-tête du tableau */
    #utilisateursTable thead {
      background-color: #6c757d;
      color: white;
    }
  
    /* Lignes du tableau */
    #utilisateursTable tbody tr {
      color: #333;
    }
  
    /* Lignes du tableau au survol */
    #utilisateursTable tbody tr:hover {
      background-color: #e9ecef;
      cursor: pointer;
    }
/* Style de base */
input[type="checkbox"] {
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  width: 20px;
  height: 20px;
  border: 2px solid #ccc;
  border-radius: 3px;
  outline: none;
  cursor: pointer;
  transition: all 0.3s ease;
}

/* Style de coche */
input[type="checkbox"]:checked::before {
  content: "\2713";
  display: block;
  width: 20px;
  height: 20px;
  text-align: center;
  line-height: 20px;
  color: #fff;
  background-color: #007bff;
  border-radius: 3px;
  font-size: 18px;
}

/* Style au survol */
input[type="checkbox"]:hover {
  border-color: #007bff;
}

/* Style au focus */
input[type="checkbox"]:focus {
  box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.25);
}
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <img src="../img/logo.png" alt="Logo" style="height: 150px;">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fas fa-home"></i> Accueil</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-utensils"></i> Recettes
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#" id="afficherrecette">Afficher</a></li>
                <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1): ?>
                 <li><a class="dropdown-item" href="#" id="ajouter">Ajouter</a></li>
                  <li><a class="dropdown-item" href="#" id="modif">Modifier/Supprimer</a></li>
                <?php endif; ?>
               </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-running"></i> Exercices physiques
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#" id="afficherexercice">Afficher</a></li>
                <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1): ?>
                  <li><a class="dropdown-item" href="#" id="ajouterExercice">Ajouter</a></li>
                  <li><a class="dropdown-item" href="#" id="modifierExercice">Modifier/Supprimer</a></li>
                <?php endif; ?>
              </ul>
            </li>
            <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1): ?>
            <li class="nav-item">
              <a class="nav-link" href="#" id="afficherutilisateurs"><i class="fas fa-users"></i> Gestion des utilisateurs</a>
            </li>
            <?php endif; ?>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fas fa-barcode"></i> Scanner</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-heart"></i> Favoris</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#" id="afficherFavorisRec">Recettes</a></li>
                  <li><a class="dropdown-item" href="#" id="afficherFavorisExe">Exercices</a></li>
                </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#apropos"><i class="fas fa-info-circle"></i> À propos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#footer"><i class="fas fa-envelope"></i> Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" onclick="logout()"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>




<div id="main-content">
  <section class="jumbotron">
    <div class="container">
      <h1>Smarteats</h1>
      <p>Des plats délicieux et sains chez vous!</p>
    </div>
  </section>

  <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../img/R.jpg" class="d-block w-100" alt="Slide 1">
      </div>
      <div class="carousel-item">
        <img src="../img/R.jpg" class="d-block w-100" alt="Slide 2">
      </div>
      <div class="carousel-item">
        <img src="../img/R.jpg" class="d-block w-100" alt="Slide 3">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Précédent</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Suivant</span>
    </button>
  </div>

  <div class="container">
    <!-- Ajoutez ici le contenu de votre site internet -->
      <p>Bienvenue sur SmartEats <?php
    if (isset($_SESSION['user_prenom'])) {
        echo  " ".$_SESSION['user_prenom']." ";
    }
    ?>, votre source quotidienne de recettes équilibrées et saines !</p>

      <p>Notre objectif est de vous aider à maintenir un mode de vie sain en vous proposant chaque jour de nouvelles recettes délicieuses et faciles à préparer. Nous savons que manger sainement peut parfois sembler difficile, c'est pourquoi nous avons créé SmartEats pour vous simplifier la vie.</p>

      <p>Nos recettes sont sélectionnées avec soin par notre équipe de nutritionnistes et de chefs expérimentés pour garantir que chaque plat soit équilibré, savoureux et nourrissant. Nous avons des options pour tous les goûts et tous les régimes alimentaires, que vous soyez végétarien, végétalien, sans gluten ou simplement à la recherche d'options plus saines pour vos repas.</p>

      <p>Nous sommes fiers de vous offrir une variété de recettes, allant des petits déjeuners sains et énergisants aux dîners satisfaisants et copieux. Vous trouverez également des recettes pour les collations, les smoothies, les desserts et bien plus encore.</p>

      <p>Abonnez-vous à notre newsletter pour recevoir nos recettes quotidiennes directement dans votre boîte de réception. Vous pouvez également nous suivre sur les réseaux sociaux pour des conseils de nutrition, des astuces culinaires et des idées de repas rapides et sains.</p>

      <p>Rejoignez notre communauté de mangeurs sains et découvrez à quel point il peut être facile de se nourrir sainement avec SmartEats.

<section id="apropos">
  <br/><h2 class="text-center"><u>À propos des créateurs</u></h2><br/>
  <div class="row">
    <div class="col-md-4 person">
      <img src="../img/Louis.jpg" alt="Créateur 1">
      <h3>Criquillion Louis</h3>
      <p>
       Etudiant de la HELHa
      </p>
    </div>
    <div class="col-md-4 person">
      <img src="../img/francesco.jpg" alt="Créateur 2">
      <h3>Francesco Battista</h3>
      <p>
        Etudiant à la HELHA, agé de 21 ans.</br>Amateur en développement web qui ne cesse de progresser et qui plus est,</br> est le plus beau de ce groupe.
      </p>
    </div>
    <div class="col-md-4 person">
      <img src="../img/Mateo.jpg" alt="Créateur 3">
      <h3>Matéo Fontaine</h3>
      <p>
       Etudiant de la HELHa
      </p>
    </div>
  </div>
</section>
</div>
</div>

<div class="container" id="idformajt">
<h3>Ajouter la recette </h3>
<form id="addform" action="addRecette.php" method="post">
  <input type="hidden" name="id"  />
  <div class="form-group">
    <label for="name">Nom de la recette :</label>
    <input type="text" class="form-control" name="name"  required />
  </div>
  <div class="form-group">
    <label for="temps_preparation">Temps de préparation (en minutes) :</label>
    <input type="number" class="form-control" name="temps_preparation"  required />
  </div>
  <div class="form-group">
    <label for="temps_cuisson">Temps de cuisson (en minutes) :</label>
    <input type="number" class="form-control" name="temps_cuisson"  required />
  </div>
  <div class="form-group">
    <label for="instructions_preparation">Instructions de préparation :</label>
    <textarea class="form-control" name="instructions_preparation" rows="5" required></textarea>
  </div>
  <div class="form-group">
    <label for="liste_ingredients">Liste des ingrédients :</label>
    <textarea class="form-control" name="liste_ingredients" rows="5" required></textarea>
  </div>
  <div class="form-group">
    <label for="calories_par_portion">Calories par portion :</label>
    <input type="number" class="form-control" name="calories_par_portion" required />
  </div>
  <div class="form-group">
    <label for="proteines_par_portion">Protéines par portion (en grammes) :</label>
    <input type="number" class="form-control" name="proteines_par_portion" required />
  </div>
  <div class="form-group">
    <label for="glucides_par_portion">Glucides par portion (en grammes) :</label>
    <input type="number" class="form-control" name="glucides_par_portion" required />
  </div>
  <div class="form-group">
    <label for="graisses_par_portion">Graisses par portion (en grammes) :</label>
    <input type="number" class="form-control" name="graisses_par_portion" required />
  </div>
  <div class="form-group">
    <label for="fibres_par_portion">Fibres par portion (en grammes) :</label>
    <input type="number" class="form-control" name="fibres_par_portion" required />
  </div>
  <label for="image_file">Fichier de l'image :</label>
  <input type="file" class="form-control" name="image_file" id="image_file" onchange="updateImageURL();" />
  <input type="hidden" name="image_url" id="image_url" />
  <button type="submit" class="btn btn-success" id="addBtn">ajouter la recette</button>
  </div>
</form>
</div>

<style>
  .fav {
  cursor: pointer;
  color: grey;
  transition: transform 0.2s ease-in-out;
}
.fav:hover {
  transform: scale(1.2);
  color: red;
}
.fav:rouge {
  color: red;
}
.favExo {
  cursor: pointer;
  color: grey;
  transition: transform 0.2s ease-in-out;
}
.favExo:hover {
  transform: scale(1.2);
  color: red;
}

</style>

<div class="container" id="idAjtExo">
<h3>Ajouter l'exercice </h3>
<form id="addform2" action="addExercice.php" method="post">
  <input type="hidden" name="id"  />
  <div class="form-group">
    <label for="name">Nom de l'exercice :</label>
    <input type="text" class="form-control" name="name"  required />
  </div>
  <div class="form-group">
    <label for="duree_exo">Durée de l'exercice (en minutes) :</label>
    <input type="number" class="form-control" name="duree_exo"  required />
  </div>
  <div class="form-group">
    <label for="description_exo">Description de l'exercice :</label>
    <textarea class="form-control" name="description_exo" rows="5" required></textarea>
  </div>
  <div class="form-group">
    <label for="objectif_exo">Objectif de l'exercice :</label>
    <textarea class="form-control" name="objectif_exo" rows="5" required></textarea>
  </div>
  <label for="image_file">Fichier de l'image :</label>
  <input type="file" class="form-control" name="image_file3" id="image_file3" onchange="updateImageURL3();" />
  <input type="hidden" name="image_url3" id="image_url3" />
  <button type="submit" class="btn btn-success" id="addBtn">ajouter l'exercice</button>
  </div>
</form>
</div>












<?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1): ?>
                 
  <div class="container" id="recherche">
    <div class="row">
      <div class="col-md-8">
        <!--<input type="text" id="searchRecipe" class="form-control" placeholder="Recherchez une recette par nom">-->
        <select id="recipeSelect" class="form-control">
          <!-- Les options seront générées dynamiquement ici -->
        </select>
      </div>
      <div class="col-md-4">
        <button id="searchBtn" class="btn btn-primary">Chercher</button>
      </div>
    </div>
    <div id="editFormContainer" style="display:none;">
      <!-- Le formulaire de modification sera généré ici -->
    </div>
  </div>
<?php endif; ?>


<?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1): ?>
                 
                 <div class="container" id="recherche2">
                   <div class="row">
                     <div class="col-md-8">
                       <!--<input type="text" id="searchRecipe" class="form-control" placeholder="Recherchez une recette par nom">-->
                       <select id="exerciceSelect" class="form-control">
                         <!-- Les options seront générées dynamiquement ici -->
                       </select>
                     </div>
                     <div class="col-md-4">
                       <button id="searchBtn2" class="btn btn-primary">Chercher</button>
                     </div>
                   </div>
                   <div id="editFormContainer2" style="display:none;">
                     <!-- Le formulaire de modification sera généré ici -->
                   </div>
                 </div>
               <?php endif; ?>



  </div>
  <div id="recetteCards" class="row row-cols-1 row-cols-md-4 g-4">
  </div>

  <div id="recetteCardsFav" class="row row-cols-1 row-cols-md-4 g-4">
  </div>

  <div id="exoCardsFav" class="row row-cols-1 row-cols-md-4 g-4">
    hello
  </div>

  <div id="exerciceCards" class="row row-cols-1 row-cols-md-4 g-4">
  </div>

  <div class="table-responsive" id="utilisateursTable" style="display:none">
  <table class="table table-hover">
    <thead class="thead-dark"><br>
      <tr>
        <th>ID</th>
        <th>Type</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Date de naissance</th>
        <th>Poids</th>
        <th>Taille</th>
        <th>Sexe</th>
        <th>Admin/Supprimer</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</div>

  <footer style="background-color: #000; color: #fff; padding: 20px;" id="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h4><u>Contactez-nous</u></h4>
        <p>
          Adresse : 159 Chausée de Binche, 7000 Mons<br>
          Téléphone : +32 478 17 17 52<br>
          Email : contact@smarteats.com
        </p>
      </div>
      <div class="col-md-4">
        <h4><u>Réseaux sociaux</u></h4>
        <p>
          <a href="https://www.facebook.com/smarteats" style="color: #fff; text-decoration: none;">
            <i class="fab fa-facebook-square"></i> Facebook
          </a><br>
          <a href="https://www.instagram.com/smarteats" style="color: #fff; text-decoration: none;">
            <i class="fab fa-instagram"></i> Instagram
          </a><br>
          <a href="https://www.twitter.com/smarteats" style="color: #fff; text-decoration: none;">
            <i class="fab fa-twitter"></i> Twitter
          </a>
        </p>
      </div>
      <div class="col-md-4">
        <h4><u>Liens utiles</u></h4>
        <ul>
          <li><a href="#" style="color: #fff; text-decoration: none;">Mentions légales</a></li>
          <li><a href="#" style="color: #fff; text-decoration: none;">Politique de confidentialité</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../js/logout.js"></script>
  <script src="../js/afficherRecetteFav.js"></script>
  <script src="../js/modifierRecette.js"></script>
  <script src="../js/ajouter.js"></script>
  <script src="../js/updateImage.js"></script>  
  <script src="../js/gestionUtilisateurs.js"></script>  
  <script src="../js/afficherFavorisR.js"></script>
  <script src="../js/afficherexercice.js"></script>
  <script src="../js/ajouterExercice.js"></script>
  <script src="../js/modifierExercice.js"></script>
  <script src="../js/afficherFavorisE.js"></script>
</body>
</html>
