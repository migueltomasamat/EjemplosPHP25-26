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
        include_once DIRECTORIO_VISTAS_ADMINISTRACION."allusers.php";
    }

    function show($id)
    {
        return "Estos son los datos del usuario $id";
    }

    function store()
    {

        var_dump(User::validateUserCreation($_POST));

    }

    function update($id)
    {
        //Leo del fichero input los datos que me han llegado en la petición PUT
        parse_str(file_get_contents("php://input"),$editData);

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
        // TODO: Implement destroy() method.
    }

    function create()
    {
        return "formulario para crear usuario";
    }

    function edit($id)
    {
        // TODO: Implement edit() method.
    }

    function verify(){
        $_POST['username'];
        $_POST['password'];

        //Si es correcto el login
        $_SESSION['username']=$_POST['username'];
    }
}