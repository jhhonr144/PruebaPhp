<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Iniciar sesión</title>
	<link rel="stylesheet" type="text/css" href="public\styles\styles.css">
</head>

<body>
	<h1 style="text-align: center;">Iniciar sesion</h1>

	<form method="post">
		<label for="nombre_usuario">Nombre de usuario:</label>
		<input type="text" id="nombre_usuario" name="nombre_usuario" required>
		<br>
		<label for="contrasena">Contraseña:</label>
		<input type="password" id="contrasena" name="contrasena" required>
		<br>
		<input type="submit" value="Iniciar sesión">
	</form>

</body>

</html>