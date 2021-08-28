<?php
include 'connect.php';
$Data = $_POST['data'];


$continue = 0;

if ($continue == 0) {
    $consu = $mysqli->query("SELECT COUNT(*) AS total FROM vehiculos WHERE placa = '$Placa' ");
    $row = $consu->fetch_assoc();
    $Total = $row['total'];
    
}

if ($continue == 0) {
    echo 0;
}
if ($continue == 1) {
    echo 1;
}

