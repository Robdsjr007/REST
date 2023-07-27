<?php
// Verifica se a requisição é do tipo DELETE
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Lê o corpo da requisição como JSON
    $data = json_decode(file_get_contents('php://input'), true);

    // Verifica se o parâmetro "usuario" foi fornecido
    if (isset($data['usuario'])) {
        $usuarioParaExcluir = $data['usuario'];

        // Caminho para o arquivo de texto onde os usuários são armazenados
        $caminhoArquivo = '../../users.txt';

        // Lê todos os usuários do arquivo de texto
        $usuarios = file($caminhoArquivo, FILE_IGNORE_NEW_LINES);

        // Procura o usuário para exclusão no array
        $indiceUsuario = array_search($usuarioParaExcluir, $usuarios);

        // Se o usuário for encontrado, remove-o do array
        if ($indiceUsuario !== false) {
            unset($usuarios[$indiceUsuario]);

            // Reescreve o arquivo com os usuários restantes
            file_put_contents($caminhoArquivo, implode("\n", $usuarios));

            // Responde com uma mensagem de sucesso
            $response = array('message' => 'Usuário excluído com sucesso.');
            echo json_encode($response);
            http_response_code(200);
        } else {
            // Responde com uma mensagem de erro caso o usuário não seja encontrado
            $response = array('message' => 'Usuário não encontrado.');
            echo json_encode($response);
            http_response_code(404);
        }
    } else {
        // Responde com uma mensagem de erro caso o parâmetro "usuario" não seja fornecido
        $response = array('message' => 'O parâmetro "usuario" é obrigatório.');
        echo json_encode($response);
        http_response_code(400);
    }
} else {
    // Responde com um erro caso o método da requisição não seja DELETE
    http_response_code(405);
}
?>
