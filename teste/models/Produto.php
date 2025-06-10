<?php
class Produto {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function listar() {
        $sql = "SELECT * FROM produtos";
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscar($id) {
        $sql = "SELECT * FROM produtos WHERE id = ?";
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function cadastrar($nome, $preco, $descricao, $imagem) {
        $sql = "INSERT INTO produtos (nome, preco, descricao, imagem) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nome, $preco, $descricao, $imagem]);
    }

    public function atualizar($id, $nome, $preco, $descricao, $imagem) {
    $sql = "UPDATE produtos SET nome=?,  preco=?, descricao=?, imagem=? WHERE id=?";
    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute([$nome, $preco, $descricao, $imagem, $id]);
   }

   public function deletar($id) {
    $sql = "DELETE FROM produtos WHERE id = ?";
    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute([$id]);
   }
}
?>