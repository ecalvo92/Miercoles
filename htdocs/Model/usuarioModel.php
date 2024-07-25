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

    function ActualizarContrasenna($Consecutivo, $Contrasenna, $EsTemporal)
    {
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL ActualizarContrasenna('$Consecutivo', '$Contrasenna', '$EsTemporal')";
        $respuesta = $conexion -> query($sentencia);
        CerrarBaseDatos($conexion);
        return $respuesta;
    }

    function ConsultarUsuariosBD($ConsecutivoLogueado)
    {
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL ConsultarUsuarios('$ConsecutivoLogueado')";
        $respuesta = $conexion -> query($sentencia);
        CerrarBaseDatos($conexion);
        return $respuesta;
    }

    function CambiarEstadoUsuario($Consecutivo)
    {
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL CambiarEstadoUsuario('$Consecutivo')";
        $respuesta = $conexion -> query($sentencia);
        CerrarBaseDatos($conexion);
        return $respuesta;
    }

    function ConsultarUsuarioBD($Consecutivo)
    {
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL ConsultarUsuario('$Consecutivo')";
        $respuesta = $conexion -> query($sentencia);
        CerrarBaseDatos($conexion);
        return $respuesta;
    }

    function ActualizarUsuario($Consecutivo,$Identificacion,$pNombre,$Correo,$IdRol)
    {
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL ActualizarUsuario('$Consecutivo','$Identificacion','$pNombre','$Correo','$IdRol')";
        $respuesta = $conexion -> query($sentencia);
        CerrarBaseDatos($conexion);
        return $respuesta;
    }

?>