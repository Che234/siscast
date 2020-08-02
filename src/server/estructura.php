
<?php
    class estructura{
        function header(){
            echo'<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="#"><img class="logoMenu" src="./assets/logo.jpg" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active ">
                  <a class="nav-link" href="http://localhost/SisCast/">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Constancias
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#" onclick=btnFormImpri()>Imprimir</a>
                    <a class="dropdown-item" onclick="btnFormConst()" href="#">Nueva Inscripción</a>
                    <a class="dropdown-item" href="#">Reportes</a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Usuarios
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#" onclick="mostRegistro()">Registrar</a>
                    <a class="dropdown-item" onclick="btnModUsu()" href="#">Modificar</a>
                    <a class="dropdown-item" onclick="btnMostList()" href="#">Lista de usuarios</a>
                  </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" onclick="btnSalir()" href="#" >Salir</a>
                </li>
              </ul>
            </div>
          </nav>';
        }
        function body(){
            echo'
            <div id="campGeneral">
              <div class="campBuscador">
                <h2>CONSULTA</h2>
                <select id="tipoBuscar" onChange="btnCampCed()">
                  <option value="0"></option>
                  <option value="Expediente">Expediente</option>
                  <option value="Cedula">Cedula</option>
                  <option value="Rif">Rif</option>
                </select>
                <select id="tipoCed" >
                  <option value="0"></option>
                  <option value="V">V</option>
                  <option value="E">E</option>
                </select>
                <select id="tipoRif" >
                  <option value="0"></option>
                  <option value="V">V</option>
                  <option value="J">J</option>
                </select>
                <input type="text" id="campBuscar" />
                <input type="button" id="consultExp" value="Consultar" onclick="btnConsultExp()" class="botones btn btn-primary" />
                <input type="button" id="consultCed" value="Consultar" onclick="btnConsultCed()" class="botones btn btn-primary" />
                <input type="button" id="consultRif" value="Consultar" onclick="btnConsultRif()" class="botones btn btn-primary" />
              </div>
            </div>
            ';
        }
        function header2(){

        }
    }
?>