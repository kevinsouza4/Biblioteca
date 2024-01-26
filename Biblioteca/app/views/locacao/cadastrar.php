<?php
require_once 'app/models/Locacao.php';

$locacaoModel = new Locacao($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $locacaoModel->cadastrarLocacao($conn);
    header("Location: /locacao/listar.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/public/css/styles.css">
    <title>Cadastrar Locação</title>
</head>
<body>
    <h1>Cadastrar Locação</h1>

    <!-- Formulário para cadastrar locação -->
    <form method="post" action="">
        <label for="id_cliente">ID Cliente:</label>
        <input type="text" name="id_cliente" required>

        <label for="id_livro">ID Livro:</label>
        <input type="text" name="id_livro" required>

        <label for="data_locacao">Data Locação:</label>
        <input type="text" name="data_locacao" required>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
