# MVP-MinIO

MVP desenvolvido para gerenciamento de arquivos utilizando **PHP + MinIO**, com MinIO executado através do **Docker**.

## 🚀 Tecnologias

* PHP
* Composer
* AWS SDK for PHP
* MinIO
* Docker
* Docker Compose
* HTML, CSS e JavaScript

## 📌 Funcionalidades

* Upload de arquivos
* Listagem de arquivos
* Download de arquivos
* Exclusão de arquivos
* Armazenamento no MinIO

## ▶️ Como executar

### 1. Inicie o MinIO

Na raiz do projeto:

```bash
docker compose up -d
```

Acesse o painel do MinIO:

```text
http://localhost:9001
```

Credenciais de desenvolvimento:

```text
Usuário: admin
Senha: minio123
```

### 2. Instale as dependências

```bash
cd php-teste
composer install
```

### 3. Execute a aplicação

```bash
php -S localhost:8000 -t public
```

Acesse:

```text
http://localhost:8000
```

## 📂 Estrutura

```text
MVP-MinIO/
├── php-teste/
│   ├── public/
│   ├── src/
│   ├── composer.json
│   └── composer.lock
├── docker-compose.yml
└── .gitignore
```

## 🎯 Objetivo

Projeto desenvolvido para estudo e demonstração da integração entre **PHP e MinIO**, utilizando o **AWS SDK for PHP** para gerenciamento de arquivos.
