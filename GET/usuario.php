<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>
    <style>
*{
  text-decoration: none;
  color: black;
}

body{
    width: 100vw;
    height: 100vh;
}
p, h1{
    text-align: center;
}

button{
  margin-bottom: 50px;
}

table{
  width: 100%;
  margin-bottom: 10px;
}
th{
 border: 1px solid black;
 background-color: darkblue;
 color: white;
}
td{
 border: 1px solid black;
}
    </style>
</head>
<body>
    <button><a href="index.html">Voltar a Página principal</a></button>
    

<?php
  // Ler o arquivo com os usuários cadastrados
  $json = file_get_contents('../users.txt');
  $usuarios = json_decode($json, true);

  // Extrai o ID fornecido na URL
$usuario_id = isset($_GET['id']) ? intval($_GET['id']) : null;

if ($usuario_id !== null) {
    
    // Busca o usuário correspondente na lista de dicionários
    foreach ($usuarios as $usuario) {
        if ($usuario['id'] === $usuario_id) {
           
            // Decodifica os campos de email, senha e papel, que estão em base64
            $usuario['email'] = base64_decode($usuario['email']);
            $usuario['senha'] = base64_decode($usuario['senha']);
            
            // Retorna o usuário encontrado em Tabela
            echo "<table>";
            echo "<tr><th>ID</th><th>Email</th><th>Senha</th><th>Login</th></tr>";
            echo "<tr>";
            echo "<td>" . $usuario['id'] . "</td>";
            echo "<td>" . $usuario['email'] . "</td>";
            echo "<td>" . $usuario['senha'] . "</td>";
            echo "<td>" . $usuario['login'] . "</td>";
            echo "</tr>";
            echo "</table>";

            exit();
        }
    }

    // Se não encontrar um usuário com o ID fornecido, retorna um erro 404
    http_response_code(404);
    echo "<h1>Erro: 404</h1>";
    echo "<p>Usuario não encontrado, digite um número de 1 a 6 no input ou na URL, após 'usuario.php?id='.</p>";
} else {
    // Se não for fornecido um ID, retorna um erro 400
    http_response_code(400);
    echo "<h1>Erro: 400</h1>";
    echo "<p>URL inválida, volte por favor.</p>";}

?>

</body>
</html>