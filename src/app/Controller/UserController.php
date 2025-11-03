<?php

namespace App\Controller;

use App\Class\User;
use App\Interface\ControllerInterface;
use App\Model\UserModel;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

class UserController implements ControllerInterface
{

    function index()
    {
        $usuarios = UserModel::getAllUsers();
        include_once DIRECTORIO_VISTAS_BACKEND."User/allusers.php";
    }

    function show($id)
    {
        if (isset($_SESSION['user'])){
            $usuario=UserModel::getUserById($_SESSION['user']->getUuid());
            if ($_SESSION['user']->isAdmin()) {
                return include_once DIRECTORIO_VISTAS_BACKEND . "User/mostrarUser.php";
            }else{
                return include_once DIRECTORIO_VISTAS_FRONTEND. "mostrarUser.php";
            }
        }else{
            return "Ruta no disponible para tu usuario";
        }
    }

    function create()
    {
        return include_once DIRECTORIO_VISTAS_BACKEND."User/createUser.php";
    }


    function store()
    {
        $resultado = User::validateUserCreation($_POST);

        if (is_array($resultado)){
            //Tenemos los datos con errores
            include_once DIRECTORIO_VISTAS_BACKEND."/User/createUser.php";

        }else{
            //La validación a creado un usuario correcto y tengo que guardarlo
            $resultado->setPassword(password_hash($resultado->getPassword(),PASSWORD_DEFAULT));
            UserModel::saveUser($resultado);
        }

    }
    function edit($id)
    {
        // Recuperar los datos de un usuario del Modelo
        $usuario = UserModel::getUserById($id);

        //Llamar a la vista que me muestre los datos del usuario
        include_once DIRECTORIO_VISTAS_BACKEND."User/editUser.php";

    }

    function update($id)
    {


        //Leo del fichero input los datos que me han llegado en la petición PUT
        $editData=json_decode(file_get_contents("php://input"),true);

        var_dump($editData);

        //Añado el uuid a los datos que me han llegado en la petición PUT
        $editData['uuid']=$id;

        //Valido los datos que me han llegado en la petición PUT
        $usuario = User::validateUserEdit($editData);

        //TODO guardo el usuario actualizado en la base de datos

        //Muesto los datos del usuario o los errores en la petición si los hay
        var_dump($usuario);


    }

    function destroy($id)
    {
        //Llamamos a la función del modelo que nos permite borrar a un usuario
    }




    function verify(){
        //Obtenemos los datos de la petición POST

    }

    function logout(){
        session_destroy();
    }


    function show_login(){
        include_once "app/Views/frontend/login.php";
    }
}