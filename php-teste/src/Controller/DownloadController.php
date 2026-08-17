<?php

namespace Fernandoteffelen\PhpTeste\Controller;

use Fernandoteffelen\PhpTeste\Service\MinioService;

class DownloadController
{
    private MinioService $minio;

    public function __construct()
    {
        $this->minio = new MinioService();
    }

    public function baixar(string $bucket, string $arquivo): void
    {
        $arquivoTemporario = tempnam(sys_get_temp_dir(), 'minio_');

        $this->minio->download(
            $bucket,
            $arquivo,
            $arquivoTemporario
        );

        header('Content-Disposition: attachment; filename="' . basename($arquivo) . '"');
        header('Content-Type: application/octet-stream');
        header('Content-Length: ' . filesize($arquivoTemporario));

        readfile($arquivoTemporario);

        unlink($arquivoTemporario);
    }
}