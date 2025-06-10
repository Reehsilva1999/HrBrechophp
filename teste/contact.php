<?php include('includes/header.php'); ?>

<link rel="stylesheet" href="index.css">

<header>
<img src="./img/terceira.lpg.jpg"></img>
</header>

<main>
    <section class="Contatos">
        <h2>Fale com a gente e tire suas duvidas</h2>

        <?php
        $erro = "";
        $sucesso = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $telefone = trim($_POST["telefone"]);
            $email = trim($_POST["email"]);
            $mensagem = trim($_POST["mensagem"]);

         if(empty($telefone) || empty($email) || empty($mensagem)) {
            $erro = "Por favor, preencha todos os  campos!";
         } else {
            $dominiosPermitidos = ['gmail.com', 'hotmail.com', 'outlook.com', 'yahoo.com'];
            $dominioemail = explode('@', $email)[1] ?? '';

            if(!in_array($dominioemail, $dominiosPermitidos)){
                $erro = "Por favor, informe um e-mail  válido (gmail, hotmail, outlook ou yahoo), obrigada!";
            } else {
                $sucesso = "Obrigado! Recebemos sua mensagem, em breve entraremos em contato pelo telefone: $telefone.";
                header("Location: obigado.php");
                exit();
            }
           
         }
            
        }

        if (!empty($erro)) {
            echo "<p class='erro>$erro</p>";
        }
        ?>

    
        <form action="contact.php" method="post">
            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" required placeholder="(99) 99999-9999">
            

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>

            <label for="mensagem">Mensagem:</label>
            <textarea id="mensagem" name="mensagem" rows="10" required></textarea>

            <button type="submit">Enviar</button>

    </form>
    </section>
    </main>

    <?php include('includes/footer.php'); ?>






















