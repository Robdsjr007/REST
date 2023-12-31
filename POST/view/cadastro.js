document.getElementById("cadastroForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Impede o envio padrão do formulário

    var form = document.getElementById("cadastroForm");
    var formData = new FormData(form);

    fetch("./backend.php", {
        method: "POST",
        body: JSON.stringify(Object.fromEntries(formData)),
        headers: {
            "Content-Type": "application/json"
        }
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        form.reset();
        location.reload();
    })
    .catch(error => {
        console.error(error);
    });
});
