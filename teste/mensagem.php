<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="css/style.css">

<header>
<img src="./img/terceira.lpg.jpg"></img>
</header>

<main class="mensagem">

<h2>Deixe seu feedback</h2>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST["nome"]);
    $email = htmlspecialchars($_POST["email"]);
    $avalicao = $_POST["avaliacao"];
    $comentario = htmlspecialchars($_POST["comentario"]);

    if (empty($nome) || empty($email) || empty($avaliacao) || empty($comentario)) {
        echo "<p class='erro'>Por favor, preencha todos os campos!</p>";

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
echo "<p class='erro'>Informe um e-mail válido.</p>";
    } else {
        echo "<p class='sucesso'>Obrigada pelo seu feedback, $nome! </p>";
    }
}
?>

<form method="POST" action="mensagem.php">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" required>

    <label for="email">E-mail:</label>
    <input type="email" name="email" required>

    <label for="avaliacao">Avaliação:</label>
    <select name="avaliacao" required>
    <option value="">Escolha uma nota</option>
            <option value="1">⭐</option>
            <option value="2">⭐⭐</option>
            <option value="3">⭐⭐⭐</option>
            <option value="4">⭐⭐⭐⭐</option>
            <option value="5">⭐⭐⭐⭐⭐</option>
</select>

<label for="comentario">Comentário:</label>
<textarea name="comentario" rows="5" required></textarea>

</form>
<?php include('includes/footer.php'); ?>