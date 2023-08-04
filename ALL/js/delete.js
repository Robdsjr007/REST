document.addEventListener("DOMContentLoaded", function () {
    var DeletesButtons = document.querySelectorAll(".delete-button");
  
    DeletesButtons.forEach(function (button) {
      button.addEventListener("click", function () {
        var userID = button.getAttribute("data-id");
        fetch("./../DELETE/view/backend.php", {
            method: "DELETE",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ id: userID })
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            location.reload();
        })
        .catch(error => {
            console.error(error);
        });
     });
  });
});
