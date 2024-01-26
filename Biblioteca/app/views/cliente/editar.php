<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/public/css/styles.css">
    <title>Editar Cliente</title>
</head>
<body>
    <h1>Editar Cliente</h1>

    <?php if ($cliente): ?>
        <form method="post" action="">
            <label for="novo_nome">Novo Nome:</label>
            <input type="text" id="novo_nome" name="novo_nome" value="<?php echo $cliente['nome']; ?>" required>

            <br>

            <label for="novo_email">Novo Email:</label>
            <input type="email" id="novo_email" name="novo_email" value="<?php echo $cliente['email']; ?>" required>

            <br>

            <button type="submit">Salvar Edição</button>
        </form>
    <?php else: ?>
        <p>Cliente não encontrado ou ocorreu um erro.</p>
    <?php endif; ?>
</body>
</html>
