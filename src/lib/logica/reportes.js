class reportes{

	constructor(campReport,subCampRept,valorBuscar){
		campReport;
		subCampRept;
		valorBuscar
	}
	fReport(){
		var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campGeneral');
        var divsitiomaterial = document.getElementById('campGeneral');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recRepor.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`accion=fReport`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText;
			     }
	       	}
	}
	busReport(){
		var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campGeneral');
        var divsitiomaterial = document.getElementById('campGeneral');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recRepor.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`campReport=${this.campReport}&accion=busReport`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText;
                    let rutaPdf = document.getElementById("rutaPdf").value
                    document.getElementById("enlacePdf").innerHTML=`<div class='campDat'><embed id="embedPdf" src="${rutaPdf}" type="application/pdf"></div>`;
			     }
	       	}
	}
	cargSub(){
		var ajax = new objetoAjax();
		var divsitioform = document.getElementById('subCampRept');
        var divsitiomaterial = document.getElementById('subCampRept');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recRepor.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`campReport=${this.campReport}&accion=cargSub`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText;
                }
	       	}
	}
	detRepor(){
		var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campGeneral');
        var divsitiomaterial = document.getElementById('campGeneral');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recRepor.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`campReport=${this.campReport}&subCampRept=${this.subCampRept}&valorBuscar=${this.valorBuscar}&accion=detRepor`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText;
                    let rutaPdf = document.getElementById("rutaPdf").value
                    document.getElementById("enlacePdf").innerHTML=`<div class='campDat'><embed id="embedPdf" src="${rutaPdf}" type="application/pdf"></div>`;
			     }
	       	}
	}
	cargRang(){
		var ajax = new objetoAjax();
		var divsitioform = document.getElementById('posicSub');
        var divsitiomaterial = document.getElementById('posicSub');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recRepor.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`campReport=${this.campReport}&accion=cargSub`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText;
                }
	       	}
	}
	detFecha(){
		var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campGeneral');
        var divsitiomaterial = document.getElementById('campGeneral');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recRepor.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`diaSub1=${this.diaSub1}&mesSub1=${this.mesSub1}&anoSub1=${this.anoSub1}&diaSub2=${this.diaSub2}&mesSub2=${this.mesSub2}&anoSub2=${this.anoSub2}&campReport=${this.campReport}&accion=detFecha`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText;
                    let rutaPdf = document.getElementById("rutaPdf").value
                    document.getElementById("enlacePdf").innerHTML=`<div class='campDat'><embed id="embedPdf" src="${rutaPdf}" type="application/pdf"></div>`;
			     }
	       	}
	}
}
function btnFReport(){
	let report = new reportes();
	report.fReport();
}
function btnBusRepor(){
	let report = new reportes()
	report.campReport = document.getElementById("campReport").value
	report.busReport();
}
function btnDetRepor(){
	let report = new reportes
	report.campReport = document.getElementById("campReport").value
	if(document.getElementById("campReport").value == "rango"){
		report.diaSub1 = document.getElementById("diaSub1").value
		report.mesSub1= document.getElementById("mesSub1").value
		report.anoSub1 = document.getElementById("anoSub1").value
		report.diaSub2 = document.getElementById("diaSub2").value
		report.mesSub2= document.getElementById("mesSub2").value
		report.anoSub2 = document.getElementById("anoSub2").value
		report.detFecha();
	}else{
		report.subCampRept = document.getElementById("subCampRept").value;
		cambSelect = document.getElementById("cambSelect").value
		if(cambSelect=="NADA"){
			alert("El campo del Detallado no puede estar vacio")
		}else{
			report.valorBuscar = cambSelect
			report.detRepor();
		}
	}
	
}
function btnCargSub(){
	let report = new reportes();
	report.campReport = document.getElementById("campReport").value
	cambioValue();
	if(document.getElementById("campReport").value =="rango"){
		report.cargRang();
	}else{
		report.cargSub();
	}
	

}
function cambioValue(){
	let campReport = document.getElementById("campReport").value;
	document.getElementById("cambSelect").value=campReport;
}