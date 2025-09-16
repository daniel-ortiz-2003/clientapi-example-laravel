<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Verificar si la aplicación está en mantenimiento
|--------------------------------------------------------------------------
|
| Si la aplicación está en modo mantenimiento / demo mediante el comando "down"
| cargaremos este archivo para que se muestre cualquier contenido pre-renderizado
| en lugar de iniciar el framework, lo que podría causar una excepción.
|
*/

if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

/*
|--------------------------------------------------------------------------
| Registrar el Auto Loader
|--------------------------------------------------------------------------
|
| Composer proporciona un cargador de clases conveniente y generado automáticamente
| para esta aplicación. Solo necesitamos utilizarlo aquí. Simplemente lo requerimos
| en este script para no tener que cargar manualmente nuestras clases.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Ejecutar la Aplicación
|--------------------------------------------------------------------------
|
| Una vez que tenemos la aplicación, podemos manejar la solicitud entrante usando
| el kernel HTTP de la aplicación. Luego, enviaremos la respuesta de vuelta
| al navegador del cliente, permitiéndole disfrutar de nuestra aplicación.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);
