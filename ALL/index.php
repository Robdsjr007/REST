<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="./main.css">
    <title>Início</title>
</head>
<body>
    <content>
    <div class="card1">
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
        <div class="card2">
            <table border="1" width="500">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuários</th>
                        <th>Senhas</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php include './usuarios_table.php'; ?>
                </tbody>
            </table>
        </div>
    </content>
    <script src="./js/delete.js"></script>
    <script src="./js/update.js"></script>
    <script src="./js/cadastro.js"></script>
</body>
</html>
