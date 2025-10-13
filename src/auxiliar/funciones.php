<?php

declare(strict_types=1);

const SOLO_NUMEROS = 1;
const NUMEROS_LETRAS =2;

const ARRAY_LETRAS_DNI = ['T','R','W','A','G','M','Y','F','P','D','X',
    'B','N','J','Z','S','Q','V','H','L','C','K','E'];

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

    function calcularLetraDNI (int $numero):?string{
        $letra = $numero%23;
        return ARRAY_LETRAS_DNI[$letra];
    }


    function organizarImagen(array $datosImagen,string $tituloPelicula):string|bool{
        $carpetas=scandir(__DIR__);
        if (!array_search('uploaded',$carpetas)){
            mkdir(__DIR__."/uploaded");
            move_uploaded_file($datosImagen['tmp_name'],__DIR__."/uploaded/".$tituloPelicula."png");

        }else{
            move_uploaded_file($_FILES['poster']['tmp_name'],__DIR__."/uploaded/".$tituloPelicula."png");
        }


        return __DIR__."/uploaded/".$tituloPelicula."png";
    }