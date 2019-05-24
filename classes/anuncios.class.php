<?php
class Anuncio {
    public function getMeuAnuncios() {
        global $pdo;
        $array = array();
        $sql = $pdo->prepare("SELECT *,(select anuncios_imagens.url from anuncios_imagens where anuncios_imagens.id_anuncio = anuncio.id limit 1) as url FROM anuncio WHERE id_usuario = :id_usuario");
        $sql->bindValue(":id_usuario", $_SESSION['cLogin']);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $array = $sql->fetchall();
        }
        return $array;
    }
    public function addAnuncio($titulo,$categoria,$valor,$descricao,$estado){
        global $pdo;
        $sql =$pdo->prepare("INSERT INTO anuncio SET 
        titulo = :titulo, id_categoria = :id_categoria, id_usuario = :id_usuario, descricao = :descricao, valor = :valor, estado = :estado");
        $sql->bindValue(":titulo",$titulo);
        $sql->bindValue(":id_categoria",$categoria);
        $sql->bindValue(":id_usuario",$_SESSION['cLogin']);
        $sql->bindValue(":descricao",$descricao);
        $sql->bindValue(":valor",$valor);
        $sql->bindValue(":estado",$estado);
        $sql->execute();
    }
    public function excluirAnuncio($id){
        global $pdo;
        $sql = $pdo->prepare("DELETE FROM anuncios_imagens WHERE id_anuncio = :id_anuncio");
        $sql->bindValue(":id_anuncio", $id);
        $sql->execute();

        $sql = $pdo->prepare("DELETE FROM anuncio WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();


        

    }
    public function getAnuncio($id){
        $array = array();
        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM anuncio WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        return $array;
    }
    public function editAnuncio($titulo,$categoria,$valor,$descricao,$estado,$fotos, $id){
        global $pdo;
        $sql =$pdo->prepare("UPDATE anuncio SET 
        titulo = :titulo, id_categoria = :id_categoria, id_usuario = :id_usuario, descricao = :descricao, valor = :valor, estado = :estado WHERE id = :id");
        $sql->bindValue(":titulo",$titulo);
        $sql->bindValue(":id_categoria",$categoria);
        $sql->bindValue(":id_usuario",$_SESSION['cLogin']);
        $sql->bindValue(":descricao",$descricao);
        $sql->bindValue(":valor",$valor);
        $sql->bindValue(":estado",$estado);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if(count($fotos) > 0){
            print_r($fotos);
            exit;
        }
    }
}

