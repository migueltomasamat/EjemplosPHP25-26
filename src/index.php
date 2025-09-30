<?php
include_once "vendor/autoload.php";
include_once "env.php";

//Directiva para inserta o utilizar la clase RouteCollector
use Phroute\Phroute\RouteCollector;

//instancia una variable de la clase RouteCollector
$router = new RouteCollector();

//Definir las rutas de mi aplicación

$router->get('/',function(){
    return 'Estoy en la página principal';
});

$router->get('/administrador',function(){
    include_once DIRECTORIO_VISTAS_ADMINISTRACION."welcome.php";
});
$router->get('/login',function(){
    include_once DIRECTORIO_VISTAS."indice.php";
});

$router->get('/pass', function () {
    echo "Se va a generar una contraña";
    include_once "auxiliar/funciones.php";

    echo generatePassword(16);
});




//Resolver la ruta que debemos cargar
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

try{
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

}catch (HttpRouteNotFoundException $e){
    include_once "views/404.html";
}

// Print out the value returned from the dispatched function
echo $response;
