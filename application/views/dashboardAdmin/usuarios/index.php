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
                    <li class="scroll active"><a href="<?php echo base_url(); ?>UsuariosAdmin">Usuarios</a></li>

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

                <h2 class="title-one">Panel de Usuarios</h2>
                <p>Panel de administración de Usuarios para Acceso al Sistema Web del Congreso de Actualización Docente CSEIIO-CIIDIR 2017</p> 
            </div>
            <table id="tabla" class="table table-responsive table-bordered table-hover">
                <thead style="background-color:#80d4ff; color:#8c8c8c; text-aling:center;">
                  <tr>
                      <th>ID de Usuario</th>
                      <th>Nombre de Usuario</th>
                      <th>Password</th>
                      <th>Nombre</th>
                      <th>Nivel</th>
                      <th>Editar</th>
                      <th>Eliminar</th>
                  </tr>
              </thead>
               <tbody style="background-color:#e6e6e6">
              <?php 
                foreach ($consulta as $row) {
               ?>
              <tr>
                <td><?php echo $row->id_usuario; ?></td>
                <td><?php echo $row->username; ?></td>
                <td><?php echo $row->password; ?></td>
                <td><?php echo $row->nombre; ?></td>
                <td><?php echo $row->nivel; ?></td>
                <td>
                  <button type="button" onclick="EditarUsuario('<?php echo $row->id_usuario; ?>','<?php echo $row->username ?>','<?php echo $row->password; ?>','<?php echo $row->nombre; ?>','<?php echo $row->nivel; ?>');" class="form-control btn btn-warning" >
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar 
                  </button>
                </td>
                <td>
                  <a href="<?php echo base_url(); ?>UsuariosAdmin/eliminarUsuario/<?php echo $row->id_usuario; ?>">
                    <button type="button" onclick="if(confirma() == false) return false" class="form-control btn btn-danger" >
                      <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar
                    </button>
                  </a>
                </td>

              </tr>
              <?php } ?>
            </tbody>
          </table>
          <button type="button" onclick="mostrarModal();"  class="form-control btn btn-success" >
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Usuario
        </button>
    </div>
</section><!--/#about-us-->


    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Crear un nuevo Usuario</h4>
          </div>
          <form role="form" method="POST" name="frmAgregarUsuarios" action="<?php echo base_url();  ?>UsuariosAdmin/agregarUsuario">
            <div class="col-lg-12">
              <br>

              <div class="form-group">
                <label>Usuario</label>
                <input name="txt_nombreUsuario" class="form-control" placeholder="Ingresa el username que deseas tener para ingresar al sistema" required>
              </div>

              <div class="form-group">
                <label>Password</label>
                <input type="password" name="txt_passUsuario" class="form-control" placeholder="Ingresa tu password" required>
              </div>

              <div class="form-group">
                <label>Nombre Completo</label>
                <input name="txt_nombre" class="form-control" placeholder="Ingresa tu nombre completo" required>
              </div>

              <div class="form-group">
                <label for="list_nivel">Nivel</label>
                <select class="form-control" name="list_nivel" id="list_nivel">
                  <option value="2">Administrador Invitado</option>
                  <option value="3">Administrador</option>
                </select>
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
            <h4 class="modal-title">Editar la información del Usuario</h4>
          </div>
          <form role="form" method="POST" name="frmEditarUsuarios" action="<?php echo base_url();  ?>UsuariosAdmin/editarUsuario">
            <div class="col-lg-12">
              <br>

              <input name="txt_IDUsuarioA" type="hidden">

              <div class="form-group">
                <label>Usuario</label>
                <input name="txt_nombreUsuarioA" class="form-control" placeholder="Ingresa el username que deseas tener para ingresar al sistema" required>
              </div>

              <div class="form-group">
                <label>Password</label>
                <input type="password" name="txt_passUsuarioA" class="form-control" placeholder="Ingresa tu password" required>
              </div>

              <div class="form-group">
                <label>Nombre Completo</label>
                <input name="txt_nombreA" class="form-control" placeholder="Ingresa tu nombre completo" required>
              </div>

              <div class="form-group">
                <label for="list_nivelA">Nivel</label>
                <select class="form-control" name="list_nivelA" id="list_nivelA">
                  <option value="2">Administrador Invitado</option>
                  <option value="3">Administrador</option>
                </select>
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

        function EditarUsuario(id,username,password,nombre,nivel)
        {
          document.frmEditarUsuarios.txt_IDUsuarioA.value = id;
          document.frmEditarUsuarios.txt_nombreUsuarioA.value = username;
          document.frmEditarUsuarios.txt_passUsuarioA.value = password;
          document.frmEditarUsuarios.txt_nombreA.value = nombre;
          document.frmEditarUsuarios.list_nivelA.value = nivel;
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