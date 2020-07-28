<?php

class usuario{

    function construct(){

        $nombre = "";
        $apellido = "";
        $cedula = "";
        $correo = "";
        $direccion= "";
        $telf= "";
        $user= "";
        $pass= "";
        $nivUsu = "";
        $cedUsu = "";
        $nomUsu = "";
        $apelUsu = "";
        $dirUsu = "";
        $telfUsu = "";
        $corUsu = "";
        $nivUsu = "";
        $idUsu = "";
    }

        

    function mostRegistro(){
        echo'
            <div class="container contUsuario ">
                <div class="row">
                    <div class="titCentro column-lg-">
                        <h2>Datos Personales</h2>
                    </div>
                </div>
                <div class="row filasUser">
                    <div class="campos" >
                        <p class="negritas text-left">Nombre:</p>
                        <input type="text" id="nombre" >
                    </div>
                    <div class="campos" >
                        <p class="negritas text-left">Apellido:</p>
                        <input type="text" id="apellido">
                    </div>
                    <div class="campos" >
                        <p class="negritas text-left">Cedula:</p>
                        <input type="text" id="ced">
                    </div>
                </div>
                <div class="row filasUser">
                    <div class="campos">
                        <p class="negritas text-left" >Dirección:</p>
                        <input type="text" id="direc" />
                    </div>
                    <div class="campos">
                        <p class="negritas text-left">Correo</p>
                        <input typè="email" id="correo"/>
                    </div>
                    <div class="campos">
                        <p class="negritas text-left">Telefono:</p>
                        <input class="codigo" type="text" id="codTelef">
                        <input class="telf" type="text" id="numTelf">
                    </div>
                </div>
                <div class="row filasUser">
                    <div class="campos">
                        <p class="negritas text-left">Usuario:</p>
                        <input type="text" id="user">    
                    </div>
                    <div class="campos">
                        <p class="negritas text-left">Contraseña:</p>
                        <input type="password" id="contrasena">
                    </div>
                    <div class="campos">
                        <p class="negritas text-left">Verifica Contraseña:</p>
                        <input type="password" id="verPass">
                    </div>
                    <div class="campos">
                        <p class="negritas text-left">Nivel:</p>
                        <select id="nivUsu">
                            <option></option>
                            <option value="Administrador">Administrador</option>
                            <option value="Redactor">Redactor</option>
                        </select>
                    </div>
                </div>
                <div class="row filasUser">
                    <div class="campos">
                    <button type="button" onclick="btnGuardUsu()" class="botones btn btn-primary">Enviar</button>
                    <button type="button" onclick="btnLimpiarUsu()" class="botones btn btn-danger">Limpiar</button>
                    </div>
                </div>
            </div>
        ';
    }
    function guardUsu(){
        $link=mysqli_connect("127.0.0.1", "root","","siscast") 
        or die(mysqli_error());
        $busUsuSql = "SELECT * FROM usuarios  ";
        $resBusUsu = $link->query($busUsuSql);
        $busUsuRes = $resBusUsu->fetch_assoc();
        if($busUsuRes["nick"]!=$this->user){
            if($busUsuRes["correo"]!=$this->correo){
                if($busUsuRes["cedula"]!=$this->cedula){
                    $usuSql="INSERT INTO usuarios(nick,pass,nombre,apellido,cedula,direccion,telef,correo,nivel)values('".$this->user."', '".$this->pass."','".$this->nombre."','".$this->apellido."','".$this->cedula."', '".$this->direccion."','".$this->telf."','".$this->correo."', ".$this->nivUsu.") ";
                    $link->query($usuSql);
                    echo 'USUARIO REGISTRADO CON EXITO';
                }else{
                    echo 'CEDULA YA SE ENCUENTRA REGISTRADA';
                }
            }else{
                echo'CORREO YA UTILIZADO';
            }
        }else{
            echo'USUARIO YA UTILIZADO';
        }
        $this->mostRegistro();
    }
    function ModUsu(){
        echo'
            <table>
                <tr>
                    <td>
                        <h2>Escribe la cedula del usuario</h2>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Cedula: </b><input type="text" id="cedUsu" /> <input type="button" value="Buscar" onclick="btnEncUsu()">
                    </td>
                </tr>
            </table>
        ';
    }
    function encUsu(){
        //BUSQUEDA DE USUARIO
        $link=mysqli_connect("127.0.0.1", "root","","siscast") 
        or die(mysqli_error());
        $usuSql = "SELECT * FROM usuarios where cedula='".$this->cedUsu."'";
        $resUsu= $link->query($usuSql);
        $usuRes = $resUsu->fetch_assoc();
        echo'
        <input type="hidden" value="'.$usuRes["telef"].'" id="telfUsu" /> 
        <input type="hidden" value="'.$usuRes["nivel"].'" id="nivelUsu" />
        <input type="hidden" value="'.$usuRes["id"].'" id="idUsu" />  
        
        <div class="container contUsuario ">
                <div class="row">
                    <div class="titCentro column-lg-">
                        <h2>Datos Personales</h2>
                    </div>
                </div>
                <div class="row filasUser">
                    <div class="campos" >
                        <p class="negritas text-left">Nombre:</p>
                        <input type="text" value="'.$usuRes["nombre"].'" id="nombre" >
                    </div>
                    <div class="campos" >
                        <p class="negritas text-left">Apellido:</p>
                        <input type="text" value="'.$usuRes["apellido"].'" id="apellido">
                    </div>
                    <div class="campos" >
                        <p class="negritas text-left">Cedula:</p>
                        <input type="text" value="'.$usuRes["cedula"].'" id="ced">
                    </div>
                </div>
                <div class="row filasUser">
                    <div class="campos">
                        <p class="negritas text-left" >Dirección:</p>
                        <input type="text" value="'.$usuRes["direccion"].'" id="direc" />
                    </div>
                    <div class="campos">
                        <p class="negritas text-left">Correo</p>
                        <input typè="email" value="'.$usuRes["correo"].'" id="correo"/>
                    </div>
                    <div class="campos">
                        <p class="negritas text-left">Telefono:</p>
                        <input class="codigo" type="text" id="codTelef">
                        <input class="telf" type="text" id="numTelf">
                    </div>
                </div>
                <div class="row filasUser">
                    <div class="campos">
                        <p class="negritas text-left">Usuario:</p>
                        <input type="text" value="'.$usuRes["nick"].'" id="user">    
                    </div>
                    <div class="campos">
                        <p class="negritas text-left">Contraseña:</p>
                        <input type="password" value="'.$usuRes["pass"].'" id="contrasena">
                    </div>
                    <div class="campos">
                        <p class="negritas text-left">Verifica Contraseña:</p>
                        <input type="password" value="'.$usuRes["pass"].'" id="verPass">
                    </div>
                    <div class="campos">
                        <p class="negritas text-left">Nivel:</p>
                        <select id="nivUsu">
                            <option></option>
                            <option value="Administrador">Administrador</option>
                            <option value="Redactor">Redactor</option>
                        </select>
                    </div>
                </div>
                <div class="row filasUser">
                    <div class="campos">
                    <button type="button" onclick="btnActUsu()" class="botones btn btn-primary">Enviar</button>
                    <button type="button" onclick="btnLimpiarUsu()" class="botones btn btn-danger">Limpiar</button>
                    </div>
                </div>
            </div>
        
        ';
    }
}





?>