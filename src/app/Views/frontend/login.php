<htlm>
    <head>
        <title>Iniciar Sesión</title>
    </head>
    <body>

    <h1>Bienvenido a Netflix</h1>
    <form action="/user/login" method="post">
        <label for="inputUsername">Nombre de Usuario</label>
        <input type="text" id="inputUsername" name="username" placeholder="Introduce tu usuario" aria-label="Input de Username">

        <label for="inputPassword">Introduce tu contraseña</label>
        <input type="password" id="inputPassword" name="password" placeholder="Introduce tu contraseña" aria-label="Input de Password">

        <input type="submit" value="Iniciar Sesión">

    </form>


    </body>

</htlm>