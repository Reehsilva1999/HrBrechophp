<?php include ('includes/header.php'); ?>

<header>
<img src="./img/terceira.lpg.jpg"></img>
</header>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $descricao = $_POST["descrição"];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p style='color: red;'>Por favor, informe um e-mail válido.</p>";
        exit;
    }

    if (empty($nome) || empty($telefone) || empty($email) || empty($descricao) || empty($_FILES["foto"]["name"])) {
        echo "<p style='color: red;'>Por favor, preencha todos os campos e envie a imagem.</p>";
        exit;
    }

    $to = "silvareeh33@gmail.com";
    $subject = "Nova roupa enviada por $nome";
    $message = "Nome: $nome\nTelefone: $telefone\nEmail: $email\nDescrição: $descricao";

    $fileTmPath = $_FILES["foto"]["tpm_name"];
    $fileName = $_FILES["foto"]["name"];
    $fileType = $_FILES["foto"]["type"];
    $fileContent = chunk_split(base64_encode(file_get_contents($fileTmPath)));

    $boundary = md5(time());

$headers = "From: $email\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: multipar/mixed; boundary=\"$boundary\"\r\n";

$body = "--$boundary\r\n";
$body .= "Content-Type: text/plain; charset=UTF-8\r\n\r\n";
$body .= "message\r\n";
$body .= "--$boundary\r\n";
$body .= "Content-Type: $fileType; name=\"$fileName\"\r\n";
$body .= "Content-Disposition: attachment; filename=\"$filename\"\r\n";
$body .= "Content-Transfer-Encoding: base64\r\n\r\n";
$body .= "$fileContent\r\n";
$body .= "--$boundary--";

if (mail($to, $subject, $body, $headers)) {
    echo "<p style='color: green;'>Obrigadda! Sua roupa foi enviada com sucesso.</p>";
} else {
    echo "<p style='color: red;'>Houve um erro ao enviar,  tente novamente.</p>";
}
}
?>


<h2>Garimpar roupa</h2>
<form method="POST" entype="multipart/form-data">
    <label for="nome">Nome:</label><br>
    <input type="text" name="nome" required><br><br>

    <label for="telefone">Telefone:</label><br>
    <input type="text" name="telefone" required><br><br>

    <label for="email">E-mail:</label><br>
    <input type="email" name="email" required><br><br>

    <label for="descricao">Descrição da roupa:</label><br>
    <textarea name="descricao" rows="4" required></textarea><br><br>

    <label for="foto">Enviar imagem:</label><br>
<input type="file" name="foto" accept="image/*" required><br><br>

<button type="submit">Enviar</button>
</form>

<?php('include/footer.php'); ?>















































