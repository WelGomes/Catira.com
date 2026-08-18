<?php

use Config\Routes;

require_once __DIR__ . "../../vendor/autoload.php";

try {
    
    $request = $_SERVER["REQUEST_METHOD"];
    $uri     = $_SERVER["REQUEST_URI"];
    $routes  = new Routes();
    $routes->callRoutes(request: $request, uri: $uri);

} catch (Exception $ex) {
    echo "Error: {$ex->getMessage()}";
}

?>