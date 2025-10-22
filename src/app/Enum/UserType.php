<?php

namespace App\Enum;

enum UserType
{
   case NORMAL;
   case ANUNCIOS;
   case ADMIN;

   public static function stringToUserType(string $type):UserType{

       return match(strtolower($type)){
           "normal"=>UserType::NORMAL,
           "anuncios"=>UserType::ANUNCIOS,
           "Admin"=>UserType::ADMIN,
           default=>UserType::NORMAL
       };


   }

}
