<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="<?=DIRECTORIO_CSS_FRONTEND?>styleNew.css">
</head>
<body>

<div class="login-top">
    <img src="<?=DIRECTORIO_IMG_FRONTEND?>logo.png" alt="">
</div>

<div class="d-flex justify-content-center align-items-center" style="width: 100vw;">
    <section class="register-box">
        <h2 class="text-white">Datos del usuario <?=$_SESSION['user']->getUsername()?></h2>
        <form class="mt-4">
            <div class="mb-3 bg-white rounded px-2" >
                <label for="inputUsername" class="form-label small-text" >Nombre de usuario</label>
                <input type="text" class="form-control border-0 p-0" id="inputUsername" name="username"
                value="<?=$usuario->getUsername()?>">
            </div>
            <div class="mb-3 bg-white rounded px-2">
                <label for="inputPassword" class="form-label small-text">Contraseña</label>
                <input type="password" name="password" class="form-control border-0 p-0" id="inputPassword"
                value="<?=$usuario->getPassword()?>">
            </div>
            <div class="mb-3 bg-white rounded px-2">
                <label for="inputMail" class="form-label small-text">Correo electrónico</label>
                <input type="email" name="email" class="form-control border-0 p-0" id="inputMail"
                value="<?=$usuario->getEmail()?>">
            </div>
            <div class="mb-3 bg-white rounded px-2">
                <label for="inputAge" class="form-label small-text">Edad</label>
                <input type="int" name="edad" class="form-control border-0 p-0" id="inputAge"
                value="<?=$usuario->getEdad()?>">
            </div>
            <div class="mb-3 bg-white rounded px-2">
                <label for="inputType" class="form-label small-text">Tipo de usuario</label>
                <select class="form-select border-0 p-0 h-100" name="type" id="inputType">
                    <option selected>Selecciona el tipo de usuario</option>
                    <option value="Admin"
                            <?php if($usuario->getType()===\App\Enum\UserType::ADMIN) {echo "selected";}?>
                    >Administrador</option>
                    <option value="normal"
                            <?php if($usuario->getType()===\App\Enum\UserType::NORMAL) {echo "selected";}?>
                    >Normal</option>
                    <option value="anuncios"
                            <?php if($usuario->getType()===\App\Enum\UserType::ANUNCIOS) {echo "selected";}?>
                    >Anuncios</option>
                </select>
            </div>
            <div class="d-grid gap-2 d-md-block">
                <button type="button" class="btn btn-outline-primary mt-3" onclick="window.location.replace('http://localhost:8080/')">Modificar Usuario</button>
                <button type="button" class="btn btn-danger mt-3">Borrar Usuario</button>
            </div>
        </form>
    </section>
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
</body>
</html>