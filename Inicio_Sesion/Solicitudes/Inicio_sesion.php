<?php
session_start();
//NUESTRA CONEXIÓN A LA BASE DE DATOS
include 'conexion.php'; 

// OBTENEMOS LOS DATOS DE LA BASE DE DATOS REGISTRADOS
$username = $_POST['usuario']; //SE INICIARA POR EL CORREO O USUARIO, (se decidira por el equipo)
$password = $_POST['contrasena'];

// Buscar el usuario en la base de datos
$query = "SELECT * FROM usuarios WHERE usuario = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();

if ($usuario && password_verify($password, $usuario['contrasena'])) {
    // Iniciar sesión y guardar información en la sesión
    $_SESSION['usuario'] = $usuario['usuario'];
    $_SESSION['rol'] = $usuario['rol'];
    $_SESSION['id_usuario'] = $usuario['id']; // Guardar el ID del usuario en la sesión
    
    // UNA VEZ INICIADA LA SECCIÓN NOS REDIRIGERA A NUESTRA PANTALLA DEPENDIENDO NUESTRO ROL
    switch ($usuario['rol']) {
        case 'Administradores':
            header('Location: ../Panel_Control/Administradores');
            break;
        case 'Coordinadores':
            header('Location: ../Panel_Control/Coordinadores');
            break;
        case 'Voluntarios':
            header('Location: ../Panel_Control/Voluntarios');
            break;
        default:
            header('Location: login.php?error=Rol no valido');
            break;
    }
    exit();
} else {
    // Si las credenciales son incorrectas, redirigir de vuelta al login con un error
    header('Location: login.php?error=Ocurrio un error verifique si introdujo bien los datos');
    exit();
}
?>
