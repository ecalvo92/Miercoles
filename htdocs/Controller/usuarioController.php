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
            $_SESSION["ConsecutivoUsuario"] = $datos["Consecutivo"];
            $_SESSION["RolUsuario"] = $datos["IdRol"];
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
            $resp = ActualizarContrasenna($datos["Consecutivo"],$codigo,true);

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
        $ConsecutivoLogueado = $_SESSION["ConsecutivoUsuario"];
        $respuesta = ConsultarUsuariosBD($ConsecutivoLogueado);

        if($respuesta -> num_rows > 0)
        {
            while ($row = mysqli_fetch_array($respuesta)) 
            { 
                echo "<tr>";
                echo "<td>" . $row["Identificacion"] . "</td>";
                echo "<td>" . $row["Nombre"] . "</td>";
                echo "<td>" . $row["Correo"] . "</td>";
                echo "<td>" . $row["NombreEstado"] . "</td>";
                echo "<td>" . $row["NombreRol"] . "</td>";
                echo '<td>
                        <button type="button" class="btn btn-primary AbrirModal" data-toggle="modal" data-target="#ModalUsuarios" 
                        data-id=' . $row["Consecutivo"] . ' data-name="' . $row["Nombre"] . '">
                            <i class="fa fa-edit"></i>
                        </button>

                        <a href="actualizarUsuario.php?q=' . $row["Consecutivo"] . '" class="btn btn-primary">
                            <i class="fa fa-user"></i>
                        </a>

                     </td>';
                echo "</tr>";
            }
        }
    }

    function ConsultarUsuario($Consecutivo)
    {
        $respuesta = ConsultarUsuarioBD($Consecutivo);
        if($respuesta -> num_rows > 0)
        {
            return mysqli_fetch_array($respuesta);
        }
    }

    if(isset($_POST["btnCambiarEstadoUsuario"]))
    {
        $Consecutivo = $_POST["txtConsecutivo"];
        $respuesta = CambiarEstadoUsuario($Consecutivo);

        if($respuesta == true)
        {
            header("location: ../View/consultarUsuarios.php");
        }
        else
        {
            $_POST["msj"] = "No se ha podido inactivar la información del usuario.";
        }
    }

    if(isset($_POST["btnCerrarSesion"]))
    {
        session_destroy();
        header("location: ../View/login.php");
    }

    if(isset($_POST["btnActualizarUsuario"]))
    {
        $Consecutivo = $_POST["txtConsecutivo"];
        $Identificacion = $_POST["txtIdentificacion"];
        $pNombre = $_POST["txtNombre"];
        $Correo = $_POST["txtEmail"];
        $IdRol = $_POST["selectRol"];

        if($IdRol == NULL)
        {
            $IdRol = -1;
        }

        $respuesta = ActualizarUsuario($Consecutivo,$Identificacion,$pNombre,$Correo,$IdRol);

        if($respuesta == true)
        {
             //lo llevo a la pantalla de usuarios para revisar el cambio del usuario actualizado
            header("location: ../View/consultarUsuarios.php");
        }
        else
        {
            $_POST["msj"] = "No se ha podido actualizar la información del usuario.";
        }
    }

    if(isset($_POST["btnActualizarPerfil"]))
    {
        $Consecutivo = $_POST["txtConsecutivo"];
        $Identificacion = $_POST["txtIdentificacion"];
        $pNombre = $_POST["txtNombre"];
        $Correo = $_POST["txtEmail"];
        $IdRol = $_POST["selectRol"];

        if($IdRol == NULL)
        {
            $IdRol = -1;
        }

        $respuesta = ActualizarUsuario($Consecutivo,$Identificacion,$pNombre,$Correo,$IdRol);

        if($respuesta == true)
        {
            //lo llevo a la pantalla principal y actualizo el nombre de la sesión del usuario logueado
            $_SESSION["NombreUsuario"] = $_POST["txtNombre"];
            header("location: ../View/home.php");
        }
        else
        {
            $_POST["msj"] = "No se ha podido actualizar la información de su perfil.";
        }
    }

    if(isset($_POST["btnActualizarContrasenna"]))
    {
        $PasswordNueva = $_POST["txtPasswordNueva"];
        $PasswordConfirmar = $_POST["txtPasswordConfirmar"];
    
        if($PasswordNueva != $PasswordConfirmar)
        {
            $_POST["msj"] = "Las contraseñas ingresadas no coinciden.";
        }
        else
        {
            $respuesta = ActualizarContrasenna($_SESSION["ConsecutivoUsuario"], $PasswordNueva, false);

            if($respuesta == true)
            {
                header("location: ../View/home.php");
            }
            else
            {
                $_POST["msj"] = "No se ha podido actualizar la información de su contraseña.";
            }
        }

    }

?>