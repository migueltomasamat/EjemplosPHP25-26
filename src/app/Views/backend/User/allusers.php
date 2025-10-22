<?php
$titulo="Backend Netflix";
include_once("template/head.php");
include_once("template/hamburger.php");
include_once("template/header.php");
include_once("template/aside.php");
$tituloSeccion="Todos los usuarios";
include_once("template/main.php");
?>
<div class="row">
<?php
    foreach($usuarios as $usuario){
?>
    <div class="card" style="width: 18rem;">
        <img src="admin/views/template/img/user.png" class="card-img-top" alt="...">
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
<?php
include_once("template/footer.php");


