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
                <td>
                <?php if(!empty($anuncio['url'])): ?>
				<img src="imagen/anuncio/<?php echo $anuncio['url']; ?>" height="50" border="0" />
				<?php else: ?>
                <img src="imagen/anuncio" height="50" border="0" />
				<?php endif; ?>
                </td>
                <td><?php echo $anuncio['titulo']; ?></td>
                <td>R$ <?php echo number_format($anuncio['valor'], 2); ?></td>
                <td>
                    <a href="editar-anuncio.php?id=<?php echo $anuncio['id']; ?>"class="btn btn-warning">Editar</a>
                    <a href="excluir-anuncio.php?id=<?php echo $anuncio['id']; ?>" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php require 'page/footer.php'; ?>