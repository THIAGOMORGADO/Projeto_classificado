<?php require 'config.php';?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>

</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
           <div class="navbar-header">
              <a href="./" class="navbar-brand">Classificados</a> 
           </div>
            <ul class="nav navbar-nav navbar-right">
                <?php if (isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])): ?>

                    <li><a href="./"><?php echo $_SESSION['NomeDeUsuario'];?></a></li>
                    <li><a href="Meu-anuncios.php">Anuncios</a></li>
                    <li><a href="sair.php">Sair</a></li>
                <?php else: ?>
                    <li><a href="cadastrese.php">Cadastre-se</a></li>
                    <li><a href="login.php">Login</a></li>
                <?php endif; ?>

            </ul>
        </div>
    </nav>