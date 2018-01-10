<html>
  <head>
      <link rel="stylesheet" type="text/css" href="./assets/css/dompdf.css">
  </head>

<body>

  <header>
      <table align="center">
          <tr>
              <td id="header_logo">
                  <img id="logo" src="./assets/img/cabecera.gif">
              </td>

               <td id="header_logo">
                  <img id="logo1" src="./assets/img/apple-touch-icon-57x57.png">
              </td>

               <td id="header_logo">
                  <img id="logo2" src="./assets/img/icongm.png">
              </td>

              <td id="header_logo">
                  <img id="logo3" src="./assets/img/logo_imagina_bic.jpg">
              </td>
          </tr>
      </table>
  </header>

  <footer>

      <div id="footer_texto">Fecha y hora de impresión: <?php 
      date_default_timezone_set('America/Mexico_City'); 
      $time = time();
      $hoy = date("d-m-Y H:i:s", $time);
      echo $hoy;
      ?></div>
  </footer>

   <center>
   <h2>Colegio Superior para la Educación Integral Intercultural de Oaxaca</h2>
   <h3>Ficha de Inscripción del 2ndo Congreso CSEIIO - CIDIIR 2017</h3></center>
    <?php foreach ($empleado as $key) {  ?>
        <h3>Nombre del asesor :  </h3> <?php echo $key->nombre;?>
        <h3>Académia :  </h3> <?php echo $key->academia;?>
        <h3>Bachillerato:  </h3> <?php echo $key->nombre_bic;?>
    <?php } ?>

  <center><h2>Talleres</h2></center>
  <table border="1" id="table_info">
       <thead>
           <tr>
               <th>Folio Taller</th>
               <th>Nombre del Taller</th>
               <th>Grupo</th>
               <th>Días</th>
               <th>Hora</th>
               <th>Instructor</th>
               <th>Aula</th>
           </tr>
       </thead>
       <tbody>
          <?php foreach ($talleres as $row) { ?>
            <tr>
                <td><?php echo $row->id_taller;?></td>
                <td><?php echo $row->nombre_taller;?></td>
                <td><?php echo $row->grupo;?></td>
                <td><?php echo $row->dia;?></td>
                <td><?php echo $row->hora;?></td>
                <td><?php echo $row->instructor;?></td>
                <td><?php echo $row->aula;?></td>
            </tr>
          <?php  }?>
       </tbody>
</table>

<hr>
<center><h2>Cursos</h2></center>
  
  <table border="1" id="table_info">
       <thead>
           <tr>
               <th>Folio Curso</th>
               <th>Nombre del Curso</th>
               <th>Grupo</th>
               <th>Días</th>
               <th>Hora</th>
               <th>Instructor</th>
               <th>Aula</th>
           </tr>
       </thead>
       <tbody>
          <?php foreach ($cursos as $row) { ?>
            <tr>
                <td><?php echo $row->id_curso;?></td>
                <td><?php echo $row->nombre_curso;?></td>
                <td><?php echo $row->grupo;?></td>
                <td><?php echo $row->dia;?></td>
                <td><?php echo $row->hora;?></td>
                <td><?php echo $row->instructor;?></td>
                <td><?php echo $row->aula;?></td>
            </tr>
          <?php  }?>
       </tbody>
</table>

</body>
</html>
