$(document).ready(function () {
  $("#idformajt").hide();
  $("#ajouter").click(function() {
  $("#apropos,#recetteCards,#main-content,#apropos,#footer,#recherche,#utilisateursTable").hide();
  $("#idformajt").show();
});
});

$("#addform").on("submit", function (event) {
  event.preventDefault();

  $.ajax({
    url: "addRecette.php",
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
