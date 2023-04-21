$(document).ready(function () {
    let i = 0 ;
// Affiche les recettes et cache le reste
$("#afficherrecette").click(function() {
$("#main-content,#apropos,#recherche").hide();
$("#recetteCards").show();
});

// Gère le clic sur "Accueil"
$(".nav-link[href='#']").click(function (event) {
event.preventDefault(); // Empêche le comportement par défaut du lien
if ($(this).text().trim() === "Accueil") {
  $("#recetteCards,#recherche").hide();
  $("#main-content, #apropos,#footer").show(); // Afficher ces éléments
}
});

// Gère le clic sur "Recettes"
$("#afficherrecette").click(function () {
$.get("recetteTest.php", function () { }, "json")
  .done(function (data) {
    // Parcourir les objets dans data et ajouter les valeurs dans le tableau
    if(i<data.length){
      for (var obj of data) {
      i=data.length
      var card = $('<div>').addClass('col').appendTo('#recetteCards');
      var cardInner = $('<div>').addClass('card h-100').appendTo(card);
      $('<img>').attr('src', obj.image_url).addClass('card-img-top').css('max-height', '200px').appendTo(cardInner);
      var cardBody = $('<div>').addClass('card-body').appendTo(cardInner);
      $('<h5>').text(obj.nom_recette).addClass('card-title').appendTo(cardBody);
      $('<p>').text('Temps de préparation : ' + obj.temps_preparation).appendTo(cardBody);
      $('<p>').text('Temps de cuisson : ' + obj.temps_cuisson).appendTo(cardBody);
      $('<p>').text('Instructions : ' + obj.instructions_preparation).appendTo(cardBody);
      $('<p>').text('Ingrédients : ' + obj.liste_ingredients).appendTo(cardBody);
      var cardFooter = $('<div>').addClass('card-footer').appendTo(cardInner);
      $('<small>').text('Calories : ' + obj.calories_par_portion).appendTo(cardFooter);
      $('<small>').text(' Protéines : ' + obj.proteines_par_portion).appendTo(cardFooter);
      $('<small>').text(' Glucides : ' + obj.glucides_par_portion).appendTo(cardFooter);
      $('<small>').text(' Graisses : ' + obj.graisses_par_portion).appendTo(cardFooter);
      $('<small>').text(' Fibres : ' + obj.fibres_par_portion).appendTo(cardFooter);
    }
    }
    
  })
  .fail(function (error) {
    alert("error détectée:" + error.responseText);
    $("#recettes").append(error.responseText);
  })
});
});

