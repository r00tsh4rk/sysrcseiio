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
                    <a class="navbar-brand" href="<?php echo base_url() ?>/CursosA"><h1><img src="<?php echo base_url(); ?>assets/img/android-chrome-72x72.png" alt="logo"></h1></a>
                </div>
                <div class="collapse navbar-collapse">

                <ul class="nav navbar-nav navbar-right">
                <li class="scroll"><a href="<?php echo base_url(); ?>CursosA">Cursos</a></li>
                 <li class="scroll"><a href="<?php echo base_url(); ?>Talleres">Talleres</a></li>
                 <li class="scroll"><a href="<?php echo base_url(); ?>VerRegistros">Ver Ficha de Registro</a></li>
                   
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

        <h2 class="title-one">Panel de Inscripciones</h2>
      </div>

      <div align="center">
       <img style="height: 200px; width: 350px;" src="<?php echo base_url(); ?>/assets/img/slider/logo_imagina_bic.jpg" alt="logo_segundo_congreso">
    </div>

      <hr>
      <div style="color: #205174" align="center">
        <h2>RECOMENDACIONES PARA REALIZAR TU INSCRIPCIÓN</h2>
        <ol style=" font-size: 18px; color: #E33E51">
          <li>INGRESA AL APARTADO "CURSOS", DEBES DE ELEGIR UN CURSO DEL GRUPO A Y OTRO DEL GRUPO B.</li>
          <br>
          <li>POSTERIORMENTE INGRESA AL APARTADO "TALLERES", DEBES DE ELEGIR UN TALLER DEL GRUPO A Y OTRO DEL GRUPO B.</li>
          <br>
           <li>PUEDES CONSULTAR LOS TALLERES Y CURSOS A LOS QUE TE HAS INSCRITO EN EL APARTADO "VER FICHA DE REGISTRO".</li>
           <br>
        </ol>
      </div>

        </div>


    </section><!--/#about-us-->


