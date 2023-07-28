$(document).ready(function() {
    $(".delete-button").on("click", function() {
        var userID = $(this).data("id");
        fetch("./backend.php", {
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
