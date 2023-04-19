<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Smarteats</title>
  <link rel="icon" href="../img/logo.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <script src="../js/logout.js"></script>
  <link rel="stylesheet" href="../css/pageprincipale.css">
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
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-utensils"></i> Recettes</a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="#"><i class="fas fa-running"></i> Exercices physiques</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-info-circle"></i> À propos</a>
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
    Bienvenue sur SmartEats, votre source quotidienne de recettes équilibrées et saines !

Notre objectif est de vous aider à maintenir un mode de vie sain en vous proposant chaque jour de nouvelles recettes délicieuses et faciles à préparer. Nous savons que manger sainement peut parfois sembler difficile, c'est pourquoi nous avons créé SmartEats pour vous simplifier la vie.

Nos recettes sont sélectionnées avec soin par notre équipe de nutritionnistes et de chefs expérimentés pour garantir que chaque plat soit équilibré, savoureux et nourrissant. Nous avons des options pour tous les goûts et tous les régimes alimentaires, que vous soyez végétarien, végétalien, sans gluten ou simplement à la recherche d'options plus saines pour vos repas.

Nous sommes fiers de vous offrir une variété de recettes, allant des petits déjeuners sains et énergisants aux dîners satisfaisants et copieux. Vous trouverez également des recettes pour les collations, les smoothies, les desserts et bien plus encore.

Abonnez-vous à notre newsletter pour recevoir nos recettes quotidiennes directement dans votre boîte de réception. Vous pouvez également nous suivre sur les réseaux sociaux pour des conseils de nutrition, des astuces culinaires et des idées de repas rapides et sains.

Rejoignez notre communauté de mangeurs sains et découvrez à quel point il peut être facile de se nourrir sainement avec SmartEats.
  </div>


  <footer style="background-color: #000; color: #fff; padding: 20px;" id="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h4>Contactez-nous</h4>
        <p>
          Adresse : 159 Chausée de Binche, 7000 Mons<br>
          Téléphone : +32 478 17 17 52<br>
          Email : contact@smarteats.com
        </p>
      </div>
      <div class="col-md-4">
        <h4>Réseaux sociaux</h4>
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
        <h4>Liens utiles</h4>
        <ul>
          <li><a href="#" style="color: #fff; text-decoration: none;">Mentions légales</a></li>
          <li><a href="#" style="color: #fff; text-decoration: none;">Politique de confidentialité</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>


  

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

  
</body>
</html>
