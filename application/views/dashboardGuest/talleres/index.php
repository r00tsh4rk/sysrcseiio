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
                   
                    <li class="scroll active"><a href="<?php echo base_url(); ?>TalleresGuest">Talleres</a></li>
                    <li class="scroll"><a href="<?php echo base_url(); ?>RGGuest">Registro General</a></li>
                    <li class="scroll"><a href="<?php echo base_url(); ?>RTGuest">Registro a Talleres</a></li>


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
       
                <h2 class="title-one">Panel de Talleres</h2>
                <p>Panel que contiene todos talleres que se impartirán el Congreso de Actualización Docente CSEIIO-CIIDIR 2017</p> 
        </div>
        <table id="tabla" class="table table-responsive table-bordered table-hover">
            <thead style="background-color:#80d4ff; color:#8c8c8c; text-aling:center;">
              <tr>
                <th>Folio de Taller</th>
                <th>Nombre del Taller</th>
                <th>Descripción del Taller</th>
                <th>Grupo</th>
                <th>Cupo</th>
            </tr>
        </thead>
            <tbody style="background-color:#e6e6e6">
              <?php 
                foreach ($consulta as $row) {
               ?>
              <tr>
                <td><?php echo $row->id_taller; ?></td>
                <td><?php echo $row->nombre_taller; ?></td>
                     <td>
                <a href="Talleres/Descargar/<?php echo $row->descripcion_taller; ?>">
                  <button type="button" class="form-control btn btn-warning" >
                    <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Descargar
                  </button>
                </a>
              </td>
                <td><?php echo $row->grupo; ?></td>
                <td><?php echo $row->cupo; ?></td>
              </tr>
              <?php } ?>
            </tbody>
    </table>
    <button type="button" onclick="mostrarModal();"  class="form-control btn btn-success" >
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Taller
    </button>
        </div>
    </section><!--/#about-us-->


    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Crear un nuevo Taller</h4>
          </div>
          <form role="form" method="POST" name="frmAgregarTaller" action="<?php echo base_url();  ?>TalleresGuest/agregarTaller">
            <div class="col-lg-12">
              <br>

              <div class="form-group">
                <label>Nombre del taller</label>
                <input name="txt_nombreTaller" class="form-control" placeholder="Ingresa el nombre del taller" required>
              </div>

              <div class="form-group">
                <label>Descripción del taller</label>
                <input name="txt_descripcionTaller" class="form-control" placeholder="Ingresa el nombre del taller" required>
              </div>

                 <div class="form-group">
                <label>Grupo</label>
                <input name="txt_grupoTaller" class="form-control" placeholder="Ingresa el grupo que le corresponde al taller" required>
              </div>

            <button type="submit" class="btn btn-info">
              <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Registrar Información
            </button>

          </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-circle" data-dismiss="modal"><i class="fa fa-times"></i></button>
        </div>
      </div>
    </div>
  </div>

   <div class="modal fade" id="modalActualizar" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Editar Información del Taller</h4>
          </div>
          <form role="form" method="POST" name="frmEditarTaller" action="<?php echo base_url();  ?>TalleresGuest/editarTaller">
            <div class="col-lg-12">
              <br>
                
                 <input name="txt_IDTallerA" type="hidden">

              <div class="form-group">
                <label>Nombre del taller</label>
                <input name="txt_nombreTallerA" class="form-control" placeholder="Ingresa el nombre del taller" required>
              </div>

              <div class="form-group">
                <label>Descripción del taller</label>
                <input name="txt_descripcionTallerA" class="form-control" placeholder="Ingresa el nombre del taller" required>
              </div>

                 <div class="form-group">
                <label>Grupo</label>
                <input name="txt_grupoTallerA" class="form-control" placeholder="Ingresa el grupo que le corresponde al taller" required>
              </div>

            <button type="submit" class="btn btn-info">
              <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Registrar Información
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
      function mostrarModal()
        {

          $('#modal').modal('show');
        }

        function EditarTaller(id,nombre,descripcion,grupo)
        {
          document.frmEditarTaller.txt_IDTallerA.value = id;
          document.frmEditarTaller.txt_nombreTallerA.value = nombre;
          document.frmEditarTaller.txt_descripcionTallerA.value = descripcion;
          document.frmEditarTaller.txt_grupoTallerA.value = grupo;
          $('#modalActualizar').modal('show');
        }

  </script>
  <script type="text/javascript">
function confirma(){
  if (confirm("¿Realmente desea eliminarlo?")){ 
   }
    else { 
    return false
  }
}
</script>