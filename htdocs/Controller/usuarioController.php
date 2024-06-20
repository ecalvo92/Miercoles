<?php include_once '../Model/usuarioModel.php';
      include_once 'comunController.php';

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

        $respuesta = EPUsuario($Email,$Password);

        if($respuesta -> num_rows > 0)
        {
            header("location: ../View/home.php");
        }
        else
        {
            $_POST["msj"] = "Su información no se ha validado correctamente.";
        }
    }

    if(isset($_POST["btnRecuperarAcceso"]))
    {
        $Email = $_POST["txtEmail"];

        $respuesta = RecuperarAcceso($Email);

        if($respuesta -> num_rows > 0)
        {
            EnviarCorreo('Prueba Asunto', 'Prueba Cuerpo Correo', 'ecalvo90415@ufide.ac.cr');
        }
        else
        {
            
        }
    }

?>