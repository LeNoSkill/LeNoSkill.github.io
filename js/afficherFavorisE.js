$(document).ready(function () {
    let i = 0;
    // Affiche les recettes et cache le reste
    $("#afficherFavorisExe").click(function () {
      $(
        "#main-content,#apropos,#recherche,#idformajt,#utilisateursTable,#recetteCards,#recetteCardsFav,#recherche2,#exerciceCards,#idAjtExo"
      ).hide();
      $("#exoCardsFav,#footer").show();
    });
  
    // Gère le clic sur "Accueil"
    $(".nav-link[href='#']").click(function (event) {
      event.preventDefault(); // Empêche le comportement par défaut du lien
      if ($(this).text().trim() === "Accueil") {
        $("#exoCardsFav,#recherche,#idformajt,#utilisateursTable").hide();
        $("#main-content, #apropos,#footer").show(); // Afficher ces éléments
      }
      //$("#fav").click(function() {$.get("addFavori.php", $(this).attr('data-id').value)});
    });
    $("#afficherFavorisExe").click(function () {
        $.get("afficherFavExo.php", function () {}, "json")
          .done(function (data) {
            if (i < data.length) {
              for (var obj of data) {
                i = data.length;
                var card = $("<div>").addClass("col").appendTo("#exoCardsFav");
                var cardInner = $("<div>").addClass("card h-100").appendTo(card);
                $("<img>")
                  .attr("src", obj.image_url)
                  .addClass("card-img-top")
                  .css("max-height", "200px")
                  .appendTo(cardInner);
                var cardBody = $("<div>").addClass("card-body").appendTo(cardInner);
                $("<h5>").text(obj.nom).addClass("card-title").appendTo(cardBody);
                $("<p>")
                  .text("Durée : " + obj.duree)
                  .appendTo(cardBody);
            
    
                $("<p>")
                  .text("description : " + obj.descript)
                  .appendTo(cardBody);
                $("<p>")
                  .text("objectif : " + obj.objectif)
                  .appendTo(cardBody);
                // Check if obj.description exists before using it
                if (obj.description) {
                  $("<p>")
                    .html(
                      "<u>Description</u><br>" +
                        obj.description.replace(/\./g, ".<br><br>")
                    )
                    .appendTo(cardBody);
                }
              }
            }
          })
          .fail(function (error) {
            alert("Erreur détectée:" + error.responseText);
            $("#exercices").append(error.responseText);
          });
      });
  });
  