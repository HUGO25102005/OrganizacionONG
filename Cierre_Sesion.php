<!-- 
CIERRE SE SESIÓN, UNA VEZ QUE SE CIERRA LA SESIÓN LA UNICA MANERA DE VOLVER A ENTRAR ES CON EL USUARIO O CONTRASEÑA
ESTE SE PONDRA EN LA PARTE DE ADMINISTRADORES, COORDINADORES Y VOLUNTARIOS CON UN " INCLUDE '../Cierre_Sesion.php' "  
-->

<!---------------------------------CIERRE SE SESIÓN CON POCA SEGURIDAD--------------------------------------------->
<?php 
session_start();
session_destroy();
header('Location: ../../Inicio_Sesion');
exit();
?>
<!-------------------------------------------------------------------------------------------------------------------->

<!----------------------------CIERRE DE SESIÓN CON MAS SEGURIDAD Y COMPROBACIONES-------------------------------------->
<?php
//INICIA LA SESIÓN
session_start();

// ELIMINA TODAS LAS VARIABLES DE LA SESIÓN
$_SESSION = array();

// Si se usa una cookie de sesión, elimínala
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalmente, destruye la sesión
session_destroy();

// Redirige al usuario a la página de inicio, obligandolo volver iniciar sesión
header("Location: ../../Inicio_Sesion");
exit();
?>
<!------------------------------------------------------------------------------------------------------------------->