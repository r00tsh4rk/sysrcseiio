<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $titulo ?> / Curso de Actualización Docente</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

          <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/jquery.js"></script>
        <link rel="apple-touch-icon" href="<?php echo base_url(); ?>/assets/img/apple-touch-icon.png">
        <link rel="icon"  href="<?php echo base_url(); ?>/assets/img/favicon.ico" >

         <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
         <link href="<?php echo base_url(); ?>assets/css/prettyPhoto.css" rel="stylesheet">
         <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
         <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
         <link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet">
         <link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet">
         <style>
           #map {
             height: 400px;
             width: 100%;
         }
     </style>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/datatables/media/css/dataTables.bootstrap.min.css">
     <script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/datatables/media/js/jquery.js"></script>
     <script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/datatables/media/js/jquery.dataTables.min.js"></script>
     <script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/datatables/media/js/dataTables.bootstrap.min.js"></script>

     <script type="text/javascript" class="init">
     //tabla de asistencias
     $(document).ready(function() {
      $("#tabla").DataTable({
          "order": [[ 0, 'asc' ]],
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    });
} );

</script>
    </head>
    <body>
