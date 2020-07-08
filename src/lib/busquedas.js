class busquedas{

    constructor(campBuscar)
    constExp(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campGeneral');
        var divsitiomaterial = document.getElementById('campGeneral');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recbusqueda.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send("&accion=busExp"); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
			     }
	       	}
    }
}
function busConstExp(){
    let busque = new busquedas;
    busque.campBuscar = document.getElementById("campBuscar").value
    busque.constExp();
}