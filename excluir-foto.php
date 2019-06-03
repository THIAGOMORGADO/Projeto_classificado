<?php
require 'config.php';
if(empty($_SESSION['cLogin'])){
    header("location: login.php");
    exit;
}

require 'classes/anuncios.class.php';
$a = new Anuncio();
if (isset($_GET['id']) && !empty($_GET['id'])) {
   $id_anuncio = $a->excluirFoto($_GET['id']);
}
if(isset($id_anuncio)){
    header("location: editar-anuncio.php".$id_anuncio);
}
else{
header("location: Meu-anuncios.php");
}