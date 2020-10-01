
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
                  <a class="nav-link" href="./">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Constancias
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#" onclick=btnFormImpri()>Imprimir</a>
                    <a class="dropdown-item" onclick="btnFReport()" href="#">Reportes</a>
                    <a class="dropdown-item" onclick="btnFormConst()" href="#">Nueva Inscripción</a>
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
            <div class="container" >
              <div class="row justify-content-center">
                <div class="col-12">
                  <h2>CONSULTA</h2>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-4 ">
                  <div class="row formHome">
                        <div class="col ">
                          <select class="custom-select" id="tipoBuscar" onChange="btnCampCed()">
                            <option value="0"></option>
                            <option value="Expediente">Expediente</option>
                            <option value="Cedula">Cedula</option>
                            <option value="Rif">Rif</option>
                          </select>
                        </div>
                        <div class="col-3">
                          <select class="custom-select" id="tipoCed" >
                            <option value="0"></option>
                            <option value="V">V</option>
                            <option value="E">E</option>
                            <option value="P">P</option>
                          </select>
                          <select class="form-control" id="tipoRif" >
                            <option value="0"></option>
                            <option value="V">V</option>
                            <option value="J">J</option>
                            <option value="G">G</option>
                            <option value="E">E</option>
                            <option value="P">P</option>
                            <option value="C">C</option>
                          </select>
                        </div>
                        <div class="col">
                          <input type="text" class="form-control" id="campBuscar" />
                        </div>
                    
                  </div>
              </div>
              <div class="row">
                <div class="col-3">
                      <input type="button" id="consultExp" value="Consultar" onclick="btnConsultExp()" class="botones btn btn-primary" />
                      <input type="button" id="consultCed" value="Consultar" onclick="btnConsultCed()" class="botones btn btn-primary" />
                      <input type="button" id="consultRif" value="Consultar" onclick="btnConsultRif()" class="botones btn btn-primary" />
                    </div>
              </div>
            </div>
            ';
        }
        function header2(){
          echo'<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="#"><img class="logoMenu" src="./assets/logo.jpg" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active ">
                  <a class="nav-link" href="./">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Constancias
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#" onclick=btnFormImpri()>Imprimir</a>
                    <a class="dropdown-item" onclick="btnFormConst()" href="#">Nueva Inscripción</a>
                  </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" onclick="btnSalir()" href="#" >Salir</a>
                </li>
              </ul>
            </div>
          </nav>';
        }
    }
?>