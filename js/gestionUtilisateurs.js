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
                    <button class="btn btn-sm btn-primary modify-btn">Modifier</button>
                    <button class="btn btn-sm btn-danger">Supprimer</button>
                  </td>
                </tr>`
            );
            $("#utilisateursTable tbody").append(row);

            // Gestion de l'événement click pour le bouton "Modifier"
            row.find(".modify-btn").click(function () {
              var cells = $(this).closest("tr").children("td");
              cells.each(function () {
                if ($(this).index() !== 0 && $(this).index() !== cells.length - 1) {
                  var input = $('<input>').val($(this).text());
                  $(this).html(input);
                }
              });

              // Remplace le bouton "Modifier" par un bouton "Enregistrer"
              $(this).replaceWith('<button class="btn btn-sm btn-success save-btn">Enregistrer</button>');
            });
          }
        }
      })
      .fail(function (error) {
        alert("Erreur détectée: " + error.responseText);
        $("#utilisateurs").append(error.responseText);
      });
  });

  // Gestion de l'événement click pour le bouton "Enregistrer"
  $("#utilisateursTable").on('click', '.save-btn', function () {
    var row = $(this).closest("tr");
    var cells = row.children("td");
    
    // Extraire les données modifiées à partir des champs d'entrée
    var updatedData = {};
    cells.each(function () {
      if ($(this).index() !== 0 && $(this).index() !== cells.length - 1) {
        var columnName = $("#utilisateursTable thead th").eq($(this).index()).text();
        updatedData[columnName] = $(this).find("input").val();
        $(this).text($(this).find("input").val());
      }
    });
  
    // Ajouter l'ID de l'utilisateur aux données envoyées
    updatedData['ID'] = row.find("td:first").text();
  
    // Envoyer les données modifiées au serveur
    $.ajax({
      url: 'updateUtilisateurs.php',
      type: 'POST',
      data: updatedData,
      success: function (response) {
        // Traiter la réponse du serveur (par exemple, afficher un message de succès)
        alert('Utilisateur mis à jour avec succès');
      },
      error: function (error) {
        // Gérer les erreurs éventuelles
        alert('Erreur lors de la mise à jour de l’utilisateur : ' + error.responseText);
      }
    });
  
    // Remplace le bouton "Enregistrer" par un bouton "Modifier"
    $(this).replaceWith('<button class="btn btn-sm btn-primary modify-btn">Modifier</button>');
  });

});  
