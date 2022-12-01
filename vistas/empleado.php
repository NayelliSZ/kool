<?php
  require 'cabecero.php';
?>
<style type="text/css">
  #con{
    background: #FFE7A9;
  }
  
</style>
  <!-- Content Wrapper. Contains page content -->
  <div id="cont" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div id="con" class="card">
        <div class="card-header">
          <h3 class="card-title">EMPLEADOS <button  class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fas fa-plus-circle"></i> Agregar</button></h3>
        </div> 
        <div class="card-body">
          <!---Contenedor de listados-->
          <div class="panel-body" id="listadoregdata">
            <table id="tblistadoregdata" class="table table-striped table bordered table-condensed table-over">
              <thead>
                <th> Opciones</th>
                <th> Nombre</th>
                <th> Primer Apellido</th>
                <th> Correo</th>
                <th> Telefono</th>
                <th> Tipo</th>
                <th> Estatus</th>
                <th> Fecha de ingreso</th>
                <th> Fecha de baja</th>
              </thead>
            </table>
            
          </div>
          <!--- Contenedor de formulario-->
          <div class="panel-body" id="formregdata">
            <form name="formulario" id= "formulario" method="post" class="row">

              <div class="form-group col-xl-6 col-md-6 col-sm-12">
                <label for= "nombre">Nombre del empleado</label>
              <input type="hidden" name="idEmpleado" id="idEmpleado">
              <input type="text" class= "form-control" name="nombre" id="nombre" maxlength="256" placeholder="Nombre del empleado" required>
              </div>

              <div class="form-group col-xl-6 col-md-6 col-sm-12">
                <label for= "primerApellido">Primer Apellido</label>
              <input type="text" class= "form-control"name="primerApellido" id="primerApellido" maxlength="256" placeholder="Primer Apellido" required>
              </div>

              <div class="form-group col-xl-6 col-md-6 col-sm-12">
                <label for= "segundoApellido">Segundo Apellido</label>
              <input type="text" class= "form-control" name="segundoApellido" id="segundoApellido" maxlength="256" placeholder="Segundo Apellido">
              </div>
              <div class="form-group col-xl-6 col-md-6 col-sm-12">
                <label for= "email">Email</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">@</div>
                    </div>
                    <input type="email" class= "form-control" name="email" id="email" maxlength="256" placeholder="Email" required>
                </div>
              </div>

              <div class="form-group col-xl-6 col-md-6 col-sm-12">
                <label for= "fechaEntrada">Fecha de ingreso</label>
              <input type="date" class= "form-control" name="fechaEntrada" id="fechaEntrada" maxlength="256" placeholder="Fecha Ingreso" required>
              </div>

              <div class="form-group col-xl-6 col-md-6 col-sm-12">
                <label for= "fechaBaja">Fecha de baja</label>
              <input type="date" class= "form-control" name="fechaBaja" id="fechaBaja" maxlength="256" placeholder="Fecha Baja">
              </div>

              <div class="form-group col-xl-6 col-md-6 col-sm-12">
                <label for= "idTipo">Tipo</label>
                <select id="idTipo">
                  <option value="1"> Jefe</option>
                  <option value="2"> Empleado de barra</option>
                  <option value="3"> Mesero</option>
                  <option value="4"> Cocina</option>
                </select>
              </div>

              <div class="form-group col-xl-6 col-md-6 col-sm-12">
                <label for= "usr">Telefono</label>
              <input type="text" class= "form-control" name="tel" id="tel" maxlength="256" placeholder="Telefono" required>
              <br>
                <label for= "pwd">Contraseña</label>
              <input class= "form-control" type="password" name="pwd" id="pwd" maxlength="256" placeholder="Contraseña" required>
              </div>

              <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <label>Foto del empleado</label>
                <div class="costum-file">
                <input type="file" class= "costum-file-input" name="foto" id="foto">
                 <label class= "costum-file-label" for= "foto">Foto</label>
                </div>
              </div>

              <div class="form-group col-xl-6 col-md-6 col-sm-12">
                <button class="btn btn-primary" id="btnGuardar" type="submit"><i class="fas fa-save"></i> </h3> Guardar</button>
                <button class="btn btn-danger" id="btnCancelar"type= "button" onclick="cancelarform(true)"><i class="fas fa-arrow-circle-left"></i> Cancelar</button>
              </div>

              <div class="form-group col-xl-6 col-md-6 col-sm-12">
              <input class= "form-control" type="hidden" name="fotoActual" id="fotoActual">
              <img src="" width="150px" height="150px" id="imagenmuestra">
              </div>
              
            </form>
          </div>
        </div>


        <!-- /.card-body -->
        
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php
  require 'piepagina.php';
?>
<script type="text/javascript" src= "scripts/empleado.js"></script>