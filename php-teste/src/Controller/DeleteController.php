<?php

namespace Fernandoteffelen\PhpTeste\Controller;

use Fernandoteffelen\PhpTeste\Service\MinioService;

class DeleteController
{
    private MinioService $minio;

    public function __construct()
    {
        $this->minio = new MinioService();
    }

    public function excluir(string $bucket, string $arquivo): void
    {
        $this->minio->excluir($bucket, $arquivo);
    }
}