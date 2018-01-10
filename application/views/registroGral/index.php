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
                    <a class="navbar-brand" href="index.html"><h1><img src="<?php echo base_url(); ?>assets/img/android-chrome-72x72.png" alt="logo"></h1></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="scroll"><a href="<?php echo base_url(); ?>ValidacionGral/salir">Salir</a></li>
                    </ul>
                </div>
            </div>
        </div><!--/navbar-->
    </header> <!--/#navigation-->

    <br><br><br>
<section id="acerca-de">
    <div class="container">
        <div class="text-center">
       
                <h2 class="title-one">Registro general</h2>
                <p>Bienvenido al panel de registro general para el 1er Congreso de Actualización Docente CSEIIO - CIIDIR 2017, rellena los siguientes campos para
                realizar un registro correcto y acceder a los talleres que se impartirán en la presente Jornada.</p> 
        </div>
            <div>
                     <form role="form" method="POST" name="frmRegGral" action="<?php echo base_url();  ?>ValidaRegistro/Agregar">
                            <div class="col-lg-12">
                                  <br>

                                  <input name="txt_curp" type="hidden" value="<?php echo $this->session->userdata('curp'); ?>">

                                  <div class="form-group">
                                    <label>Nombre</label>
                                    <input name="txt_nombreD" class="form-control" value="<?php echo $this->session->userdata('nombre'); ?>" disabled>
                                </div>

                                <input name="txt_nombre" type="hidden" value="<?php echo $this->session->userdata('nombre'); ?>">

                                <div class="form-group">
                                    <label>BIC</label>
                                    <input name="txt_bicD" class="form-control"  value="<?php echo $this->session->userdata('bic'); ?>" disabled>
                                </div>
                               
                                <div class="row" class="form-group">

                                    <div class="col-xs-3">
                                     <label>Perfil Académico</label>
                                        <input type="text" name="txt_perfil" class="form-control" placeholder="Ingeniero, Licenciado, Técnico, etc.">
                                    </div>
                                    
                                    <div class="col-xs-4">
                                    <label>En</label>
                                        <input type="text" name="txt_especialidad" class="form-control" placeholder="Sistemas, Electrónica, Agronomo, etc.">
                                    </div>
                                </div>
                                <br>
                                <input name="txt_bic" type="hidden" value="<?php echo $this->session->userdata('bic'); ?>">

                                <div class="form-group">
                                    <label>Teléfono</label>
                                    <input type="number" name="txt_telefono" class="form-control" placeholder="Ingresa tu teléfono" >
                                </div>

                                <div class="form-group">
                                    <label>Correo electrónico</label>
                                    <input type="email" name="txt_email" class="form-control" placeholder="Ingresa tu correo electrónico" required>
                                </div>

                                <div class="form-group">
                                    <label>¿Que idiomas hablas?</label>
                                    <input  name="txt_idioma" class="form-control" placeholder="Ingresa los idiomas que hablas, separados por una coma" >
                                </div>

                                <div class="form-group">
                                <label>¿Asistirá con Automóvil?</label>
                                    <div class="radio">
                                     
                                      <label><input type="radio" value="si" name="automovil_radio">Si</label>
                                  </div>
                                  <div class="radio">
                                      <label><input type="radio" value="no" name="automovil_radio">No</label>
                                  </div>
                              </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="txt_password" class="form-control" placeholder="Escribe un password de 4 caracteres como minimo, incluye letras y números, este password te servira para ingresar al registro de talleres." >
                                </div>

                                <div class="form-group">
                                    <label>Escoje tus necesidades de formación como docente:</label>  
                                </div>

                                <div class="form-group">
                                        <div class="checkbox">
                                          <label>
                                            <input type="checkbox" name="p1" value="Reforma Educativa">
                                            Reforma educativa
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                        <div class="checkbox">
                                          <label>
                                            <input type="checkbox" name="p2"  value="Modelo Educativo Modular">
                                            Modelo Educativo Modular
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                        <div class="checkbox">
                                          <label>
                                            <input type="checkbox" name="p3" value="Actualización de tu área">
                                            Actualización de tu área
                                        </label>
                                    </div>
                                </div>

                                 <div class="form-group">
                                        <div class="checkbox">
                                          <label>
                                            <input type="checkbox" name="p4" value="Diseño de estrategias didáctivas">
                                            Diseño de estrategias didáctivas
                                        </label>
                                    </div>
                                </div>

                                 <div class="form-group">
                                        <div class="checkbox">
                                          <label>
                                            <input type="checkbox" name="p5" value="Evaluar aprendizaje">
                                            Evaluar aprendizaje
                                        </label>
                                    </div>
                                </div>

                                 <div class="form-group">
                                        <div class="checkbox">
                                          <label>
                                            <input type="checkbox" name="p6" value="Desarrollar competencias docentes">
                                            Desarrollar competencias docentes
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Deja un comentario respecto al curso</label>
                                    <textarea name="txt_comentario" class="form-control" placeholder="Deja tu comentario respecto al Curso de Actualización Docente 2017" >    
                                    </textarea>
                                </div>
                                <center>
                                    <button type="submit" class="btn btn-success">
                                        <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Realizar Registro
                                    </button>
                                </center>
                          </div>
                      </form>
            </div>
        </div>


    </section><!--/#about-us-->

