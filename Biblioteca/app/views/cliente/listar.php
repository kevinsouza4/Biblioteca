<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/public/css/styles.css">
    <title>Listar Clientes</title>
</head>
<body>
    <h1>Listar Clientes</h1>
    
    <!-- Tabela para listar clientes -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente): ?>
                <tr>
                    <td><?php echo $cliente['id']; ?></td>
                    <td><?php echo $cliente['nome']; ?></td>
                    <td><?php echo $cliente['email']; ?></td>
                    <td>
                    <a href="/Biblioteca/cliente/index.php?operation=visualizar&entity=cliente&id=<?php echo $cliente['id']; ?>">Visualizar</a>
                    <a href="/Biblioteca/cliente/index.php?operation=editar&entity=cliente&id=<?php echo $cliente['id']; ?>">Editar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
