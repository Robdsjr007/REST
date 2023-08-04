document.addEventListener("DOMContentLoaded", function () {
    var updateButtons = document.querySelectorAll(".update-button");
  
    updateButtons.forEach(function (button) {
      button.addEventListener("click", function () {
        var userID = button.getAttribute("data-id");
  
        var newEmail = prompt("Digite o novo email:");
        if (newEmail === null) {
          // User canceled the operation
          return;
        }
  
        var newSenha = prompt("Digite a nova senha:");
        if (newSenha === null) {
          // User canceled the operation
          return;
        }
  
        var formData = {
          id: userID,
          email: newEmail,
          senha: newSenha,
        };
  
        // Faz a solicitação POST ao backend.php
        fetch("./../UPDATE/backend.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(formData),
        })
          .then(function (response) {
            if (!response.ok) {
              throw new Error("Falha na requisição. Status: " + response.status);
            }
            return response.json();
          })
          .then(function (data) {
            if (data && data.message) {
              alert(data.message);
              location.reload(); // Recarrega a página após a atualização
            } else {
              throw new Error("Resposta inválida do servidor.");
            }
          })
          .catch(function (error) {
            console.error(error);
            alert(
              "Ocorreu um erro ao atualizar os dados. Por favor, tente novamente mais tarde."
            );
          });
      });
    });
  });
  