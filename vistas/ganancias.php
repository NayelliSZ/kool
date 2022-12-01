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
          <h3 class="card-title">GANANCIAS</h3>
        </div> 
        <div class="card-body">
          <!---Contenedor de listados-->
          <div class="panel-body" id="listadoregdata">
            <table id="tblistadoregdata" class="table table-striped table bordered table-condensed table-over">
              <thead>
                <th> Opciones</th>
                <th> Venta</th>
                <th> Propina</th>
                <th> Total</th>
                <th> Efectivo</th>
                <th> Tarjeta</th>
              </thead>
            </table>
          </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php
  require 'piepagina.php';
?>
<script type="text/javascript" src= "scripts/inventario.js"></script>