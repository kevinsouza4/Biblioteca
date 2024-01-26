<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/public/css/styles.css">
    <title>Editar Locação</title>
</head>
<body>
    <h1>Editar Locação</h1>

    <?php if ($locacao): ?>
        <form method="post" action="">
            <label for="id_cliente">ID Cliente:</label>
            <input type="text" id="id_cliente" name="id_cliente" value="<?php echo $locacao['id_cliente']; ?>" required>

            <br>

            <label for="id_livro">ID Livro:</label>
            <input type="text" id="id_livro" name="id_livro" value="<?php echo $locacao['id_livro']; ?>" required>

            <br>

            <label for="data_locacao">Data Locação:</label>
            <input type="date" id="data_locacao" name="data_locacao" value="<?php echo $locacao['data_locacao']; ?>" required>

            <br>

            <button type="submit">Salvar Edição</button>
        </form>
    <?php else: ?>
        <p>Locação não encontrada ou ocorreu um erro.</p>
    <?php endif; ?>
</body>
</html>
