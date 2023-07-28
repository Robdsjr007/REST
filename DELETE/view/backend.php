<?php

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents('php://input'), true); // Recebe os dados do DELETE
    $id = $data['id']; // ID do usuário a ser excluído

// Valida se o ID foi fornecido
if (!isset($id)) {
    $response = array(
        'error' => 'ID do usuário não fornecido!'
    );

    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

// Lê o arquivo com os usuários cadastrados
$usuarios = file_get_contents('../../users.txt');
$usuariosArray = json_decode($usuarios, true);

$idToDelete = (int)$data['id']; 

    // Find the user with the given 'id' in the array
    $foundIndex = null;
    foreach ($usuariosArray as $index => $user) {
        if ((int)$user['id'] === $idToDelete) {
            $foundIndex = $index;
            break;
        }
    }
// Se o usuário foi encontrado, remove-o do array e atualiza o arquivo
if ($index !== -1) {
    array_splice($usuariosArray, $index, 1);

    $usuariosJson = json_encode($usuariosArray, JSON_PRETTY_PRINT) . PHP_EOL;
    file_put_contents('../../users.txt', $usuariosJson);

    $response = array(
        'message' => 'Usuário excluído com sucesso!'
    );

    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    $response = array(
        'error' => 'Usuário não encontrado!'
    );

    header('Content-Type: application/json');
    echo json_encode($response);
}
};

?>
