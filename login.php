<?php require 'page/header.php'?>

<div class="container">
    <h1>Login</h1>
    <?php
    require 'classes/usuarios.class.php';
    $u = new Usuarios();
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = addslashes($_POST['email']);
        $senha = $_POST['senha'];

        if ($u->login($email, $senha)) {
            ?>
            <script type="text/javascript">window.location.href="./"</script>
            <?php
        } else {
           ?>
           <div class="alert alert-danger">
               Usuario ou senha invalidos
           </div>
           <?php 
        }
    }
    ?>
<hr/>
    <form method="POST">
        
        <div class="form-group">
            <label for="nome">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="digite seu email ?"/>
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" class="form-control" placeholder="digite sua senha ?"/>
        </div>
        
        <input type="submit" value="Fazer Login" class="btn btn-success" />
    </form>
</div>
<?php require 'page/footer.php' ?>