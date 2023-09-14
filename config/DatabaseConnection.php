<?php

class DatabaseConnection
{

	private static $instance;
	private $connection;

	private function __construct()
	{
		$dbHost = "localhost";
		$dbPort = "5433";
		$dbName = "prueba-tecnica";
		$dbUser = "postgres";
		$dbPassword = "administrador1";

		try {
			//conexión PDO a la base de datos.
			$this->connection = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			echo "Error de conexión: " . $e->getMessage();
			exit;
		}
	}

	// obtener una instancia única de la clase.
	public static function getInstance()
	{

		if (!self::$instance) {
			self::$instance = new DatabaseConnection();
		}
		return self::$instance;
	}

	//obtener la conexión a la base de datos.
	public function getConnection()
	{
		return $this->connection;
	}
}
