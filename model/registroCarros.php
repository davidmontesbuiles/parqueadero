<?php
include 'connect.php';
$Modelo = $_POST['mod'];
$Puertas = $_POST['puer'];
$Placa = $_POST['pla'];
$Cedula = $_POST['ced'];
$Ingreso = $_POST['chk'];


$continue = 0;

if($continue == 0){
    $consu = $mysqli->query("SELECT COUNT(*) AS total FROM vehiculos WHERE placa = '$Placa' ");
    $row = $consu->fetch_assoc();
    $Total = $row['total'];
    if($Total > 0){
        $continue = 4;
    }else{
        $continue = 0;
    }
}

if ($continue == 0) {

        if (($_FILES["fot"]["type"] == "image/pjpeg")
            || ($_FILES["fot"]["type"] == "image/jpeg")
            || ($_FILES["fot"]["type"] == "image/png")
            || ($_FILES["fot"]["type"] == "image/gif")
            || ($_FILES["fot"]["type"] == "image/jpg")
        ) {

            $imagen1 = '1_' . sha1(trim(date('d-m-Y H:m:s')));
            if (move_uploaded_file($_FILES["fot"]["tmp_name"], "../img/vehiculos/" . $imagen1 . ".png")) {
                
                    $sql = mysqli_query($mysqli, "INSERT INTO vehiculos(cedula, foto, placa, modelo_cilindraje, puertas_tiempos, tipo) 
                    VALUES ('$Cedula', '$imagen1.png', '$Placa', '$Modelo', '$Puertas', '1')");
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

if($continue == 0){
    if($Ingreso == '1'){
        $continue = 3;
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
if ($continue == 3) {
    echo 3;
}
if ($continue == 4) {
    echo 4;
}

