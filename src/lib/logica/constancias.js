class constancias{

    constructor(cedR,cedConst,cedFul,rifR,rifN,rifConst,nomProp,
        apelProp,codTelf,numText,direcProp,codTelf2,numTelf2,parrInmue,
        secInmue,direcInmue,topoConst,formaConst,servPublic,usoConst,tenenConst,
        ocupConst,dimeConst,destConst,estConst,pareTipoInmue,pareAcaInmue,pintConst,
        techoConst,pisosConst,piezConst,ventConst,puertConst,instElect,
        ambConst,compConst,estConserv,obsConst,docDebConst,direcProtConst,numProtConst,
        tomoProtConst,folioProtConst,protoConst,trimProtConst,dateProtConst,valorProtConst,
        nortGen,alindNort,surGen,alindSur,esteGen,alindEste,oesteGen,alindOeste,nortPosVenta,
        alindPosNort,surPosVenta,alindPosSur,estePosVenta,alindPosEste,oestePosVenta,alindPosOeste,
        nortSecDoc,alindSecNorte,surSecDoc,alindSecSur,esteSecDoc,alindSecEste,oesteSecDoc,alindSecOeste,
        arTotal,NivConstTotal,arConstTotal,parte2,parte1,arTotalVenta,arRestante,valorTerreno,valorInmueble,
        valorConstruc,nuExp,montoFact,fechFact,idInmueble,telfFul,telfFul2,regInmue,Acue,AcueRural,AguasSub,
        AguasServ,PavFlex,PavRig,viaEngran,acera,AlumPublico,aseo,transPublic,pozoSept,ElectResidencial,ElectriIndust,
        linTelf,empadro,multa,idProp,numFact){

        this.cedR = cedR
        this.cedConst = cedConst
        this.cedFul = cedFul
        this.rifR = rifR
        this.rifN = rifN
        this.rifConst = rifConst
        this.nomProp = nomProp
        this.apelProp = apelProp
        this.codTelf = codTelf
        this.numText = numText
        this.direcProp = direcProp
        this.codTelf2 = codTelf2
        this.numTelf2 = numTelf2
        this.parrInmue = parrInmue
        this.secInmue = secInmue
        this.direcInmue = direcInmue
        this.topoConst = topoConst
        this.formaConst = formaConst
        this.servPublic = servPublic
        this.usoConst = usoConst
        this.tenenConst = tenenConst
        this.ocupConst = ocupConst
        this.dimeConst = dimeConst
        this.destConst= destConst
        this.estConst = estConst
        this.pareAcaInmue = pareAcaInmue
        this.pareTipoInmue = pareTipoInmue
        this.pintConst = pintConst
        this.techoConst = techoConst
        this.pisosConst = pisosConst
        this.piezConst = piezConst
        this.ventConst =ventConst
        this.puertConst = puertConst
        this.instElect = instElect
        this.ambConst = ambConst
        this.compConst = compConst
        this.estConserv = estConserv
        this.obsConst = obsConst
        this.docDebConst = docDebConst
        this.direcProtConst = direcProtConst
        this.numProtConst = numProtConst
        this.tomoProtConst = tomoProtConst
        this.folioProtConst = folioProtConst
        this.protoConst = protoConst
        this.trimProtConst = trimProtConst
        this.dateProtConst = dateProtConst
        this.valorProtConst = valorProtConst
        this.nortGen = nortGen
        this.alindNort = alindNort
        this.surGen = surGen
        this.alindSur = alindSur
        this.esteGen = esteGen
        this.alindEste = alindEste
        this.oesteGen = oesteGen
        this.alindOeste = alindOeste
        this.nortPosVenta = nortPosVenta
        this.alindPosNort = alindPosNort
        this.surPosVenta = surPosVenta
        this.alindPosSur = alindPosSur
        this.estePosVenta = estePosVenta
        this.alindPosEste = alindPosEste
        this.oestePosVenta = oestePosVenta
        this.alindPosOeste = alindPosOeste
        this.nortSecDoc = nortSecDoc
        this.alindSecNorte = alindSecNorte
        this.surSecDoc = surSecDoc
        this.alindSecSur = alindSecSur
        this.esteSecDoc = esteSecDoc
        this.alindSecEste = alindSecEste
        this.oesteSecDoc = oesteSecDoc
        this.alindSecOeste = alindSecOeste
        this.arTotal = arTotal
        this.NivConstTotal = NivConstTotal
        this.arConstTotal = arConstTotal
        this.parte2 = parte2
        this.parte1 = parte1
        this.arTotalVenta= arTotalVenta
        this.arRestante = arRestante
        this.valorTerreno = valorTerreno
        this.valorInmueble = valorInmueble
        this.valorConstruc = valorConstruc
        this.nuExp = nuExp
        this.montoFact = montoFact
        this.fechFact = fechFact
        this.idInmueble = idInmueble
        this.telfFul = telfFul
        this.telfFul2 = telfFul2
        this.regInmue = regInmue
        this.Acue = Acue
        this.AcueRural = AcueRural
        this.AguasSub = AguasSub
        this.AguasServ = AguasServ
        this.PavFlex = PavFlex
        this.PavRig = PavRig
        this.viaEngran = viaEngran
        this.acera = acera
        this.AlumPublico = AlumPublico
        this.aseo = aseo
        this.transPublic = transPublic
        this.pozoSept = pozoSept
        this.ElectResidencial = ElectResidencial
        this.ElectriIndust = ElectriIndust
        this.linTelf = linTelf
        this.empadro = empadro
        this.multa = multa
        this.idProp = idProp
        this.numFact = numFact
    }
    test1(){
        if(!ex_nac.test(this.cedR)){
            alert("Error en el formato de Nacionalidad");
            return false;
        }
        if(!ex_cedula.test(this.cedConst)){
            alert("Error en el formato de numero de Cedula");
            return false;
        }
        if(!ex_nac.test(this.rifR)){
            alert("Error en el formato de tipo de Rif");
            return false;
        }
        if(!ex_cedula.test(this.rifN)){
            alert("Error en el formato de numero de Rif");
            return false;
        }
        if(!er_areas.test(this.nomProp)){
            alert("Error en el formato de Nombre");
            return false;
        }
        if(!er_areas.test(this.apelProp)){
            alert("Error en el formato de Apellido");
            return false;
        }
        if(!ex_Telefono.test(this.codTelf)){
            alert("Error en el formato de codigo de Telefono");
            return false;
        }
        if(!ex_Telefono.test(this.numText)){
            alert("Error en el formato de numero de Telefono");
            return false;
        }
        if(!er_areas.test(this.direcProp)){
            alert("Error en el formato de direccion del propietario");
            return false;
        }
        if(!ex_Telefono.test(this.codTelf2)){
            alert("Error en el formato de codigo de Telefono del Inmueble");
            return false;
        }
        if(!ex_Telefono.test(this.numTelf2)){
            alert("Error en el formato de numero de Telefono del Inmueble");
            return false;
        }
        if(!ex_datcort.test(this.parrInmue)){
            alert("Error en el formato de Parroquia");
            return false;
        }
        if(!ex_datcort.test(this.secInmue)){
            alert("Error en el formato de Sector");
            return false;
        }
        if(!er_areas.test(this.direcInmue)){
            alert("Error en el formato de Dirección del Inmueble");
            return false;
        }
        if(!ex_datcort.test(this.topoConst)){
            alert("Error en el formato de Topografia");
            return false;
        }
        if(!ex_datcort.test(this.formaConst)){
            alert("Error en el formato de Forma");
            return false;
        }
        if(!ex_datcort.test(this.tenenConst)){
            alert("Error en el formato de Tenencia");
            return false;
        }
        if(!ex_datcort.test(this.ocupConst)){
            alert("Error en el formato de Ocupante");
            return false;
        }
        if(!ex_datcort.test(this.dimeConst)){
            alert("Error en el formato de Dimensiones");
            return false;
        }
        return true;
    }
    test2(){
        if(!ex_datcort.test(this.destConst)){
            alert("Error en el formato de Destino");
            return false;
        }
        if(!ex_datcort.test(this.estConst)){
            alert("Error en el formato de Estructura");
            return false;
        }
        if(!ex_datcort.test(this.pareAcaInmue)){
            alert("Error en el formato de Paredes - Tipo");
            return false;
        }
        if(!ex_datcort.test(this.pareTipoInmue)){
            alert("Error en el formato de Paredes - Lujoso");
            return false;
        }
        if(!ex_datcort.test(this.pintConst)){
            alert("Error en el formato de Pintura");
            return false;
        }
        if(!ex_datcort.test(this.techoConst)){
            alert("Error en el formato de Techo");
            return false;
        }
        if(!ex_datcort.test(this.pisosConst)){
            alert("Error en el formato de Piso");
            return false;
        }
        if(!ex_datcort.test(this.piezConst)){
            alert("Error en el formato de Pieza sanitarias");
            return false;
        }
        if(!ex_datcort.test(this.ventConst)){
            alert("Error en el formato de Ventanas");
            return false;
        }
        if(!ex_datcort.test(this.puertConst)){
            alert("Error en el formato de Puertas");
            return false;
        }
        if(!ex_datcort.test(this.instElect)){
            alert("Error en el formato de Instalaciones electricas");
            return false;
        }
        if(!ex_datcort.test(this.ambConst)){
            alert("Error en el formato de Ambientes");
            return false;
        }
        if(!ex_datcort.test(this.compConst)){
            alert("Error en el formato de Complementos");
            return false;
        }
        if(!ex_datcort.test(this.estConserv)){
            alert("Error en el formato de Estado de conservación");
            return false;
        }
        if(!ex_datcort.test(this.obsConst)){
            alert("Error en el formato de Observación");
            return false;
        }
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
    test3(){
        if(!ex_datcort.test(this.nortGen)){
            alert("Error en el formato de Mts Norte general");
            return false;
        }
        if(!ex_datcort.test(this.alindNort)){
            alert("Error en el formato de Alinderado Norte");
            return false;
        }
        if(!ex_datcort.test(this.surGen)){
            alert("Error en el formato de Mts Sur");
            return false;
        }
        if(!ex_datcort.test(this.alindSur)){
            alert("Error en el formato de Alinderado Sur");
            return false;
        }
        if(!ex_datcort.test(this.esteGen)){
            alert("Error en el formato de Mts Este");
            return false;
        }
        if(!ex_datcort.test(this.alindEste)){
            alert("Error en el formato de Alinderado Este");
            return false;
        }
        if(!ex_datcort.test(this.oesteGen)){
            alert("Error en el formato de Mts Oeste");
            return false;
        }
        if(!ex_datcort.test(this.alindOeste)){
            alert("Error en el formato de Alinderado Oeste");
            return false;
        }
        if(!ex_datcort.test(this.nortPosVenta)){
            alert("Error en el formato de Mts Norte posible Venta");
            return false;
        }
        if(!ex_datcort.test(this.alindPosNort)){
            alert("Error en el formato de Alinderado Norte posible Venta");
            return false;
        }
        if(!ex_datcort.test(this.surPosVenta)){
            alert("Error en el formato de Mts Sur posible Venta");
            return false;
        }
        if(!ex_datcort.test(this.alindPosSur)){
            alert("Error en el formato de Alinderado Sur posible Venta");
            return false;
        }
        if(!ex_datcort.test(this.estePosVenta)){
            alert("Error en el formato de Mts Este posible Venta");
            return false;
        }
        if(!ex_datcort.test(this.alindPosEste)){
            alert("Error en el formato de Alinderado Este posible Venta");
            return false;
        }
        if(!ex_datcort.test(this.oestePosVenta)){
            alert("Error en el formato de Mts Oeste posible Venta");
            return false;
        }
        if(!ex_datcort.test(this.alindPosOeste)){
            alert("Error en el formato de Alinderado Oeste posible Venta");
            return false;
        }
        if(!ex_datcort.test(this.nortSecDoc)){
            alert("Error en el formato de Mts Norte Segun Documento");
            return false;
        }
        if(!ex_datcort.test(this.alindSecNorte)){
            alert("Error en el formato de Alinderado Norte Segun Documento");
            return false;
        }
        if(!ex_datcort.test(this.surSecDoc)){
            alert("Error en el formato de Mts Sur Segun Documento");
            return false;
        }
        if(!ex_datcort.test(this.alindSecSur)){
            alert("Error en el formato de Alinderado Sur Segun Documento");
            return false;
        }
        if(!ex_datcort.test(this.esteSecDoc)){
            alert("Error en el formato de Mts Este Segun Documento");
            return false;
        }
        if(!ex_datcort.test(this.alindSecEste)){
            alert("Error en el formato de Alinderado Este Segun Documento");
            return false;
        }
        if(!ex_datcort.test(this.oesteSecDoc)){
            alert("Error en el formato de Mts Oeste Segun Documento");
            return false;
        }
        if(!ex_datcort.test(this.alindSecOeste)){
            alert("Error en el formato de Alinderado Oeste Segun Documento");
            return false;
        }
        if(!ex_datcort.test(this.arTotal)){
            alert("Error en el formato de Área Total");
            return false;
        }
        if(!ex_datcort.test(this.NivConstTotal)){
            alert("Error en el formato de Niveles de Construcción");
            return false;
        }
        if(!ex_datcort.test(this.arConstTotal)){
            alert("Error en el formato de Área de Construcción");
            return false;
        }
        return true
    }
    veriInmu(){
        if(!ex_Telefono.test(this.nuExp)){
            alert("Error en el formato de Numero Expediente");
            return false;
        }
        if(!ex_money.test(this.montoFact)){
            alert("Error en el formato de Monto de factura");
            return false;
        }
        if(!ex_fecha.test(this.fechFact)){
            alert("Error en el formato de la fecha ");
            return false;
        }
        return true
    }
    formConst(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campGeneral');
        var divsitiomaterial = document.getElementById('campGeneral');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recConst.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send("&accion=fProp"); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
			     }
	       	}
    }
    cambSect(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('secInmue');
        var divsitiomaterial = document.getElementById('secInmue');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recConst.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`parrInmue=${this.parrInmue}&accion=cambSect`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
			     }
	       	}
    }
    fCarac(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campGeneral');
        var divsitiomaterial = document.getElementById('campGeneral');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recConst.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send("cedFul="+this.cedFul+"&rifConst="+this.rifConst+"&nomProp="+this.nomProp+"&apelProp="+this.apelProp+"&codTelf="+this.codTelf+"&numText="+this.numText+"&direcProp="+this.direcProp+"&codTelf2="+this.codTelf2+"&numTelf2="+this.numTelf2+"&parrInmue="+this.parrInmue+"&secInmue="+this.secInmue+"&direcInmue="+this.direcInmue+"&topoConst="+this.topoConst+"&formaConst="+this.formaConst+"&usoConst="+this.usoConst+"&tenenConst="+this.tenenConst+"&ocupConst="+this.ocupConst+"&dimeConst="+this.dimeConst+"&regInmue="+this.regInmue+"&accion=fCarac"); 
        ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
                    
			     }
	       	}
    }
    fActGeneral(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('lindActGen');
        var divsitiomaterial = document.getElementById('lindActGen');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recConst.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send("&accion=fActGeneral"); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
                    
			     }
	       	}
    }
    factPosVenta(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('lindPosVenta');
        var divsitiomaterial = document.getElementById('lindPosVenta');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recConst.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send("&accion=factPosVenta"); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
                    
			     }
	       	}
    }
    factSecDoc(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('lindSecDoc');
        var divsitiomaterial = document.getElementById('lindSecDoc');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recConst.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send("&accion=factSecDoc"); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
                    
			     }
	       	}
    }
    fLind(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campGeneral');
        var divsitiomaterial = document.getElementById('campGeneral');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recConst.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`destConst=${this.destConst}&estConst=${this.estConst}&pareTipoInmue=${this.pareTipoInmue}&pareAcaInmue=${this.pareAcaInmue}&pintConst=${this.pintConst}&techoConst=${this.techoConst}&pisosConst=${this.pisosConst}&piezConst=${this.piezConst}&ventConst=${this.ventConst}&puertConst=${this.puertConst}&instElect=${this.instElect}&ambConst=${this.ambConst}&compConst=${this.compConst}&estConserv=${this.estConserv}&obsConst=${this.obsConst}&docDebConst=${this.docDebConst}&direcProtConst=${this.direcProtConst}&numProtConst=${this.numProtConst}&tomoProtConst=${this.tomoProtConst}&folioProtConst=${this.folioProtConst}&protoConst=${this.protoConst}&trimProtConst=${this.trimProtConst}&dateProtConst=${this.dateProtConst}&valorProtConst=${this.valorProtConst}&parte1=${this.parte1}&accion=fLid`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
                    
			     }
	       	}
    }
    GuardConst(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campGeneral');
        var divsitiomaterial = document.getElementById('campGeneral');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recConst.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`nortGen=${this.nortGen}&alindNort=${this.alindNort}&surGen=${this.surGen}&alindSur=${this.alindSur}&esteGen=${this.esteGen}&alindEste=${this.alindEste}&oesteGen=${this.oesteGen}&alindOeste=${this.alindOeste}&nortPosVenta=${this.nortPosVenta}&alindPosNort=${this.alindPosNort}&surPosVenta=${this.surPosVenta}&alindPosSur=${this.alindPosSur}&estePosVenta=${this.estePosVenta}&alindPosEste=${this.alindPosEste}&oestePosVenta=${this.oestePosVenta}&alindPosOeste=${this.alindPosOeste}&nortSecDoc=${this.nortSecDoc}&alindSecNorte=${this.alindSecNorte}&surSecDoc=${this.surSecDoc}&alindSecSur=${this.alindSecSur}&esteSecDoc=${this.esteSecDoc}&alindSecEste=${this.alindSecEste}&oesteSecDoc=${this.oesteSecDoc}&alindSecOeste=${this.alindSecOeste}&arTotal=${this.arTotal}&NivConstTotal=${this.NivConstTotal}&arConstTotal=${this.arConstTotal}&arTotalVenta=${this.arTotalVenta}&arRestante=${this.arRestante}&valorTerreno=${this.valorTerreno}&valorInmueble=${this.valorInmueble}&valorConstruc=${this.valorConstruc}&parte2=${this.parte2}&parte1=${this.parte1}&cedFul=${this.cedFul}&rifConst=${this.rifConst}&nomProp=${this.nomProp}&apelProp=${this.apelProp}&telfFul=${this.telfFul}&direcProp=${this.direcProp}&telfFul2=${this.telfFul2}&parrInmue=${this.parrInmue}&secInmue=${this.secInmue}&direcInmue=${this.direcInmue}&topoConst=${this.topoConst}&formaConst=${this.formaConst}&usoConst=${this.usoConst}&tenenConst=${this.tenenConst}&ocupConst=${this.ocupConst}&dimeConst=${this.dimeConst}&regInmue=${this.regInmue}&destConst=${this.destConst}&estConst=${this.estConst}&pareTipoInmue=${this.pareTipoInmue}&pareAcaInmue=${this.pareAcaInmue}&pintConst=${this.pintConst}&techoConst=${this.techoConst}&pisosConst=${this.pisosConst}&piezConst=${this.piezConst}&ventConst=${this.ventConst}&puertConst=${this.puertConst}&instElect=${this.instElect}&ambConst=${this.ambConst}&compConst=${this.compConst}&estConserv=${this.estConserv}&obsConst=${this.obsConst}&docDebConst=${this.docDebConst}&direcProtConst=${this.direcProtConst}&numProtConst=${this.numProtConst}&tomoProtConst=${this.tomoProtConst}&folioProtConst=${this.folioProtConst}&protoConst=${this.protoConst}&trimProtConst=${this.trimProtConst}&dateProtConst=${this.dateProtConst}&valorProtConst=${this.valorProtConst}&Acue=${this.Acue}&AcueRural=${this.AcueRural}&AguasSub=${this.AguasSub}&AguasServ=${this.AguasServ}&PavFlex=${this.PavFlex}&PavRig=${this.PavRig}&viaEngran=${this.viaEngran}&acera=${this.acera}&AlumPublico=${this.AlumPublico}&aseo=${this.aseo}&transPublic=${this.transPublic}&pozoSept=${this.pozoSept}&ElectResidencial=${this.ElectResidencial}&ElectriIndust=${this.ElectriIndust}&linTelf=${this.linTelf}&multa=${this.multa}&accion=guardConst`)
        ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
                    
			     }
	       	}
    }
    imprConst(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campGeneral');
        var divsitiomaterial = document.getElementById('campGeneral');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recConst.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`nuExp=${this.nuExp}&montoFact=${this.montoFact}&fechFact=${this.fechFact}&empadro=${this.empadro}&idProp=${this.idProp}&idInmueble=${this.idInmueble}&numFact=${this.numFact}&accion=imprConst2`);
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText;
                    let nuExp = document.getElementById("nuExp").value
                    document.getElementById("enlacePdf").innerHTML=`<div class='campDat'><embed id="embedPdf" src="http://localhost/SisCast/assets/constancias/${nuExp}.pdf" type="application/pdf"></div>`;
			     }
	       	}
    }
}
function btnFormConst(){
    let consta = new constancias();
    consta.formConst();
}
function btnfCarac(){
    let consta = new constancias();
    consta.cedR= document.getElementById("cedR").value;
    consta.cedConst= document.getElementById("cedConst").value;
    consta.rifR= document.getElementById("rifR").value;
    consta.rifN= document.getElementById("rifN").value;
    consta.rifConst= consta.rifR+consta.rifN;
    consta.cedFul= consta.cedR+consta.cedConst;
    consta.nomProp= document.getElementById("nomProp").value;
    consta.apelProp = document.getElementById("apelProp").value;
    consta.codTelf= document.getElementById("codTelf").value;
    consta.numText= document.getElementById("numTelf").value;
    consta.direcProp= document.getElementById("direcProp").value;
    consta.codTelf2 = document.getElementById("codTelf2").value;
    consta.numTelf2 = document.getElementById("numTelf2").value;
    consta.parrInmue = document.getElementById("parrInmue").value;
    consta.secInmue = document.getElementById("secInmue").value;
    consta.direcInmue= document.getElementById("direcInmue").value;
    consta.topoConst = document.getElementById("topoConst").value;
    consta.formaConst= document.getElementById("formaConst").value;
    consta.usoConst= document.getElementById("usoConst").value;
    consta.tenenConst= document.getElementById("tenenConst").value;
    consta.ocupConst= document.getElementById("ocupConst").value;
    consta.dimeConst= document.getElementById("dimeConst").value;
    consta.regInmue = document.getElementById("regInmue").value;
    if(consta.test1()==true){
        consta.fCarac();
    }
    
}
function actGeneral(){
    let consta = new constancias();
    lindGeneral= document.getElementById("lindGeneral").value
    if(lindGeneral=="si"){
        consta.fActGeneral();
    }else{
        espaGeneral= document.getElementById("lindActGen")
        espaGeneral.innerHTML=""
    }
}
function actPosVenta(){
    let consta = new constancias()
    posVenta= document.getElementById("posVenta").value
    if(posVenta=="si"){
        consta.factPosVenta();
    }else{
        espaVenta= document.getElementById("lindPosVenta")
        espaVenta.innerHTML=""
    }
}
function actSecDoc(){
    let consta = new constancias()
    secDoc= document.getElementById("secDoc").value
    if(secDoc=="si"){
        consta.factSecDoc();
    }else{
        espaSecDoc= document.getElementById("lindSecDoc")
        espaSecDoc.innerHTML=""
    }
}
function btnfLind(){
    let consta = new constancias()
    consta.destConst = document.getElementById("destConst").value
    consta.estConst = document.getElementById("estConst").value
    consta.pareTipoInmue = document.getElementById("pareTipoInmue").value
    consta.pareAcaInmue = document.getElementById("pareAcaInmue").value
    consta.pintConst = document.getElementById("pintConst").value
    consta.techoConst = document.getElementById("techoConst").value
    consta.pisosConst = document.getElementById("pisosConst").value
    consta.piezConst = document.getElementById("piezConst").value
    consta.ventConst = document.getElementById("ventConst").value
    consta.puertConst = document.getElementById("puertConst").value
    consta.instElect = document.getElementById("instElect").value
    consta.ambConst = document.getElementById("ambConst").value
    consta.compConst = document.getElementById("compConst").value
    consta.estConserv= document.getElementById("estConserv").value
    consta.obsConst = document.getElementById("obsConst").value
    consta.docDebConst = document.getElementById("docDebConst").value
    consta.direcProtConst = document.getElementById("direcProtConst").value
    consta.numProtConst = document.getElementById("numProtConst").value
    consta.tomoProtConst = document.getElementById("tomoProtConst").value
    consta.folioProtConst = document.getElementById("folioProtConst").value
    consta.protoConst = document.getElementById("protoConst").value
    consta.trimProtConst = document.getElementById("trimProtConst").value
    consta.dateProtConst = document.getElementById("dateProtConst").value
    consta.valorProtConst = document.getElementById("valorProtConst").value
    consta.parte1 = document.getElementById("parte1").value
    if(consta.test2()==true){
        consta.fLind()
    }
    
}
function calLind(){
    norte = document.getElementById("nortSecDoc").value
    sur = document.getElementById("surSecDoc").value
    este = document.getElementById("esteSecDoc").value
    oeste = document.getElementById("oesteSecDoc").value
    norSur = (parseInt(norte) + parseInt(sur))/2
    estOest = (parseInt(este)+parseInt(oeste))/2
    area2 = norSur*estOest
    document.getElementById("arTotal").value=area2
}
function btnGuardConst(){
    let consta = new constancias()
    lindGeneral = document.getElementById("lindGeneral").value
    if(lindGeneral =="si"){
        consta.nortGen = document.getElementById("nortGen").value
        consta.alindNort = document.getElementById("alindNort").value
        consta.surGen = document.getElementById("surGen").value
        consta.alindSur = document.getElementById("alindSur").value
        consta.esteGen = document.getElementById("esteGen").value
        consta.alindEste = document.getElementById("alindEste").value
        consta.oesteGen = document.getElementById("oesteGen").value
        consta.alindOeste = document.getElementById("alindOeste").value
    }else{
        consta.nortGen = "nada"
        consta.alindNort = "nada"
        consta.surGen = "nada"
        consta.alindSur = "nada"
        consta.esteGen = "nada"
        consta.alindEste = "nada"
        consta.oesteGen = "nada"
        consta.alindOeste = "nada"
    }
    posVenta = document.getElementById("posVenta").value
    if(posVenta =="si"){
        consta.nortPosVenta = document.getElementById("nortPosVenta").value
        consta.alindPosNort = document.getElementById("alindPosNort").value
        consta.surPosVenta = document.getElementById("surPosVenta").value
        consta.alindPosSur = document.getElementById("alindPosSur").value
        consta.estePosVenta = document.getElementById("estePosVenta").value
        consta.alindPosEste = document.getElementById("alindPosEste").value
        consta.oestePosVenta = document.getElementById("oestePosVenta").value
        consta.alindPosOeste = document.getElementById("alindPosOeste").value
    }else{
        consta.posVent = "0"
        consta.nortPosVenta = "nada"
        consta.alindPosNort = "nada"
        consta.surPosVenta = "nada"
        consta.alindPosSur = "nada"
        consta.estePosVenta = "nada"
        consta.alindPosEste = "nada"
        consta.oestePosVenta = "nada"
        consta.alindPosOeste = "nada"
    }
    secDoc = document.getElementById("secDoc").value
    if(secDoc == "si"){
        consta.nortSecDoc = document.getElementById("nortSecDoc").value
        consta.alindSecNorte = document.getElementById("alindSecNorte").value
        consta.surSecDoc = document.getElementById("surSecDoc").value
        consta.alindSecSur = document.getElementById("alindSecSur").value
        consta.esteSecDoc = document.getElementById("esteSecDoc").value
        consta.alindSecEste = document.getElementById("alindSecEste").value
        consta.oesteSecDoc = document.getElementById("oesteSecDoc").value
        consta.alindSecOeste = document.getElementById("alindSecOeste").value
        
    }else{
        consta.secDocument = "0"
        consta.nortSecDoc = "nada"
        consta.alindSecNorte ="nada"
        consta.surSecDoc = "nada"
        consta.alindSecSur = "nada"
        consta.esteSecDoc = "nada"
        consta.alindSecEste = "nada"
        consta.oesteSecDoc = "nada"
        consta.alindSecOeste = "nada"
    }
    consta.arTotal = document.getElementById("arTotal").value
    consta.NivConstTotal = document.getElementById("NivConstTotal").value
    consta.arConstTotal = document.getElementById("arConstTotal").value
    consta.arTotalVenta = document.getElementById("arTotalVenta").value
    consta.arRestante = document.getElementById("arRestante").value
    consta.valorTerreno = document.getElementById("valorTerreno").value
    consta.valorInmueble = document.getElementById("valorInmueble").value
    consta.valorConstruc = document.getElementById("valorConstruc").value
    parte2 = document.getElementById("parte2").value
    parte1 = document.getElementById("parte1").value
    datos2 = parte2.split("|")
    datos1= parte1.split("|")
    consta.cedFul = datos1[0]
    consta.rifConst = datos1[1]
    consta.nomProp = datos1[2]
    consta.apelProp = datos1[3]
    consta.telfFul = `(${datos1[4]})-${datos1[5]}`
    consta.direcProp = datos1[6]
    consta.telfFul2 = `(${datos1[7]})-${datos1[8]}`
    consta.parrInmue = datos1[9]
    consta.secInmue = datos1[10]
    consta.direcInmue = datos1[11]
    consta.topoConst = datos1[12]
    consta.formaConst = datos1[13]
    consta.usoConst = datos1[14]
    consta.tenenConst = datos1[15]
    consta.ocupConst = datos1[16]
    consta.dimeConst = datos1[17]
    consta.regInmue = datos1[18]
    consta.destConst = datos2[0]
    consta.estConst = datos2[1]
    consta.pareAcaInmue = datos2[3]
    consta.pareTipoInmue = datos2[2]
    consta.pintConst = datos2[4]
    consta.techoConst = datos2[5]
    consta.pisosConst = datos2[6]
    consta.piezConst = datos2[7]
    consta.ventConst = datos2[8]
    consta.puertConst = datos2[9]
    consta.instElect = datos2[10]
    consta.ambConst = datos2[11]
    consta.compConst = datos2[12]
    consta.estConserv = datos2[13]
    consta.obsConst = datos2[14]
    consta.docDebConst = datos2[15]
    consta.direcProtConst = datos2[16]
    consta.numProtConst = datos2[17]
    consta.tomoProtConst = datos2[18]
    consta.folioProtConst = datos2[19]
    consta.protoConst = datos2[20]
    consta.trimProtConst = datos2[21]
    consta.dateProtConst = datos2[22]
    consta.valorProtConst = datos2[23]
    consta.Acue = document.getElementById("Acue").value
    consta.AcueRural = document.getElementById("AcueRural").value
    consta.AguasSub = document.getElementById("AguasSub").value
    consta.AguasServ = document.getElementById("AguasServ").value
    consta.PavFlex = document.getElementById("PavFlex").value
    consta.PavRig = document.getElementById("PavRig").value
    consta.viaEngran = document.getElementById("viaEngran").value
    consta.acera = document.getElementById("acera").value
    consta.AlumPublico = document.getElementById("AlumPublico").value
    consta.aseo = document.getElementById("aseo").value
    consta.transPublic = document.getElementById("transPublic").value
    consta.pozoSept = document.getElementById("pozoSept").value
    consta.ElectResidencial = document.getElementById("ElectResidencial").value
    consta.ElectriIndust = document.getElementById("ElectriIndust").value
    consta.linTelf = document.getElementById("linTelf").value
    consta.multa = document.getElementById("multa").value
    if(consta.test3()==true){
        consta.GuardConst()
    }
}
function btnImprConst(){
    let consta = new constancias
    consta.nuExp = document.getElementById("nuExp").value
    consta.montoFact = document.getElementById("montoFact").value
    consta.fechFact = document.getElementById("fechFact").value
    consta.idInmueble = document.getElementById("idInmueble").value
    consta.empadro = document.getElementById("empadro").value
    consta.idProp =document.getElementById("idProp").value
    consta.numFact= document.getElementById("numFact").value
    if(consta.veriInmu() == true){
        consta.imprConst()
    }
}

/**EVENTOS */
function btnCambSec(){
        let consta = new constancias()
        consta.parrInmue = document.getElementById("parrInmue").value
        consta.cambSect()
}
