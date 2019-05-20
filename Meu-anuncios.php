<?php require 'page/header.php'; ?>
<?php
if(empty($_SESSION['cLogin'])){
    ?>
    <script type="text/javascript">window.location.href="login.php";</script>
    <?php
}
?>
<div class="container">
    <h1>Meu Anuncios</h1>
    <a href="add_anuncio.php" class="btn btn-danger">Adinionar novo anuncio</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Fotos</th>
                <th>Titutlo</th>
                <th>Valor</th>
                <th>Acoes</th>
            </tr>
        </thead>
        <?php
        require 'classes/anuncios.class.php';
        $a = new Anuncio();
        $anuncio = $a->getMeuAnuncios();
        foreach($anuncio as $anuncio):
        ?>
            <tr>
                <td><img src="imagens/anuncios/<?php echo $anuncio['url']; ?>" borde=""/></td>
                <td><?php echo $anuncio['titulo']; ?></td>
                <td>R$ <?php echo number_format($anuncio['valor'], 2); ?></td>
                <td></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php require 'page/footer.php'; ?>