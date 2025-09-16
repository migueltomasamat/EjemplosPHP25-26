<?php

    //Mostrar texto por pantalla
    echo "Hola mundo";

    print ("Este es un mensaje que se muestra</br>");

    $mensaje="Este es un parrafo"
    ?>

<!-- Contenido en HTML -->
<p><?=$mensaje?></p>

<?php
//Definir una variable

    $variable1 = "Mensaje1";
    $variable2 = "Mensaje2";

    echo $variable1.$variable2;

    echo "<p style='background-color:red;color:blue;'>".$variable2." </p>";

    $variable2 = 1.0;

    echo $variable2."</br>";

    //Definir una constante

        const PI = 3.1415;

        $variable2++;

        echo PI*$variable2;

