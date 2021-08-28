<?php
class consultas
{

    public static function cargar_carros()
    {
        $contenido = '';

        include 'connect.php';
        $consu = $mysqli->query("SELECT * FROM vehiculos WHERE tipo = '1' AND estado != '2' ORDER BY id desc");

        if ($consu->num_rows > 0) {

            while ($r_consu = $consu->fetch_assoc()) {

                $contenido .= '
				<tr>
                    <td><img src="../img/vehiculos/' . $r_consu["foto"] . '" width="100"></td>
                    <td>' . $r_consu["cedula"] . '</td> 
                    <td>' . $r_consu["placa"] . '</td> 
                    <td>' . $r_consu["modelo_cilindraje"] . '</td>  
                    <td>' . $r_consu["puertas_tiempos"] . '</td>';              
                    if($r_consu["estado"] == 0){
                        $contenido .= ' <td style="color:green;">En parqueadero</td>';
                        }else if($r_consu["estado"] == 1){
                            $contenido .= ' <td style="color:#970101;">Afuera</td>';
                        }  
                        $contenido .= '   
                        <td><center><a href="?case=1&id='.$r_consu["id"].'"><button type="button" title="Editar Carro" class="btn btn-outline-success"><i class="bi bi-pencil-square"></i></button></a></center></td>    
                        </center></td>    
                </center>
                </td>
            </tr>
            ';
            }
        }
        $mysqli->close();
        return $contenido;
    }
    public static function cargar_motos()
    {
        $contenido = '';

        include 'connect.php';
        $consu = $mysqli->query("SELECT * FROM vehiculos WHERE tipo = '2' AND estado != '2' ORDER BY id desc");

        if ($consu->num_rows > 0) {

            while ($r_consu = $consu->fetch_assoc()) {

                $contenido .= '
				<tr>
                    <td><img src="../img/vehiculos/' . $r_consu["foto"] . '" width="100"></td>
                    <td>' . $r_consu["cedula"] . '</td> 
                    <td>' . $r_consu["placa"] . '</td> 
                    <td>' . $r_consu["modelo_cilindraje"] . '</td>  
                    <td>' . $r_consu["puertas_tiempos"] . '</td>';              
                    if($r_consu["estado"] == 0){
                        $contenido .= ' <td style="color:green;">En parqueadero</td>';
                        }else if($r_consu["estado"] == 1){
                            $contenido .= ' <td style="color:#970101;">Afuera</td>';
                        }  
                        $contenido .= ' 
                        <td><center><a href="?case=1&id='.$r_consu["id"].'"><button type="button" title="Editar Moto" class="btn btn-outline-success"><i class="bi bi-pencil-square"></i></button></a></center></td>    
                        </center></td>       
                </center>
                </td>
            </tr>
            ';
            }
        }
        $mysqli->close();
        return $contenido;
    }
    public static function cargar_bicicletas()
    {
        $contenido = '';

        include 'connect.php';
        $consu = $mysqli->query("SELECT id, foto, cedula, estado FROM vehiculos WHERE tipo = '3' AND estado != '2' ORDER BY id desc");

        if ($consu->num_rows > 0) {

            while ($r_consu = $consu->fetch_assoc()) {

                $contenido .= '
				<tr>
                    <td><img src="../img/vehiculos/' . $r_consu["foto"] . '" width="100"></td>           
                    <td>' . $r_consu["cedula"] . '</td>';
                    if($r_consu["estado"] == 0){
                    $contenido .= ' <td style="color:green;">En parqueadero</td>';
                    }else if($r_consu["estado"] == 1){
                        $contenido .= ' <td style="color:#970101;">Afuera</td>';
                    }  
                    $contenido .= '  
                    <td><center><a href="?case=1&id='.$r_consu["id"].'"><button type="button" title="Editar Bicicleta" class="btn btn-outline-success"><i class="bi bi-pencil-square"></i></button></a></center></td>    
                        </center></td>  
                </center>
                </td>
            </tr>
            ';
            }
        }
        $mysqli->close();
        return $contenido;
    }
    public static function cargar_vehiculos()
    {
        $contenido = '';

        include 'connect.php';
        $consu = $mysqli->query("SELECT * FROM vehiculos where estado != '2' ORDER BY id desc");

        if ($consu->num_rows > 0) {

            while ($r_consu = $consu->fetch_assoc()) {

                $contenido .= '
				<tr>
                    <td><img src="../img/vehiculos/' . $r_consu["foto"] . '" width="100"></td>
                    <td>' . $r_consu["cedula"] . '</td>';
                    
                    if($r_consu["tipo"] == '3'){
                        $contenido .= '<td>Sin info</td>';   
                    }else{
                        $contenido .= '<td>' . $r_consu["placa"] . '</td>';
                    }
                    if($r_consu["tipo"] == '1'){
                        $contenido .= '<td>Modelo: ' . $r_consu["modelo_cilindraje"] . '</td>';   
                    }
                    if($r_consu["tipo"] == '2'){
                        $contenido .= '<td>Cilindraje: ' . $r_consu["modelo_cilindraje"] . '</td>';   
                    }
                    if($r_consu["tipo"] == '3'){
                        $contenido .= '<td>Sin info</td>';   
                    }
                    if($r_consu["tipo"] == '1'){
                        $contenido .= '<td>Puertas: ' . $r_consu["puertas_tiempos"] . '</td>';   
                    }
                    if($r_consu["tipo"] == '2'){
                        $contenido .= '<td>Tiempos: ' . $r_consu["puertas_tiempos"] . '</td>';   
                    }
                    if($r_consu["tipo"] == '3'){
                        $contenido .= '<td>Sin info</td>';   
                    }
                    if($r_consu["tipo"] == '1'){
                        $contenido .= '<td>Carro</td>';   
                    }
                    if($r_consu["tipo"] == '2'){
                        $contenido .= '<td>Moto</td>';   
                    }
                    if($r_consu["tipo"] == '3'){
                        $contenido .= '<td>Bicicleta</td>';   
                    } 
                    if($r_consu["celda"] == null){
                        $contenido .= '<td style="color:#970101;">Sin celda</td>';   
                    }else{
                        $contenido .= '<td>' . $r_consu["celda"] . '</td>';   
                    }                            
                    if($r_consu["estado"] == 0){
                        $contenido .= ' <td style="color:green;">En parqueadero</td>';
                        }else if($r_consu["estado"] == 1){
                            $contenido .= ' <td style="color:#970101;">Afuera</td>';
                        }  
                    if($r_consu["estado"] == 1){
                        $contenido .= ' 
                        <td><center><a href="?case=2&id='.$r_consu["id"].'"><button type="button" title="Marcar Entrada" class="btn btn-outline-info"><i class="bi bi-box-arrow-in-left"></i></button></a></center></td>    
                        </center>
                        </td>';
                    }if($r_consu["estado"] == 0){
                        $contenido .= ' 
                        <td><center><a href="?case=1&id='.$r_consu["id"].'&celda='.$r_consu["celda"].'"><button type="button" title="Marcar Salida" class="btn btn-outline-success"><i class="bi bi-box-arrow-in-right"></i></button></a></center></td>    
                        </center>
                        </td>';
                    }
                    $contenido .= '
            </tr>
            ';
            }
        }
        $mysqli->close();
        return $contenido;
    }
    public static function cargar_retirados()
    {
        $contenido = '';

        include 'connect.php';
        $consu = $mysqli->query("SELECT * FROM vehiculos where estado = '2' ORDER BY id desc");

        if ($consu->num_rows > 0) {

            while ($r_consu = $consu->fetch_assoc()) {

                $contenido .= '
				<tr>
                    <td><img src="../img/vehiculos/' . $r_consu["foto"] . '" width="100"></td>
                    <td>' . $r_consu["cedula"] . '</td>';
                    
                    if($r_consu["tipo"] == '3'){
                        $contenido .= '<td>Sin info</td>';   
                    }else{
                        $contenido .= '<td>' . $r_consu["placa"] . '</td>';
                    }
                    if($r_consu["tipo"] == '1'){
                        $contenido .= '<td>Modelo: ' . $r_consu["modelo_cilindraje"] . '</td>';   
                    }
                    if($r_consu["tipo"] == '2'){
                        $contenido .= '<td>Cilindraje: ' . $r_consu["modelo_cilindraje"] . '</td>';   
                    }
                    if($r_consu["tipo"] == '3'){
                        $contenido .= '<td>Sin info</td>';   
                    }
                    if($r_consu["tipo"] == '1'){
                        $contenido .= '<td>Puertas: ' . $r_consu["puertas_tiempos"] . '</td>';   
                    }
                    if($r_consu["tipo"] == '2'){
                        $contenido .= '<td>Tiempos: ' . $r_consu["puertas_tiempos"] . '</td>';   
                    }
                    if($r_consu["tipo"] == '3'){
                        $contenido .= '<td>Sin info</td>';   
                    }
                    if($r_consu["tipo"] == '1'){
                        $contenido .= '<td>Carro</td>';   
                    }
                    if($r_consu["tipo"] == '2'){
                        $contenido .= '<td>Moto</td>';   
                    }
                    if($r_consu["tipo"] == '3'){
                        $contenido .= '<td>Bicicleta</td>';   
                    }                          

                    $contenido .= ' <td style="color:#970101;">Retirado</td>
                    <td><center><a href="?case=1&id='.$r_consu["id"].'"><button type="button" title="Reingresar vehiculo" class="btn btn-outline-info"><i class="bi bi-box-arrow-in-left"></i></button></a></center></td>    
                    </center>
                    </td>
                </tr>';
            }
        }
        $mysqli->close();
        return $contenido;
    }
    public static function cargar_carros_editar($id)
    {
        include 'connect.php';
        $sql = "SELECT cedula, foto, placa, modelo_cilindraje, puertas_tiempos FROM vehiculos WHERE id = ? ";
        $sentencia     = $mysqli->prepare($sql);
        $sentencia->bind_param('i', $id);
        $id = $id;
        if (!$sentencia->execute()) {
            $result = array("result" => false);
        } else {
            $sentencia->bind_result($cedula, $foto, $placa, $modelo_cilindraje, $puertas_tiempos);
            $sentencia->store_result();
            if ($sentencia->num_rows > 0) {

                $sentencia->fetch();
                $result = array(
                    "result" => true,
                    "cedula" => $cedula,
                    "foto" => $foto,
                    "placa" => $placa,
                    "modelo_cilindraje" => $modelo_cilindraje,
                    "puertas_tiempos" => $puertas_tiempos,
                );
            } else {
                $result = array("result" => false);
            }
        }
        $mysqli->close();
        return $result;
    }
    public static function cargar_motos_editar($id)
    {
        include 'connect.php';
        $sql = "SELECT cedula, foto, placa, modelo_cilindraje, puertas_tiempos FROM vehiculos WHERE id = ? ";
        $sentencia     = $mysqli->prepare($sql);
        $sentencia->bind_param('i', $id);
        $id = $id;
        if (!$sentencia->execute()) {
            $result = array("result" => false);
        } else {
            $sentencia->bind_result($cedula, $foto, $placa, $modelo_cilindraje, $puertas_tiempos);
            $sentencia->store_result();
            if ($sentencia->num_rows > 0) {

                $sentencia->fetch();
                $result = array(
                    "result" => true,
                    "cedula" => $cedula,
                    "foto" => $foto,
                    "placa" => $placa,
                    "modelo_cilindraje" => $modelo_cilindraje,
                    "puertas_tiempos" => $puertas_tiempos,
                );
            } else {
                $result = array("result" => false);
            }
        }
        $mysqli->close();
        return $result;
    }
    public static function cargar_bicicletas_editar($id)
    {
        include 'connect.php';
        $sql = "SELECT cedula, foto FROM vehiculos WHERE id = ? ";
        $sentencia     = $mysqli->prepare($sql);
        $sentencia->bind_param('i', $id);
        $id = $id;
        if (!$sentencia->execute()) {
            $result = array("result" => false);
        } else {
            $sentencia->bind_result($cedula, $foto);
            $sentencia->store_result();
            if ($sentencia->num_rows > 0) {

                $sentencia->fetch();
                $result = array(
                    "result" => true,
                    "cedula" => $cedula,
                    "foto" => $foto,
                );
            } else {
                $result = array("result" => false);
            }
        }
        $mysqli->close();
        return $result;
    }


}
