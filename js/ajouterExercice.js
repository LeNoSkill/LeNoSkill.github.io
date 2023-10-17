$(document).ready(function () {
  $("#idAjtExo").hide();
  $("#ajouterExercice").click(function () {
    $(
      "#apropos,#recetteCards,#main-content,#apropos,#footer,#recherche,#utilisateursTable,#exerciceCards,#recherche2,#recetteCardsFav,#exoCardsFav,#idformajt"
    ).hide();
    $("#idAjtExo").show();
  });
});

$("#addform2").on("submit", function (event) {
  //annule rechargement de page//deplacement page apres avoir soumis un formulaire
  event.preventDefault();

  $.ajax({
    url: "addExercice.php",
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
