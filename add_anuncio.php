<?php require 'page/header.php'; ?>
<?php
if(empty($_SESSION['cLogin'])){
    ?>
    <script type="text/javascript">window.location.href="login.php";</script>
    <?php
}
require 'classes/anuncios.class.php';
$a = new Anuncio();
if (isset($_POST['titulo']) && !empty($_POST['titulo'])) {
    $titulo = addslashes($_POST['titulo']);
    $categoria =  addslashes($_POST['categoria']);
    $valor =  addslashes($_POST['valor']);
    $descricao =  addslashes($_POST['descricao']);
    $estado =  addslashes($_POST['estado']);
    $a->addAnuncio($titulo,$categoria,$valor,$descricao,$estado);
    ?>
    <div class="alert alert-success">
        <strong>produto adicionado com sucesso....!<strong>
    </div>
    <?php
}
?>
<div class="container">
    <h1>Meus Anuncios - adicionar-anuncio</h1>
    <form method="POST" ecrtype="multipart/form-data">
        <div class="form-group">
            <label for="Catetoria">Categorias:</label>
            <select name="categoria" id="categoria" class="form-control">
                <?php 
                    require 'classes/categoria.class.php'; 
                    $c = new Categorias();
                    $cats = $c->getLista();
                    foreach($cats as $cat):
                ?>
                <option value="<?php echo $cat['id']; ?>"><?php echo $cat['nome']; ?></option>
                <?php
                    endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Digite o titulo..?">
        </div>
        <div class="form-group">
            <label for="Valor">Valor:</label>
            <input type="text" name="valor" id="valor" class="form-control" placeholder="Digite o Valor..?">
        </div>
        <div class="form-group">
            <label for="descrição">Descrição:</label>
            <textarea class="from-control" name="descricao"></textarea>
        </div>
        <div class="form-group">
            <label for="estado">Estado:</label>
            <select name="estado" id="estado" class="form-control">
                <option value="0">Ruim</option>
                <option value="1">Bom</option>
                <option value="2">Otimo</option>
            </select>
        </div>
        <input type="submit" value="Adicionar" class="btn btn-default"/>
    </form>
</div>

<?php require 'page/footer.php'; ?>