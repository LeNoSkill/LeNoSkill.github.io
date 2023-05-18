$(document).ready(function () {
  let i = 0;

  $("#afficherexercice").click(function () {
    console.log("essai");
    $(
      "#main-content,#apropos,#recherche,#idformajt,#utilisateursTable,#recetteCards,#idAjtExo,#recherche2, #recetteCardsFav,#exoCardsFav"
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
            var favEltExo= $('<span class="favExo">')
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
            
            (function (favEltExo) {
              $.ajax({             

                
                url: "verifFavExo.php",
                type: "GET",
                dataType: "json",
                data: { id: favEltExo.attr("data-id") },
                success: function (response) {
  
                  
                  //var isFavorited = JSON.parse(response); // Convertir la réponse en valeur booléenne
                  var isFavorited = response.is_favorited; 
                  console.log(
                    "passage dans success : " + isFavorited +" "+favEltExo.attr("data-id")
                  );
                  if (isFavorited) {
                    favEltExo.css("color", "red");
                  }/*
                  if (response === "true") {
                    favElement.css("color", "red");
                  }*/
                },
                error: function (error) {
                  // Gérer les erreurs éventuelles
                  console.log(
                    "Erreur lors de la vérification des favoris : " +
                      error.responseText
                  );
                },
              });
            })(favEltExo); 
            
          }
          $(".favExo").on("click", function () {
            var idExo = "id=" + $(this).attr("data-id");

            console.log(idExo);
            var element = $(this);
            $.ajax({
              url: "addFavExo.php",
              type: "GET",
              dataType: "text",
              data: idExo,
              async: false,
              success: function (response) {
                if (element.css("color") === "rgb(255, 0, 0)") {
                  element.css("color", "gray"); // Changez la couleur en gris si elle est rouge
                } else {
                  element.css("color", "red"); // Sinon, changez la couleur en rouge
                }
                alert("" + response);
                location.reload();
                $(
                  "#main-content,#apropos,#recherche,#idformajt,#utilisateursTable,#recetteCardsFav,#modifierExercice,#recherche2,#exerciceCards,#idAjtExo"
                ).hide();
                $("#recetteCards,#footer").show();
              },
              error: function (error) {
                // Gérer les erreurs éventuelles
                alert(
                  "Erreur lors de l'ajout au favori' : " + error.responseText
                );
              },
            });
          });
        }
      })
      .fail(function (error) {
        alert("Erreur détectée:" + error.responseText);
        $("#exercices").append(error.responseText);
      });
  });
});
