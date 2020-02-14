<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <title>Perfil de {{ $comercio->publicname }}</title>  
  <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="/dist/css/AdminLTE.css">
</head>

<body class="layout-top-nav" style="min-width:1000px; _width: expression( document.body.clientWidth > 700 ? 700px : auto ); overflow-x:scroll;">

<div class="content-wrapper">
    
  <section class="content container-fluid">
	
  <!-- Informacion de comercio -->
  <div class="col-md-offset-4 col-md-4">
    <div class="row">
      <div class="box box-default box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Información de comercio</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
        </div>
        
        <div class="box-body">
          <center><b>Perfil de {{ $comercio->publicname }}</b><br>
          
          <img src='https://tukuy.club/{{ $comercio->imageprofile }}' height='200'></center><br>
          @if ($comercio->district != '')
            Distrito: {{ $comercio->district }}<br>
          @endif
          
          @if ($comercio->webpage != '')
            Sitio web: <a href="http://{{ $comercio->webpage }}">{{$comercio->webpage}}</a><br>
          @endif
          
          @if ($comercio->facebook != '')
            Facebook: <a href='http://{{ $comercio->facebook }}'>{{ $comercio->facebook }}</a><br>
          @endif
        </div>
      </div>
    </div>
    
    <!-- Comentarios -->
    <div class="row">
      <div class="box box-default box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Comentarios</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="box-body"><div class="col-md-12">
        <?php
        $i = 0;
        foreach ($comentarios as $comentario)
        {
          echo '<div class="row"><b>'.$comentario->nombre.' escribio:</b><br>'.$comentario->comentario.'</div><br>';
          $i++;
        }
        
        if ($i == 0)
          echo "<b>No hay comentarios.</b>";
        ?>
        </div></div>
      </div>
    </div>
  
    <!-- Escribir un comentario -->
    <div class="row">
      <div class="box box-default box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Escribir un comentario</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
        </div>
        
        <div class="box-body">
        
          <!-- Mostrar el mensaje de error, si lo hay -->
          {{ $commentStatus }}
          <br>
          <form class="form-horizontal" method="post" id="comentario">
            @method('PUT')
            @csrf
            Nombre: <input type="text" name="nombre"><br><br>
            Mensaje:<br><textarea name="comentario" form="comentario" class="col-md-12" placeholder="Ingrese su mensaje (300 caracteres como máximo)" maxlength="300"></textarea><br><br><br>
            <center><br><button type="submit" class="btn btn-success" name="enviar">Enviar</button></center>
          </form>
        </div>
      </div>
    </div>
    
    <div class="row"><br><a style="align-left" href="{{ $comercio->profileBase }}">Volver</a></div>
    
  </div>
  
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