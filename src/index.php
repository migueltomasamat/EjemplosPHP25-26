<?php
include_once "vendor/autoload.php";
include_once "env.php";
include_once "auxiliar/funciones.php";

session_start();


//Directiva para inserta o utilizar la clase RouteCollector
use App\Controller\MovieController;
use App\Controller\UserController;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Phroute\Phroute\RouteCollector;
use App\Controller\DirectorController;
use App\Class\User;
use App\Enum\UserType;
use Ramsey\Uuid\Uuid;


//instancia una variable de la clase RouteCollector
$router = new RouteCollector();


//Definir los filtros de las rutas
$router->filter('auth',function(){

    if(!isset($_SESSION['user'])) {
        header('Location: /login');
        return false;
    }
});


$router->filter('admin',function(){

    if (!isset($_SESSION['user']) && !$_SESSION['user']->isAdmin()){
        header('Location: /error');
        return false;
    }
});

$router->get('/error',function(){
    $error="No puedes acceder a este apartado";
    include_once DIRECTORIO_VISTAS."errorVisual.php";
});

//Definir las rutas de mi aplicación

$router->get('/',function(){
    return include_once DIRECTORIO_VISTAS_FRONTEND."frontindex.php";
});


//Rutas de Usuario CRUD
//Rutas asociadas a las vistas de usuario
$router->get('/user/{id}/edit',[UserController::class,'edit'],["before"=>'auth']);
$router->get('/user/create',[UserController::class,'create'],["before"=>'auth']);
$router->get('/login',[UserController::class,'show_login']);
$router->post('/user/login',[UserController::class,'verify']);
$router->get('/user/logout',[UserController::class,'logout'],["before"=>'auth']);

//Rutas para la aplicacion web visual
$router->get('/user',[UserController::class,'index']);
$router->get('/user/{id}',[UserController::class,'show']);
$router->post('/user',[UserController::class,'store']);
$router->put('/user/{id}',[UserController::class,'update']);
$router->delete('/user/{id}',[UserController::class,'destroy'],["before"=>'admin']);

//Rutas de Servicio API REST
$router->get('/api/user',[UserController::class,'index']);
$router->get('/api/user/{id}',[UserController::class,'show']);
$router->post('/api/user',[UserController::class,'store']);
$router->put('/api/user/{id}',[UserController::class,'update']);
$router->delete('/api/user/{id}',[UserController::class,'destroy']);



//Rutas de Peliculas CRUD
//Rutas de Servicio API REST
$router->get('/movie',[MovieController::class,'index']);
$router->get('/movie/{id}',[MovieController::class,'show']);
$router->post('/movie',[MovieController::class,'store']);
$router->put('/movie/{id}',[MovieController::class,'update']);
$router->delete('/movie/{id}',[MovieController::class,'destroy']);

//Rutas asociadas a las vistas de usuario
$router->get('/create-movie',[MovieController::class,'create']);
$router->get('/movie/{id}/edit',[MovieController::class,'edit']);


//Rutas de Director CRUD
$router->get('/director',[DirectorController::class,'index']);
$router->get('/director/{id}',[DirectorController::class,'show']);
$router->post('/director',[DirectorController::class,'store']);
$router->put('/director/{id}',[DirectorController::class,'update']);
$router->delete('/director/{id}',[DirectorController::class,'destroy']);

//Resolver la ruta que debemos cargar
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

try{
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

}catch (HttpRouteNotFoundException $e){
    return include_once DIRECTORIO_VISTAS."404.php";
}

// Print out the value returned from the dispatched function
echo $response;
