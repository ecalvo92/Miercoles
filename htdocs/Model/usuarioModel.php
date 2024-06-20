<?php include_once 'baseDatosModel.php';

    function RegistrarUsuario($Identificacion,$Nombre,$Email,$Password)
    {
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL RegistrarUsuario('$Identificacion','$Nombre','$Email','$Password')";
        $respuesta = $conexion -> query($sentencia);
        CerrarBaseDatos($conexion);

        return $respuesta;
    }

    function EPUsuario($Email,$Password)
    {
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL IniciarSesion('$Email','$Password')";
        $respuesta = $conexion -> query($sentencia);
        CerrarBaseDatos($conexion);
        
        return $respuesta;
    }

    function RecuperarAcceso($Email)
    {
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL RecuperarAcceso('$Email')";
        $respuesta = $conexion -> query($sentencia);
        CerrarBaseDatos($conexion);

        return $respuesta;
    }

?>