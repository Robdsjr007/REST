<?php

try {
    // Recebe os dados do POST
    $data = json_decode(file_get_contents('php://input'), true);

    if (!$data || !isset($data['id']) || !isset($data['email']) || !isset($data['senha'])) {
        throw new Exception('Dados inválidos. Certifique-se de fornecer um ID, email e senha válidos.');
    }

    $usuarios = file_get_contents('./../users.txt'); // Lê o arquivo com os usuários cadastrados
    if ($usuarios === false) {
        throw new Exception('Falha ao ler o arquivo de usuários.');
    }

    $usuariosArray = json_decode($usuarios, true); // Converte para array
    if (!is_array($usuariosArray)) {
        $usuariosArray = array(); // Se o arquivo estiver vazio, inicializa o array
    }

    $idToUpdate = (int)$data['id']; // Assuming you will provide the 'id' of the user to update

    // Find the user with the given 'id' in the array
    $foundIndex = null;
    foreach ($usuariosArray as $index => $user) {
        if ((int)$user['id'] === $idToUpdate) {
            $foundIndex = $index;
            break;
        }
    }

    if ($foundIndex !== null) {
        // Update the 'email' and 'senha' fields if user is found
        $usuariosArray[$foundIndex]['email'] = base64_encode($data['email']);
        $usuariosArray[$foundIndex]['senha'] = base64_encode($data['senha']);

        $usuariosJson = json_encode($usuariosArray, JSON_PRETTY_PRINT); // Converte de volta para JSON
        if ($usuariosJson === false) {
            throw new Exception('Falha ao converter os dados para JSON.');
        }

        $result = file_put_contents('./../users.txt', $usuariosJson . PHP_EOL); // Escreve os dados atualizados no arquivo
        if ($result === false) {
            throw new Exception('Falha ao escrever no arquivo de usuários.');
        }

        $response = array(
            'success' => true,
            'message' => 'Dados atualizados com sucesso!'
        );
    } else {
        $response = array(
            'success' => false,
            'message' => 'Usuário não encontrado. Nenhum dado foi atualizado.'
        );
    }
} catch (Exception $e) {
    $response = array(
        'success' => false,
        'message' => 'Ocorreu um erro ao processar a solicitação: ' . $e->getMessage()
    );
}

header('Content-Type: application/json');
echo json_encode($response);

?>
