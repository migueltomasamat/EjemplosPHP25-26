<?php

declare(strict_types=1);

const SOLO_NUMEROS = 1;
const NUMEROS_LETRAS =2;

    function generatePassword(int $caracteres,int $condiciones=NUMEROS_LETRAS):string|int|null{

        return "Tu contraseña de $caracteres caracteres es:";
    }


    function ejemploParametros(string $mensaje,int $numero1=6){

    }

    function ejemploParametrosVariables (...$parametros){

    };

    ejemploParametrosVariables(15,266,"HOLA");
    ejemploParametros("Hola");
    generatePassword(16,NUMEROS_LETRAS);