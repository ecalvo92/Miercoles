<?php include_once 'baseDatosModel.php';

    function RegistrarUsuario($Identificacion,$Nombre,$Email,$Password)
    {
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL RegistrarUsuario('$Identificacion','$Nombre','$Email','$Password')";
        $respuesta = $conexion -> query($sentencia);
        CerrarBaseDatos($conexion);
        return $respuesta;
    }

    function IniciarSesion($Email,$Password)
    {
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL IniciarSesion('$Email','$Password')";
        $respuesta = $conexion -> query($sentencia);
        CerrarBaseDatos($conexion);
        return $respuesta;
    }

    function ConsultarUsuarioXIdentificacion($Identificacion)
    {
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL ConsultarUsuarioXIdentificacion('$Identificacion')";
        $respuesta = $conexion -> query($sentencia);
        CerrarBaseDatos($conexion);
        return $respuesta;
    }

    function ActualizarContrasennaTemporal($Consecutivo, $Contrasenna)
    {
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL ActualizarContrasennaTemporal('$Consecutivo', '$Contrasenna')";
        $respuesta = $conexion -> query($sentencia);
        CerrarBaseDatos($conexion);
        return $respuesta;
    }

    function ConsultarUsuariosBD()
    {
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL ConsultarUsuarios()";
        $respuesta = $conexion -> query($sentencia);
        CerrarBaseDatos($conexion);
        return $respuesta;
    }

?>