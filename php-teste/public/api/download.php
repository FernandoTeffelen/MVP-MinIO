<?php

require __DIR__ . '/../../vendor/autoload.php';

use Fernandoteffelen\PhpTeste\Controller\DownloadController;

$bucket = $_GET['bucket'] ?? null;
$arquivo = $_GET['arquivo'] ?? null;

if (!$bucket || !$arquivo) {
    http_response_code(400);

    echo json_encode([
        'erro' => 'Informe o bucket e o arquivo.'
    ]);

    exit;
}

$controller = new DownloadController();

$controller->baixar($bucket, $arquivo);