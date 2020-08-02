class busquedas{

    constructor(campBuscar,tipoBuscar,secciones,expBuscar,cedula,rif,nomProp,apelProp,
        telefono,direcProp,cedula2,parrInmue,secInmue,direcInmue,ambInmue,idInmueble,topoConst,formaConst,
        regInmue,usoConst,tenenConst,ocupConst,dimeConst,idCarac,destConst,estConst,pareTipoInmue,
        pareAcaInmue,pintConst,estConserv,techoConst,pisosConst,piezConst,ventConst,puertConst,
        instElect,ambConst,compConst,obsConst,idCaracConst,docDebConst,direcProtConst,numProtConst,
        tomoProtConst,folioProtConst,protoConst,trimProtConst,dateProtConst,valorProtConst,idProto,
        n_gen,s_gen,e_gen,o_gen,alindN_gen,alindS_gen,alindE_gen,alindO_gen,area_gen,niveles_gen,
        areaConst_gen,uniN_gen,uniS_gen,uniE_gen,uniO_gen,idGen,n_posventa,s_posVenta,e_posVenta,
        o_posVenta,alindN_posVenta,alindS_posVenta,alindE_posVenta,alindO_posVenta,area_posVenta,
        niveles_posVenta,areaConst_posVenta,uniN_posVenta,uniS_posVenta,uniE_posVenta,uniO_posVenta,
        idPosVenta,idlindGen,idlindDocumento,nortGen,uniNorte,alindNort,surGen,uniSur,alindSurm,esteGen,
        uniEste,alindEste,oesteGen,uniOeste,alindOeste,arTotal,NivConstTotal,arConstTotal,nortPosVenta,
        uniNorte2,alindPosNort,surPosVenta,uniSur2,alindPosSur,estePosVenta,uniEste2,alindPosEste,
        oestePosVenta,uniOeste2,alindPosOeste,arTotal2,NivConstTotal2,arConstTotal2,nortSecDoc,
        uniNorte3,alindSecNorte,surSecDoc,uniSur3,alindSecSur,esteSecDoc,uniEste3,alindSecEste,
        oesteSecDoc,uniOeste3,alindSecOeste,arTotal3,NivConstTotal3,arConstTotal3,idlindPosVenta,
        arTotalVenta,arRestante,valorTerreno,valorInmueble,valorConstruc,idTerreno,Acue,AcueRural,
        AguasSub,AguasServ,PavFlex,PavRig,viaEngran,acera,AlumPublico,aseo,transPublic,pozoSept,
        ElectResidencial,ElectriIndust,linTelf,idServ,montoFact,numFact,fechFact,tipoCed){}
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
    veriCed(){
        if(!ex_datcort.test(this.tipoBuscar)){
            alert("Error en el formato de Documento ha Buscar");
            return false;
        }
        if(!ex_datcort.test(this.tipoCed)){
            alert("Error en el formato de tipo de Documento");
            return false;
        }
        if(!ex_cedula.test(this.campBuscar)){
            alert("Error en el formato de numero de Cedula");
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
        ajax.send(`campBuscar=${this.campBuscar}&tipoBuscar=${this.tipoBuscar}&accion=busExp`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
			     }
	       	}
    }
    consultCed(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campGeneral');
        var divsitiomaterial = document.getElementById('campGeneral');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recBuscar.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`tipoBuscar=${this.tipoBuscar}&tipoCed=${this.tipoCed}&campBuscar=${this.campBuscar}&accion=busExp`); 
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
    accioGeneral(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('identifiId');
        var divsitiomaterial = document.getElementById('identifiId');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recBuscar.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`idlindGen=${this.idlindGen}&accion=actGeneral`);
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
                    btnAplicGen()
			     }
	       	}
    }
    accioPosVenta(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('identifiId2');
        var divsitiomaterial = document.getElementById('identifiId2');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recBuscar.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`idlindPosVenta=${this.idlindPosVenta}&accion=actPosVenta`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
                    btnAplicPosVenta()
			     }
	       	}
    }
    accioSecDoc(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('identifiId3');
        var divsitiomaterial = document.getElementById('identifiId3');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recBuscar.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`idlindDocumento=${this.idlindDocumento}&accion=actSecDoc`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
                    btnAplicSecDoc()
			     }
	       	}
    }
    
    
    guarActLind(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('modificaciones');
        var divsitiomaterial = document.getElementById('modificaciones');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recBuscar.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`nortGen=${this.nortGen}&uniNorte=${this.uniNorte}&alindNort=${this.alindNort}&surGen=${this.surGen}&uniSur=${this.uniSur}&alindSur=${this.alindSur}&esteGen=${this.esteGen}&uniEste=${this.uniEste}&alindEste=${this.alindEste}&oesteGen=${this.oesteGen}&uniOeste=${this.uniOeste}&alindOeste=${this.alindOeste}&arTotal=${this.arTotal}&NivConstTotal=${this.NivConstTotal}&arConstTotal=${this.arConstTotal}&nortPosVenta=${this.nortPosVenta}&uniNorte2=${this.uniNorte2}&alindPosNort=${this.alindPosNort}&surPosVenta=${this.surPosVenta}&uniSur2=${this.uniSur2}&alindPosSur=${this.alindPosSur}&estePosVenta=${this.estePosVenta}&uniEste2=${this.uniEste2}&alindPosEste=${this.alindPosEste}&oestePosVenta=${this.oestePosVenta}&uniOeste2=${this.uniOeste2}&alindPosOeste=${this.alindPosOeste}&arTotal2=${this.arTotal2}&NivConstTotal2=${this.NivConstTotal2}&arConstTotal2=${this.arConstTotal2}&nortSecDoc=${this.nortSecDoc}&uniNorte3=${this.uniNorte3}&alindSecNorte=${this.alindSecNorte}&surSecDoc=${this.surSecDoc}&uniSur3=${this.uniSur3}&alindSecSur=${this.alindSecSur}&esteSecDoc=${this.esteSecDoc}&uniEste3=${this.uniEste3}&alindSecEste=${this.alindSecEste}&oesteSecDoc=${this.oesteSecDoc}&uniOeste3=${this.uniOeste3}&alindSecOeste=${this.alindSecOeste}&arTotal3=${this.arTotal3}&NivConstTotal3=${this.NivConstTotal3}&arConstTotal3=${this.arConstTotal3}&idlindDocumento=${this.idlindDocumento}&idlindPosVenta=${this.idlindPosVenta}&idlindGen=${this.idlindGen}&accion=guarActLind`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
			     }
	       	}
    }
    guarActArea(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('modificaciones');
        var divsitiomaterial = document.getElementById('modificaciones');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recBuscar.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`arTotalVenta=${this.arTotalVenta}&arRestante=${this.arRestante}&valorTerreno=${this.valorTerreno}&valorInmueble=${this.valorInmueble}&valorConstruc=${this.valorConstruc}&idTerreno=${this.idTerreno}&accion=guarActArea`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
			     }
	       	}
    }
    guardActServ(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('modificaciones');
        var divsitiomaterial = document.getElementById('modificaciones');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recBuscar.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`Acue=${this.Acue}&AcueRural=${this.AcueRural}&AguasSub=${this.AguasSub}&AguasServ=${this.AguasServ}&PavFlex=${this.PavFlex}&PavRig=${this.PavRig}&viaEngran=${this.viaEngran}&acera=${this.acera}&AlumPublico=${this.AlumPublico}&aseo=${this.aseo}&transPublic=${this.transPublic}&pozoSept=${this.pozoSept}&ElectResidencial=${this.ElectResidencial}&ElectriIndust=${this.ElectriIndust}&linTelf=${this.linTelf}&idServ=${this.idServ}&accion=guarActServ`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
			     }
	       	}
    }
    formPagosInmue(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campGeneral');
        var divsitiomaterial = document.getElementById('campGeneral');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recBuscar.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`expBuscar=${this.expBuscar}&accion=formPagosInmue`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
			     }
	       	}
    }
    pagarInmue(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campGeneral');
        var divsitiomaterial = document.getElementById('campGeneral');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recBuscar.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`expBuscar=${this.expBuscar}&montoFact=${this.montoFact}&numFact=${this.numFact}&fechFact=${this.fechFact}&accion=pagarInmue`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
			     }
	       	}
    }
    verPagos(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campGeneral');
        var divsitiomaterial = document.getElementById('campGeneral');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recBuscar.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`expBuscar=${this.expBuscar}&tipoBuscar=${this.tipoBuscar}&accion=verPagos`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
			     }
	       	}
    }
    elimInmue(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campGeneral');
        var divsitiomaterial = document.getElementById('campGeneral');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recBuscar.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`expBuscar=${this.expBuscar}&accion=eliminarBus`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
			     }
	       	}
    }
}
function btnConsultExp(nuExp="0",tipBus="0"){
    let busque = new busquedas;
    numeExp = nuExp
    tipoBus = tipBus
    if(numeExp!="0"){
        if(tipoBus!="0"){
            busque.campBuscar = numeExp
            busque.tipoBuscar = tipoBus
            if(busque.veriBuscar()==true){
                busque.constExp();
            }
        }
    }else{
        busque.campBuscar = document.getElementById("campBuscar").value
        busque.tipoBuscar = document.getElementById("tipoBuscar").value
        if(busque.veriBuscar()==true){
            busque.constExp();
        }
    }
}
function btnConsultCed(){
    let busque = new busquedas
    busque.tipoBuscar = document.getElementById("tipoBuscar").value
    busque.tipoCed = document.getElementById("tipoCed").value
    busque.campBuscar = document.getElementById("campBuscar").value
    if(busque.veriCed()==true){
        busque.consultCed()
    }
}
function btnCampCed(){
    let tipoBuscar = document.getElementById("tipoBuscar").value
    if(tipoBuscar == "Cedula"){
        document.getElementById("tipoCed").hidden=false
        document.getElementById("tipoRif").hidden=true
        document.getElementById("consultExp").hidden=true
        document.getElementById("consultCed").hidden=false
    }
    if(tipoBuscar == "Rif"){
        document.getElementById("consultExp").hidden=true
        document.getElementById("consultCed").hidden=false
        document.getElementById("tipoRif").hidden=false
        document.getElementById("tipoCed").hidden=true
    }
    if(tipoBuscar == "Expediente"){
        document.getElementById("consultExp").hidden=false
        document.getElementById("consultCed").hidden=true
        document.getElementById("tipoRif").hidden=true
        document.getElementById("tipoCed").hidden=true
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
function btnElimInmue(){
    let busque = new busquedas
    busque.expBuscar= document.getElementById("expBuscar").value
    busque.elimInmue()
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
    if(secciones=="Linderos"){
        let lindGen = document.getElementById("lindGen").value
        let lindPosVenta = document.getElementById("lindPosVenta").value
        let lindDocumento = document.getElementById("lindDocumento").value
        let busque= new busquedas
        
        if(lindGen!="nada"){
            document.getElementById("lindGeneral").selectedIndex=1
            busque.idlindGen = document.getElementById("idlindGen").value
            actGeneral()
            setTimeout(function(){
                busque.accioGeneral()
            },300)
        }else{
            document.getElementById("lindGeneral").selectedIndex=0
            busque.idlindGen = "nada"
        }
        if(lindPosVenta!="nada"){
            document.getElementById("posVenta").selectedIndex=1
            busque.idlindPosVenta = document.getElementById("idlindPosVenta").value
            actPosVenta()
            setTimeout(function(){
                busque.accioPosVenta()
            },300)
            
        }else{
            document.getElementById("posVenta").selectedIndex=0
            busque.idlindPosVenta = "nada"
        }
        if(lindDocumento!="nada"){
            document.getElementById("secDoc").selectedIndex=1
            busque.idlindDocumento = document.getElementById("idlindDocumento").value
            actSecDoc()
            setTimeout(function (){
                busque.accioSecDoc()
            },300)
            
        }else{
            document.getElementById("secDoc").selectedIndex=0
            busque.idlindDocumento = "nada"
        }
    }
    if(secciones=="Servicios"){
        let acued = document.getElementById("acued").value
        if(acued == "si"){
            document.getElementById("Acue").selectedIndex= 1
        }else{
            document.getElementById("Acue").selectedIndex= 2
        }
        let acuedRural = document.getElementById("acuedRural").value
        if(acuedRural=="si"){
            document.getElementById("AcueRural").selectedIndex= 1
        }else{
            document.getElementById("AcueRural").selectedIndex= 2
        }
        let aguasSubter = document.getElementById("aguasSubter").value
        if(aguasSubter=="si"){
            document.getElementById("AguasSub").selectedIndex= 1
        }else{
            document.getElementById("AguasSub").selectedIndex= 2
        }
        let aguasServ = document.getElementById("aguasServ").value
        if(aguasServ=="si"){
            document.getElementById("AguasServ").selectedIndex= 1
        }else{
            document.getElementById("AguasServ").selectedIndex= 2
        }
        let pavimentoFlex = document.getElementById("pavimentoFlex").value
        if(pavimentoFlex=="si"){
            document.getElementById("PavFlex").selectedIndex= 1
        }else{
            document.getElementById("PavFlex").selectedIndex= 2
        }
        let pavimentoRig = document.getElementById("pavimentoRig").value
        if(pavimentoRig=="si"){
            document.getElementById("PavRig").selectedIndex= 1
        }else{
            document.getElementById("PavRig").selectedIndex= 2
        }
        let viaEngranzo = document.getElementById("viaEngranzo").value
        if(viaEngranzo=="si"){
            document.getElementById("viaEngran").selectedIndex= 1
        }else{
            document.getElementById("viaEngran").selectedIndex= 2
        }
        let Acera = document.getElementById("Acera").value
        if(Acera=="si"){
            document.getElementById("acera").selectedIndex= 1
        }else{
            document.getElementById("acera").selectedIndex= 2
        }
        let alumbradoPub = document.getElementById("alumbradoPub").value
        if(alumbradoPub=="si"){
            document.getElementById("AlumPublico").selectedIndex= 1
        }else{
            document.getElementById("AlumPublico").selectedIndex= 2
        }
        let Aseo = document.getElementById("Aseo").value
        if(Aseo=="si"){
            document.getElementById("aseo").selectedIndex= 1
        }else{
            document.getElementById("aseo").selectedIndex= 2
        }
        let transportePublic = document.getElementById("transportePublic").value
        if(transportePublic=="si"){
            document.getElementById("transPublic").selectedIndex= 1
        }else{
            document.getElementById("transPublic").selectedIndex= 2
        }
        let pozoSeptico = document.getElementById("pozoSeptico").value
        if(pozoSeptico=="si"){
            document.getElementById("pozoSept").selectedIndex= 1
        }else{
            document.getElementById("pozoSept").selectedIndex= 2
        }
        let electriResi = document.getElementById("electriResi").value
        if(electriResi=="si"){
            document.getElementById("ElectResidencial").selectedIndex= 1
        }else{
            document.getElementById("ElectResidencial").selectedIndex= 2
        }
        let electriIndus = document.getElementById("electriIndus").value
        if(electriIndus=="si"){
            document.getElementById("ElectriIndust").selectedIndex= 1
        }else{
            document.getElementById("ElectriIndust").selectedIndex= 2
        }
        let lineaTelf = document.getElementById("lineaTelf").value
        if(lineaTelf=="si"){
            document.getElementById("linTelf").selectedIndex= 1
        }else{
            document.getElementById("linTelf").selectedIndex= 2
        }
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
//LINDEROS
function btnAplicGen(){
    let busque = new busquedas
    n_gen = document.getElementById("no_gen").value
    document.getElementById("nortGen").value=n_gen
    e_gen = document.getElementById("es_gen").value
    document.getElementById("esteGen").value=e_gen
    o_gen = document.getElementById("oe_gen").value
    document.getElementById("oesteGen").value=o_gen
    s_gen = document.getElementById("su_gen").value
    document.getElementById("surGen").value=s_gen
    alindN_gen = document.getElementById("alindN_gen").value
    document.getElementById("alindNort").value=alindN_gen
    alindS_gen = document.getElementById("alindS_gen").value
    document.getElementById("alindSur").value=alindS_gen
    alindE_gen = document.getElementById("alindE_gen").value
    document.getElementById("alindEste").value=alindE_gen
    alindO_gen = document.getElementById("alindO_gen").value
    document.getElementById("alindOeste").value=alindO_gen
    area_gen = document.getElementById("area_gen").value
    document.getElementById("arTotal").value=area_gen
    niveles_gen = document.getElementById("niveles_gen").value
    document.getElementById("NivConstTotal").value=niveles_gen
    areaConst_gen = document.getElementById("areaConst_gen").value
    document.getElementById("arConstTotal").value=areaConst_gen
    uniN_gen = document.getElementById("uniN_gen").value
    if(uniN_gen=="m"){
        document.getElementById("uniNorte").selectedIndex=1
    }
    if(uniN_gen=="Lq"){
        document.getElementById("uniNorte").selectedIndex=2
    }
    uniS_gen = document.getElementById("uniS_gen").value
    if(uniS_gen=="m"){
        document.getElementById("uniSur").selectedIndex=1
    }
    if(uniS_gen=="Lq"){
        document.getElementById("uniSur").selectedIndex=2
    }
    uniE_gen = document.getElementById("uniE_gen").value
    if(uniE_gen=="m"){
        document.getElementById("uniEste").selectedIndex=1
    }
    if(uniE_gen=="Lq"){
        document.getElementById("uniEste").selectedIndex=2
    }
    uniO_gen = document.getElementById("uniO_gen").value
    if(uniO_gen=="m"){
        document.getElementById("uniOeste").selectedIndex=1
    }
    if(uniO_gen=="Lq"){
        document.getElementById("uniOeste").selectedIndex=2
    }
    idGen = document.getElementById("idGen").value
}
function btnAplicPosVenta(){
    let busque = new busquedas
    n_posventa = document.getElementById("n_posVenta").value
    document.getElementById("nortPosVenta").value=n_posventa
    s_posVenta = document.getElementById("s_posVenta").value
    document.getElementById("surPosVenta").value=s_posVenta
    e_posVenta = document.getElementById("e_posVenta").value
    document.getElementById("estePosVenta").value=e_posVenta
    o_posVenta = document.getElementById("o_posVenta").value
    document.getElementById("oestePosVenta").value=o_posVenta
    alindN_posVenta = document.getElementById("alindN_posVenta").value
    document.getElementById("alindPosNort").value=alindN_posVenta
    alindS_posVenta = document.getElementById("alindS_posVenta").value
    document.getElementById("alindPosSur").value=alindS_posVenta
    alindE_posVenta = document.getElementById("alindE_posVenta").value
    document.getElementById("alindPosEste").value=alindE_posVenta
    alindO_posVenta = document.getElementById("alindO_posVenta").value
    document.getElementById("alindPosOeste").value=alindO_posVenta
    area_posVenta = document.getElementById("area_posVenta").value
    document.getElementById("arTotal2").value=area_posVenta
    niveles_posVenta = document.getElementById("niveles_posVenta").value
    document.getElementById("NivConstTotal2").value=niveles_posVenta
    areaConst_posVenta = document.getElementById("areaConst_posVenta").value
    document.getElementById("arConstTotal2").value=areaConst_posVenta
    uniN_posVenta = document.getElementById("uniN_posVenta").value
    if(uniN_posVenta=="m"){
        document.getElementById("uniNorte2").selectedIndex=1
    }
    if(uniN_posVenta=="Lq"){
        document.getElementById("uniNorte2").selectedIndex=2
    }
    uniS_posVenta = document.getElementById("uniS_posVenta").value
    if(uniS_posVenta=="m"){
        document.getElementById("uniSur2").selectedIndex=1
    }
    if(uniS_posVenta=="Lq"){
        document.getElementById("uniSur2").selectedIndex=2
    }
    uniE_posVenta = document.getElementById("uniE_posVenta").value
    if(uniE_posVenta=="m"){
        document.getElementById("uniEste2").selectedIndex=1
    }
    if(uniE_posVenta=="Lq"){
        document.getElementById("uniEste2").selectedIndex=2
    }
    uniO_posVenta = document.getElementById("uniO_posVenta").value
    if(uniO_posVenta=="m"){
        document.getElementById("uniOeste2").selectedIndex=1
    }
    if(uniO_posVenta=="Lq"){
        document.getElementById("uniOeste2").selectedIndex=2
    }
    idPosVenta = document.getElementById("idPosVenta").value
}
function btnAplicSecDoc(){
    no_SecDoc = document.getElementById("no_SecDoc").value
    document.getElementById("nortSecDoc").value=no_SecDoc
    su_SecDoc = document.getElementById("su_SecDoc").value
    document.getElementById("surSecDoc").value=su_SecDoc
    es_SecDoc = document.getElementById("es_SecDoc").value
    document.getElementById("esteSecDoc").value=es_SecDoc
    oe_SecDoc = document.getElementById("oe_SecDoc").value
    document.getElementById("oesteSecDoc").value=oe_SecDoc
    alindN_SecDoc = document.getElementById("alindN_SecDoc").value
    document.getElementById("alindSecNorte").value=alindN_SecDoc
    alindS_SecDoc = document.getElementById("alindS_SecDoc").value
    document.getElementById("alindSecSur").value=alindS_SecDoc
    alindE_SecDoc = document.getElementById("alindE_SecDoc").value
    document.getElementById("alindSecEste").value=alindE_SecDoc
    alindO_SecDoc = document.getElementById("alindO_SecDoc").value
    document.getElementById("alindSecOeste").value=alindO_SecDoc
    area_SecDoc = document.getElementById("area_SecDoc").value
    document.getElementById("arTotal3").value=area_SecDoc
    niveles_SecDoc = document.getElementById("niveles_SecDoc").value
    document.getElementById("NivConstTotal3").value=niveles_SecDoc
    areaConst_SecDoc = document.getElementById("areaConst_SecDoc").value
    document.getElementById("arConstTotal3").value=areaConst_SecDoc
    uniN_SecDoc = document.getElementById("uniN_SecDoc").value
    if(uniN_SecDoc=="m"){
        document.getElementById("uniNorte3").selectedIndex=1
    }
    if(uniN_SecDoc=="Lq"){
        document.getElementById("uniNorte3").selectedIndex=2
    }
    uniS_SecDoc = document.getElementById("uniS_SecDoc").value
    if(uniS_SecDoc=="m"){
        document.getElementById("uniSur3").selectedIndex=1
    }
    if(uniS_SecDoc=="Lq"){
        document.getElementById("uniSur3").selectedIndex=2
    }
    uniE_SecDoc = document.getElementById("uniE_SecDoc").value
    if(uniE_SecDoc=="m"){
        document.getElementById("uniEste3").selectedIndex=1
    }
    if(uniE_SecDoc=="Lq"){
        document.getElementById("uniEste3").selectedIndex=2
    }
    uniO_SecDoc = document.getElementById("uniO_SecDoc").value
    if(uniO_SecDoc=="m"){
        document.getElementById("uniOeste3").selectedIndex=1
    }
    if(uniO_SecDoc=="Lq"){
        document.getElementById("uniOeste3").selectedIndex=2
    }
}
function btnActLinderos(){
    let busque = new busquedas
    let lindGen = document.getElementById("lindGen").value
    let lindPosVenta = document.getElementById("lindPosVenta").value
    let lindDocumento = document.getElementById("lindDocumento").value
    if(lindGen!="nada"){
        busque.nortGen = document.getElementById("nortGen").value
        busque.uniNorte = document.getElementById("uniNorte").value
        busque.alindNort = document.getElementById("alindNort").value
        busque.surGen = document.getElementById("surGen").value
        busque.uniSur = document.getElementById("uniSur").value
        busque.alindSur = document.getElementById("alindSur").value
        busque.esteGen = document.getElementById("esteGen").value
        busque.uniEste = document.getElementById("uniEste").value
        busque.alindEste = document.getElementById("alindEste").value
        busque.oesteGen = document.getElementById("oesteGen").value
        busque.uniOeste = document.getElementById("uniOeste").value
        busque.alindOeste = document.getElementById("alindOeste").value
        busque.arTotal = document.getElementById("arTotal").value
        busque.NivConstTotal = document.getElementById("NivConstTotal").value
        busque.arConstTotal = document.getElementById("arConstTotal").value
        busque.idlindGen = document.getElementById("idlindGen").value
    }else{
        busque.nortGen = "nada"
        busque.uniNorte = "nada"
        busque.alindNort = "nada"
        busque.surGen = "nada"
        busque.uniSur ="nada"
        busque.alindSur = "nada"
        busque.esteGen ="nada"
        busque.uniEste = "nada"
        busque.alindEste = "nada"
        busque.oesteGen = "nada"
        busque.uniOeste = "nada"
        busque.alindOeste = "nada"
        busque.arTotal = "nada"
        busque.NivConstTotal = "nada"
        busque.arConstTotal = "nada"
        busque.idlindGen = "nada"
    }
    if(lindPosVenta!="nada"){
        busque.nortPosVenta = document.getElementById("nortPosVenta").value
        busque.uniNorte2 = document.getElementById("uniNorte2").value
        busque.alindPosNort = document.getElementById("alindPosNort").value
        busque.surPosVenta = document.getElementById("surPosVenta").value
        busque.uniSur2 = document.getElementById("uniSur2").value
        busque.alindPosSur = document.getElementById("alindPosSur").value
        busque.estePosVenta = document.getElementById("estePosVenta").value
        busque.uniEste2 = document.getElementById("uniEste2").value
        busque.alindPosEste = document.getElementById("alindPosEste").value
        busque.oestePosVenta = document.getElementById("oestePosVenta").value
        busque.uniOeste2 = document.getElementById("uniOeste2").value
        busque.alindPosOeste = document.getElementById("alindPosOeste").value
        busque.arTotal2 = document.getElementById("arTotal2").value
        busque.NivConstTotal2 = document.getElementById("NivConstTotal2").value
        busque.arConstTotal2 = document.getElementById("arConstTotal2").value
        busque.idlindPosVenta = document.getElementById("idlindPosVenta").value
    }else{
        busque.nortPosVenta = "nada"
        busque.uniNorte2 = "nada"
        busque.alindPosNort = "nada"
        busque.surPosVenta = "nada"
        busque.uniSur2 = "nada"
        busque.alindPosSur = "nada"
        busque.estePosVenta = "nada"
        busque.uniEste2 = "nada"
        busque.alindPosEste = "nada"
        busque.oestePosVenta = "nada"
        busque.uniOeste2 = "nada"
        busque.alindPosOeste = "nada"
        busque.arTotal2 = "nada"
        busque.NivConstTotal2 = "nada"
        busque.arConstTotal2 = "nada"
        busque.idlindPosVenta = "nada"
    }
    if(lindDocumento!="nada"){
        busque.nortSecDoc = document.getElementById("nortSecDoc").value
        busque.uniNorte3 = document.getElementById("uniNorte3").value
        busque.alindSecNorte = document.getElementById("alindSecNorte").value
        busque.surSecDoc = document.getElementById("surSecDoc").value
        busque.uniSur3 = document.getElementById("uniSur3").value
        busque.alindSecSur = document.getElementById("alindSecSur").value
        busque.esteSecDoc = document.getElementById("esteSecDoc").value
        busque.uniEste3 = document.getElementById("uniEste3").value
        busque.alindSecEste = document.getElementById("alindSecEste").value
        busque.oesteSecDoc = document.getElementById("oesteSecDoc").value
        busque.uniOeste3 = document.getElementById("uniOeste3").value
        busque.alindSecOeste = document.getElementById("alindSecOeste").value
        busque.arTotal3 = document.getElementById("arTotal3").value
        busque.NivConstTotal3 = document.getElementById("NivConstTotal3").value
        busque.arConstTotal3 = document.getElementById("arConstTotal3").value
        busque.idlindDocumento = document.getElementById("idlindDocumento").value
    }else{
        busque.nortSecDoc = "nada"
        busque.uniNorte3 = "nada"
        busque.alindSecNorte = "nada"
        busque.surSecDoc = "nada"
        busque.uniSur3 = "nada"
        busque.alindSecSur = "nada"
        busque.esteSecDoc = "nada"
        busque.uniEste3 = "nada"
        busque.alindSecEste = "nada"
        busque.oesteSecDoc = "nada"
        busque.uniOeste3 = "nada"
        busque.alindSecOeste = "nada"
        busque.arTotal3 = "nada"
        busque.NivConstTotal3 = "nada"
        busque.arConstTotal3 = "nada"
        busque.idlindDocumento = "nada"
    }
    busque.guarActLind()
}
//AREA TERRENO
function btnActArea(){
    var busque = new busquedas
    busque.arTotalVenta = document.getElementById("arTotalVenta").value
    busque.arRestante = document.getElementById("arRestante").value
    busque.valorTerreno = document.getElementById("valorTerreno").value
    busque.valorInmueble = document.getElementById("valorInmueble").value
    busque.valorConstruc = document.getElementById("valorConstruc").value
    busque.idTerreno = document.getElementById("idTerreno").value
    busque.guarActArea()
}
//SERVICIOS
function btnActServ(){
    let busque = new busquedas
    busque.Acue = document.getElementById("Acue").value
    busque.AcueRural = document.getElementById("AcueRural").value
    busque.AguasSub = document.getElementById("AguasSub").value
    busque.AguasServ = document.getElementById("AguasServ").value
    busque.PavFlex = document.getElementById("PavFlex").value
    busque.PavRig = document.getElementById("PavRig").value
    busque.viaEngran = document.getElementById("viaEngran").value
    busque.acera = document.getElementById("acera").value
    busque.AlumPublico = document.getElementById("AlumPublico").value
    busque.aseo = document.getElementById("aseo").value
    busque.transPublic = document.getElementById("transPublic").value
    busque.pozoSept = document.getElementById("pozoSept").value
    busque.ElectResidencial = document.getElementById("ElectResidencial").value
    busque.ElectriIndust = document.getElementById("ElectriIndust").value
    busque.linTelf = document.getElementById("linTelf").value
    busque.idServ = document.getElementById("idServ").value
    busque.guardActServ()
}
//VER PAGOS
function btnPagar(){
    let busque = new busquedas
    busque.expBuscar = document.getElementById("expBuscar").value
    busque.formPagosInmue()
}
function btnPagarInmue(){
    let busque = new busquedas
    busque.montoFact = document.getElementById("montoFact").value
    busque.numFact = document.getElementById("numFact").value
    busque.fechFact = document.getElementById("fechFact").value
    busque.expBuscar = document.getElementById("expBuscar").value
    busque.pagarInmue();
}
function btnPagos(){
    let busque = new busquedas
    busque.expBuscar = document.getElementById("expBuscar").value
    busque.tipoBuscar = document.getElementById("tipoBuscar").value
    busque.verPagos();
}

document.getElementById("tipoCed").hidden=true
document.getElementById("tipoRif").hidden=true
document.getElementById("consultExp").hidden=false
document.getElementById("consultCed").hidden=true