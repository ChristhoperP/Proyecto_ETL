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
            <div class="row mb-1">
                <div class="col-2">
                    <label for="">FirstName</label>
                </div>
                <div class="col-1">
                    <label for="">varchar(50)</label>
                </div>
                <div class="col-2">
                    <select class="form-control" id="sel1" name="sellist1">
                        <option>mantener</option>
                        <option>Mayuscula</option>
                        <option>Minuscula</option>
                        <option>Hora</option>
                    </select>
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-2">
                    <label for="">LastName</label>
                </div>
                <div class="col-1">
                    <label for="">varchar(50)</label>
                </div>
                <div class="col-2">
                    <select class="form-control" id="sel1" name="sellist1">
                        <option>mantener</option>
                        <option>Mayuscula</option>
                        <option>Minuscula</option>
                        <option>Hora</option>
                    </select>
                </div>
            </div>

            <br>
            <div class="row mb-2">
                <div class="col-12 font-weight-bold">Agregar Concatenación</div>
                <div class="col-2 font-weight-bold">Campo</div>
                <div class="col-1 font-weight-bold">Nombre:
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <input type="text" class="form-control" id="usr">
                    </div>
                </div>
                <div class="col-1 border-right">
                    <div class="form-group">
                        <button type="button" class="btn btn-success" style="padding-left: 4px; padding-right: 4px;" id="btn-agre">Agregar</button>
                    </div>
                </div>
                <div class="col-4 font-weight-bold">Campos Concatenados</div>
                <!-- Listado -->
                <div class="col-6 border-right">
                    <div id="listado-campos">
                        <div class="row">
                            <div class="col-2">
                                <div class="form-check">
                                    <label class="form-check-label" for="check1">
                                        <input type="checkbox" class="form-check-input" id="check1" name="option1"
                                            value="something">
                                        FirstName
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <div class="form-check">
                                    <label class="form-check-label" for="check1">
                                        <input type="checkbox" class="form-check-input" id="check1" name="option1"
                                            value="something">
                                        LastName
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- campos concatenados -->
                <div class="col-4">
                    <div id="campo-concatenado">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-check">
                                    <label class="form-check-label" for="check1">
                                        <input type="checkbox" class="form-check-input" id="check1" name="option1"
                                            value="something" checked>
                                        CampoConcatenado1
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-check">
                                    <label class="form-check-label" for="check1">
                                        <input type="checkbox" class="form-check-input" id="check1" name="option1"
                                            value="something" checked>
                                        CampoConcatenado2
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <button type="submit" class="btn btn-primary mt-4" id="btn-org">Siguiente</button>
        </form>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>


    <!-- <script src="../../js/origen.js"></script> -->

</body>

</html>