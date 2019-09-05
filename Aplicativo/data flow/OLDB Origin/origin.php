<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Origen</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../../css/bootstrap.css">

</head>

<body>

    <br>
    <br>

    <div class="container">
        <h2>Origen OLDB</h2>
        <p>Seleccionar la tabla de origen o la consulta para los datos de origen:</p>
        <form action="">
            <div class="form-check-inline">
                <label class="form-check-label" for="radio1">
                    <input type="radio" class="form-check-input" id="seleccion-tabla" name="optradio"
                        value="option1">Tabla
                </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label" for="radio2">
                    <input type="radio" class="form-check-input" id="seleccion-consulta" name="optradio"
                        value="option2">Consulta
                </label>
            </div>

            <div class="mt-4 d-none" id="panel-tabla">
                <select multiple class="form-control" id="tabla-origen" name="sellist2">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>

            <div class="mt-4 d-none" id="panel-consulta">
                <textarea class="form-control" rows="5" id="consulta" name="text"></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-primary mt-4" id="btn-org" disabled>Siguiente</button>
        </form>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/origen.js"></script>

</body>

</html>