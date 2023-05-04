$(document).ready(function () {
  let i = 0;

  // Affiche les utilisateurs et cache le reste
  $("#afficherutilisateurs").click(function () {
    $("#apropos,#recetteCards,#main-content,#apropos,#footer,#idformajt,#recherche").hide();
    $("#utilisateursTable").show();
  });

  $("#afficherutilisateurs").click(function () {
    $.get("gestionUtilisateurs.php", function () { }, "json")
      .done(function (data) {
        if (i < data.length) {
          for (var obj of data) {
            i = data.length;
            var checkedStatus = (obj.TYPE == 1) ? 'checked' : '';
            var row = $(
              `<tr>
                  <td>${obj.ID}</td>
                  <td>${obj.TYPE}</td>
                  <td>${obj.NOM}</td>
                  <td>${obj.PRENOM}</td>
                  <td>${obj.MAIL}</td>
                  <td>${obj.DATENAISSANCE}</td>
                  <td>${obj.POIDS}</td>
                  <td>${obj.TAILLE_CM}</td>
                  <td>${obj.SEXE}</td>
                  <td>
                    <input type="checkbox" class="type-checkbox" ${checkedStatus}>
                    <button class="btn btn-sm btn-danger">Supprimer</button>
                  </td>
                </tr>`
            );
            $("#utilisateursTable tbody").append(row);
          }
        }
      })
      .fail(function (error) {
        alert("Erreur détectée: " + error.responseText);
        $("#utilisateurs").append(error.responseText);
      });
  });

  // Gestion de l'événement click pour la case à cocher "Type"
  $("#utilisateursTable").on('click', '.type-checkbox', function () {
    var row = $(this).closest("tr");
    var id = row.find("td:first").text();
    var newType = this.checked ? 1 : 0;

    // Envoyer les données modifiées au serveur
    $.ajax({
      url: 'updateUtilisateurs.php',
      type: 'POST',
      dataType: 'json',
      contentType: 'application/json',
      data: JSON.stringify({ ID: id, TYPE: newType }),
      success: function (response) {
        if (response.status === "success") {
          alert('Utilisateur mis à jour avec succès');
        } else {
          alert('Erreur lors de la mise à jour de l’utilisateur');
        }
      },
      error: function (error) {
        // Gérer les erreurs éventuelles
        alert('Erreur lors de la mise à jour de l’utilisateur : ' + error.responseText);
      }
    });

    // Mettre à jour le type dans la table
    row.find("td:nth-child(2)").text(newType);
  });

});
