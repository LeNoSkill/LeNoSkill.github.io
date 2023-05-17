$(document).ready(function () {
  let i = 0;

  $("#afficherexercice").click(function () {
    console.log("essai");
    $(
      "#main-content,#apropos,#recherche,#idformajt,#utilisateursTable,#recetteCards,#idAjtExo,#modifierExercice,#recherche2, #recetteCardsFav"
    ).hide();
    $("#exerciceCards").show();
  });

  // Gère le clic sur "Accueil"
  $(".nav-link[href='#']").click(function (event) {
    event.preventDefault(); // Empêche le comportement par défaut du lien
    if ($(this).text().trim() === "Accueil") {
      $(
        "#exerciceCards,#recherche,#idformajt,#utilisateursTable,#idAjtExo,#recetteCards"
      ).hide();
      $("#main-content, #apropos,#footer").show(); // Afficher ces éléments
    }
  });

  $("#afficherexercice").click(function () {
    $.get("exerciceTest.php", function () {}, "json")
      .done(function (data) {
        if (i < data.length) {
          for (var obj of data) {
            i = data.length;
            var card = $("<div>").addClass("col").appendTo("#exerciceCards");
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
            $('<span class="favExo">')
              .attr("data-id", obj.ID)
              .html('<i class="fa fa-heart"></i>')
              .appendTo(cardBody);
            $("<br>").appendTo(cardBody);
            $("<br>").appendTo(cardBody);

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
