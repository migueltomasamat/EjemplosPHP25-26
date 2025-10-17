<?php

namespace App\Interface;

interface ControllerInterface
{
    function index();

    function show($id);

    function store();

    function update($id);

    function destroy($id);

    function create();

    function edit($id);
}