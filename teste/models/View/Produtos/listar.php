<h1>Produtos</h1>
<a href="ProdutoController.php?acao=cadastrar">Cadastrar Produtos</a>
<table border="1">
   <tr><th>ID</th><th>Nome</th><th>Preço</th><th>Ações</th></tr>
   <?php foreach ($produtos as $p): ?>
   <tr>
     <td><?= $p['id'] ?></td>
     <td><?= $p['nome'] ?></td>
     <td><?= $p['preco'] ?></td>
     <td>
        <a href="ProdutoController.php?acao=editar&id=<?= $p['id'] ?>">Editar</a> |
        <a href="ProdutoController.php?acao=excluir&id=<?= $p['id'] ?>" onclick="return confirm('Excluir?')</a>
        </td>
     </tr>
     <?php endforeach; ?>
     </table>