<?php
$titulo="Backend Netflix";
include_once(DIRECTORIO_TEMPLATE_BACKEND."head.php");
include_once(DIRECTORIO_TEMPLATE_BACKEND."hamburger.php");
include_once(DIRECTORIO_TEMPLATE_BACKEND."header.php");
include_once(DIRECTORIO_TEMPLATE_BACKEND."aside.php");
$tituloSeccion="Todos los usuarios";
include_once(DIRECTORIO_TEMPLATE_BACKEND."main.php");
?>
<div class="container">
<div class="row">
<?php
    foreach($usuarios as $usuario){
?>
    <div class="card m-1" style="width: 18rem;">
        <img src="<?=DIRECTORIO_IMG_BACKEND?>user.png" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?=$usuario->getUsername()?></h5>
            <p class="card-text"><?=$usuario->getEmail()?></p>
            <p class="card-text"><?=$usuario->getUuid()?></p>
            <a href="/user/<?=$usuario->getUuid()?>" class="btn btn-primary">Detalles</a>
        </div>
    </div>
<?php
    }
    ?>
    </div>
</div>
<?php
include_once(DIRECTORIO_TEMPLATE_BACKEND."footer.php");


