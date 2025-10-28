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
    <ul class="list-group">
        <li class="list-group-item active" aria-current="true"><?=$usuario->getUsername()?></li>
        <li class="list-group-item"><?=$usuario->getPassword()?></li>
        <li class="list-group-item"><?=$usuario->getEmail()?></li>
        <li class="list-group-item"><?=$usuario->getId()?></li>
    </ul>
</div>
<?php
include_once(DIRECTORIO_TEMPLATE_BACKEND."footer.php");


