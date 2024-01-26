<?php
require_once 'app/models/Livro.php';

$livroModel = new Livro($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $livroModel->cadastrarLivro($conn);
    header("Location: /livro/listar.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/public/css/styles.css">
    <title>Cadastrar Livro</title>
</head>
<body>
    <h1>Cadastrar Livro</h1>

    <!-- Formulário para cadastrar livro -->
    <form method="post" action="">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" required>

        <label for="autor">Autor:</label>
        <input type="text" name="autor" required>

        <label for="ano_publicacao">Ano de Publicação:</label>
        <input type="text" name="ano_publicacao" required>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
