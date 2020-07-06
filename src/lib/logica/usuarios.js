
function usuarios(mostReg,guardUsu,nombre,apellido,cedula,correo,direccion,
	codTelef,numTelf,contrasena,verPass,verificacion,user,pass,telf){
	
		this.mostReg = mostReg;
		this.guardUsu =guardUsu;
		this.nombre = nombre;
		this.apellido = apellido;
		this.cedula= cedula;
		this.correo = correo;
		this.direccion = direccion;
		this.codTelef = codTelef;
		this.numTelf = numTelf;
		this.telf= telf;
		this.user= user;
		this.contrasena = contrasena;
		this.verPass = verPass;
		this.verificacion= verificacion;
		this.pass = pass;

	function verificacion(){
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
		return true;
	}
	function guardUsu(){
		var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campGeneral');
        var divsitiomaterial = document.getElementById('campGeneral');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "src/server/rec/recUsuario.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send("nombre="+this.nombre+"&apellido="+this.apellido+"&cedula="+this.cedula+"&correo="+this.correo+"&direccion="+this.direccion+"&telf="+this.telf+"&user="+this.user+"&pass="+this.pass+"&accion=guardUsu"); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
				
				divsitioform.innerHTML = ajax.responseText;
				alert('Usuario guardado con exito');
			     }
	       	}
	}
	
    function mostReg(){
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