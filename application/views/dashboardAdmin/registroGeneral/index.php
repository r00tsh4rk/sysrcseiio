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
                    <a class="navbar-brand" href="<?php echo base_url(); ?>DashboardAdmin"><h1><img src="<?php echo base_url(); ?>assets/img/android-chrome-72x72.png" alt="logo"></h1></a>
                </div>
                <div class="collapse navbar-collapse">

                <ul class="nav navbar-nav navbar-right">
                   
                    <li class="scroll"><a href="<?php echo base_url(); ?>TalleresAdmin">Talleres</a></li>
                    <li class="scroll active"><a href="<?php echo base_url(); ?>RGAdmin">Registro General</a></li>
                    <li class="scroll"><a href="<?php echo base_url(); ?>RTAdmin">Registro a Talleres</a></li>
                    <li class="scroll"><a href="<?php echo base_url(); ?>UsuariosAdmin">Usuarios</a></li>

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

            <h2 class="title-one">Panel de Registros Generales</h2>
            <p>Tabla que contiene todos los registros generales para el Congreso de Actualización Docente CSEIIO-CIIDIR 2017</p> 
        </div>  
    </div>
   <div class="table-responsive">
            <table  style="font-size: small;" id="tabla" class="table table-bordered table-hover">
                <thead style="background-color:#80d4ff; color:#8c8c8c; text-aling:center;">
                  <tr>
                    <th>Folio de Registro</th>
                    <th>CURP</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>BIC</th>
                    <th>Idioma</th>
                    <th>¿Usará Automovil?</th>
                    <th>Pregunta 1</th>
                    <th>Pregunta 2</th>
                    <th>Pregunta 3</th>
                    <th>Pregunta 4</th>
                    <th>Pregunta 5</th>
                    <th>Pregunta 6</th>
                    <th>Comentario</th>
                </tr>
            </thead>
               <tbody style="background-color:#e6e6e6">
              <?php 
                foreach ($consulta as $row) {
               ?>
              <tr>
                <td><?php echo $row->id_registro; ?></td>
                <td><?php echo $row->curp; ?></td>
                <td><?php echo $row->nombre; ?></td>
                <td><?php echo $row->telefono; ?></td>
                <td><?php echo $row->email; ?></td>
                <td><?php echo $row->nombre_bic; ?></td>
                <td><?php echo $row->idioma; ?></td>
                <td><?php echo $row->automovil; ?></td>
                <td><?php echo $row->opcion1; ?></td>
                <td><?php echo $row->opcion2; ?></td>
                <td><?php echo $row->opcion3; ?></td>
                <td><?php echo $row->opcion4; ?></td>
                <td><?php echo $row->opcion5; ?></td>
                <td><?php echo $row->opcion6; ?></td>
                <td><?php echo $row->comentario; ?></td>
              </tr>
              <?php } ?>
            </tbody>
        </table>
    </div>
    <br>
    <div class="container">
    <a style="color:#ffffff" href="<?php echo base_url();  ?>ReportesRegGral/generarExcel" >
            <button type="button" class="form-control btn btn-success btn-lg" >
                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Reporte en Excel
            </a>
    </div>
    <br>
</section><!--/#about-us-->
