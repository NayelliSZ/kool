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
          <h3 class="card-title">INVENTARIO <button  class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fas fa-plus-circle"></i> Agregar</button></h3>
        </div> 
        <div class="card-body">
          <!---Contenedor de listados-->
          <div class="panel-body" id="listadoregdata">
            <table id="tblistadoregdata" class="table table-striped table bordered table-condensed table-over">
              <thead>
                <th> Opciones</th>
                <th> Nombre</th>
                <th> En existencia</th>
                <th> Costo</th>
                <th> Punto de orden</th>
                <th> Estatus</th>
              </thead>
            </table>
            
          </div>
          <!--- Contenedor de formulario-->
          <div class="panel-body" id="formregdata">
            <form name="formulario" id= "formulario" method="post" class="row">

              <div class="form-group col-xl-6 col-md-6 col-sm-12">
                <label for= "nombre">Nombre del producto</label>
              <input type="hidden" name="idProd" id="idProd">
              <input type="text" class= "form-control" name="nombre" id="nombre" maxlength="256" placeholder="Nombre del producto" required>
              </div>

              <div class="form-group col-xl-6 col-md-6 col-sm-12">
                <label for= "existencia">En existencia</label>
              <input type="text" class= "form-control"name="existencia" id="existencia" maxlength="256" placeholder="10" required>
              </div>

              <div class="form-group col-xl-6 col-md-6 col-sm-12">
                <label for= "costo">Costo</label>
              <input type="text" class= "form-control" name="costo" id="costo" maxlength="256" placeholder="$150.00">
              </div>

              <div class="form-group col-xl-6 col-md-6 col-sm-12">
                <label for= "orden">Punto de orden</label>
              <input type="text" class= "form-control" name="orden" id="orden" maxlength="256" placeholder="5" required>
              </div>

              <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <label>Foto del producto</label>
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
<script type="text/javascript" src= "scripts/inventario.js"></script>