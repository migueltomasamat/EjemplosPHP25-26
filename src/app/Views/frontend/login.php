<?php
$titulo = "Iniciar Sesión";
include DIRECTORIO_TEMPLATE_FRONTEND."head.php";
?>
<body>
    <div class="contenido">
      <nav>
        <img class="logo" src="<?=DIRECTORIO_IMG_FRONTEND?>logo.png" alt="netflixLogo" />
      </nav>
      <div class="caja">
        <h2>Iniciar sesión</h2>
          <form action="/user/login" method="post">
        <div class="form">
          <input
            type="text"
            placeholder="Correo electrónico o número de teléfono"
            name="username"
            required
            />
          <input type="password" placeholder="Contraseña"
                 name="password" required />
        </div>
        <button type="submit">Iniciar sesión</button>
        <div class="checkbox">
          <div class="recordar">
            <input type="checkbox" id="checkbox1"/>
            <label for="remember">Recuérdame</label>
          </div>
            </form>

          <div>
            <p>¿Necesitas ayuda?</p>
          </div>
        </div>
        <div class="subscripcion">
          <p>¿Todavía sin Netflix? <span>Subscríbete ya.</span></p>
          <p>Esta página utiliza Google reCAPTCHA para garantizar que no eres un robot.
            <br/> <br/> La información recopilada por Google reCAPTCHA está sujeta a la <a href="https://policies.google.com/privacy">Política de Privacidad</a>
y las <a href="https://policies.google.com/terms">Condiciones de servicio</a> de
          Google, y se utiliza para proporcionar, mantener y mejorar el servicio de reCAPTCHA, así como para fines generales de
          seguridad (Google no la utiliza para publicidad personalizada). </p>
        </div>
      </div>
    </div>
  </body>
<?php
include_once DIRECTORIO_TEMPLATE_FRONTEND."footer.php";