$(document).ready(function () {
  let i = 0;
  // Affiche les recettes et cache le reste
  $("#afficherFavorisRec").click(function () {
    $(
      "#main-content,#apropos,#recherche,#idformajt,#utilisateursTable,#recetteCards,#recherche2, #idAjtExo"
    ).hide();
    $("#recetteCardsFav,#footer").show();
  });

  // Gère le clic sur "Accueil"
  $(".nav-link[href='#']").click(function (event) {
    event.preventDefault(); // Empêche le comportement par défaut du lien
    if ($(this).text().trim() === "Accueil") {
      $("#recetteCardsFav,#recherche,#idformajt,#utilisateursTable").hide();
      $("#main-content, #apropos,#footer").show(); // Afficher ces éléments
    }
    //$("#fav").click(function() {$.get("addFavori.php", $(this).attr('data-id').value)});
  });

  $("#afficherFavorisRec").click(function () {
    $.get("afficherFavRecette.php", function () {}, "json")
      .done(function (data) {
        if (i < data.length) {
          for (var obj of data) {
            i = data.length;
            var card = $("<div>").addClass("col").appendTo("#recetteCardsFav");
            var cardInner = $("<div>").addClass("card h-100").appendTo(card);
            $("<img>")
              .attr("src", obj.image_url)
              .addClass("card-img-top")
              .css("max-height", "200px")
              .appendTo(cardInner);
            var cardBody = $("<div>").addClass("card-body").appendTo(cardInner);
            $("<h5>")
              .text(obj.nom_recette)
              .addClass("card-title")
              .appendTo(cardBody);
            $("<p>")
              .text("Temps de préparation : " + obj.temps_preparation)
              .appendTo(cardBody);
            $("<p>")
              .text("Temps de cuisson : " + obj.temps_cuisson)
              .appendTo(cardBody);
            // Ajout de la checkbox
/*
            //$('<a>').attr('href','../php/addFavori.php?id=' + obj.ID).text('Favori').appendTo(cardBody);
            $('<span class="fav2">')
              .attr("data-id", obj.ID)
              .html('<i class="fa fa-heart"></i>')
              .appendTo(cardBody);
            $("<br>").appendTo(cardBody);
            $("<br>").appendTo(cardBody);
*/
            // $('<label>').text('Ajouter aux favoris').appendTo(cardBody);

            var uniqueId = obj.nom_recette.replace(/\s+/g, ""); // remove spaces to create a unique ID
            var collapseButton = $("<button>")
              .addClass("btn btn-primary")
              .attr("type", "button")
              .attr("data-bs-toggle", "collapse")
              .attr("data-bs-target", "#collapse" + uniqueId)
              .text("Voir les ingrédients et instructions")
              .appendTo(cardBody);

            var collapseDiv = $("<div>")
              .addClass("collapse")
              .attr("id", "collapse" + uniqueId)
              .appendTo(cardBody);
            $("<p>")
              .html(
                "<u>Instructions</u><br>" +
                  obj.instructions_preparation.replace(/\./g, ".<br><br>")
              )
              .appendTo(collapseDiv);
            $("<p>")
              .html(
                "<u>Ingrédients : </u><br>" +
                  obj.liste_ingredients.replace(/\-/g, "<br>")
              )
              .appendTo(collapseDiv);

            var cardFooter = $("<div>")
              .addClass("card-footer")
              .appendTo(cardInner);
            $("<small>")
              .html(
                '<i class="fas fa-fire"></i> Calories : ' +
                  obj.calories_par_portion
              )
              .appendTo(cardFooter);
            $("<br>").appendTo(cardFooter);
            $("<small>")
              .html(
                ' <i class="fas fa-dumbbell"></i> Protéines : ' +
                  obj.proteines_par_portion
              )
              .appendTo(cardFooter);
            $("<br>").appendTo(cardFooter);
            $("<small>")
              .html(
                ' <i class="fas fa-bread-slice"></i> Glucides : ' +
                  obj.glucides_par_portion
              )
              .appendTo(cardFooter);
            $("<br>").appendTo(cardFooter);
            $("<small>")
              .html(
                ' <i class="fas fa-tint"></i> Graisses : ' +
                  obj.graisses_par_portion
              )
              .appendTo(cardFooter);
            $("<br>").appendTo(cardFooter);
            $("<small>")
              .html(
                ' <i class="fa-brands fa-pagelines"></i> Fibres : ' +
                  obj.fibres_par_portion
              )
              .appendTo(cardFooter);
          }
/*
          $(".fav2").on("click", function () {
            var idRecette = "id=" + $(this).attr("data-id");

            console.log(idRecette);

            $.ajax({
              url: "addFavori.php",
              type: "GET",
              dataType: "text",
              data: idRecette,
              async: false,
              success: function (response) {
                alert("réussi" + response);
              },
              error: function (error) {
                // Gérer les erreurs éventuelles
                alert(
                  "Erreur lors de l'ajout au favori' : " + error.responseText
                );
              },
            });
          });*/
        }
      })
      .fail(function (error) {
        alert("error détectée:" + error.responseText);
        $("#recettes").append(error.responseText);
      });
  });
});
