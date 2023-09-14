<?php

require_once "config/DatabaseConnection.php";
require_once "controllers/UsuarioController.php";
require_once "config/DatabaseConnection.php";
require_once "controllers/API/UsuarioAPIController.php";

$databaseConnection = DatabaseConnection::getInstance();

// Carga las rutas 
$rutasPrincipales = require_once "config/routes.php";
$rutasAPI = require_once "config/api.php";

$rutas = array_merge($rutasPrincipales, $rutasAPI);
$url = ltrim($_SERVER['REQUEST_URI'], '/');

// si la ruta solicitada está definida
if (isset($rutas['/' . $url])) {
	[$controlador, $accion] = $rutas['/' . $url];
	$controlador = new $controlador($databaseConnection);
	$controlador->$accion();
} else {
	echo "Página no encontrada";
}
