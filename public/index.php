<?php

//inicializamos errores de la aplicación.

ini_set('display_errors',1); //este metodo inicializa una busqueda de errores, 1 signiica activo
ini_set('display_startup_errors',1);
error_reporting(E_ALL); // Éste método se utiliza para mostrar errores (todos)->E_ALL en desarollo, no en producción 

//cargamos el autoload
require_once '../vendor/autoload.php';
//traemos la parte de inicialización de bases de datos de Illuminate
use Illuminate\Database\Capsule\Manager as Capsule;


$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'cursophp',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();
// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);


//En el siguiente fragmento usamos métodos para detectar la ruta en la que nos encontramos.

var_dump($request->getUri()->getPath());








// //HACEMOS UNA RUTINA BÁSICA DE ROUTEO
// //definimos las rutas entregadas mediante la vaiable superglobar $_GET
// $route=$_GET['route']?? '/'; //??significa si esta definido y tiene valor como condicional corto

// if($route=='/'){
//     require'../index.php';

// }elseif ($route=='addJob') {
//     require '../addJob.php';
// }


