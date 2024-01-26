<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/public/css/styles.css">
    <title>Visualizar Cliente</title>
</head>
<body>
    <h1>Visualizar Cliente</h1>

    <?php
    // Verificar se o ID foi passado na URL
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Lógica para exibir detalhes do Cliente com base no ID
        $cliente = $this->clienteModel->visualizarCliente($id);
        
        // Verificar se o cliente foi encontrado
        if ($cliente) {
            echo "<p>ID: " . $cliente['id'] . "</p>";
            echo "<p>Nome: " . $cliente['nome'] . "</p>";
            echo "<p>Email: " . $cliente['email'] . "</p>";
            // Adicione outros campos do cliente conforme necessário
        } else {
            echo "<p>Cliente não encontrado ou ocorreu um erro.</p>";
        }
    } else {
        echo "<p>ID não fornecido na URL.</p>";
    }
    ?>
</body>
</html>
