<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ETL</title>
  <!-- Bootstrap core CSS -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="../../css/bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</head>

<body>

  <br>
  <br> 


    <div class="container">
    <h1>Asignaciones Destino OLDB</h1>
    <br>
    <br> 
  <form class="needs-validation" id="formulario-proceso" novalidate>
  <div class="row mb-2">
  <div class="col-3">Columnas Base Olap</div>
  <div class="col-3">Columnas conversion</div>
  </div>
  <div class="container">
    <div class="row mb-2" >
  <div class="list-group col-3" id="lista-columnas"></div>

  <div class="col-md" id="lista-conversion"></div>
  </div>
  </div>
  <button type="submit" class="btn btn-primary mt-4" id="btn-consulta">Consultar</button>
</div>
  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
 
  <script src="../../js/jquery.min.js"></script>
  <script src="../../js/proceso.js"></script>
  <script src="../../js/flujo.js"></script>
<!--   <script src="../../js/proceso2.js"></script> -->
  <script src="../../js/popper.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  

</body>

</html>