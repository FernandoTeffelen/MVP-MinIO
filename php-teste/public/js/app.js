async function carregarArquivos() {
    const resposta = await fetch('api/files.php');
    const arquivos = await resposta.json();

    const tabela = document.getElementById('lista-arquivos');

    tabela.innerHTML = '';

    arquivos.forEach(arquivo => {
        const linha = document.createElement('tr');

        linha.innerHTML = `
        <td>${arquivo.nome}</td>
        <td>${arquivo.bucket.toUpperCase()}</td>
        <td>${arquivo.bucket}</td>
        <td>
            <button onclick="baixarArquivo('${arquivo.bucket}', '${arquivo.nome}')">
                Download
            </button>

            <button onclick="excluirArquivo('${arquivo.bucket}', '${arquivo.nome}')">
                Excluir
            </button>
        </td>
    `;

        tabela.appendChild(linha);
    });
}


async function enviarArquivo(event) {
    event.preventDefault();

    const input = document.getElementById('arquivo');
    const mensagem = document.getElementById('mensagem');

    if (!input.files.length) {
        return;
    }

    const formData = new FormData();

    formData.append('arquivo', input.files[0]);

    mensagem.textContent = 'Enviando...';

    const resposta = await fetch('api/upload.php', {
        method: 'POST',
        body: formData
    });

    const resultado = await resposta.json();

    if (resposta.ok) {
        mensagem.textContent = 'Arquivo enviado com sucesso!';

        input.value = '';

        await carregarArquivos();
    } else {
        mensagem.textContent = resultado.erro || 'Erro ao enviar arquivo.';
    }
}


function baixarArquivo(bucket, arquivo) {
    const url = `api/download.php?bucket=${encodeURIComponent(bucket)}&arquivo=${encodeURIComponent(arquivo)}`;

    window.location.href = url;
}


function filtrarArquivos() {
    const filtro = document.getElementById('filtro').value;

    const linhas = document.querySelectorAll('#lista-arquivos tr');

    linhas.forEach(linha => {
        const bucket = linha.children[2].textContent;

        if (filtro === 'todos' || bucket === filtro) {
            linha.style.display = '';
        } else {
            linha.style.display = 'none';
        }
    });
}

async function excluirArquivo(bucket, arquivo) {
    const confirmar = confirm(
        `Tem certeza que deseja excluir "${arquivo}"?`
    );

    if (!confirmar) {
        return;
    }

    const formData = new FormData();

    formData.append('bucket', bucket);
    formData.append('arquivo', arquivo);

    const resposta = await fetch('api/delete.php', {
        method: 'POST',
        body: formData
    });

    const resultado = await resposta.json();

    if (resposta.ok) {
        await carregarArquivos();
    } else {
        alert(resultado.erro || 'Erro ao excluir arquivo.');
    }
}

document
    .getElementById('form-upload')
    .addEventListener('submit', enviarArquivo);

document
    .getElementById('filtro')
    .addEventListener('change', filtrarArquivos);

carregarArquivos();