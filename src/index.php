<?php
include_once "vendor/autoload.php";
include_once "env.php";
include_once "auxiliar/funciones.php";

//Directiva para inserta o utilizar la clase RouteCollector
use App\Controller\MovieController;
use App\Controller\UserController;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Phroute\Phroute\RouteCollector;
use App\Controller\DirectorController;

//instancia una variable de la clase RouteCollector
$router = new RouteCollector();

//Definir las rutas de mi aplicación

$router->get('/',function(){
    return 'Estoy en la página principal';
});


//Rutas de Usuario CRUD
//Rutas de Servicio API REST
$router->get('/user/create',[UserController::class,'create']);


$router->get('/user',[UserController::class,'index']);
$router->get('/user/{id}',[UserController::class,'show']);
$router->post('/user',[UserController::class,'store']);
$router->put('/user/{id}',[UserController::class,'update']);
$router->delete('/user/{id}',[UserController::class,'destroy']);

//Rutas asociadas a las vistas de usuario
$router->get('/user/{id}/edit',[UserController::class,'edit']);



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







































































$router->get('/administrador',function(){
    include_once DIRECTORIO_VISTAS_ADMINISTRACION."welcome.php";
});
//$router->get('/login',function(){
//    include_once DIRECTORIO_VISTAS."indice.php";
//});
//$router->post('/login',function(){
//   var_dump($_POST);
//});
//
//$router->delete('/pelicula/{id:\d+}',function($id){
//   echo "La pelicula a borrar tiene el id $id";
//});
//
//$router->get('/calculodni',function(){
//    $resultado ="";
//    if (isset($_GET['dni'])){
//        $resultado= calcularLetraDNI($_GET['dni']);
//    }else{
//        $resultado= "Párametro incorrecto";
//    }
//    include_once DIRECTORIO_VISTAS_ADMINISTRACION."calculo_letra_dni.php";
//
//
//});
//
//
//$router->get('/administrador/add-pelicula',function(){
//    include_once "admin/views/add-pelicula.php";
//
//
//});
//
//$router->post('/pelicula',function(){
//    var_dump($_POST);
//    var_dump($_FILES);
//
//    organizarImagen($_FILES['poster'],$_POST['titulo']);
//
//    #echo json_encode($_POST);
//
//});
//
//$router->get('/pass', function () {
//    echo "Se va a generar una contraña</br>";
//    var_dump($_GET);
//
//    if (isset($_GET['num1'])){
//        echo generatePassword($_GET['num1']);
//    }else{
//        echo "Tienes que pasarme un parámetro llamado num1";
//    }
//
//
//});




//Resolver la ruta que debemos cargar
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

try{
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

}catch (HttpRouteNotFoundException $e){
    return include_once "views/404.php";
}

// Print out the value returned from the dispatched function
echo $response;
