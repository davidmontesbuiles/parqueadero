<?php
date_default_timezone_set('America/Bogota');
  include_once('../model/consultas.php');
  if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    if (!empty($_GET['celda'])) {
    $celda = $_GET['celda'];
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/png" href="../img/ico.png">
    <title>Vehiculos Registrados</title>
</head>

<body>
    <?php 
    include('../include/navbar.php');
    ?>

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <H2>Vehiculos Registrados</H2>
            </div>

            <div class="col-md-12" style="margin-top: 3%;"></div>

            <a href="../include/pdf/reporte" target="_blank"><button type="button" class="btn btn-info"
                    id="reporte">Generar informe mensual</button></a>
            <div class="col-md-12" style="margin-top: 3%;"></div>

            <div class="col-md-12" style="background-color: white; border: 2px solid #00e2b0;">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Foto </th>
                            <th>Cedula</th>
                            <th>Placa</th>
                            <th>Modelo o Cilindraje</th>
                            <th>Puertas o Tiempos</th>
                            <th>Tipo vehiculo</th>
                            <th>Celda</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= consultas::cargar_vehiculos() ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12" style="margin-top: 3%;"></div>

        </div>

        <!-- Modal -->
        <button id="salida" style="display: none;" data-toggle="modal" data-target="#exampleModalCenter"></button>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" aria-label="Close">
                            <a href="index" style="text-decoration:none; color:red;"><span
                                    aria-hidden="true">&times;</span></a>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="">Fecha de salida <span class="sp">*</span></label>
                        <input type="date" class="form-control" name="fecha" id="fecha" value="<?= date('Y-m-d') ?>">
                        <label for="">Hora de salida <span class="sp">*</span></label>
                        <input type="time" class="form-control" name="hora" id="hora" value="<?= date('H:i:s') ?>">
                        <label for="">Celda que ocupaba <span class="sp">*</span></label>
                        <input type="text" class="form-control" name="celda" id="celda" readonly value="<?= $celda ?>">
                        <input type="hidden" class="form-control" name="idCode" id="idCode" value="<?= $id ?>">
                    </div>

                    <div style="text-align:center;">
                        <hr>
                        <a href="index"><button type="button" class="btn btn-danger" id="cancelar">Cancelar</button></a>
                        <button type="button" class="btn btn-success" id="marcarSalida">Marcar Salida</button>
                        <a href="?id=<?= $id ?>&case=3"><button type="button" class="btn btn-info mr">Marcar
                                Retiro</button></a>
                        <div class="col-md-12" style="margin-top: 3%;"></div>
                        <center>
                            <div class="alert alert-danger" style="margin-top: 3%;" role="alert" id="err"></div>
                        </center>
                        <center>
                            <div class="alert alert-success" style="margin-top: 3%;" role="alert" id="resp"></div>
                        </center>
                    </div>
                </div>
            </div>
        </div>

        <button id="entrada" style="display: none;" data-toggle="modal" data-target="#entradaModalCenter"></button>
        <div class="modal fade" id="entradaModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" aria-label="Close">
                            <a href="index" style="text-decoration:none; color:red;"><span
                                    aria-hidden="true">&times;</span></a>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="">Fecha de entrada <span class="sp">*</span></label>
                        <input type="date" class="form-control" name="fechaE" id="fechaE" value="<?= date('Y-m-d') ?>">
                        <label for="">Hora de entrada <span class="sp">*</span></label>
                        <input type="time" class="form-control" name="horaE" id="horaE" value="<?= date('H:i:s') ?>">
                        <label for="">Celda que va ocupar <span class="sp">*</span></label>
                        <input type="text" class="form-control" name="celdaE" id="celdaE">
                        <input type="hidden" class="form-control" name="idCodeE" id="idCodeE" value="<?= $id ?>">
                        <input type="hidden" class="form-control" name="rein" id="rein" value="2">
                    </div>

                    <div style="text-align:center;">
                        <hr>
                        <a href="index"><button type="button" class="btn btn-danger"
                                id="cancelar1">Cancelar</button></a>
                        <button type="button" class="btn btn-success" id="marcarEntrada">Marcar Entrada</button>
                        <div class="col-md-12" style="margin-top: 3%;"></div>
                        <center>
                            <div class="alert alert-danger" style="margin-top: 3%;" role="alert" id="err1"></div>
                        </center>
                        <center>
                            <div class="alert alert-success" style="margin-top: 3%;" role="alert" id="resp1"></div>
                        </center>
                    </div>
                </div>
            </div>
        </div>

        <button id="retiro" style="display: none;" data-toggle="modal" data-target="#retiroModalCenter"></button>
        <div class="modal fade" id="retiroModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" aria-label="Close">
                            <a href="index" style="text-decoration:none; color:red;"><span
                                    aria-hidden="true">&times;</span></a>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>¿Estas seguro de marcar retiro? Recuerda que si marcas el retiro, el vehiculo no pertenecera
                            mas al parqueadero IMR </p>
                        <input type="hidden" class="form-control" name="idCodeR2" id="idCodeR2" value="<?= $id ?>">
                    </div>

                    <div style="text-align:center;">
                        <hr>
                        <a href="index"><button type="button" class="btn btn-danger"
                                id="cancelar2">Cancelar</button></a>
                        <button type="button" class="btn btn-success" id="confirmar">Confirmar</button>
                        <div class="col-md-12" style="margin-top: 3%;"></div>
                        <center>
                            <div class="alert alert-danger" style="margin-top: 3%;" role="alert" id="err2"></div>
                        </center>
                        <center>
                            <div class="alert alert-success" style="margin-top: 3%;" role="alert" id="resp2"></div>
                        </center>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="../js/marcarSalida.js"></script>
    <script src="../js/marcarEntrada.js"></script>
    <script src="../js/marcarRetiro.js"></script>


    <?php 
    include('../include/scriptsTables.php');
    ?>

    <script>
    $('#myModal').on('shown.bs.modal', function() {
        $('#myInput').trigger('focus')
    })
    </script>

    <?php

if (!empty($_GET['case'])) {
    if ($_GET['case'] == 1) { ?>
    <script>
    $(document).ready(function() {
        setTimeout(clickbutton);

        function clickbutton() {
            $("#salida").click();
        }
    });
    </script>
    <?php } ?>

    <?php
    if ($_GET['case'] == 2) { ?>
    <script>
    $(document).ready(function() {
        setTimeout(clickbutton);

        function clickbutton() {
            $("#entrada").click();
        }
    });
    </script>
    <?php } ?>

    <?php
    if ($_GET['case'] == 3) { ?>
    <script>
    $(document).ready(function() {
        setTimeout(clickbutton);

        function clickbutton() {
            $("#retiro").click();
        }
    });
    </script>
    <?php }} ?>



</body>

</html>