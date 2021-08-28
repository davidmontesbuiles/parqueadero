<?php
include 'connect.php';
$Fecha = $_POST['fec'];
$Hora = $_POST['hor'];
$Celda = $_POST['cel'];
$id = $_POST['id'];
$Reingreso = $_POST['re'];


$continue = 0;
if($continue == 0){
    $consu = $mysqli->query("SELECT COUNT(*) AS total FROM vehiculos WHERE celda = '$Celda' ");
    $row = $consu->fetch_assoc();
    $Total = $row['total'];
    if($Total > 0){
        $continue = 2;
    }else{
        $continue = 0;
    }
}

if ($continue == 0) {

    $sql = mysqli_query($mysqli, "INSERT INTO entradas(idVehiculo, fecha, hora, celda) 
    VALUES ('$id', '$Fecha', '$Hora', '$Celda')");
    if($sql){
        $up = mysqli_query($mysqli, "UPDATE vehiculos SET estado = '0', celda = '$Celda' WHERE id = '$id' ");
        if($up){
            $continue = 0;
        }else{
            $continue = 1;
        }
    }else{
        $continue = 1;
    }

}
if($continue == 0){
    if($Reingreso == '1'){
        $up = mysqli_query($mysqli, "UPDATE vehiculos SET estado = '0', celda = '$Celda', fechaRegistro = NOW(), fechaRetiro = null WHERE id = '$id' ");
        if($up){
            $continue = 0;
        }else{
            $continue = 1;
        }
    }
}



if ($continue == 0) {
    echo 0;
}
if ($continue == 1) {
    echo 1;
}
if ($continue == 2) {
    echo 2;
}