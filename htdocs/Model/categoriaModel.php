<?php include_once 'baseDatosModel.php';

function ConsultarCategoriasBD()
{
    $conexion = AbrirBaseDatos();
    $sentencia = "CALL ConsultarCategorias()";
    $respuesta = $conexion -> query($sentencia);
    CerrarBaseDatos($conexion);
    return $respuesta;
}

?>