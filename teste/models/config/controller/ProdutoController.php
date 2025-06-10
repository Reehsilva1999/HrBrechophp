<?php
require_once "conexao.php";
require_once "model/Produto.php";

$produto = new Produtos($pdo);
$acao = $_GET['acao'] ?? 'listar';

switch ($acao) {
    case 'listar':
        $produtos = $produto->listar();
        include "view/produtos/listar.php";
        break;

        case 'cadastrar':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $produto->cadastrar($_POST['nome'], $_POST['preco'], $_POST['descricao'], $_POST['imagem']);
                header("Location: ProdutoController.php");
            } else {
                include "view/Produtos/Cadastrar.php";
            }
            break;

        case 'editar':
            $id = $_GET['id'];
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $produto->atualizar($id, $_POST['nome'], $_POST['preco'], $_POST['descricao'], $_POST['imagem']);
                header("Location: ProdutoController.php");
            }else{
                $prod = $produto->buscar($id);
                include "view/produtos/editar.php";
            }

            break;

            case 'excluir':
                $produto->deletar($_GET['id']);
                header("Location: ProdutoController.php");
        
}
?>