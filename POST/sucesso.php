<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Cadastro</title>

    <style>
        html {
            width: 100%;
            height: 100%;
        }

        body {
            width: 100%;
            height: 100%;
        }

        content {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
        }

        .card {
            display: flex;
            flex-direction: column;
            border: black 1px solid;
            padding: 20px;
        }
    </style>
</head>

<body>
    <button><a href="index.html">Voltar a Página principal</a></button>
    <content>
        <div class="card">
            <?php echo 'hello world' ; ?>
        </div>
    </content>
</body>

</html>