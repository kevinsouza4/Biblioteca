<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/public/css/styles.css">
    <title>Visualizar Locação</title>
</head>
<body>
    <h1>Visualizar Locação</h1>

    <?php if ($locacao): ?>
        <ul>
            <li>ID: <?php echo $locacao['id']; ?></li>
            <li>ID Cliente: <?php echo $locacao['nome_cliente']; ?></li>
            <li>ID Livro: <?php echo $locacao['titulo_livro']; ?></li>
            <li>Data Locação: <?php echo $locacao['data_locacao']; ?></li>
        </ul>
    <?php else: ?>
        <p>Locação não encontrada ou ocorreu um erro.</p>
    <?php endif; ?>
</body>
</html>
