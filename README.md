# API de Registro y Inicio de Sesión de Usuarios

Este archivo README proporciona información sobre las dos rutas de la API relacionadas con la gestión de usuarios en la aplicación.

## Rutas de la API

### Registro de Usuarios

- **Ruta:** `/pruebaphp/api/usuarios/registrar`
- **Método HTTP:** POST
- **Descripción:** Esta ruta permite registrar un nuevo usuario en la aplicación. El cliente debe enviar datos JSON válidos que incluyan el nombre, nombre de usuario, correo electrónico y contraseña del usuario que se desea registrar.

#### JSON de Entrada

```json
{
  "nombre": "Ejemplo Nombre",
  "nombre_usuario": "ejemplousuario",
  "correo_electronico": "ejemplo@correo.com",
  "contrasena": "contrasena123"
}
```

#### Respuesta Correcta

- **Código de Estado:** 201 (Created)
- **Contenido de la Respuesta (JSON):**
  ```json
  {
    "message": "El usuario se registró con éxito",
    "user_id": <ID_del_Usuario_Registrado>
  }
  ```

#### Respuesta Incorrecta

- **Código de Estado:** 400 (Bad Request)
- **Contenido de la Respuesta (JSON):**
  ```json
  {
    "error": "Datos JSON no válidos"
  }
  ```

- **Código de Estado:** 500 (Internal Server Error)
- **Contenido de la Respuesta (JSON):**
  ```json
  {
    "error": "Error al registrar el usuario"
  }
  ```

### Inicio de Sesión

- **Ruta:** `/pruebaphp/api/usuarios/login`
- **Método HTTP:** POST
- **Descripción:** Esta ruta permite que un usuario inicie sesión proporcionando su nombre de usuario y contraseña en formato JSON. Si las credenciales son correctas, el usuario inicia sesión y se devuelve información del usuario.

#### JSON de Entrada

```json
{
  "nombre_usuario": "ejemplousuario",
  "contrasena": "contrasena123"
}
```

#### Respuesta Correcta

- **Código de Estado:** 200 (OK)
- **Contenido de la Respuesta (JSON):**
  ```json
  {
    "message": "Inicio de sesión exitoso",
    "usuario": {
      "id": <ID_del_Usuario>,
      "nombre": "<Nombre_del_Usuario>",
      "nombre_usuario": "<Nombre_de_Usuario>",
      "correo_electrónico": "<Correo_Electrónico_del_Usuario>"
    }
  }
  ```

#### Respuesta Incorrecta

- **Código de Estado:** 400 (Bad Request)
- **Contenido de la Respuesta (JSON):**
  ```json
  {
    "error": "Datos JSON no válidos"
  }
  ```

- **Código de Estado:** 401 (Unauthorized)
- **Contenido de la Respuesta (JSON):**
  ```json
  {
    "error": "Credenciales incorrectas"
  }
  ```

```

