<?php


namespace Controllers;

use DAO\UsuarioDAO;
use Models\Usuario;
use \DatabaseConnection;

require_once "DAO/UsuarioDAO.php";
require_once "model/Usuario.php";

$databaseConnection = DatabaseConnection::getInstance();

class UsuarioController
{
	private $apiUrl;

	public function __construct()
	{
		//URL base del API REST
		$this->apiUrl = 'http://localhost/pruebaphp/api/usuarios/';
	}

	private function sendRequest($urlSuffix, $data)
	{

		$ch = curl_init($this->apiUrl . $urlSuffix);

		//opciones de la solicitud POST
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch);

		if (curl_errno($ch)) {
			echo 'Error en la solicitud cURL: ' . curl_error($ch);
		}

		curl_close($ch);

		return $response;
	}

	public function registrarUsuario()
	{
		if ($_SERVER["REQUEST_METHOD"] === "POST") {
			$data = [
				"nombre" => $_POST["nombre"],
				"nombre_usuario" => $_POST["nombre_usuario"],
				"correo_electronico" => $_POST["correo_electronico"],
				"contrasena" => $_POST["contrasena"]
			];

			$response = $this->sendRequest('registrar', $data);

			echo $response;
		} else {
			include_once("views/registro_usuario.php");
		}
	}

	public function loguearse()
	{
		if ($_SERVER["REQUEST_METHOD"] === "POST") {
			$data = [
				"nombre_usuario" => $_POST["nombre_usuario"],
				"contrasena" => $_POST["contrasena"]
			];

			$response = $this->sendRequest('login', $data);

			echo $response;
		} else {
			include_once("views/login.php");
		}
	}
}
