function SoloNumeros(e) {
    var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode;
  
    if (keyCode >= 48 && keyCode <= 57) {
      return true;
    }

    return false;
  }

  function SoloMontos(e, elemento)
  {
    let valor = elemento.value;
    let keyCode = e.keyCode == 0 ? e.charCode : e.keyCode;
  
    if (keyCode >= 48 && keyCode <= 57) {
      return true;
    }
    else if(keyCode == 46){
        //el indexOf valida si un caracter se encuentra en un string = -1 es que no existe
        if(valor.indexOf(".") == -1){ 
            return true;
        }
    }

    return false;
  }