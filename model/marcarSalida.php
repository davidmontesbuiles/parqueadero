<?php
include 'connect.php';
$Fecha = $_POST['fec'];
$Hora = $_POST['hor'];
$Celda = $_POST['cel'];
$id = $_POST['id'];


$continue = 0;

if ($continue == 0) {

    $sql = mysqli_query($mysqli, "INSERT INTO salidas(idVehiculo, fecha, hora, celda) 
    VALUES ('$id', '$Fecha', '$Hora', '$Celda')");
    if($sql){
        $up = mysqli_query($mysqli, "UPDATE vehiculos SET estado = '1', celda = null WHERE id = '$id' ");
        if($up){
            $continue = 0;
        }else{
            $continue = 1;
        }
    }else{
        $continue = 1;
    }

}



if ($continue == 0) {
    echo 0;
}
if ($continue == 1) {
    echo 1;
}
