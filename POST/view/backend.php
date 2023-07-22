<?php

$data = json_decode(file_get_contents('php://input'), true); // Recebe os dados do POST

$nome = $data['nome'];
$email = base64_encode($data['email']);
$senha = base64_encode($data['senha']);

// Aqui você pode realizar as validações necessárias nos dados recebidos
$usuarios = file_get_contents('../../users.txt'); // Lê o arquivo com os usuários cadastrados
$usuariosArray = json_decode($usuarios, true); // Converte para array


     // Gera um ID automático
     $id = count($usuariosArray) + 1;

     // Adiciona o novo usuário no array
     $usuariosArray[] = array(
         'id' => $id,
         'email' => $email,
         'senha' => $senha
     );
       
$usuariosJson = json_encode($usuariosArray, JSON_PRETTY_PRINT) . PHP_EOL; // Converte de volta para JSON
file_put_contents('../../users.txt', $usuariosJson); // Escreve os dados atualizados no arquivo

$response = array(
    'message' => 'Usuário cadastrado com sucesso!'
);

header('Content-Type: application/json');
echo json_encode($response);
?>