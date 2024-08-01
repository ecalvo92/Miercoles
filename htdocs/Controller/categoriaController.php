<?php include_once '../Model/categoriaModel.php';

    function ConsultarCategorias()
    {
        $respuesta = ConsultarCategoriasBD();
        echo "<option value=''> Seleccione </option>";
        
        if($respuesta -> num_rows > 0)
        {
            while ($row = mysqli_fetch_array($respuesta)) 
            { 
                echo "<option value=" . $row["IdCategoria"] . ">" . $row["NombreCategoria"] . "</option>";
            }
        }
    }

    function ConsultarCategoriasEditar($IdCategoria)
    {
        $respuesta = ConsultarCategoriasBD();
        echo "<option value=''> Seleccione </option>";
        
        if($respuesta -> num_rows > 0)
        {
            while ($row = mysqli_fetch_array($respuesta)) 
            { 
                if($IdCategoria == $row["IdCategoria"])
                {
                    echo "<option selected value=" . $row["IdCategoria"] . ">" . $row["NombreCategoria"] . "</option>";
                }
                else
                {
                    echo "<option value=" . $row["IdCategoria"] . ">" . $row["NombreCategoria"] . "</option>";
                }
            }
        }
    }

    

?>