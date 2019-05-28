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
    if(isset($_FILES['fotos'])){
        $fotos = $_FILES['fotos'];
    }
    else{
        $fotos = array();
    }    
    $a->editAnuncio($titulo,$categoria,$valor,$descricao,$estado,$fotos,$_GET['id']);
    ?>
    <div class="alert alert-success">
        <strong>produto Editado com sucesso....!<strong>
    </div>
    <?php
}
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $info = $a->getAnuncio($_GET['id']);
}
else{
    ?>
    <script type="text/javascript">window.location.href="Meu-anuncio.php";</script>
    <?php 
}

?>
<div class="container">
    <h1>Editar meus-anuncio</h1>
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
                <option value="<?php echo $cat['id']; ?>"<?php echo ($info['id_categoria'] == $cat['id'])?'selected="selected"':'';?>><?php echo $cat['nome']; ?></option>
                <?php
                    endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo $info['titulo']?>" placeholder="Digite o titulo..?">
        </div>
        <div class="form-group">
            <label for="Valor">Valor:</label>
            <input type="text" name="valor" id="valor" class="form-control" value="<?php echo $info['valor']?>" placeholder="Digite o Valor..?">
        </div>
        <div class="form-group">
            <label for="descrição">Descrição:</label>
            <textarea class="from-control" name="descricao"><?php echo $info['descricao']?></textarea>
        </div>
        <div class="form-group">
            <label for="estado">Estado:</label>
            <select name="estado" id="estado" class="form-control">
                <option value="0"<?php echo ($info['estado'] == '0')?'selected="selected"':'';?>>Ruim</option>
                <option value="1" <?php echo ($info['estado'] == '1')?'selected="selected"':'';?>>Bom</option>
                <option value="2" <?php echo ($info['estado'] == '2')?'selected="selected"':'';?>>Otimo</option>
            </select>
        </div>
        <div class="form-group">
            <label for="add_foto">Fotos_produtos:</label>
            <input type="file" name="fotos[]" multiple/><br>
            <div class="panel panel-default">
                <div class="panel panel-default\">
                    <div class="panel panel-heading">Fotos do Anuncio</div>
                    <div class="panel panel-body">
                    
                    </div>
                </div>   
            </div>
        </div>
        <input type="submit" value="Salvar" class="btn btn-default"/>
    </form>
</div>

<?php require 'page/footer.php'; ?>