<!-- app/views/livro/listar.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/public/css/styles.css">
    <title>Listar Livros</title>
</head>
<body>
    <h1>Listar Livros</h1>
    
    <!-- Tabela para listar livros -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Ano de Publicação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($livros as $livro): ?>
                <tr>
                    <td><?php echo $livro['id']; ?></td>
                    <td><?php echo $livro['titulo']; ?></td>
                    <td><?php echo $livro['autor']; ?></td>
                    <td><?php echo $livro['ano_publicacao']; ?></td>
                    <td>
                        <a href="/livro/index.php?operation=visualizar&entity=livro&id=<?php echo $livro['id']; ?>">Visualizar</a>
                        <a href="/livro/index.php?operation=editar&entity=livro&id=<?php echo $livro['id']; ?>">Editar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
