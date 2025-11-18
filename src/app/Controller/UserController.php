<?php

namespace App\Controller;

use App\Auxiliar\Auxiliar;
use App\Class\User;
use App\Enum\UserType;
use App\Interface\ControllerInterface;
use App\Model\UserModel;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

class UserController implements ControllerInterface
{

    function index()
    {
        $usuarios = UserModel::getAllUsers();
        if (Auxiliar::isAPIRequest()){
            http_response_code(201);
            return json_encode($usuarios);
        }else{
            include_once DIRECTORIO_VISTAS_BACKEND."User/allusers.php";
        }
    }

    function show($id)
    {
            $usuario=UserModel::getUserById($id);
            if (Auxiliar::isAPIRequest()){
                http_response_code(200);
                return json_encode($usuario);
            }else {
                if ($usuario->isAdmin()) {
                    //Si el usuario es administrador
                    include_once DIRECTORIO_VISTAS_BACKEND . "User/mostrarUser.php";
                } else {
                    //Si el usuario no es un usuario administrador se le muestra vista de frontend
                    include_once DIRECTORIO_VISTAS_FRONTEND . "user/frontShowUser.php";
                }
            }
    }

    function create()
    {
        return include_once DIRECTORIO_VISTAS_BACKEND."User/createUser.php";
    }


    function store()
    {
        $errores = User::validateUserCreation($_POST);

        if ($errores){
            //Tenemos los datos con errores
            if (Auxiliar::isAPIRequest()){
                http_response_code(400);
                return json_encode([
                    "error"=>true,
                    "message"=>"Fallo en la validación de los datos",
                    "data"=>$errores,
                    "code"=>400
                ]);
            }else {
                include_once DIRECTORIO_VISTAS_BACKEND . "/User/createUser.php";
            }

        }else{
            //La validación a creado un usuario correcto y tengo que guardarlo
            $usuario = User::createFromArray($_POST);
            UserModel::saveUser($usuario);
            if (Auxiliar::isAPIRequest()){
                http_response_code(201);
                return json_encode([
                    "error"=>false,
                    "message"=>"Usuario creado correctamente",
                    "data"=>$usuario,
                    "code"=>400
                ]);
            }else {
                header('Location: /user');
            }
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

        //Añado el uuid a los datos que me han llegado en la petición PUT
        $editData['uuid']=$id;

        //Valido los datos que me han llegado en la petición PUT
        $errores = User::validateUserEdit($editData);

        if (!$errores){
            //No hay errores en la validación de usuarios
            $usuarioAntiguo = UserModel::getUserById($id);
            $usuarioNuevo = User::editFromArray($usuarioAntiguo,$editData);
            if (UserModel::updateUser($usuarioNuevo)){
                http_response_code(401);
                return json_encode([
                    "error"=>true,
                    "message"=>"Error modificando el usuario",
                    "code"=>401
                ]);
            }else{
                http_response_code(200);
                return json_encode([
                    "error"=>false,
                    "message"=>"Usuario modificado correctamente",
                    "code"=>200
                ]);
            }
        }else{
            //Hay errores em la validación de usuario
            http_response_code(401);
            return json_encode([
                "error"=>true,
                "message"=>"Error de validación de los datos del usuario",
                "data"=>$errores,
                "code"=>401
            ]);
        }

    }

    function destroy($id)
    {
        if (UserModel::deleteUserById($id)){
            //El usuario se ha borrado correctamente
            http_response_code(200);
            return json_encode([
                "error"=>false,
                "message"=>"El usuario con $id se ha borrado correctamente",
                "code"=>200
            ]);
        }else{
            //Ha habido algún problema con la base de datos al borrar el usuario
            http_response_code(401);
            return json_encode([
                "error"=>true,
                "message"=>"El usuario con $id no se ha podido borrar",
                "code"=>401
            ]);
        }
    }




    function verify(){
        //Obtenemos los datos de la petición POST

        //Petición a la base de datos para recuperar la info del usuario
        $usuario = UserModel::getUserByUsername($_POST['username']);

        if (password_verify($_POST['password'],$usuario->getPassword())){
            //Tengo un usuario valido
            $_SESSION['user']=$usuario;
            if ($usuario->isAdmin()){
                //Tenemos a un usuario administrador
                header('Location:/user');
            }else{
                //Tenemos a un usuario corriente
                header('Location: /');
            }

        }else{
            $error="Usuario o contraseña incorrecto";
            include_once DIRECTORIO_VISTAS."errorVisual.php";
            //No tengo un usuario valido
        }


    }

    function logout(){
        session_destroy();
        return header('Location: /');

    }


    function show_login(){
        include_once "app/Views/frontend/login.php";
    }
}