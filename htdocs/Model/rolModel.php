<?php include_once 'baseDatosModel.php';

function ConsultarRolesBD()
{
    $conexion = AbrirBaseDatos();
    $sentencia = "CALL ConsultarRoles()";
    $respuesta = $conexion -> query($sentencia);
    CerrarBaseDatos($conexion);
    return $respuesta;
}

?>