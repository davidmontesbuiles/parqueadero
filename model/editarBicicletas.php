<?php
include 'connect.php';
$Cedula = $_POST['ced'];
$id = $_POST['idC'];


$continue = 0;


if((!isset($_FILES["fot"]["type"]))){

    if ($continue == 0) {
        $sql = mysqli_query($mysqli, "UPDATE vehiculos SET cedula = '$Cedula', foto = foto, tipo = '3' WHERE id = '$id'");
        if($sql){
            $continue = 0;
        }else{
            $continue = 1;
        } 
    }
}else{

    if ($continue == 0) {

        if (($_FILES["fot"]["type"] == "image/pjpeg")
            || ($_FILES["fot"]["type"] == "image/jpeg")
            || ($_FILES["fot"]["type"] == "image/png")
            || ($_FILES["fot"]["type"] == "image/gif")
            || ($_FILES["fot"]["type"] == "image/jpg")
        ) {

            $imagen1 = '1_' . sha1(trim(date('d-m-Y H:m:s')));
            if (move_uploaded_file($_FILES["fot"]["tmp_name"], "../img/vehiculos/" . $imagen1 . ".png")) {
                
                $sql = mysqli_query($mysqli, "UPDATE vehiculos SET cedula = '$Cedula', foto = '$imagen1.png', tipo = '3' WHERE id = '$id'");
                if($sql){
                    $continue = 0;
                }else{
                    $continue = 1;
                }
                
            } else {
                $continue = 1;
            }
        } else {
            $continue = 2;
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



