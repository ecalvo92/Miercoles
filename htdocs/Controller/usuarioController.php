<?php include_once '../Model/usuarioModel.php';

    if(isset($_POST["btnProcesar"]))
    {
        RegistrarUsuario();
        header("location: ../View/login.php");
    }

?>