<!-- app/views/livro/editar.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/public/css/styles.css">
    <title>Editar Livro</title>
</head>
<body>
    <h1>Editar Livro</h1>

    <?php if ($livro): ?>
        <form method="post" action="">
            <label for="novo_titulo">Novo Título:</label>
            <input type="text" id="novo_titulo" name="novo_titulo" value="<?php echo $livro['titulo']; ?>" required>

            <br>

            <label for="novo_autor">Novo Autor:</label>
            <input type="text" id="novo_autor" name="novo_autor" value="<?php echo $livro['autor']; ?>" required>

            <br>

            <label for="novo_ano_publicacao">Novo Ano de Publicação:</label>
            <input type="text" id="novo_ano_publicacao" name="novo_ano_publicacao" value="<?php echo $livro['ano_publicacao']; ?>" required>

            <br>

            <button type="submit">Salvar Edição</button>
        </form>
    <?php else: ?>
        <p>Livro não encontrado ou ocorreu um erro.</p>
    <?php endif; ?>
</body>
</html>
