<?php
require_once 'app/models/Cliente.php';

$clienteModel = new Cliente($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $clienteModel->cadastrarCliente($conn);
    header("Location: /cliente/listar.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/public/css/styles.css">
    <title>Cadastrar Cliente</title>
</head>
<body>
    <h1>Cadastrar Cliente</h1>

    <!-- Formulário para cadastrar cliente -->
    <form method="post" action="">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>