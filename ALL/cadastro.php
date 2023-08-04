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
    </content>
    <script src="./js/cadastro.js"></script>
</body>
</html>
