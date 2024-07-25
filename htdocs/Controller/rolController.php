<?php include_once '../Model/rolModel.php';

    function ConsultarRoles($IdRol)
    {
        $respuesta = ConsultarRolesBD();

        if($respuesta -> num_rows > 0)
        {
            while ($row = mysqli_fetch_array($respuesta)) 
            { 
                if($IdRol == $row["IdRol"])
                {
                    echo "<option selected value=" . $row["IdRol"] . ">" . $row["NombreRol"] . "</option>";
                }
                else
                {
                    echo "<option value=" . $row["IdRol"] . ">" . $row["NombreRol"] . "</option>";
                }
            }
        }
    }

?>