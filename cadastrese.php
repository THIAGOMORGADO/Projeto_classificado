<?php require 'page/header.php'?>

<div class="container">
    <h1>Cadastre-se</h1>
    <?php
    require 'classes/usuarios.class.php';
    $u = new Usuarios();
    if (isset($_POST['nome']) && !empty($_POST['nome'])) {
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $senha = $_POST['senha'];
        $phone = addslashes($_POST['phone']);

        if (!empty($nome) && !empty($email)  && !empty($senha)) {
            if($u->cadastra($nome, $email, $senha, $phone)){
            ?>
                <div class="alert alert-success">
                    <strong>Parabens!</strong>Cadastrado com sucesso.
                    <a href="login.php" class="alert-link">Faça seu Login]</a>
                </div>
            <?php  
            } else {
            ?>
                <div class="alert alert-danger">
                   Este Usuario ja existe
                   <a href="login.php" class="alert-link">Faça seu Login agora</a>
                </div>
            <?php  
            }
        } else {
            ?>
                <div class="alert alert-warning">
                preencha todos os campos
                 </div>
            <?php
        }
        
    }
    ?>
<hr/>
    <form method="POST">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" placeholder="digite seu nome ?"/>
        </div>
        <div class="form-group">
            <label for="nome">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="digite seu email ?"/>
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" class="form-control" placeholder="digite sua senha ?"/>
        </div>
        <div class="form-group">
            <label for="phone">Telefone</label>
            <input type="phone" name="phone" id="phone" class="form-control" placeholder="digite seu telefone?"/>
        </div>
        <input type="submit" value="Cadastra-se" class="btn btn-success" />
    </form>
</div>
<?php require 'page/footer.php' ?>