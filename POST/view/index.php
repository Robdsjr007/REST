<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./main.css">
    <title>Cadastro</title>
</head>
<body>
    <content>
        <div class="card">
            <h1>Cadastro de Usuário</h1>
            <form id="cadastroForm">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br>

                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required><br>

                <button type="submit">Cadastrar</button>
            </form>
        </div>
        <div class="card">
        <?php
          $json = file_get_contents('../../users.txt');
          $usuarios = json_decode($json);

          echo "<table>";
          echo "<tr><th>ID</th><th>Usuários</th><th>Senhas</th></tr>";

          foreach ($usuarios as $usuario) {
            echo '<tr>';
            echo "<td>" . $usuario->id . "</td>";
            echo "<td>" . base64_decode($usuario->email) . "</td>";
            echo "<td>" . base64_decode($usuario->senha) . "</td>";
            echo "</tr>";
          } 

          echo "</table>";
        ?>
        </div>
    </content>
    <script src="./cadastro.js"></script>
</body>
</html>
