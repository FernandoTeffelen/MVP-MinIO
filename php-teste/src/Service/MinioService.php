<?php

namespace Fernandoteffelen\PhpTeste\Service;

use Aws\S3\S3Client;

class MinioService
{
    private S3Client $client;

    public function __construct()
    {
        $this->client = new S3Client([
            'version' => 'latest',
            'region' => 'us-east-1',
            'endpoint' => 'http://localhost:9000',
            'use_path_style_endpoint' => true,
            'credentials' => [
                'key' => 'admin',
                'secret' => 'minio123',
            ],
        ]);
    }

    public function upload(string $bucket, string $nome, string $caminho): void
    {
        $this->client->putObject([
            'Bucket' => $bucket,
            'Key' => $nome,
            'Body' => fopen($caminho, 'r'),
        ]);
    }

    public function listar(string $bucket): array
    {
        $resultado = $this->client->listObjectsV2([
            'Bucket' => $bucket,
        ]);

        return $resultado['Contents'] ?? [];
    }

    public function download(string $bucket, string $arquivo, string $destino): void
    {
        $this->client->getObject([
            'Bucket' => $bucket,
            'Key' => $arquivo,
            'SaveAs' => $destino,
        ]);
    }

    public function excluir(string $bucket, string $arquivo): void
    {
        $this->client->deleteObject([
            'Bucket' => $bucket,
            'Key' => $arquivo,
        ]);
    }
}