<?php
    date_default_timezone_set('America/Bogota');
	include 'plantilla.php';
	require '../../model/connect.php';
	$fechaHoy = date('Y-m-d');
    $fechaInicio = date('Y-m-01');
	$query = "SELECT MIN(e.fecha) as menor, MAX(e.fecha) as mayor, e.idVehiculo, TIMESTAMPDIFF(DAY, MIN(e.fecha), MAX(e.fecha)) as dias, v.cedula, v.tipo FROM entradas e INNER JOIN vehiculos v ON (e.idVehiculo = v.id) WHERE e.fecha BETWEEN '$fechaInicio' and '$fechaHoy' GROUP BY e.idVehiculo";
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(63,6,'CEDULA',1,0,'C',1);
	$pdf->Cell(63,6,'VEHICULO',1,0,'C',1);
	$pdf->Cell(63,6,'DIAS',1,1,'C',1);

	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		if($row['tipo'] == 1){
			$tipo = 'Carro';
		}if($row['tipo'] == 2){
			$tipo = 'Moto';
		}if($row['tipo'] == 3){
			$tipo = 'Bicicleta';
		}
		$pdf->Cell(63,6,utf8_decode($row['cedula']),1,0,'C');
		$pdf->Cell(63,6,$tipo,1,0,'C');
		$pdf->Cell(63,6,utf8_decode($row['dias']),1,1,'C');
	}
	$pdf->Output();
?>