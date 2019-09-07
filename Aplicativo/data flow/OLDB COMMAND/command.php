<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Odbl Command</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../../css/bootstrap.css">

</head>

<body>

<br>
    <br>

    <div class="container">
    <h2>OLE DB COMMAND</h2>
    <p>Ingrese el "SqlCommand" para la siguiente base:</p>  
          <form class="needs-validation" id="formulario-command">
            <div class="form-check-inline">
                <label class="form-check-label" for="radio1">
                    <input type="radio" class="form-check-input" id="seleccion-consulta" name="consulta-olap"
                        value="option1">Consulta
                </label>
            </div>



            <div class="mt-4 d-none" id="panel-consulta">
                <textarea class="form-control" rows="5" id="consulta" name="consulta"></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-primary mt-4" id="btn-com" disabled>Siguiente</button>
        </form>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/command.js"></script>

</body>

</html>