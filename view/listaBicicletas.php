<?php
  include_once('../model/consultas.php');
  if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $datos = consultas::cargar_bicicletas_editar($id);
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
    <link rel="stylesheet" href="../css/photo.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/png" href="../img/ico.png">
    <title>Ver registros</title>
</head>

<body>
    <?php 
    include('../include/navbar.php');
    ?>

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <H2>Bicicletas Registradas</H2>
            </div>

            <div class="col-md-12" style="margin-top: 3%;"></div>

            <div class="btn-group">
                <button type="button" class="btn btn-info dropdown-toggle btn-lg" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Bicicletas
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="listaBicicletas">Bicicletas</a>
                    <a class="dropdown-item" href="listaCarros">Carros</a>
                    <a class="dropdown-item" href="listaMotos">Motos</a>
                </div>
            </div>

            <div class="col-md-12" style="margin-top: 3%;"></div>

            <div class="col-md-12" style="background-color: white; border: 2px solid #00e2b0;">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Bicicleta</th>
                            <th>Cedula</th>
                            <th>Estado</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= consultas::cargar_bicicletas() ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12" style="margin-top: 3%;"></div>

        </div>

        <button id="editar" style="display: none;" data-toggle="modal" data-target="#editarModalCenter"></button>
        <div class="modal fade" id="editarModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" id="x" aria-label="Close">
                            <a href="listaBicicletas" style="text-decoration:none; color:red;"><span
                                    aria-hidden="true">&times;</span></a>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-form" style="margin-top: 2%;">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Cedula <span class="sp">*</span></label>
                                    <input type="number" class="input form-control" name="cedula" id="cedula"
                                        placeholder="Cedula" value="<?= $datos['cedula'] ?>">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="photo form-group">
                                    <label for="foto" class="col-md-12 control-label">Foto de la bicicleta<span
                                            class="sp">*</span></label>
                                    <div class="prevPhoto"
                                        style="background: url(../img/vehiculos/<?= $datos['foto'] ?>); background-repeat: no-repeat; background-position: center center; width: 100%;">
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
                            <input type="hidden" class="form-control" name="idCodeEd" id="idCodeEd" value="<?= $id ?>">
                            <input type="button" class="input" id="editarBicicletas" value="Editar Bicileta">
                            <div id="progress">
                                <br>
                                <div id="myProgress">
                                    <div id="myBar">
                                        <div id="label">0%</div>
                                    </div>
                                </div>
                            </div>
                            <center>
                                <div class="alert alert-success" role="alert" id="resp1"></div>
                            </center>
                            <center>
                                <div class="alert alert-danger" role="alert" id="err1"></div>
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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="../js/foto.js"></script>
    <script src="../js/editarBicicletas.js"></script>

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
            $("#editar").click();
        }
    });
    </script>
    <?php }} ?>

</body>

</html>