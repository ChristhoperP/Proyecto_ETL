<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Conversion</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../../css/bootstrap.css">

</head>

<body>

    <br>
    <br>

    <div class="container">
        <h2>Data Conversion.</h2>
        <!-- <p>Seleccionar la tabla de origen o la consulta para los datos de origen:</p> -->
        <form class="needs-validation" id="formulario-origen">
            <div class="row mb-2 font-weight-bold">
                <div class="col-2">Campo</div>
                <div class="col-1">Tipo</div>
                <div class="col-2">conversión</div>
            </div>
            <div id="tabla-1">
            </div>

            <br>
            <div class="row mb-2">
                <div class="col-12 font-weight-bold">Agregar Concatenación</div>
                <div class="col-2 font-weight-bold">Campo</div>
                <div class="col-1 font-weight-bold">Nombre:
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nombre-concat">
                    </div>
                </div>
                <div class="col-1 border-right">
                    <div class="form-group">
                        <button type="button" class="btn btn-success" style="padding-left: 4px; padding-right: 4px;" id="btn-agregar">Agregar</button>
                    </div>
                </div>
        </form>
        <div class="col-4 font-weight-bold">Campos Concatenados</div>
        <!-- Listado -->
        <div class="col-6 border-right">
            <form id="formulario-concatenas">
                <div id="listado-campos">
                </div>
            </form>

        </div>
        <!-- campos concatenados -->
        <div class="col-6">
            <form id="formulario-concatenado">
                <div id="campo-concatenado">
                </div>
            </form>
        </div>
    </div>

    <br>
    <button type="submit" class="btn btn-primary mt-4" id="btn-concat">Siguiente</button>

    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>


    <script src="../../js/conversion.js"></script>

</body>

</html>