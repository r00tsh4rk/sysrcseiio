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
                    <a class="navbar-brand" href="<?php echo base_url(); ?>"><h1><img src="<?php echo base_url(); ?>assets/img/android-chrome-72x72.png" alt="logo"></h1></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="scroll active"><a href="<?php echo base_url(); ?>">Inicio</a></li>
                        <li class="scroll"><a href="<?php echo base_url(); ?>">Salir</a></li>
                    </ul>
                </div>
            </div>
        </div><!--/navbar-->
    </header> <!--/#navigation-->

    <br><br><br>
    <section id="acerca-de">
        <div class="container">
            <div class="text-center">

                <h2 class="title-one">Acceso al Registro General</h2>
                <p>Bienvenido, ingresa tu CURP para acceder al Registro General para el Congreso de Actulización Docente del CSEIIO 2017 </p>
            </div>
            <div>
                <?php
                $invalido = $this->session->flashdata('invalido');

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

               <?php }  ?>   

           </div>
           <div>
               <form role="form" method="POST" name="frmGral" action="<?php echo base_url(); ?>ValidacionGral">
                <div class="col-lg-12">
                  <br>
          
                     <div class="form-group">
                        <label>CURP:</label>
                        <input name="txt_curpGral" class="form-control input-lg" placeholder="Ingrese la CURP ej: RUCR920915HOCZHS06" required>
                    </div>
 
                <div>
                   <center>
                    <button type="submit" class="btn btn-success btn-lg">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Ingresar
                    </button>
                </center>
            </div>
               
            </div>

        </form>
    </div>

</div>
</section><!--/#about-us-->
