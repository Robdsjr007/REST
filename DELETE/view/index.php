<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="./main.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <content>
        <div class="card">
            <table border="1" width="500">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuários</th>
                        <th>Senhas</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                    <tbody>
                        <?php 
                            $json = file_get_contents('../../users.txt');
                            $usuarios = json_decode($json, true); // Decoding as an associative array

                            foreach ($usuarios as $usuario) {
                                echo '<tr>'; 
                                echo "<td>" . $usuario['id'] . "</td>";
                                echo "<td>" . base64_decode($usuario['email']) . "</td>";
                                echo "<td>" . base64_decode($usuario['senha']) . "</td>";
                                echo "<td><button id='delete-button'>Delete</button></td>";
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
            </table>
        </div>
    </content>
    <script src="./delete.js"></script>
</body>
</html>
