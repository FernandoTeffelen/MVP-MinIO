<?php

require __DIR__ . '/../../vendor/autoload.php';

use Fernandoteffelen\PhpTeste\Controller\UploadController;

header('Content-Type: application/json');

try {
    if (!isset($_FILES['arquivo'])) {
        http_response_code(400);

        echo json_encode([
            'erro' => 'Nenhum arquivo enviado.'
        ]);

        exit;
    }

    $controller = new UploadController();

    $resultado = $controller->upload($_FILES['arquivo']);

    echo json_encode($resultado);

} catch (\Exception $e) {
    http_response_code(400);

    echo json_encode([
        'erro' => $e->getMessage()
    ]);
}