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
                    <li class="scroll"><a href="<?php echo base_url(); ?>RGAdmin">Registro General</a></li>
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
            <h2 class="title-one">Panel de Empleados</h2>
            <p>Bienvenidos al portal de administración de Empleados para el Congreso de Actualización Docente CSEIIO-CIIDIR 2017</p> 
        </div>

        <table id="tabla" class="table table-responsive table-bordered table-hover">
            <thead style="background-color:#80d4ff; color:#8c8c8c; text-aling:center;">
              <tr>
                <th>CURP</th>
                <th>Nombre de empleado</th>
                <th>BIC</th>
                <th>Categoria</th>
                <th>Registrado</th>             
            </tr>
        </thead>
        <tbody style="background-color:#e6e6e6">
              <?php 
                foreach ($consulta as $row) {
               ?>
              <tr>
                <td><?php echo $row->curp; ?></td>
                <td><?php echo $row->nombre; ?></td>
                <td><?php echo $row->bic; ?></td>
                <td><?php echo $row->categoria; ?></td>
                <td><?php echo $row->registrado; ?></td>
              </tr>
              <?php } ?>
            </tbody>
    </table>
</section><!--/#about-us-->