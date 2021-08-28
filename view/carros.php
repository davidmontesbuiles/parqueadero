<?php 
date_default_timezone_set('America/Bogota');
    include '../model/connect.php';
    $consu = $mysqli->query("SELECT MAX(id) AS id FROM vehiculos");
    $row = $consu->fetch_assoc();
    $id = $row['id'];
    ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/photo.css">
    <link rel="icon" type="image/png" href="../img/ico.png">
    <title>Parqueadero IMR</title>
</head>

<body>
    <?php 
    include('../include/navbar.php');
    ?>

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <H2>Registro Carros</H2>
            </div>

            <div class="col-xs-4">

                <center>
                    <form action="#" method="post" enctype="multipart/form-data">
                        <div class="login">
                            <div class="container-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Modelo <span class="sp">*</span></label>
                                        <input type="number" class="input form-control" name="modelo" id="modelo"
                                            placeholder="Modelo del carro">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Numero de puertas <span class="sp">*</span></label>
                                        <input type="number" class="input form-control" name="puertas" id="puertas"
                                            placeholder="Numero de puertas">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Numero de placa <span class="sp">*</span></label>
                                        <input type="text" class="input form-control" name="placa" id="placa"
                                            placeholder="Numero de placa" maxlength="6" minlength="6" style="text-transform: uppercase;">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Número de cedula <span class="sp">*</span></label>
                                        <input type="number" class="input form-control" name="cedula" id="cedula"
                                            placeholder="Numero de cedula">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="photo form-group">
                                        <label for="foto" class="col-md-6 control-label">Foto del carro <span
                                                class="sp">*</span></label>
                                        <div class="prevPhoto">
                                            <span class="delPhoto notBlock">X</span>
                                            <label for="foto"></label>
                                        </div>
                                        <div class="upimg">
                                            <input type="file" name="foto" id="foto" class="file">
                                        </div>
                                        <center>
                                            </centerZ<h6>Click en el cuadro para subir foto</h6>
                                        </center>
                                        <div id="form_alert"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="ingreso">Permitir ingreso
                                        <input type="checkbox" name="ingreso" id="ingreso" value="1"></label>
                                </div>

                                <input type="button" class="input" id="registroCarros" value="Registrar Carro">
                                <input type="hidden" class="form-control" name="rein" id="rein" value="2">
                                <div id="progress">
                                    <br>
                                    <div id="myProgress">
                                        <div id="myBar">
                                            <div id="label">0%</div>
                                        </div>
                                    </div>
                                </div>
                                <center>
                                    <div class="alert alert-success" role="alert" id="resp"></div>
                                </center>
                                <center>
                                    <div class="alert alert-danger" role="alert" id="err"></div>
                                </center>
                                <center>
                                    <div class="alert alert-danger" role="alert" id="camp"></div>
                                </center>
                            </div>
                        </div>
                    </form>
                    <div style="margin-top:10%"></div>
                </center>

            </div>

            <button id="entrada" style="display: none;" data-toggle="modal" data-target="#entradaModalCenter"></button>
            <div class="modal fade" id="entradaModalCenter" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static"
                data-keyboard="false">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" aria-label="Close">
                                <a href="carros" style="text-decoration:none; color:red;"><span
                                        aria-hidden="true">&times;</span></a>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label for="">Fecha de entrada <span class="sp">*</span></label>
                            <input type="date" class="form-control" name="fechaE" id="fechaE"
                                value="<?= date('Y-m-d') ?>">
                            <label for="">Hora de entrada <span class="sp">*</span></label>
                            <input type="time" class="form-control" name="horaE" id="horaE"
                                value="<?= date('H:i:s') ?>">
                            <label for="">Celda que va ocupar <span class="sp">*</span></label>
                            <input type="text" class="form-control" name="celdaE" id="celdaE">
                            <input type="hidden" class="form-control" name="idCodeE" id="idCodeE" value="<?= $id ?>">
                        </div>

                        <div style="text-align:center;">
                            <hr>
                            <a href="carros"><button type="button" class="btn btn-danger"
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

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="../js/registroCarros.js"></script>
    <script src="../js/foto.js"></script>
    <script src="../js/marcarEntrada.js"></script>

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
            $("#entrada").click();
        }
    });
    </script>
    <?php } }?>

</body>

</html>