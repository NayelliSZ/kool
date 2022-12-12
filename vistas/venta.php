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
          <h3 class="card-title">VENTA <button  class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fas fa-plus-circle"></i> Agregar</button></h3>
        </div> 
        <div class="card-body">
          <!---Contenedor de listados-->
          <div class="panel-body" id="listadoregdata">
            <table id="tblistadoregdata" class="table table-striped table bordered table-condensed table-over">
              <thead>
                <th> Opciones</th>
                <th> Nombre Cliente</th>
                <th> Total</th>
                <th> Propina</th>
                <th> Total con propina</th>
                <th> Forma de pago</th>
                <th> Estatus</th>
              </thead>
            </table>
            
          </div>
          <!--- Contenedor de formulario-->
          <div class="panel-body" id="formregdata">
            <form name="formulario" id= "formulario" method="post" class="row">
              <div class="form-group col-xl-6 col-md-6 col-sm-12">
              <label for= "nombre_cliente">Nombre del cliente</label>
              <input type="hidden" name="idProd" id="idProd">
              <input type="text" class= "form-control" name="nombre_cliente" id="nombre_cliente" maxlength="256" placeholder="Nombre del cliente" required>
              </div>

              <div class="form-group col-xl-6 col-md-6 col-sm-12">
                <label for= "nombre">Producto</label>
              <select id="nombre" name="nombre">
                
              </select>
              </div>

              <div class="form-group col-xl-6 col-md-6 col-sm-12">
                <label for= "cantidad">Cantidad</label>
              <input type="number" class= "form-control" name="cantidad" id="cantidad" maxlength="256" placeholder="Cantidad del producto consumido">
              </div>

              <div class="form-group col-xl-6 col-md-6 col-sm-12">
                <label for= "precio">Precio unitario</label>
              <input type="number" class= "form-control" name="precio" id="precio" maxlength="256" placeholder="$150.00" required>
              </div>

              <div class="form-group col-xl-6 col-md-6 col-sm-12">
                <label for= "propina">Propina</label>
              <input type="text" class= "form-control" name="propina" id="propina" maxlength="256" placeholder="Propina" required>
              </div>

              <div class="form-group col-xl-6 col-md-6 col-sm-12">
                <button class="btn" id="btnAgregar" type="button" onclick="agregar()"><i class="fas fa-save"></i> </h3> Agregar producto</button>
              </div>

              <div class="form-group col-xl-6 col-md-6 col-sm-12">
                <button class="btn btn-primary" id="btnGuardar" type="submit"><i class="fas fa-save"></i> </h3> Guardar</button>
                <button class="btn btn-danger" id="btnCancelar"type= "button" onclick="cancelarform(true)"><i class="fas fa-arrow-circle-left"></i> Cancelar</button>
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
<script type="text/javascript" src= "scripts/venta.js"></script>