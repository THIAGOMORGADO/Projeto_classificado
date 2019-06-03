<?php require 'page/header.php'?>
<?php
require 'classes/anuncios.class.php';
require 'classes/usuarios.class.php';
$a = new Anuncio();
$u = new Usuarios();
$total_anuncios = $a->getTotalAnuncios();
$total_usuarios = $u->getTotalUsuarios();
$anuncios =  $a->getUltimosAnuncios();

?>
<div class="container-fluid">
        <div class="jumbotron">
            <h2>Nos temos hoje <?php echo $total_anuncios ?> anuncios....</h2>
            <p>E mais de <?php echo $total_usuarios ?> usuarios Cadastrados....</p>
        </div>
    <div class="container">
       <div class="row">
           <div class="col-sm-3">
               <h4>Pesquisa Avançanda</h4>
           </div>
           <div class="col-sm-9">
               <h4>Ultimos anuncios</h4>
               <table class="table table-striped">
                    <tbody>
                        <?php foreach($anuncios as $anuncio): ?>
                        <tr>
                            <td>
                                <?php if(!empty($anuncio['url'])): ?>
				                <img src="imagen/anuncio/<?php echo $anuncio['url']; ?>" height="50" border="0" />
				                <?php else: ?>
                                <img src="imagen/anuncio" height="50" border="0" />
				                <?php endif; ?>
                            </td>
                            <td>
                                <a href="produto.php?id=?php echo $anuncio['id'];?>"><?php echo $anuncio['titulo']; ?></a><br>
                                <?php echo $anuncio['categoria'];?>
                            </td>
                            <td>R$ <?php echo number_format($anuncio['valor'], 2); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
               </table>
           </div> 
        </div>
    </div>
</div>
<?php require 'page/footer.php'?>