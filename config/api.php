<?php

use Controllers\API\UsuarioAPIController;

$rutasAPI = [
	'/pruebaphp/api/usuarios/registrar' => [UsuarioAPIController::class, 'registrarUsuario'], // Ruta para el registro de usuarios
	'/pruebaphp/api/usuarios/login' => [UsuarioAPIController::class, 'login'], // Ruta para el inicio de sesión

];

return $rutasAPI;
