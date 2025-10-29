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
    <div class="mb-3">
        <ul class="list-group">
            <li class="list-group-item active" aria-current="true"><?=$usuario->getUsername()?></li>
            <li class="list-group-item"><?=$usuario->getPassword()?></li>
            <li class="list-group-item"><?=$usuario->getEmail()?></li>
            <li class="list-group-item"><?=$usuario->getUuid()?></li>
        </ul>
    </div>


    <div class="mb-3">
        <div class="d-grid gap-2 d-md-block">
            <button class="btn btn-outline-dark" type="button" onclick="goToEditUser()">Modificar Usuario</button>
            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#ventanaModal">
                Borrar Usuario
            </button>
        </div>
    </div>


    <!--Creación de una ventana modal para el borrado del usuario-->

    <div class="modal" tabindex="-1" id="ventanaModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Borrar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Realmente desea usted borrar el usuario?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Me he acojonado</button>
                    <button type="button" class="btn btn-primary btn-danger" onclick="peticionDELETE()">Borrar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function goToEditUser(){
        window.location.replace("http://localhost:8080/user/<?=$usuario->getUuid()?>/edit");
        }

        function peticionDELETE(){
            const requestOptions = {
                method: "DELETE",
                redirect: "follow"
            };

            fetch("http://localhost:8080/user/<?=$usuario->getUuid()?>", requestOptions)
                .then((response) => response.text())
                .then((result) => goToUsers())
                .catch((error) => console.error(error));


        }

        function goToUsers(){
            window.location.replace("http://localhost:8080/user");
        }


    </script>
</div>
<?php
include_once(DIRECTORIO_TEMPLATE_BACKEND."footer.php");


