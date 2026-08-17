<?php

require __DIR__ . '/../../vendor/autoload.php';

use Fernandoteffelen\PhpTeste\Controller\FileController;

$controller = new FileController();

header('Content-Type: application/json');

echo json_encode($controller->listar());