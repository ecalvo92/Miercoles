<?php include_once 'baseDatosModel.php';

function ConsultarProductosBD()
{
    $conexion = AbrirBaseDatos();
    $sentencia = "CALL ConsultarProductos()";
    $respuesta = $conexion -> query($sentencia);
    CerrarBaseDatos($conexion);
    return $respuesta;
}

function RegistrarProducto($Nombre,$Precio,$Cantidad,$Categoria,$Imagen)
{
    $conexion = AbrirBaseDatos();
    $sentencia = "CALL RegistrarProducto('$Nombre','$Precio','$Cantidad','$Categoria','$Imagen')";
    $respuesta = $conexion -> query($sentencia);
    CerrarBaseDatos($conexion);
    return $respuesta;
}

function ActualizarProducto($IdProducto,$Nombre,$Precio,$Cantidad,$Categoria,$Imagen)
{
    $conexion = AbrirBaseDatos();
    $sentencia = "CALL ActualizarProducto('$IdProducto','$Nombre','$Precio','$Cantidad','$Categoria','$Imagen')";
    $respuesta = $conexion -> query($sentencia);
    CerrarBaseDatos($conexion);
    return $respuesta;
}

function ConsultarProductoBD($Consecutivo)  
{
    $conexion = AbrirBaseDatos();
    $sentencia = "CALL ConsultarProducto('$Consecutivo')";
    $respuesta = $conexion -> query($sentencia);
    CerrarBaseDatos($conexion);
    return $respuesta;
}


?>

