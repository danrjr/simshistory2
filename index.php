<?php 
require "./vendor/autoload.php";
use app\dao\HistoriaDAO;
$historias = new HistoriaDAO;
$pagina = 1;
if(isset($_GET['pagina'])){
    $pagina = addslashes($_GET['pagina']);

}
if(!$pagina){
    $pagina = 1;
}

$limite = 6;
$inicio = ($pagina * $limite) - $limite; 

$registros = $historias->countAllHistory();
foreach($registros as $r){
    $rollPaginas = ceil($r / $limite);
}

$paginas = $rollPaginas;

$resultado = $historias->getHistoryLimitSix($inicio, $limite);

?>
<?php include "templates/header.php"?>
<div class="below-header">
        <p>Ultimas Historias</p>
    </div>
    <?php foreach($resultado as $r): ?>
   <div class="historias">
        
        <div class="h-img">
                <img src="imagens/<?= $r['foto'] ?>" width="250px" height="180px" alt="">
            </div>
            <div class="h-conteudo">
                <p class="h-titulo"><?= $r['titulo'] ?></p>
                <p class="h-corpo"><?= strip_tags(str_replace("../", "",substr($r['corpo'], 0, 184))) . " ..." ?><p>
                <a href="historias/historia.php?id=<?= $r['id']?>"><button type="button">LEIA MAIS</button></a>
        </div>
    </div>
    <?php endforeach; ?>
    <div class="link-center">
             <a href="?pagina">Primeira Pagina</a>

            <?php if($pagina > 1): ?>
                <a href="?pagina=<?= $pagina - 1 ?>"><<</a>
            <?php endif; ?>
            
            <?php echo $pagina ?>

            <?php if($pagina < $paginas): ?>
            <a href="?pagina=<?= $pagina + 1 ?>">>></a>
            <?php endif; ?>

            <a href="?pagina=<?= $paginas ?>">Ultima Pagina</a>
        </div>
<?php include ("templates/footer.php") ?>

    
