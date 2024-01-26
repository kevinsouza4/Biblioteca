<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/public/css/styles.css">
    <title>Página Inicial</title>
</head>
<body>

    <h1>Bem-vindo à Página Inicial</h1>

    <form action="index.php" method="GET">
        <label for="operation">Operação:</label>
        <select name="operation" id="operation">
            <option value="cadastrar">Cadastrar</option>
            <option value="listar">Listar</option>
        </select>

        <br>

        <label for="entity">Entidade:</label>
        <select name="entity" id="entity">
            <option value="livro">Livro</option>
            <option value="cliente">Cliente</option>
            <option value="locacao">Locação</option>
        </select>

        <br>

        <button type="submit">Executar</button>
    </form>

</body>
</html>
