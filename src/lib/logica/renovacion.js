class renovacion{

    construct(){
        expBuscar
        tipoBuscar
        idInmueble
        idProp
        nuExp
        montoFact
        fechFact
        numFact
        operacion
        anoExp
    }

    busRenov(){
        let ajax = new objetoAjax();
		let divsitioform = document.getElementById('BusqueDart');
        let divsitiomaterial = document.getElementById('BusqueDart');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recRenovacion.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`tipoBuscar=${this.tipoBuscar}&expBuscar=${this.expBuscar}&accion=BusRenov`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText;
                    setTimeout(()=>{
                        veriRenov()
                    }, 600)
			     }
	       	}
    }
    form1(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('MostResult');
        var divsitiomaterial = document.getElementById('MostResult');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recRenovacion.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`idInmueble=${this.idInmueble}&idProp=${this.idProp}&nuExp=${this.nuExp}&montoFact=${this.montoFact}&fechFact=${this.fechFact}&numFact=${this.numFact}&operacion=${this.operacion}&accion=form1`); 
        ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText;
                    let nuExp = document.getElementById("nuExp").value
                    let ano = document.getElementById("anoExp").value
                    document.getElementById("enlacePdf").innerHTML=`<div class='campDat'><embed id="embedPdf" src="./assets/constancias/${ano}/${nuExp}.pdf" type="application/pdf"></div>`;
                 }
	       	}
    }
    form2(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('MostResult');
        var divsitiomaterial = document.getElementById('MostResult');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recRenovacion.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`idInmueble=${this.idInmueble}&idProp=${this.idProp}&nuExp=${this.nuExp}&montoFact=${this.montoFact}&fechFact=${this.fechFact}&numFact=${this.numFact}&operacion=${this.operacion}&accion=form2`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText;
                    let nuExp = document.getElementById("nuExp").value
                    let ano = document.getElementById("anoExp").value
                    document.getElementById("enlacePdf").innerHTML=`<div class='campDat'><embed id="embedPdf" src="./assets/constancias/${ano}/${nuExp}.pdf" type="application/pdf"></div>`;
                 }
	       	}
    }
    form3(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('MostResult');
        var divsitiomaterial = document.getElementById('MostResult');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recRenovacion.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`idInmueble=${this.idInmueble}&idProp=${this.idProp}&nuExp=${this.nuExp}&montoFact=${this.montoFact}&fechFact=${this.fechFact}&numFact=${this.numFact}&operacion=${this.operacion}&accion=form3`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText;
                    let nuExp = document.getElementById("nuExp").value
                    let ano = document.getElementById("anoExp").value
                    document.getElementById("enlacePdf").innerHTML=`<div class='campDat'><embed id="embedPdf" src="./assets/constancias/${ano}/${nuExp}.pdf" type="application/pdf"></div>`;

			     }
	       	}
    }
    empaExp(){
        var ajax = new objetoAjax();
        var divsitioform = document.getElementById('MostResult');
        var divsitiomaterial = document.getElementById('MostResult');
        divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
        ajax=objetoAjax();
        ajax.open("POST", "src/server/rec/recRenovacion.php",true);
        ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`idInmueble=${this.idInmueble}&idProp=${this.idProp}&nuExp=${this.nuExp}&montoFact=${this.montoFact}&fechFact=${this.fechFact}&numFact=${this.numFact}&operacion=${this.operacion}&accion=empaExp`); 
        ajax.onreadystatechange=function()
            {
            if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText;
                    let nuExp = document.getElementById("nuExp").value
                    let ano = document.getElementById("anoExp").value
                    document.getElementById("enlacePdf").innerHTML=`<div class='campDat'><embed id="embedPdf" src="./assets/constancias/${ano}/${nuExp}.pdf" type="application/pdf"></div>`;
                 }
               }
    }
}
function btnRevConst(){
    let renov = new renovacion()
    renov.expBuscar = document.getElementById("expBuscar").value
    renov.tipoBuscar = document.getElementById("tipoBuscar").value
    renov.busRenov();
}
function veriRenov(){
    let proceso = document.getElementById("proceso").value
    if(proceso=="Si"){
        let renov = new renovacion()
        renov.idInmueble = document.getElementById("idInmueble").value
        renov.idProp = document.getElementById("idProp").value
        renov.nuExp = document.getElementById("nuExp").value
        renov.montoFact = document.getElementById("montoFact").value
        renov.fechFact = document.getElementById("fechFact").value
        renov.numFact = document.getElementById("numFact").value
        renov.operacion = document.getElementById("operacion").value
        lindPosVenta = document.getElementById("lindPosventa").value
        lindGeneral = document.getElementById("lindGeneral").value
        lindSecDoc = document.getElementById("lindSecDoc").value
        condicionExp = document.getElementById("condicionExp").value
        renov.anoExp = document.getElementById("anoExp").value

        if(condicionExp!="nada"){
            renov.empaExp();
        }else{
            if(lindGeneral=="nada"){
                if(lindPosVenta =="nada"){
                    if(lindSecDoc !="nada"){
                        if(condicionExp=="nada"){
                            renov.form2()
                        }
                    }
                }
        }
        if(lindGeneral!="nada"){
            if(lindSecDoc!="nada"){
                if(lindPosVenta=="nada"){
                    if(condicionExp=="nada"){
                        renov.form1()
                    }
                    
                }
            }
        }
        if(lindGeneral=="nada"){
            if(lindSecDoc!="nada"){
                if(lindPosVenta!="nada"){
                    if(condicionExp=="nada"){
                        renov.form3()
                    }
                }
            }
        }
        if(lindGeneral!="nada"){
            if(lindSecDoc!="nada"){
                if(lindPosVenta!="nada"){
                    if(condicionExp=="nada"){
                        renov.form3()
                    }
                }
            }
        }
    }
        

    }
    if(proceso=="No"){
        alert("NO HA REALIZADO EL PAGO DEL AÑO EN CURSO");
        tipoBuscar = document.getElementById("tipoBuscar").value
        nuExp = document.getElementById("nuExp").value
        btnConsultExp(nuExp,tipoBuscar)
    }
}