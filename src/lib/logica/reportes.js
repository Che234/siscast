class reportes{

	constructor(campReport){
		campReport;
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
function btnCargSub(){
	let report = new reportes();
	report.campReport = document.getElementById("campReport").value
	report.cargSub();
}