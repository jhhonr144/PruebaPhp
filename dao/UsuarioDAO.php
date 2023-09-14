<?php

namespace DAO;

use Models\Usuario;
use \PDOException;

class UsuarioDAO
{
	private $db;

	public function __construct($db)
	{
		$this->db = $db;
	}

	public function registrarUsuario(Usuario $usuario)
	{
		try {
			$sql = "INSERT INTO usuarios (nombre, nombre_usuario, correo_electronico, contrasena, activo, rol)
                    VALUES (:nombre, :nombre_usuario, :correo_electronico, :contrasena, :activo, :rol)";

			$stmt = $this->db->prepare($sql);

			$stmt->bindParam(":nombre", $usuario->nombre);
			$stmt->bindParam(":nombre_usuario", $usuario->nombre_usuario);
			$stmt->bindParam(":correo_electronico", $usuario->correo_electronico);
			$stmt->bindParam(":contrasena", $usuario->contrasena);
			$stmt->bindParam(":activo", $usuario->activo);
			$stmt->bindParam(":rol", $usuario->rol);

			$stmt->execute();

			return $this->db->lastInsertId();
		} catch (PDOException $e) {
			echo "Error al registrar el usuario: " . $e->getMessage();
			return false;
		}
	}

	public function obtenerUsuarioPorNombreUsuario($nombre_usuario)
	{
		try {
			$sql = "SELECT * FROM usuarios WHERE nombre_usuario = :nombre_usuario";

			$stmt = $this->db->prepare($sql);

			$stmt->bindParam(":nombre_usuario", $nombre_usuario);

			$stmt->execute();

			$usuario = null;

			if ($stmt->rowCount() > 0) {
				$row = $stmt->fetch();

				$usuario = new Usuario();
				$usuario->id = $row["id"];
				$usuario->nombre = $row["nombre"];
				$usuario->nombre_usuario = $row["nombre_usuario"];
				$usuario->correo_electronico = $row["correo_electronico"];
				$usuario->contrasena = $row["contrasena"];
				$usuario->activo = $row["activo"];
				$usuario->rol = $row["rol"];
			}

			return $usuario;
		} catch (PDOException $e) {
			echo "Error al obtener el usuario: " . $e->getMessage();
			return null;
		}
	}
}
