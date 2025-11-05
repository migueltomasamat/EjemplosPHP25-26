<?php

namespace App\Model;

use App\Class\User;
use Ramsey\Uuid\Uuid;

use \PDO;
use App\Class\DB;

class UserModel
{

    public static function getAllUsers():?array{

        try {
            $conexion = new PDO("mysql:host=mariadb;dbname=proyecto1", "miguela", "aleugim");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (\PDOException $error){
            echo $error;
            return null;
        }

        $sql = "SELECT * FROM user";
        $sentenciaPreparada = $conexion->prepare($sql);

        $sentenciaPreparada->execute();

        $resultado = $sentenciaPreparada->fetchAll(PDO::FETCH_ASSOC);

        if($resultado){
            $usuarios=[];
            foreach ($resultado as $user){
                $usuarios[]=User::createFromArray($user);
            }
            return $usuarios;
        }else{
            return null;
        }
    }

    public static function getUserById(string $id):?User{
        try {
            $conexion = new PDO("mysql:host=mariadb;dbname=proyecto1", "miguela", "aleugim");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (\PDOException $error){
            echo $error;
            return null;
        }

        //$sql = "SELECT * FROM user where username=:username";

        $sql = "SELECT * FROM user where uuid=:uuid";
        $sentenciaPreparada = $conexion->prepare($sql);

        $sentenciaPreparada->bindValue('uuid',$id,PDO::PARAM_STR);

        $sentenciaPreparada->execute();

        $resultado = $sentenciaPreparada->fetch(PDO::FETCH_ASSOC);

        if($resultado){
            $usuario = User::createFromArray($resultado);
            return $usuario;
        }else{
            return null;
        }
    }

    public static function getUserByUsername(string $username):?User{
        try {
            $conexion = new PDO("mysql:host=mariadb;dbname=proyecto1", "miguela", "aleugim");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (\PDOException $error){
            echo $error;
            return null;
        }

        //$sql = "SELECT * FROM user where username=:username";

        $sql = "SELECT * FROM user where username=?";
        $sentenciaPreparada = $conexion->prepare($sql);

        $sentenciaPreparada->bindValue(1,$username,PDO::PARAM_STR);

        $sentenciaPreparada->execute();

        $resultado = $sentenciaPreparada->fetch(PDO::FETCH_ASSOC);

        if($resultado){
            $usuario = User::createFromArray($resultado);
            return $usuario;
        }else{
            return null;
        }

    }

    public static function getUserByEmail(string $email):?User{

        return null;

    }

    public static function deleteAllUsers():bool{

        return true;
    }

    public static function deleteUser(User $user):bool{

        return true;
    }

    public static function deleteUserById(string $id):bool{
        try {
            $conexion = new PDO("mysql:host=mariadb;dbname=proyecto1", "miguela", "aleugim");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (\PDOException $error){
            echo $error;
            return false;
        }

        //$sql = "SELECT * FROM user where username=:username";

        $sql = "DELETE FROM user WHERE uuid=:uuid";
        $sentenciaPreparada = $conexion->prepare($sql);

        $sentenciaPreparada->bindValue('uuid',$id);

        $sentenciaPreparada->execute();



        if($sentenciaPreparada->rowCount()>0){
            return true;
        }else{
            return false;
        }
    }

    public static function updateUser(User $user):bool{

        try {
            $conexion = new PDO("mysql:host=mariadb;dbname=proyecto1", "miguela", "aleugim");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (\PDOException $error){
            echo $error;
            return false;
        }

        $sql = "UPDATE user SET username=:username,password=:password,email=:email,edad=:edad,type=:type WHERE uuid=:uuid";
        $sentenciaPreparada = $conexion->prepare($sql);

        $sentenciaPreparada->bindValue('uuid',$user->getUuid());
        $sentenciaPreparada->bindValue('username',$user->getUsername());
        $sentenciaPreparada->bindValue('password',$user->getPassword());
        $sentenciaPreparada->bindValue('email',$user->getEmail());
        $sentenciaPreparada->bindValue('edad',$user->getEdad());
        $sentenciaPreparada->bindValue('type',$user->getType()->name);

        $sentenciaPreparada->execute();

        if ($sentenciaPreparada->rowCount()>0){
            return true;
        }else{
            return false;
        }
    }

    public static function saveUser(User $user):bool{

        try {
            $conexion = new PDO("mysql:host=mariadb;dbname=proyecto1", "miguela", "aleugim");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (\PDOException $error){
            echo $error;
            return false;
        }

        $sql = "INSERT INTO user values(:uuid,:username,:password,:email,:edad,:type)";
        $sentenciaPreparada = $conexion->prepare($sql);

        $sentenciaPreparada->bindValue('uuid',$user->getUuid());
        $sentenciaPreparada->bindValue('username',$user->getUsername());
        $sentenciaPreparada->bindValue('password',$user->getPassword());
        $sentenciaPreparada->bindValue('email',$user->getEmail());
        $sentenciaPreparada->bindValue('edad',$user->getEdad());
        $sentenciaPreparada->bindValue('type',$user->getType()->name);

        $sentenciaPreparada->execute();

        if ($sentenciaPreparada->rowCount()>0){
            return true;
        }else{
            return false;
        }
    }

}