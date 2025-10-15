<?php

namespace App\Controller;

use App\Interface\ControllerInterface;

class UserController implements ControllerInterface
{

    function index()
    {
        return "Hola";
    }

    function show($id)
    {
        return "Estos son los datos del usuario $id";
    }

    function store()
    {
        var_dump($_POST);
    }

    function update()
    {
        // TODO: Implement update() method.
    }

    function destroy()
    {
        // TODO: Implement destroy() method.
    }

    function create()
    {
        // TODO: Implement create() method.
    }

    function edit($id)
    {
        // TODO: Implement edit() method.
    }
}