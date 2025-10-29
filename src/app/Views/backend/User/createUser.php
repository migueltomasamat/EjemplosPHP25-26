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
            <input type="text" class="form-control" id="inputUsername" name="username"
            <?php if(isset($resultado)) {echo "value=".$_POST['username']; }?>
            >

        </div>
        <div class="mb-3">
            <label for="inputPassword" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="inputPassword" name="password"
            <?php if(isset($resultado)) {echo "value=".$_POST['password']; }?>>
        </div>
        <div class="mb-3">
            <label for="inputEmail" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="inputEmail" name="email"
            <?php if(isset($resultado)) {echo "value=".$_POST['email']; }?>
            >
        </div>
        <div class="mb-3">
            <label for="inputEdad" class="form-label">Introduce tu edad</label>
            <input type="number" class="form-control" id="inputEdad" name="edad"
            <?php if(isset($resultado)) {echo "value=".$_POST['edad']; }?>
            >

        </div>
        <div class="mb-3">
            <select class="form-select" name="type" id="inputType">
                <option selected>Selecciona el tipo de usuario</option>
                <option value="Admin"
                <?php if(isset($resultado) && $_POST['type']=='Admin') {echo "selected";}?>
                >Administrador</option>
                <option value="normal"
                <?php if(isset($resultado) && $_POST['type']=='normal') {echo "selected";}?>
                >Normal</option>
                <option value="anuncios"
                <?php if(isset($resultado) && $_POST['type']=='anuncios') {echo "selected";}?>
                >Anuncios</option>
            </select>
        </div>

        <?php
        if(isset($resultado)){?>
            <div class="p-3 text-danger-emphasis bg-danger-subtle- border border-danger-subtle rounded-3">
                <?php foreach ($resultado as $error){ echo $error."</br>";} ?>
            </div>



        <?php }
        ?>

        <button type="submit" class="btn btn-primary">Crear Usuario</button>
    </form>
<?php
include_once(DIRECTORIO_TEMPLATE_BACKEND."footer.php");


