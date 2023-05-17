$(document).ready(function () {
  $("#recherche2").hide();
  $("#modifierExercice").click(function () {
    $(
      "#apropos,#recetteCards,#recherche,#main-content,#apropos,#footer,#idformajt,#utilisateursTable,#exerciceCards,#idAjtExo,#exoCardsFav"
    ).hide();
    $("#recherche2").show();
  });
});

// Récupération des recettes et remplissage de la liste déroulante
function loadExercices() {
  $.ajax({
    url: "exerciceTest.php",
    type: "GET",
    dataType: "json",
    success: function (data) {
      // Remplissage de la liste déroulante avec les recettes récupérées
      data.forEach(function (exercice) {
        $("#exerciceSelect").append(
          $("<option>", {
            value: exercice.ID,
            text: exercice.nom,
          })
        );
      });
    },
    error: function (error) {
      console.error("Erreur lors de la récupération des exercices :", error);
    },
  });
}

// Charge les recettes lors du chargement de la page
$(document).ready(function () {
  loadExercices();
});

// Lorsque le bouton de recherche est cliqué
$("#searchBtn2").on("click", function () {
  const selectedExerciceID = $("#exerciceSelect").val();
  // ok console.log(selectedRecipeID)

  // Récupérer les informations de la recette sélectionnée
  $.ajax({
    url: "recupererExercice.php",
    type: "POST",
    data: { id: selectedExerciceID },
    dataType: "json",
    success: function (exercice) {
      // Créer le formulaire de modification avec les informations de la recette
      const editForm = `
          <h3>Modifier l'exercice : ${exercice.nom}</h3>
  <form id="editForm">
    <input type="hidden" name="id" value="${exercice.ID}" />

    <div class="form-group">
      <label for="name">Nom de l'exercice :</label>
      <input type="text" class="form-control" name="name" value="${exercice.nom}" required />
    </div>

    <div class="form-group">
      <label for="duree">Durée (en minutes) :</label>
      <input type="number" class="form-control" name="duree" value="${exercice.duree}" required />
    </div>

    <div class="form-group">
      <label for="description">Description de l'exercice :</label>
      <textarea class="form-control" name="description" rows="5" required>${exercice.descript}</textarea>
    </div>

    <div class="form-group">
      <label for="objectif">Objectif :</label>
      <textarea class="form-control" name="objectif" rows="5" required>${exercice.objectif}</textarea>
    </div>

    <label for="image_file">Fichier de l'image :</label>
    <input type="file" class="form-control" name="image_file2" id="image_file2" onchange="updateImageURL2();" />
    <input type="hidden" name="image_url2" id="image_url2" value="${exercice.image_url}" />
    
    </div>
    <button type="submit" class="btn btn-success">Enregistrer les modifications </button>
    <button type="button" class="btn btn-danger" id="deleteBtn">Supprimer la recette</button>
  </form>
  
        `;

      // Afficher le formulaire de modification dans la page
      $("#editFormContainer2").html(editForm).show();

      // Événement pour enregistrer les modifications de la recette
      $("#editForm").on("submit", function (event) {
        event.preventDefault();

        $.ajax({
          url: "updateExercice.php",
          type: "POST",
          data: $(this).serialize(),
          success: function (response) {
            alert(response);
            location.reload();
          },
          error: function (error) {
            alert("Erreur lors de la mise à jour de l'exercice");
            console.error(error);
          },
        });
      });

      // Événement pour supprimer la recette
      $("#deleteBtn").on("click", function () {
        if (confirm("Êtes-vous sûr de vouloir supprimer cette recette ?")) {
          $.ajax({
            url: "supprimerExercice.php",
            type: "POST",
            data: { id: exercice.ID },
            success: function (response) {
              alert(response);
              location.reload();
            },
            error: function (error) {
              alert("Erreur lors de la suppression de l'exercice");
              console.error(error);
            },
          });
        }
      });
    },
    error: function (error) {
      console.error("Erreur lors de la récupération de l'exercice :", error);
    },
  });
});
