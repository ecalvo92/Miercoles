<?php include_once '../Model/carritoModel.php';
      include_once 'comunController.php';

    if(session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if(isset($_POST["RegistrarCarrito"]))
    {
        $IdProducto = $_POST["IdProducto"];
        $Cantidad = $_POST["Cantidad"];

        RegistrarCarrito($_SESSION["ConsecutivoUsuario"], $IdProducto, $Cantidad);
        echo "Producto añadido correctamente al carrito";
    }

    function ConsultarResumenCarrito()
    {
        $respuesta = ConsultarResumenCarritoBD($_SESSION["ConsecutivoUsuario"]);
        $row = mysqli_fetch_array($respuesta);

        $_SESSION["Cantidad"] = $row["Cantidad"];
        $_SESSION["SubTotal"] = $row["SubTotal"];
    }

?>