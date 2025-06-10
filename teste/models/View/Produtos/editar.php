<h1>Editar Produtos</h1>
<form method="POST">
    Nome: <input type="text" name="nome" value="<?= $prod['nome'] ?>"><br>
    Preço: <input type="text" name="preco" value="<?= $prod['preco'] ?>"><br>
    Descrição: <textarea name="descricao"><?= $prod['descricao'] ?></textarea><br>
    Imagem: <input type="text" name="imagem" value="<?= $prod['imagem'] ?>"><br>
    <button type="submit">Atualizar</button>
</form>