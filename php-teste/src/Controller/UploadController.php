<?php

namespace Fernandoteffelen\PhpTeste\Controller;

use Fernandoteffelen\PhpTeste\Service\MinioService;

class UploadController
{
    private MinioService $minio;

    public function __construct()
    {
        $this->minio = new MinioService();
    }

    public function upload(array $arquivo): array
    {
        if (!isset($arquivo['tmp_name']) || $arquivo['error'] !== UPLOAD_ERR_OK) {
            throw new \Exception('Erro ao enviar o arquivo.');
        }

        $nome = basename($arquivo['name']);
        $extensao = strtolower(pathinfo($nome, PATHINFO_EXTENSION));

        $bucketsPermitidos = [
            'pdf',
            'jpg',
            'png',
            'xlsx',
        ];

        if (!in_array($extensao, $bucketsPermitidos)) {
            throw new \Exception('Tipo de arquivo não permitido.');
        }

        $this->minio->upload(
            $extensao,
            $nome,
            $arquivo['tmp_name']
        );

        return [
            'sucesso' => true,
            'nome' => $nome,
            'bucket' => $extensao,
        ];
    }
}