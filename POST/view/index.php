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
        <table border="1" width="500">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuários</th>
                        <th>Senhas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php include './usuarios_table.php'; ?>
                </tbody>
            </table>
    </content>
    <script src="./cadastro.js"></script>
</body>
</html>
