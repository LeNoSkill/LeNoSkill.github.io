$(document).ready(function () {
    $("#recherche").hide();
    $("#modif").click(function() {
    $("#apropos,#recetteCards,#main-content,#apropos,#footer,#idformajt").hide();
    $("#recherche").show();
  });
});

// Récupération des recettes et remplissage de la liste déroulante
function loadRecipes() {
  $.ajax({
    url: 'recetteTest.php',
    type: 'GET',
    dataType: 'json',
    success: function (data) {
      // Remplissage de la liste déroulante avec les recettes récupérées
      data.forEach(function (recipe) {
        $('#recipeSelect').append($('<option>', {
          value: recipe.ID,
          text: recipe.nom_recette
        }));
      });
    },
    error: function (error) {
      console.error("Erreur lors de la récupération des recettes :", error);
    }
  });
}

// Charge les recettes lors du chargement de la page
$(document).ready(function () {
  loadRecipes();
});

// Lorsque le bouton de recherche est cliqué
$("#searchBtn").on("click", function () {
  const selectedRecipeID = $("#recipeSelect").val();
  // ok console.log(selectedRecipeID)

  // Récupérer les informations de la recette sélectionnée
  $.ajax({
    url: "recupererLaRecette.php",
    type: "POST",
    data: { id: selectedRecipeID },
    dataType: "json",
    success: function (recipe) {
      // Créer le formulaire de modification avec les informations de la recette
      const editForm = `
        <h3>Modifier la recette : ${recipe.nom_recette}</h3>
<form id="editForm">
  <input type="hidden" name="id" value="${recipe.ID}" />
  <div class="form-group">
    <label for="name">Nom de la recette :</label>
    <input type="text" class="form-control" name="name" value="${recipe.nom_recette}" required />
  </div>
  <div class="form-group">
    <label for="temps_preparation">Temps de préparation (en minutes) :</label>
    <input type="number" class="form-control" name="temps_preparation" value="${recipe.temps_preparation}" required />
  </div>
  <div class="form-group">
    <label for="temps_cuisson">Temps de cuisson (en minutes) :</label>
    <input type="number" class="form-control" name="temps_cuisson" value="${recipe.temps_cuisson}" required />
  </div>
  <div class="form-group">
    <label for="instructions_preparation">Instructions de préparation :</label>
    <textarea class="form-control" name="instructions_preparation" rows="5" required>${recipe.instructions_preparation}</textarea>
  </div>
  <div class="form-group">
    <label for="liste_ingredients">Liste des ingrédients :</label>
    <textarea class="form-control" name="liste_ingredients" rows="5" required>${recipe.liste_ingredients}</textarea>
  </div>
  <div class="form-group">
    <label for="calories_par_portion">Calories par portion :</label>
    <input type="number" class="form-control" name="calories_par_portion" value="${recipe.calories_par_portion}" required />
  </div>
  <div class="form-group">
    <label for="proteines_par_portion">Protéines par portion (en grammes) :</label>
    <input type="number" class="form-control" name="proteines_par_portion" value="${recipe.proteines_par_portion}" required />
  </div>
  <div class="form-group">
    <label for="glucides_par_portion">Glucides par portion (en grammes) :</label>
    <input type="number" class="form-control" name="glucides_par_portion" value="${recipe.glucides_par_portion}" required />
  </div>
  <div class="form-group">
    <label for="graisses_par_portion">Graisses par portion (en grammes) :</label>
    <input type="number" class="form-control" name="graisses_par_portion" value="${recipe.graisses_par_portion}" required />
  </div>
  <div class="form-group">
    <label for="fibres_par_portion">Fibres par portion (en grammes) :</label>
    <input type="number" class="form-control" name="fibres_par_portion" value="${recipe.fibres_par_portion}" required />
  </div>
  <label for="image_file">Fichier de l'image :</label>
  <input type="file" class="form-control" name="image_file2" id="image_file2" onchange="updateImageURL2();" />
  <input type="text" name="image_url2" id="image_url2" value="${recipe.image_url}" />
  
  </div>
  <button type="submit" class="btn btn-success">Enregistrer les modifications </button>
  <button type="button" class="btn btn-danger" id="deleteBtn">Supprimer la recette</button>
</form>

      `;

      // Afficher le formulaire de modification dans la page
      $("#editFormContainer").html(editForm).show();

      // Événement pour enregistrer les modifications de la recette
      $("#editForm").on("submit", function (event) {
        event.preventDefault();

        $.ajax({
          url: "updateRecette.php",
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

    

      // Événement pour supprimer la recette
      $("#deleteBtn").on("click", function () {
        if (confirm("Êtes-vous sûr de vouloir supprimer cette recette ?")) {
          $.ajax({
            url: "supprimerRecette.php",
            type: "POST",
            data: { id: recipe.ID },
            success: function (response) {
              alert(response);
              location.reload();
            },
            error: function (error) {
              alert("Erreur lors de la suppression de la recette");
              console.error(error);
            },
          });
        }
      });
    },
    error: function (error) {
      console.error("Erreur lors de la récupération de la recette :", error);
    },
  });
});

