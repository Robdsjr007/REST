document.getElementById("delete-button").addEventListener("submit", function(event) {
    event.preventDefault(); // Impede o envio padrão do formulário

    fetch("./backend.php", {
        method: "DELETE",
        headers: {
            "Content-Type": "application/json"
        }
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        form.reset();
    })
    .catch(error => {
        console.error(error);
    });
});
