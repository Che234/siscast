class busquedas{

    constructor(campBuscar,tipoBuscar,secciones,expBuscar,cedula,rif,nomProp,apelProp,
        telefono,direcProp,cedula2){}
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
    veriActProp(){
        if(!ex_datcort.test(this.cedR)){
            alert("Error en campo de Nacionalidad de Cedula");
            return false;
        }
        if(!ex_cedula.test(this.cedConst)){
            alert("Error en campo de Número de Cedula");
            return false;
        }
        if(!ex_datcort.test(this.rifR)){
            alert("Error en campo de Denominación de Rif");
            return false;
        }
        if(!ex_rif.test(this.rifN)){
            alert("Error en campo de Número de Rif");
            return false;
        }
        if(!ex_datos.test(this.nomProp)){
            alert("Error en campo de Nombre");
            return false;
        }
        if(!ex_datos.test(this.apelProp)){
            alert("Error en campo de Apellido");
            return false;
        }
        // if(!ex_Telef.test(this.codTelf)){
        //     alert("Error en campo de Código de Telefono");
        //     return false;
        // }
        if(!ex_Telefono.test(this.numTelf)){
            alert("Error en campo de Número de Telefono");
            return false;
        }
        if(!er_areas.test(this.direcProp)){
            alert("Error en campo de Dirección");
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
    tipoModif(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('MostResult');
        var divsitiomaterial = document.getElementById('MostResult');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recBuscar.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`accion=mostRest`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
			     }
	       	}
    }
    FormCambios(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('modificaciones');
        var divsitiomaterial = document.getElementById('modificaciones');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recBuscar.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`secciones=${this.secciones}&expBuscar=${this.expBuscar}`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText;
                    let secciones = document.getElementById("secciones").value ;
                    dividirCed(secciones);
                 }
               }
               
    }
    guarActProp(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('modificaciones');
        var divsitiomaterial = document.getElementById('modificaciones');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recBuscar.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`cedula=${this.cedula}&cedula2=${this.cedula2}&rif=${this.rif}&nomProp=${this.nomProp}&apelProp=${this.apelProp}&telefono=${this.telefono}&direcProp=${this.direcProp}&accion=actProp`); 
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
function mostTipModif(){
    let busque = new busquedas;
    busque.tipoModif();
}
function btnFormCambios(){
    let busque = new busquedas;
    busque.secciones = document.getElementById("secciones").value
    busque.expBuscar = document.getElementById("expBuscar").value
    busque.FormCambios();
}
//PROPIETARIO
function dividirCed(secciones="no"){
    if(secciones=="Propietario"){
        cedula = document.getElementById("divCedula").value;
        rif = document.getElementById("divRif").value;
        telf = document.getElementById("divTelf").value;
        divCed= cedula.split('-')
        divRif = rif.split('-')
        divTelf = telf.split('-')
        document.getElementById("cedR").value=divCed[0];
        document.getElementById("cedConst").value=divCed[1];
        document.getElementById("rifR").value=divRif[0]
        document.getElementById("rifN").value=divRif[1]
        document.getElementById("codTelf").value= divTelf[0]
        document.getElementById("numTelf").value = divTelf[1]
    }
    if(secciones=="Inmueble"){
        telefono = document.getElementById("telefono").value
        diviTelef = telefono.split("-")
        document.getElementById("codTelf2").value= diviTelef[0]
        document.getElementById("numTelf2").value = diviTelef[1]
        parr=document.getElementById("parr").value
        
        if(parr=="Capital"){
            document.getElementById("parrInmue").selectedIndex=1
            btnCambSec()
        }
        if(parr=="Dr. Alberto Adriani"){
            document.getElementById("parrInmue").selectedIndex=2
            btnCambSec()
        }
        if(parr=="Santo Domingo"){
            document.getElementById("parrInmue").selectedIndex=3
            btnCambSec()
        }
        
        let ambito = document.getElementById("ambito").value
        if(ambito=="Urbano"){
            document.getElementById("ambInmue").selectedIndex=1
        }
        if(ambito=="Rural"){
            document.getElementById("ambInmue").selectedIndex=2
        }
        setTimeout(function (){
            sectorCamb()
        },100)
        
    }
}
function btnActProp(){
    let busque = new busquedas
    cedR = document.getElementById("cedR").value
    cedConst = document.getElementById("cedConst").value
    busque.cedula2 = document.getElementById("divCedula").value;
    busque.cedula = cedR+"-"+cedConst
    rifR = document.getElementById("rifR").value
    rifN = document.getElementById("rifN").value
    busque.rif = rifR+"-"+rifN
    busque.nomProp = document.getElementById("nomProp").value
    busque.apelProp = document.getElementById("apelProp").value
    busque.codTelf = document.getElementById("codTelf").value
    busque.numTelf = document.getElementById("numTelf").value
    busque.telefono = busque.codTelf+"-"+busque.numTelf
    busque.direcProp = document.getElementById("direcProp").value
    if(busque.veriActProp()==true){
        busque.guarActProp();
    }
    
}
function sectorCamb(){
    let sector = document.getElementById("sector").value
    let sect = document.getElementById("secInmue")
    let l=0
        while(sect.value != sector){
            document.getElementById("secInmue").selectedIndex=l
            l++
        }
}
function btnActInmue(){
    codTelf2 = document.getElementById("codTelf2").value
    
}