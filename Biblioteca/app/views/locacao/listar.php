<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/public/css/styles.css">
    <title>Listar Locações</title>
</head>
<body>
    <h1>Listar Locações</h1>
    
    <!-- Tabela para listar locações -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Cliente</th>
                <th>ID Livro</th>
                <th>Data Locação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($locacoes as $locacao): ?>
                <tr>
                    <td><?php echo $locacao['id']; ?></td>
                    <td><?php echo $locacao['nome_cliente']; ?></td>
                    <td><?php echo $locacao['titulo_livro']; ?></td>
                    <td><?php echo $locacao['data_locacao']; ?></td>
                    <td>
                        <a href="/locacao/index.php?operation=visualizar&entity=locacao&id=<?php echo $locacao['id']; ?>">Visualizar</a>
                        <a href="/locacao/index.php?operation=editar&entity=locacao&id=<?php echo $locacao['id']; ?>">Editar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
