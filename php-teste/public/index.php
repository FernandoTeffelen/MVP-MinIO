<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style.css">

    <title>MinIO - Gerenciador de Arquivos</title>
</head>

<body>

    <h1>Gerenciador de Arquivos</h1>

    <h2>Enviar arquivo</h2>

    <form id="form-upload">
        <input type="file" id="arquivo" name="arquivo" required>
        <button type="submit">Enviar</button>
    </form>

    <p id="mensagem"></p>

    <h2>Arquivos</h2>

    <label for="filtro">Filtrar:</label>

    <select id="filtro">
        <option value="todos">Todos</option>
        <option value="pdf">PDF</option>
        <option value="jpg">JPG</option>
        <option value="png">PNG</option>
        <option value="xlsx">XLSX</option>
    </select>

    <table>
        <thead>
            <tr>
                <th>Arquivo</th>
                <th>Tipo</th>
                <th>Bucket</th>
                <th>Ação</th>
            </tr>
        </thead>

        <tbody id="lista-arquivos"></tbody>
    </table>

    <script src="js/app.js"></script>

</body>
</html>