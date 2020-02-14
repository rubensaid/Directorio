<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <title>Directorio de comercios</title>  
  <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="/dist/css/AdminLTE.css">
</head>

<body class="layout-top-nav" style="min-width:1000px; _width: expression( document.body.clientWidth > 700 ? 700px : auto ); overflow-x:scroll;">

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Directorio de comercios
    </h1>
  </section>
  
  <section class="content container-fluid">
  <?php
  $i = 0;
  
  foreach ($comercios as $comercio)
  {
    if ($i % 4 == 0)
    {
      if ($i > 0)
      {
        echo '</div>';
      }
      
      echo '<div class="row">';
    }
    
    $i++;
    ?>
    <div class="col-md-3">
      <div class="box box-default box-solid collapsed-box">
        <div class="box-header with-border">
          <h3 class="box-title">{{ $comercio->publicname }}</h3>
          <div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button></div>
        </div>
        <div class="box-body">
          <a href = "{{ $comercio->profileBase }}{{ $comercio->shortname }}"><b>Perfil de {{ $comercio->publicname }}</b></a><br>
          @if ($comercio->district != '')
            Distrito: {{ $comercio->district }} <br>
          @endif
          
          @if ($comercio->webpage != '')
            Sitio Web: <a href='http://{{ $comercio->webpage }}'>{{ $comercio->webpage }}</a> <br>
          @endif
          
          @if ($comercio->facebook != '')
            Facebook: <a href='http://{{ $comercio->facebook }}'>{{ $comercio->facebook }}</a> <br>
          @endif          
        </div>
      </div>
    </div>
  <?php
  }
  ?>
  </section>
</div>

<!-- jQuery 3 -->
<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>

</body>
</html>
