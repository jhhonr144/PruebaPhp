<?php

namespace Controllers\API;

use DAO\UsuarioDAO;
use Models\Usuario;
use \DatabaseConnection;

$databaseConnection = DatabaseConnection::getInstance();

class UsuarioAPIController
{
	private $usuarioDAO;


	public function __construct(DatabaseConnection $databaseConnection)
	{
		$this->usuarioDAO = new UsuarioDAO($databaseConnection->getConnection());
	}


	//registrar usuario 
	public function registrarUsuario()
	{
		// cuerpo de la solicitud POST
		$data = json_decode(file_get_contents("php://input"));

		if (!$data) {
			header('Content-Type: application/json', true, 400);
			echo json_encode(["error" => "Datos JSON no validos"]);
			return;
		}

		$usuario = new Usuario();
		$usuario->nombre = $data->nombre;
		$usuario->nombre_usuario = $data->nombre_usuario;
		$usuario->correo_electronico = $data->correo_electronico;
		$hash = password_hash($data->contrasena, PASSWORD_DEFAULT);
		$usuario->contrasena = $hash;
		$usuario->activo = true;
		$usuario->rol = "usuario";

		// registrar el usuario
		$usuarioId = $this->usuarioDAO->registrarUsuario($usuario);

		if ($usuarioId) {
			header('Content-Type: application/json', true, 201);
			echo json_encode(["message" => "El usuario se registró con éxito", "user_id" => $usuarioId]);
		} else {
			header('Content-Type: application/json', true, 500);
			echo json_encode(["error" => "Error al registrar el usuario"]);
		}
	}

	//iniciar sesion
	public function login()
	{
		$data = json_decode(file_get_contents("php://input"));

		if (!$data) {
			header('Content-Type: application/json', true, 400);
			echo json_encode(["error" => "Datos JSON no validos"]);
			return;
		}

		$nombre_usuario = $data->nombre_usuario;
		$contrasena = $data->contrasena;

		// busca el usuario en la base de datos
		$usuario = $this->usuarioDAO->obtenerUsuarioPorNombreUsuario($nombre_usuario);

		if ($usuario && password_verify($contrasena, $usuario->contrasena)) {
			header('Content-Type: application/json', true, 200);
			echo json_encode([
				"message" => "Inicio de sesión exitoso",
				"usuario" => [
					"id" => $usuario->id,
					"nombre" => $usuario->nombre,
					"nombre_usuario" => $usuario->nombre_usuario,
					"correo_electronico" => $usuario->correo_electronico,
				]
			]);
		} else {
			header('Content-Type: application/json', true, 401);
			echo json_encode(["error" => "Credenciales incorrectas"]);
		}
	}
}
