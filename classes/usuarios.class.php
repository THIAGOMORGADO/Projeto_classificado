<?php
class Usuarios {

    public function cadastra($nome, $email, $senha, $phone) {
        global $pdo;

        $sql = $pdo->prepare("SELECT ID FROM usuarios WHERE email = :email");
        $sql->bindValue(":email", $email);
        $sql->execute();
        
        if ($sql->rowCount() == 0 ){
            $sql = $pdo->prepare("INSERT INTO usuarios 
            SET nome = :nome, email = :email, senha = :senha, phone = :phone");
            $sql->bindValue(":nome", $nome);
            $sql->bindValue("email", $email);
            $sql->bindValue(":senha", md5($senha));
            $sql->bindValue(":phone", $phone);
            $sql->execute();
            return true;
        } else {
            return false;
        }
    }

    public function login ($email, $senha){
        global $pdo;

        $sql = $pdo->prepare("SELECT id, nome FROM usuarios WHERE email = :email AND senha  = :senha");
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", md5($senha));
        $sql->execute();

        if($sql->rowCount() > 0){
            $dado = $sql->fetch();
            $_SESSION['cLogin'] = $dado['id'];
            $_SESSION['NOmeDeUsuario'] = $dado['nome'];
//            var_dump($_SESSION['NOmeDeUsuario']); die();
          return true;
        } else {
            return false;
        }
    }
}
?>