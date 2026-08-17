<?php

require __DIR__ . '/../../vendor/autoload.php';

use Fernandoteffelen\PhpTeste\Controller\DeleteController;

header('Content-Type: application/json');

try {
    $bucket = $_POST['bucket'] ?? null;
    $arquivo = $_POST['arquivo'] ?? null;

    if (!$bucket || !$arquivo) {
        http_response_code(400);

        echo json_encode([
            'erro' => 'Informe o bucket e o arquivo.'
        ]);

        exit;
    }

    $controller = new DeleteController();

    $controller->excluir($bucket, $arquivo);

    echo json_encode([
        'sucesso' => true,
        'mensagem' => 'Arquivo excluído com sucesso.'
    ]);

} catch (\Exception $e) {
    http_response_code(500);

    echo json_encode([
        'erro' => 'Erro ao excluir arquivo.'
    ]);
}