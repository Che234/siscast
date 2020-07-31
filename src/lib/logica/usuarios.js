
class usuarios{
	
		construct(){

		nombre;
		apellido;
		cedula;
		correo;
		direccion;
		codTelef;
		numTelf
		telf;
		user;
		contrasena;
		verPass;
		verificacion;
		pass;
		nivUsu
		cedUsu
		nomUsu
		apelUsu
		cedUsu
		dirUsu
		telfUsu
		corUsu
		nivUsu
		idUsu
		}
		

	verificacion(){
		if(!er_areas.test(this.nombre)){
            alert("Error en el formato de Nombre");
            return false;
		}
		if(!er_areas.test(this.apellido)){
			alert("Error en el formato de Apellido");
			return false;
		}
		if(!ex_cedula.test(this.cedula)){
			alert("Error en el formato de la Cedula");
			return false;
		}
		if(!ex_correo.test(this.correo)){
            alert("Error en el formato de Correo");
            return false;
		}
		if(!er_areas.test(this.dirreción)){
			alert("Error en el formato de Dirección");
			return false;
		}
		if(!ex_telef.test(this.codTelef)){
            alert("Error en el formato de Telefono");
            return false;
		}
		if(!ex_telef.test(this.numTelf)){
			alert("Error en el formato de Telefono");
			return false;
		}
		if(!ex_user.test(this.user)){
			alert("Error en el formato del Usuario");
			return false;
		}
		if(this.contrasena == this.verPass){
			if(!ex_pass.test(this.contrasena)){
				alert("Error en el formato de la contraseña");
				return false;
			}
		}else{
			alert("Las contraseñas no son iguales");
			return false;
		}
		if(!ex_datcort.test(this.nivUsu)){
			alert("Error en el formato del Nivel");
			return false;
		}
		return true;
	}
	guardUsu(){
		var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campGeneral');
        var divsitiomaterial = document.getElementById('campGeneral');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recUsuario.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send(`nombre=${this.nombre}&apellido=${this.apellido}&cedula=${this.cedula}&correo=${this.correo}&direccion=${this.direccion}&telf=${this.telf}&user=${this.user}&pass=${this.pass}&nivUsu=${this.nivUsu}&accion=guardUsu`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
				
				divsitioform.innerHTML = ajax.responseText;
			     }
	       	}
	}
	
    mostReg(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campGeneral');
        var divsitiomaterial = document.getElementById('campGeneral');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recUsuario.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send("&accion=mostReg"); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
				divsitioform.innerHTML = ajax.responseText;
				
			     }
	       	}
	}
	ModUsu(){
		var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campGeneral');
        var divsitiomaterial = document.getElementById('campGeneral');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recUsuario.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send("&accion=ModUsu"); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
				divsitioform.innerHTML = ajax.responseText;
				
			     }
	       	}
	}
	encUsu(){
		var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campGeneral');
        var divsitiomaterial = document.getElementById('campGeneral');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recUsuario.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send(`cedUsu=${this.cedUsu}&accion=encUsu`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
				divsitioform.innerHTML = ajax.responseText;
				setTimeout(()=>{
					btnPlasUsu()
				},10)
			     }
	       	}
	}
	actUsu(){
		var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campGeneral');
        var divsitiomaterial = document.getElementById('campGeneral');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recUsuario.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send(`nombre=${this.nombre}&apellido=${this.apellido}&cedu=${this.cedu}&direc=${this.direc}&correo=${this.correo}&telefono=${this.telefono}&user=${this.user}&contrasena=${this.contrasena}&verPass=${this.verPass}&nivUsu=${this.nivUsu}&idUsu=${this.idUsu}&accion=actUsu`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
				divsitioform.innerHTML = ajax.responseText;
				
			     }
	       	}
	}
}
function mostRegistro(){
	let usu= new usuarios();
	usu.mostReg();	
}
function btnLimpiarUsu(){
	document.getElementById("nombre").value= "";
	document.getElementById("apellido").value= "";
	document.getElementById("ced").value= "";
	document.getElementById("codTelef").value= "";
	document.getElementById("numTelf").value= "";
	document.getElementById("direc").value="";
	document.getElementById("correo").value="";
	document.getElementById("user").value="";
	document.getElementById("contrasena").value="";
	document.getElementById("verPass").value="";
}
function btnGuardUsu(){
	let usu = new usuarios();
	usu.nombre = document.getElementById("nombre").value;
	usu.apellido = document.getElementById("apellido").value;
	usu.cedula = document.getElementById("ced").value;
	usu.codTelef = document.getElementById("codTelef").value;
	usu.numTelf = document.getElementById("numTelf").value;
	usu.direccion = document.getElementById("direc").value;
	usu.correo = document.getElementById("correo").value;
	usu.user = document.getElementById("user").value;
	usu.contrasena = document.getElementById("contrasena").value;
	nivUsu = document.getElementById("nivUsu").value
	if(nivUsu=="Administrador"){
		usu.nivUsu = "1";
	}
	if(nivUsu=="Redactor"){
		usu.nivUsu = "2"
	}
	usu.verPass = document.getElementById("verPass").value;
	if(usu.verificacion() == true){
		if(usu.contrasena === usu.verPass){
			usu.pass= usu.contrasena;
			usu.telf= ""+usu.codTelef+""+usu.numTelf+""
			usu.guardUsu();
		}else{
			alert('Las contraseñas no sen iguales');
		}
		
	}
	
}
function btnModUsu(){
	let usu= new usuarios;
	usu.ModUsu()
}
function btnEncUsu(){
	let usu = new usuarios
	usu.cedUsu = document.getElementById("cedUsu").value
	usu.encUsu()
}
function btnPlasUsu(){
	let usu = new usuarios
	telefono = document.getElementById("telfUsu").value
	divTelf = telefono.split("-")
	document.getElementById("codiTelef").value = divTelf[0]
	document.getElementById("numeTelf").value = divTelf[1]
	nivelUsu = document.getElementById("nivelUsu").value
	if(nivelUsu=="1"){
		document.getElementById("nivUsu").selectedIndex=1
	}
	if(nivelUsu=="2"){
		document.getElementById("nivUsu").selectedIndex=2
	}
}
function btnActUsu(){
	let usu = new usuarios
	usu.nombre = document.getElementById("nombre").value
	usu.apellido = document.getElementById("apellido").value
	usu.cedu = document.getElementById("cedu").value
	usu.direc = document.getElementById("direc").value
	usu.correo = document.getElementById("correo").value
	codiTelef = document.getElementById("codiTelef").value
	numeTelf = document.getElementById("numeTelf").value
	usu.telefono= `${codiTelef}-${numeTelf}`
	usu.user = document.getElementById("user").value
	usu.contrasena = document.getElementById("contrasena").value
	usu.verPass = document.getElementById("verPass").value
	usu.nivUsu = document.getElementById("nivUsu").value
	usu.idUsu = document.getElementById("idUsu").value
	usu.actUsu()
}