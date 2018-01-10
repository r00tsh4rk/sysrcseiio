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
                    <li class="scroll"><a href="<?php echo base_url(); ?>PanelRegistro">Regresar</a></li>
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

        <h2 class="title-one">Ficha de registro</h2>
        <p>Estos son los cursos y talleres en los que estas inscrito.</p> 
      </div>

      <h2>TALLERES</h2>

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
            </tr>
        </thead>
            <tbody style="background-color:#e6e6e6">
              <?php 
                foreach ($talleres as $row) {
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
                <td><?php echo $row->dia; ?></td>
                <td><?php echo $row->hora; ?></td>
                <td><?php echo $row->instructor; ?></td>
                <td><?php echo $row->aula; ?></td>
                <td><?php echo $row->cupo; ?></td>

              </tr>
              <?php } ?>
            </tbody>
    </table>

        <hr>

<h2>CURSOS</h2>

        <table id="tabla2" class="table table-responsive table-bordered table-hover">
            <thead style="background-color:#80d4ff; color:#8c8c8c; text-aling:center;">
              <tr>
                <th>Folio del curso</th>
                <th>Nombre del curso</th>
                <th>Descripción del curso</th>
                <th>Grupo</th>
                <th>Días</th>
                <th>Horario</th>
                <th>Ponente</th>
                <th>Aula</th>
                <th>Cupo</th>
            </tr>
        </thead>
            <tbody style="background-color:#e6e6e6">
              <?php 
                foreach ($cursos as $row) {
               ?>
              <tr>
                <td><?php echo $row->id_curso; ?></td>
                <td><?php echo $row->nombre_curso; ?></td>
                <td>
                <a href="Talleres/Descargar/<?php echo $row->descripcion_curso; ?>">
                  <button type="button" class="form-control btn btn-warning" >
                    <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Descargar
                  </button>
                </a>
              </td>
                <td><?php echo $row->grupo; ?></td>
                <td><?php echo $row->dia; ?></td>
                <td><?php echo $row->hora; ?></td>
                <td><?php echo $row->instructor; ?></td>
                <td><?php echo $row->aula; ?></td>
                <td><?php echo $row->cupo; ?></td>

              </tr>
              <?php } ?>
            </tbody>
    </table>

        <hr>
         <div>
             <a href="<?php echo base_url(); ?>Ficha/generarpdf" title="">
                 <button type="button" class="form-control btn btn-lg btn-danger" >
                        <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Imprimir Ficha de Registro
                </button>
             </a>     
        </div>

        </div>

        

    
    </section><!--/#about-us-->
