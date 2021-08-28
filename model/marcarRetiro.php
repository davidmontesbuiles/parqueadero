<?php
include 'connect.php';
$id = $_POST['id'];


$continue = 0;

if ($continue == 0) {

        $up = mysqli_query($mysqli, "UPDATE vehiculos SET estado = '2', celda = null, fechaRetiro = NOW() WHERE id = '$id' ");
        if($up){
            $continue = 0;
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
