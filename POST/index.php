<?php

    function gravar($email, $senha){

        if (empty($email) || empty($senha)) {
            echo "<script>alert('Preencha todos os campos!')</script>";
            return;
        }        

        $arquivo = "../users.txt";

        // Lê os usuários do arquivo e converte para um array
        $arquivoGet = file_get_contents($arquivo);
        $usuarios = json_decode($arquivoGet, true);


        // Verifica se o e-mail já está cadastrado
        foreach ($usuarios as $usuario) {
            if ($usuario['email'] === $email) {
                echo "<script>alert('Este e-mail já está cadastrado!')</script>";
                return;
            }
        }

        // Gera um ID automático
        $id = count($usuarios) + 1;

        // Adiciona o novo usuário no array
        $novoUsuario = array(
            'id' => $id,
            'email' => $email,
            'senha' => $senha,
        );

        $usuarios[] = $novoUsuario;

        // Converte o array para uma string JSON e escreve no arquivo
        $json = json_encode($usuarios, JSON_PRETTY_PRINT) . PHP_EOL;
        file_put_contents($arquivo, $json);

        echo "<script>alert('Registrado com sucesso!'); document.location.href='sucesso.php';</script>";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = (base64_encode($_POST['email']));
        $senha = (base64_encode($_POST['senha']));

        gravar($email, $senha);
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST</title>
    <style>
        html{
            width: 100%;
            height: 100%;
        }
        body{
            width: 100%;
            height: 100%;
        }
        content{
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
        }
        .card{
            display: flex;
            flex-direction: column;
            border: black 1px solid;
            padding: 20px;
        }
        .inputBox{
            margin-bottom: 10px;
        }
        .password{
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <content>
        <div class="card">
            <form method="post">
                <h2>Cadastrar</h2>
                <div class="inputBox">
                    <span>Email:</span>
                <input type="email" name="email"/>
                </div>
                <div class="inputBox">
                    <span>Senha:</span>
                <input type="password" class="password" name="senha"/>
                </div>
                <input type="submit" value="Enviar">
            </form>
        </div>
    </content>
</body>
</html>