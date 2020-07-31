class renovacion{

    construct(){
        expBuscar
    }

    busRenov(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campGeneral');
        var divsitiomaterial = document.getElementById('campGeneral');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recRenovacion.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`expBuscar=${this.expBuscar}&accion=BusRenov`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText;
			     }
	       	}
    }

}
function btnRevConst(){
    let renov = new renovacion()
    renov.expBuscar = document.getElementById("expBuscar").value
    renov.busRenov();
}