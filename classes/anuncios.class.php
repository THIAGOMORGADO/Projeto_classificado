<?php
class Anuncio {
    public function getMeuAnuncios() {
        global $pdo;
        $array = array();
        $sql = $pdo->prepare("SELECT *, (SELECT anuncio_imagens.url from anuncios_imagens where anuncios_imagens.id_anuncio = anuncios.id limit 1 as) as url FROM anuncios WHERE id = :id_usuario");
        $sql->bindValue(":id_usuario", $_SESSION['cLogin']);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $array = $sql->fetchall();
        }
        return $array;
    }
}

