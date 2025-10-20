<?php

namespace App\Controller;

use App\Interface\ControllerInterface;
use App\Model\UserModel;
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
        var_dump($_POST);
        v::key('username',v::stringType())
            ->key('password',v::stringType()->length(3,16))
            ->key('email',v::email())
            ->key('edad',v::intType()->min(18))
            ->key('type',v::in(["normal", "anuncios", "admin"])
        )->assert($_POST);


    }

    function update($id)
    {
        // TODO: Implement update() method.
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
}