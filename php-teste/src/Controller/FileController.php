<?php

namespace Fernandoteffelen\PhpTeste\Controller;

use Fernandoteffelen\PhpTeste\Service\MinioService;

class FileController
{
    private MinioService $minio;

    public function __construct()
    {
        $this->minio = new MinioService();
    }

    public function listar(): array
    {
        $buckets = ['pdf', 'jpg', 'png', 'xlsx'];

        $arquivos = [];

        foreach ($buckets as $bucket) {
            foreach ($this->minio->listar($bucket) as $objeto) {
                $arquivos[] = [
                    'nome' => $objeto['Key'],
                    'bucket' => $bucket,
                ];
            }
        }

        return $arquivos;
    }
}