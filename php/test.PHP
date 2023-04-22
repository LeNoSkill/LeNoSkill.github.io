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
                <li><a class="dropdown-item" href="#">Ajouter</a></li>
                <li><a class="dropdown-item" href="#" id="modif">Modifier/Supprimer</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-running"></i> Exercices physiques
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Afficher</a></li>
                <li><a class="dropdown-item" href="#">Ajouter</a></li>
                <li><a class="dropdown-item" href="#">Modifier/Supprimer</a></li>
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
      <p>Bienvenue sur SmartEats, votre source quotidienne de recettes équilibrées et saines !</p>

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
        Pas le pote de Matéo a été exploiter pour se site.
      </p>
    </div>
    <div class="col-md-4 person">
      <img src="../img/Francesco.png" alt="Créateur 2">
      <h3>Francesco Battista</h3>
      <p>
        le fr , le sang , a aider mentalement et a essayé de mettre matéo sur la bonne voie.
      </p>
    </div>
    <div class="col-md-4 person">
      <img src="../img/Mateo.jpg" alt="Créateur 3">
      <h3>Matéo Fontaine</h3>
      <p>
        Na rien coder de ce site internet juste le remplissage de la base de données qu'il avait mal construite.
      </p>
    </div>
  </div>
</section>
</div>
</div>

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




  </div>
  <div id="recetteCards" class="row row-cols-1 row-cols-md-4 g-4">
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
  <script src="../js/afficherRecette.js"></script>
  <script src="../js/modifierRecette.js"></script>
  <script>
// Récupération des recettes et remplissage de la liste déroulante
function loadRecipes() {
  $.ajax({
    url: 'recetteTest.php',
    type: 'GET',
    dataType: 'json',
    success: function (data) {
      // Remplissage de la liste déroulante avec les recettes récupérées
      data.forEach(function (recipe) {
        $('#recipeSelect').append($('<option>', {
          value: recipe.ID,
          text: recipe.nom_recette
        }));
      });
    },
    error: function (error) {
      console.error("Erreur lors de la récupération des recettes :", error);
    }
  });
}

// Charge les recettes lors du chargement de la page
$(document).ready(function () {
  loadRecipes();
});


  </script>
  <script>
    // Lorsque le bouton de recherche est cliqué
$("#searchBtn").on("click", function () {
  const selectedRecipeID = $("#recipeSelect").val();
  // ok console.log(selectedRecipeID)

  // Récupérer les informations de la recette sélectionnée
  $.ajax({
    url: "recupererLaRecette.php",
    type: "POST",
    data: { id: selectedRecipeID },
    dataType: "json",
    success: function (recipe) {
      // Créer le formulaire de modification avec les informations de la recette
      const editForm = `
        <h3>Modifier la recette : ${recipe.nom_recette}</h3>
<form id="editForm">
  <input type="hidden" name="id" value="${recipe.ID}" />
  <div class="form-group">
    <label for="name">Nom de la recette :</label>
    <input type="text" class="form-control" name="name" value="${recipe.nom_recette}" required />
  </div>
  <div class="form-group">
    <label for="temps_preparation">Temps de préparation (en minutes) :</label>
    <input type="number" class="form-control" name="temps_preparation" value="${recipe.temps_preparation}" required />
  </div>
  <div class="form-group">
    <label for="temps_cuisson">Temps de cuisson (en minutes) :</label>
    <input type="number" class="form-control" name="temps_cuisson" value="${recipe.temps_cuisson}" required />
  </div>
  <div class="form-group">
    <label for="instructions_preparation">Instructions de préparation :</label>
    <textarea class="form-control" name="instructions_preparation" rows="5" required>${recipe.instructions_preparation}</textarea>
  </div>
  <div class="form-group">
    <label for="liste_ingredients">Liste des ingrédients :</label>
    <textarea class="form-control" name="liste_ingredients" rows="5" required>${recipe.liste_ingredients}</textarea>
  </div>
  <div class="form-group">
    <label for="calories_par_portion">Calories par portion :</label>
    <input type="number" class="form-control" name="calories_par_portion" value="${recipe.calories_par_portion}" required />
  </div>
  <div class="form-group">
    <label for="proteines_par_portion">Protéines par portion (en grammes) :</label>
    <input type="number" class="form-control" name="proteines_par_portion" value="${recipe.proteines_par_portion}" required />
  </div>
  <div class="form-group">
    <label for="glucides_par_portion">Glucides par portion (en grammes) :</label>
    <input type="number" class="form-control" name="glucides_par_portion" value="${recipe.glucides_par_portion}" required />
  </div>
  <div class="form-group">
    <label for="graisses_par_portion">Graisses par portion (en grammes) :</label>
    <input type="number" class="form-control" name="graisses_par_portion" value="${recipe.graisses_par_portion}" required />
  </div>
  <div class="form-group">
    <label for="fibres_par_portion">Fibres par portion (en grammes) :</label>
    <input type="number" class="form-control" name="fibres_par_portion" value="${recipe.fibres_par_portion}" required />
  </div>
  <div class="form-group">
    <label for="image_url">URL de l'image :</label>
    <input type="text" class="form-control" name="image_url" value="${recipe.image_url}" />
  </div>
  <button type="submit" class="btn btn-success">Enregistrer les modifications </button>
  <button type="button" class="btn btn-danger" id="deleteBtn">Supprimer la recette</button>
</form>

      `;

      // Afficher le formulaire de modification dans la page
      $("#editFormContainer").html(editForm).show();

      // Événement pour enregistrer les modifications de la recette
      $("#editForm").on("submit", function (event) {
        event.preventDefault();

        $.ajax({
          url: "updateRecette.php",
          type: "POST",
          data: $(this).serialize(),
          success: function (response) {
            alert(response);
            location.reload();
          },
          error: function (error) {
            alert("Erreur lors de la mise à jour de la recette");
            console.error(error);
          },
        });
      });

      // Événement pour supprimer la recette
      $("#deleteBtn").on("click", function () {
        if (confirm("Êtes-vous sûr de vouloir supprimer cette recette ?")) {
          $.ajax({
            url: "supprimerRecette.php",
            type: "POST",
            data: { id: recipe.ID },
            success: function (response) {
              alert(response);
              location.reload();
            },
            error: function (error) {
              alert("Erreur lors de la suppression de la recette");
              console.error(error);
            },
          });
        }
      });
    },
    error: function (error) {
      console.error("Erreur lors de la récupération de la recette :", error);
    },
  });
});


  </script>

  
</body>
</html>
