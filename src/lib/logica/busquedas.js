class busquedas{

    constructor(campBuscar,tipoBuscar){}
    veriBuscar(){
        if(!ex_datcort.test(this.campBuscar)){
            alert("Campo de buscar no puede estar vacio");
            return false;
        }
        if(this.tipoBuscar =="0"){
            alert("Campo de dato a buscar no puede estar vacio");
            return false;
        }
        return true
    }
    constExp(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campGeneral');
        var divsitiomaterial = document.getElementById('campGeneral');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recBuscar.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`tipoBuscar=${this.tipoBuscar}&campBuscar=${this.campBuscar}&accion=busExp`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
			     }
	       	}
    }
}
function btnConsultExp(){
    let busque = new busquedas;
    busque.campBuscar = document.getElementById("campBuscar").value
    busque.tipoBuscar = document.getElementById("tipoBuscar").value
    if(busque.veriBuscar()==true){
        busque.constExp();
    }
}