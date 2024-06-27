<?php include_once '../Model/usuarioModel.php';
      include_once 'comunController.php';

    if(session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if(isset($_POST["btnRegistrarUsuario"]))
    {
        $Identificacion = $_POST["txtIdentificacion"];
        $Nombre = $_POST["txtNombre"];
        $Email = $_POST["txtEmail"];
        $Password = $_POST["txtPassword"];
        $respuesta = RegistrarUsuario($Identificacion,$Nombre,$Email,$Password);

        if($respuesta == true)
        {
            header("location: ../View/login.php");
        }
        else
        {
            $_POST["msj"] = "Su información no se ha registrado correctamente.";
        }
    }

    if(isset($_POST["btnIniciarSesion"]))
    {
        $Email = $_POST["txtEmail"];
        $Password = $_POST["txtPassword"];
        $respuesta = IniciarSesion($Email,$Password);

        if($respuesta -> num_rows > 0)
        {
            $datos = mysqli_fetch_array($respuesta);
            $_SESSION["NombreUsuario"] = $datos["Nombre"];
            header("location: ../View/home.php");
        }
        else
        {
            $_POST["msj"] = "Su información no se ha validado correctamente.";
        }
    }

    if(isset($_POST["btnRecuperarAcceso"]))
    {
        $Identificacion = $_POST["txtIdentificacion"];
        $respuesta = ConsultarUsuarioXIdentificacion($Identificacion);

        if($respuesta -> num_rows > 0)
        {
            $datos = mysqli_fetch_array($respuesta);
            $codigo = GenerarCodigo();
            $resp = ActualizarContrasennaTemporal($datos["Consecutivo"],$codigo);

            if($resp == true)
            {
                $contenido = "<html><body>
                Estimado(a) " . $datos["Nombre"] . "<br/><br/>
                Se ha generado el siguiente código de seguridad: <b>" . $codigo . "</b><br/>
                Recuerde realizar el cambio de contraseña una vez que ingrese a nuestro sistema<br/><br/>
                Muchas gracias.
                </body></html>";

                EnviarCorreo('Acceso al Sistema', $contenido, $datos["Correo"]);
                header("location: ../View/login.php");
            }
            else
            {
                $_POST["msj"] = "No se ha podido enviar su código de seguridad correctamente.";
            }
        }
        else
        {
            $_POST["msj"] = "Su información no se ha validado correctamente.";
        }
    }

    function ConsultarUsuarios()
    {
        $respuesta = ConsultarUsuariosBD();

        if($respuesta -> num_rows > 0)
        {
            while ($row = mysqli_fetch_array($respuesta)) 
            { 
                echo "<tr>";
                echo "<td>" . $row["Identificacion"] . "</td>";
                echo "<td>" . $row["Nombre"] . "</td>";
                echo "<td>" . $row["Correo"] . "</td>";
                echo "<td>" . $row["NombreRol"] . "</td>";
                echo "</tr>";
            }
        }
    }

?>