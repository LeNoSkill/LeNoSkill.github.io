$(document).ready(function () {
    // Fonction pour vérifier si tous les champs sont valides
    function validateForm() {
      var form = $("#connexion-form")[0];
      if (form.checkValidity() === false) {
        form.classList.add("was-validated");
        return false;
      } else {
        form.classList.remove("was-validated");
        return true;
      }
    }
  
    // Vérifier les informations de connexion dans la base de données
    $("#connexion-form").submit(function (event) {
      event.preventDefault();
      if (validateForm()) {
        var email = $("#email_c").val();
        var password = $("#password").val();
        console.log("Email:", email);
        console.log("Password:", password);
        $.ajax({
          type: "POST",
          url: "../php/VerifUtilisateur.php",
          data: { email: email, password: password },
          success: function (response) {
            if (response == "ok") {
              window.location.href = "../php/test.php"; // rediriger vers la page de destination si les informations sont correctes
            } else {
              alert("Adresse email ou mot de passe incorrect");
            }
          },
          error: function (xhr, status, error) {
            alert("Une erreur est survenue lors de la vérification des informations de connexion : " + error);
          }
        });
      }
    });
  });
  