<?php
$titulo="Backend Netflix";
include_once(DIRECTORIO_TEMPLATE_BACKEND."head.php");
include_once(DIRECTORIO_TEMPLATE_BACKEND."hamburger.php");
include_once(DIRECTORIO_TEMPLATE_BACKEND."header.php");
include_once(DIRECTORIO_TEMPLATE_BACKEND."aside.php");
$tituloSeccion="Modificar Usuario";
include_once(DIRECTORIO_TEMPLATE_BACKEND."main.php");
?>

        <div class="mb-3">
            <label for="inputUsername" class="form-label">Nombre de usuario</label>
            <input type="text" class="form-control" id="inputUsername" name="username" value="<?=$usuario->getUsername()?>">

        </div>
        <div class="mb-3">
            <label for="inputPassword" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="inputPassword" name="password" value="<?=$usuario->getPassword()?>">
        </div>
        <div class="mb-3">
            <label for="inputEmail" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="inputEmail" name="email" value="<?=$usuario->getEmail()?>">
        </div>

        <button type="button" class="btn btn-primary" onclick="peticioPUT()">Modificar Usuario</button>
        <button type="button" class="btn btn-primary btn-danger" onclick="peticioDELETE()">Borrar Usuario</button>

        <script>

            function peticioPUT(){

                let username = document.getElementById('inputUsername');
                let password = document.getElementById('inputPassword');
                let email = document.getElementById('inputEmail');

                const myHeaders = new Headers();
                myHeaders.append("Content-Type", "application/json");

                const raw = JSON.stringify({
                    "username": username.value,
                    "password": password.value,
                    "email": email.value
                });

                const requestOptions = {
                    method: "PUT",
                    headers: myHeaders,
                    body: raw,
                    redirect: "follow"
                };

                fetch("http://localhost:8080/user/<?=$usuario->getUuid()?>", requestOptions)
                    .then((response) => response.text())
                    .then((result) => console.log(result))
                    .catch((error) => console.error(error));


            }

            function volverAUsuarios{
                window.location.replace("http://localhost:8080/user")
            }




        </script>

<?php
include_once(DIRECTORIO_TEMPLATE_BACKEND."footer.php");


