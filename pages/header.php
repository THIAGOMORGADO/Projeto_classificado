<?php
require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Classificados</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/bootstrap.min">
        <link rel="stylesheet" href="assets/css/estilo.css">
        <script type="text/javascript" src="assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/script.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="./" class="navbar-brand">Classificados</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <?php if(isset($_SESSION['clogin']) && !empty($_SESSION['clogin'])): ?>
                        <li><a href="meusanuncios.php">Meu Anuncio</a></li>
                        <li><a href="sair.php">Sair</a></li>
                    <?php else: ?> 
                        <li><a href="cadastra-se.php ">Cadastra-se</a></li>
                        <li><a href="login.php">login</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>