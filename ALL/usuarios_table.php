<?php
$json = file_get_contents('.././users.txt');
$usuarios = json_decode($json, true); 

foreach ($usuarios as $usuario) {
    echo '<tr>'; 
    echo "<td>" . $usuario['id'] . "</td>";
    echo "<td>" . base64_decode($usuario['email']) . "</td>";
    echo "<td>" . base64_decode($usuario['senha']) . "</td>";
    echo '<td><button class="update-button" data-id="' . $usuario['id'] . '">Patch</button>';
    echo '<button class="delete-button" data-id="' . $usuario['id'] . '">Delete</button></td>';
    echo '</tr>';
}
?>
