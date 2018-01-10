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
                    <a class="navbar-brand" href="<?php echo base_url() ?>PanelRegistro"><h1><img src="<?php echo base_url(); ?>assets/img/android-chrome-72x72.png" alt="logo"></h1></a>
                </div>
                <div class="collapse navbar-collapse">

                <ul class="nav navbar-nav navbar-right">
                <li class="scroll"><a href="<?php echo base_url(); ?>PanelRegistro">Regresar al panel inicial   </a></li>
                <li class="scroll"><a href="<?php echo base_url(); ?>CursosA">Ir a Cursos</a></li>
                <li class="scroll"><a href="<?php echo base_url(); ?>VerRegistros">Ver Ficha de Registro</a></li>
                   <li class="scroll"><a href="<?php echo base_url(); ?>TalleresB">Talleres B</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $this->session->userdata('nombre'); ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                    
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo base_url() ?>ValidaLoginTalleres/salir"><i class="fa fa-fw fa-power-off"></i> Cerrar Sesión</a>
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

        <h2 class="title-one">Panel de Talleres A</h2>
        <p>Panel que contiene todos talleres que se impartirán el Congreso de Actualización Docente CSEIIO-CIIDIR 2017, recuerda que solo puedes inscribirte a dos talleres.</p> 
      </div>

              <div>
                <?php
                $valido = $this->session->flashdata('valido');
                $invalido = $this->session->flashdata('invalido');
                $userNormal = $this->session->flashdata('userNormal');
                $userDesComunitario = $this->session->flashdata('userDesComunitario');
                $yaInscrito = $this->session->flashdata('yaInscrito');

                if($invalido) { ?>

                <div class="alert alert-danger alert-dismissible" style="text-aling:center; color:#8c8c8c"  role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Opps!</strong> <?php echo $invalido ?>
                </div>

                <?php } 
                if (validation_errors()) { ?>

                <div class="alert alert-warning alert-dismissible" style="text-aling:center; color:#8c8c8c"  role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Opps!</strong> <?php echo validation_errors(); ?>
                </div>

                <?php } 
                    if ($valido) { 
                 ?>   
                    <div class="alert alert-success alert-dismissible" style="text-aling:center; color:#8c8c8c"  role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Correcto!</strong> <?php echo $valido ?>
                </div>

                 <?php } 

                    if ($userNormal) { 
                 ?>

                 <div class="alert alert-danger alert-dismissible" style="text-aling:center; color:#8c8c8c"  role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Opps!</strong> <?php echo $userNormal ?>
                </div>

                 <?php } 
                    if ($userDesComunitario) { 
                 ?>
                 <div class="alert alert-danger alert-dismissible" style="text-aling:center; color:#8c8c8c"  role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Opps!</strong> <?php echo $userDesComunitario ?>
                </div>
                 <?php } 
                    if ($yaInscrito) { 
                 ?>
                 <div class="alert alert-danger alert-dismissible" style="text-aling:center; color:#8c8c8c"  role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Opps!</strong> <?php echo $yaInscrito ?>
                </div>

                <?php } ?>
            </div>

        <table id="tabla" class="table table-responsive table-bordered table-hover">
            <thead style="background-color:#80d4ff; color:#8c8c8c; text-aling:center;">
              <tr>
                <th>Folio de Taller</th>
                <th>Nombre del Taller</th>
                <th>Descripción del Taller</th>
                <th>Grupo</th>
                <th>Días</th>
                <th>Horario</th>
                <th>Ponente</th>
                <th>Aula</th>
                <th>Cupo</th>
                <th>Inscribirse</th>
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
                <td style="color: #F02424"><?php echo $row->grupo; ?></td>
                <td><?php echo $row->dia; ?></td>
                <td><?php echo $row->hora; ?></td>
                <td><?php echo $row->instructor; ?></td>
                <td><?php echo $row->aula; ?></td>
                <td><?php echo $row->cupo; ?></td>
                  <td>
                <?php if($row->cupo <= 0) {
                  ?>
                  <button type="button" onclick="mostrarModal('<?php echo $row->id_taller; ?>','<?php echo $row->cupo; ?>');"  class="form-control btn btn-success" disabled>
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Inscribirse 
                  </button>
                  <?php }
                    else{

                   ?>

                <button type="button" onclick="mostrarModal('<?php echo $row->id_taller; ?>','<?php echo $row->cupo; ?>','<?php echo $row->clave_taller; ?>','<?php echo $row->grupo; ?>');"  class="form-control btn btn-success" >
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Inscribirse 
                  </button>

                   <?php } ?>
                </td>
              </tr>
              <?php } ?>
            </tbody>
    </table>

        </div>


    </section><!--/#about-us-->


        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Confirmar Inscripción</h4>
          </div>
          <form role="form" method="POST" name="frmInscripcion" action="<?php echo base_url();  ?>ValidacionRegistroTalleres">
            <div class="col-lg-12">
              <br>
              <div class="form-group">
                <label>Usuario a inscribirse</label>
                <input name="txt_usuarioD" class="form-control" value="<?php echo $this->session->userdata('curp'); ?>" disabled>
                <input name="txt_usuario" type="hidden" value="<?php echo $this->session->userdata('curp'); ?>" >
              </div>

               <div class="form-group">
                <label>Folio del Taller</label>
                <input name="txt_folioTallerD" class="form-control" placeholder="Clave de BIC" disabled>
                 <input name="txt_folioTaller" type="hidden" >
              </div>

               <div class="form-group">
                <label>Cupo Actual</label>
                <input name="txt_cupoD" class="form-control" placeholder="Nombre de empleado" disabled>
                 <input name="txt_cupo" type="hidden" >
              </div>


               <input name="txt_clave_taller" type="hidden" >
               <input name="txt_grupo" type="hidden" >

            <button type="submit" class="btn btn-info">
              <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Inscribirse
            </button>

          </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-circle" data-dismiss="modal"><i class="fa fa-times"></i></button>
        </div>
      </div>
    </div>
  </div>


    <div class="modal fade" id="modalInfo" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <center><h4 class="modal-title">Importante</h4></center>
          </div>
        
            <div style="text-align: center; font-size: xx-large;" class="alert alert-warning"><strong>Para la inscripción a talleres, cada asesor deberá elegir un taller de horario A y un taller en horario B, estos talleres deben ser diferentes.</strong></div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-circle" data-dismiss="modal"><i class="fa fa-times"></i></button>
        </div>
      </div>
    </div>
  </div>



<script type="text/javascript">
    $(window).load(function(){
        $('#modalInfo').modal('show');
    });
    </script>
    
  <script type="text/javascript">
  function mostrarModal(folio, cupo, clave_taller, grupo)
  {
    document.frmInscripcion.txt_folioTaller.value = folio;
    document.frmInscripcion.txt_cupo.value = cupo;
    document.frmInscripcion.txt_folioTallerD.value = folio;
    document.frmInscripcion.txt_cupoD.value = cupo;
    document.frmInscripcion.txt_clave_taller.value = clave_taller;
    document.frmInscripcion.txt_grupo.value = grupo;
    $('#modal').modal('show');
  }
  </script>