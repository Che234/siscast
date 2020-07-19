class busquedas{

    constructor(campBuscar,tipoBuscar,secciones,expBuscar,cedula,rif,nomProp,apelProp,
        telefono,direcProp,cedula2,parrInmue,secInmue,direcInmue,ambInmue,idInmueble,topoConst,formaConst,
        regInmue,usoConst,tenenConst,ocupConst,dimeConst,idCarac,destConst,estConst,pareTipoInmue,
        pareAcaInmue,pintConst,estConserv,techoConst,pisosConst,piezConst,ventConst,puertConst,
        instElect,ambConst,compConst,obsConst,idCaracConst,docDebConst,direcProtConst,numProtConst,
        tomoProtConst,folioProtConst,protoConst,trimProtConst,dateProtConst,valorProtConst,idProto){}
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
    veriActInmue(){
        if(!ex_datcort.test(this.parrInmue)){
            alert("Error en campo de Parroquia");
            return false;
        }
        if(!ex_datcort.test(this.secInmue)){
            alert("Error en campo de Sector");
            return false;
        }
        if(!er_areas.test(this.direcInmue)){
            alert("Error en campo de Dirección");
            return false;
        }
        if(!ex_datcort.test(this.ambInmue)){
            alert("Error en campo de Ambito");
            return false;
        }
        return true
    }
    veriConst(){
        if(!ex_datcort.test(this.destConst)){
            alert("Error en campo de Destino");
            return false;
        }
        if(!ex_datcort.test(this.estConst)){
            alert("Error en campo de Estructura");
            return false;
        }
        if(!ex_datcort.test(this.pareTipoInmue)){
            alert("Error en campo de Paredes Tipo");
            return false;
        }
        if(!ex_datcort.test(this.pareAcaInmue)){
            alert("Error en campo de Paredes Acabado");
            return false;
        }
        if(!ex_datcort.test(this.pintConst)){
            alert("Error en campo de Pintura");
            return false;
        }
        if(!ex_datcort.test(this.estConserv)){
            alert("Error en campo de Estado de Conservación");
            return false;
        }
        if(!ex_datcort.test(this.techoConst)){
            alert("Error en campo de Techo");
            return false;
        }
        if(!ex_datcort.test(this.pisosConst)){
            alert("Error en campo de Pisos");
            return false;
        }
        if(!ex_datcort.test(this.piezConst)){
            alert("Error en campo de Piezas Sanitarias");
            return false;
        }
        if(!ex_datcort.test(this.ventConst)){
            alert("Error en campo de Ventanas");
            return false;
        }
        if(!ex_datcort.test(this.puertConst)){
            alert("Error en campo de Puertas");
            return false;
        }
        if(!ex_datcort.test(this.instElect)){
            alert("Error en campo de Instalaciones Electricas");
            return false;
        }
        if(!ex_datcort.test(this.ambConst)){
            alert("Error en campo de Ambientes");
            return false;
        }
        if(!ex_datcort.test(this.compConst)){
            alert("Error en campo de Complementos");
            return false;
        }
        if(!ex_datcort.test(this.obsConst)){
            alert("Error en campo de Observaciones");
            return false;
        }
        return true
    }
    veriProto(){
        if(!ex_datcort.test(this.docDebConst)){
            alert("Error en el formato de Documento debidamente");
            return false;
        }
        if(!ex_datcort.test(this.direcProtConst)){
            alert("Error en el formato de Dirección de protocolización");
            return false;
        }
        if(!ex_carnet.test(this.numProtConst)){
            alert("Error en el formato de Numero de protocolización");
            return false;
        }
        if(!ex_trayec.test(this.tomoProtConst)){
            alert("Error en el formato de Tomo");
            return false;
        }
        if(!ex_fecha.test(this.folioProtConst)){
            alert("Error en el formato de Folio");
            return false;
        }
        if(!ex_trayec.test(this.protoConst)){
            alert("Error en el formato de Protocolo");
            return false;
        }
        if(!ex_trayec.test(this.trimProtConst)){
            alert("Error en el formato de Trimestre");
            return false;
        }
        if(!ex_fecha.test(this.dateProtConst)){
            alert("Error en el formato de Fecha");
            return false;
        }
        if(!ex_money.test(this.valorProtConst)){
            alert("Error en el formato de Valor del inmueble");
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
    guarActInmue(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('modificaciones');
        var divsitiomaterial = document.getElementById('modificaciones');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recBuscar.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`telefono=${this.telefono}&parrInmue=${this.parrInmue}&secInmue=${this.secInmue}&direcInmue=${this.direcInmue}&ambInmue=${this.ambInmue}&idInmueble=${this.idInmueble}&accion=actInmue`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
			     }
	       	}
    }
    actCaracInmue(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('modificaciones');
        var divsitiomaterial = document.getElementById('modificaciones');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recBuscar.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`topoConst=${this.topoConst}&formaConst=${this.formaConst}&regInmue=${this.regInmue}&usoConst=${this.usoConst}&tenenConst=${this.tenenConst}&ocupConst=${this.ocupConst}&dimeConst=${this.dimeConst}&idCarac=${this.idCarac}&accion=actCaracInmue`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
			     }
	       	}
    }
    actConst(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('modificaciones');
        var divsitiomaterial = document.getElementById('modificaciones');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recBuscar.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`destConst=${this.destConst}&estConst=${this.estConst}&pareTipoInmue=${this.pareTipoInmue}&pareAcaInmue=${this.pareAcaInmue}&pintConst=${this.pintConst}&estConserv=${this.estConserv}&techoConst=${this.techoConst}&pisosConst=${this.pisosConst}&piezConst=${this.piezConst}&ventConst=${this.ventConst}&puertConst=${this.puertConst}&instElect=${this.instElect}&ambConst=${this.ambConst}&compConst=${this.compConst}&obsConst=${this.obsConst}&idCaracConst=${this.idCaracConst}&accion=actConst`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
			     }
	       	}
    }
    actProtocol(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('modificaciones');
        var divsitiomaterial = document.getElementById('modificaciones');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recBuscar.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`docDebConst=${this.docDebConst}&direcProtConst=${this.direcProtConst}&numProtConst=${this.numProtConst}&tomoProtConst=${this.tomoProtConst}&folioProtConst=${this.folioProtConst}&protoConst=${this.protoConst}&trimProtConst=${this.trimProtConst}&dateProtConst=${this.dateProtConst}&valorProtConst=${this.valorProtConst}&idProto=${this.idProto}&accion=actProtocol`); 
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
    if(secciones=="Caract Terreno"){
        let topografia = document.getElementById("topografia").value
        let formaConst = document.getElementById("forma").value
        let regimen = document.getElementById("regimen").value
        let tenencia = document.getElementById("tenencia").value
        let ocupante = document.getElementById("ocupante").value
        if(topografia=="Terreno Llano"){
            document.getElementById("topoConst").selectedIndex=1
        }
        if(topografia=="Terreno Quebrado"){
            document.getElementById("topoConst").selectedIndex=2
        }
        if(formaConst=="Regular"){
            document.getElementById("formaConst").selectedIndex=1
        }
        if(formaConst =="Irregular"){
            document.getElementById("formaConst").selectedIndex=2
        }
        if(regimen =="Propiedad Horizontal"){
            document.getElementById("regInmue").selectedIndex=1
        }
        if(regimen =="Condominio"){
            document.getElementById("regInmue").selectedIndex=2
        }
        if(regimen=="Sucesion"){
            document.getElementById("regInmue").selectedIndex=3
        }
        setTimeout(function(){
            usoCarac()
        },100)
        setTimeout(function(){
            tenenciaCarac()
        },100)
        setTimeout(function(){
            ocupConst()
        },100)
        setTimeout(function(){
            dimesionConst()
        },100)
    }
    if(secciones=="Caract Construccion"){
        setTimeout(function(){
            destinoConstru()
        },100)
        setTimeout(function(){
            estructuraConst()
        },100)
        setTimeout(function(){
            paredesConstru()
        },100)
        setTimeout(function(){
            acabadoConstru()
        },100)
        setTimeout(function(){
            pinturaConstru()
        },100)
        setTimeout(function(){
            estadoConstru()
        },100)
        setTimeout(function(){
            techoConstru()
        },100)
        setTimeout(function(){
            pisosConstru()
        },100)
        setTimeout(function(){
            piezasConst()
        },100)
        setTimeout(function(){
            ventanasConst()
        },100)
        setTimeout(function(){
            puertasConst()
        },100)
        setTimeout(function(){
            electConst()
        },100)
        setTimeout(function(){
            compleConst()
        },100)
        setTimeout(function(){
            ambConst()
        },100)
    }
    if(secciones=="Protocolizacion"){

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
//INMUEBLE
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
    let busque = new busquedas
    codTelf2 = document.getElementById("codTelf2").value
    numTelf2 = document.getElementById("numTelf2").value
    busque.telefono = codTelf2+"-"+numTelf2
    busque.parrInmue = document.getElementById("parrInmue").value
    busque.secInmue = document.getElementById("secInmue").value
    busque.direcInmue = document.getElementById("direcInmue").value
    busque.ambInmue = document.getElementById("ambInmue").value
    busque.idInmueble = document.getElementById("idInmueble").value
    if(busque.veriActInmue()==true){
        busque.guarActInmue()
    }
    


    
}
//CARACTERISTICAS DEL TERRENO
function usoCarac(){
    let uso = document.getElementById("uso").value
        let usoConst = document.getElementById("usoConst")
        let k=0
    while(uso !=usoConst.value){
        document.getElementById("usoConst").selectedIndex=k
        k++
    }
}
function tenenciaCarac(){
        let tenencia = document.getElementById("tenencia").value
        let tenenConst = document.getElementById("tenenConst")
        let k=0
    while(tenencia !=tenenConst.value){
        document.getElementById("tenenConst").selectedIndex=k
        k++
    }
}
function ocupConst(){
    let ocupante = document.getElementById("ocupante").value
    let ocupConst = document.getElementById("ocupConst")
    let k=0
    while(ocupante !=ocupConst.value){
        document.getElementById("ocupConst").selectedIndex=k
        k++
    }
}
function dimesionConst(){
    let dimenciones = document.getElementById("dimenciones").value
    let dimeConst = document.getElementById("dimeConst")
    let k=0
    while(dimenciones !=dimeConst.value){
        document.getElementById("dimeConst").selectedIndex=k
        k++
    }
}
function btnActCaracInmue(){
    let busque = new busquedas
    busque.topoConst = document.getElementById("topoConst").value
    busque.formaConst = document.getElementById("formaConst").value
    busque.regInmue = document.getElementById("regInmue").value
    busque.usoConst = document.getElementById("usoConst").value
    busque.tenenConst = document.getElementById("tenenConst").value
    busque.ocupConst = document.getElementById("ocupConst").value
    busque.dimeConst = document.getElementById("dimeConst").value
    busque.idCarac = document.getElementById("idCarac").value
    busque.actCaracInmue()
}
//CARACTERISTICAS DE LA CONSTRUCCION
function destinoConstru(){
    let destino = document.getElementById("destino").value
    let destConst = document.getElementById("destConst")
    let k=0
    while(destino !=destConst.value){
        document.getElementById("destConst").selectedIndex=k
        k++
    }
}
function estructuraConst(){
    let estructura = document.getElementById("estructura").value
    let estConst = document.getElementById("estConst")
    let k=0
    while(estructura !=estConst.value){
        document.getElementById("estConst").selectedIndex=k
        k++
    }
}
function paredesConstru(){
    let paredes_tipo = document.getElementById("paredes_tipo").value
    let pareTipoInmue = document.getElementById("pareTipoInmue")
    let k=0
    while(paredes_tipo !=pareTipoInmue.value){
        document.getElementById("pareTipoInmue").selectedIndex=k
        k++
    }
}
function acabadoConstru(){
    let paredes_acabado = document.getElementById("paredes_acabado").value
    let pareAcaInmue = document.getElementById("pareAcaInmue")
    let k=0
    while(paredes_acabado !=pareAcaInmue.value){
        document.getElementById("pareAcaInmue").selectedIndex=k
        k++
    }
}
function pinturaConstru(){
    let pintura = document.getElementById("pintura").value
    let pintConst = document.getElementById("pintConst")
    let k=0
    while(pintura !=pintConst.value){
        document.getElementById("pintConst").selectedIndex=k
        k++
    }
}
function estadoConstru(){
    let estado_conservacion = document.getElementById("estado_conservacion").value
    let estConserv = document.getElementById("estConserv")
    let k=0
    while(estado_conservacion !=estConserv.value){
        document.getElementById("estConserv").selectedIndex=k
        k++
    }
}
function techoConstru(){
    let techo = document.getElementById("techo").value
    let techoConst = document.getElementById("techoConst")
    let k=0
    while(techo !=techoConst.value){
        document.getElementById("techoConst").selectedIndex=k
        k++
    }
}
function pisosConstru(){
    let pisos = document.getElementById("pisos").value
    let pisosConst = document.getElementById("pisosConst")
    let k=0
    while(pisos !=pisosConst.value){
        document.getElementById("pisosConst").selectedIndex=k
        k++
    }
}
function piezasConst(){
    let piezas_sanitarias = document.getElementById("piezas_sanitarias").value
    let piezConst = document.getElementById("piezConst")
    let k=0
    while(piezas_sanitarias !=piezConst.value){
        document.getElementById("piezConst").selectedIndex=k
        k++
    }
}
function ventanasConst(){
    let ventanas = document.getElementById("ventanas").value
    let ventConst = document.getElementById("ventConst")
    let k=0
    while(ventanas !=ventConst.value){
        document.getElementById("ventConst").selectedIndex=k
        k++
    }
}
function puertasConst(){
    let puertas = document.getElementById("puertas").value
    let puertConst = document.getElementById("puertConst")
    let k=0
    while(puertas !=puertConst.value){
        document.getElementById("puertConst").selectedIndex=k
        k++
    }
}
function electConst(){
    let insta_electricas = document.getElementById("insta_electricas").value
    let instElect = document.getElementById("instElect")
    let k=0
    while(insta_electricas !=instElect.value){
        document.getElementById("instElect").selectedIndex=k
        k++
    }
}
function compleConst(){
    let complementos = document.getElementById("complementos").value
    let compConst = document.getElementById("compConst")
    let k=0
    while(complementos !=compConst.value){
        document.getElementById("compConst").selectedIndex=k
        k++
    }
}
function ambConst(){
    let ambientes = document.getElementById("ambientes").value
    let ambConst = document.getElementById("ambConst")
    let k=0
    while(ambientes !=ambConst.value){
        document.getElementById("ambConst").selectedIndex=k
        k++
    }
}
function btnActConst(){
    let busque = new busquedas
    busque.destConst = document.getElementById("destConst").value
    busque.estConst = document.getElementById("estConst").value
    busque.pareTipoInmue = document.getElementById("pareTipoInmue").value
    busque.pareAcaInmue = document.getElementById("pareAcaInmue").value
    busque.pintConst = document.getElementById("pintConst").value
    busque.estConserv = document.getElementById("estConserv").value
    busque.techoConst = document.getElementById("techoConst").value
    busque.pisosConst = document.getElementById("pisosConst").value
    busque.piezConst = document.getElementById("piezConst").value
    busque.ventConst = document.getElementById("ventConst").value
    busque.puertConst = document.getElementById("puertConst").value
    busque.instElect = document.getElementById("instElect").value
    busque.ambConst = document.getElementById("ambConst").value
    busque.compConst = document.getElementById("compConst").value
    busque.obsConst = document.getElementById("obsConst").value
    busque.expBuscar = document.getElementById("expBuscar").value
    busque.idCaracConst = document.getElementById("idCaracConst").value
    if(busque.veriConst()==true){
        busque.actConst()
    }
    

}
//DATOS DE PROTOCOLIZACION
function btnActProtocol(){
    let busque = new busquedas()
    busque.docDebConst = document.getElementById("docDebConst").value
    busque.direcProtConst = document.getElementById("direcProtConst").value
    busque.numProtConst = document.getElementById("numProtConst").value
    busque.tomoProtConst = document.getElementById("tomoProtConst").value
    busque.folioProtConst = document.getElementById("folioProtConst").value
    busque.protoConst = document.getElementById("protoConst").value
    busque.trimProtConst= document.getElementById("trimProtConst").value
    busque.dateProtConst = document.getElementById("dateProtConst").value
    busque.valorProtConst = document.getElementById("valorProtConst").value
    busque.idProto = document.getElementById("idProto").value
    if(busque.veriProto()==true){
        busque.actProtocol()
    }
}
