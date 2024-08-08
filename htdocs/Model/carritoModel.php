<?php include_once 'baseDatosModel.php';

function RegistrarCarrito($Consecutivo,$IdProducto,$Cantidad)
{
    $conexion = AbrirBaseDatos();
    $sentencia = "CALL RegistrarCarrito('$Consecutivo','$IdProducto','$Cantidad')";
    $respuesta = $conexion -> query($sentencia);
    CerrarBaseDatos($conexion);
    return $respuesta;
}

function ConsultarResumenCarritoBD($Consecutivo)
{
    $conexion = AbrirBaseDatos();
    $sentencia = "CALL ConsultarResumenCarrito('$Consecutivo')";
    $respuesta = $conexion -> query($sentencia);
    CerrarBaseDatos($conexion);
    return $respuesta;
}

?>