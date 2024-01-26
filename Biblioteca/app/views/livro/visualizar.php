<!-- app/views/livro/visualizar.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/public/css/styles.css">
    <title>Visualizar Livro</title>
</head>
<body>
    <h1>Visualizar Livro</h1>

    <?php if ($livro): ?>
        <p>ID: <?php echo $livro['id']; ?></p>
        <p>Título: <?php echo $livro['titulo']; ?></p>
        <p>Autor: <?php echo $livro['autor']; ?></p>
        <p>Ano de Publicação: <?php echo $livro['ano_publicacao']; ?></p>
    <?php else: ?>
        <p>Livro não encontrado ou ocorreu um erro.</p>
    <?php endif; ?>
</body>
</html>
