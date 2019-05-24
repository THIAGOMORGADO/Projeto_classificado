<?php
require 'config.php';
if(empty($_SESSION['cLogin'])){
    header("location: login.php");
    exit;
}

require 'classes/anuncios.class.php';
$a = new Anuncio();
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $a->excluirAnuncio($_GET['id']);
}
header("location: Meu-anuncios.php");