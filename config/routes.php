<?php

use Controllers\UsuarioController;

// rutas correspondientes
$rutas = [
	'/' => [UsuarioController::class, 'loguearse'],
	'/pruebaphp/' => [UsuarioController::class, 'loguearse'],
	'/pruebaphp/registro' => [UsuarioController::class, 'registrarUsuario'],

];

return $rutas;
