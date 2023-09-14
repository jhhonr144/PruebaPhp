<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Registro de Usuario</title>
	<link rel="stylesheet" type="text/css" href="public\styles\styles.css">
</head>

<body>
	<h1 style="text-align: center;">Registro de Usuario</h1>
	<form method="post">
		<label for="nombre">Nombre:</label>
		<input type="text" id="nombre" name="nombre" required>
		<br>
		<label for="nombre_usuario">Nombre de usuario:</label>
		<input type="text" id="nombre_usuario" name="nombre_usuario" required>
		<br>
		<label for="correo_electronico">Correo electrónico:</label>
		<input type="email" id="correo_electronico" name="correo_electronico" required>
		<br>
		<label for="contrasena">Contraseña:</label>
		<input type="password" id="contrasena" name="contrasena" required>
		<br>
		<input type="submit" value="Registrarse">
	</form>

	<br>

</body>

</html>