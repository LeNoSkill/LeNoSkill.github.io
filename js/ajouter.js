$(document).ready(function () {
  $("#idformajt").hide();
  $("#ajouter").click(function () {
    $(
      "#apropos,#recetteCards,#main-content,#apropos,#footer,#recherche,#utilisateursTable,#exerciceCards,#idAjtExo,#recherche2,#exoCardsFav"
    ).hide();
    $("#idformajt").show();
  });
});

$("#addform").on("submit", function (event) {
  //annule rechargement de page//deplacement page apres avoir soumis un formulaire
  event.preventDefault();

  $.ajax({
    url: "addRecette.php",
    type: "POST",
    //prend et encode entrées du formulaire
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
