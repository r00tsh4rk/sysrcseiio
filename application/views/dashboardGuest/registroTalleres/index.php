    <div class="preloader">
        <div class="preloder-wrap">
            <div class="preloder-inner">
                <div class="ball"></div>
                <div class="ball"></div>
                <div class="ball"></div>
                <div class="ball"></div>
                <div class="ball"></div>
                <div class="ball"></div>
                <div class="ball"></div>
            </div>
        </div>
    </div><!--/.preloader-->
    <header id="navigation">
        <div class="navbar navbar-inverse navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>DashboardGuest"><h1><img src="<?php echo base_url(); ?>assets/img/android-chrome-72x72.png" alt="logo"></h1></a>
                </div>
                <div class="collapse navbar-collapse">

                <ul class="nav navbar-nav navbar-right">
                   
               <li class="scroll"><a href="<?php echo base_url(); ?>RGGuest">Registro General</a></li>
                    <li class="scroll"><a href="<?php echo base_url(); ?>RTGuest">Registro a Talleres</a></li>
                    <li class="scroll"><a href="<?php echo base_url(); ?>RCGuest">Registro a Cursos</a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $this->session->userdata('nombre'); ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                    
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo base_url() ?>ValidacionSysUsers/salir"><i class="fa fa-fw fa-power-off"></i> Cerrar Sesión</a>
                            </li>
                        </ul>
                    </li>

                </ul>           
                </div>
            </div>
        </div><!--/navbar-->
    </header> <!--/#navigation-->

    <br><br><br>
<section id="acerca-de">
    <div class="container">
        <div class="text-center">

            <h2 class="title-one">Panel de Registros a Talleres</h2>
            <p>Tabla que contiene todos los registros a los talleres para el Congreso de Actualización Docente CSEIIO-CIIDIR 2017</p> 
        </div>
        <table id="tabla" class="table table-responsive table-bordered table-hover">
            <thead style="background-color:#80d4ff; color:#8c8c8c; text-aling:center;">
              <tr>
              <th>Folio de Registro de Taller</th>
                <th>Usuario de Registro al Taller</th>
                <th>Nombre del Taller</th>
            </tr>
        </thead>
               <tbody style="background-color:#e6e6e6">
              <?php 
                foreach ($consulta as $row) {
               ?>
              <tr>
                <td><?php echo $row->id_regtaller; ?></td>
                <td><?php echo $row->nombre; ?></td>
                <td><?php echo $row->nombre_taller; ?></td>
              </tr>
              <?php } ?>
            </tbody>
    </table>
        <div class="container">
                <button type="button" onclick="mostrarModalExcel();"  class="form-control btn btn-success" >
            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Crear Reporte en Excel
          </button>
    </div>
    <br>
</div>


    </section><!--/#about-us-->

   <div class="modal fade" id="modalExcel" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <center><h4 class="modal-title">Creación de reportes en Excel</h4></center>
            <br>
            <div class="alert alert-info" role="alert">Seleccione en la siguiente lista el curso del cual desee obetener el reporte, posteriormente de click en  "Imprimir reporte"</div>
          </div>
          <form role="form" method="POST" name="frmReportes" action="<?php echo base_url();  ?>ReportesRegTalleres/generarExcel">
            <div class="col-lg-12">
              <br>
                
                <div class="form-group">
               <?php 
               echo "<p><label for='txt_talleres'>Talleres: </label>";
               echo "<select class='form-control' name='txt_talleres' id='txt_talleres'>";
               if (count($talleres)) {
                foreach ($talleres as $list) {
                  echo "<option value='". $list->id_taller . "'>" . $list->nombre_taller. "</option>";
                }
              }
              echo "</select><br/>";
              ?>
              </div>
            
            <button type="submit" class="btn btn-success">
              <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Imprimir Reporte en Excel
            </button>

          </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-circle" data-dismiss="modal"><i class="fa fa-times"></i></button>
        </div>
      </div>
    </div>
  </div>


    <script type="text/javascript">

  function mostrarModalExcel()
  {
    $('#modalExcel').modal('show');
  }
  </script>