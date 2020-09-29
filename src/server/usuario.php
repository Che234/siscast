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
                            <option value="0"></option>
                            <option value="1">Administrador</option>
                            <option value="2">Redactor</option>
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
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        $busUsuSql = "SELECT * FROM usuarios  ";
        $resBusUsu = $link->query($busUsuSql);
        $busUsuRes = $resBusUsu->fetch_assoc();
        if($busUsuRes["nick"]!=$this->user){
            if($busUsuRes["correo"]!=$this->correo){
                if($busUsuRes["cedula"]!=$this->cedula){
                    $usuSql="INSERT INTO usuarios(nick,pass,nombre,apellido,cedula,direccion,telef,correo,nivel)values('".$this->user."', '".$this->pass."','".$this->nombre."','".$this->apellido."','".$this->cedula."', '".$this->direccion."','".$this->telf."','".$this->correo."', '".$this->nivUsu."') ";
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
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();

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
                        <input type="text" value="'.$usuRes["cedula"].'" id="cedu">
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
                        <input class="codigo" type="text" id="codiTelef">
                        <input class="telf" type="text" id="numeTelf">
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
    function actUsu(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        $modUsuSql = "UPDATE usuarios SET nick='".$this->user."', pass='".$this->contrasena."', nombre='".$this->nombre."', apellido='".$this->apellido."', cedula='".$this->cedu."', direccion='".$this->direc."', telef='".$this->telefono."', correo='".$this->correo."', nivel='".$this->nivUsu."' where id=".$this->idUsu." ";
        $link->query($modUsuSql);
        echo'USUARIO MODIFICADO CON EXITO';
    }
    function mostList(){
            include('../conexion.php');
            $MySql = new conexion;
            $link= $MySql->conectar();
            //BUSQUEDAS DE USUARIOS PARA FOR
                $listSql = "SELECT COUNT(*) FROM usuarios";
                $resList = $link->query($listSql);
                $listRes = $resList->fetch_assoc();
            //BUSQUEDA DE USUARIOS
                $usuSql = "SELECT * FROM usuarios";
                $resUsu = $link->query($usuSql);      

                echo'
                    <table>
                        <tr>
                            <td colspan="6">
                                <h2>LISTADO DE USUARIOS</h2>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Nombre </b>
                            </td>
                            <td>
                                <b>Apellido</b>
                            </td>
                            <td>
                                <b>Cedula</b>
                            </td>
                            <td>
                                <b>Nivel</b>
                            </td>
                            <td>
                                <b>Correo</b>
                            </td>
                            <td>
                                <b>Acciones/b>
                            </td>
                         </tr>
                ';
            for($i=0; $i<$listRes["COUNT(*)"]; $i++){
                
                $usuRes = $resUsu->fetch_array();  
                echo'
                   
                    <tr>
                        <td>
                            <b>'.$usuRes["nombre"].'</b>
                        </td>
                        <td>
                            <b>'.$usuRes["apellido"].'</b>
                        </td>
                        <td>
                            <b>'.$usuRes["cedula"].'</b>
                        </td>
                        <td>';
                        if($usuRes["nivel"]=="1"){
                            echo'<b>Administrador</b>';
                        }
                        if($usuRes["nivel"]=="2"){
                            echo'<b>Redactor</b>';
                        }
                           
                        echo'</td>
                        <td>
                            <b>'.$usuRes["correo"].'</b>
                        </td>
                        <td>
                            <div class="btnSig1">
                                <input type="button" value="Eliminar" onclick="btnEliminarUsu('.$usuRes["cedula"].')" class=" botones btn btn-primary" />
                                <input type="button" value="Modificar" onclick="btnModUsu()" class=" botones btn btn-primary" />
                            </div>
                        </td>
                    </tr>
                ';
            }
            echo'</table>';
    }
    function eliminarUsu(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        //ELIMINAR USUARIO
            $elimSql = "DELETE FROM usuarios where cedula='".$this->cedu."'";
            $link->query($elimSql);
            echo'USUARIO ELIMINADO CON ÉXITO';
            $this->mostList();
    }
}





?>