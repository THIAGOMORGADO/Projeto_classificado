<?php require 'pages/header.php'?>
<div class="container">
    <h1>Cadastra-se</h1>
    <?php
    require 'classes/usuario.class.php';
    $u = new Usuario();
    if(isset($_POST['nome']) && !empty($_POST['nome'])){
            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $senha = md5($_POST['senha']);
            $telefone = addslashes($_POST['telefone']);

        if(!empty($nome) && !empty($email) && !empty($senha)) {
            $u->cadastra($nome, $email, $senha, $telefone);
         
        } else {
            ?>
                <div class="alert alert-danger">
                    <p>Preencha os campos</p>
                </div>
            <?php
        }   
    } 
    ?>
    <form method="POST">
        <div class="from-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control"/>
        </div>
        <div class="from-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" class="form-control"/>
        </div>
        <div class="from-group">
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" class="form-control"/>
        </div>
        <div class="from-group">
            <label for="telefone">Telefone</label>
            <input type="phone" name="telefone" id="telefone" class="form-control"/>
        </div>
        <input type="submit" value="Cadastrar" class="btn btn-default">
    </form>
</div>
<?php require 'pages/footer.php'?>