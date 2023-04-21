$(document).ready(function () {
    $("#recherche").hide();
    $("#modif").click(function() {
    $("#apropos,#recetteCards,#main-content,#apropos,#footer").hide();
    $("#recherche").show();
  });
});