<?php

session_start();
include('includes/header.php');
?>

<link rel="stylesheet" href="index.css">

<main>
    <section class="contato">
        <?php
        if (isset($_SESSION['mensagem'])) {
            echo "<p class='sucesso'>" . $_SESSION['mensagem'] ."</p>";
            unset($SESSION['mensagem']);
        } else {
            echo "<p class='erro'>Você acessou esta página diretamente.</p>";
        }
        ?>
</session>
    </main>

    <?php include('includes/footer.php'); ?>























