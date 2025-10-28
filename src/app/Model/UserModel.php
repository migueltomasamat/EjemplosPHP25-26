<?php

namespace App\Model;

use App\Class\User;
use Ramsey\Uuid\Uuid;

class UserModel
{

    public static function getAllUsers():array{

        $usuario1= new User(
            Uuid::uuid4(),
            "pabloM",
            "molbap",
            "pablom@mail.com"
        );
        $usuario2= new User(
            Uuid::uuid4(),
            "Laura",
            "arual",
            "laura@mail.com"
        );
        $usuarios=[$usuario1,$usuario2];

        return $usuarios;

    }

    public static function getUserById(string $id):User{

        $usuario=new User(
            Uuid::fromString($id),
            "miguel",
            "leugim",
            "miguel@mail.com"
        );
        return $usuario;


    }

}