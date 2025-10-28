<?php
$titulo="Backend Netflix";
include_once(DIRECTORIO_TEMPLATE_BACKEND."head.php");
include_once(DIRECTORIO_TEMPLATE_BACKEND."hamburger.php");
include_once(DIRECTORIO_TEMPLATE_BACKEND."header.php");
include_once(DIRECTORIO_TEMPLATE_BACKEND."aside.php");
$tituloSeccion="Crear Usuario";
include_once(DIRECTORIO_TEMPLATE_BACKEND."main.php");
?>
    <form action="/user" method="post">
        <div class="mb-3">
            <label for="inputUsername" class="form-label">Nombre de usuario</label>
            <input type="text" class="form-control" id="inputUsername" name="username">

        </div>
        <div class="mb-3">
            <label for="inputPassword" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="inputPassword" name="password">
        </div>
        <div class="mb-3">
            <label for="inputEmail" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="inputEmail" name="email">
        </div>

        <button type="submit" class="btn btn-primary">Crear Usuario</button>
    </form>
<?php
include_once(DIRECTORIO_TEMPLATE_BACKEND."footer.php");


